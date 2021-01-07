<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminproductModel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'Id';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_produk', 'slug', 'Department', 'Stok', 'harga', 'gambar', 'desc', 'fungsi', 'Lainnya'];

    public function getAdminproduct($Slug = false)
    {
        if ($Slug == false) {
            return $this->findAll();
        }
        return $this->where(['Slug' => $Slug])->first();
    }
}
