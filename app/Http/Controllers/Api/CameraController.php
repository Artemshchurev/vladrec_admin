<?php

namespace App\Http\Controllers\Api;

use App\Models\PublicCamera;
use App\Models\DemoBarrier;

class CameraController
{
    public function index() {
        return json_encode([
            'items' => PublicCamera::all(),
        ]);
    }

    public function common() {
        $demoBarrier = DemoBarrier::first();
        return json_encode([
            'cameras' => PublicCamera::all(),
            'demo_barrier' => [
                'id' => $demoBarrier->id,
                'camera_link' => $demoBarrier->camera_link,
            ],
        ]);
    }
}
