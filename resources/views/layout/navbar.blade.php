<nav class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex flex-1 px-2 lg:px-0">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <svg class="h-8 w-auto" viewBox="0 0 89 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g fill="#404145">
                                <path
                                    d="m81.6 13.1h-3.1c-2 0-3.1 1.5-3.1 4.1v9.3h-6v-13.4h-2.5c-2 0-3.1 1.5-3.1 4.1v9.3h-6v-18.4h6v2.8c1-2.2 2.3-2.8 4.3-2.8h7.3v2.8c1-2.2 2.3-2.8 4.3-2.8h2zm-25.2 5.6h-12.4c.3 2.1 1.6 3.2 3.7 3.2 1.6 0 2.7-.7 3.1-1.8l5.3 1.5c-1.3 3.2-4.5 5.1-8.4 5.1-6.5 0-9.5-5.1-9.5-9.5 0-4.3 2.6-9.4 9.1-9.4 6.9 0 9.2 5.2 9.2 9.1 0 .9 0 1.4-.1 1.8zm-5.7-3.5c-.1-1.6-1.3-3-3.3-3-1.9 0-3 .8-3.4 3zm-22.9 11.3h5.2l6.6-18.3h-6l-3.2 10.7-3.2-10.8h-6zm-24.4 0h5.9v-13.4h5.7v13.4h5.9v-18.4h-11.6v-1.1c0-1.2.9-2 2.2-2h3.5v-5h-4.4c-4.3 0-7.2 2.7-7.2 6.6v1.5h-3.4v5h3.4z"></path>
                            </g>
                            <g fill="#1dbf73">
                                <path
                                    d="m85.3 27c2 0 3.7-1.7 3.7-3.7s-1.7-3.7-3.7-3.7-3.7 1.7-3.7 3.7 1.7 3.7 3.7 3.7z"></path>
                            </g>
                        </svg>
                    </a>
                </div>

                <div class="flex-1 flex items-center px-2 lg:ml-6">
                    <div class="max-w-lg w-full lg:max-w-xs">
                        <label for="search" class="sr-only">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <!-- Heroicon name: solid/search -->
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <form action="{{ route('search') }}" class="block w-full pl-10 pr-3 py-2">
                                <input id="search" name="title"
                                       class="w-full border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                       placeholder="Search" type="search">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex-1 justify-end lg:ml-6 lg:flex lg:space-x-8 relative">
                <div
                    class="dropdown border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                    <div>Categories</div>
                    <div
                        class="dropdown-content bg-white overflow-hidden shadow rounded-lg absolute mt-16 hidden w-96 font-bold right-0 top-0">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-2 gap-y-4 gap-x-8">
                                @foreach (\App\Models\GigCategory::all() as $category)
                                    <a class="hover:underline" href="{{ route('search', ['gig_category_id' => $category->id]) }}">
                                        {{ $category->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @guest
                <div class="grid grid-cols-2 gap-4 items-center ml-8">
                    <x-button href="{{ route('register') }}">Register</x-button>
                    <x-button href="{{ route('login') }}" :secondary="true">Login</x-button>
                </div>
            @endguest

            @auth
                <div class="hidden lg:ml-4 lg:flex lg:items-center">
                    <!-- Profile dropdown -->
                    <div class="ml-4 relative flex-shrink-0">
                        <div>
                            <button type="button"
                                    class="bg-white rounded-full flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>

                                <x-profile-picture :user="auth()->user()"></x-profile-picture>
                            </button>
                        </div>

                        <!-- Dropdown menu, show/hide based on menu state. -->
                        <div
                            class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-10"
                            id="user-menu-dropdown" role="menu" aria-orientation="vertical"
                            aria-labelledby="user-menu-button" tabindex="-1">
                            <a href="{{ route('view-profile', auth()->id()) }}"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"
                               tabindex="-1" id="user-menu-item-0">Your Profile</a>
                            <a href="{{ route('logout') }}"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"
                               tabindex="-1" id="user-menu-item-2">Logout</a>
                        </div>

                        <script>
                            let isOpen = false;

                            const userMenu = document.getElementById("user-menu-button");
                            const dropdown = document.getElementById("user-menu-dropdown");

                            const closeDropDown = () => {
                                isOpen = !isOpen;
                                dropdown.style.display = isOpen ? "block" : "none";
                            };

                            userMenu.onclick = () => closeDropDown();
                        </script>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</nav>
