<?php

namespace App\Http\Controllers;

use App\Models\Class_;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function get() {
        return json_encode(Class_::all());
    }
}
