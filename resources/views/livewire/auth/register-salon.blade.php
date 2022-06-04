<x-jet-authentication-card>
    <x-slot name="logo">
        <a class="navbar-brand ms-2 ms-lg-5 me-5 pt-0" href="{{ route('user.home') }}"><img
            src="{{asset('assets/img/logo_transparent.png')}}" id="logo" alt=""></a>
    </x-slot>

    <x-jet-validation-errors class="mb-4" />

    <form wire:submit.prevent="store">
        @csrf

        <div class="w-95 p-3 align-center" style="margin-top: -2% !important;">
            <label for="salonname" class="form-label">Salon Name<span style="color: red">*</span>
                <small id="helpId{{'name'}}"
                    class="text-danger">{{ $errors->has('salonname') ? $errors->first('salonname') : '' }}</small>
            </label>
            <input type="text" class="form-control" id="salonname" name="salonname" wire:model="salonName"
                placeholder="Salon Name">
        </div>
        <div class="w-95 p-3 align-center" style="margin-top: -2% !important;">
            <label for="name" class="form-label">Owner Name<span style="color: red">*</span>
                <small id="helpId{{'name'}}"
                    class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</small>
            </label>
            <input type="text" class="form-control" id="name" name="name" wire:model="ownerName"
                placeholder="Owner Name">
        </div>
        <div class="w-95 p-3 align-center" style="margin-top: -2% !important;">
            <label for="no_hp" class="form-label">Phone Number<span style="color: red">*</span>
                <small id="helpId{{'no_hp'}}"
                    class="text-danger">{{ $errors->has('no_hp') ? $errors->first('no_hp') : '' }}</small>
            </label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" wire:model="phoneNumber"
                placeholder="Phone Number">
        </div>
        <div class="w-95 p-3 align-center" style="margin-top: -2% !important;">
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
        <div class="w-95 p-3 align-center" style="margin-top: -2% !important;">
            @if ($avatar)
            Photo Preview:
            <div class="col-3 card me-1 mb-1">
                <img src="{{ $avatar->temporaryUrl() }}">
            </div>
            @endif
            <div class="mb-3">
                <label class="form-label">Logo Salon/Barber</label>
                <input type="file" class="form-control" wire:model="avatar">
                <div wire:loading wire:target="avatar">Uploading...</div>
                @error('avatar.*') <span class="error">{{ $avatar }}</span> @enderror
            </div>
        </div>
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
        <div class="w-95 p-3 align-center" style="margin-top: -2% !important;">
            <label for="email" class="form-label">Email<span style="color: red">*</span>
                <small id="helpId{{'email'}}"
                    class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</small>
            </label>
            <input type="email" class="form-control" id="email" name="email" wire:model="email"
                placeholder="example@gmail.com">
        </div>

        <div class="w-95 p-3 align-center" style="margin-top: -2% !important;">
            <label for="password" class="form-label">Password<span style="color: red">*</span>
                <small id="helpId{{'password'}}"
                    class="text-danger">{{ $errors->has('password') ? $errors->first('password') : '' }}</small>
            </label>
            <input type="password" class="form-control" id="password" name="password" wire:model="password"
                placeholder="Password">
        </div>

        <div class="w-95 p-3 align-center" style="margin-top: -2% !important;">
            <label for="confirm_password" class="form-label">Password Confirmation<span style="color: red">*</span>
                <small id="helpId{{'confirm_password'}}"
                    class="text-danger">{{ $errors->has('confirm_password') ? $errors->first('confirm_password') : '' }}</small>
            </label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                wire:model="confirm_password" placeholder="Confirm Password">
        </div>
        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
            {{ __('Register User?') }}
        </a>
        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
        <div class="mt-4">
            <x-jet-label for="terms">
                <div class="flex items-center">
                    <x-jet-checkbox name="terms" id="terms" />

                    <div class="ml-2">
                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'"
                            class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'"
                            class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                        ]) !!}
                    </div>
                </div>
            </x-jet-label>
        </div>
        @endif

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <button class="ml-4 btn btn-primary" wire:click="store">Register</button>
        </div>
    </form>
</x-jet-authentication-card>
