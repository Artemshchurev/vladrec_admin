<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HouseDevice;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HouseDevicesController extends Controller
{
    public function open(int $id, Request $request) {
        if (!$request->user()->isSpecialService()) {
            return response()->json(['error' => 'No rights'], 403);
        }

        $device = HouseDevice::find($id);
        $client = new Client();
        $response = $client->request('GET', $device->link);

        return json_decode($response->getReasonPhrase());
    }
}
