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
            $table->unsignedInteger('user_id');
            $table->string('image_url')->nullable(true);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedInteger('by_user');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('students');
    }

    static function insert() {
        $data = [
            ['first_name' => 'johan', 'last_name' => 'mickaël', 'user_id' => 6, 'by_user' => 1],
            ['first_name' => 'andy', 'last_name' => 'innocent', 'user_id' => 7, 'by_user' => 1]
        ];
        DB::table('students')->insert($data);
    }
}
