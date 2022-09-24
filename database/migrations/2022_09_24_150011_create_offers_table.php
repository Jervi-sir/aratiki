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
    /*[x]*/  $table->id();
    /*[]*/  $table->string('uuid')->unique();
    /*[]*/  $table->string('uuid_for_images')->unique();

            /*--[ foreign keys ]--*/
    /*[]*/  $table->foreignId('user_id')->constrained();
    /*[]*/  $table->foreignId('advertiser_id')->constrained();
    /*[x]*/  $table->foreignId('category_id')->constrained();
    /*[]*/  $table->foreignId('payment_id')->constrained();


            /*--[ specific details ]--*/
    /*[x]*/  $table->string('event_name');
    /*[x]*/  $table->string('location'); 
    /*[x]*/  $table->text('map_location')->nullable(); 
    /*[x]*/  $table->longText('description'); 
    /*[x]*/  $table->longText('images'); 

            /*--[ dateTime ]--*/
    /*[x]*/  $table->dateTime ('event_starts'); 
    /*[x]*/  $table->dateTime ('event_ends'); 
    /*[x]*/  $table->string('duration'); 

            /*--[ tickets ]--*/
    /*[x]*/  $table->boolean('hasVip')->default(0);
    /*[x]*/  $table->string('price_vip')->nullable(); 
    /*[x]*/  $table->bigInteger('total_tickets_vip')->nullable(); 
    /*[x]*/  $table->bigInteger('tickets_left_vip')->nullable(); 
    /*[x]*/  $table->string('price_economy'); 
    /*[x]*/  $table->bigInteger('total_tickets_economy'); 
    /*[x]*/  $table->bigInteger('tickets_left_economy'); 
    /*[]*/  $table->string('payment_type_name'); 
    /*[]*/  
            /*--[ advertiser data ]--*/
    /*[x]*/  $table->string('advertiser_name'); 
    /*[x]*/  $table->longText('advertiser_details')->nullable(); 
    /*[x]*/  $table->string('phone_number'); 

            /*--[ of search data ]--*/
    /*[]*/  $table->longText('for_search');

            /*--[ state event ]--*/
    /*[]*/  $table->boolean('is_verified')->default(0);
    /*[]*/  $table->boolean('is_active')->default(0);
    /*[]*/  $table->bigInteger('nb_visited')->default(0);
    /*[]*/  $table->bigInteger('votes')->default(0);

    /*[]*/  $table->timestamps();
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
