<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class ApprovalsController extends Controller
{
    //Gets all of the unapproved restaurants for the view
    public function GetUnapproved(){

        $unapprovedRestaurants = User::where('user_type', 'restaurant')
            ->where('approved', false)
            ->get();

        return view('approvals', ['unapprovedRestaurants' => $unapprovedRestaurants]);
    }

    //Sets a given restaurant's approval to true
     public function approveRestaurant($id)
    {
        $restaurant = User::find($id);

        // Set the 'approved' column to true
        $restaurant->update(['approved' => true]);

        return redirect()->route('approvals')->with('success', 'Restaurant approved successfully.');
    }

    //Not really necessary but unapproves a restaurant for the unapprove button
    public function unapproveRestaurant($id)
    {
        $restaurant = User::find($id);

        // Set the 'approved' column to false
        $restaurant->update(['approved' => false]);

        return redirect()->route('approvals')->with('error', 'Restaurant already unapproved.');
    }


}
