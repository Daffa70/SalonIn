<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Booking;
use Livewire\WithPagination;

class ListPembayaran extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $idBooking;
    public $name;
    public $phone;
    public $image;
    public $statusPayment;
    public $bookingCode;

    public function render()
    {
        $bookings = Booking::where('payment_status', "PENDING")->orderBy('updated_at')->paginate(20);


        return view('livewire.admin.list-pembayaran',[
            'bookings' => $bookings
        ])->layout('layouts.admin');
    }

    public function showModalInfo($id){
        $this->idBooking = $id;

        $booking = Booking::where('id', $id)->first();

        $this->name = $booking->user->name;
        $this->phone = $booking->user->member->no_hp;
        $this->image = $booking->image_transfer;
        $this->statusPayment = $booking->payment_status;    
        $this->bookingCode = $booking->booking_code;    

        $this->emit('showModalInfo');
    }


    public function showModalKonfirmasi(){
        $this->emit('showModalKonfirmasi');
    }

    public function showModalReject(){
        $this->emit('showModalReject');
    }

    public function store(){
        Booking::where('id', $this->idBooking)->update([
            'payment_status' => "ACCEPTED"
        ]);

        $this->emit('showAlert', ['msg' => 'Pembayaran berhasil di aprrove']);
        $this->emit('hideModal');
    }

    public function reject(){
        Booking::where('id', $this->idBooking)->update([
            'payment_status' => "REJECTED"
        ]);

        $this->emit('showAlert', ['msg' => 'Pembayaran berhasil di tolak']);
        $this->emit('hideModal');
    }
}
