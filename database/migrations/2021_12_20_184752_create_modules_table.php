<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
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
        Schema::dropIfExists('modules');
    }

    static function insert() {
        $data = [
            ['id' => 1,'name' => '2TECH1', 'description' => 'Module tech1 en deuxième année tronc commun'],
            ['id' => 2,'name' => '2TECH2', 'description' => 'Module tech2 deuxième année tronc commun']
        ];
        DB::table('modules')->insert($data);
    }
}
