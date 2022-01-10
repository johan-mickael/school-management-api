<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Chart extends Model
{
    use HasFactory;

    static function get_v_planning_hour($subclassId, $isRemote, $status)
    {
        $query = DB::table('v_planning_hour')
            ->select(DB::raw('subject_id, is_remote, sum(hour) hours'));
        $query->where('subject_id', '=', $subclassId);
        if ($isRemote != null)
            $query->where('is_remote', '=', $status);
        if ($status != null)
            $query->where('status', '=', $status);
        return $query->groupBy('subject_id', 'is_remote')
            ->get();
    }
}
