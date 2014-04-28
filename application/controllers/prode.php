<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prode extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('Grupo','',TRUE);
		$this->load->model('PartidoMundial','',TRUE);
		$this->load->model('UsuarioPartido','',TRUE);
		$this->load->model('Usuario','',TRUE);
		
		if ($this->session->userdata('usuario') == FALSE)
			redirect(base_url(). 'login', 'refresh');
		
	}
	
	public function index()
	{
		$grupos = $this->Grupo->get_paged_list(30, 0)->result();
		$partidos = $this->PartidoMundial->get_partidoxgrupo_array(1);
		$usuarioPartidoElegido = $this->session->userdata('usuario');
		$partidosUsuario = $this->UsuarioPartido->get_by_user_array($usuarioPartidoElegido[0]->idUsuario);
		
		$data['grupos'] = $grupos;
		$data['partidos'] = $partidos;
		$data['partidosUsuario'] = $partidosUsuario;
		$data['usuario'] = $usuarioPartidoElegido[0];
		
		$outReglamento = $this->load->view('view_reglamento',null, TRUE);
		$outFaseGrupo = $this->load->view('view_faseGrupo',$data, TRUE);
		$outFinal = $this->load->view('view_final',null, TRUE);
		$outPosiciones = $this->load->view('view_posiciones',null, TRUE);
		
		$data['outReglamento'] = $outReglamento;
		$data['outFaseGrupo'] = $outFaseGrupo;
		$data['outFinal'] = $outFinal;
		$data['outPosiciones'] = $outPosiciones;
		
		$this->load->view('view_prode',$data);
	}
	
	function partido()
	{
		$data = $this->input->post('data');
		$data = json_decode($data);
		$usuario = $this->session->userdata('usuario');
		$this->Usuario->guardarPartido($usuario[0]->idUsuario,$data->idPartido, $data->golesLocal, $data->golesVisitante);
		echo true;
		
	}
	
}
