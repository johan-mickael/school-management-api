<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
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
        Schema::dropIfExists('students');
    }

    static function insert() {
        $data = [
            ['id' => 1,'first_name' => 'johan', 'last_name' => 'mickaël'],
            ['id' => 2,'first_name' => 'andy', 'last_name' => 'innocent'],
            ['id' => 3,'first_name' => 'toky', 'last_name' => 'be'],
            ['id' => 4,'first_name' => 'andry', 'last_name' => 'kely']
        ];
        DB::table('students')->insert($data);
    }
}
