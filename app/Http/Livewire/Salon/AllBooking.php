<?php

namespace App\Http\Livewire\Salon;

use Livewire\Component;
use App\Models\Booking;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class AllBooking extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $isEdit = false;
    public $idBooking;

    public function render()
    {
        $bookings = Booking::whereIn('payment_status', ["ACCEPTED", "FINISH"])->where('id_salon', Auth::user()->salon->id)->orderBy('time_service')->paginate(20);
        return view('livewire.salon.all-booking', [
            'bookings' => $bookings
        ]);
    }
}
