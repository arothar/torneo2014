<?php
class UsuarioPartido extends CI_Model {
	// table name
	private $tbl_usuarioPartido= 'usuarioPartido';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function count_all(){
		return $this->db->count_all($this->tbl_usuarioPartido);
	}
	function get_paged_list($limit = 500, $offset = 0){
		$this->db->order_by('idPartido','asc');
		return $this->db->get($this->tbl_usuarioPartido, $limit, $offset);
	}
	function get_by_id($id){
		$this->db->where('idPartido', $id);
		return $this->db->get($this->tbl_usuarioPartido);
	}
	function get_by_user($id){
		$this->db->where('idUsuario', $id);
		return $this->db->get($this->tbl_usuarioPartido);
	}
	
	function get_by_user_array($id){
		$partidos = $this->get_by_user($id)->result();
		$arr_partido = array();
		foreach ($partidos as $val)
		{
			$unPartido = array(
					   'idPartido' => $val->idPartido,
					   'golesLocal' => $val->golesLocal,
					   'golesVisitante' => $val->golesVisitante,
					   'idGanador' => $val->idGanador
			);
			$arr_partido[$val->idPartido] = $unPartido;
		}
		//var_dump($arr_adicionales);
		return $arr_partido;
	}
}