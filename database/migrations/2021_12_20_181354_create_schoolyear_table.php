<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSchoolyearTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schoolyear', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description', 30)->nullable(false);
            $table->date('start')->nullable(false);
            $table->date('end')->nullable(false);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->index(['start', 'end']);
        });

        self::insert();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schoolyear');
    }

    static function insert() {
        $data = [
            ['description' => '2020 - 2021', 'start' => '2020-10-01', 'end' => '2021-08-31'],
            ['description' => '2021 - 2022', 'start' => '2021-10-01', 'end' => '2022-08-31']
        ];
        DB::table('schoolyear')->insert($data);
    }
}
