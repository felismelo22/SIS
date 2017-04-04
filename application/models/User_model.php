<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_user($username = FALSE)
	{
		if ($username === FALSE)
		{
			$query = $this->db->get('user');
			return $query->result_array();
		}

		$query = $this->db->get_where('user', array('username' => $username));
		return $query->row_array();
	}

	public function set_user()
	{
		$this->load->helper('url');

		// $slug = url_title($this->input->post('title'), 'dash', TRUE);
		$data = array(
			'username' => $this->input->post('username'),
			'password' => 'md5('.$this->input->post('password').')'
		);

		return $this->db->insert('user', $data);
	}
}