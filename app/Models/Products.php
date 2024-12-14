<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = "productos";

    protected $primaryKey = "id";


    const CREATED_AT = null;
    const UPDATED_AT = null;
    protected $fillable = [
        "id",
        "nombre",
        "precio",
        "categoria_id",
    ];
}
