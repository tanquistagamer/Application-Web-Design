<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id(); // IdCustomer
            $table->string('numOrder', 50);
            $table->string('name', 100);
            $table->string('email', 100);
            $table->string('phone', 100);
            $table->foreignId('address_id')->constrained('addresses'); // Relación con addresses
            $table->timestamps(); // created_at y updated_at
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
