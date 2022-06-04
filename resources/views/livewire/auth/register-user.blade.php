<x-jet-authentication-card>
    <x-slot name="logo">
        <a class="navbar-brand ms-2 ms-lg-5 me-5 pt-0" href="{{ route('user.home') }}"><img
            src="{{asset('assets/img/logo_transparent.png')}}" id="logo" alt=""></a>
    </x-slot>

    <x-jet-validation-errors class="mb-4" />

    <form wire:submit.prevent="store">
        @csrf

        <div class="w-95 p-3 align-center" style="margin-top: -2% !important;">
            <label for="name" class="form-label">Name<span style="color: red">*</span>
                <small id="helpId{{'name'}}"
                class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</small>
            </label>
            <input type="text" class="form-control" id="name" name="name" wire:model="name" placeholder="Name">
        </div>
        <div class="w-95 p-3 align-center" style="margin-top: -2% !important;">
            <label for="email" class="form-label">Email<span style="color: red">*</span>
                <small id="helpId{{'email'}}"
                class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</small>
            </label>
            <input type="email" class="form-control" id="email" name="email" wire:model="email" placeholder="example@gmail.com">
        </div>

        <div class="w-95 p-3 align-center" style="margin-top: -2% !important;">
            <label for="password" class="form-label">Password<span style="color: red">*</span>
                <small id="helpId{{'password'}}"
                class="text-danger">{{ $errors->has('password') ? $errors->first('password') : '' }}</small>
            </label>
            <input type="password" class="form-control" id="password" name="password" wire:model="password" placeholder="Password">
        </div>

        <div class="w-95 p-3 align-center" style="margin-top: -2% !important;">
            <label for="confirm_password" class="form-label">Password Confirmation<span style="color: red">*</span>
                <small id="helpId{{'confirm_password'}}"
                class="text-danger">{{ $errors->has('confirm_password') ? $errors->first('confirm_password') : '' }}</small>
            </label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" wire:model="confirm_password" placeholder="Confirm Password">
        </div>
        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register.salon') }}">
            {{ __('Register As Salon?') }}
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
