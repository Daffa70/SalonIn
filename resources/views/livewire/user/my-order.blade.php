<div style="margin-bottom: 30%; margin-top: 1%">
    @push('styles')
    <link rel="stylesheet" href="{{asset('assets/css/review.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/acordeon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/navbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pagina2/salones.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pagina2/queries.css')}}">

    <style>
        body {
            background-color: #eee;
        }

        div.stars {

            width: 270px;

            display: inline-block;

        }

        .mt-200 {
            margin-top: 200px;
        }

        input.star {
            display: none;
        }



        label.star {

            float: right;

            padding: 10px;

            font-size: 25px;

            color: #4A148C;

            transition: all .2s;

        }



        input.star:checked~label.star:before {

            content: '\f005';

            color: #FD4;

            transition: all .25s;

        }


        input.star-5:checked~label.star:before {

            color: #FE7;

            text-shadow: 0 0 20px #952;

        }



        input.star-1:checked~label.star:before {
            color: #F62;
        }



        label.star:hover {
            transform: rotate(-15deg) scale(1.3);
        }



        label.star:before {
            content: '\f006';
            font-family: FontAwesome;
        }

    </style>
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
                        <div id="collapseCategoria" class="accordion-collapse collapse show"
                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul class="lista-categorias">
                                    <li><a href="{{ route('dashboard') }}" class="ms-2">Dashboard</a></label></li>
                                    <li><a href="{{ route('user.edit.profile') }}" class="ms-2">Edit Profile</a></label>
                                    </li>
                                    <li><a href="{{ route('user.myorder') }}" class="ms-2">Pesanan Saya</a></label></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-8">
                <div class="row">
                    @foreach ($bookings as $booking)
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <h4>Kode Booking</h4>
                                        <h5>Status : {{ $booking->payment_status }}</h5>
                                        <h5>{{ $booking->booking_code }}</h5>
                                        <h6>Salon : {{ $booking->salon->name_salon }}</h6>
                                        <h6>Waktu Layanan : {{ $booking->time_service }}</h6>
                                    </div>
                                </div>
                            </div>
                            @if ($booking->payment_status == "FINISH")
                            <a wire:click="showModalReview({{ $booking->id }})" class="btn btn-primary stretched-link">Beri Ulasan</a>
                            @else
                            <a href="{{ route('payment', ['bookingcode' => $booking->booking_code]) }}"
                                class="btn btn-primary stretched-link">Lihat Selengkapnya</a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                    {{ $bookings->links() }}
                </div>
            </div>
        </div>
    </div>

    <div id="modal-add" wire:ignore.self class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
        aria-hidden="true" class="justify-content-center">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="my-modal-title">Beri Ulasan</h4>
                </div>
                <div class="stars" wire:ignore>
                    <input class="star star-5" id="star-5" type="radio" name="star" wire:model = "star" value="5"/>
                    <label class="star star-5" for="star-5"></label>
                    <input class="star star-4" id="star-4" type="radio" name="star" wire:model = "star" value="4"/>
                    <label class="star star-4" for="star-4"></label>
                    <input class="star star-3" id="star-3" type="radio" name="star" wire:model = "star" value="3"/>
                    <label class="star star-3" for="star-3"></label>
                    <input class="star star-2" id="star-2" type="radio" name="star" wire:model = "star" value="2"/>
                    <label class="star star-2" for="star-2"></label>
                    <input class="star star-1" id="star-1" type="radio" name="star" wire:model = "star" value="1"/>
                    <label class="star star-1" for="star-1"></label>
                </div>
                <div class="modal-body">
                    <div class="form-group {{$errors->has('review') ? 'has-error has-feedback' : '' }}">
                        <label for="review" class="placeholder"><b>Review</b></label>
                        <textarea id="review" name="review" wire:model="review" type="text" class="form-control" rows="5">
                        </textarea>
                        <small id="helpId{{'review'}}"
                            class="text-danger">{{ $errors->has('review') ? $errors->first('review') : '' }}</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" wire:click = "submitReview">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('livewire:load', function (e) {
            e.preventDefault()

            window.livewire.on('showModalReview', (data) => {
                // console.log(data)
                $('#modal-add').modal('show')
            });

            window.livewire.on('showModalEdit', (data) => {
                // console.log(data)
                $('#modal-edit').modal('show')
            });

            window.livewire.on('showModalDelete', (data) => {
                // console.log(data)
                $('#modal-konfirmasidelete').modal('show')
            });

            window.livewire.on('hideModal', (data) => {
                $('#modal-add').modal('hide')
                $('#modal-edit').modal('hide')
                $('#modal-konfirmasidelete').modal('hide')
            });


        })

    </script>
</div>
