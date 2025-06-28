<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.  >> php artisan migrate
     * Run the migrations of specific file again >> php artisan migrate --path=database/migrations/2025_06_28_044809_create_visitors_table.php
     */
    public function up(): void
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->timestamps(); // created & updated at
            $table->string("record_status");
            $table->string("name");
            $table->string("email");
            $table->string("phone");
            $table->text("desc");
            $table->string("app_date");
            $table->string("app_timeFrom");
            $table->string("app_timeTo");
        });
    }

    /**
     * Reverse the migrations. >> php artisan migrate:rollback 
     * Reverse the migrations to specific file  >> php artisan migrate:rollback --path=database/migrations/0001_01_01_000002_create_jobs_table.php
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }



    ///refresh -- start over the whole files in migration >> php artisan migrate:refresh 
};