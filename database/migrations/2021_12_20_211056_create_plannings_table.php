<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePlanningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plannings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('subject_id');
            $table->unsignedInteger('subclass_id');
            $table->string('place', 30)->nullable(true);
            $table->date('planning_date')->nullable(false);
            $table->time('start')->nullable(false);
            $table->time('end')->nullable(false);
            $table->unsignedInteger('schoolyear_id');
            $table->boolean('is_remote')->default(false);
            $table->string('description')->nullable(true);
            $table->tinyInteger('status')->default(0);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('subclass_id')->references('id')->on('subclasses');
            $table->foreign('subject_id')->references('id')->on('subjects');
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
        Schema::dropIfExists('plannings');
    }

    static function insert()
    {
        $data = [
            ['id' => 1,'subject_id' => 1, 'subclass_id' => 1, 'place' => 'salle v', 'planning_date' => '2022-01-26', 'start' => '10:00:00', 'end' => '13:00:00', 'is_remote' => false, 'schoolyear_id' => 2],
            ['id' => 2,'subject_id' => 1, 'subclass_id' => 1, 'place' => 'salle v', 'planning_date' => '2022-01-26', 'start' => '14:00:00', 'end' => '17:00:00', 'is_remote' => false, 'schoolyear_id' => 2],
            ['id' => 3,'subject_id' => 1, 'subclass_id' => 1, 'place' => null, 'planning_date' => '2022-01-24', 'start' => '10:00:00', 'end' => '13:00:00', 'is_remote' => true, 'schoolyear_id' => 2],
            ['id' => 4,'subject_id' => 1, 'subclass_id' => 1, 'place' => null, 'planning_date' => '2022-01-24', 'start' => '14:00:00', 'end' => '17:00:00', 'is_remote' => true, 'schoolyear_id' => 2],
            ['id' => 5,'subject_id' => 2, 'subclass_id' => 1, 'place' => 'salle v', 'planning_date' => '2022-01-25', 'start' => '10:00:00', 'end' => '13:00:00', 'is_remote' => false, 'schoolyear_id' => 2],
            ['id' => 6,'subject_id' => 2, 'subclass_id' => 1, 'place' => 'salle v', 'planning_date' => '2022-01-25', 'start' => '14:00:00', 'end' => '17:00:00', 'is_remote' => false, 'schoolyear_id' => 2],
            ['id' => 7,'subject_id' => 2, 'subclass_id' => 1, 'place' => 'salle v', 'planning_date' => '2022-01-17', 'start' => '10:00:00', 'end' => '13:00:00', 'is_remote' => false, 'schoolyear_id' => 2],
            ['id' => 8,'subject_id' => 2, 'subclass_id' => 1, 'place' => 'salle v', 'planning_date' => '2022-01-17', 'start' => '14:00:00', 'end' => '17:00:00', 'is_remote' => false, 'schoolyear_id' => 2],
            ['id' => 9,'subject_id' => 3, 'subclass_id' => 1, 'place' => 'salle d', 'planning_date' => '2022-01-18', 'start' => '10:00:00', 'end' => '13:00:00', 'is_remote' => false, 'schoolyear_id' => 2],
            ['id' => 10,'subject_id' => 3, 'subclass_id' => 1, 'place' => 'salle d', 'planning_date' => '2022-01-18', 'start' => '14:00:00', 'end' => '17:00:00', 'is_remote' => false, 'schoolyear_id' => 2],
            ['id' => 11,'subject_id' => 3, 'subclass_id' => 1, 'place' => 'salle d', 'planning_date' => '2022-01-19', 'start' => '10:00:00', 'end' => '13:00:00', 'is_remote' => false, 'schoolyear_id' => 2],
            ['id' => 12,'subject_id' => 3, 'subclass_id' => 1, 'place' => 'salle d', 'planning_date' => '2022-01-19', 'start' => '14:00:00', 'end' => '17:00:00', 'is_remote' => false, 'schoolyear_id' => 2],
            ['id' => 13,'subject_id' => 4, 'subclass_id' => 2, 'place' => null, 'planning_date' => '2022-01-26', 'start' => '10:00:00', 'end' => '13:00:00', 'is_remote' => true, 'schoolyear_id' => 2],
            ['id' => 14,'subject_id' => 4, 'subclass_id' => 2, 'place' => null, 'planning_date' => '2022-01-26', 'start' => '14:00:00', 'end' => '17:00:00', 'is_remote' => true, 'schoolyear_id' => 2],
            ['id' => 15,'subject_id' => 4, 'subclass_id' => 2, 'place' => 'salle d', 'planning_date' => '2022-01-24', 'start' => '10:00:00', 'end' => '13:00:00', 'is_remote' => false, 'schoolyear_id' => 2],
            ['id' => 16,'subject_id' => 4, 'subclass_id' => 2, 'place' => 'salle d', 'planning_date' => '2022-01-24', 'start' => '14:00:00', 'end' => '17:00:00', 'is_remote' => false, 'schoolyear_id' => 2],
            ['id' => 17,'subject_id' => 5, 'subclass_id' => 2, 'place' => null, 'planning_date' => '2022-01-25', 'start' => '10:00:00', 'end' => '13:00:00', 'is_remote' => true, 'schoolyear_id' => 2],
            ['id' => 18,'subject_id' => 5, 'subclass_id' => 2, 'place' => null, 'planning_date' => '2022-01-25', 'start' => '14:00:00', 'end' => '17:00:00', 'is_remote' => true, 'schoolyear_id' => 2],
            ['id' => 19,'subject_id' => 5, 'subclass_id' => 2, 'place' => 'salle d', 'planning_date' => '2022-01-17', 'start' => '10:00:00', 'end' => '13:00:00', 'is_remote' => false, 'schoolyear_id' => 2],
            ['id' => 20,'subject_id' => 5, 'subclass_id' => 2, 'place' => 'salle d', 'planning_date' => '2022-01-17', 'start' => '14:00:00', 'end' => '17:00:00', 'is_remote' => false, 'schoolyear_id' => 2],
            ['id' => 21,'subject_id' => 6, 'subclass_id' => 2, 'place' => 'salle d', 'planning_date' => '2022-01-18', 'start' => '10:00:00', 'end' => '13:00:00', 'is_remote' => true, 'schoolyear_id' => 2],
            ['id' => 22,'subject_id' => 6, 'subclass_id' => 2, 'place' => 'salle d', 'planning_date' => '2022-01-18', 'start' => '14:00:00', 'end' => '17:00:00', 'is_remote' => true, 'schoolyear_id' => 2],
            ['id' => 23,'subject_id' => 6, 'subclass_id' => 2, 'place' => 'salle d', 'planning_date' => '2022-01-19', 'start' => '10:00:00', 'end' => '13:00:00', 'is_remote' => false, 'schoolyear_id' => 2],
            ['id' => 24,'subject_id' => 6, 'subclass_id' => 2, 'place' => 'salle d', 'planning_date' => '2022-01-19', 'start' => '14:00:00', 'end' => '17:00:00', 'is_remote' => false, 'schoolyear_id' => 2],
            ['id' => 25,'subject_id' => 7, 'subclass_id' => 2, 'place' => 'salle d', 'planning_date' => '2022-01-20', 'start' => '10:00:00', 'end' => '13:00:00', 'is_remote' => false, 'schoolyear_id' => 2],
            ['id' => 26,'subject_id' => 7, 'subclass_id' => 2, 'place' => 'salle d', 'planning_date' => '2022-01-20', 'start' => '14:00:00', 'end' => '17:00:00', 'is_remote' => false, 'schoolyear_id' => 2],
            ['id' => 27,'subject_id' => 7, 'subclass_id' => 2, 'place' => 'salle d', 'planning_date' => '2022-01-21', 'start' => '10:00:00', 'end' => '13:00:00', 'is_remote' => false, 'schoolyear_id' => 2],
            ['id' => 28,'subject_id' => 7, 'subclass_id' => 2, 'place' => 'salle d', 'planning_date' => '2022-01-21', 'start' => '14:00:00', 'end' => '17:00:00', 'is_remote' => false, 'schoolyear_id' => 2]

        ];
        DB::table('plannings')->insert($data);
    }

    static function initialize_views()
    {
        DB::unprepared("CREATE OR REPLACE VIEW v_plannings AS SELECT p.id, sb.id subclass_id, sb.name subclass_name, p.place, p.planning_date, p.start, p.end, p.is_remote, p.description, p.status, p.schoolyear_id, s.id subject_id, s.name subject_name, s.description subject_description, CONCAT(pr.first_name, ' ', pr.last_name) professor_name FROM `plannings` p LEFT JOIN subclasses sb ON sb.id = p.subclass_id LEFT JOIN subjects s ON s.id = p.subject_id LEFT JOIN professors pr ON pr.id = s.professor_id");
        DB::unprepared("CREATE OR replace VIEW v_planning_hour AS SELECT id, subject_id, TIME_TO_SEC(TIMEDIFF( END, START ))/3600 HOUR, is_remote, case when STATUS != 2 then 0 else status end status, schoolyear_id FROM plannings");
        // DB::unprepared("CREATE OR REPLACE VIEW v_planning_status_hour AS SELECT subject_id, CASE WHEN p.STATUS = 2 THEN 1 ELSE 0 END AS STATUS , SUM(HOUR) hours, schoolyear_id FROM v_planning_hour p GROUP BY subject_id, p.STATUS, schoolyear_id");
    }
}
