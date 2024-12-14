<?php

namespace App\Http\Controllers;

use App\Services\SvcCategories;
use App\Services\SvcProducts;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    private $svcCategories;
    private $svcProducts;
    private $request;

    public function __construct(SvcProducts $svcProducts, Request $request, SvcCategories $svcCategories)
    {
        $this->svcProducts = $svcProducts;
        $this->request = $request;
        $this->svcCategories = $svcCategories;

    }

    public function index()
    {
        $list = $this->svcProducts->getProducts();
        $categories = $this->svcCategories->getCategories();
        $templateView["listCategories"] = $categories;
        $templateView["listProducts"] = $list;
        return view('catalogproducts', $templateView);
    }

    public function getProduct() {
        $idProduct = $this->request->get('idProduct');
        $templateView = [];
        if (!empty($idProduct)) {
            $product = $this->svcProducts->getProductById($idProduct);
            $list = $this->svcProducts->getProducts();
            $categories = $this->svcCategories->getCategories();
            $templateView["listCategories"] = $categories;
            $templateView["listProducts"] = $list;
            $templateView["product"] = $product;
        }

        return view('catalogproducts', $templateView);
    }

    public function deleteProduct() {
        $idProduct = $this->request->get('idProduct');
        $templateView = [];
        if (!empty($idProduct)) {
            $this->svcProducts->deleteProduct($idProduct);
            $list = $this->svcProducts->getProducts();
            $categories = $this->svcCategories->getCategories();
            $templateView["listCategories"] = $categories;
            $templateView["listProducts"] = $list;
        }

        return view('catalogproducts', $templateView);
    }
}
