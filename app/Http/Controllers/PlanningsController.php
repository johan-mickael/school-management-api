<?php

namespace App\Http\Controllers;

use App\Models\Planning;
use App\Models\Student;

class PlanningsController extends Controller
{
    public function get()
    {
        return Planning::get_v_plannings_for_calendar();
    }

    public function show($planningId) {
        $planning = Planning::where('id', $planningId)->first();
        return [
            'students' => Student::getByPlanning($planning->subclass_id, $planning->planning_date),
            'planning' => $planning
        ];
    }

    public function filter($classId)
    {
        if($classId < 1)
        return $this->get();
        return Planning::get_v_plannings_for_calendar($classId);
    }
}
