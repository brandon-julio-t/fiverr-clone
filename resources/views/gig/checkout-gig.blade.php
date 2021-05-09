@extends('layout.index')

@section('title', 'Checkout')

@section('content')
    <main class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-12">
        <h2 class="text-2xl font-bold mb-4">Gig Checkout</h2>

        <div class="grid grid-cols-12 gap-4">
            <section class="bg-white overflow-hidden shadow rounded-lg col-span-8">
                <div class="px-4 py-5 sm:p-6 grid grid-cols-12 gap-4">
                    <div class="col-span-8 grid grid-cols-1 gap-4">
                        <div>
                            <p>{{ $gig->gigCategory->name }}</p>
                            <h2 class="text-lg font-bold">{{ $gig->title }}</h2>
                        </div>

                        <div class="flex items-center">
                            <div class="mr-2">
                                <x-profile-picture :user="$gig->user"></x-profile-picture>
                            </div>

                            <p>{{ $gig->user->name }}</p>

                            <span class="mx-2">|</span>

                            <x-gig-star :gig="$gig"></x-gig-star>
                        </div>

                        <p>{!! nl2br(e($gig->about)) !!}</p>
                    </div>

                    <img class="rounded col-span-4" src="{{ asset('storage/' . $gig->gigImages->first()->path) }}"
                         alt="gig thumbnail">
                </div>
            </section>

            <section class="col-span-4">
                <div class="bg-white overflow-hidden shadow rounded-lg sticky top-12">
                    <div class="px-4 py-5 sm:p-6 w-96">
                        <h2 class="text-lg font-bold capitalize">{{ $type }}</h2>
                        <p class="text-lg font-medium mb-4">
                            @switch ($type)
                                @case('basic')
                                ${{ $gig->basic_price }}
                                @break
                                @case('standard')
                                ${{ $gig->standard_price }}
                                @break
                                @case('premium')
                                ${{ $gig->premium_price }}
                                @break
                            @endswitch
                        </p>
                        <form action="{{ route('checkout-transaction-gig', $gig) }}" method="post">
                            @csrf
                            @method('post')
                            <input type="hidden" name="type" value="{{ $type }}">
                            <x-button type="submit">Checkout</x-button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
