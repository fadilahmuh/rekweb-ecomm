<?php

namespace App\Controllers;

use App\Models\ProductModel;
use Wildanfuady\WFcart\WFcart;

class Product extends BaseController
{
    protected $productModel;
    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->cart = new WFcart();
    }
    public function index()
    {
        // $product = $this->productModel->findAll();
        $data = [
            'title' => 'Product | ',
            'product' => $this->productModel->getProduct(),
        ];
        $data['total'] = $this->cart->totals();

        return view('shop/product', $data);
    }
    public function detail($Slug)
    {
        $data = [
            'title' => "Spesifikasi Produk",
            'product' => $this->productModel->getProduct($Slug)
        ];
        $data['total'] = $this->cart->totals();

        if (empty($data['product'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produk tak ditemukan.');
        }

        return view('shop/detail', $data);
    }

    //--------------------------------------------------------------------

}
