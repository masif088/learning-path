<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('learning_path_id');
            $table->string('title');
            $table->integer('level');
            $table->unsignedBigInteger('type');
            $table->string('slug')->nullable();
            $table->longText('module')->nullable();
            $table->timestamps();

            $table->foreign('learning_path_id')
                ->references('id')
                ->on('learning_paths')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('type')
                ->references('id')
                ->on('module_types')
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
        Schema::dropIfExists('module');
    }
}
