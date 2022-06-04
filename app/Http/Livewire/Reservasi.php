<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Salon;
use App\Models\ProductSalon;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;
use App\Models\User;
use App\Models\Booking;

class Reservasi extends Component
{
    public $productId;
    public $name;
    public $no_hp;
    public $address;
    public $timeService;

    public function mount($id){
        $this->productId = $id;
        $product = ProductSalon::where('id', $this->productId)->first();
        $salon = Salon::where('id', $product->id_salon)->first();
        $member = Member::where('id_user', Auth::user()->id)->first();
        $user = User::where('id', Auth::user()->id)->first();

        if($member->no_hp != null){
            $this->no_hp = $member->no_hp;
        }

        if($member->address){
            $this->address = $member->address;
        }
    }

    public function render()
    {
        $product = ProductSalon::where('id', $this->productId)->first();
        $salon = Salon::where('id', $product->id_salon)->first();
        $member = Member::where('id_user', Auth::user()->id)->first();
        $user = User::where('id', Auth::user()->id)->first();

        $this->name = $user->name;

        if($member->no_hp != null){
            $this->no_hp = $member->no_hp;
        }

        if($member->address){
            $this->address = $member->address;
        }
        return view('livewire.reservasi', [
            'salon' => $salon,
            'product' => $product,
            'member' => $member,
            'user' => $user
        ])->layout('layouts.home');
    }

    public function checkout(){

        if($this->checkHour()){
            $this->emit('showAlertError', ['msg' => "Harap pilih jadwal yang lain!, Jadwal sudah digunakan"]);
        }
        else{
            $this->validate([
                'name' => 'required',
                'address' => 'required',
                'no_hp' => 'required|numeric',
                'timeService' => 'required|after:today'
            ]);
    
            $member = Member::where('id_user', Auth::user()->id)->first();
            $product = ProductSalon::where('id', $this->productId)->first();
            
            if($member->no_hp == null){
                Member::where('id_user', Auth::user()->id)->update([
                    'no_hp' => $this->no_hp
                ]);
            }
    
            if($member->address == null){
                Member::where('id_user', Auth::user()->id)->update([
                    'address' => $this->address
                ]);
            }
    
            $bookingCode = $this->generateBookingCode();
    
            Booking::create([
                'payment_status' => "WAITING PAYMENT",
                'totalprice' => $product->price,
                'time_service' => date("Y-m-d H:i:s", strtotime($this->timeService)),
                'id_product' => $product->id,
                'id_salon' => $product->id_salon,
                'id_user' => Auth::user()->id,
                'booking_code' => $bookingCode
            ]);
    
            
            session()->flash('message', 'Pesanan berhasil dibuat, silahkan lanjutkan pembayaran');
            return redirect()->to('/payment/'.$bookingCode);
        }
    }

    function generateBookingCode() {
        $date = date('md');
        $randomNumber = rand(10,99);
        $name = $this->generateInitial(Auth::user()->name);
        $code = $name.$date.'-'.$randomNumber;

        if ($this->bookingCodeExists($code)) {
            return $this->generateBookingCode();
        }
    
        // otherwise, it's valid and can be used
        return $code;
    }

    function bookingCodeExists($number) {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return Booking::where('booking_code', $number)->exists();
    }

    public function generateInitial(string $name) : string{
        $words = explode(' ', $name);
        return strtoupper(substr($words[0], 0, 1) . substr(end($words), 0, 1));
    }

    public function checkHour(){
        return Booking::where('time_service', date("Y-m-d H:i:s", strtotime($this->timeService)))->exists();
    }
}
