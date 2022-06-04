<div style="margin-bottom: 30%; margin-top: 1%">
    @push('styles')
    <link rel="stylesheet" href="{{asset('assets/css/review.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/modales.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/acordeon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/navbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pagina2/salones.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pagina2/queries.css')}}">
    @endpush

    <!-- Acordeón + Salones -->
    <div class="container">
        <div class="row">

            <!-- Acordeón Filtros-->
            <div class="col-12 col-lg-4 mb-4 mb-lg-0">
                <div class="accordion" id="accordionExample">
                    <!-- Categoría -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button" type="button" data-bs-target="#collapseOne"
                                data-bs-target="#collapseCategoria" aria-expanded="true" aria-controls="collapseOne">
                                Profile
                            </button>
                        </h2>
                        <div id="collapseCategoria" class="accordion-collapse collapse show" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul class="lista-categorias">
                                    <li><a href="{{ route('dashboard') }}"class="ms-2">Dashboard</a></label></li>
                                    <li><a href="{{ route('user.edit.profile') }}"class="ms-2">Edit Profile</a></label></li>
                                    <li><a href="{{ route('user.myorder') }}" class="ms-2">Pesanan Saya</a></label></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-8">
                <div class="row">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row align-items-center">
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Total Pesanan</p>
                                        <h4 class="card-title">{{ $bookings->count() }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
