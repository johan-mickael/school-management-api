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

    public static function insert() {
        $data = [
            ['id' => 1,'first_name' => 'johan', 'last_name' => 'mickaël'],
            ['id' => 2,'first_name' => 'andy', 'last_name' => 'innocent'],
            ['id' => 3,'first_name' => 'eloise', 'last_name' => 'dubois'],
            ['id' => 4,'first_name' => 'legrand', 'last_name' => 'michel'],
            ['id' => 5, 'first_name' => 'aaron', 'last_name' => 'hank'],
            ['id' => 6, 'first_name' => 'agabnale', 'last_name' => 'frank'],
            ['id' => 7, 'first_name' => 'abbey', 'last_name' => 'edward'],
            ['id' => 8, 'first_name' => 'abel', 'last_name' => 'reuben'],
            ['id' => 9, 'first_name' => 'ba', 'last_name' => 'jin'],
            ['id' => 10, 'first_name' => 'baba', 'last_name' => 'meher'],
            ['id' => 11, 'first_name' => 'babbage', 'last_name' => 'charles'],
            ['id' => 12, 'first_name' => 'begin', 'last_name' => 'saul'],
            ['id' => 13, 'first_name' => 'carolla', 'last_name' => 'rachel'],
            ['id' => 14, 'first_name' => 'carter', 'last_name' => 'james'],
            ['id' => 15, 'first_name' => 'craik', 'last_name' => 'dinah'],
            ['id' => 16, 'first_name' => 'cray', 'last_name' => 'louis'],
            ['id' => 17, 'first_name' => 'durand', 'last_name' => 'tom'],
            ['id' => 18, 'first_name' => 'brad', 'last_name' => 'anthony'],
            ['id' => 19, 'first_name' => 'de raadt', 'last_name' => 'theo'],
            ['id' => 20, 'first_name' => 'eliot', 'last_name' => 'niles'],
            ['id' => 21, 'first_name' => 'ezrin', 'last_name' => 'fati'],
            ['id' => 22, 'first_name' => 'fakes', 'last_name' => 'dennis'],
            ['id' => 23, 'first_name' => 'gabor', 'last_name' => 'peter'],
            ['id' => 24, 'first_name' => 'olivier', 'last_name' => 'parker'],
            ['id' => 25, 'first_name' => 'mathias', 'last_name' => 'jose'],
            ['id' => 26, 'first_name' => 'troyes', 'last_name' => 'annick'],
            ['id' => 27, 'first_name' => 'merci', 'last_name' => 'Duchamp'],
            ['id' => 28, 'first_name' => 'toyes', 'last_name' => 'harris'],
            ['id' => 29, 'first_name' => 'jack', 'last_name' => 'morris'],
            ['id' => 30, 'first_name' => 'athès', 'last_name' => 'carole'],
            ['id' => 31, 'first_name' => 'amine', 'last_name' => 'defrais'],
            ['id' => 32, 'first_name' => 'harvey', 'last_name' => 'ali'],
            ['id' => 33, 'first_name' => 'jay', 'last_name' => 'dee'],
            ['id' => 34, 'first_name' => 'jenner', 'last_name' => 'chloe'],
            ['id' => 35, 'first_name' => 'james', 'last_name' => 'philip'],
            ['id' => 36, 'first_name' => 'john', 'last_name' => 'john jr'],
            ['id' => 37, 'first_name' => 'ken', 'last_name' => 'anthony'],
            ['id' => 38, 'first_name' => 'kennedy', 'last_name' => 'lisa'],
            ['id' => 39, 'first_name' => 'lincoln', 'last_name' => 'abraham'],
            ['id' => 40, 'first_name' => 'jack', 'last_name' => 'lohan'],
        ];
        DB::table('students')->insert($data);
    }
}
