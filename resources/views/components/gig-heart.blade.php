@props([

'gig'

])

@auth
    <svg id="love-gig-{{ $gig->id }}" xmlns="http://www.w3.org/2000/svg"
         class="@if ($gig->lovedByUsers->contains(auth()->id())) fill-current text-red-600 @endif cursor-pointer h-6 w-6"
         fill="none" viewBox="0 0 24 24"
         stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
    </svg>

    <script>
        let love{{ $gig->id }} = document.getElementById("love-gig-{{ $gig->id }}");

        function doLove{{ $gig->id }}() {
            window.axios.post("{{ route('love-gig', ['user' => auth()->user(), 'gig' => $gig]) }}").then();
            love{{ $gig->id }}.className.baseVal += ' fill-current text-red-600 ';

            love{{ $gig->id }}.onclick = () => doUnlove{{ $gig->id }}();
        }

        function doUnlove{{ $gig->id }}() {
            window.axios.delete("{{ route('unlove-gig', ['user' => auth()->user(), 'gig' => $gig]) }}").then();
            love{{ $gig->id }}.className.baseVal = love{{ $gig->id }}.className.baseVal.replaceAll(' fill-current text-red-600 ', '');

            love{{ $gig->id }}.onclick = () => doLove{{ $gig->id }}();
        }

        love{{ $gig->id }}.onclick = () => {
            @if ($gig->lovedByUsers->contains(auth()->id()))
            doUnlove{{ $gig->id }}()
            @else
            doLove{{ $gig->id }}()
            @endif
        }
    </script>
@else
    <div>{{-- empty div for flex justify --}}</div>
@endauth
