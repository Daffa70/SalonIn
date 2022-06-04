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
                                    <span><i class="fas fa-arrow-left mr-3"></i>Image</span>
                                </a>
                            </h4>
                            <button class="btn btn-primary pull-right" wire:click="showModalAdd"
                                wire:loading.attr="disabled" title="tambahProduct">Tambah Image</button>
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
                                <th scope="col">Image</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bannerImages as $key => $image)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td><img id="image-preview" src="{{ asset('storage/'.$image->image) }}" width="200"
                                        height="200" /></td>
                                <td><button class="btn btn-danger" wire:loading.attr="disabled"
                                        wire:click="modalDelete({{ $image->id }})" title="Hapus"><i
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
                        <div class="w-95 p-3 align-center" style="margin-top: -2% !important;">
                            @if ($images)
                            Photo Preview:
                            <div class="row">
                                @foreach ($images as $images)
                                <br>
                                <div class="col-3 card me-1 mb-1">
                                    <img src="{{ $images->temporaryUrl() }}">
                                </div>
                                @endforeach
                            </div>
                            @endif
                            <div class="mb-3">
                                <label class="form-label">Image Document Upload</label>
                                <input type="file" class="form-control" wire:model="images" multiple>
                                <div wire:loading wire:target="images">Uploading...</div>
                                @error('images.*') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button class="btn btn-primary" wire:click="add">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
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
