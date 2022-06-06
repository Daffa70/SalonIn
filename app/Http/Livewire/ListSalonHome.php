<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Salon;
class ListSalonHome extends Component
{
    public $search;
    public $textSearch;

    public function mount($search){
        $this->search = $search;
    }

    public function render()
    {
        if($this->search == "all"){
            $salons = Salon::where('status_salon', "ACCEPTED")->get();
        }
        else{
            $salons = Salon::where('status_salon', "ACCEPTED")->where('name_salon', 'LIKE', '%'.$this->search.'%')->get();
        }

        return view('livewire.list-salon-home',[
            'salons' => $salons
        ])->layout(\App\View\Components\HomeLayout::class);
    }

    public function searchBtn(){
        if($this->textSearch != null){
            return redirect()->route('list.salon.home', ['search' => $this->textSearch]);
        }
        else{
            return redirect()->route('list.salon.home', ['search' => "all"]);
        }
        
    }
}
