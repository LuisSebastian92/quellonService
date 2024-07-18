<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->date('date')->default(now());
            $table->boolean('preventive')->default(false);
            $table->boolean('corrective')->default(false);
            $table->boolean('maritime')->default(false);
            $table->boolean('clean')->default(false);
            $table->boolean('desinfection')->default(false);
            $table->time('entrytime')->default(now());
            $table->time('finishtime')->nullable();
            $table->string('observations')->nullable();
            $table->bigInteger('Cnumber')->default(0);
            $table->string('origen')->default(now());
            $table->string('destiny')->default(now());
            $table->string('status')->default('pendiente');
            $table->string('pay')->default('Elige');
            $table->string('motive')->nullable();
            $table->foreignID('client_id')->nullable()->constrained('clients');
            $table->foreignID('productdesinfection_id')->nullable()->constrained('productdesinfections');
            $table->foreignID('productclean_id')->nullable()->constrained('productcleans');
            $table->foreignID('place_id')->nullable()->constrained('places');
            $table->foreignID('boat_id')->nullable()->constrained('boats');
            $table->foreignID('user_id')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
