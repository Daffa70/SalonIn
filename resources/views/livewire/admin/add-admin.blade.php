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
                                    <span><i class="fas fa-arrow-left mr-3"></i>Akun Admin</span>
                                </a>
                            </h4>
                            <button class="btn btn-primary pull-right" wire:click="showModalAdd"
                                wire:loading.attr="disabled" title="showModalAdd">Tambah Admin</button>
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
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $key => $admin)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                @if (Auth::user()->id != $admin->id)
                                <td><button class="btn btn-danger" wire:loading.attr="disabled"
                                    wire:click="modalDelete({{ $admin->id }})" title="Hapus"><i
                                        class="fas fa-trash"></i></button></td>
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title ml-2">Ubah Privasi Akun</h4>
                    <div class="w-95 p-3 align-center">
                        <label for="name" class="form-label">Name<span style="color: red">*</span>
                            <small id="helpId{{'name'}}"
                                class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</small>
                        </label>
                        <input type="text" class="form-control" id="name" name="name" wire:model="name"
                            placeholder="Owner Name">
                    </div>
                    <div class="w-95 p-3 align-center">
                        <label for="email" class="form-label">Email<span style="color: red">*</span>
                            <small id="helpId{{'email'}}"
                                class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</small>
                        </label>
                        <input type="email" class="form-control" id="email" name="email" wire:model="email"
                            placeholder="example@gmail.com">
                    </div>

                    <div class="w-95 p-3 align-center">
                        <label for="password" class="form-label">Password<span style="color: red">*</span>
                            <small id="helpId{{'password'}}"
                                class="text-danger">{{ $errors->has('password') ? $errors->first('password') : '' }}</small>
                        </label>
                        <input type="password" class="form-control" id="password" name="password" wire:model="password"
                            placeholder="Confirm Password">
                    </div>

                    <div class="w-95 p-3 align-center">
                        <label for="confirm_password" class="form-label">Password Confirmation<span
                                style="color: red">*</span>
                            <small id="helpId{{'confirm_password'}}"
                                class="text-danger">{{ $errors->has('confirm_password') ? $errors->first('confirm_password') : '' }}</small>
                        </label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                            wire:model="confirm_password" placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary pull-right" wire:click="savePrivacy"
                            wire:loading.attr="disabled">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="modal-add" wire:ignore.self class="modal fade" tabindex="-1" role="dialog"
            aria-labelledby="my-modal-title" aria-hidden="true" class="justify-content-center">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="my-modal-title">Tambah Admin</h4>
                    </div>
                    <div class="w-95 p-3 align-center">
                        <label for="Addname" class="form-label">Name<span style="color: red">*</span>
                            <small id="helpId{{'Addname'}}"
                                class="text-danger">{{ $errors->has('Addname') ? $errors->first('Addname') : '' }}</small>
                        </label>
                        <input type="text" class="form-control" id="Addname" name="Addname" wire:model="Addname"
                            placeholder="Owner Name">
                    </div>
                    <div class="w-95 p-3 align-center">
                        <label for="Addemail" class="form-label">Email<span style="color: red">*</span>
                            <small id="helpId{{'Addemail'}}"
                                class="text-danger">{{ $errors->has('Addemail') ? $errors->first('Addemail') : '' }}</small>
                        </label>
                        <input type="Addemail" class="form-control" id="Addemail" name="Addemail" wire:model="Addemail"
                            placeholder="example@gmail.com">
                    </div>

                    <div class="w-95 p-3 align-center">
                        <label for="Addpassword" class="form-label">Password<span style="color: red">*</span>
                            <small id="helpId{{'Addpassword'}}"
                                class="text-danger">{{ $errors->has('Addpassword') ? $errors->first('Addpassword') : '' }}</small>
                        </label>
                        <input type="password" class="form-control" id="Addpassword" name="Addpassword" wire:model="Addpassword"
                            placeholder="Confirm Password">
                    </div>

                    <div class="w-95 p-3 align-center">
                        <label for="Addconfirm_password" class="form-label">Password Confirmation<span
                                style="color: red">*</span>
                            <small id="helpId{{'Addconfirm_password'}}"
                                class="text-danger">{{ $errors->has('Addconfirm_password') ? $errors->first('Addconfirm_password') : '' }}</small>
                        </label>
                        <input type="password" class="form-control" id="Addconfirm_password" name="Addconfirm_password"
                            wire:model="Addconfirm_password" placeholder="Confirm Password">
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
