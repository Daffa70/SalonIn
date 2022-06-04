<?php

namespace App\Http\Livewire\Salon;

use Livewire\Component;
use App\Models\BannerImageSalon;
use App\Models\Salon;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class ImageSalon extends Component
{
    use WithFileUploads;

    public $images = [];
    public $idSalon;
    public $idImage;

    public function render()
    {
        $salon = Salon::where('id_user', Auth::user()->id)->first();
        $this->idSalon = $salon->id;

        $bannerImages = BannerImageSalon::where('id_salon', $salon->id)->get();

        return view('livewire.salon.image-salon',[
            'bannerImages' => $bannerImages
        ]);
    }

    public function showModalAdd(){
        $this->emit('showModalAdd');
    }

    public function modalDelete($id){
        $this->idImage = $id;
        $this->emit('showModalDelete');
    }

    public function add(){
        $this->validate([
            'images' => 'required'
        ]);

        $images = $this->images;
        foreach ($images as $key => $image) {
            $images[$key] = $image->store('bannerSalon', 'public');
            BannerImageSalon::create([
                'image' => $images[$key], 
                'id_salon' => $this->idSalon
            ]);
        }

        $this->emit('showAlert', ['msg' => 'Image berhasil ditambah']);
        $this->emit('hideModal');
    }

    public function delete(){
        BannerImageSalon::where('id', $this->idImage)->delete();

        $this->emit('showAlert', ['msg' => 'Image berhasil dihapus']);
        $this->emit('hideModal');
    }
}
