<?php
class Grupo extends CI_Model {
	// table name
	private $tbl_grupo= 'grupo';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function count_all(){
		return $this->db->count_all($this->tbl_grupo);
	}
	function get_paged_list($limit = 10, $offset = 0){
		$this->db->order_by('idGrupo','asc');
		return $this->db->get($this->tbl_grupo, $limit, $offset);
	}
	function get_by_id($id){
		$this->db->where('idGrupo', $id);
		return $this->db->get($this->tbl_grupo);
	}


}