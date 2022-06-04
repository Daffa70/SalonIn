<div style="margin-bottom: 20%">
    @push('styles')
    <link rel="stylesheet" href="{{asset('assets/css/review.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/modales.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/acordeon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/navbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pagina2/salones.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pagina2/queries.css')}}">
    @endpush
    <div class="container d-flex justify-content-center" style="margin-top: 3%">
        <div class="col-md-8">
            <div class="form-group">
                <div class="input-group">
                    <input id="1" class="form-control" type="text" name="search" placeholder="Search..." wire:model = "textSearch" />
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="button" wire:click = "searchBtn">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <nav aria-label="breadcrumb" class="container d-lg-block border-light mb-3 p-2 w-75 w-md-100" id="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('user.home') }}" class="link-ul">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Salon/Barber</li>
        </ol>
    </nav>
    <div class="container">
        <div class="row">
            @if ($salons->count() != 0)
            @foreach ($salons as $key => $salon)
            <div class="col-12 col-lg-8">
                <div class="salon container pt-2 pt-lg-0">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <a
                                href="{{ route('detail.salon', ['salonName' => str_replace(' ', '-', $salon->name_salon), 'id' => $salon->id]) }}"><img
                                    src="{{ asset('storage/'.$salon->image_logo) }}" alt="" class="salon-img m-0 m-lg-4"></a>
                        </div>
                        <div class="col-12 col-lg-8 mt-4">
                            <a
                                href="{{ route('detail.salon', ['salonName' => str_replace(' ', '-', $salon->name_salon), 'id' => $salon->id]) }}">
                                <h3 class="salon-titulo">
                                    {{ $salon->name_salon }}
                                </h3>
                            </a>
                            <p class="salon-desc">{{ round($salon->review->avg('star'), 2) }}
                                @if(round($salon->review->avg('star'), 2) < 1)
                                <i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i>
                                @elseif(round($salon->review->avg('star'), 2) >= 1 && round($salon->review->avg('star'), 2) < 1.5)
                                    <i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i>
                                @elseif(round($salon->review->avg('star'), 2) >= 1.5 && round($salon->review->avg('star'), 2) < 2)
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i>
                                @elseif(round($salon->review->avg('star'), 2) >= 2 && round($salon->review->avg('star'), 2) < 2.5)
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i>
                                @elseif(round($salon->review->avg('star'), 2) >= 2.5 && round($salon->review->avg('star'), 2) < 3)
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i>
                                @elseif(round($salon->review->avg('star'), 2) >= 3 && round($salon->review->avg('star'), 2) < 3.5)
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i>
                                @elseif(round($salon->review->avg('star'), 2) >= 3.5 && round($salon->review->avg('star'), 2) < 4)
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star-half-stroke"></i><i class="fa-regular fa-star"></i>
                                @elseif(round($salon->review->avg('star'), 2) >= 4 && round($salon->review->avg('star'), 2) < 4.5)
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star-half-stroke"></i>
                                @elseif(round($salon->review->avg('star'), 2) == 5)
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                @endif
                            </p>
                            <p class="salon-desc">Deskripsi</p>
                            <p class="salon-ubic">{{ $salon->address }}</p>
                            <a href="{{ route('detail.salon', ['salonName' => str_replace(' ', '-', $salon->name_salon), 'id' => $salon->id]) }}"
                                class="salon-btn btn btn-outline-dark">Lihat Layanan</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-12 col-lg-8" style="margin-bottom: 10%">
                <div class="salon container pt-2 pt-lg-0">
                    <div class="row">
                        <h2>Pencarian tidak ditemukan</h2>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
