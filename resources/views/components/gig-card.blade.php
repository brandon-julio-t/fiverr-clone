@props([

'gig',

])

<div class="group">
    <div
        class="bg-white overflow-hidden shadow hover:shadow-md transition duration-250 rounded-lg divide-y divide-gray-200">
        <section class="h-48">
            <a href="{{ route('view-gig', $gig) }}">
                <img class="cursor-pointer h-full w-full object-cover"
                     src="{{ asset('storage/' . $gig->gigImages->first()->path) }}" alt="gig thumbnail">
            </a>
        </section>

        <section class="px-4 py-5 grid grid-cols-1 gap-4">
            <div class="flex justify-between items-center">
                <div class="mr-2">
                    <x-profile-picture :user="$gig->user"></x-profile-picture>
                </div>

                <a href="{{ route('view-profile', $gig->user) }}" class="flex-1 text-sm hover:underline truncate">
                    {{ $gig->user->name }}
                </a>
            </div>

            <h2 class="cursor-pointer group-hover:text-green-600 transition duration-200 truncate">
                <a href="{{ route('view-gig', $gig) }}">
                    {{ $gig->title }}
                </a>
            </h2>
        </section>

        <section class="px-4 py-4 sm:px-6 flex justify-between items-center">
            <x-gig-heart :gig="$gig"></x-gig-heart>

            <p class="uppercase text-gray-600 cursor-pointer">
                <a href="{{ route('view-gig', $gig) }}">
                    starting at
                    <span class="text-lg font-medium">${{ $gig->basic_price }}</span>
                </a>
            </p>
        </section>
    </div>
</div>
