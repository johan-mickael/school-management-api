<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Chart extends Model
{
    use HasFactory;

    static function getVPlanningHour($subclassId, $schoolyearId, $isRemote, $status)
    {
        $query = DB::table('v_planning_hour')
            ->select(DB::raw('is_remote, sum(hour) hours'));
        $query->where('subject_id', '=', $subclassId)->where('schoolyear_id', '=', $schoolyearId);
        if ($isRemote != null)
            $query->where('is_remote', '=', $status);
        if ($status != null)
            $query->where('status', '=', $status);
        return $query->groupBy('is_remote')->get();
    }


}
