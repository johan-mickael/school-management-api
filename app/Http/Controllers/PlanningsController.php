<?php

namespace App\Http\Controllers;

use App\Models\Planning;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class PlanningsController extends Controller
{
    public function get()
    {
        return Planning::get_v_plannings_for_calendar();
    }

    public function filter($classId)
    {
        if($classId < 1)
        return $this->get();
        return Planning::get_v_plannings_for_calendar($classId);
    }

   
}
