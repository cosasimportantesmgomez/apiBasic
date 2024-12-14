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
            CREATE TABLE `productos` (`id` INT NOT NULL AUTO_INCREMENT , `nombre` VARCHAR(200) NOT NULL , `precio` INT(20) NOT NULL , `categoria_id` INT NOT NULL , PRIMARY KEY (`id`));
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
