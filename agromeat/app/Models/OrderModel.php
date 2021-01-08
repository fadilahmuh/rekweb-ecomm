<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'order';
    protected $useTimestamps = true;
    protected $allowedFields = ['order_id', 'nama_pemesan', 'no_pemesan', 'email_pemesan', 'alamat_order', 'maps', 'status', 'total', 'bukti_pembayaran', 'note'];

    public function getOrder($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
