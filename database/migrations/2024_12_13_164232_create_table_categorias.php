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
        \DB::unprepared("
            CREATE TABLE `categoria` (`id` INT NOT NULL AUTO_INCREMENT , `nombre` VARCHAR(100) NOT NULL , PRIMARY KEY (`id`));
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categoria');
    }
};
