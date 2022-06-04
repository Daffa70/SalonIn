<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Auth\Events\Registered;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Member;


class RegisterUser extends Component
{
    public $name;
    public $email;
    public $password;
    public $confirm_password;


    public function render()
    {
        return view('livewire.auth.register-user')->layout('layouts.guest');
    }

    public function store(){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password' => 'required',
            'confirm_password' => 'required|min:8|same:password',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'is_admin' => 0
        ]);

        Member::create([
            'no_hp' => "",
            'address' => "",
            'jk' => "",
            'id_user' => $user->id,
            'point' => 0,
            'avatar' => null
        ]);

        event(new Registered($user));

        $this->emit('showAlert', [
            'msg' => 'Akun sudah terdaftar, silahkan check email untuk konfirmasi',
            'redirect' => true,
            'path' => 'login'
        ]);
    }
}
