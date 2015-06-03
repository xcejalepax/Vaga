<?php

class MY_Model extends CI_Model {

    protected $table_name = null;

    public function add_row($row = null) {
        if (is_null($row)) {
            return false;
        }
        return $this->db->insert($this->table_name, $row);
    }

    public function find_row($where = array()) {
        $this->db->select('*');
        $this->db->where($where);
        $query = $this->db->get($this->table_name);
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return null;
    }

    public function find_rows($where = array(), $limit = 0, $start = 0) {
        $this->db->select('*');
        $this->db->where($where);
	$this->db->limit($limit, $start);
        $query = $this->db->get($this->table_name);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return null;
    }
	
    public function count_rows($where = array()){
	$this->db->where($where);
	return $this->db->count_all_results($this->table_name);
    }

    public function delete_row($where = array()) {
        $this->db->where($where);
        return $this->db->delete($this->table_name);
    }

    public function update_row($where = array(), $row = null) {
        if (is_null($row)) {
            return false;
        }
        $this->db->where($where);
        return $this->db->update($this->table_name, $row);
    }

}

?>