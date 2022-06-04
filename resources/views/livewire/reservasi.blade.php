<div style="margin-bottom: 10%">
    @push('styles')
    <link rel="stylesheet" href="{{asset('assets/css/pagina4/queries.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pagina4/pago.css')}}">
    @endpush
    <nav aria-label="breadcrumb" class="container d-lg-block border-light mb-3 p-2 w-75 w-md-100" id="breadcrumb"
        style="margin-top: 5%">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('user.home') }}" class="link-ul">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('list.salon.home', ['search' => "all"]) }}"
                    class="link-ul">Salon/Barber</a></li>
            <li class="breadcrumb-item"><a
                    href="{{ route('detail.salon', ['salonName' => str_replace(' ', '-', $salon->name_salon), 'id' => $salon->id]) }}"
                    class="link-ul">{{ $salon->name_salon }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Reservasi</li>
        </ol>
    </nav>
    <div class="container main w-75 w-md-100 mb-5">
        <div class="row">
            <aside class="infobar col-12 col-lg-4 m-0 row p-3">
                <div class="infobar-salon col-12 d-flex justify-content-center align-items-center mb-4">
                    <img class="infobar-img" src="{{ asset('storage/'.$salon->image_logo) }}" alt="Baffi">
                    <div>
                        <a href="shop_baffi.html">
                            <h4 class="ms-2 mt-3">{{ $salon->name_salon }}</h4>
                        </a>
                    </div>
                </div>
                <div>
                    <h5>{{ $product->packet_name }}</h5>
                    <p>{{ $product->desc }}</p>
                    <h6>Rp. {{ number_format($product->price) }}</h6>
                </div>
                </section>
            </aside>
            <div class="col-12 col-lg-8 row p-2 ms-1 m-lg-0">
                <ul class="Columna1 col-12 col-lg-6 d-flex flex-column flex-wrap justify-content-evenly p-lg-4">
                    <!-- <br><br><br><br> -->
                    <div class="w-95 p-3 align-center" style="margin-top: -2% !important;">
                        <label for="name" class="form-label">Name<span style="color: red">*</span>
                            <small id="helpId{{'name'}}"
                                class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</small>
                        </label>
                        <input type="text" class="form-control" id="name" name="name" wire:model="name"
                            placeholder="Name">
                    </div>
                    <div class="w-95 p-3 align-center" style="margin-top: -2% !important;">
                        <label for="no_hp" class="form-label">No Hp<span style="color: red">*</span>
                            <small id="helpId{{'no_hp'}}"
                                class="text-danger">{{ $errors->has('no_hp') ? $errors->first('no_hp') : '' }}</small>
                        </label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" wire:model="no_hp"
                            placeholder="No Handphone">
                    </div>
                    <div class="w-95 p-3 align-center" style="margin-top: -2% !important;">
                        <label for="address" class="form-label">Address<span style="color: red">*</span>
                            <small id="helpId{{'address'}}"
                                class="text-danger">{{ $errors->has('address') ? $errors->first('address') : '' }}</small>
                        </label>
                        <textarea type="text" class="form-control" id="address" name="address" wire:model="address"
                            placeholder="Address">
                        </textarea>
                    </div>
                    <div class="d-flex flex-column justify-content-evenly">
                    </div>
                </ul>
                <ul class="Columna2 col-12 col-lg-6 d-flex flex-column p-lg-4">
                    <div class="w-95 p-3" style="margin-top: -2% !important;">
                        <label for="timeService" class="form-label">Waktu Layanan<span style="color: red">*</span>
                            <small id="helpId{{'timeService'}}"
                                class="text-danger">{{ $errors->has('timeService') ? $errors->first('timeService') : '' }}</small>
                        </label>
                        <input type="datetime-local" class="form-control" id="timeService" name="timeService" wire:model="timeService">
                    </div>
                </ul>
                <button type="button" class="btn btn-dark w-50" id="botonReservar"
                    wire:click="checkout">Checkout</button>
            </div>
        </div>
    </div>
</div>
