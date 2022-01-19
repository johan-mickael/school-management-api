<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20)->nullable(false);
            $table->string('description')->nullable(true);
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
        Schema::dropIfExists('classes');
    }

    static function insert() {
        $data = [
            ['id' => 1,'name' => 'E1', 'description' => 'première année'],
            ['id' => 2,'name' => 'E2', 'description' => 'deuxième année'],
            ['id' => 3,'name' => 'E3', 'description' => 'troisième année'],
            ['id' => 4,'name' => 'E4', 'description' => 'quatrième année'],
            ['id' => 5,'name' => 'E5', 'description' => 'cinquième année']
        ];
        DB::table('classes')->insert($data);
    }
}
