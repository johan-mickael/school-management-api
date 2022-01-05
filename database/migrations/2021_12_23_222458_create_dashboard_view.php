<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDashboardView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE OR REPLACE VIEW v_dashboard AS SELECT
        (
        SELECT
            COUNT(id)
        FROM
            students
        ) students,
        (
            SELECT
                COUNT(id)
            FROM
                professors
        ) professors,
        (
            SELECT
                COUNT(id)
            FROM
                administrators
        ) administrators,
        (
        SELECT
            COUNT(id)
        FROM
            classes
        ) classes,
        (
        SELECT
            COUNT(id)
        FROM
            subjects
        ) subjects,
        (
        SELECT
            COUNT(id)
        FROM
            modules
        ) modules,
        (
            SELECT
                COUNT(id)
            FROM
                plannings
        ) plannings");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS v_dashboard');
    }
}
