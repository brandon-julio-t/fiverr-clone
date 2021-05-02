@extends('layout.index')

@section('title', 'Create Gig')

@section('content')
    <main class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-16">
        @if ($errors->any())
            <section class="bg-red-600 text-white mb-4 p-4 rounded">
                <h2>Please fix the following errors.</h2>
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </section>
        @endif

        <form class="grid grid-cols-1 gap-4" action="{{ route('create-gig') }}" method="post"
              enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">

            <x-text-field name="title" :required="true"></x-text-field>

            <x-text-field name="gig_category_id" label="Category" type="select" :required="true">
                @foreach (\App\Models\GigCategory::all() as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </x-text-field>

            <x-text-field name="about" type="textarea" :required="true"></x-text-field>

            <section class="grid grid-cols-3 gap-4">
                <div class="grid gap-4">
                    <x-text-field name="basic_price" type="number" leading="$" :required="true"></x-text-field>
                    <x-text-field name="basic_price_description" type="textarea" :required="true"></x-text-field>
                </div>
                <div class="grid gap-4">
                    <x-text-field name="standard_price" type="number" leading="$" :required="true"></x-text-field>
                    <x-text-field name="standard_price_description" type="textarea" :required="true"></x-text-field>
                </div>
                <div class="grid gap-4">
                    <x-text-field name="premium_price" type="number" leading="$" :required="true"></x-text-field>
                    <x-text-field name="premium_price_description" type="textarea" :required="true"></x-text-field>
                </div>
            </section>

            <x-text-field name="images[]" type="file" :multiple="true" :required="true"></x-text-field>

            <x-button type="submit">Submit</x-button>
        </form>
    </main>
@endsection
