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
            $table->string('place', 30);
            $table->date('planning_date')->nullable(false);
            $table->time('start')->nullable(false);
            $table->time('end')->nullable(false);
            $table->boolean('is_remote')->default(false);
            $table->string('description')->nullable(true);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('subclass_id')->references('id')->on('subclasses');
            $table->foreign('subject_id')->references('id')->on('subjects');
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
            ['subject_id' => 1, 'subclass_id' => 2, 'place' => 'salle v', 'planning_date' => '2022-01-05', 'start' => '10:00:00', 'end' => '13:00:00', 'is_remote' => false],
            ['subject_id' => 1, 'subclass_id' => 2, 'place' => 'salle v', 'planning_date' => '2022-01-05', 'start' => '14:00:00', 'end' => '17:00:00', 'is_remote' => false],
            ['subject_id' => 1, 'subclass_id' => 2, 'place' => 'salle v', 'planning_date' => '2022-01-07', 'start' => '10:00:00', 'end' => '13:00:00', 'is_remote' => true],
            ['subject_id' => 1, 'subclass_id' => 2, 'place' => 'salle v', 'planning_date' => '2022-01-07', 'start' => '14:00:00', 'end' => '17:00:00', 'is_remote' => true],
            ['subject_id' => 2, 'subclass_id' => 1, 'place' => 'salle d', 'planning_date' => '2022-01-07', 'start' => '10:00:00', 'end' => '13:00:00', 'is_remote' => false],
            ['subject_id' => 2, 'subclass_id' => 1, 'place' => 'salle d', 'planning_date' => '2022-01-07', 'start' => '13:00:00', 'end' => '17:00:00', 'is_remote' => false]
        ];
        DB::table('plannings')->insert($data);
    }

    static function initialize_views()
    {
        DB::statement("CREATE OR REPLACE VIEW v_plannings AS SELECT
        p.id,
        sb.id subclass_id,
        sb.name subclass_name,
        p.place,
        p.planning_date,
        p.start,
        p.end,
        p.is_remote,
        p.description,
        s.name subject_name,
        s.description subject_description,
        CONCAT(pr.first_name, ' ', pr.last_name) professor_name
    FROM
        `plannings` p
    LEFT JOIN subclasses sb ON
        sb.id = p.subclass_id
    LEFT JOIN subjects s ON
        s.id = p.subject_id
    LEFT JOIN professors pr ON
        pr.id = s.professor_id");
    }
}
