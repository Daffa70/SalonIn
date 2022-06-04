<?php

namespace App\Http\Livewire\Salon;

use Livewire\Component;
use App\Models\Salon;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public function render()
    {
        $salon = Salon::where('id_user', Auth::user()->id)->first();

        return view('livewire.salon.dashboard',[
            'salon' => $salon
        ]);
    }
}
