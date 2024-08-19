@extends('account.admin.layouts.default')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">

                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Reset Password') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Ensure your account is using a long, random password to stay secure.') }}
                        </p>
                    </header>

                    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('put')

                        <div>
                            <x-input-label for="update_password_current_password" :value="__('Current Password')" />
                            <x-text-input id="update_password_current_password" name="current_password" type="password"
                                class="mt-1 block w-full" autocomplete="current-password" />
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="update_password_password" :value="__('New Password')" />
                            <x-text-input id="update_password_password" name="password" type="password"
                                class="mt-1 block w-full" autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="update_password_password_confirmation"
                                :value="__('Confirm Password')" />
                            <x-text-input id="update_password_password_confirmation" name="password_confirmation"
                                type="password" class="mt-1 block w-full" autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')"
                                class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <button class="btn btn-primary">{{ __('Save') }}</button>

                            @if (session('status') === 'password-updated')
                            <p x-data="{ show: true }" x-show="show" x-transition
                                x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">{{
                                __('Saved.') }}</p>

                            <div class="toast-container position-absolute p-3" style="right: 0;">
                                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))
                                <div class="toast align-items-center text-white bg-{{ $msg }} border-0" role="alert"
                                    aria-live="assertive" aria-atomic="true">
                                    <div class="d-flex">
                                        <div class="toast-body">
                                            {{ Session::get('alert-' . $msg) }}
                                        </div>
                                        <button type="button" class="btn-close btn-close-white me-2 m-auto"
                                            data-bs-dismiss="toast" aria-label="Close"></button>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </form>
                </section>

            </div>
        </div>
    </div>

    {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mt-4">

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <label for="">Enable Two Factor Authentiaction</label>
                <a type="button mb-2" href={{ route('profile.2fa.setup') }}
                    class="btn btn-outline-success btn-sm mb-2">Enable</a>

            </div>
        </div>
    </div> --}}

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mt-4">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <h2 class="text-xl font-bold mb-4">Enable Two Factor Authentication</h2>
                <p class="text-sm mb-4">Enhance your account security by enabling two-factor authentication. Once
                    enabled, you'll need to scan a QR code with your Google Authenticator app.</p>
                @if(Auth::user()->google2fa_secret == null)
                <a href="{{ route('profile.2fa.setup') }}" class="btn btn-outline-success btn-sm mb-4">Enable</a>
                @endif
                @if(Auth::user()->google2fa_secret != null)
                <form action="{{ route('profile.2fa.disable') }}" method="POST" style="display: inline;">
                    @csrf
                    @method('put')
                    <button type="submit" class="btn btn-outline-danger btn-sm">Disable</button>
                </form>
                @endif
            </div>
        </div>
    </div>


</div>
@endsection

@section('scripts')
@vite(['resources/css/app.css', 'resources/js/app.js'])
.
@endsection