<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Emailcontroller extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Usuario','',TRUE);
		$this->load->model('UsuarioPartido','',TRUE);
		$this->load->model('PartidoMundial','',TRUE);
		require_once 'application/libraries/swift_mailer/swift_required.php';
	}

	function index($offset = 0){
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$test = new DateTime('2014-06-15 15:00');
		//$test = new DateTime(date('Y-m-d H:i:s'));
		$fechaHoy = date_format($test, 'Y-m-d H:i'); // 2011-03-03 00:00:00
		
		$partido =$this->PartidoMundial->get_partidoByFecha($fechaHoy);
		
		if ($partido != null) 
		{
			$usuariosSinCargar = $this->Usuario->getUsuariosSinCargar($partido[0]["idPartidoMundial"])->result();
			//var_dump($usuariosSinCargar);
			//die();

			$arr_emails = array();
			foreach ($usuariosSinCargar as $key => $val){
					$arr_emails[$key] = $val->Email;
			}
			  
			$smtp = Swift_SmtpTransport::newInstance('www.fanaticosdelmundial.com', 25)
			  ->setUsername('soporte@fanaticosdelmundial.com')
			  ->setPassword('fanaticosdelmundial1234');
		  
			$mailer = Swift_Mailer::newInstance($smtp);

			$message = Swift_Message::newInstance('No ha cargado los resultados del partido siguiente');

			$message
			  ->setTo("soporte@fanaticosdelmundial.com")
			  ->setBcc($arr_emails)
			  ->setFrom(array('soporte@fanaticosdelmundial.com' => 'soporte@fanaticosdelmundial.com'))
			  ->setBody("Recuerde que en una hora finaliza la carga de resultados para el siguiente partido y no se registraron cargas de este usuario.",'text/html')
			  ;

			$mailer->send($message);
		}

	}
	
	function hora($offset = 0){
		echo date('Y-m-d H:i:s');
	}
}