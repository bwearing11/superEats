<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    //Finds the dish and returns the detail view
    public function show($id)
    {
        // Retrieve the dish based on the provided ID
        $dish = Dish::findOrFail($id);

        // Pass the dish to the dish detail view
        return view('dishDetail', compact('dish'));
    }


    //Returns the add dish view
    public function create()
    {
        $restaurantUser = auth()->id();
        return view('addDish');
    }

    //Takes the form request, validates it and stores the new dish
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:dishes|min:3',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        $validatedData['user_id'] = auth()->id();

        // Create a new Dish instance
        Dish::create($validatedData);

        // Redirect back or to a success page
        return redirect()->route('restaurants.show', ['id' => auth()->id()]);
    }

    //Deletes a dish
    public function destroy($id)
    {
        // Find the dish by ID and delete it
        $dish = Dish::findOrFail($id);
        $dish->delete();

        // Redirect back or to a success page
        return redirect()->route('restaurants.show', ['id' => $dish->user_id]);
    }

    //Returns edit dish view
    public function edit($id)
    {
        $dish = Dish::findOrFail($id);
        return view('editDish', ['dish' => $dish]);
    }

    //Takes the form data and updates the dish
    public function update(Request $request, $id)
    {
        $dish = Dish::findOrFail($id);

        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:dishes|min:3',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        // Update the dish details
        $dish->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);

        // Redirect back to the dish details view
        return redirect()->route('dish.detail', ['id' => $dish->id]);
    }
}
