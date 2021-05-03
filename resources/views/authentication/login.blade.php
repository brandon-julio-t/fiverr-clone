@extends('layout.index')

@section('title', 'Login')

@section('content')
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
