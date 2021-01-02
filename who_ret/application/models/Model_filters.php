<?php 

class Model_filters extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/*get the active brands information*/
	public function getColorFilters()
	{
		$sql = "SELECT * FROM itemfilter WHERE Filter_type = 'color' ";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function getUnitFilters()
	{
		$sql = "SELECT * FROM itemfilter WHERE Filter_type = 'unit' ";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function getSizeFilters()
	{
		$sql = "SELECT * FROM itemfilter WHERE Filter_type = 'size' ";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	/* get the brand data */
	public function getFilterData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM itemfilter WHERE Filter_id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
	}

		$sql = "SELECT * FROM itemfilter";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function create($data)
	{
		if($data) {
			$insert = $this->db->insert('itemfilter', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update($data, $id)
	{
		if($data && $id) {
			$this->db->where('Filter_id', $id);
			$update = $this->db->update('itemfilter', $data);
			return ($update == true) ? true : false;
		}
	}

	

}