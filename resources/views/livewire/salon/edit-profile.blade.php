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
                                    <span><i class="fas fa-arrow-left mr-3"></i>Edit Profile</span>
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
                    <h4 class="card-title ml-2">Informasi Profil </h4>
                    <div class="form-group">
                        <label for="" class="mb-2">Tambahkan Foto Avatar</label><br>
                        <label for="image-picker">
                            @if (optional($avatar)->temporaryUrl())
                            <img id="image-preview" src="{{ $avatar->temporaryUrl() }}"
                                alt="your image" width="200" height="200"/>
                            @elseif ($avatar != null)
                            <img id="image-preview" src="{{ asset('storage/'.$avatar) }}"
                            width="200" height="200"/>
                            @else
                            <img id="image-preview" src="{{asset('assets/img/avatar.svg')}}"
                                alt="your image" width="200" height="200"/>
                            @endif
                        </label>
                        <input id="image-picker" wire:model="avatar" type="file" accept="image/*" class="d-none" />
                        <br>
                        <div wire:loading wire:target="avatar">Uploading...</div>
                        @error('avatar')
                        <small id="helpId" class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="w-95 p-3 align-center">
                        <label for="salonname" class="form-label">Salon Name<span style="color: red">*</span>
                            <small id="helpId{{'name'}}"
                                class="text-danger">{{ $errors->has('salonname') ? $errors->first('salonname') : '' }}</small>
                        </label>
                        <input type="text" class="form-control" id="salonname" name="salonname" wire:model="salonName"
                            placeholder="Salon Name">
                    </div>
                    <div class="w-95 p-3 align-center">
                        <label for="name" class="form-label">Owner Name<span style="color: red">*</span>
                            <small id="helpId{{'name'}}"
                                class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</small>
                        </label>
                        <input type="text" class="form-control" id="name" name="name" wire:model="ownerName"
                            placeholder="Owner Name">
                    </div>
                    <div class="w-95 p-3 align-center">
                        <label for="no_hp" class="form-label">Phone Number<span style="color: red">*</span>
                            <small id="helpId{{'no_hp'}}"
                                class="text-danger">{{ $errors->has('no_hp') ? $errors->first('no_hp') : '' }}</small>
                        </label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" wire:model="phoneNumber"
                            placeholder="Phone Number">
                    </div>
                    <div class="w-95 p-3 align-center">
                        <label for="address" class="form-label">Address<span style="color: red">*</span>
                            <small id="helpId{{'address'}}"
                                class="text-danger">{{ $errors->has('address') ? $errors->first('address') : '' }}</small>
                        </label>
                        <input type="text" class="form-control" id="address" name="address" wire:model="address"
                            placeholder="Address">
                    </div>

                    <div class="w-95 p-3 align-center">
                        <label for="desc" class="form-label">Deskripsi<span style="color: red">*</span>
                            <small id="helpId{{'desc'}}"
                                class="text-danger">{{ $errors->has('desc') ? $errors->first('desc') : '' }}</small>
                        </label>
                        <input type="text" class="form-control" id="desc" name="desc" wire:model="desc"
                            placeholder="Deskripsi">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary pull-right" wire:click="saveProfile"
                            wire:loading.attr="disabled">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title ml-2">Privasi Akun</h4>
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
