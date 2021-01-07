<?php

namespace App\Controllers;

use Wildanfuady\WFcart\WFcart;


class About extends BaseController
{
    public function index()
    {
        $this->cart = new WFcart();
        $data =
            [
                'title' => 'About | '
            ];
        $data['total'] = $this->cart->totals();

        return view('pages/about', $data);
    }

    //--------------------------------------------------------------------

}
