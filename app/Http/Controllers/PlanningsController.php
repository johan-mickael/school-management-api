<?php

namespace App\Http\Controllers;

use App\Models\Planning;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class PlanningsController extends Controller
{
    public function get($schoolyearId)
    {
        return Planning::get_v_plannings_for_calendar($schoolyearId);
    }

    public function filter($schoolyearId, $classId)
    {
        if($classId < 1)
        return $this->get($schoolyearId);
        return Planning::get_v_plannings_for_calendar($schoolyearId, $classId);
    }


}
