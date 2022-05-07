<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::table('manufacturers', function (Blueprint $table) {
            $table->addColumn('bigInteger','user_id')->nullable();
            $table->foreign('user_id')->on('users')->references('id');
            $table->addColumn('bigInteger','editor_id')->nullable();
            $table->foreign('editor_id')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('manufacturers', function (Blueprint $table) {
            $table->dropColumn('editor_id');
            $table->dropColumn('user_id');
        });
    }
};
