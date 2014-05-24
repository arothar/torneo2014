<?php
class PartidoMundial extends CI_Model {
	// table name
	private $tbl_partidoMundial= 'partidomundial';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function count_all(){
		return $this->db->count_all($this->tbl_partidoMundial);
	}
	function get_paged_list($limit = 500, $offset = 0){
		$this->db->order_by('idGrupo','asc');
		$this->db->order_by('idEquipo','asc');
		return $this->db->get($this->tbl_partidoMundial, $limit, $offset);
	}
	function get_by_id($id){
		$this->db->where('idGrupo', $id);
		return $this->db->get($this->tbl_partidoMundial);
	}
	function get_partidos_eliminatorias()
	{
		$this->db->select($this->tbl_partidoMundial.'.*,equipoLocal.nombre equipoLocal, 
														equipoLocal.archivoBandera banderaLocal,
														equipoVisitante.nombre equipoVisitante,
														equipoVisitante.archivoBandera banderaVisitante,
														partidomundial.idGrupo idGrupo');
		$this->db->from($this->tbl_partidoMundial);
		$this->db->join('equipo as equipoLocal', 'equipoLocal.idEquipo = ' . $this->tbl_partidoMundial.' . idEquipoLocal');
		$this->db->join('equipo as equipoVisitante', 'equipoVisitante.idEquipo = ' . $this->tbl_partidoMundial.' . idEquipoVisitante');
		$this->db->where('idPlayoffEstructura', null);
		$this->db->order_by('partidomundial.idGrupo','asc');
		$this->db->order_by('fechaPartido','asc');
		return $this->db->get(); 
		
		//return $this->db->get($this->tbl_propiedadServicio); 	
	}
	
	function get_partidos_playoffs($idTipoFinal)
	{
		$this->db->select($this->tbl_partidoMundial.'.*,equipoLocal.nombre equipoLocal, 
														equipoLocal.archivoBandera banderaLocal,
														equipoVisitante.nombre equipoVisitante,
														equipoVisitante.archivoBandera banderaVisitante,
														partidomundial.idGrupo idGrupo,
														pe.idPlayoff');
		$this->db->from($this->tbl_partidoMundial);

		$this->db->join('equipo as equipoLocal', 'equipoLocal.idEquipo = ' . $this->tbl_partidoMundial.' . idEquipoLocal');
		$this->db->join('equipo as equipoVisitante', 'equipoVisitante.idEquipo = ' . $this->tbl_partidoMundial.' . idEquipoVisitante');
		$this->db->join('playoffestructura as pe', 'pe.idPlayoffEstructura = ' . $this->tbl_partidoMundial.'.idPlayoffEstructura');
		$this->db->join('playoffs as p', 'pe.idPlayoff = p.idPlayoffs');

		$this->db->where('pe.idPlayoffEstructura IS NOT NULL', null);
		$this->db->where('idTipoFinal', $idTipoFinal);

		$this->db->order_by('pe.idPlayoff','asc');
		$this->db->order_by('fechaPartido','asc');
		
		/*
		$this->db->get(); 
		echo $this->db->last_query();
		die();
		*/
		return $this->db->get(); 
		
		//return $this->db->get($this->tbl_propiedadServicio); 	
	}
	
	function get_partidosplayoffs_array($idTipoFinal)
	{
		$i = 0;
		$arr_partido = array();
		$partidos  = $this->get_partidos_playoffs($idTipoFinal)->result();
		foreach ($partidos as $val)
		{
			$idPlayoff = $val->idPlayoff;
		
			$unPartido = array(
					   'idPartido' => $val->idPartidoMundial,
					   'idequipolocal' => $val->idEquipoLocal,
					   'equipolocal' => $val->equipoLocal,
					   'banderaLocal' => $val->banderaLocal,
					   'idequipovisitante' => $val->idEquipoVisitante,
					   'equipovisitante' => $val->equipoVisitante,
					   'banderaVisitante' => $val->banderaVisitante,
					   'fechaPartido' => $val->fechaPartido,
					   'golesLocal' => $val->golesLocal,
					   'golesVisitante' => $val->golesVisitante,
					   'idResultadoMundial' => $val->idResultadoMundial,
					   'idPlayoff' => $idPlayoff
			);
			$arr_partido[$idPlayoff] = $unPartido;
			$i+=1;
		}
		return $arr_partido;
	}
	
	function crearPartido($idEquipoLocal, $idEquipoVisitante, $fechaPartido, $idPlayoffEstructura, $idplayoff, $idTorneo)
	{
		$this->db->insert("partidomundial", 
					array('idEquipoLocal'=>$idEquipoLocal, 
							'idEquipoVisitante'=>$idEquipoVisitante, 
							'fechaPartido'=>$fechaPartido, 
							'idPlayoffEstructura'=> $idPlayoffEstructura,
							'idplayoff'=> $idplayoff,
							'idTorneo'=> $idTorneo
						)
					);
		return $this->db->insert_id();
	}
	
	function get_partidoxgrupo_array($idTorneo)
	{
		$i = 0;
		$arr_partido = array();
		$partidos  = $this->get_partidos_eliminatorias()->result();
		$grupo = "";
		$grupoAnterior = "";
		foreach ($partidos as $val)
		{
			$grupo = $val->idGrupo;
			if ($grupo != $grupoAnterior || $grupoAnterior == "")
				$i=0;
			
			$unPartido = array(
					   'idPartido' => $val->idPartidoMundial,
					   'idequipolocal' => $val->idEquipoLocal,
					   'equipolocal' => $val->equipoLocal,
					   'banderaLocal' => $val->banderaLocal,
					   'idequipovisitante' => $val->idEquipoVisitante,
					   'equipovisitante' => $val->equipoVisitante,
					   'banderaVisitante' => $val->banderaVisitante,
					   'fechaPartido' => $val->fechaPartido,
					   'golesLocal' => $val->golesLocal,
					   'golesVisitante' => $val->golesVisitante,
					   'idResultadoMundial' => $val->idResultadoMundial
			);
			$arr_partido[$val->idGrupo][$i] = $unPartido;
			$i+=1;
			$grupoAnterior = $val->idGrupo;
		}
		//var_dump($arr_adicionales);
		return $arr_partido;
	}
	
	function get_partidoxplayoff_array($idPlayoff)
	{
		$query = $this->db->get_where('partidomundial', array('idPlayoff' => $idPlayoff), $limit, $offset);
		
		if ($query->num_rows() > 0)
			$resultado = $query->result_array();
		else
			$resultado = null;
	}
	
	function save_partidoMundialPlayoff($idPlayoffHijo, $idPlayOffPadre, $idEquipo)
	{
		$sql = "CALL sp_save_partidoMundialPlayoff(?,?,?)";
		$params = array($idPlayoffHijo,$idPlayOffPadre,$idEquipo);
		$this->db->query($sql, $params);
	}
}