<?php

namespace App\Http\Controllers;

use App\Models\House;
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
            'user_id' => 'required|integer',
            'house_title' => 'required|string',
            'house_description' => 'required|string',
            'rent_price' => 'required|integer',
            'house_picture' => 'required|string',
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
            'house_title' => 'required|string',
            'house_description' => 'required|string',
            'rent_price' => 'required|integer',
            'house_picture' => 'required|string',
            'street' => 'required|string',
            'neighborhood' => 'required|string',
            'city' => 'required|string',
        ]);

        $house->update($validatedData);
        return response()->json($house, 200);
    }

    public function delete(House $house)
    {
        $house->delete();
        return response()->json(null, 204);
    }

}
