<?php

namespace App\Services;

use App\Models\House;

class HouseService
{
    public function findAllHouses()
    {
        $houses = House::all();
        return response()->json($houses);
    }

    public function createHouse($request)
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

    public function showHouse($house)
    {
        return response()->json($house);
    }

    public function showUserHouses($user)
    {
        $houses = House::where('user_id', $user->id)->get();
        return response()->json($houses);
    }

    public function updateHouse($request, $house)
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

    public function deleteHouse($house)
    {
        $house->delete();
        return response()->json(null, 204);
    }
}
