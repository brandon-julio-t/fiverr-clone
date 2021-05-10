@extends('layout.index')

@section('title', 'Home')

@section('content')
    <script>
        let nextPage = '{{ route('infinite-scroll-gigs') }}';
        let gigs = [];

        window.onscroll = () => {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                fetchNextGigs();
            }
        };

        async function fetchNextGigs() {
            if (nextPage) {
                const request = await fetch(nextPage);
                const json = await request.json();
                gigs = [...gigs, ...json['gigs']];
                nextPage = json['next_page_url'];
                document.getElementById("gigs").innerHTML = gigs.join('');
            }
        }
    </script>

    <main>
        <section id="hero" class="p-72 bg-center" style="background-image: url('https://picsum.photos/1920')">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h2 class="text-7xl font-bold filter drop-shadow-md text-white">
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

        <section class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-16">
            <h2 class="text-4xl font-bold mb-4">All Gigs</h2>
            <div id="gigs" class="grid grid-cols-5 gap-4"></div>
        </section>
    </main>
@endsection
