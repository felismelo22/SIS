<?php defined('BASEPATH') OR exit('No direct script access allowed');
$mod['name'] = $this->router->fetch_class();
$mod['task'] = $this->router->fetch_method();

switch($mod['name'])
{
	case 'user':
		$this->load->view('user/index');
	break;
}