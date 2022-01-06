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
            $table->boolean('is_present_class')->default(false);
            $table->boolean('is_present')->default(false);
            $table->boolean('is_late')->default(false);
            $table->string('comment')->nullable(true);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('planning_id')->references('id')->on('plannings');
        });
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

    static function insert() {
        $data = [
            ['description' => 'Année 2020 - 2021', 'start' => '2020-10-01', 'end' => '2021-08-31'],
            ['description' => 'Année 2021 - 2022', 'start' => '2021-10-01', 'end' => '2022-08-31']
        ];
        DB::table('schoolyear')->insert($data);
    }
}
