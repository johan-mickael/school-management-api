<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function getSchoolYear() {
        return DB::table('SCHOOLYEAR')->orderByDesc('start')->get();
    }

    public function getStudents($subclassId, $schoolYearId) {
        return DB::table('V_STUDENTS_SUBCLASSES_SCHOOLYEAR')
            ->where('subclass_id', '=', $subclassId)
            ->where('school_year_id', '=', $schoolYearId)
            ->get();
    }
}
