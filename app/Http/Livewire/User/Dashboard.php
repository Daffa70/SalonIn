<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    
    public function render()
    {
        $bookings = Booking::where('id_user', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('livewire.user.dashboard',[
            'bookings' => $bookings
        ])->layout('layouts.home');
    }
}
