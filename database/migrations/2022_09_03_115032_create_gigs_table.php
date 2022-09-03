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
            $table->string('address');
            $table->enum('status', ['pending', 'active', 'completed', 'rejected']);
            $table->float('min_salary')->from(1000);
            $table->float('max_salary')->from(1000);
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
