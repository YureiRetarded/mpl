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
        Schema::create('project_technology', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('technology_id');
            $table->index('project_id','project_project_technology_idx');
            $table->index('technology_id','project_technology_technology_idx');
            $table->foreign('project_id','project_project_technology_fk')->on('projects')->references('id');
            $table->foreign('technology_id','project_technology_technology_fk')->on('technologies')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_technology');
    }
};
