<?php

namespace App\Http\Livewire\Salon;

use Livewire\Component;
use App\Models\WorksHourSalon;
use Illuminate\Support\Facades\Auth;
use App\Models\Salon;

class WorkHour extends Component
{
    public $idSalon;
    public $idWorkHour;
    public $isEdit = false;

    public function render()
    {
        $salon = Salon::where('id_user', Auth::user()->id)->first();
        $workHours = WorksHourSalon::where('id_salon', $salon->id)->get();

        return view('livewire.salon.work-hour', [
            'workHours' => $workHours
        ]);
    }

    public function edit($id){
        $this->isEdit = true;
        $workHour = WorksHourSalon::where('id', $id)->first();

        $this->idWorkHour = $id;
        $this->name = $workHour->hour;

        $this->emit('showModalEdit');
    }

    public function storeEdit(){
        WorksHourSalon::where('id', $this->idWorkHour)->update([
            'hour' => $this->name
        ]);

        $this->emit('showAlert', ['msg' => 'Jam berhasil dirubah']);
        $this->emit('hideModal');
    }
}
