<?php

class Merenja_model extends MY_Model {

    protected $table_name = 'merenja';

    public function graph_kilogrami_vreme($where = array()) {
        $this->db->select('datum, tezina, voda, masti, kosti');
        $this->db->where($where);
        $this->db->order_by('datum', 'asc');
        $query = $this->db->get($this->table_name);
        return $query;
    }

}

?>