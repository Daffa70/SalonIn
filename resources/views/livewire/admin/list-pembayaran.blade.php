<div class="content">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Konfirmasi Pembayaran</h2>
                    <h5 class="text-white op-7 mb-2">SalonIn</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tanggal Pembayaran</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $key => $booking)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $booking->user->name }}</td>
                            <td>{{ $booking->updated_at }}</td>
                            <td style="cursor: pointer"><button type="button" class="btn btn-primary"
                                    wire:click="showModalInfo({{ $booking->id }})"><i
                                        class="fa fa-solid fa-clipboard-check"></i></button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $bookings->links() }}
            </div>
        </div>
    </div>
    @if ($idBooking != null)
    <div id="modal-info" wire:ignore.self class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="my-modal-title">Kode Booking - {{ $bookingCode }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </div>
                <div class="modal-body">
                    <ul class="list-group">
                        <li
                            class="list-group-item border-0 border-bottom-1 d-flex justify-content-between align-items-center">
                            Nama<span class="pull-right">{{ $name }}</span>
                        </li>
                        <li
                            class="list-group-item border-0 border-bottom-1 d-flex justify-content-between align-items-center">
                            No.Hp <span class="pull-right">{{ $phone }}</span>
                        </li>
                        <li
                            class="list-group-item border-0 border-bottom-1 d-flex justify-content-between align-items-center">
                            Status <span class="pull-right">{{ $statusPayment }}</span>
                        </li>
                        <li
                            class="list-group-item border-0 border-bottom-1 d-flex justify-content-between align-items-center">
                            Image
                        </li>
                       <br>
                       <img src="{{ asset('storage/'.$image) }}">
                    </ul>
                </div>
                <div class="modal-footer justify-content-between">
                    <button class="btn btn-danger pull-right" wire:click="showModalReject">Tolak</button>
                    <button class="btn btn-primary pull-right" wire:click="showModalKonfirmasi">Terima</button>
                </div>
            </div>
        </div>
    </div>
    @endif
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
                    <button class="btn btn-primary" wire:click="store">Ya</button>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-konfirmasiReject" wire:ignore.self class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="my-modal-title" aria-hidden="true" class="justify-content-center">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header alert-danger">
                    <h4 class="modal-title" id="my-modal-title">Apakah Anda Yakin?</h4>
                </div>
                <div class="modal-footer justify-content-center">
                    <button class="btn" data-bs-dismiss="modal" aria-label="Close"
                        style="background-color: #616161; color : white;">Batal</button>
                    <button class="btn btn-primary" wire:click="reject">Ya</button>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    @endpush
    <script>
        document.addEventListener('livewire:load', function (e) {
            e.preventDefault()
            window.livewire.on('showModalInfo', (data) => {
                // console.log(data)
                $('#modal-info').modal('show')
            });

            window.livewire.on('showModalKonfirmasi', (data) => {
                // console.log(data)
                $('#modal-konfirmasi').modal('show')
            });

            window.livewire.on('showModalReject', (data) => {
                // console.log(data)
                $('#modal-konfirmasiReject').modal('show')
            });

            window.livewire.on('hideModal', (data) => {
                // console.log(data)
                $('#modal-konfirmasi').modal('hide')
                $('#modal-info').modal('hide')
                $('#modal-konfirmasiReject').modal('hide')
            });

        })

    </script>
</div>
