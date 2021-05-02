@extends('layout.index')

@section('title', 'Login')

@section('content')
    @if ($errors->has('login'))
        <div id="login-error" class="relative bg-red-600">
            <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
                <div class="pr-16 sm:text-center sm:px-16">
                    <p class="font-medium text-white">
                        {{ $errors->first('login') }}
                    </p>
                </div>

                <div class="absolute inset-y-0 right-0 pt-1 pr-1 flex items-start sm:pt-1 sm:pr-2 sm:items-start">
                    <button type="button"
                            id="dismiss"
                            class="flex p-2 rounded-md hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-white">
                        <span class="sr-only">Dismiss</span>
                        <!-- Heroicon name: outline/x -->
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>

                    <script>
                        document.getElementById("dismiss").onclick = () => document.getElementById("login-error").remove();
                    </script>
                </div>
            </div>
        </div>
    @endif


    <div class="min-h-screen bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Login
            </h2>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <form class="space-y-6"
                      action="{{ route('do-login') }}" method="POST">
                    @csrf

                    <x-text-field name="email" type="email" autocomplete="email" :required="true"></x-text-field>

                    <x-text-field name="password" type="password" autocomplete="current-password"
                                  :required="true"></x-text-field>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember_me" name="remember_me" type="checkbox"
                                   class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                                Remember me
                            </label>
                        </div>

                        <div class="text-sm">
                            <a href="#" class="font-medium text-green-600 hover:text-green-500">
                                Forgot your password?
                            </a>
                        </div>
                    </div>

                    <div>
                        <x-button type="submit">Login</x-button>
                    </div>

                    <div>
                        <x-button href="{{ route('register') }}" type="submit" :secondary="true">Register</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
