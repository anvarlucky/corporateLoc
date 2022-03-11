<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfolioesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolioes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('text');
            $table->string('customers');
            $table->string('alias');
            $table->string('img');
            $table->string('filter_alias');
            $table->foreign('filter_alias')->references('alias')->on('filters');
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
        Schema::dropIfExists('portfolioes');
    }
}
