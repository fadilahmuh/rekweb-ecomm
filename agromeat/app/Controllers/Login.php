<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        $data =
            [
                'title' => 'Admin LOGIN | '
            ];

        return view('pages/login', $data);
    }

    //--------------------------------------------------------------------

}
