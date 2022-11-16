<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language_project', function (Blueprint $table) {
            $table->unsignedBigInteger('language_id');
            $table->unsignedBigInteger('project_id');
            $table->index('project_id', 'language_project_project_idx');
            $table->index('language_id', 'language_project_language_idx');
            $table->foreign('project_id', 'language_project_project_fk')->on('projects')->references('id');
            $table->foreign('language_id', 'language_project_language_fk')->on('languages')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_language');
    }
};
