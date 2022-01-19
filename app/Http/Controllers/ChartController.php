<?php

namespace App\Http\Controllers;

use App\Models\Chart;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{

    public function getPlanningRemoteHour($subjectId, $schoolyearId)
    {
        return Chart::getSubjectChartView($subjectId, $schoolyearId);
    }

    public function getVPlanningPresencesDurations($subjectId, $schoolyearId)
    {
        return DB::table('v_plannings_presences_durations')
            ->where('schoolyear_id', '=', $schoolyearId)
            ->where('subject_id', '=', $subjectId)
            ->get();
    }

    public function getAllVPlanningPresencesDurations($schoolyearId)
    {
        return DB::table('v_all_plannings_presences_durations')
            ->where('schoolyear_id', '=', $schoolyearId)
            ->get();
    }
}
