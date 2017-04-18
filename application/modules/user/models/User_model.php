<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_user($id = 0)
	{
		// if ($username === FALSE || $id ===0)
		// {
		// 	$query = $this->db->get('user');
		// 	// $query = $this->db->get_where('user', '1',2,5);
		// 	return $query->result_array();
		// }

		$query = $this->db->get_where('user', array('id' => $id));

		return $query->row_array();
	}

	public function get_all_user($page = 0)
	{
		$limit = 3;
		$this->db->limit($limit,$page);
		$query = $this->db->get('user');

		return $query->result_array();

		/*untuk menampilkan query terakhir
		pr($this->db->last_query());die();
		*/
	}

	public function set_user($id = 0)
	{
		$this->load->helper('url');

		$data = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))
		);
		if($id > 0)
		{
			return $this->db->update('user', $data, 'id = '.$id);
		}else{
			return $this->db->insert('user', $data);
		}
	}

	public function login($username = NULL, $password = NULL)
	{
		$query = $this->db->get_where('user', array('username' => $username, 'password'=>md5($password)));
		return $query->row_array();
	}
	public function is_exist($username = NULL, $id = 0)
	{
		if($id == NULL)
		{
			$query = $this->db->get_where('user', array('username' => $username));
		}else{
			$query = $this->db->get_where('user', array('username' => $username, 'id'=>$id));
		}
		return $query->row_array();
	}
}