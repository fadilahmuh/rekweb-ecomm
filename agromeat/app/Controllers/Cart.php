<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Debug\Toolbar\Collectors\Views;
use Wildanfuady\WFcart\WFcart;
use App\Models\OrderModel;

class Cart extends BaseController
{
    protected $orderModel;
    public function __construct()
    {
        $this->product = new ProductModel();
        $this->orderModel = new OrderModel();
        $this->cart = new WFcart();
        helper('form');
    }

    public function index()
    {
        session();
        $data = [
            'title' => 'Your Cart | Agro Meat Shop',
            'validation' =>  \Config\Services::validation()
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
        date_default_timezone_set("Asia/Jakarta");
        $uniqcode = date("Ymd") . date("his") . substr($this->request->getVar('telephone'), -2);
        $data['items'] = $this->cart->totals();
        $data['c_total'] = $this->cart->count_totals();
        $data['total'] = $this->cart->totals();
        $maps = 'https://maps.google.com/?q=' . $this->request->getVar('lat') . ',' . $this->request->getVar('lng');

        // echo $data['c_total'];
        $this->orderModel->save([
            'id' => $uniqcode,
            'nama_pemesan' => $this->request->getVar('name'),
            'no_pemesan' =>  $this->request->getVar('telephone'),
            'email_pemesan' => $this->request->getVar('email'),
            'alamat_order' => $this->request->getVar('alamat'),
            'maps' =>  $maps,
            'status' => 'Unchecked',
            'total' => $data['c_total'],
            'note' => $this->request->getVar('note')
            // 'bukti_pembayaran' => 'Unchecked'
        ]);
        $this->cart->clear();
        session()->setFlashdata('notif', 'Terima Kasih Telah Order Di AgroMeat Shop');
        return redirect()->to('/');
    }
}
