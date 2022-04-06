<?php

namespace App\Http\Controllers;

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
}
