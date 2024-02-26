<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\Comment;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Services\HouseService;

class HouseController extends Controller
{
    public function __construct(HouseService $houseService)
    {
        $this->houseService = $houseService;
    }

    public function index()
    {
        return $this->houseService->findAllHouses();
    }

    public function store(Request $request)
    {
        return $this->houseService->createHouse($request);
    }

    public function show(House $house)
    {
        return $this->houseService->showHouse($house);
    }

    public function update(Request $request, House $house)
    {
        return $this->houseService->updateHouse($request, $house);
    }

    public function delete(House $house)
    {
        Comment::where('house_id', $house->id)->delete();
        return $this->houseService->deleteHouse($house);
    }

}
