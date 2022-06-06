<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Salon;
use App\Models\ProductSalon;
use App\Models\Booking;

class HomeUser extends Component
{
    public $search;
    public function render()
    {
        $salons = Salon::where('status_salon', "ACCEPTED")->limit(5)->get();
        $product = ProductSalon::all();
        $bookings = Booking::all();

        return view('livewire.home-user',[
            'salons' => $salons,
            'product' => $product,
            'bookings' => $bookings
        ])->layout(\App\View\Components\HomeLayout::class);
    }

    public function searchBtn(){
        return redirect()->route('list.salon.home', ['search' => $this->search]);
    }
}
