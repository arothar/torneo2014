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
			$crud->display_as('idEquipoLocal','EquipoLocal');
			$crud->display_as('idEquipoVisitante','EquipoVisitante');
			
			$crud->columns('idGrupo','idEquipoLocal','golesLocal','golesVisitante','idEquipoVisitante','fechaPartido');
			
			$crud->callback_after_update(array($this, 'actualizarPuntos'));

			$output = $crud->render();

			$this->_example_output($output);
		}else{
			redirect(base_url(). 'login/', 'refresh');
		}
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
		//var_dump($primary_key);
		//var_dump($post_array);
		//die();
		$this->Usuario->asignarPuntaje($primary_key,$post_array["golesLocal"], $post_array["golesVisitante"]);
	 
		return true;
	}

}