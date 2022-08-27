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
            /*--[ necessary data ]--*/
            $table->foreignId('advertiser_id')->constrained();
            $table->foreignId('template_id')->constrained();

            $table->string('campaign_name');
            $table->date('campaign_starts');
            $table->date('campaign_ends');

            $table->bigInteger('tickets_left');
            $table->string('location');
            $table->string('price');

            $table->text('images');
            $table->string('phone_number');
            $table->longText('details');

            /*--[ state data ]--*/
            $table->boolean('is_verified')->default(0);
            $table->boolean('is_active')->default(0);
            $table->bigInteger('nb_visited')->default(0);
            $table->bigInteger('votes')->default(0);

            /*--[ advertiser data ]--*/
            $table->string('company_name');
            $table->longText('advertiser_details')->nullable();

            /*--[ of search data ]--*/
            $table->longText('for_search');

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
