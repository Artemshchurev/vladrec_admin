<?php

namespace App\Http\Controllers;

use App\Models\Statistic;

class StatisticsController extends Controller
{
    public function index() {

        $statistics = Statistic::with('houseDevice')
            ->join('house_devices', 'statistics.house_device_id', '=', 'house_devices.id')
            ->where('house_devices.house_id', auth()->user()->adminHouse->id)
            ->get();

        return view('house-admin.statistics', [
            'statistics' => $statistics,
        ]);
    }
}
