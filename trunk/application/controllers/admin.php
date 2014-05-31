<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Usuario','',TRUE);
		$this->load->model('PlayOff','',TRUE);
		$this->load->model('PartidoMundial','',TRUE);
		

		$this->load->library('grocery_CRUD');
		
				
		if ($this->session->userdata('usuario') == FALSE)
			redirect(base_url(). 'login/', 'refresh');
	}

	public function _example_output($output = null)
	{
		$this->load->view('view_admin.php',$output);
	}

	
	public function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

	public function partidos_management()
	{
		$usuario = $this->session->userdata('usuario');
		if ($usuario[0]->esAdmin == '1')
		{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('partidomundial');
			$crud->set_relation('idEquipoLocal','equipo','nombre');
			$crud->set_relation('idEquipoVisitante','equipo','nombre');
			$crud->set_relation('idEquipoGanador','equipo','nombre');
			$crud->display_as('idEquipoLocal','EquipoLocal');
			$crud->display_as('idEquipoVisitante','EquipoVisitante');
			$crud->display_as('idEquipoGanador','Ganador');
			$crud->unset_delete();
			
			$crud->columns('idGrupo','idEquipoLocal','golesLocal','golesVisitante','idEquipoVisitante','fechaPartido');
			$crud->unset_edit_fields('idTorneo', 'idPlayoffEstructura', 'idResultadoMundial');
			
			$crud->field_type('fechaPartido', 'readonly');
			$crud->field_type('idGrupo', 'readonly');
			$crud->field_type('idPlayoff', 'readonly');
			$crud->field_type('idEquipoLocal', 'readonly');
			$crud->field_type('idEquipoVisitante', 'readonly');
			
			$crud->callback_after_update(array($this, 'actualizarPuntos'));

			$output = $crud->render();

			$this->_example_output($output);
		}else{
			redirect(base_url(). 'login/', 'refresh');
		}
	}
	
	
	public function armarOctavos()
	{
		$equiposGanadores 	= 	$this->PlayOff->set_armarOctavos();
		redirect(base_url(). 'admin', 'refresh');
	}
	
	public function armarCuartos()
	{
		$equiposGanadores 	= 	$this->PlayOff->get_ganadoresTipoFinal(4,8)->result();
		$idPlayoff = 0;
		$idEquipoLocal = 0;
		$idEquipoVisitante = 0;

		//var_dump($equiposGanadores);
		//die();
		
		foreach ($equiposGanadores as $equipoGanador)
		{
			if ($idPlayoff != $equipoGanador->idPlayoff)
			{
				$idPlayoff = $equipoGanador->idPlayoff;
				$idEquipoLocal = $equipoGanador->idGanador;
			}else
			{
				$idPlayoff = 0;
				$idEquipoVisitante = $equipoGanador->idGanador;
				//aca tengo que hacer el insert en la tabla de "partidomundial".
				$this->PartidoMundial->crearPartido($idEquipoLocal, $idEquipoVisitante, $equipoGanador->fecha, $equipoGanador->idPlayoffEstructura, $equipoGanador->idPlayoff, 1);
			}
		}
	}
	
	public function armarSemis()
	{
		$equiposGanadores 	= 	$this->PlayOff->get_ganadoresTipoFinal(2,4)->result();
		$idPlayoff = 0;
		$idEquipoLocal = 0;
		$idEquipoVisitante = 0;

		//var_dump($equiposGanadores);
		//die();
		
		foreach ($equiposGanadores as $equipoGanador)
		{
			if ($idPlayoff != $equipoGanador->idPlayoff)
			{
				$idPlayoff = $equipoGanador->idPlayoff;
				$idEquipoLocal = $equipoGanador->idGanador;
			}else
			{
				$idPlayoff = 0;
				$idEquipoVisitante = $equipoGanador->idGanador;
				//aca tengo que hacer el insert en la tabla de "partidomundial".
				$this->PartidoMundial->crearPartido($idEquipoLocal, $idEquipoVisitante, $equipoGanador->fecha, $equipoGanador->idPlayoffEstructura, $equipoGanador->idPlayoff, 1);
			}
		}
	}
	
	
	function actualizarPuntos($post_array,$primary_key)
	{	
		$this->Usuario->asignarPuntaje($primary_key,$post_array["golesLocal"], $post_array["golesVisitante"]);
		$idEquipoGanador = 0;
		$partidoEditado = $this->PartidoMundial->get_by_id($primary_key)->result_array();

		//var_dump($partidoEditado);
		
		if ($partidoEditado[0]["idPlayoff"] != null)
		{
			if ($post_array["golesLocal"] > $post_array["golesVisitante"])
			{
				$idEquipoGanador = $partidoEditado[0]["idEquipoLocal"];
				$idEquipoPerdedor = $partidoEditado[0]["idEquipoVisitante"];
			}
			else if ($post_array["golesLocal"] < $post_array["golesVisitante"])
			{
				$idEquipoGanador = $partidoEditado[0]["idEquipoVisitante"];
				$idEquipoPerdedor = $partidoEditado[0]["idEquipoLocal"];
			}
			
			$resultado = $this->PlayOff->get_playOffHijo_array($partidoEditado[0]["idPlayoff"], 1);
			if ($resultado != null)
			{
				$idPlayoffHijo = $resultado[0]['idPlayoff'];
				$localia = $resultado[0]['localia'];
				//var_dump($resultado);
				$resultPartido = $this->PartidoMundial->save_partidoMundialPlayoff($idPlayoffHijo,$partidoEditado[0]["idPlayoff"],$idEquipoGanador,$localia);
			}
			
			$resultado = $this->PlayOff->get_playOffHijo_array($partidoEditado[0]["idPlayoff"], 2);
			if ($resultado != null)
			{
				$idPlayoffHijo = $resultado[0]['idPlayoff'];
				$localia = $resultado[0]['localia'];
				$resultPartido = $this->PartidoMundial->save_partidoMundialPlayoff($idPlayoffHijo,$partidoEditado[0]["idPlayoff"],$idEquipoPerdedor,$localia);
			}
			
		} 

	 
		return true;
	}

}