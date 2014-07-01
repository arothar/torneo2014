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
		//$test = new DateTime('2014-06-15 16:00');
		$test = new DateTime(date('Y-m-d H:i:s'));
		$fechaHoy = date_format($test, 'Y-m-d H:i'); // 2011-03-03 00:00:00
		
		$partido =$this->PartidoMundial->get_partidoByFecha($fechaHoy);
		
		$partidoCompleto = $this->PartidoMundial->get_equiposXPartido($partido[0]["idPartidoMundial"])->result_array();

		if ($partido != null) 
		{
			$usuariosSinCargar = $this->Usuario->getUsuariosSinCargar($partido[0]["idPartidoMundial"])->result();
			//var_dump($usuariosSinCargar);
			//die();

			$arr_emails = array();
			foreach ($usuariosSinCargar as $key => $val){
					$arr_emails[$key] = $val->email;
			}

			$smtp = Swift_SmtpTransport::newInstance('www.fanaticosdelmundial.com.ar', 25)
			  ->setUsername('soporte@fanaticosdelmundial.com.ar')
			  ->setPassword('fanaticosdelmundial1234');
		  
			$mailer = Swift_Mailer::newInstance($smtp);

			$message = Swift_Message::newInstance('No ha cargado los resultados '. $partidoCompleto[0]["nombre"] . ' - ' . $partidoCompleto[1]["nombre"]);

			$message
			  ->setTo("soporte@fanaticosdelmundial.com.ar")
			  ->setBcc($arr_emails)
			  ->setFrom(array('soporte@fanaticosdelmundial.com.ar' => 'soporte@fanaticosdelmundial.com.ar'))
			  ->setBody("No te olvides de cargar el resultado del partido " . $partidoCompleto[0]["nombre"] . " - " . $partidoCompleto[1]["nombre"] . ".. queda 1 hora para que puedas hacerlo y seguir sumando puntos!.",'text/html');
			  //->setBody("No te olvides de cargar tus resultados para los próximos partidos y seguí sumando puntos!",'text/html');

			$mailer->send($message);
		}

	}
	
	function hora($offset = 0){
		echo date('Y-m-d H:i:s');
	}
}