<?php

use App\Models\Professor;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProfessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professors', function (Blueprint $table) {
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
        Schema::dropIfExists('professors');
    }

    static function insert() {
        $data = [
            ['id' => 1, 'first_name' => 'maria', 'last_name' => 'nushi'],
            ['id' => 2, 'first_name' => 'mohammed', 'last_name' => 'jose'],
            ['id' => 3, 'first_name' => 'muhammad', 'last_name' => 'ahmed'],
            ['id' => 4, 'first_name' => 'yan', 'last_name' => 'ali'],
            ['id' => 5, 'first_name' => 'john', 'last_name' => 'lenon'],
            ['id' => 6, 'first_name' => 'shu', 'last_name' => 'li'],
            ['id' => 7, 'first_name' => 'ying', 'last_name' => 'toau'],
            ['id' => 8, 'first_name' => 'yan', 'last_name' => 'ali'],
            ['id' => 9, 'first_name' => 'mickael', 'last_name' => 'carlos'],
            ['id' => 10, 'first_name' => 'Juan', 'last_name' => 'moise'],
            ['id' => 11, 'first_name' => 'Anna', 'last_name' => 'marthe'],
            ['id' => 12, 'first_name' => 'Mary', 'last_name' => 'madeleine'],
            ['id' => 13, 'first_name' => 'Jean', 'last_name' => 'paul'],
            ['id' => 14, 'first_name' => 'Robert', 'last_name' => 'francis'],
            ['id' => 15, 'first_name' => 'Daniel', 'last_name' => 'black'],
            ['id' => 16, 'first_name' => 'Luis', 'last_name' => 'vincent'],
        ];
        DB::table('professors')->insert($data);
    }
}
