<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tiket_model extends CI_Model
{
	private $_table = "tb_tiket";

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

	public function update($data, $id_tiket)
	{
		$this->db->update($this->_table, $data, ['id_tiket' => $id_tiket]);
	}

	public function delete($id_tiket)
	{
		$this->db->delete($this->_table, ['id_tiket' => $id_tiket]);
	}
}


/* End of file Register_model.php and path \application\models\Register_model.php */
