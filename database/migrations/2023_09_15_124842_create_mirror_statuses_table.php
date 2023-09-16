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
        Schema::create('mirror_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('mirror_subdomain_id')->index('mirror_subdomain');
            $table->unsignedInteger('mirrored_subdomain_id')->nullable()->index('mirrored_subdomain');
            $table->dateTime('created_at')->nullable()->default('1000-01-01 00:00:00');
            $table->dateTime('updated_at')->nullable()->default('1000-01-01 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mirror_statuses');
    }
};
