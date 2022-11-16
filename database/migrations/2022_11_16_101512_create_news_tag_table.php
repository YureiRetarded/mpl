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
        Schema::create('news_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('news_id');
            $table->unsignedBigInteger('tag_id');
            $table->index('news_id', 'news_news_tag_idx');
            $table->index('tag_id', 'news_tag_tag_idx');
            $table->foreign('news_id', 'news_news_tag_fk')->on('news')->references('id');
            $table->foreign('tag_id', 'news_tag_tag_fk')->on('tags')->references('id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_tag');
    }
};
