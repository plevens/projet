<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <h1>Log in</h1>
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
            <center>
                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </center>
            <div class="flex items-center justify-end mt-4">

                <br>
                <br>
                @if (Route::has(('register')))
                <a class="underline text-sm btn btn-primary text-white text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                    {{ __('Inscription') }}
                </a>
                @endif
                <br>

            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>