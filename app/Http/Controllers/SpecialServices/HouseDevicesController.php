<?php

namespace App\Http\Controllers\SpecialServices;

use App\Http\Controllers\Controller;
use App\Models\House;
use function view;

class HouseDevicesController extends Controller
{
    public function index(int $id) {
        $house = House::find($id);
        return view('special-service.house-devices', [
           'house' => $house,
        ]);
    }
}
