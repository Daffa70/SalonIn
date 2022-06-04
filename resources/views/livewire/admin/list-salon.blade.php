<div class="content">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Semua Salon</h2>
                    <h5 class="text-white op-7 mb-2">SalonIn</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page">List Salon</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('admin.pendingsalon') }}">List Salon Pending</a>
                    </li>
                </ul>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Salon</th>
                            <th scope="col">Owner Salon</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No.Hp</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($salons as $key => $salon)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $salon->name_salon }}</td>
                            <td>{{ $salon->user->name }}</td>
                            <td>{{ $salon->address }}</td>
                            <td>{{ $salon->no_hp }}</td>
                            <td>{{ $salon->status_salon }}</td>
                            @if ($salon->status_salon == "PENDING")
                            <td style="cursor: pointer"><i class="fa fa-solid fa-clipboard-check"
                                    wire:click="showModalInfo({{ $salon->id }})"></i></td>
                            @else
                            <td></td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @if ($idSalon != null)
    <div id="modal-info" wire:ignore.self class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="my-modal-title">Salon - {{ $salonName }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </div>
                <div class="modal-body">
                    <ul class="list-group">
                        <li
                            class="list-group-item border-0 border-bottom-1 d-flex justify-content-between align-items-center">
                            Nama Owner<span class="pull-right">{{ $ownerName }}</span>
                        </li>
                        <li
                            class="list-group-item border-0 border-bottom-1 d-flex justify-content-between align-items-center">
                            Alamat <span class="pull-right">{{ $addressSalon }}</span>
                        </li>
                        <li
                            class="list-group-item border-0 border-bottom-1 d-flex justify-content-between align-items-center">
                            No.Hp <span class="pull-right">{{ $phoneSalon }}</span>
                        </li>
                        <li
                            class="list-group-item border-0 border-bottom-1 d-flex justify-content-between align-items-center">
                            Status <span class="pull-right">{{ $statusSalon }}</span>
                        </li>
                        <li
                            class="list-group-item border-0 border-bottom-1 d-flex justify-content-between align-items-center">
                            Image
                        </li>
                        @foreach ($images as $image)
                        <br>
                        <div class="col-3 card me-1 mb-1">
                            <img src="{{ asset('storage/'.$image->image) }}">
                        </div>
                        @endforeach
                    </ul>
                </div>
                <div class="modal-footer">
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

            window.livewire.on('hideModal', (data) => {
                // console.log(data)
                $('#modal-konfirmasi').modal('hide')
                $('#modal-info').modal('hide')
            });

        })

    </script>
</div>
