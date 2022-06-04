<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;

class EditProfile extends Component
{
    use WithFileUploads;

    public $avatar;
    public $email;
    public $address;
    public $phoneNumber;
    public $name;
    public $avatarTemp;
    public $password;
    public $confirm_password;

    public function mount(){
        $user = User::find(Auth::user()->id);
        $member = Member::where('id_user', Auth::user()->id)->first();

        $this->phoneNumber = $member->no_hp;
        $this->address = $member->address;
        $this->name = $user->name;
        $this->email = $user->email;
        
        if($member->avatar != null){
            $this->avatar = $member->avatar;
            $this->avatarTemp = $member->avatar;
        }
    }
    public function render()
    {
        return view('livewire.user.edit-profile')->layout('layouts.home');
    }

    public function saveProfile(){
        $id = Auth::user()->id;
        $this->validate([
            'name' => 'required',
            'phoneNumber' => 'required',
            'address' => 'required',
        ]);

        User::where('id', $id)->update([
            'name' => $this->name
        ]);

        if($this->avatar == $this->avatarTemp){
            $avatar = $this->avatarTemp;
        }
        else{
            $avatar = $this->avatar->store('avatar', 'public');
        }

        Member::where('id_user', $id)->update([
            'no_hp' => $this->phoneNumber,
            'address' => $this->address,
            'avatar' => $avatar,
        ]);

        $this->emit('showAlert', ['msg' => 'Profile berhasil di update']);
        $this->updateProfile();
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
        $member = Member::where('id_user', Auth::user()->id)->first();

        $this->phoneNumber = $member->no_hp;
        $this->address = $member->address;
        $this->name = $user->name;
        $this->email = $user->email;
        
        if($member->avatar != null){
            $this->avatar = $member->avatar;
            $this->avatarTemp = $member->avatar;
        }
    }
}
