@extends('layout.index')

@section('title', 'Edit Profile')

@section('content')
    <main class="max-w-7xl mx-auto my-12 sm:px-6 lg:px-8">
        <form class="my-16 max-w-xl mx-auto grid grid-cols-1 gap-4" action="{{ route('update-profile', $user) }}"
              method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <x-text-field name="name" type="text" autocomplete="name" :required="true">{{ $user->name }}</x-text-field>
            <x-text-field name="email" type="email" autocomplete="email" :required="true">
                {{ $user->email }}
            </x-text-field>
            <x-text-field name="about" type="text" autocomplete="name">{{ $user->about }}</x-text-field>
            <x-text-field name="profile_picture" type="file"></x-text-field>
            <x-text-field name="description" type="textarea">{{ $user->description }}</x-text-field>

            <section class="grid gap-4">
                <x-button type="submit">Submit</x-button>
                <x-button href="{{ route('view-profile', $user) }}" :secondary="true">Cancel</x-button>
            </section>
        </form>
    </main>
@endsection
