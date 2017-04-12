<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('html');
    $this->load->model('user_model');
    // $this->load->model('crud_model');
    $this->load->library('pagination');
  }
	public function index()
	{
		$this->load->view('admin/index');
	}
	public function list($page = 0)
	{
    $total_rows = $this->db->count_all('user');
    // pr($this->db->last_query());die();

    $data['data_user']  = $this->user_model->get_all_user($page);

    $config['base_url']   = base_url('user/list');
    $config['total_rows'] = $total_rows;
    $config['per_page']   = 2;
    $config['full_tag_open'] = '<ul class="pagination" style="margin-top: 0;margin-bottom: 0;">';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['full_tag_close'] = '</ul>';
    $this->pagination->initialize($config);


    $data['pagination'] = $this->pagination->create_links();

		$this->load->view('admin/index',$data);
	}
	public function list_edit($id = 0)
	{
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() === FALSE)
    {
      $data['msg'] = '';
      $data['alert'] = '';
      if($username != NULL)
      {
        $data['data_user']  = $this->user_model->get_user($username);
      }
      if($id != 0)
      {
        $data['data_user']  = $this->user_model->get_user($id);
      }
      $this->load->view('admin/index', $data);
    }else{
      $username = $this->input->post('username');
      $user = $this->user_model->get_user($username);
      $data['msg'] = 'Success Saving Data';
      $data['alert'] = 'success';
      if($user['username'] == $username)
      {
        $data['msg'] = 'Failed Saving Data, username exist';
        $data['alert'] = 'danger';
      }
      $this->user_model->set_user();
			$this->load->view('admin/index', $data);
    }

	}

}