<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20)->nullable(false)->unique();
            $table->unsignedInteger('professor_id');
            $table->unsignedInteger('module_id');
            $table->string('description')->nullable(true);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('professor_id')->references('id')->on('professors');
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
        Schema::dropIfExists('subjects');
    }

    static function insert() {
        $data = [
            ['id' => 1, 'name' => '1wincli', 'professor_id' => 1, 'module_id' => 1, 'description' => 'Windows client OS administration'],
            ['id' => 2, 'name' => '1lincli', 'professor_id' => 2, 'module_id' => 1, 'description' => 'Linux client OS administration'],
            ['id' => 3, 'name' => '1PRGFUN', 'professor_id' => 3, 'module_id' => 2, 'description' => 'Programming Fundamentals'],
            ['id' => 4, 'name' => '1WEBFUN', 'professor_id' => 3, 'module_id' => 2, 'description' => 'Web Programming (HTML / CSS) Fundamentals'],
            ['id' => 5, 'name' => '1PERDEV', 'professor_id' => 4, 'module_id' => 3, 'description' => 'Personal development - Oral and written expression'],
            ['id' => 6, 'name' => '1WKMETH', 'professor_id' => 4, 'module_id' => 3, 'description' => 'Work and learning methodology'],
            ['id' => 7, 'name' => '1PROFBK', 'professor_id' => 16, 'module_id' => 4, 'description' => 'Professional feedback'],
            ['id' => 8, 'name' => '1HCKTHN', 'professor_id' => 1, 'module_id' => 4, 'description' => 'Hackathons'],
            ['id' => 9, 'name' => '2WINSVR', 'professor_id' => 5, 'module_id' => 5, 'description' => 'Windows server OS administration - Advanced'],
            ['id' => 10, 'name' => '2LINCLI', 'professor_id' => 2, 'module_id' => 5, 'description' => 'Linux client OS administration - Advanced'],
            ['id' => 11, 'name' => '2WEBADV', 'professor_id' => 3, 'module_id' => 6, 'description' => 'Web Programming - JavaScript React.js - Advanced'],
            ['id' => 12, 'name' => '2PHPADV', 'professor_id' => 6, 'module_id' => 6, 'description' => 'Web Programming - PHP Frameworks - Advanced'],
            ['id' => 13, 'name' => '2PERDEV', 'professor_id' => 4, 'module_id' => 7, 'description' => 'Personal development - Oral and written expression - Advanced'],
            ['id' => 14, 'name' => '2HCKTHN', 'professor_id' => 6, 'module_id' => 8, 'description' => 'Hackathons'],
            ['id' => 15, 'name' => '2BUSENG', 'professor_id' => 15, 'module_id' => 7, 'description' => 'Business English'],
            ['id' => 16, 'name' => '3CLOUDA', 'professor_id' => 5, 'module_id' => 9, 'description' => 'Cloud & Server administration (Active Directory, Azure)'],
            ['id' => 17, 'name' => '3LINVTZ', 'professor_id' => 6, 'module_id' => 9, 'description' => 'Advanced Linux administration and virtualization'],
            ['id' => 18, 'name' => '3DBAFUN', 'professor_id' => 7, 'module_id' => 10, 'description' => 'Database Administration - Fundamentals'],
            ['id' => 19, 'name' => '3BUSINT', 'professor_id' => 8, 'module_id' => 10, 'description' => 'Business intelligence'],
            ['id' => 20, 'name' => '3SEOWMK', 'professor_id' => 9, 'module_id' => 11, 'description' => 'Webmarketing'],
            ['id' => 21, 'name' => '3PROEXP', 'professor_id' => 10, 'module_id' => 11, 'description' => 'Internship - Professional Experience - Defense'],
            ['id' => 22, 'name' => '3ANDRO2', 'professor_id' => 11, 'module_id' => 12, 'description' => 'Development of mobile applications - Android'],
            ['id' => 23, 'name' => '3FULLS2', 'professor_id' => 12, 'module_id' => 12, 'description' => 'Full Stack Development - Back & Front'],
            ['id' => 24, 'name' => '3WIMOB2', 'professor_id' => 13, 'module_id' => 13, 'description' => 'Wireless and Mobility'],
            ['id' => 25, 'name' => '3CISCO2', 'professor_id' => 14, 'module_id' => 13, 'description' => 'Cisco CCNA CyberOps Associate'],
        ];
        DB::table('subjects')->insert($data);
    }
}
