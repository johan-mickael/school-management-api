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

    // public static function get_v_plannings_for_calendar($schoolyearId, $subclass_id = null)
    // {
    //     $query = DB::unprepared('v_plannings')
    //         ->where('schoolyear_id', '=', $schoolyearId);
    //     if ($subclass_id != null)
    //         $query = $query->where('subclass_id', '=', $subclass_id);
    //     $plannings = $query->get();
    //     $res = array();
    //     for ($i = 0; $i < count($plannings); $i++) {
    //         $planning = $plannings[$i];
    //         $res[$i]['planningId'] = $planning->id;
    //         $res[$i]['title'] = strtoupper($planning->subclass_name)  . ' - ' . strtoupper($planning->subject_name)  . ' : ' . ucwords($planning->professor_name)  . ' - ' .  ucwords($planning->place);
    //         $res[$i]['start'] = concat_date_and_time($planning->planning_date, $planning->start);
    //         $res[$i]['end'] = concat_date_and_time($planning->planning_date, $planning->end);
    //         $res[$i]['isRemote'] = $planning->is_remote;
    //         $res[$i]['subclassId'] = $planning->subclass_id;
    //         $res[$i]['schoolyearId'] = $planning->schoolyear_id;
    //     }
    //     return $res;
    // }

    public static function get_v_plannings_for_calendar($schoolyearId, $subclass_id = null)
    {
        $query = sprintf("select * from v_plannings where schoolyear_id = %s", $schoolyearId);
        if ($subclass_id != null)
            $query = sprintf($query + " and subclass_id = %s", $subclass_id);
        $plannings = DB::select($query);
        $res = array();
        for ($i = 0; $i < count($plannings); $i++) {
            $planning = $plannings[$i];
            $res[$i]['planningId'] = $planning->id;
            $res[$i]['title'] = strtoupper($planning->subclass_name)  . ' - ' . strtoupper($planning->subject_name)  . ' : ' . ucwords($planning->professor_name)  . ' - ' .  ucwords($planning->place);
            $res[$i]['start'] = concat_date_and_time($planning->planning_date, $planning->start);
            $res[$i]['end'] = concat_date_and_time($planning->planning_date, $planning->end);
            $res[$i]['isRemote'] = $planning->is_remote;
            $res[$i]['subclassId'] = $planning->subclass_id;
            $res[$i]['schoolyearId'] = $planning->schoolyear_id;
        }
        return $res;
    }

    public static function updateStatus($planningId, $status)
    {
        DB::table('PLANNINGS')
            ->where('id', $planningId)
            ->update(['status' => $status]);
    }

}
