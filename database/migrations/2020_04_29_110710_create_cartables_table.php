<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('cartable_type');
            $table->bigInteger('cartable_id');
            $table->integer('Qty')->nullable();
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
        Schema::dropIfExists('cartables');
    }
}
