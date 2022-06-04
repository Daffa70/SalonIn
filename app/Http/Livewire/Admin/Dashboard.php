<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Salon;

class Dashboard extends Component
{
    public function render()
    {
        $salonsPendingCount = Salon::where('status_salon', 'PENDING')->count();
        return view('livewire.admin.dashboard',[
            'salonsPendingCount' => $salonsPendingCount
        ])->layout('layouts.admin');
    }
}
