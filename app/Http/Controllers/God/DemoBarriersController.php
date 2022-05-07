<?php

namespace App\Http\Controllers\God;

use App\Models\DemoBarrier;
use Illuminate\Http\Request;
use function redirect;
use function route;
use function view;

class DemoBarriersController
{
    public function index() {
        $demoBarrier = DemoBarrier::first();

        return view('god.demo-barriers.index', [
            'demoBarrier' => $demoBarrier,
        ]);
    }

    public function show(int $id) {
        $demoBarrier = DemoBarrier::find($id);
        return view('demo-barriers.show', [
            'demoBarrier' => $demoBarrier,
        ]);
    }

    public function update(int $id, Request $request) {
        DemoBarrier::where('id', $id)
            ->update([
                'link' => $request->get('link'),
                'camera_link' => $request->get('camera_link'),
            ]);

        return redirect()->intended(route('barriers.show', ['id' => $id]));
    }
}
