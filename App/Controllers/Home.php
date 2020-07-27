<?php

use App\Core\BaseController;

class Home extends BaseController
{
  /*
  * chama a view index.php do  /home   ou somente   /
  */
	public function index()
	{
		$this->view('home/index');
	}

}