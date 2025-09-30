<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dispatch_agreements', function (Blueprint $table) {
            $table->id();
            $table->date('effective_date');
            $table->decimal('dispatch_fee', 5, 2); // e.g., 8.50
            $table->string('carrier_name');
            $table->string('carrier_rep');
            $table->string('mc_number');
            $table->string('dot_number');
            $table->string('carrier_email');
            $table->string('carrier_phone');
            $table->text('notes')->nullable();
            $table->enum('poa', ['Yes', 'No'])->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dispatch_agreements');
    }
};
