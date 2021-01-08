<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\OrderdetailModel;


class Adminorder extends BaseController
{
    protected $orderModel;
    protected $orderdetailModel;
    public function __construct()
    {
        $this->orderModel = new OrderModel();
        $this->orderdetailModel = new OrderdetailModel();
    }
    public function index()
    {

        $data = [
            'title' => 'Order Center | Agro Meat Shop',
            'adminorder' => $this->orderModel->getOrder(),
            'orderdetail' => $this->orderdetailModel->getOrderdetail()
        ];

        return view('admin/adminorder', $data);
    }
}
