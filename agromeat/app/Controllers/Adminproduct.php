<?php

namespace App\Controllers;

use App\Models\AdminproductModel;

class Adminproduct extends BaseController
{
    protected $adminproductModel;
    public function __construct()
    {
        $this->adminproductModel = new AdminproductModel();
    }
    public function index()
    {

        $data = [
            'title' => 'Product Center | Agro Meat Shop',
            'adminproduct' => $this->adminproductModel->getAdminproduct()
        ];

        return view('admin/adminproduct', $data);
    }
    public function admindetail($Slug)
    {
        $data = [
            'title' => "Spesifikasi Produk",
            'adminproduct' => $this->adminproductModel->getAdminproduct($Slug)
        ];
        if (empty($data['adminproduct'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produk tak ditemukan.');
        }

        return view('admin/admindetail', $data);
    }
    public function tambah()
    {
        session();
        $data = [
            'title' => "Tambah Data",
            'validation' =>  \Config\Services::validation()
        ];
        return view('admin/tambahproduct', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'nama_produk' => 'required|is_unique[produk.nama_produk]',
            'gambar' => [
                'rules' => 'max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png,image/bmp]'
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/adminproduct/tambah')->withInput()->with('validation', $validation);
            return redirect()->to('/adminproduct/tambah')->withInput();
        }
        $fileGambar = $this->request->getFile('gambar');
        if ($fileGambar->getError() == 4) {
            $namaGambar = 'default.jpg';
        } else {
            $fileGambar->move('img/product');
            $namaGambar = $fileGambar->getName();
        }
        $slug = url_title($this->request->getVar('nama_produk'), '-', true);
        $this->adminproductModel->save([
            'nama_produk' => $this->request->getVar('nama_produk'),
            'slug' => $slug,
            'Department' => $this->request->getVar('department'),
            'Stok' => $this->request->getVar('stok'),
            'harga' => $this->request->getVar('harga'),
            'gambar' => $namaGambar,
            'desc' => $this->request->getVar('desc'),
            'fungsi' => $this->request->getVar('fungsi'),
            'Lainnya' => $this->request->getVar('lainnya')
        ]);
        session()->setFlashdata('notif', 'Produk telah ditambahkan');
        return redirect()->to('/adminproduct');
    }
    public function delete($Id)
    {
        $this->adminproductModel->delete($Id);
        session()->setFlashdata('notif', 'Produk telah dihapus');
        return redirect()->to('/adminproduct');
    }
    public function edit($slug)
    {
        $data = [
            'title' => "Edit Data",
            'adminproduct' => $this->adminproductModel->getAdminproduct($slug),
            'validation' =>  \Config\Services::validation()
        ];
        return view('admin/editproduct', $data);
    }
    public function update($Id)
    {
        $oldproduct = $this->adminproductModel->getAdminproduct($this->request->getVar('slug'));
        if ($oldproduct['nama_produk'] == $this->request->getVar('nama_produk')) {
            $rule_produk = 'required';
        } else {
            $rule_produk = 'required|is_unique[produk.nama_produk]';
        }
        if (!$this->validate([
            'nama_produk' => $rule_produk,
            'gambar' => [
                'rules' => 'max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png,image/bmp]'
            ]
        ])) {
            return redirect()->to('/adminproduct/edit/' . $this->request->getVar('slug'))->withInput();
        }
        $fileGambar = $this->request->getFile('gambar');
        if ($fileGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarLama');
        } else {
            $fileGambar->move('img/product');
            $namaGambar = $fileGambar->getName();
        }

        $slug = url_title($this->request->getVar('nama_produk'), '-', true);
        $this->adminproductModel->save([
            'Id' => $Id,
            'nama_produk' => $this->request->getVar('nama_produk'),
            'slug' => $slug,
            'Department' => $this->request->getVar('department'),
            'Stok' => $this->request->getVar('stok'),
            'harga' => $this->request->getVar('harga'),
            'gambar' => $namaGambar,
            'desc' => $this->request->getVar('desc'),
            'fungsi' => $this->request->getVar('fungsi'),
            'Lainnya' => $this->request->getVar('lainnya')
        ]);
        session()->setFlashdata('notif', 'Produk telah diubah');
        return redirect()->to('/adminproduct');
    }
    //--------------------------------------------------------------------

}
