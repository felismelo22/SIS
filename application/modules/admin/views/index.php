<?php defined('BASEPATH') OR exit('No direct script access allowed');

$mod['name'] = $this->router->fetch_class();
$mod['task'] = $this->router->fetch_method();

$content = ($mod['name'] == 'admin') ? 'admin/content' : $mod['name'].'/'.$mod['task'];
$data['content'] = $content;

$this->load->view('admin/home',$data);