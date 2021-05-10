@extends('layout.index')

@section('title', 'Search')

@section('content')
    <main class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-12 grid grid-cols-1 gap-4" xmlns="http://www.w3.org/1999/html">
        <form class="grid grid-cols-12 gap-4">
            <input type="hidden" name="page" value="{{ request()->query('page')  }}">

            <label for="title" class="col-span-2">
                <input
                    class="w-full rounded placeholder-gray-540 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-green-500 focus:border-green-500 sm:text-sm"
                    id="title"
                    placeholder="Search..."
                    type="text"
                    name="title"
                    value="{{ request()->query('title') }}"
                >
            </label>

            <label for="gig_category_id" class="col-span-2">
                <select name="gig_category_id"
                        class="w-full rounded placeholder-gray-540 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    <option>-- Category --</option>
                    @foreach ($gigCategories as $category)
                        <option
                            value="{{ $category->id }}"
                            @if (request()->query('gig_category_id') == $category->id) selected @endif
                        >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </label>

            <label for="min_budget" class="col-span-2">
                <input
                    class="w-full rounded placeholder-gray-540 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-green-500 focus:border-green-500 sm:text-sm"
                    id="min_budget"
                    placeholder="Min budget..."
                    type="number"
                    name="min_budget"
                    value="{{ request()->query('min_budget') }}"
                >
            </label>

            <label for="max_budget" class="col-span-2">
                <input
                    class="w-full rounded placeholder-gray-540 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-green-500 focus:border-green-500 sm:text-sm"
                    id="max_budget"
                    placeholder="Max budget..."
                    type="number"
                    name="max_budget"
                    value="{{ request()->query('max_budget') }}"
                >
            </label>

            <label for="seller_name" class="col-span-2">
                <input
                    class="w-full rounded placeholder-gray-540 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-green-500 focus:border-green-500 sm:text-sm"
                    id="seller_name"
                    placeholder="Seller name..."
                    type="text"
                    name="seller_name"
                    value="{{ request()->query('seller_name') }}"
                >
            </label>

            <div class="col-span-2">
                <x-button type="submit">Search</x-button>
            </div>
        </form>

        <div class="grid grid-cols-5 gap-4">
            @forelse ($gigs as $gig)
                <x-gig-card :gig="$gig"></x-gig-card>
            @empty
                <h2 class="text-2xl text-center font-bold col-span-5 my-4">No gigs found</h2>
            @endforelse
        </div>

        {{ $gigs->appends(request()->query())->links() }}
    </main>
@endsection
