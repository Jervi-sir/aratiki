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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('advertiser_id')->constrained();
            $table->foreignId('template_id')->constrained();

            $table->boolean('is_verified')->default(0);
            $table->boolean('is_active')->default(0);

            $table->string('campaign_name');
            $table->date('campaign_starts');
            $table->date('campaign_ends');

            $table->bigInteger('tickets_left');
            $table->string('location');
            $table->string('price');

            $table->bigInteger('nb_visited')->default(0);
            $table->bigInteger('votes')->default(0);

            $table->text('images');
            $table->longText('details');
            $table->timestamps();

            //TODO:add total tickets
            //TODO:add price
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
};
