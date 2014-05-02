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
		$user = $this->Usuario->login($this->input->post('usuario'), $this->input->post('_password'))->result();
		if (count($user) == 1){
			$this->session->set_userdata('usuario',$user);
			redirect(base_url(). 'prode', 'refresh');
		} else 
			$this->load->view('view_login', '');
		
	}
	
	function remover($offset = 0){
		$this->session->unset_userdata('usuario');
		redirect(base_url(). 'login', 'refresh');
	}
	
}