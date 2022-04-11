<?php

namespace App\Http\Controllers;

use App\Models\Camera;
use Illuminate\Http\Request;

class CamerasController extends Controller
{
    public function show(int $id) {
        $camera = Camera::find($id);

        return view('cameras.show', [
            'camera' => $camera,
        ]);
    }

    public function update(int $id, Request $request) {
        $camera = Camera::find($id);
        $camera->update([
            'name' => $request->get('name'),
            'link' => $request->get('link'),
        ]);

        return redirect()->to(route('houses.show', ['id' => $camera->house->id]));
    }

    public function destroy(int $id) {
        $camera = Camera::find($id);
        $houseId = $camera->house->id;
        $camera->delete();

        return redirect()->to(route('houses.show', ['id' => $houseId]));
    }
}
