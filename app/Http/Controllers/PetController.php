<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PetController extends Controller
{
    // Display the homepage with the list of pets (available to everyone)
    public function index()
    {
        $pets = Pet::all(); // Fetch all pets from the database
        return view('pets.index', compact('pets')); // Return the 'index' view with pets data
    }

    // Show the details of a specific pet (available to everyone)
    public function show(Pet $pet)
    {
        return view('pets.show', compact('pet')); // Return the 'show' view with pet data
    }

    // Show the form for creating a new pet (restricted to authenticated users)
    public function create()
    {
        return view('pets.create'); // Return the 'create' view
    }

    // Store a newly created pet in the database (restricted to authenticated users)
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:40960',
        ]);

        // Handle file upload for the photo
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        // Create a new pet in the database
        Pet::create([
            'name' => $request->name,
            'breed' => $request->breed,
            'description' => $request->description,
            'photo' => $photoPath ?? null, // Assign the photo path if available
        ]);

        // Redirect to the index page with a success message
        return redirect()->route('pets.index')->with('success', 'Pet added successfully!');
    }

    // Show the form for editing a specific pet (restricted to authenticated users)
    public function edit(Pet $pet)
    {
        return view('pets.edit', compact('pet')); // Return the 'edit' view with pet data
    }

    // Update the specified pet in the database (restricted to authenticated users)
    public function update(Request $request, Pet $pet)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'image|mimes:jpeg,png,jpg|max:40960',
        ]);

        // Handle file upload for the photo
        if ($request->hasFile('photo')) {
            // Delete the old photo if a new one is uploaded
            if ($pet->photo) {
                Storage::disk('public')->delete($pet->photo);
            }

            $photoPath = $request->file('photo')->store('photos', 'public');
            $pet->photo = $photoPath; // Update the photo path
        }

        // Update the pet in the database
        $pet->update([
            'name' => $request->name,
            'breed' => $request->breed,
            'description' => $request->description,
            'photo' => $pet->photo, // Ensure photo is updated
        ]);

        // Redirect to the index page with a success message
        return redirect()->route('pets.index')->with('success', 'Pet updated successfully!');
    }

    // Delete the specified pet from the database (restricted to authenticated users)
    public function destroy(Pet $pet)
    {
        // Delete the pet's photo from storage
        if ($pet->photo) {
            Storage::disk('public')->delete($pet->photo);
        }

        // Delete the pet from the database
        $pet->delete();

        // Redirect to the index page with a success message
        return redirect()->route('pets.index')->with('success', 'Pet deleted successfully!');
    }
}
