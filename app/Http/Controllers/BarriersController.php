<?php

namespace App\Http\Controllers;

use App\Models\Barrier;
use App\Models\Camera;
use App\Models\DemoBarrier;
use Illuminate\Http\Request;

class BarriersController extends Controller
{
    public function index()
    {
        $demoBarrier = DemoBarrier::first();

        return view('barriers.index', [
            'demoBarrier' => $demoBarrier,
        ]);
    }

    public function show(int $id) {
        $barrier = Barrier::find($id);

        return view('barriers.show', [
            'barrier' => $barrier,
        ]);
    }

    public function update(int $id, Request $request) {
        $barrier = Barrier::find($id);
        $barrier->update([
            'name' => $request->get('name'),
            'link' => $request->get('link'),
            'camera_link' => $request->get('camera_link'),
        ]);

        return redirect()->to(route('houses.show', ['id' => $barrier->house->id]));
    }

    public function destroy(int $id) {
        $barrier = Barrier::find($id);
        $houseId = $barrier->house->id;
        $barrier->delete();

        return redirect()->to(route('houses.show', ['id' => $houseId]));
    }
}
