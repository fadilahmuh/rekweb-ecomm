<?php

namespace App\Controllers;

use Wildanfuady\WFcart\WFcart;

class Howtobuy extends BaseController
{
    public function index()
    {
        $this->cart = new WFcart();
        $data =
            [
                'title' => 'How To Buy | '
            ];
        $data['total'] = $this->cart->totals();

        return view('pages/htb', $data);
    }

    //--------------------------------------------------------------------

}
