<?php

namespace App\Services;

use App\Models\Categorie;

class SvcCategories 
{
    function getCategories() {
        try {
            return Categorie::all();
        } catch (\Exception $e) {
            return [];
        }
    }
}

?>