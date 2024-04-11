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
        Schema::create('hq_settings', function (Blueprint $table) {
            $table->id()->comment('Rekord azonosító');
            $table->string('key')->default('')->index()->comment('Kulcs');
            $table->string('value')->default('')->comment('Érték');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('h_q_settings');
    }
};
