<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\SvcProducts;
class ProductsController extends Controller
{

    private $request;
    private $svcProducts;
    public function __construct(Request $request, SvcProducts $svcProducts)
    {
        $this->request = $request;
        $this->svcProducts = $svcProducts;
    }
    public function create()
    {
        $validator = Validator::make($this->request->all(), [
            "nombre" => "required|unique:productos,nombre",
            "precio" => "required|numeric|gt:0",
            "categoria" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json(["mensaje" => $validator->errors()->all()]);
        } else {
            $dataCreate = [
                "nombre" => $this->request->input("nombre"),
                "precio" => $this->request->input("precio"),
                "categoria_id" => $this->request->input("categoria"),
            ];
            if ($this->svcProducts->createProduct($dataCreate)) {
                return response()->json(["mensaje" => "Producto agregado", "error" => "0"]);
            } else {
                return response()->json(["mensaje" => "Producto no agregado", "error" => "1"]);
            }
        }
    }

    public function updateProduct() {
        $validator = Validator::make($this->request->all(), [
            "nombre" => "required|unique:productos,nombre",
            "precio" => "required|numeric|gt:0",
            "categoria" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json(["mensaje" => $validator->errors()->all()]);
        } else {
            $dataUpdate = [
                "nombre" => $this->request->input("nombre"),
                "precio" => $this->request->input("precio"),
                "categoria_id" => $this->request->input("categoria"),
            ];

            $idProduct = $this->request->input("id");

            if ($this->svcProducts->updateProduct($idProduct, $dataUpdate)) {
                return response()->json(["mensaje" => "Producto modificado", "error" => "0"]);
            } else {
                return response()->json(["mensaje" => "Producto no modificado", "error" => "1"]);
            }
        }
    }
}
