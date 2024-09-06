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
        Schema::create('iPatente', function (Blueprint $table) {
            $table->id();
            $table->string('gruppo');
            $table->string('nome');
            $table->string('iPatente_code')->unique();
            $table->string('anwip_sh');
            $table->string('ahb_sh');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iPatente');
    }
};
