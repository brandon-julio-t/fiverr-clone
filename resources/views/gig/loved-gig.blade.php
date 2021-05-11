@extends('layout.index')

@section('title', 'Loved Gigs')

@section('content')
    <main class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-12 grid grid-cols-1 gap-4">
        <h2 class="text-xl font-bold">Loved Gigs</h2>
        <section class="grid grid-cols-5 gap-4">
            @forelse ($gigs as $gig)
                <x-gig-card :gig="$gig"></x-gig-card>
            @empty
                <h3 class="text-2xl font-light text-center col-span-5">No loved gigs</h3>
            @endforelse
        </section>
    </main>
@endsection
