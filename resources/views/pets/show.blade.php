@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold mb-6">Pet Details</h1>

    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden mb-6">
        <img src="{{ asset('storage/' . $pet->photo) }}" class="w-full h-72 object-cover" alt="{{ $pet->name }}">
        <div class="p-6">
            <h5 class="text-2xl font-semibold mb-4">{{ $pet->name }}</h5>
            <p class="text-lg text-gray-700 dark:text-gray-300 mb-2"><strong>Breed:</strong> {{ $pet->breed }}</p>
            <p class="text-lg text-gray-700 dark:text-gray-300 mb-4"><strong>Description:</strong> {{ $pet->description }}</p>

            @guest
                <p class="text-red-500">Want to adopt {{ $pet->name }}? Please <a href="{{ route('login') }}" class="text-blue-500">login</a> to request adoption.</p>
            @else
                @if (auth()->id() === $pet->user_id)
                    <!-- Owner's view -->
                    <p class="text-green-500">You are the owner of {{ $pet->name }}.</p>
                    <!-- Show any adoption requests here (if implemented) -->
                @else
                    <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md">Request to Adopt</a>
                @endif
            @endguest

            <a href="{{ route('pets.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md mt-4">Back to List</a>
        </div>
    </div>
</div>
@endsection
