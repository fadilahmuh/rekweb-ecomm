<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'order';
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'nama_pemesan', 'no_pemesan', 'email_pemesan', 'alamat_order', 'maps', 'status', 'total', 'bukti_pembayaran', 'note'];

    public function getProduct($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
