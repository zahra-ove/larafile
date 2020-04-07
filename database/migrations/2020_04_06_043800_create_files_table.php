<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('file_code', 35)->nullable();
            $table->string('file_name', 35);
            $table->string('price', 20);
            $table->string('file_type', 15);
            $table->text('description')->nullable();
            $table->string('file_path')->nullable();
            $table->integer('download_count')->nullable();
            $table->integer('view_count')->nullable();

            $table->foreignId('category_id')->constrained();

            $table->string('file_size', 15)->nullable();
            $table->string('time', 35)->nullable();
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
        Schema::dropIfExists('files');
    }
}
