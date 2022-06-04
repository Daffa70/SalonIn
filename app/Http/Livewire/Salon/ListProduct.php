<?php

namespace App\Http\Livewire\Salon;

use Livewire\Component;
use App\Models\Salon;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductSalon;

class ListProduct extends Component
{
    public $name;
    public $desc;
    public $price;
    public $idSalon;
    public $isEdit = false;
    public $idProduct;

    public function render()
    {
        $salon = Salon::where('id_user', Auth::user()->id)->first();
        $products = ProductSalon::where('id_salon', $salon->id)->get();
        $this->idSalon = $salon->id;

        return view('livewire.salon.list-product',[
            'salon' => $salon,
            'products' => $products
        ]);
    }

    public function showModalAdd(){
        $this->name = null;
        $this->desc = null;
        $this->price = null;
        
        $this->emit('showModalAdd');
    }

    public function add(){
        $this->validate([
            'name' => 'required',
            'desc' => 'required',
            'price' => 'required'
        ]);

        ProductSalon::create([
            'packet_name' => $this->name,
            'desc' => $this->desc,
            'price' => $this->price,
            'id_salon' => $this->idSalon
        ]); 

        $this->emit('showAlert', ['msg' => 'Product berhasil ditambah']);
        $this->emit('hideModal');
    }

    public function edit($id){
        $this->isEdit = true;
        $product = ProductSalon::where('id', $id)->first();

        $this->idProduct = $id;
        $this->name = $product->packet_name;
        $this->desc = $product->desc;
        $this->price = $product->price;

        $this->emit('showModalEdit');
    }

    public function storeEdit(){
        ProductSalon::where('id', $this->idProduct)->update([
            'packet_name' => $this->name,
            'desc' => $this->desc,
            'price' => $this->price,
        ]);

        $this->emit('showAlert', ['msg' => 'Product berhasil dirubah']);
        $this->emit('hideModal');
    }

    public function modalDelete($id){
        $this->idProduct = $id;

        $this->emit('showModalDelete');
    }

    public function delete(){
        ProductSalon::where('id', $this->idProduct)->delete();

        $this->emit('showAlert', ['msg' => 'Product berhasil dihapus']);
        $this->emit('hideModal');
    }
}
