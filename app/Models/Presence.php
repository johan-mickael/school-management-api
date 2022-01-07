<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Presence extends Model
{
    use HasFactory;
    protected $table = 'PRESENCES';

    public static function _insert($input, $planningId, $terminate)
    {
        if ($terminate) {
            Planning::updateStatus($planningId, Planning::status_done);
        } else {
            if (Presence::isSaved($planningId)) {
                Presence::deleteAllPresence($planningId);
            } else {
                Planning::updateStatus($planningId, Planning::status_saved);
            }
        }
        Presence::insert($input);
    }

    public static function deleteAllPresence($planningId)
    {
        DB::table('PRESENCES')
            ->where('planning_id', '=', $planningId)
            ->delete();
    }

    public static function isSaved($planningId)
    {
        $checkPlanning = DB::table('PRESENCES')
            ->where('planning_id', '=', $planningId)
            ->get();
        return $checkPlanning->count();
    }
}
