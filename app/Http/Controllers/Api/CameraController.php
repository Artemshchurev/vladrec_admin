<?php

namespace App\Http\Controllers\Api;

use App\Models\Camera;

class CameraController
{
    public function index() {
        return json_encode([
            'items' => Camera::all(),
        ]);
    }
}
