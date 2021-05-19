@props([

'user',
'size' => 'small'

])

@if ($user->profile_picture)
    <img class="inline-block justify-self-center @switch($size) @case('small') h-8 w-8 @break @case('medium') h-24 w-24 @break @case('big') h-40 w-40 @break @endswitch rounded-full object-cover"
         {{ $attributes }} src="{{ asset('storage/' . $user->profile_picture)  }}" alt="profile picture">
@else
    <span
        class="inline-block justify-self-center @switch($size) @case('small') h-8 w-8 @break @case('medium') h-24 w-24 @break @case('big') h-40 w-40 @break @endswitch rounded-full overflow-hidden bg-gray-100" {{ $attributes }}>
      <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
        <path
            d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"/>
      </svg>
    </span>
@endif
