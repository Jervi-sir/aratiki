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
        Schema::create('searches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('advertiser_id')->constrained();
            $table->foreignId('offer_id')->constrained();
            $table->string('offer_name');
            $table->longText('offer_details');

            $table->string('advertiser_name');
            $table->longText('advertiser_details');
            $table->mediumText('location')->nullable();
            $table->string('price')->nullable();

            $table->boolean('is_active')->default(0);

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
        Schema::dropIfExists('searches');
    }
};
