<?php

namespace App\Http\Controllers;

use App\Models\HouseApplication;
use Illuminate\Http\Request;

class HouseApplicationsController extends Controller
{
    public function index() {
        $applications = HouseApplication::where('house_id', auth()->user()->adminHouse->id)
            ->where('is_approved', false)
            ->get();

        return view('house-admin.house-applications', [
            'applications' => $applications,
        ]);
    }

    public function approve(Request $request) {
        $application = HouseApplication::find($request->id);
        if ($application->house_id !== auth()->user()->adminHouse->id) {
            abort(403);
        }

        $application->update([
            'is_approved' => true,
        ]);

        return redirect()->to(route('house-applications'));
    }

    public function refuse(Request $request) {
        $application = HouseApplication::find($request->id);
        if ($application->house_id !== auth()->user()->adminHouse->id) {
            abort(403);
        }

        $application->delete();

        return redirect()->to(route('house-applications'));
    }
}
