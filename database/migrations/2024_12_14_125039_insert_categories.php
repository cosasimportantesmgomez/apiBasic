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
        \DB::unprepared(
            "INSERT INTO `categoria` (`id`, `nombre`) VALUES
            (NULL, 'MODA'), 
            (NULL, 'TECNOLOGIA'), 
            (NULL, 'JUGUETES'), 
            (NULL, 'HOGAR'), 
            (NULL, 'ENTRETENIMIENTO'), 
            (NULL, 'BELLEZA'), 
            (NULL, 'SALUD Y BIENESTAR')"
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
