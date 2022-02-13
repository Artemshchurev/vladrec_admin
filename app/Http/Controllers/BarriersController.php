<?php

namespace App\Http\Controllers;

use App\Models\DemoBarrier;

class BarriersController extends Controller
{
    public function index()
    {
        $demoBarrier = DemoBarrier::first();

        return view('barriers.index', [
            'demoBarrier' => $demoBarrier,
        ]);
    }
}
