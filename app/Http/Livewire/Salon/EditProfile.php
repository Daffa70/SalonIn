<?php

namespace App\Http\Livewire\Salon;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Salon;
use App\Models\User;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;

class EditProfile extends Component
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
    public $avatarTemp;
    public $desc;

    public function mount(){
        $user = User::find(Auth::user()->id);
        $salon = Salon::where('id_user', Auth::user()->id)->first();

        $this->salonName = $salon->name_salon;
        $this->phoneNumber = $salon->no_hp;
        $this->address = $salon->address;
        $this->ownerName = $user->name;
        $this->email = $user->email;
        
        if($salon->image_logo != null){
            $this->avatar = $salon->image_logo;
            $this->avatarTemp = $salon->image_logo;
        }
    }
    public function render()
    {
        return view('livewire.salon.edit-profile');
    }

    public function saveProfile(){
        $id = Auth::user()->id;
        $this->validate([
            'salonName' => 'required',
            'ownerName' => 'required',
            'phoneNumber' => 'required',
            'address' => 'required',
        ]);

        User::where('id', $id)->update([
            'name' => $this->ownerName
        ]);

        if($this->avatar == $this->avatarTemp){
            $avatar = $this->avatarTemp;
        }
        else{
            $avatar = $this->avatar->store('avatar', 'public');
        }

        Salon::where('id_user', $id)->update([
            'name_salon' => $this->salonName,
            'no_hp' => $this->phoneNumber,
            'address' => $this->address,
            'image_logo' => $avatar,
            'desc' => $this->desc
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
        $salon = Salon::where('id_user', Auth::user()->id)->first();

        $this->salonName = $salon->name_salon;
        $this->phoneNumber = $salon->no_hp;
        $this->address = $salon->address;
        $this->ownerName = $user->name;
        $this->email = $user->email;
        
        if($salon->image_logo != null){
            $this->avatar = $salon->image_logo;
            $this->avatarTemp = $salon->image_logo;
        }
    }
}
