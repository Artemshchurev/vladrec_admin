<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DemoBarrier;
use GuzzleHttp\Client;

class DemoBarriersController extends Controller
{
    public function open() {
        $demoBarrier = DemoBarrier::first();
        $client = new Client();
        $response = $client->request('GET', $demoBarrier->link);

        return $response->getReasonPhrase();
    }
}
