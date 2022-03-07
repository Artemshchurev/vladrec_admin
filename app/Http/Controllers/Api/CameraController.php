<?php

namespace App\Http\Controllers\Api;

use App\Models\Camera;
use App\Models\DemoBarrier;

class CameraController
{
    public function index() {
        return json_encode([
            'items' => Camera::all(),
        ]);
    }

    public function common() {
        $demoBarrier = DemoBarrier::first();
        return json_encode([
            'cameras' => Camera::all(),
            'demo_barrier' => [
                'id' => $demoBarrier->id,
                'camera_link' => $demoBarrier->camera_link,
            ],
        ]);
    }
}
