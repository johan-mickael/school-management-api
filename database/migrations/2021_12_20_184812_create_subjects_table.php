<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20)->nullable(false)->unique();
            $table->unsignedInteger('professor_id');
            $table->unsignedInteger('module_id');
            $table->string('description')->nullable(true);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('professor_id')->references('id')->on('professors');
            $table->foreign('module_id')->references('id')->on('modules');
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
        Schema::dropIfExists('subjects');
    }

    static function insert() {
        $data = [
            ['name' => '2LINCLI', 'professor_id' => 1, 'module_id' => 1, 'description' => 'linux client os administration advanced'],
            ['name' => '2WINSVR', 'professor_id' => 2, 'module_id' => 1, 'description' => 'windows server os administration advanced'],
            ['name' => '2ALGDAT', 'professor_id' => 2, 'module_id' => 1, 'description' => 'windows server os administration advanced']
        ];
        DB::table('subjects')->insert($data);
    }
}
