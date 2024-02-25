<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\Comment;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function index()
    {
        $houses = House::all();
        return response()->json($houses);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'house_title' => 'required|string',
            'house_description' => 'required|string',
            'rent_price' => 'required|integer',
            'house_picture' => 'required|string',
            'bedrooms' => 'required|integer',
            'restrooms' => 'required|integer',
            'bills_included' => 'required|boolean',
            'street' => 'required|string',
            'neighborhood' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string'
        ]);

        $house = House::create($validatedData);
        return response()->json($house, 201);
    }

    public function show(House $house)
    {
        return response()->json($house);
    }

    public function update(Request $request, House $house)
    {
        $validatedData = $request->validate([
            'house_title' => 'string',
            'house_description' => 'string',
            'rent_price' => 'integer',
            'house_picture' => 'string',
            'bedrooms' => 'integer',
            'restrooms' => 'integer',
            'bills_included' => 'boolean',
            'street' => 'string',
            'neighborhood' => 'string',
            'city' => 'string',
            'state' => 'string'
        ]);

        $house->update($validatedData);
        return response()->json($house, 200);
    }

    public function delete(House $house)
    {
        Comment::where('house_id', $house->id)->delete();
        $house->delete();
        return response()->json(null, 204);
    }

}
