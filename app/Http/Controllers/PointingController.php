<?php

namespace App\Http\Controllers;

use App\Models\Planning;
use App\Models\Student;

class PointingController extends Controller
{
    public function get($planningId) {
        $planning = Planning::where('id', $planningId)->first();
        return Student::getByPlanning($planning->subclass_id, $planning->planning_date);
    }
}
