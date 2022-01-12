<?php

namespace App\Http\Controllers;

use App\Models\Planning;
use App\Models\Presence;
use App\Models\Student;
use Dotenv\Exception\ValidationException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PresenceController extends Controller
{

    public function get($planningId) {
        $planning = Planning::where('id', $planningId)->first();
        return [
            'presences' => DB::table('PRESENCES')->where('planning_id', '=', $planning->id)->get(),
            'students' => Student::getStudents($planning->subclass_id, $planning->schoolyear_id),
            'planning' => $planning
        ];
    }

    public static function insertPresence(Request $request, $terminate)
    {
        Log::channel('api')->info('Info', [$request->get('presences')]);
        $planningId =  $request->presences[0]['planning_id'];
        try {
            DB::beginTransaction();
            Presence::_insert($request->presences, $planningId, $terminate);
            DB::commit();
        } catch (QueryException $ex) {
            DB::rollBack();
            Log::channel('api')->error('Error insert presence', [$ex->getMessage()]);
        }
    }

    public function save(Request $request) {
        self::insertPresence($request, false);
    }

    public function terminate(Request $request) {
        self::insertPresence($request, true);
    }
}
