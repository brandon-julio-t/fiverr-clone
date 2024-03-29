@props([

'name',
'type' => 'text',
'autocomplete' => 'off',
'required' => false,
'value' => '',
'leading' => '',
'multiple' => false,
'label' => null,
'min' => null,
'max' => null

])

<div>
    <label for="{{ $name }}"
           class="block text-sm font-medium text-gray-700">
        {{ Str::of($label ?? $name)->replace(['-', '_', '[]'], ' ')->title() }}
        @if (!$required) <span class="font-light">(Optional)</span> @endif
    </label>
    <div class="mt-1 relative rounded-md shadow-sm">
        @switch($type)
            @case ('textarea')
            <div class="mt-1 sm:mt-0 sm:col-span-2">
                <textarea id="{{ $name }}" name="{{ $name }}" rows="7" autocomplete="{{ $autocomplete }}"
                          @if ($required) required @endif
                          class="block shadow-sm w-full focus:ring-green-500 focus:border-green-500 sm:text-sm border-gray-300 rounded-md @error($name) pr-10 border-red-300 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                          @error(strval(Str::of($name)->replace(['-', '_', '[]'], ' '))) aria-invalid="true" aria-describedby="{{ $name }}-error" @enderror
                >{!! old($name, $slot) !!}</textarea>
            </div>
            @break

            @case('select')
            <div class="inset-y-0 flex items-center">
                <label for="category-id" class="sr-only">{{ $name }}</label>
                <select id="{{ $name }}" name="{{ $name }}"
                        @if ($required) required @endif
                        class="w-full focus:ring-green-500 focus:border-green-500 h-full py-0 pl-3 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md @error($name) pr-10 border-red-300 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                        @error(strval(Str::of($name)->replace(['-', '_', '[]'], ' '))) aria-invalid="true" aria-describedby="{{ $name }}-error" @enderror>
                    {{ $slot }}
                </select>
            </div>
            @break

            @default
            @if ($leading)
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <span class="text-gray-500 sm:text-sm">
                    {{ $leading }}
                  </span>
                </div>
            @endif
            <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" autocomplete="{{ $autocomplete }}"
                   @if ($required) required @endif
                   class="@if ($leading) pl-7 @endif appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm @error($name) pr-10 border-red-300 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                   @error(strval(Str::of($name)->replace(['-', '_', '[]'], ' '))) aria-invalid="true"
                   aria-describedby="{{ $name }}-error" @enderror
                   value="{{ old($name, $slot) }}" @if($multiple) multiple @endif
                   @if($min) min="{{ $min }}" @endif
                   @if($max) max="{{ $max }}" @endif>
            @break
        @endswitch

        @error(strval(Str::of($name)->replace(['-', '_', '[]'], ' ')))
        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
            <!-- Heroicon name: solid/exclamation-circle -->
            <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                 fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                      d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                      clip-rule="evenodd"/>
            </svg>
        </div>
        @enderror
    </div>

    @error(strval(Str::of($name)->replace(['-', '[]'], ' ')))
    <p class="mt-2 text-sm text-red-600" id="{{ $name }}-error">{{ $message }}</p>
    @enderror
</div>
