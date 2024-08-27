<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
	private $_table = "tb_user";

	public function insert($data)
	{
		$this->db->insert($this->_table, $data);
	}

	public function get($where = null)
	{
		if ($where != null) {
			return $this->db->get_where($this->_table, $where);
		}
		return $this->db->get($this->_table);
	}
}


/* End of file Register_model.php and path \application\models\Register_model.php */
