<!-- Master Controller - Global functions, queries, variables -->

<?php
class MY_Contoller extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
}

class Admin_Controller extends MY_Contoller{
	function __construct(){
		parent::__construct();
		// die('ADMIN'); // prints in sparkup/admin
	}
}

class Public_Controller extends MY_Contoller{
	function __construct(){
		parent::__construct();

		$this->load->library('menu');

		$this->pages = $this->menu->get_pages();

		// Brand logo
		$this->brand = 'My Website';

		// Banner
		$this->banner_heading = 'Welcome To Our Website';
		$this->banner_text = 'This example is a quick exercise to illustrate how the top-aligned navbar works. As you scroll, this navbar remains in its original position and moves with the rest of the page.';
		$this->banner_link = 'pages/show/our-team';
	}
}