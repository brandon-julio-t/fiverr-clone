@extends('layout.index')

@section('title', $user->name)

@section('content')
    <main class="max-w-7xl mx-auto my-12 sm:px-6 lg:px-8 grid grid-cols-8 gap-8">
        <section class="col-span-3">
            <div class="bg-white overflow-hidden shadow rounded-lg mx-auto sticky top-12 hover:shadow-md transition duration-250">
                <div class="px-4 py-5 sm:p-6 grid grid-cols-1 gap-4 justify-center items-center text-center">
                    <x-profile-picture :user="$user" size="big"></x-profile-picture>

                    <h2 class="text-lg font-bold">{{ $user->name }}</h2>

                    @if ($user->about)
                        <p class="text-gray-600">{{ $user->about }}</p>
                    @endif

                    @if ($user->id == auth()->id())
                        <x-button href="{{ route('edit-profile', $user) }}"
                                  class="inline-flex justify-center items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path
                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                            </svg>
                            Edit Profile
                        </x-button>
                    @endif

                    @if ($user->description)
                        <article>
                            <h2 class="text-lg font-medium">Description</h2>
                            <p class="mt-4">{!! nl2br(e($user->description)) !!}</p>
                        </article>
                    @endif

                    <hr/>

                    <section class="flex items-center">
                        <div class="mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </div>

                        <div class="flex-1 text-left">Member since</div>

                        <div class="font-bold">
                            {{ $user->created_at->toFormattedDateString() }}
                        </div>
                    </section>
                </div>
            </div>
        </section>

        <section class="col-span-5">
            <div class="grid grid-cols-8">
                <h2 class="text-lg font-bold col-span-5">
                    {{ $user->name }}'s Gigs
                </h2>

                @if ($user->id == auth()->id())
                    <div class="col-span-3">
                        <x-button href="{{ route('create-gig') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            Create Gig
                        </x-button>
                    </div>
                @endif
            </div>
            <div class="grid grid-cols-3 gap-4 mt-4">
                @foreach ($user->gigs()->orderBy('created_at', 'desc')->get() as $gig)
                    <x-gig-card :gig="$gig"></x-gig-card>
                @endforeach
            </div>
        </section>
    </main>
@endsection
