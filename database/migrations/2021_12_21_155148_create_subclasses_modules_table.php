<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSubclassesModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subclasses_modules', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('subclass_id');
            $table->unsignedInteger('module_id');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedInteger('by_user');
            $table->foreign('subclass_id')->references('id')->on('subclasses');
            $table->foreign('module_id')->references('id')->on('modules');
            $table->foreign('by_user')->references('id')->on('users');
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
        Schema::dropIfExists('subclasses_modules');
    }

    static function insert() {
        $data = [
            ['subclass_id' => 2, 'module_id' => 1, 'by_user' => 1],
            ['subclass_id' => 2, 'module_id' => 2, 'by_user' => 1]
        ];
        DB::table('subclasses_modules')->insert($data);
    }
}
