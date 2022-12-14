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
        Schema::create('gigs', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('company_id');
            $table->string('country');
            $table->string('state');
            $table->string('address')->nullable();
            $table->enum('status', ['pending', 'active', 'completed', 'rejected'])->default('pending');
            $table->unsignedFloat('min_salary', 12)->from(1000);
            $table->unsignedFloat('max_salary', 12)->from(1000);
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
        Schema::dropIfExists('gigs');
    }
};
