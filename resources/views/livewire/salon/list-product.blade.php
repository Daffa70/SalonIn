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
                                    <span><i class="fas fa-arrow-left mr-3"></i>Product</span>
                                </a>
                            </h4>
                            <button class="btn btn-primary pull-right" wire:click="showModalAdd"
                                wire:loading.attr="disabled" title="tambahProduct">Tambah Product</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Packet Nama</th>
                                <th scope="col">Desc</th>
                                <th scope="col">Price</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $product)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $product->packet_name }}</td>
                                <td>{{ $product->desc }}</td>
                                <td>Rp. {{ number_format($product->price) }}</td>
                                <td><button class="btn btn-primary" wire:loading.attr="disabled"
                                        wire:click="edit({{ $product->id }})" title="Delete"><i
                                            class="fas fa-pen"></i></button>
                                    <button class="btn btn-danger" wire:loading.attr="disabled"
                                        wire:click="modalDelete({{ $product->id }})" title="Hapus"><i
                                            class="fas fa-trash"></i></button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="modal-add" wire:ignore.self class="modal fade" tabindex="-1" role="dialog"
            aria-labelledby="my-modal-title" aria-hidden="true" class="justify-content-center">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="my-modal-title">Tambah Product</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group {{$errors->has('name') ? 'has-error has-feedback' : '' }}">
                            <label for="name" class="placeholder"><b>Nama Product</b></label>

                            <input id="name" name="name" wire:model="name" type="text" class="form-control">
                            <small id="helpId{{'name'}}"
                                class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</small>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group {{$errors->has('desc') ? 'has-error has-feedback' : '' }}">
                            <label for="desc" class="placeholder"><b>Deskripsi</b></label>

                            <input id="desc" name="desc" wire:model="desc" type="text" class="form-control">
                            <small id="helpId{{'desc'}}"
                                class="text-danger">{{ $errors->has('desc') ? $errors->first('desc') : '' }}</small>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group {{$errors->has('price') ? 'has-error has-feedback' : '' }}">
                            <label for="price" class="placeholder"><b>Price</b></label>

                            <input id="price" name="price" wire:model="price" type="text" class="form-control">
                            <small id="helpId{{'price'}}"
                                class="text-danger">{{ $errors->has('price') ? $errors->first('price') : '' }}</small>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button class="btn btn-primary" wire:click="add">Tambah</button>
                    </div>
                </div>
            </div>
        </div>

        @if ($isEdit == true)
        <div id="modal-edit" wire:ignore.self class="modal fade" tabindex="-1" role="dialog"
            aria-labelledby="my-modal-title" aria-hidden="true" class="justify-content-center">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="my-modal-title">Tambah Product</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group {{$errors->has('name') ? 'has-error has-feedback' : '' }}">
                            <label for="name" class="placeholder"><b>Nama Product</b></label>

                            <input id="name" name="name" wire:model="name" type="text" class="form-control">
                            <small id="helpId{{'name'}}"
                                class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</small>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group {{$errors->has('desc') ? 'has-error has-feedback' : '' }}">
                            <label for="desc" class="placeholder"><b>Deskripsi</b></label>

                            <input id="desc" name="desc" wire:model="desc" type="text" class="form-control">
                            <small id="helpId{{'desc'}}"
                                class="text-danger">{{ $errors->has('desc') ? $errors->first('desc') : '' }}</small>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group {{$errors->has('price') ? 'has-error has-feedback' : '' }}">
                            <label for="price" class="placeholder"><b>Price</b></label>

                            <input id="price" name="price" wire:model="price" type="text" class="form-control">
                            <small id="helpId{{'price'}}"
                                class="text-danger">{{ $errors->has('price') ? $errors->first('price') : '' }}</small>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button class="btn btn-primary" wire:click="storeEdit">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div id="modal-konfirmasidelete" wire:ignore.self class="modal fade" tabindex="-1" role="dialog"
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

                window.livewire.on('showModalAdd', (data) => {
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
</div>
