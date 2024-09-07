<!-- resources/views/pets/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Pet</h1>
    <form action="{{ route('pets.update', $pet) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Pet Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $pet->name }}" required>
        </div>
        <div class="mb-3">
            <label for="breed" class="form-label">Breed</label>
            <input type="text" class="form-control" id="breed" name="breed" value="{{ $pet->breed }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required>{{ $pet->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" class="form-control" id="photo" name="photo">
            <img src="{{ asset('storage/' . $pet->photo) }}" class="mt-3" width="150" alt="{{ $pet->name }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Pet</button>
    </form>
</div>
@endsection
