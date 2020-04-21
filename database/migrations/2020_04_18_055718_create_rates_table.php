<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->morphs('rateble');     //creates rateable_id  and  rateable_type
            $table->foreignId('user_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('set null');
            $table->float('star',2, 1);    //star number is from 0 to 5, so I chose tinyInteger
            $table->timestamps();
        });
    }
    // $table->unsignedTinyInteger('star');    //star number is from 0 to 5, so I chose tinyInteger

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rates');
    }
}
