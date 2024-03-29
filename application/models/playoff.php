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
		$this->db->select('pe.idGrupo,pe.posicion posicion1,g.nombre nombre1,pv.posicion posicion2,gv.nombre nombre2, pe.idPlayoff');
		$this->db->from($this->tbl_playoffs);
		$this->db->join('playoffestructura as pe', $this->tbl_playoffs.'.idPlayoffs = pe.idPlayoff AND pe.posicion=1', 'left');
		$this->db->join('playoffestructura as pv', $this->tbl_playoffs.'.idPlayoffs = pv.idPlayoff AND pv.posicion=2', 'left');
		$this->db->join('grupo as g', 'pe.idGrupo = g.idGrupo');
		$this->db->join('grupo as gv', 'pv.idGrupo = gv.idGrupo');
		$this->db->order_by('pe.idplayoffestructura','asc');
		return $this->db->get();
		
	}
	
	function get_estructura_cuartos($idTipoFinal)
	{
		$this->db->select('pe.idPlayoffEstructura, '. $this->tbl_playoffs. '.idPlayoffs, pe.idPlayoffPadre, fecha, idTipoFinal, pep.idGrupo, g.nombre nombregrupo, pep.posicion');
		$this->db->from($this->tbl_playoffs);
		$this->db->join('playoffestructura as pe', $this->tbl_playoffs.'.idPlayoffs = pe.idPlayoff ');
		$this->db->join('playoffestructura as pep', 'pep.idPlayoff = pe.idPlayoffpadre');
		$this->db->join('grupo as g', 'g.idGrupo = pep.idGrupo');
		$this->db->where('idTipoFinal', $idTipoFinal);
		$this->db->order_by($this->tbl_playoffs . '.idPlayoffs,pe.idPlayoffEstructura,g.idGrupo','asc');
		
		// $this->db->get();
		// echo $this->db->last_query();
		// die(); 
		return $this->db->get();
		
	}
	
	function get_estructura_semis($idTipoFinal)
	{
		$this->db->select('pe.idPlayoffEstructura, '. $this->tbl_playoffs. '.idPlayoffs, pe.idPlayoffPadre, fecha, idTipoFinal');
		$this->db->from($this->tbl_playoffs);
		$this->db->join('playoffestructura as pe', $this->tbl_playoffs.'.idPlayoffs = pe.idPlayoff ');
		$this->db->where('idTipoFinal', $idTipoFinal);
		$this->db->order_by($this->tbl_playoffs . '.idPlayoffs,pe.idPlayoffEstructura','asc');
		
		// $this->db->get();
		// echo $this->db->last_query();
		// die(); 
		return $this->db->get();
		
	}
	
	function get_estructura_cuartos_array($idTipoFinal)
	{
		$indicePadre = 0;
		$indicePlayoff = 0;
		$arr_estructura = array();
		$arr_playoff = array();
		$arr_padre = array();
		$estructuraAnterior = 0;
		$idPlayoffAnterior = 0;
		$elemento  = $this->get_estructura_cuartos($idTipoFinal)->result();
		
		foreach ($elemento as $val)
		{
		
			$idPlayoffEstructura = $val->idPlayoffEstructura;
		
			$unPadre = array(
					   'idGrupo' => $val->idGrupo,
					   'nombregrupo' => $val->nombregrupo,
					   'posicion' => $val->posicion,
					   'fecha' => $val->fecha
			);
			
			if ($val->idPlayoffEstructura != $estructuraAnterior){
				$arr_padre = array();
				$arr_padre[$indicePadre] = $unPadre;
				$indicePadre += 1;
				$estructuraAnterior = $val->idPlayoffEstructura;
			}else{
				$arr_padre[$indicePadre] = $unPadre;
				$indicePadre = 0;
			}
			
			
			
			$unElemento = array(
					   'idplayoffestructura' => $val->idPlayoffEstructura,
					   'idplayoffpadre' => $val->idPlayoffPadre,
					   'fecha' => $val->fecha,
					   'idTipoFinal' => $val->idTipoFinal,
					   'padre' => $arr_padre,
					   'idPlayoffs' => $val->idPlayoffs
			);
			//$arr_estructura[$idPlayoffEstructura] = $unElemento;
			
			
			if ($val->idPlayoffs != $idPlayoffAnterior){
				$arr_estructura = array();
				$arr_estructura[$indicePlayoff] = $unElemento;
				$indicePlayoff += 1;
				$idPlayoffAnterior = $val->idPlayoffs;
			}else{
				$arr_estructura[$indicePlayoff] = $unElemento;
				$indicePlayoff = 0;
			}
			
			$unPlayoff = array(
							'idPlayoff' => $val->idPlayoffs,
							'estructura' => $arr_estructura,
						);
						
			$arr_playoff[$val->idPlayoffs] = $unPlayoff;
		}
		return $arr_playoff;
	}
	
	function get_estructura_semis_array($idTipoFinal)
	{
		$indicePadre = 0;
		$indicePlayoff = 0;
		$arr_estructura = array();
		$arr_playoff = array();
		$arr_padre = array();
		$estructuraAnterior = 0;
		$idPlayoffAnterior = 0;
		$elemento  = $this->get_estructura_semis($idTipoFinal)->result();
		
		foreach ($elemento as $val)
		{
			$idPlayoffEstructura = $val->idPlayoffEstructura;
		
			$unPadre = array(
			   'fecha' => $val->fecha
			);
			
			if ($val->idPlayoffEstructura != $estructuraAnterior){
				$arr_padre = array();
				$arr_padre[$indicePadre] = $unPadre;
				$indicePadre += 1;
				$estructuraAnterior = $val->idPlayoffEstructura;
			}else{
				$arr_padre[$indicePadre] = $unPadre;
				$indicePadre = 0;
			}
			
			
			
			$unElemento = array(
					   'idplayoffestructura' => $val->idPlayoffEstructura,
					   'idplayoffpadre' => $val->idPlayoffPadre,
					   'fecha' => $val->fecha,
					   'idTipoFinal' => $val->idTipoFinal,
					   'padre' => $arr_padre,
					   'idPlayoffs' => $val->idPlayoffs
			);
			//$arr_estructura[$idPlayoffEstructura] = $unElemento;
			
			
			if ($val->idPlayoffs != $idPlayoffAnterior){
				$arr_estructura = array();
				$arr_estructura[$indicePlayoff] = $unElemento;
				$indicePlayoff += 1;
				$idPlayoffAnterior = $val->idPlayoffs;
			}else{
				$arr_estructura[$indicePlayoff] = $unElemento;
				$indicePlayoff = 0;
			}
			
			$unPlayoff = array(
							'idPlayoff' => $val->idPlayoffs,
							'estructura' => $arr_estructura,
						);
						
			$arr_playoff[$val->idPlayoffs] = $unPlayoff;
		}
		return $arr_playoff;
	}
	
	function get_ganadoresTipoFinalSP($idTipoFinal, $idTipoFinalAnterior)
	{
		$sql = "CALL sp_traerGanadoresTipoFinal(?,?);";
		$params = array($idTipoFinal,$idTipoFinalAnterior);
		$this->db->query($sql, $params);
		return ($this->my_db->affected_rows() == 1); 
	}
	
	function get_ganadoresTipoFinal($idTipoFinal, $idTipoFinalAnterior)
	{
		$sql = "
			select pe.idPlayoffEstructura, pe.idPlayoff, p.fecha, pe.idPlayoffPadre, pg.idGanador, e.archivoBandera
			from playoffestructura pe
			inner join playoffs p on pe.idplayoff= p.idplayoffs
			inner join (
					select idPartidoMundial, CASE
						WHEN (golesLocal > golesVisitante) THEN idEquipoLocal
						WHEN (golesLocal < golesVisitante) THEN idEquipoVisitante
						else idEquipoGanador end as idGanador,pm.idTorneo,
					p.idPlayoffs
					from partidomundial pm
					inner join playoffs p on pm.idPlayoff = p.idPlayoffs
					where not golesLocal is null
						and p.idtipofinal = " . $idTipoFinalAnterior . "
				   ) pg on pg.idPlayOffs =  pe.idPlayoffPadre
			inner join equipo e on e.IdEquipo= pg.idGanador
			where idTipoFinal=".$idTipoFinal.";";
		return $this->db->query($sql);
	}
	
	function get_playOffHijo_array($idPlayoff, $posicion)
	{
		$this->db->select('idPlayoff,localia');
		$this->db->from('playoffestructura');
		$this->db->where('idPlayoffPadre', $idPlayoff);
		$this->db->where('posicion', $posicion);
		
		$query = $this->db->get();
		
		if ($query->num_rows() > 0)
			$resultado = $query->result_array();
		else
			$resultado = null;
		
		return $resultado;
	}
	
	function set_armarOctavos()
	{
		$sql = "CALL sp_armarOctavos();";
		$this->db->query($sql);
		//return ($this->my_db->affected_rows() == 1); 
	}
	
}