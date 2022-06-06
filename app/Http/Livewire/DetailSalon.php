<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Salon;
use App\Models\ProductSalon;
use App\Models\BannerImageSalon;
use App\Models\WorksHourSalon;
use App\Models\Review;
use Livewire\WithPagination;

class DetailSalon extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $salonName;
    public $idSalon;
    public $overalRating;

    public function mount($salonName, $id){
        $this->salonName = $salonName;
        $this->idSalon = $id;
    }

    public function render()
    {
        $salon = Salon::find($this->idSalon);
        $products = ProductSalon::where('id_salon', $this->idSalon)->get();
        $bannerImages = BannerImageSalon::where('id_salon', $this->idSalon)->get();
        $workHours = WorksHourSalon::where('id_salon', $this->idSalon)->get();
        $reviews = Review::where('id_salon', $this->idSalon)->get();
        $reviewsPaginate = Review::where('id_salon', $this->idSalon)->paginate(5);
        $this->overalRating = round($reviews->avg("star"), 2);

        return view('livewire.detail-salon',[
            'salon' => $salon,
            'products' => $products,
            'bannerImages' => $bannerImages,
            'workHours' => $workHours,
            'reviews' => $reviews,
            'reviewsPaginate' => $reviewsPaginate
        ])->layout('layouts.home');
    }

    function getPrecentages($inputValue, $totalStar) {
        if($inputValue == 0 && $totalStar == 0){
            $rating = $inputValue * 100 / $totalStar;
        }
        else{
            $rating = 0;
        }

        return $rating;
    }

    function getOverallReview($overalRating){
        if($overalRating < 1){
            $star = '<i class="fa-regular fa-star"></i>';
        }
        else if($overalRating >= 1 && $overalRating < 1.5){
            $star = '<i class="fa-solid fa-star"></i>';
        }
        else if($overalRating > 1.5 && $overalRating <= 2){
            $star = '<i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i>';
        }
        else if($overalRating >= 2 && $overalRating < 2.5){
            $star = '<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>';
        }
        else if($overalRating > 2.5 && $overalRating <= 3){
            $star = '<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i>';
        }
        else if($overalRating >= 3 && $overalRating < 4.5){
            $star = '<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>';
        }
        else if($overalRating > 4.5 && $overalRating < 5){
            $star = '<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i>';
        }
        else if($overalRating == 5){
            $star = '<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>';
        }
        
        return $star;
    }
}
