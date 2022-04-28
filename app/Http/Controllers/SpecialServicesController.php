<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SpecialServicesController extends Controller
{
    public function index() {
        $users = User::where('role', 'special-service')
            ->get();

        return view('special-services.index', [
            'users' => $users,
        ]);
    }

    public function create() {
        return view('special-services.create');
    }

    public function store(Request $request) {
        $password = Str::random(20);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'special-service',
            'password' => Hash::make($password),
        ]);

        return redirect()->to('special-services')->with('success', "Создан пользователь с паролем $password");
    }

    public function show(int $id) {
        $user = User::find($id);

        return view('special-services.show', [
           'user' => $user,
        ]);
    }

    public function update(int $id, Request $request) {
        User::where('id', $id)
            ->update([
                'name' => $request->name,
            ]);

        return redirect()->to('special-services');
    }

    public function destroy(int $id) {
        User::find($id)->delete();

        return redirect()->to('special-services');
    }
}
