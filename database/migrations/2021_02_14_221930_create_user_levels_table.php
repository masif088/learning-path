<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_levels', function (Blueprint $table) {

                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('learning_path_id');
                $table->integer('level');
                $table->timestamps();

                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();

                $table->foreign('learning_path_id')
                    ->references('id')
                    ->on('learning_paths')
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_levels');
    }
}
