<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = "categoria";

    protected $primaryKey = "id";

    const CREATED_AT = null;
    const UPDATED_AT = null;
    protected $fillable = [
        "id",
        "nombre"
    ];
}
