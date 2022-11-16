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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('status_id');
            $table->text('text')->nullable();
           $table->text('description')->nullable();
            $table->unsignedBigInteger('public_access_level_id');
            $table->string('github_link')->nullable();
            $table->string('url')->nullable();
            $table->index('status_id', 'project_status_idx');
            $table->index('public_access_level_id', 'public_access_level_project_idx');
            $table->foreign('status_id', 'project_status_fk')->on('statuses')->references('id');
            $table->foreign('public_access_level_id', 'public_access_level_project_fk')->on('public_access_levels')->references('id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
