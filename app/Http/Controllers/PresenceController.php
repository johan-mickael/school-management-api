<?php

namespace App\Http\Controllers;

use App\Models\Planning;
use App\Models\Presence;
use Dotenv\Exception\ValidationException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PresenceController extends Controller
{
    public function save(Request $request)
    {
        Log::channel('api')->info('Info', [$request->get('presences')]);
        try {
            DB::beginTransaction();
            Presence::_insert($request->presences, $request->presences[0]['planning_id']);
            DB::commit();
        } catch (QueryException $ex) {
            DB::rollBack();
            Log::channel('api')->error('Error', [$ex->getMessage()]);
        }
    }
}
