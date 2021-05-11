@extends('layout.index')

@section('title', 'Home')

@section('content')
    <script>
        let nextPage = '{{ route('infinite-scroll-gigs') }}';
        let gigs = [];

        window.onscroll = _.debounce(() => {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                fetchNextGigs();
            }
        }, 250);

        async function fetchNextGigs() {
            if (nextPage) {
                updateLoadingIndicator(true);

                const request = await fetch(nextPage);
                const json = await request.json();
                gigs = [...gigs, ...json['gigs']];
                nextPage = json['next_page_url'];
                document.getElementById("gigs").innerHTML = gigs.join('');

                updateLoadingIndicator(false);
            }
        }

        function updateLoadingIndicator(isLoading) {
            document.getElementById('loading-indicator').style.display = isLoading ? 'block' : 'none';
        }
    </script>

    <main>
        <section id="hero" class="p-72 bg-center" style="background-image: url('https://picsum.photos/1920')">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h2 class="text-7xl font-bold filter drop-shadow-md text-white leading-tight">
                    Find the perfect <span class="italic">freelance</span>
                    <br/>
                    services for your business
                </h2>

                <div class="my-8">
                    <label for="title" class="sr-only">Search</label>
                    <form action="{{ route('search') }}" class="mt-1 flex rounded-md shadow-sm">
                        <div class="relative flex items-stretch flex-grow focus-within:z-10">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                            <input type="text" name="title" id="title"
                                   class="focus:ring-green-500 focus:border-green-500 block w-full rounded-none rounded-l-md pl-10 sm:text-sm border-gray-300">
                        </div>
                        <button type="submit"
                                class="-ml-px relative inline-flex items-center space-x-2 px-4 py-2 border border-gray-300 text-sm font-medium rounded-r-md text-gray-700 bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-1 focus:ring-green-500 focus:border-green-500">
                            <span>Search</span>
                        </button>
                    </form>
                </div>
            </div>
        </section>

        <section class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-16 grid grid-cols-1 gap-8">
            <section>
                <h2 class="text-4xl font-bold mb-4">Popular Categories</h2>
                <div class="grid grid-cols-4 gap-4">
                    @foreach ($categories as $category)
                        @if (collect([1, 3])->contains($loop->iteration))
                            <a
                                href="{{ route('search', ['gig_category_id' => $category->id]) }}"
                                class="transition duration-250 hover:shadow-md active:inner-shadow hover:underline bg-white overflow-hidden shadow rounded-lg row-span-2 flex items-center"
                            >
                                <div class="px-4 py-5 sm:p-6">
                                    {{ $category->name }}
                                </div>
                            </a>
                        @else
                            <a
                                href="{{ route('search', ['gig_category_id' => $category->id]) }}"
                                class="transition duration-250 hover:shadow-md active:inner-shadow hover:underline bg-white overflow-hidden shadow rounded-lg"
                            >
                                <div class="px-4 py-5 sm:p-6">
                                    {{ $category->name }}
                                </div>
                            </a>
                        @endif

                    @endforeach
                </div>
            </section>

            <section class="grid grid-cols-1 gap-4">
                <h2 class="text-4xl font-bold">All Gigs</h2>
                <div id="gigs" class="grid grid-cols-5 gap-4"></div>
                <div class="flex justify-center">
                    <svg id="loading-indicator" class="hidden animate-spin -ml-1 mr-3 mx-auto h-8 w-auto text-black"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                              d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
            </section>
        </section>
    </main>
@endsection
