<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->text('code');
            $table->text('name');
            $table->text('lvl1');
            $table->text('lvl2');
            $table->text('lvl3');
            $table->text('price');
            $table->text('price_sp');
            $table->text('total');
            $table->text('field_property');
            $table->text('joint_purchase');
            $table->text('unit');
            $table->text('picture');
            $table->text('main_view')->default(null);
            $table->text('description');
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
        Schema::dropIfExists('transactions');
    }
}
