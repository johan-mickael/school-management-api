<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProfessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 50)->nullable(false);
            $table->string('last_name', 50)->nullable(false);
            $table->string('description')->nullable(true);
            $table->string('image_url')->nullable(true);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('professors');
    }

    static function insert() {
        $data = [
            ['id' => 1, 'first_name' => 'mhand', 'last_name' => 'boufala'],
            ['id' => 2, 'first_name' => 'habib', 'last_name' => 'abid'],
            ['id' => 3, 'first_name' => 'seykamal', 'last_name' => 'medetov']
        ];
        DB::table('professors')->insert($data);
    }
}
