<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Booking;
use Livewire\WithFileUploads;


class Payment extends Component
{
    use WithFileUploads;

    public $bookingCode;
    public $imagetransfer;

    public function mount($bookingcode){
        $this->bookingCode = $bookingcode;
    }

    public function render()
    {
        $booking = Booking::where('booking_code', $this->bookingCode)->first();

        return view('livewire.payment',[
            'booking' => $booking
        ])->layout('layouts.home');
    }

    public function payment(){
        $imagetransfer = $this->imagetransfer->store('imageTransfer', 'public');

        Booking::where('booking_code', $this->bookingCode)->update([
            'image_transfer' => $imagetransfer,
            'payment_status' => "PENDING"
        ]);

        $this->emit('showAlert', ['msg' => 'Image berhasil di update']);
    }
}
