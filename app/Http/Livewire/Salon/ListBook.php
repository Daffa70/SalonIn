<?php

namespace App\Http\Livewire\Salon;

use Livewire\Component;
use App\Models\Booking;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ListBook extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $isEdit = false;
    public $idBooking;

    public function render()
    {
        $bookings = Booking::where('payment_status', "ACCEPTED")->where('id_salon', Auth::user()->salon->id)->paginate(20);
        return view('livewire.salon.list-book', [
            'bookings' => $bookings
        ]);
    }

    public function showModalFinish($id){
        $this->idBooking = $id;

        $this->emit('showModalKonfirmasi');
    }
    
    public function finish(){
        Booking::where('id', $this->idBooking)->update([
            'payment_status' => "FINISH"
        ]);

        $this->emit('showAlert', ['msg' => "Pesanan berhasil di selesaikan"]);
    }


}
