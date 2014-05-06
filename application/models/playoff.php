<?php
class PlayOff extends CI_Model {
	// table name
	private $tbl_playoffs= 'playoffs';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function count_all(){
		return $this->db->count_all($this->tbl_playoffs);
	}
	function get_paged_list($limit = 500, $offset = 0){
		$this->db->order_by('idTipoFinal','asc');
		return $this->db->get($this->tbl_playoffs, $limit, $offset);
	}
	function get_by_id($id){
		$this->db->where('idTipoFinal', $id);
		return $this->db->get($this->tbl_playoffs);
	}
	
	function get_estructura_octavos()
	{
		$this->db->select('pe.idGrupo,pe.posicion posicion1,g.nombre nombre1,pv.posicion posicion2,gv.nombre nombre2');
		$this->db->from($this->tbl_playoffs);
		$this->db->join('playoffestructura as pe', $this->tbl_playoffs.'.idPlayoffs = pe.idPlayoff AND pe.posicion=1', 'left');
		$this->db->join('playoffestructura as pv', $this->tbl_playoffs.'.idPlayoffs = pv.idPlayoff AND pv.posicion=2', 'left');
		$this->db->join('grupo as g', 'pe.idGrupo = g.idGrupo');
		$this->db->join('grupo as gv', 'pv.idGrupo = gv.idGrupo');
		$this->db->order_by('pe.idplayoffestructura','asc');
		return $this->db->get();
		
	}
	
}