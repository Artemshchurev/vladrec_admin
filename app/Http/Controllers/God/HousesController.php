<?php

namespace App\Http\Controllers\God;

use App\Http\Controllers\Controller;
use App\Models\Camera;
use App\Models\House;
use App\Models\HouseDevice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use function redirect;
use function route;
use function view;

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

    public function houseDeviceCreate(int $id) {
        $house = House::find($id);
        return view('houses.house-device-create', ['house' => $house]);
    }

    public function houseDeviceStore(int $id, Request $request) {
        HouseDevice::create([
            'name' => $request->get('name'),
            'link' => $request->get('link'),
            'camera_link' => $request->get('camera_link'),
            'type' => $request->get('type'),
            'house_id' => $id,
        ]);

        return redirect()->to(route('houses.show', ['id' => $id]));
    }

    public function cameraCreate(int $id) {
        $house = House::find($id);
        return view('houses.camera-create', [
            'house' => $house,
        ]);
    }

    public function cameraStore(int $id, Request $request) {
        Camera::create([
            'name' => $request->get('name'),
            'link' => $request->get('link'),
            'house_id' => $id,
        ]);

        return redirect()->to(route('houses.show', ['id' => $id]));
    }

    public function userCreate(int $id) {
        $house = House::find($id);
        return view('houses.user-create', [
            'house' => $house,
        ]);
    }

    public function userStore(int $id, Request $request) {
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make(Str::random()),
            'phone' => $request->get('phone'),
            'role' => 'client',
        ]);
        $house = House::find($id);
        $house->users()->attach($user->id);

        return redirect()->to(route('houses.show', ['id' => $id]));
    }
}
