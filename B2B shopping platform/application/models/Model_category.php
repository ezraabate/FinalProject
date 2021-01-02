<?php 

class Model_category extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* get active brand infromation */
	public function getActiveCategroy()
	{
		$sql = "SELECT * FROM categories WHERE active = ?";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	/* get the brand data */
	public function getCategoryData($categ_id = null)
	{
		if($categ_id) {
			$sql = "SELECT * FROM itemcategory WHERE categ_id = ?";
			$query = $this->db->query($sql, array($categ_id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM itemcategory";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function create($data)
	{
		if($data) {
			$insert = $this->db->insert('itemcategory', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update($data, $categ_id)
	{
		if($data && $categ_id) {
			$this->db->where('categ_id', $categ_id);
			$update = $this->db->update('itemcategory', $data);
			return ($update == true) ? true : false;
		}
	}

	public function remove($categ_id)
	{
		if($categ_id) {
			$this->db->where('categ_id', $categ_id);
			$delete = $this->db->delete('itemcategory');
			return ($delete == true) ? true : false;
		}
	}

}