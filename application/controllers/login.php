<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Usuario','',TRUE);
	}

	function index($offset = 0){
		
		$data['comportamiento'] = "login";
		$this->load->view('view_login', $data);
	}
	
	function autenticar($offset = 0){
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);
		$valido = false;
		$user = $this->Usuario->login($this->input->post('usuario'), md5($this->input->post('_password')))->result();
		if (count($user) == 1){
			$this->session->set_userdata('usuario',$user);
			redirect(base_url(). 'prode?'. md5(rand()), 'refresh');
		} else 
			redirect(base_url(). 'login', 'refresh');
			//$this->load->view('view_login', '');
	}

	function nuevousuario($offset = 0){
		$data['existeUsuario']=0; 
		$data['passDiferentes']=0;
		$data['existeEmail']=0;
		$data['existeLegajo']=0;
		$this->load->view('view_nuevoUsuario',$data);
	}

	function registronuevo()
	{
		$existe = $this->Usuario->comprobarUsuario($this->input->post('username'));
		$existeEmail = $this->Usuario->comprobarEmail($this->input->post('email'));
		
		$existeLegajo = $this->Usuario->comprobarLegajo($this->input->post('nroLegajo'));
		
		$plainPass = $this->input->post('plainPassword');

		if ($plainPass['first'] != $plainPass['second'])
		{
			$data['passDiferentes']=1;
			$data['existeUsuario']=0;
			$data['existeEmail']=0;
			$data['existeLegajo']=0;
			$this->load->view('view_nuevoUsuario',$data);	
		}else if ($existe) 
		{
			$data['passDiferentes']=0;
			$data['existeUsuario']=1;
			$data['existeEmail']=0;
			$data['existeLegajo']=0;
			$this->load->view('view_nuevoUsuario',$data);	
		}else if ($existeEmail) 
		{
			$data['passDiferentes']=0;
			$data['existeUsuario']=0;
			$data['existeEmail']=1;
			$data['existeLegajo']=0;
			$this->load->view('view_nuevoUsuario',$data);	
		}else if ($existeLegajo) 
		{
			$data['passDiferentes']=0;
			$data['existeUsuario']=0;
			$data['existeEmail']=0;
			$data['existeLegajo']=1;
			$this->load->view('view_nuevoUsuario',$data);	
		}else 
		{
			$this->Usuario->crearUsuario(
				$this->input->post('username'),
				$this->input->post('email'),
				$plainPass['first'],
				$this->input->post('nroLegajo'),
				$this->input->post('nombre'),
				$this->input->post('nroEmpleado'),
				$this->input->post('nroDNI'),
				($this->input->post('esBridgestone') == "1") ? 1 : 0 ,
				($this->input->post('esAdecco') == "1") ? 1 : 0 ,
				($this->input->post('esManpower') == "1") ? 1 : 0
				);
				redirect(base_url(). 'login', 'refresh');
		}
	}
	
	function remover($offset = 0){
		$this->session->unset_userdata('usuario');
		redirect(base_url(). 'login', 'refresh');
	}
	
}