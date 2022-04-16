<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UsersController extends Controller
{
    public function show(int $id, Request $request) {
        $user = User::find($id);

        return view('users.show', [
            'user' => $user,
        ]);
    }

    public function update(int $id, Request $request) {
        $user = User::find($id);
        $user->update([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
            ]);

        return view('users.show', [
            'user' => $user,
        ]);
    }
}
