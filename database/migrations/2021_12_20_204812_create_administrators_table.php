<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAdministratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrators', function (Blueprint $table) {
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
        Schema::dropIfExists('administrators');
    }

    static function insert() {
        $data = [
            ['first_name' => 'sebastien', 'last_name' => 'ferrari', 'description' => 'responsable pédagogie campus paris', 'user_id' => 2, 'by_user' => 1]
        ];
        DB::table('administrators')->insert($data);
    }
}
