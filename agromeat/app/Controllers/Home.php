<?php

namespace App\Controllers;

use Wildanfuady\WFcart\WFcart;

class Home extends BaseController
{
	public function index()
	{
		$this->cart = new WFcart();
		$data =
			[
				'title' => 'Home | '
			];
		$data['total'] = $this->cart->totals();


		return view('pages/home', $data);
	}

	//--------------------------------------------------------------------

}
