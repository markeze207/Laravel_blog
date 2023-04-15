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
        Schema::create('post_clubs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('club_id');

            $table->index('post_id', 'post_club_post_idx');
            $table->index('club_id', 'post_club_club_idx');

            $table->foreign('post_id', 'post_club_post_fk')->on('posts')->references('id');
            $table->foreign('club_id', 'post_club_club_fk')->on('clubs')->references('id');

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
        Schema::dropIfExists('post_clubs');
    }
};
