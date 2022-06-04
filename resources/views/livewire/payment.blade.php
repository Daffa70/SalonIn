<div style="margin-bottom: 10%">
    @push('styles')
    <link rel="stylesheet" href="{{asset('assets/css/pagina4/queries.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pagina4/pago.css')}}">
    @endpush
    <nav aria-label="breadcrumb" class="container d-lg-block border-light mb-3 p-2 w-75 w-md-100" id="breadcrumb"
        style="margin-top: 5%">
        <ol class="breadcrumb">
        </ol>
    </nav>
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    <div class="container main w-75 w-md-100 mb-5">
        <div class="row">
            <aside class="infobar col-12 col-lg-4 m-0 row p-3">
                <div class="infobar-salon col-12 d-flex justify-content-center align-items-center mb-4">
                    <img class="infobar-img" src="{{ asset('storage/'.$booking->salon->image_logo) }}" alt="Baffi">
                    <div>
                        <a href="shop_baffi.html">
                            <h4 class="mt-3">{{ $booking->salon->name_salon }}</h4>
                            <h5>Booking Code : {{ $booking->booking_code }}</h5>
                        </a>
                    </div>
                </div>
                <div>
                    <h5>{{ $booking->product->packet_name }}</h5>
                    <p>{{ $booking->product->desc }}</p>
                    <h6>Total Transfer: Rp. {{ number_format($booking->product->price) }}</h6>
                </div>
                </section>
            </aside>
            <div class="col-12 col-lg-8 row p-2 ms-1 m-lg-0">
                @if ($booking->payment_status == "WAITING PAYMENT")
                <h4>Harap segera melakukan pembayaran</h4>
                <p><i>Pembayaran akan dibatalkan secara otomatis dalam 24 jam, Bayar Sebelum {{ $booking->created_at->addHours(24) }}</i></p>
                @endif
                <ul class="Columna1 col-12 col-lg-6 d-flex flex-column flex-wrap justify-content-evenly p-lg-4">
                    <!-- <br><br><br><br> -->
                    @if ($booking->payment_status == "WAITING PAYMENT")
                    <h5>Uploud bukti transfer</h5>
                    <label for="image-picker">
                        @if (optional($imagetransfer)->temporaryUrl())
                        <img id="image-preview" src="{{ $imagetransfer->temporaryUrl() }}"
                            alt="your image" width="200" height="200"/>
                        @elseif ($imagetransfer != null)
                        <img id="image-preview" src="{{ asset('storage/'.$imagetransfer) }}"
                        width="200" height="200"/>
                        @else
                        <img id="image-preview" src="{{asset('assets/img/avatar.svg')}}"
                            alt="your image" width="200" height="200"/>
                        @endif
                    </label>
                    <input id="image-picker" wire:model="imagetransfer" type="file" accept="image/*" class="d-none" />
                    <br>
                    <div wire:loading wire:target="imagetransfer">Uploading...</div>
                    @error('imagetransfer')
                    <small id="helpId" class="text-danger">{{ $message }}</small>
                    @enderror
                    @elseif ($booking->payment_status == "Selesai")
                    <h4>Review</h4>
                    @else
                    <h4>Status pembayaran : {{ $booking->payment_status }}</h4>
                    @endif
                    <div class="d-flex flex-column justify-content-evenly">
                    </div>
                    <h6>Waktu Layanan : {{ $booking->time_service }}</h6>
                    <p><i>Harap datang kurang dari 10 menit</i></p>
                </ul>
                <ul class="Columna2 col-12 col-lg-6 d-flex flex-column p-lg-4">
                    @if ($booking->payment_status == "WAITING PAYMENT")
                    <h4>Lakukan pembayaran ke rekening : BCA 41414141141 a/n P.T SalonIn</h4>
                    @endif
                </ul>
                @if ($booking->payment_status == "WAITING PAYMENT")
                <button type="button" class="btn btn-dark w-50" id="botonReservar"
                wire:click="payment">Konfirmasi Pembayaran</button>
                @endif
            </div>
        </div>
    </div>
</div>
