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
            $table->string('uuid')->unique();
            $table->string('uuid_for_images')->unique();

            /*--[ foreign keys ]--*/
            $table->foreignId('user_id')->constrained();
            $table->foreignId('advertiser_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('payment_id')->constrained();


            /*--[ specific details ]--*/
            $table->string('event_name');
            $table->string('location'); 
            $table->text('map_location')->nullable(); 
            $table->longText('description'); 
            $table->longText('images'); 

            /*--[ dateTime ]--*/
            $table->dateTime ('event_starts'); 
            $table->dateTime ('event_ends'); 
            $table->string('duration'); 

            /*--[ tickets ]--*/
            $table->boolean('hasVip')->default(0);
            $table->string('price_vip')->nullable(); 
            $table->bigInteger('total_tickets_vip')->nullable(); 
            $table->bigInteger('tickets_left_vip')->nullable(); 
            $table->string('price_economy'); 
            $table->bigInteger('total_tickets_economy'); 
            $table->bigInteger('tickets_left_economy'); 
            $table->string('payment_type_name'); 
            
            /*--[ advertiser data ]--*/
            $table->string('advertiser_name'); 
            $table->longText('advertiser_details')->nullable(); 
            $table->string('phone_number'); 

            /*--[ of search data ]--*/
            $table->longText('for_search');

            /*--[ state event ]--*/
            $table->boolean('is_verified')->default(0);
            $table->boolean('is_active')->default(0);
            $table->bigInteger('nb_visited')->default(0);
            $table->bigInteger('votes')->default(0);

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
        Schema::dropIfExists('offers');
    }
};
