<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Salon;
use App\Models\DocumentSalon;


class ListSalon extends Component
{
    public $idSalon;
    public $salonName;
    public $ownerName;
    public $addressSalon;
    public $phoneSalon;
    public $statusSalon;


    public function render()
    {
        $salons = Salon::all();

        if($this->idSalon == null){
            $images = DocumentSalon::all();
        }else{
            $images = DocumentSalon::where('id_salon', $this->idSalon)->get();
        }

        return view('livewire.admin.list-salon',[
            'salons' => $salons,
            'images' => $images
        ])->layout('layouts.admin');
    }

    public function showModalInfo($id){
        $this->idSalon = $id;

        $user = Salon::where('id', $id)->first();

        $this->salonName = $user->name_salon;
        $this->ownerName = $user->user->name;
        $this->addressSalon = $user->address;
        $this->phoneSalon = $user->no_hp;
        $this->statusSalon = $user->status_salon;

        $this->emit('showModalInfo');
    }


    public function showModalKonfirmasi(){
        $this->emit('showModalKonfirmasi');
    }

    public function store(){
        Salon::where('id', $this->idSalon)->update([
            'status_salon' => "ACCEPTED"
        ]);

        $this->emit('showAlert', ['msg' => 'Salon berhasil di aprrove']);
        $this->emit('hideModal');
    }
}
