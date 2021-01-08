<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderdetailModel extends Model
{
    protected $table = 'order_detail';
    protected $useTimestamps = false;
    protected $allowedFields = ['id_order', 'product_id', 'jumlah', 'subtotal'];

    public function getOrderdetail($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
