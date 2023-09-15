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
        Schema::create('subdomains', function (Blueprint $table) {
            $table->id()->comment('Rekord azonosító');
            
            $table->string('subdomain', 255)->comment('A példány subdomain értéke');
            $table->string('url', 255)->comment('A példány url-je');
            $table->string('name', 255)->comment('A példány neve');
            
            $table->string('db_host', 255)->default('localhost')->comment('Adatbázis címe');
            $table->integer('db_port')->default(3306)->comment('Adatbázis port');
            $table->string('db_name', 255)->comment('Adatbázis név');
            $table->string('db_user', 255)->comment('Adatbázis felhasználó');
            $table->string('db_password', 255)->comment('Adatbázis jelszó');
            $table->tinyInteger('notification')->comment('Notification');
            $table->integer('state_id')->comment('State ID');
            $table->tinyInteger('is_mirror')->comment('Is mirror');
            $table->tinyInteger('sso')->comment('SSO');
            $table->integer('access_controll_system')->comment('Access Controll System');
            $table->timestamp('last_export')->nullable()->comment('Last Export');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subdomains');
    }
};
