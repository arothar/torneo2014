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
		$this->load->model('PlayOff','',TRUE);
		
		if ($this->session->userdata('usuario') == FALSE)
			redirect(base_url(). 'login', 'refresh');
		
	}
	
	public function index()
	{
		$fechaHoy = new DateTime('2014-06-27 01:00');
	
		$grupos = 					$this->Grupo->get_paged_list(30, 0)->result();
		$partidos = 				$this->PartidoMundial->get_partidoxgrupo_array(1);
		$usuarioPartidoElegido = 	$this->session->userdata('usuario');
		$partidosUsuario = 			$this->UsuarioPartido->get_by_user_array($usuarioPartidoElegido[0]->idUsuario);
		$estructuraOctavos = 		$this->PlayOff->get_estructura_octavos()->result();
		
		$partidosOctavos = 			$this->PartidoMundial->get_partidosplayoffs_array(8);
		$partidosCuartos = 			$this->PartidoMundial->get_partidosplayoffs_array(4);
		$partidosSemis = 			$this->PartidoMundial->get_partidosplayoffs_array(2);
		$partidoFinal = 			$this->PartidoMundial->get_partidosplayoffs_array(1);
		
		$usuariosOrdenados = 		$this->Usuario->getUsuarios()->result_array();
		

		//var_dump($estructuraOctavos);
		
		$data['grupos'] = 				$grupos;
		$data['partidos'] = 			$partidos;
		$data['partidosUsuario'] = 		$partidosUsuario;
		$data['usuario'] = 				$usuarioPartidoElegido[0];
		$data['fechaHoy'] = 			$fechaHoy;
		$data['estructuraOctavos'] = 	$estructuraOctavos;
		$data['partidosOctavos'] = 		$partidosOctavos;
		$data['usuariosOrdenados'] = 	$usuariosOrdenados;
		
		$outReglamento = 	$this->load->view('view_reglamento',null, TRUE);
		$outFaseGrupo = 	$this->load->view('view_fasegrupo',$data, TRUE);
		$outFinal = 		$this->load->view('view_final',null, TRUE);
		$outPosiciones = 	$this->load->view('view_posiciones',$data, TRUE);
		
		$data['outReglamento'] = 	$outReglamento;
		$data['outFaseGrupo'] = 	$outFaseGrupo;
		$data['outFinal'] = 		$outFinal;
		$data['outPosiciones'] = 	$outPosiciones;
		
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
	
	function dateTimeDiff($date1, $date2) {

		$alt_diff = new stdClass();
		$alt_diff->y =  floor(abs($date1->format('U') - $date2->format('U')) / (60*60*24*365));
		$alt_diff->m =  floor((floor(abs($date1->format('U') - $date2->format('U')) / (60*60*24)) - ($alt_diff->y * 365))/30);
		$alt_diff->d =  floor(floor(abs($date1->format('U') - $date2->format('U')) / (60*60*24)) - ($alt_diff->y * 365) - ($alt_diff->m * 30));
		$alt_diff->h =  floor( floor(abs($date1->format('U') - $date2->format('U')) / (60*60)) - ($alt_diff->y * 365*24) - ($alt_diff->m * 30 * 24 )  - ($alt_diff->d * 24) );
		$alt_diff->i = floor( floor(abs($date1->format('U') - $date2->format('U')) / (60)) - ($alt_diff->y * 365*24*60) - ($alt_diff->m * 30 * 24 *60)  - ($alt_diff->d * 24 * 60) -  ($alt_diff->h * 60) );
		$alt_diff->s =  floor( floor(abs($date1->format('U') - $date2->format('U'))) - ($alt_diff->y * 365*24*60*60) - ($alt_diff->m * 30 * 24 *60*60)  - ($alt_diff->d * 24 * 60*60) -  ($alt_diff->h * 60*60) -  ($alt_diff->i * 60) );
		$alt_diff->invert =  (($date1->format('U') - $date2->format('U')) > 0)? 0 : 1 ;

		return $alt_diff;
	}    
}
