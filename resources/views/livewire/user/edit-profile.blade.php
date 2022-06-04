<div style="margin-bottom: 30%; margin-top: 1%">
    @push('styles')
    <link rel="stylesheet" href="{{asset('assets/css/review.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/modales.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/acordeon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/navbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pagina2/salones.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pagina2/queries.css')}}">
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
                                    <li><a href="{{ route('user.edit.profile') }}" class="ms-2">Edit Profile</a></label></li>
                                    <li><a href="{{ route('user.myorder') }}" class="ms-2">Pesanan Saya</a></label></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-15 col-lg-8" style="height: 100%">
                <div class="row">
                    <h4 class="card-title ml-2">Informasi Profil </h4>
                    <div class="form-group">
                        <label for="" class="mb-2">Tambahkan Foto Avatar</label><br>
                        <label for="image-picker">
                            @if (optional($avatar)->temporaryUrl())
                            <img id="image-preview" src="{{ $avatar->temporaryUrl() }}" alt="your image" width="200"
                                height="200" />
                            @elseif ($avatar != null)
                            <img id="image-preview" src="{{ asset('storage/'.$avatar) }}" width="200" height="200" />
                            @else
                            <img id="image-preview" src="{{asset('assets/img/avatar.svg')}}" alt="your image"
                                width="200" height="200" />
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
                        <label for="name" class="form-label">Name<span style="color: red">*</span>
                            <small id="helpId{{'name'}}"
                                class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</small>
                        </label>
                        <input type="text" class="form-control" id="name" name="name" wire:model="name"
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


                    <div class="form-group">
                        <button class="btn btn-primary pull-right" wire:click="saveProfile"
                            wire:loading.attr="disabled">Simpan</button>
                    </div>

                    <h4 class="card-title ml-2" style="margin-top: 5%">Privasi Akun</h4>
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
    </div>
</div>
