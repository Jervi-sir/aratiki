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
            /*--[ foreign keys ]--*/
            $table->foreignId('advertiser_id')->constrained();
            $table->foreignId('template_id')->constrained();

            /*--[ specific details ]--*/
            $table->string('event_name'); //[x]
            $table->string('location'); //[x] 
            $table->text('map_location')->nullable(); //[x] 
            $table->longText('description'); //[x] 
            $table->longText('images'); //[x] 

            /*--[ date ]--*/
            $table->date('event_starts'); //[x] 
            $table->date('event_ends'); //[x] 
            $table->string('duration'); //[x] 

            /*--[ tickets ]--*/
            $table->string('price_vip')->nullable(); //[x] 
            $table->bigInteger('total_tickets_vip')->nullable(); //[x] 
            $table->bigInteger('tickets_left_vip')->nullable(); //[x] 
            $table->string('price_economy'); //[x] 
            $table->bigInteger('total_tickets_economy'); //[x] 
            $table->bigInteger('tickets_left_economy'); //[x] 
            $table->string('payment_type_id'); //[x] 
            $table->string('payment_type_name'); //[x] 
            
            /*--[ advertiser data ]--*/
            $table->string('promoter_name'); //[x] 
            $table->longText('promoter_details')->nullable(); //[x] 
            $table->string('phone_number'); //[x] 

            /*--[ of search data ]--*/
            $table->longText('for_search'); //[] 

            /*--[ state event ]--*/
            $table->boolean('is_verified')->default(0); //[] 
            $table->boolean('is_active')->default(0); //[] 
            $table->bigInteger('nb_visited')->default(0); //[] 
            $table->bigInteger('votes')->default(0); //[] 

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
