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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false)->unique();
            $table->double('price')->nullable(false);
            $table->bigInteger('manufacturer_id')->nullable(false);
            $table->foreign(['manufacturer_id'])->on('manufacturers')->references('id');
            $table->bigInteger('user_id')->nullable(false);
            $table->foreign(['user_id'])->on('users')->references('id');
            $table->bigInteger('editor_id')->nullable();
            $table->foreign(['editor_id'])->on('users')->references('id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
