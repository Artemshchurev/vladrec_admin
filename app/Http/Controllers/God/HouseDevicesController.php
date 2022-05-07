<?php

namespace App\Http\Controllers\God;

use App\Http\Controllers\Controller;
use App\Models\HouseDevice;
use Illuminate\Http\Request;
use function redirect;
use function route;
use function view;

class HouseDevicesController extends Controller
{
    public function show(int $id) {
        $device = HouseDevice::find($id);

        return view('god.house-devices.show', [
            'device' => $device,
        ]);
    }

    public function update(int $id, Request $request) {
        $barrier = HouseDevice::find($id);
        $barrier->update([
            'name' => $request->get('name'),
            'link' => $request->get('link'),
            'camera_link' => $request->get('camera_link'),
        ]);

        return redirect()->to(route('houses.show', ['id' => $barrier->house->id]));
    }

    public function destroy(int $id) {
        $barrier = HouseDevice::find($id);
        $houseId = $barrier->house->id;
        $barrier->delete();

        return redirect()->to(route('houses.show', ['id' => $houseId]));
    }
}
