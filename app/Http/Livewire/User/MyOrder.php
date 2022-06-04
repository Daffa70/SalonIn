<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use App\Models\Review;

class MyOrder extends Component
{
    use WithPagination; 
    protected $paginationTheme = 'bootstrap';
    public $review;
    public $star;
    public $idBooking;

    public function render()
    {
        $bookings = Booking::where('id_user', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);

        return view('livewire.user.my-order', [
            'bookings' => $bookings
        ])->layout('layouts.home');
    }

    public function showModalReview($id){
        $this->idBooking = $id;

        $this->emit('showModalReview');
    }

    public function submitReview(){
        $booking = Booking::where('id', $this->idBooking)->first();

        $this->validate([
            'review' => 'required',
        ]);

        Review::create([
            'star' => $this->star,
            'review' => $this->review,
            'id_user' => $booking->id_user,
            'id_product' => $booking->id_product,
            'id_salon' => $booking->id_salon,
            'id_booking' => $booking->id
        ]);

        Booking::where('id', $this->idBooking)->update([
            'payment_status' => "REVIWIED"
        ]);

        $this->emit('showAlert', ['msg' => "Review telah disubmit, Terimakasih"]);
        $this->emit('hideModal');
    }
}
