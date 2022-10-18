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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();

            $table->foreignId('user_id')->constrained();
            $table->foreignId('offer_id')->constrained();

            $table->string('ticket_type');
            $table->string('ticket_price');
            $table->longText('qrcode')->unique();
            $table->longText('details')->nullable();

            $table->string('event_type')->nullable();
            $table->string('place')->nullable();
            
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
        Schema::dropIfExists('tickets');
    }
};
