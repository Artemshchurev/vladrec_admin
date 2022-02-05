<?php

namespace App\Http\Controllers;

use App\Models\Camera;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class CameraController extends Controller
{
    public function index() {
        $cameras = Camera::all();

        return view('dashboard', [
            'cameras' => $cameras
        ]);
    }

    public function create() {
        return view('camera.create');
    }

    public function show(int $id) {
        $camera = Camera::find($id);
        return view('camera.show', [
            'camera' => $camera,
        ]);
    }

    public function store(Request $request) {
        Camera::create([
            'name' => $request->get('name'),
            'link' => $request->get('link'),
            'lat' => $request->get('lat'),
            'lng' => $request->get('lng'),
            'with_support_of' => $request->get('with_support_of'),
        ]);

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function update(int $id, Request $request) {
        Camera::where('id', $id)
            ->update([
                'name' => $request->get('name'),
                'link' => $request->get('link'),
                'lat' => $request->get('lat'),
                'lng' => $request->get('lng'),
                'with_support_of' => $request->get('with_support_of'),
            ]);

        return redirect()->intended(route('camera.show', ['id' => $id]));
    }

    public function destroy(int $id) {
        Camera::find($id)
            ->delete();

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
