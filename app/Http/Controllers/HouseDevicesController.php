<?php

namespace App\Http\Controllers;

use App\Models\House;

class HouseDevicesController extends Controller
{
    public function index(int $id) {
        $house = House::find($id);
        return view('special-service.house-devices', [
           'house' => $house,
        ]);
    }
}
