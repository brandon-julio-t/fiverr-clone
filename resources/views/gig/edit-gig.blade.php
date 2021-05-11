@extends('layout.index')

@section('title', 'Edit Gig')

@section('content')
    <main class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-16">
        @include('partials.errors')

        <div class="grid grid-cols-1 gap-4">
            <form class="grid grid-cols-1 gap-4" action="{{ route('update-gig', $gig) }}" method="post"
                  enctype="multipart/form-data" novalidate>
                @csrf
                @method('put')
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                <x-text-field name="title" :required="true">{{ $gig->title }}</x-text-field>

                <x-text-field name="gig_category_id" label="Category" type="select" :required="true">
                    @foreach (\App\Models\GigCategory::all() as $category)
                        <option value="{{ $category->id }}"
                                @if ($gig->gigCategory->id == $category->id) selected @endif>{{ $category->name }}</option>
                    @endforeach
                </x-text-field>

                <x-text-field name="about" type="textarea" :required="true">
                    {{ $gig->about }}
                </x-text-field>

                <section class="grid grid-cols-3 gap-4">
                    <div class="grid gap-4">
                        <x-text-field name="basic_price" type="number" leading="$" :required="true">
                            {{ $gig->basic_price }}
                        </x-text-field>
                        <x-text-field name="basic_price_description" type="textarea" :required="true">
                            {{ $gig->basic_price_description }}
                        </x-text-field>
                    </div>
                    <div class="grid gap-4">
                        <x-text-field name="standard_price" type="number" leading="$" :required="true">
                            {{ $gig->standard_price }}
                        </x-text-field>
                        <x-text-field name="standard_price_description" type="textarea" :required="true">
                            {{ $gig->standard_price_description }}
                        </x-text-field>
                    </div>
                    <div class="grid gap-4">
                        <x-text-field name="premium_price" type="number" leading="$" :required="true">
                            {{ $gig->premium_price }}
                        </x-text-field>
                        <x-text-field name="premium_price_description" type="textarea" :required="true">
                            {{ $gig->premium_price_description }}
                        </x-text-field>
                    </div>
                </section>

                <x-text-field name="images[]" type="file" :multiple="true"></x-text-field>

                <x-button type="submit">Submit</x-button>
                <x-button href="{{ url()->previous() }}" :secondary="true">Cancel</x-button>
            </form>
            <form action="{{ route('delete-gig', $gig) }}" method="post">
                @csrf
                @method('delete')

                <button type="submit"
                        class=" w-full inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Delete
                </button>
            </form>
        </div>
    </main>
@endsection
