@extends('layout.index')

@section('title', $gig->title)

@section('content')
    <main class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-12 grid grid-cols-8 gap-16">
        <section class="col-span-5">
            <p>{{ $gig->gigCategory->name }}</p>
            <h2 class="text-xl font-bold">{{ $gig->title }}</h2>

            <p class="flex items-center my-4">
                <span class="mr-2">
                    <x-profile-picture :user="$gig->user"></x-profile-picture>
                </span>

                <a class="hover:underline" href="{{ route('view-profile', $gig->user) }}">{{ $gig->user->name }}</a>

                <span class="mx-2">|</span>

                <span class="fill-current text-yellow-300 flex items-center mr-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                         fill="currentColor">
                      <path
                          d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    {{ number_format($gig->gigReviews()->average('rating')) }}
                </span>

                <span>({{ $gig->gigReviews()->count() }})</span>
            </p>

            <img class="mb-2" src="{{ asset('storage/' . $gig->gigImages->first()->path) }}" alt="thumbnail">

            <div class="flex overflow-auto">
                @foreach ($gig->gigImages->whereNotIn('id', $gig->gigImages->first()->id) as $image)
                    <img class="w-32 object-cover @if(!$loop->last) mr-2 @endif"
                         src="{{ asset('storage/' . $image->path) }}" alt="gig image">
                @endforeach
            </div>

            <article class="mt-16">
                <h3 class="text-lg font-bold mb-4">About This Gig</h3>
                <p>{!! nl2br(e($gig->about)) !!}</p>
            </article>

            <section class="mt-16">
                <h3 class="text-lg font-bold mb-4">About The Seller</h3>
                <div class="flex items-center">
                    <div class="mr-4">
                        <x-profile-picture :user="$gig->user" size="medium"></x-profile-picture>
                    </div>
                    <div class="flex-1">
                        <p>
                            <a class="hover:underline" href="{{ route('view-profile', $gig->user) }}">
                                {{ $gig->user->name }}
                            </a>
                        </p>
                        <p>{{ $gig->user->about }}</p>
                    </div>
                </div>
            </section>

            <section class="mt-4 bg-white overflow-hidden shadow rounded-lg hover:shadow-md transition duration-250">
                <div class="px-4 py-5 sm:p-6">
                    <p class="text-gray-500">Member since</p>
                    <p class="text-gray-500 font-bold">{{ $gig->user->created_at->toFormattedDateString() }}</p>
                    <hr class="my-4"/>
                    <p class="text-gray-600">{{ $gig->user->description }}</p>
                </div>
            </section>

            @can('review', $gig)
            <section class="my-16">
                <form action="{{ route('review-gig', $gig) }}" method="post" class="grid grid-cols-1 gap-4">
                    @csrf
                    <x-text-field name="rating" type="number" min="1" max="5" :required="true"></x-text-field>
                    <x-text-field name="body" type="textarea" :required="true"></x-text-field>
                    <x-button type="submit">Submit</x-button>
                </form>
            </section>
            @endcan

            <section class="mt-16">
                <hr/>

                @foreach ($reviews as $review)
                    <article class="my-8">
                        <div class="flex items-center">
                            <x-profile-picture :user="$review->user"></x-profile-picture>

                            <span class="font-bold mx-2">{{ $review->user->name }}</span>

                            <span class="fill-current text-yellow-300 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                     fill="currentColor">
                                  <path
                                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                {{ $review->rating }}
                            </span>
                        </div>

                        <p class="my-4">{{ $review->body }}</p>

                        <p class="text-gray-600">Published {{ $review->created_at->diffForHumans() }}</p>
                    </article>

                    <hr/>
                @endforeach

                <div class="mt-8">
                    {{ $reviews->links() }}
                </div>
            </section>
        </section>

        <section class="col-span-3">
            <div class="grid grid-cols-1 gap-4 sticky top-12">
                @can('update', $gig)
                    <div class="my-4">
                        <x-button href="{{ route('edit-gig', $gig) }}">Edit Gig</x-button>
                    </div>
                @endcan

                <div class="bg-white overflow-hidden shadow rounded-lg hover:shadow-md transition duration-250">
                    <article class="px-4 py-5 sm:p-6">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-700 font-bold">Starter Package</span>
                            <span class="text-gray-700 text-lg font-medium">${{ $gig->basic_price }}</span>
                        </div>
                        <p class="text-gray-600 my-4">{{ $gig->basic_price_description }}</p>
                        @can('purchase', $gig)
                            <x-button href="{{ route('checkout-summary-gig', ['gig' => $gig, 'type' => 'basic']) }}">
                                Continue (${{ $gig->basic_price }})
                            </x-button>
                        @endcan
                    </article>
                </div>

                <div class="bg-white overflow-hidden shadow rounded-lg hover:shadow-md transition duration-250">
                    <article class="px-4 py-5 sm:p-6">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-700 font-bold">Best Package</span>
                            <span class="text-gray-700 text-lg font-medium">${{ $gig->standard_price }}</span>
                        </div>
                        <p class="text-gray-600 my-4">{{ $gig->standard_price_description }}</p>
                        @can('purchase', $gig)
                            <x-button href="{{ route('checkout-summary-gig', ['gig' => $gig, 'type' => 'standard']) }}">
                                Continue (${{ $gig->standard_price }})
                            </x-button>
                        @endcan
                    </article>
                </div>

                <div class="bg-white overflow-hidden shadow rounded-lg hover:shadow-md transition duration-250">
                    <article class="px-4 py-5 sm:p-6">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-700 font-bold">Premium Package</span>
                            <span class="text-gray-700 text-lg font-medium">${{ $gig->premium_price }}</span>
                        </div>
                        <p class="text-gray-600 my-4">{{ $gig->premium_price_description }}</p>
                        @can('purchase', $gig)
                            <x-button href="{{ route('checkout-summary-gig', ['gig' => $gig, 'type' => 'premium']) }}">
                                Continue (${{ $gig->premium_price }})
                            </x-button>
                        @endcan
                    </article>
                </div>
            </div>
        </section>
    </main>
@endsection
