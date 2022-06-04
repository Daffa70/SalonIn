<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <ul class="list-group">
                        <li
                            class="list-group-item border-0 border-bottom-1 d-flex justify-content-between align-items-center">
                            <h4 class="card-title">
                                <a href="">
                                    <span><i class="fas fa-arrow-left mr-3"></i>Daftar Book Salon</span>
                                </a>
                            </h4>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('salon.listbook') }}">List Booking</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page">History Order</a>
                        </li>
                    </ul>
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Booking ID</th>
                                <th scope="col">Nama</th>
                                <th scope="col">No. Hp</th>
                                <th scope="col">Waktu Layanan</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $key => $booking)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $booking->booking_code }}</td>
                                <td>{{ $booking->user->name }}</td>
                                <td>{{ $booking->user->member->no_hp }}</td>
                                <td>{{ $booking->time_service }}</td>
                                <td>{{ $booking->payment_status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $bookings->links() }}
                </div>
            </div>
        </div>

        <div id="modal-konfirmasi" wire:ignore.self class="modal fade" tabindex="-1" role="dialog"
            aria-labelledby="my-modal-title" aria-hidden="true" class="justify-content-center">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header alert-danger">
                        <h4 class="modal-title" id="my-modal-title">Apakah Anda Yakin?</h4>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button class="btn" data-bs-dismiss="modal" aria-label="Close"
                            style="background-color: #616161; color : white;">Batal</button>
                        <button class="btn btn-primary" wire:click="delete">Ya</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('livewire:load', function (e) {
                e.preventDefault()

                window.livewire.on('showModalKonfirmasi', (data) => {
                    // console.log(data)
                    $('#modal-konfirmasi').modal('show')
                });


                window.livewire.on('hideModal', (data) => {
                    $('#modal-add').modal('hide')
                    $('#modal-edit').modal('hide')
                    $('#modal-konfirmasi').modal('hide')
                });


            })

        </script>
    </div>
</div>
