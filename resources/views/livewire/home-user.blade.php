<div>
    <section class="w-100 col inputsLugarContainer">

        <img src="{{asset('assets/img/background_home.webp')}}" class="imageInputfondo" alt="">

        <div class="col-12 d-flex align-items-center alturafija" id="fotoForm">
            <div class="container-form col-9 col-sm-7 col-md-5 col-lg-4 d-flex align-items-center rounded-3">
                <div>
                    <div class="container-text mx-3">
                        <h3 class="text-center">Mau booking salon/barber?</h3>
                    </div>
                    <div class="mx-5"><label for="exampleDataList" class="form-label">
                        </label>
                        <div class="d-grid gap-2">
                            <input class="form-control" id="search" type="search" placeholder="Cari salon/barber disini"
                                aria-label="Search" wire:model="search">
                            <button class="btn btn-primario mt-2" type="button" wire:click = "searchBtn">Cari</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section
        class="estadisticas container-fluid d-flex flex-column justify-content-center align-items-center py-5 px-5">
        <div class="col-12 d-flex justify-content-center pb-3">
            <h2 class="">Kenapa harus menggunakan jasa kami?</h2>
        </div>

        <div class="d-flex justify-content-evenly flex-wrap col-12">

            <div class="d-flex justify-content-center align-items-center flex-column pt-2 mx-5">
                <i class="far fa-clock fa-3x"></i>
                <h2 class="mt-2">{{ $bookings->count() }}</h2>
                <p>Jumlah Reservasi</p>
            </div>

            <div class="d-flex justify-content-center align-items-center flex-column pt-2 mx-5">
                <i class="fas fa-cut fa-3x"></i>
                <h2>{{ $salons->count() }}</h2>
                <p>Jumlah Mitra Salon/Barber</p>
            </div>

            <div class="d-flex justify-content-center align-items-center flex-column pt-2 mx-5">
                <i class="fas fa-hot-tub fa-3x"></i>
                <h2>{{ $product->count() }}</h2>
                <p>Jumlah Layanan Yang Tersedia</p>
            </div>

        </div>
    </section>


    <section class="container-fluid destacado bg-light mt-5 pt-3 col-12" style="margin-bottom: 3%">
        <h5>Beberapa Salon Mitra Kami</h5>
        <div class="fila row justify-content-center">
            <div class="contenedorDeLaCartas d-flex justify-content-around flex-wrap ">
                @foreach ($salons as $salon)
                <div class="card col-3 card-destacados">
                    <img class="card-img-top card-destacados-img" src="{{ asset('storage/'.$salon->image_logo) }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $salon->name_salon }}</h5>
                        <p class="card-text">{{ $salon->address }}</p>
                        <a href="{{ route('detail.salon', ['salonName' => str_replace(' ', '-', $salon->name_salon), 'id' => $salon->id]) }}" class="btn btn-primario">Reservasi</a>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
</div>
