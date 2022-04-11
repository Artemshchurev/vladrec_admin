<?php

namespace App\Http\Controllers;

use App\Models\Barrier;
use App\Models\Camera;
use App\Models\House;
use Illuminate\Http\Request;

class HousesController extends Controller
{
    public function index() {
        $houses = House::all();

        return view('houses.index', [
            'houses' => $houses,
        ]);
    }

    public function show(int $id) {
        $house = House::find($id);
        return view('houses.show', [
            'house' => $house,
        ]);
    }

    public function create() {
        return view('houses.create');
    }

    public function store(Request $request) {
        House::create([
            'address' => $request->get('address'),
        ]);

        return redirect()->to('houses');
    }

    public function update($id, Request $request) {
        House::where('id', $id)
            ->update([
                'address' => $request->get('address'),
            ]);

        return redirect()->to(route('houses.show', ['id' => $id]));
    }

    public function destroy(int $id) {
        House::find($id)
            ->delete();

        return redirect()->to('houses');
    }

    public function barrierCreate(int $id) {
        return view('houses.barrier-create');
    }

    public function barrierStore(int $id, Request $request) {
        Barrier::create([
            'name' => $request->get('name'),
            'link' => $request->get('link'),
            'camera_link' => $request->get('camera_link'),
            'house_id' => $id,
        ]);

        return redirect()->to(route('houses.show', ['id' => $id]));
    }

    public function cameraCreate(int $id) {
        return view('houses.camera-create');
    }

    public function cameraStore(int $id, Request $request) {
        Camera::create([
            'name' => $request->get('name'),
            'link' => $request->get('link'),
            'house_id' => $id,
        ]);

        return redirect()->to(route('houses.show', ['id' => $id]));
    }
}
