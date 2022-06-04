<div>
    @push('styles')
    <link rel="stylesheet" href="{{asset('assets/css/review.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/modales.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/acordeon.css')}}">
    @endpush
    <nav aria-label="breadcrumb" class="container d-lg-block border-light mb-3 p-2 w-75 w-md-100" style="margin-top: 3%"
        id="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('user.home') }}" class="link-ul">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('list.salon.home', ['search' => "all"]) }}"
                    class="link-ul">Salon/Barber</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $salon->name_salon }}</li>
        </ol>
    </nav>

    <!--Lado izquierdo-->
    <!-- Carrusel -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">
                @if ($bannerImages->count() != 0)
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" wire:ignore>
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($bannerImages as $key => $image)
                            @if ($key == 0)
                            <div class="carousel-item active">
                                <img src="{{ asset('storage/'.$image->image) }}" class="d-block w-100 carrusel-item"
                                    height="400">
                            </div>
                            @else
                            <div class="carousel-item">
                                <img src="{{ asset('storage/'.$image->image) }}" class="d-block w-100 carrusel-item"
                                    height="400">
                            </div>
                            @endif
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    </button>
                </div>
                @endif
                <div class="accordion mt-4 mb-4 mb-lg-0" id="accordionExample" wire:ignore>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Layanan
                            </button>
                        </h2>
                    </div>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample" wire:ignore>
                        <div class="accordion-body">
                            <div>
                                @foreach ($products as $product)
                                <h3 class="Barba" id="Barba">{{ $product->packet_name }}</h3>
                                <p>{{ $product->desc }}</p>
                                <h5>Rp. {{ number_format($product->price) }}</h5>
                                <div>
                                    <a type="button" class="btn btn-primario" href="{{ route('reservasi', ['id' => $product->id]) }}">Reservasi</a>
                                </div>
                                <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 mb-4 mb-lg-0">
                    <div class="container" style="margin-bottom: 4%">
                        <div id="reviews" class="review-section">
                            <h3>Review</h3>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h4 class="m-0">{{ $reviews->count() }} Review, Overrall: {{ $overalRating }}
                                    @if($overalRating < 1)
                                        <i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i>
                                    @elseif($overalRating >= 1 && $overalRating < 1.5)
                                        <i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i>
                                    @elseif($overalRating >= 1.5 && $overalRating < 2)
                                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i>
                                    @elseif($overalRating >= 2 && $overalRating < 2.5)
                                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i>
                                    @elseif($overalRating >= 2.5 && $overalRating < 3)
                                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i>
                                    @elseif($overalRating >= 3 && $overalRating < 3.5)
                                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i>
                                    @elseif($overalRating >= 3.5 && $overalRating < 4)
                                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star-half-stroke"></i><i class="fa-regular fa-star"></i>
                                    @elseif($overalRating >= 4 && $overalRating < 4.5)
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star-half-stroke"></i>
                                    @elseif($overalRating == 5)
                                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    @endif
                                    
                                </h4>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="stars-counters">
                                        <tbody>
                                            <tr class="">
                                                <td>
                                                    <span>
                                                        <button
                                                            class="fit-button fit-button-color-blue fit-button-fill-ghost fit-button-size-medium stars-filter">5
                                                            Stars</button>
                                                    </span>
                                                </td>
                                                <td class="progress-bar-container">
                                                    <div class="fit-progressbar fit-progressbar-bar star-progress-bar">
                                                        <div class="fit-progressbar-background">
                                                            <span class="progress-fill" style="width: {{ $this->getPrecentages($reviews->where('star', "5")->count(), $reviews->count()) }}%;"></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="star-num">{{ $reviews->where('star', "5")->count() }}</td>
                                            </tr>
                                            <tr class="">
                                                <td>
                                                    <span>
                                                        <button
                                                            class="fit-button fit-button-color-blue fit-button-fill-ghost fit-button-size-medium stars-filter">4
                                                            Stars</button>
                                                    </span>
                                                </td>
                                                <td class="progress-bar-container">
                                                    <div class="fit-progressbar fit-progressbar-bar star-progress-bar">
                                                        <div class="fit-progressbar-background">
                                                            <span class="progress-fill" style="width: {{ $this->getPrecentages($reviews->where('star', "4")->count(), $reviews->count()) }}%;"></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="star-num">{{ $reviews->where('star', "4")->count() }}</td>
                                            </tr>
                                            <tr class="">
                                                <td>
                                                    <span>
                                                        <button
                                                            class="fit-button fit-button-color-blue fit-button-fill-ghost fit-button-size-medium stars-filter">3
                                                            Stars</button>
                                                    </span>
                                                </td>
                                                <td class="progress-bar-container">
                                                    <div class="fit-progressbar fit-progressbar-bar star-progress-bar">
                                                        <div class="fit-progressbar-background">
                                                            <span class="progress-fill" style="width: {{ $this->getPrecentages($reviews->where('star', "3")->count(), $reviews->count()) }}%;"></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="star-num">{{ $reviews->where('star', "3")->count() }}</td>
                                            </tr>
                                            <tr class="">
                                                <td>
                                                    <span>
                                                        <button
                                                            class="fit-button fit-button-color-blue fit-button-fill-ghost fit-button-size-medium stars-filter">2
                                                            Stars</button>
                                                    </span>
                                                </td>
                                                <td class="progress-bar-container">
                                                    <div class="fit-progressbar fit-progressbar-bar star-progress-bar">
                                                        <div class="fit-progressbar-background">
                                                            <span class="progress-fill" style="width: {{ $this->getPrecentages($reviews->where('star', "2")->count(), $reviews->count()) }}%;"></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="star-num">{{ $reviews->where('star', "2")->count() }}</td>
                                            </tr>
                                            <tr class="">
                                                <td>
                                                    <span>
                                                        <button
                                                            class="fit-button fit-button-color-blue fit-button-fill-ghost fit-button-size-medium stars-filter">1
                                                            Stars</button>
                                                    </span>
                                                </td>
                                                <td class="progress-bar-container">
                                                    <div class="fit-progressbar fit-progressbar-bar star-progress-bar">
                                                        <div class="fit-progressbar-background">
                                                            <span class="progress-fill" style="width: {{ $this->getPrecentages($reviews->where('star', "1")->count(), $reviews->count()) }}%;"></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="star-num">{{ $reviews->where('star', "1")->count() }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @foreach ($reviewsPaginate as $item)
                        <div class="review-list">
                            <ul>
                                <li>
                                    <div class="d-flex">
                                        <div class="left">
                                            <span>
                                                <img src="{{ asset('storage/'.$item->user->member->avatar) }}"
                                                    class="profile-pict-img img-fluid" alt="" />
                                            </span>
                                        </div>
                                        <div class="right">
                                            <h4>
                                                {{ $item->user->name }}
                                                <span class="gig-rating text-body-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792"
                                                        width="15" height="15">
                                                        <path fill="currentColor"
                                                            d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                                                        </path>
                                                    </svg>
                                                    {{ $item->star }}
                                                </span>
                                            </h4>
                                            <div class="review-description">
                                                <p>
                                                    {{ $item->review }}
                                                </p>
                                            </div>
                                            <span class="publish py-3 d-inline-block w-100">{{ $item->created_at }}</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        @endforeach
                        <!-- Review !-->
                        {{ $reviewsPaginate->links() }}
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="m-2 p-1 d-flex justify-content-between ">
                    <div>
                        <h6>About Us</h6>
                        {{ $salon->desc }}
                    </div>
                </div>
                <table class="table horarios">
                    <thead>
                        <tr>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"></th>
                        </tr>
                        @foreach ($workHours as $hour)
                        <tr>
                            <th scope="row">{{ $hour->day }}</th>
                            <td></td>
                            <td></td>
                            <td>{{ $hour->hour }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
