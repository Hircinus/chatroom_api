<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_1_id')->unsigned();
            $table->foreign('user_1_id')
                    ->references('id')
                    ->on('users')
                    ->onCascade('delete');
            $table->integer('user_2_id')->unsigned();
            $table->foreign('user_2_id')
                            ->references('id')
                            ->on('users')
                            ->onCascade('delete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
