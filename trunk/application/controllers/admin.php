<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');

		$this->load->library('grocery_CRUD');
		
				
		if ($this->session->userdata('usuario') == FALSE)
			redirect(base_url(). 'login/', 'refresh');
	}

	public function _example_output($output = null)
	{
		$this->load->view('example.php',$output);
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
				
				$crud->columns('idEquipoLocal','idEquipoVisitante','fechaPartido');

				$output = $crud->render();

				$this->_example_output($output);
			}else{
				redirect(base_url(). 'login/', 'refresh');
			}
	}

}