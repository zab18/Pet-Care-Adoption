@extends('layouts.app')

@section('header')
    <h1 class="text-3xl font-bold">Available Pets for Adoption</h1>
@endsection

@section('content')
<div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8">

    <!-- Catchy Line -->
    <div class="text-center mb-8">
        <h2 class="text-2xl font-semibold text-[#6A0DAD] dark:text-[#D8BFD8]">Need a home for your pets? You're in the right place!</h2>
    </div>

    <!-- Add New Pet Button -->
    <div class="flex justify-center mb-8">
        <a href="{{ route('pets.create') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-md transition duration-300 ease-in-out">
            Add New Pet
        </a>
    </div>

    <!-- Success Message -->
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-6 dark:bg-green-800 dark:text-green-100">
            {{ session('success') }}
        </div>
    @endif

    <!-- List of Pets -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($pets as $pet)
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                <!-- Update: Restrict image size and keep it responsive -->
                <img src="{{ asset('storage/' . $pet->photo) }}" alt="{{ $pet->name }}" class="w-full h-auto object-contain" style="max-width: 300px; max-height: 300px; margin: 0 auto;">
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100">{{ $pet->name }}</h2>
                    <p class="text-gray-700 dark:text-gray-300 mb-4">{{ Str::limit($pet->description, 100, '...') }}</p>
                    <div class="flex space-x-2">
                        <a href="{{ route('pets.show', $pet) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md">
                            View Details
                        </a>
                        <a href="{{ route('pets.edit', $pet) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded-md">
                            Edit
                        </a>
                        <form action="{{ route('pets.destroy', $pet) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this pet?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-md">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center text-gray-500 dark:text-gray-300">
                No pets available for adoption at the moment.
            </div>
        @endforelse
    </div>
</div>
@endsection
