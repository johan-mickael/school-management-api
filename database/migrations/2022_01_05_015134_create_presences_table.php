<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePresencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presences', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('student_id');
            $table->unsignedInteger('planning_id');
            $table->unsignedInteger('subject_id');
            $table->boolean('is_present_class')->default(false);
            $table->boolean('is_present')->default(false);
            $table->boolean('is_late')->default(false);
            $table->time('arriving_time')->nullable(true);
            $table->string('comment')->nullable(true);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('planning_id')->references('id')->on('plannings');
            $table->foreign('subject_id')->references('id')->on('subjects');
        });

        self::initializeViews();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presences');
    }

    public static function initializeViews()
    {
        DB::unprepared("CREATE OR REPLACE VIEW v_plannings_presences AS SELECT pr.student_id, pr.planning_id, pr.subject_id, pr.is_present_class, pr.is_present, pr.is_late, TIME_TO_SEC(TIMEDIFF(pl.end, pl.start)) / 3600 course_duration, pl.is_remote, coalesce(TIME_TO_SEC( TIMEDIFF(pl.end, pr.arriving_time)) / 3600, 0) assisting_duration, pl.schoolyear_id FROM presences pr LEFT JOIN plannings pl ON pl.id = pr.planning_id");
        DB::unprepared("CREATE OR REPLACE VIEW v_plannings_presences_duration AS SELECT student_id, planning_id, subject_id, is_remote, is_present_class, is_present, is_late, course_duration, assisting_duration, course_duration - assisting_duration non_assisting_duration, CASE WHEN is_present_class = TRUE THEN assisting_duration ELSE 0 END assisting_duration_class, CASE WHEN is_present_class = FALSE THEN assisting_duration ELSE 0 END assisting_duration_remote, schoolyear_id FROM v_plannings_presences");
        DB::unprepared("CREATE OR REPLACE VIEW v_plannings_presences_durations AS SELECT student_id, subject_id, SUM(course_duration) course_duration, SUM(assisting_duration) assisting_duration, SUM(non_assisting_duration) non_assisting_duration, SUM(assisting_duration_class) assisting_duration_class, SUM(assisting_duration_remote) assisting_duration_remote, schoolyear_id FROM `v_plannings_presences_duration` GROUP BY student_id, subject_id, schoolyear_id");
    }
}
