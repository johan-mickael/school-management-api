<?php

namespace App\Http\Controllers;

use App\Models\Subclass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubclassController extends Controller
{
    public function get()
    {
        return Subclass::all();
    }

    public function show($classId)
    {
        if ($classId < 1)
            return $this->get();
        return DB::table('V_SUBCLASSES')->where('class_id', '=', $classId)->get();
    }
}
