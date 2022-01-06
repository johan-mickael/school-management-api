<?php

namespace App\Http\Controllers;

use App\Models\Presence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PresenceController extends Controller
{
    public function save(Request $request)
    {
        Log::channel('api')->info('Presence API', [$request->get('presences')]);
        Presence::insert($request->presences);
    }
}
