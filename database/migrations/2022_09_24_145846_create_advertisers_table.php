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
        Schema::create('advertisers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('uuid')->unique();

            $table->string('name');
            $table->boolean('is_verified')->default(0);
            
            $table->string('phone_number');
            $table->string('location')->nullable();
            $table->text('images')->nullable();
            $table->longText('details')->nullable();
            
            $table->mediumText('bank_accounts')->nullable();
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
        Schema::dropIfExists('advertisers');
    }
};
