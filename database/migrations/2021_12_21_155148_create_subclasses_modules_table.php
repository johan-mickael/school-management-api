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
            $table->foreign('subclass_id')->references('id')->on('subclasses');
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
        Schema::dropIfExists('subclasses_modules');
    }

    static function insert() {
        $data = [
            ['id' => 1,'subclass_id' => 1, 'module_id' => 1],
            ['id' => 2,'subclass_id' => 1, 'module_id' => 2],
            ['id' => 3,'subclass_id' => 1, 'module_id' => 3],
            ['id' => 4,'subclass_id' => 1, 'module_id' => 4],
            ['id' => 5,'subclass_id' => 2, 'module_id' => 5],
            ['id' => 6,'subclass_id' => 2, 'module_id' => 6],
            ['id' => 7,'subclass_id' => 2, 'module_id' => 7],
            ['id' => 8,'subclass_id' => 2, 'module_id' => 8],
            ['id' => 9,'subclass_id' => 3, 'module_id' => 9],
            ['id' => 10,'subclass_id' => 3, 'module_id' => 10],
            ['id' => 11,'subclass_id' => 3, 'module_id' => 11],
            ['id' => 12,'subclass_id' => 3, 'module_id' => 12],
            ['id' => 13,'subclass_id' => 4, 'module_id' => 9],
            ['id' => 14,'subclass_id' => 4, 'module_id' => 10],
            ['id' => 15,'subclass_id' => 4, 'module_id' => 11],
            ['id' => 16,'subclass_id' => 4, 'module_id' => 13],
            ['id' => 17,'subclass_id' => 5, 'module_id' => 14],
            ['id' => 18,'subclass_id' => 5, 'module_id' => 15],
            ['id' => 19,'subclass_id' => 5, 'module_id' => 16],
            ['id' => 20,'subclass_id' => 5, 'module_id' => 17],
            ['id' => 21,'subclass_id' => 6, 'module_id' => 14],
            ['id' => 22,'subclass_id' => 6, 'module_id' => 15],
            ['id' => 23,'subclass_id' => 6, 'module_id' => 16],
            ['id' => 24,'subclass_id' => 6, 'module_id' => 18],
            ['id' => 25,'subclass_id' => 7, 'module_id' => 19],
            ['id' => 26,'subclass_id' => 7, 'module_id' => 20],
            ['id' => 27,'subclass_id' => 7, 'module_id' => 22],
            ['id' => 31,'subclass_id' => 8, 'module_id' => 19],
            ['id' => 32,'subclass_id' => 8, 'module_id' => 20],
            ['id' => 33,'subclass_id' => 8, 'module_id' => 21],
            ['id' => 35,'subclass_id' => 9, 'module_id' => 19],
            ['id' => 36,'subclass_id' => 9, 'module_id' => 20],
            ['id' => 37,'subclass_id' => 9, 'module_id' => 23],
        ];
        DB::table('subclasses_modules')->insert($data);
    }
}
