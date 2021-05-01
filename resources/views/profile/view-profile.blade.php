@extends('layout.index')

@section('title', $user->name)

@section('content')
    <main class="max-w-7xl mx-auto my-12 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow rounded-lg mx-auto w-96">
            <div class="px-4 py-5 sm:p-6 grid grid-cols-1 gap-4 justify-center items-center text-center">
                @if ($user->profile_picture)
                    <img class="inline-block mx-auto h-40 w-40 rounded-full"
                         src="{{ asset('storage/' . $user->profile_picture)  }}"
                         alt="profile picture">
                @else
                    <span class="inline-block justify-self-center h-40 w-40 rounded-full overflow-hidden bg-gray-100">
                      <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"/>
                      </svg>
                    </span>
                @endif

                <h2 class="text-lg font-bold">{{ $user->name }}</h2>

                @if ($user->id == auth()->id())
                    <x-button href="{{ route('edit-profile', $user) }}"
                              class="inline-flex justify-center items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20"
                             fill="currentColor">
                            <path
                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                        </svg>
                        Edit Profile
                    </x-button>
                @endif

                <hr/>

                <section class="flex items-center">
                    <div class="mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>

                    <div class="flex-1 text-left">Member since</div>

                    <div class="font-bold">{{ (new \Carbon\Carbon($user->created_at))->toFormattedDateString() }}</div>
                </section>
            </div>
        </div>
    </main>
@endsection
