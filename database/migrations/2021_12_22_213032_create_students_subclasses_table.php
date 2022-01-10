<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateStudentsSubclassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_subclasses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('student_id');
            $table->unsignedInteger('subclass_id');
            $table->unsignedInteger('schoolyear_id');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('subclass_id')->references('id')->on('subclasses');
            $table->foreign('schoolyear_id')->references('id')->on('schoolyear');
        });
        self::insert();
        self::initialize_views();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students_subclasses');
    }

    static function insert()
    {
        $data = [
            ['student_id' => 1, 'subclass_id' => 2, 'schoolyear_id' => 2],
            ['student_id' => 2, 'subclass_id' => 1, 'schoolyear_id' => 1],
            ['student_id' => 2, 'subclass_id' => 2, 'schoolyear_id' => 2]
        ];
        DB::table('students_subclasses')->insert($data);
    }

    static function initialize_views()
    {
        DB::statement("CREATE OR REPLACE VIEW v_students_subclasses_schoolyear AS
        SELECT
            ss.id student_subclass_id,
            ss.student_id,
            ss.subclass_id,
            sy.id school_year_id,
            sy.start,
            sy.end,
            s.first_name,
            s.last_name,
            s.description
        FROM
            students_subclasses ss
        LEFT JOIN schoolyear sy ON
            sy.id = ss.schoolyear_id
        LEFT JOIN students s ON
            s.id = ss.student_id");
    }
}
