<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;

    public function getProduct($Slug = false)
    {
        if ($Slug == false) {
            return $this->findAll();
        }
        return $this->where(['Slug' => $Slug])->first();
    }
}
