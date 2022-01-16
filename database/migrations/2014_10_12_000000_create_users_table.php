<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique('user_unique_email');
            $table->string('password')->nullable(false);
            $table->tinyInteger('role')->default(0);
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
        Schema::dropIfExists('users');
    }

    static function insert() {
        $data = [
            ['email' => 'admin@email.com', 'password' => md5('-root1010'), 'role' => 1],
            ['email' => 'guest@email.com', 'password' => md5('guest'), 'role' => 0]
        ];
        DB::table('users')->insert($data);
    }
}
