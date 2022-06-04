<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Auth\Events\Registered;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Salon;
use Livewire\WithFileUploads;
use App\Models\DocumentSalon;

class RegisterSalon extends Component
{
    use WithFileUploads;
    public $salonName;
    public $ownerName;
    public $phoneNumber;
    public $address;
    public $images = [];
    public $email;
    public $password;
    public $confirm_password;
    public $avatar;
    public $desc;

    public function render()
    {
        return view('livewire.auth.register-salon')->layout('layouts.guest');
    }

    public function store(){
        $this->validate([
            'salonName' => 'required',
            'ownerName' => 'required',
            'phoneNumber' => 'required|numeric',
            'address' => 'required',
            'images' => 'required',  
            'email' => 'required|email|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password' => 'required',
            'confirm_password' => 'required|min:8|same:password',
            'desc' => 'required',
            'avatar' => 'required'
        ]);

        $user = User::create([
            'name' => $this->ownerName,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'is_admin' => 1
        ]);

        $image = $this->avatar->store('avatar', 'public');

        $salon = Salon::create([
            'name_salon' => $this->salonName,
            'no_hp' => $this->phoneNumber,
            'address' => $this->address,
            'id_user' => $user->id,
            'date_register' => $user->created_at,
            'status_salon' => "PENDING",
            'desc' => $this->desc,
            'image_logo' => $image
        ]);

        $images = $this->images;
        foreach ($images as $key => $image) {
            $images[$key] = $image->store('documentSalon', 'public');
            DocumentSalon::create([
                'image' => $images[$key], 
                'id_salon' => $salon->id
            ]);

        }

        $days = [
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumaat',
            'Sabtu',
            'Minggu'
        ];

        foreach($days as $day){
            \App\Models\WorksHourSalon::create([
                'day' => $day,
                'hour' => "10:00 - 20:00",
                'id_salon' => $salon->id
            ]);
        }

        event(new Registered($user));

        $this->emit('showAlert', [
            'msg' => 'Akun sudah terdaftar, silahkan check email untuk konfirmasi',
            'redirect' => true,
            'path' => 'login'
        ]);
    }
}
