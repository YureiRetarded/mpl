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
        Schema::create('project_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('tag_id');
            $table->index('project_id', 'project_project_tag_idx');
            $table->index('tag_id', 'project_tag_tag_idx');
            $table->foreign('project_id', 'project_project_tag_fk')->on('projects')->references('id')->onDelete('cascade');
            $table->foreign('tag_id', 'project_tag_tag_fk')->on('tags')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_tag');
    }
};
