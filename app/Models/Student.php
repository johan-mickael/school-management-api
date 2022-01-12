<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    use HasFactory;

    public static function getStudents($subclassId, $schoolyearId)
    {
        return DB::table('v_students_subclasses_schoolyear')
        ->where([
            ['subclass_id', '=', $subclassId],
            ['schoolyear_id', '=', $schoolyearId]
        ])->get();
    }
}
