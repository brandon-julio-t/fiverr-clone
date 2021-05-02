@props([

'type' => 'button',
'href' => null,
'secondary' => false

])

@if ($href)
    <a href="{{ $href }}"
       @if ($secondary) class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-green-500 bg-green-100 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-300"
       @else class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-400 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400" @endif
    >
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}"
        @if ($secondary) class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-green-500 bg-green-100 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-300"
        @else class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-400 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400" @endif
    >
        {{ $slot }}
    </button>
@endif
