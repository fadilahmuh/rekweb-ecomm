<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Debug\Toolbar\Collectors\Views;
use Wildanfuady\WFcart\WFcart;

class Cart extends BaseController
{
    public function __construct()
    {
        $this->product = new ProductModel();
        $this->cart = new WFcart();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Your Cart | Agro Meat Shop'
        ];
        $data['items'] = $this->cart->totals();
        $data['c_total'] = $this->cart->count_totals();
        $data['total'] = $this->cart->totals();
        return view('shop/cart', $data);
    }

    public function beli($id = null)
    {
        // cari product berdasarkan id
        $product = $this->product->getProduct($id);
        // cek data product
        if ($product != null) { // jika product tidak kosong

            // buat variabel array untuk menampung data product
            $item = [
                // 'id'        => $product['id'],
                'id'        => $product['slug'],
                'name'      => $product['nama_produk'],
                'price'     => $product['harga'],
                'photo'     => $product['gambar'],
                'quantity'  => 1
            ];
            // tambahkan product ke dalam cart
            $this->cart->add_cart($id, $item);
            // tampilkan nama product yang ditambahkan
            $product = $item['name'];
            // success flashdata
            session()->setFlashdata('success', "Berhasil memasukan {$product} ke karanjang belanja");
        } else {
            // error flashdata
            session()->setFlashdata('error', "Tidak dapat menemukan data product");
        }
        return redirect()->to('/product');
    }

    public function update()
    {
        // update cart
        $this->cart->update();
        return redirect()->to('/cart');
    }

    public function remove($slug = null)
    {

        // cari product berdasarkan id
        $product = $this->product->getProduct($slug);
        // cek data product
        if ($product != null) { // jika products tidak kosong
            // hapus keranjang belanja berdasarkan id
            $this->cart->remove($slug);
            // success flashdata
            session()->setFlashdata('success', "Berhasil menghapus product dari keranjang belanja");
        } else { // product tidak ditemukan
            // error flashdata
            session()->setFlashdata('error', "Tidak dapat menemukan data product");
        }
        return redirect()->to('/cart');
    }

    public function clear()
    {
        $this->cart->clear();
        return redirect()->to('/product');
    }

    public function checkout()
    {
        $data['items'] = $this->cart->totals();
        $data['c_total'] = $this->cart->count_totals();
        $data['total'] = $this->cart->totals();
        $text = "Halo kak, saya mau order.%0A%0A";
        $no = 0;
        foreach ($data['items'] as $key => $item) {
            $no++;
            $text = $text . $no . ". " . $item['name'] . "%0A" . "  Qty : " . $item['quantity'] . "%0A" . "  Sub-total : Rp. " . number_format($item['quantity'] * $item['price'], 0, 0, '.') . "%0A%0A";
        }
        $text = $text . "%0A" . "*Total = " . number_format($data['c_total'], 0, 0, '.') . "* %0A%0A" . "----------------------";
        $link = "https://web.whatsapp.com/send?phone=6288229499331&text=" . $text;
        $this->cart->clear();
        return redirect()->to($link);
    }
}
