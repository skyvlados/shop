<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->dropUnique(['name']);
        });

        DB::statement('CREATE UNIQUE INDEX countries_name_unique ON countries (name) WHERE (deleted_at is null)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP INDEX countries_name_unique');
        Schema::table('countries', function (Blueprint $table) {
            $table->unique(['name']);
        });
    }
};
