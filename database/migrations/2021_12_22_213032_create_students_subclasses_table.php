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
            ['id' => 1,'student_id' => 1, 'subclass_id' => 1, 'schoolyear_id' => 2],
            ['id' => 2,'student_id' => 2, 'subclass_id' => 1, 'schoolyear_id' => 2],
            ['id' => 3,'student_id' => 3, 'subclass_id' => 1, 'schoolyear_id' => 2],
            ['id' => 4,'student_id' => 4, 'subclass_id' => 1, 'schoolyear_id' => 2],
            ['id' => 5,'student_id' => 5, 'subclass_id' => 1, 'schoolyear_id' => 2],
            ['id' => 6,'student_id' => 6, 'subclass_id' => 1, 'schoolyear_id' => 2],
            ['id' => 7,'student_id' => 7, 'subclass_id' => 2, 'schoolyear_id' => 2],
            ['id' => 8,'student_id' => 8, 'subclass_id' => 2, 'schoolyear_id' => 2],
            ['id' => 9,'student_id' => 9, 'subclass_id' => 2, 'schoolyear_id' => 2],
            ['id' => 10,'student_id' => 10, 'subclass_id' => 2, 'schoolyear_id' => 2],
            ['id' => 11,'student_id' => 11, 'subclass_id' => 2, 'schoolyear_id' => 2],
            ['id' => 12,'student_id' => 12, 'subclass_id' => 2, 'schoolyear_id' => 2],
            ['id' => 13,'student_id' => 13, 'subclass_id' => 3, 'schoolyear_id' => 2],
            ['id' => 14,'student_id' => 14, 'subclass_id' => 3, 'schoolyear_id' => 2],
            ['id' => 15,'student_id' => 15, 'subclass_id' => 3, 'schoolyear_id' => 2],
            ['id' => 16,'student_id' => 16, 'subclass_id' => 3, 'schoolyear_id' => 2],
            ['id' => 17,'student_id' => 17, 'subclass_id' => 3, 'schoolyear_id' => 2],
            ['id' => 18,'student_id' => 18, 'subclass_id' => 4, 'schoolyear_id' => 2],
            ['id' => 19,'student_id' => 19, 'subclass_id' => 4, 'schoolyear_id' => 2],
            ['id' => 20,'student_id' => 20, 'subclass_id' => 4, 'schoolyear_id' => 2],
            ['id' => 21,'student_id' => 21, 'subclass_id' => 4, 'schoolyear_id' => 2],
            ['id' => 22,'student_id' => 22, 'subclass_id' => 4, 'schoolyear_id' => 2],
            ['id' => 23,'student_id' => 23, 'subclass_id' => 4, 'schoolyear_id' => 2],

        ];
        DB::table('students_subclasses')->insert($data);
    }

    static function initialize_views()
    {
        DB::unprepared("CREATE OR REPLACE VIEW v_students_subclasses_schoolyear AS
        SELECT
            ss.id student_subclass_id,
            ss.student_id,
            ss.subclass_id,
            sy.id schoolyear_id,
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
