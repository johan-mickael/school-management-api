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
            $table->string('name', 50)->nullable(false);
            $table->string('email', 100)->unique('user_unique_email');
            $table->timestamp('email_verified_at')->nullable(true);
            $table->string('password', 60)->nullable(false);
            $table->tinyInteger('role')->nullable(false);
            $table->string('image_url')->nullable(true);
            $table->rememberToken();
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
            ['name' => 'superadmin', 'email' => 'superadmin@estiam.com', 'password' => Hash::make('superadmin'), 'role' => 0],
            ['name' => 'sebastienferrari', 'email' => 'sebastienferrari@estiam.com', 'password' => Hash::make('sebastienferrari'), 'role' => 1],
            ['name' => 'mhand boufala', 'email' => 'mhandboufala@estiam.com', 'password' => Hash::make('mhandboufala'), 'role' => 2],
            ['name' => 'habib abid', 'email' => 'habibabid@estiam.com', 'password' => Hash::make('habibabid'), 'role' => 2],
            ['name' => 'seykamal medetov', 'email' => 'seykamalmedetov@estiam.com', 'password' => Hash::make('seykamalmedetov'), 'role' => 2],
            ['name' => 'johan mickaël', 'email' => 'johanmickael@estiam.com', 'password' => Hash::make('johanmickael'), 'role' => 3],
            ['name' => 'andy innocent', 'email' => 'andyinnocent@estiam.com', 'password' => Hash::make('andyinnocent'), 'role' => 3]
        ];
        DB::table('users')->insert($data);
    }
}
