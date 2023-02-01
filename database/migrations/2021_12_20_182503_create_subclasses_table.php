<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSubclassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subclasses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20)->nullable(false);
            $table->unsignedInteger('class_id')->index();
            $table->string('description')->nullable(true);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('class_id')->references('id')->on('classes');
        });

        self::insert();
        self::create_view_subclasses();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subclasses');
    }

    static function insert() {
        $data = [
            ['id' => 1, 'name' => 'E1A', 'class_id' => 1, 'description' => 'General'],
            ['id' => 2, 'name' => 'E2A', 'class_id' => 2, 'description' => 'General'],
            ['id' => 3, 'name' => 'E3A', 'class_id' => 3, 'description' => 'Data & Application Design'],
            ['id' => 4, 'name' => 'E3B', 'class_id' => 3, 'description' => 'Security & Cloud & Network'],
            ['id' => 5, 'name' => 'E4A', 'class_id' => 4, 'description' => 'Data & Application Design'],
            ['id' => 6, 'name' => 'E4B', 'class_id' => 4, 'description' => 'Security & Cloud & Network'],
            ['id' => 7, 'name' => 'E5A', 'class_id' => 5, 'description' => 'Web & Mobile'],
            ['id' => 8, 'name' => 'E5B', 'class_id' => 5, 'description' => 'Big Data & BI'],
            ['id' => 9, 'name' => 'E5C', 'class_id' => 5, 'description' => 'Security & Cloud & Network'],
        ];
        DB::table('subclasses')->insert($data);
    }

    static function create_view_subclasses() {
        DB::unprepared("
            CREATE OR REPLACE VIEW v_SUBCLASSES AS SELECT
            s.id,
            s.name,
            s.class_id,
            s.description,
            c.name class_name,
            c.description class_description
            FROM
                subclasses s
            LEFT JOIN classes c ON
                c.id = s.class_id"
        );
    }
}
