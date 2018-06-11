<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {
	var $ci;

	function __construct() {
		$this->ci =& get_instance();
	}

	/*
	 * Description: determines where to load public or admin
	 * @name:			load
	 * @desc:			loads the template and view specified
	 * @param:loc:		location (admin or public)
	 * @param:tpl_name 	name of the template
	 * @param:view:		namwe of the view to load
	 * @param:data:		optional data array
	 */

	function load($loc, $tpl_name, $view, $data = null) {
		if ($loc == 'admin' && $tpl_name == 'default') {
			$tpl_name = 'admin';
		}

		if ($loc == 'public' && $tpl_name == 'default') {
			$tpl_name = 'public';
		}	

		$data['main'] = $loc.'/'.$view;
		$this->ci->load->view('/templates/'.$tpl_name, $data);
	}
}

