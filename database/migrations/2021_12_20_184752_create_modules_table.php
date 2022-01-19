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
            ['id' => 1,'name' => '1tech1'],
            ['id' => 2,'name' => '1tech2'],
            ['id' => 3,'name' => '1soft1'],
            ['id' => 4,'name' => '1pro1'],
            ['id' => 5,'name' => '2tech1'],
            ['id' => 6,'name' => '2tech2'],
            ['id' => 7,'name' => '2soft1'],
            ['id' => 8,'name' => '2pro1'],
            ['id' => 9,'name' => '3tech1'],
            ['id' => 10,'name' => '3soft1'],
            ['id' => 11,'name' => '3pro1'],
            ['id' => 12,'name' => '3spedad1'],
            ['id' => 13,'name' => '3speccsn1'],
            ['id' => 14,'name' => '4tech1'],
            ['id' => 15,'name' => '4datasoft1'],
            ['id' => 16,'name' => '4pro1'],
            ['id' => 17,'name' => '4spedad1'],
            ['id' => 18,'name' => '4speccsn1'],
            ['id' => 19,'name' => '5soft1'],
            ['id' => 20,'name' => '5soft2'],
            ['id' => 21,'name' => '5spebdai1'],
            ['id' => 22,'name' => '5spewmd'],
            ['id' => 23,'name' => '5speccsn1']
        ];
        DB::table('modules')->insert($data);
    }
}
