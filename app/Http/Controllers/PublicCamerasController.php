<?php

namespace App\Http\Controllers;

use App\Models\PublicCamera;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class PublicCamerasController extends Controller
{
    public function index() {
        $cameras = PublicCamera::all();

        return view('dashboard', [
            'cameras' => $cameras
        ]);
    }

    public function create() {
        return view('public-camera.create');
    }

    public function show(int $id) {
        $camera = PublicCamera::find($id);
        return view('public-camera.show', [
            'camera' => $camera,
        ]);
    }

    public function store(Request $request) {
        PublicCamera::create([
            'name' => $request->get('name'),
            'link' => $request->get('link'),
            'lat' => $request->get('lat'),
            'lng' => $request->get('lng'),
            'with_support_of' => $request->get('with_support_of'),
            'support_link' => $request->get('support_link'),
        ]);

        return redirect()->to(RouteServiceProvider::HOME);
    }

    public function update(int $id, Request $request) {
        PublicCamera::where('id', $id)
            ->update([
                'name' => $request->get('name'),
                'link' => $request->get('link'),
                'lat' => $request->get('lat'),
                'lng' => $request->get('lng'),
                'with_support_of' => $request->get('with_support_of'),
                'support_link' => $request->get('support_link'),
            ]);

        return redirect()->to(route('public-camera.show', ['id' => $id]));
    }

    public function destroy(int $id) {
        PublicCamera::find($id)
            ->delete();

        return redirect()->to(RouteServiceProvider::HOME);
    }
}
