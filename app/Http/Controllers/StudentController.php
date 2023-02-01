<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function getSchoolYear() {
        return DB::table('schoolyear')->orderByDesc('start')->get();
    }

    public function getStudents($subclassId, $schoolYearId) {
        return DB::table('v_students_subclasses_schoolyear')
            ->where('subclass_id', '=', $subclassId)
            ->where('schoolyear_id', '=', $schoolYearId)
            ->get();
    }
}
