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

    public const status_created = 0;
    public const status_saved = 1;
    public const status_done = 2;

    public static function _insert($input, $planning_id) {
        $checkPlanning = DB::table('PRESENCES')->where('planning_id', '=', $planning_id)->get();
        if(!$checkPlanning->count()) {
            DB::table('plannings')
                ->where('id', $input[0]['planning_id'])
                ->update(['status' => Presence::status_saved]);
        } else {
            DB::table('PRESENCES')
                ->where('planning_id', '=', $planning_id)
                ->delete();
        }
        Presence::insert($input);
    }

}
