<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Chart extends Model
{
    use HasFactory;

    static function getSubjectChartView($subclassId, $schoolyearId)
    {
        $query = DB::table('v_planning_hour')
            ->select(DB::raw('is_remote, status, sum(hour) hours'));
        $query->where('subject_id', '=', $subclassId)
            ->where('schoolyear_id', '=', $schoolyearId);
        return $query->groupBy('is_remote', 'status')
            ->get();
    }
}

