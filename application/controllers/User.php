<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('html');
    $this->load->model('user_model');
  }
	public function index()
	{
		$this->load->view('admin/index');
	}
	public function list()
	{
		$this->load->view('admin/index');
	}
	public function list_edit()
	{
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() === FALSE)
    {
      $this->load->view('admin/index');
    }else{
      $username = $this->input->post('username');
      $data = $this->user_model->get_user($username);
      if($data['username'] == $username)
      {

      }
      // $this->user_model->set_user();
			$this->load->view('admin/index');
    }

	}

}