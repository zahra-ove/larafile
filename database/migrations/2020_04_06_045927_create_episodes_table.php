<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('file_id')->constrained();

            $table->integer('episode_number');
            $table->string('episode_price', 20);
            $table->string('episode_title', 50);
            $table->text('short_description')->nullable();
            $table->string('slug', 50)->nullable();
            $table->integer('view_count')->nullable();
            $table->integer('download_count')->nullable();
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
        Schema::dropIfExists('episodes');
    }
}
