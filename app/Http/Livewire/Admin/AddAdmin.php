<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class AddAdmin extends Component
{
    public $name;
    public $email;
    public $password;
    public $confirm_password;

    public $Addname;
    public $Addemail;
    public $Addpassword;
    public $Addconfirm_password;
    
    public $idUser;

    public function mount(){
        $user = User::find(Auth::user()->id);

        $this->name = $user->name;
        $this->email = $user->email;

    }

    public function render()
    {
        $admins = User::where('is_admin', 2)->get();
        return view('livewire.admin.add-admin',[
            'admins' => $admins
        ])->layout('layouts.admin');
    }

    public function savePrivacy(){
        $id = Auth::user()->id;

        if($this->email == Auth::user()->email){
            $this->validate([
                'password' => 'required',
                'confirm_password' => 'required|min:8|same:password',
            ]);

            $user = User::where('id', $id)->update([
                'password' => Hash::make($this->password),
            ]);
        }
        else{
            $this->validate([
                'email' => 'required|email|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                'password' => 'required',
                'confirm_password' => 'required|min:8|same:password',
            ]);

            $user = User::where('id', $id)->update([
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);
        }
        

        $this->password = null;
        $this->confirm_password = null;
        $this->emit('showAlert', ['msg' => 'Profile berhasil di update']);
        $this->updateProfile();
    }

    public function updateProfile(){
        $user = User::find(Auth::user()->id);

        $this->name = $user->name;
        $this->email = $user->email;

    }

    public function showModalAdd(){
        $this->emit('showModalAdd');
    }

    public function add(){
        $this->validate([
            'Addname' => 'required',
            'Addemail' => 'required|email|unique:users,email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'Addpassword' => 'required',
            'Addconfirm_password' => 'required|min:8|same:Addpassword',
        ]);

        $user = User::create([
            'name' => $this->Addname,
            'email' => $this->Addemail,
            'password' => Hash::make($this->Addpassword),
            'is_admin' => 2
        ]);

        event(new Registered($user));

        $this->emit('showAlert', ['msg' => 'Akun berhasil ditambahkan']);
        $this->emit('hideModal');
    }

    public function modalDelete($id){
        $this->idUser = $id;

        $this->emit('showModalDelete');
    }

    public function delete(){
        User::where('id', $this->idUser)->delete();

        $this->emit('showAlert', ['msg' => 'Akun berhasil dihapus']);
        $this->emit('hideModal');
    }
}
