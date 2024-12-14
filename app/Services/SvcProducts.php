<?php

namespace App\Services;

use App\Models\Products;
class SvcProducts
{
    public function createProduct($product)
    {
        try {
            Products::create($product);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function getProducts() {
        try {
            $listProducts = Products::select(
                "p.id",
                "p.nombre",
                "p.precio",
                "c.nombre as categoria",
            )
                ->from("productos as p")
                ->join("categoria as c", "p.categoria_id", "=", "c.id");

            return $listProducts->get()?->toArray() ?? [];
        } catch (\Throwable $th) {
            return [];
        }
    }

    public function getProductById($id) {
        try {
            $product = Products::select(
                "p.id",
                "p.nombre",
                "p.precio",
                "c.nombre as categoria",
            )
                ->from("productos as p")
                ->join("categoria as c", "p.categoria_id", "=", "c.id")
                ->where("p.id", $id);
            return $product->get()?->first()?->toArray() ?? [];
        } catch (\Throwable $th) {
            return [];
        }
    }

    public function updateProduct($idProduct, $product) {
        try {
            Products::where("id", $idProduct)->update($product);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function deleteProduct($id) {
        try {
            Products::where("id", $id)->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
