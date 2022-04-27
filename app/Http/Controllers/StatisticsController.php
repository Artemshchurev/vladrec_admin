<?php

namespace App\Http\Controllers;

use App\Models\Statistic;

class StatisticsController extends Controller
{
    public function index() {

        $statistics = Statistic::with('barrier')
            ->join('barriers', 'statistics.barrier_id', '=', 'barriers.id')
            ->where('barriers.house_id', auth()->user()->adminHouse->id)
            ->get();

        return view('house-admin.statistics', [
            'statistics' => $statistics,
        ]);
    }
}
