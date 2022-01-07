<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

use function PHPUnit\Framework\isNull;

class Planning extends Model
{
    use HasFactory;
    protected $table = 'V_PLANNINGS';
    public const status_created = 0;
    public const status_saved = 1;
    public const status_done = 2;

    public static function get_v_plannings_for_calendar($subclass_id = null)
    {
        if ($subclass_id == null) {
            $plannings = DB::table('v_plannings')
                ->get();
        } else {
            $plannings = DB::table('v_plannings')
                ->where('subclass_id', '=', $subclass_id)
                ->get();
        }
        $res = array();
        for ($i = 0; $i < count($plannings); $i++) {
            $planning = $plannings[$i];
            $res[$i]['planningId'] = $planning->id;
            $res[$i]['title'] = strtoupper($planning->subclass_name)  . ' - ' . strtoupper($planning->subject_name)  . ' : ' . ucwords($planning->professor_name)  . ' - ' .  ucwords($planning->place);
            $res[$i]['start'] = concat_date_and_time($planning->planning_date, $planning->start);
            $res[$i]['end'] = concat_date_and_time($planning->planning_date, $planning->end);
            $res[$i]['isRemote'] = $planning->is_remote;
            $res[$i]['subclassId'] = $planning->subclass_id;
        }
        return $res;
    }

    public static function updateStatus($planningId, $status) {
        DB::table('PLANNINGS')
            ->where('id', $planningId)
            ->update(['status' => $status]);
    }
}
