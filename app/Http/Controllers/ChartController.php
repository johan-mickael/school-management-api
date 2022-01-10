<?php

namespace App\Http\Controllers;

use App\Models\Chart;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{

    public function get_planning_remote_hour($subjectId)
    {
        return Chart::get_v_planning_hour($subjectId, null, null);
    }

    public function get_planning_status_hour($subjectId, $status)
    {
        return Chart::get_v_planning_hour($subjectId, null, $status);
    }
}
