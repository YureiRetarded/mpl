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
        Schema::create('contact_information_user', function (Blueprint $table) {
            $table->unsignedBigInteger('contact_information_id');
            $table->unsignedBigInteger('user_id');
            $table->index('user_id', 'contact_information_user_user_idx');
            $table->index('contact_information_id', 'contact_information_contact_information_user_idx');
            $table->foreign('user_id', 'contact_information_user_user_fk')->on('users')->references('id');
            $table->foreign('contact_information_id', 'contact_information_contact_information_user_fk')->on('contact_information')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_information_user');
    }
};
