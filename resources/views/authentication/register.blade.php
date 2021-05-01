@extends('layout.index')

@section('title', 'Register')

@section('content')
    <div class="min-h-screen bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Register
            </h2>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <form class="space-y-6"
                      action="{{ route('do-register') }}" method="POST">
                    @csrf

                    <x-text-field name="name" type="text" autocomplete="name" :required="true"></x-text-field>

                    <x-text-field name="email" type="email" autocomplete="email" :required="true"></x-text-field>

                    <x-text-field name="password" type="password" autocomplete="current-password"
                                  :required="true"></x-text-field>

                    <div>
                        <x-button type="submit">Register</x-button>
                    </div>

                    <div>
                        <x-button href="{{ route('login') }}" :secondary="true">Login</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
