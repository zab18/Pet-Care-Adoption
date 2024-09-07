@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-center mb-6">Add New Pet</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pets.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="space-y-2">
            <label for="name" class="block text-lg font-medium">Pet Name</label>
            <input type="text" id="name" name="name" required
                class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-lavender-500">
        </div>

        <div class="space-y-2">
            <label for="breed" class="block text-lg font-medium">Breed</label>
            <input type="text" id="breed" name="breed" required
                class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-lavender-500">
        </div>

        <div class="space-y-2">
            <label for="description" class="block text-lg font-medium">Description</label>
            <textarea id="description" name="description" required
                class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-lavender-500"></textarea>
        </div>

        <div class="space-y-2">
            <label for="photo" class="block text-lg font-medium">Photo</label>
            <input type="file" id="photo" name="photo" required
                class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-lavender-500">
        </div>

        <button type="submit" class="bg-lavender-500 hover:bg-lavender-700 text-white font-bold py-3 px-6 rounded-md focus:outline-none">
            Add Pet
        </button>
    </form>
</div>
@endsection
