<?php
class Usuario extends CI_Model {
	// table name
	private $tbl_usuario= 'usuario';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	// get number of Clientes in database
	function count_all(){
		return $this->db->count_all($this->tbl_usuario);
	}
	
	// get person by id
	function login($usuario,$password){
		$this->db->where('username', $usuario);
		$this->db->where('passw', $password);
		
		return $this->db->get($this->tbl_usuario);
	}
	
	function comprobarUsuario($usuario){
		$this->db->where('username', $usuario);
		//$this->db->where('activo', 1);
		
		$registros = $this->db->get($this->tbl_usuario)->num_rows();
		
		//var_dump($registros);
		
		return ($registros >0) ? true : false;
	}
	
	function comprobarEmail($email){
		$this->db->where('email', $email);
		//$this->db->where('activo', 1);
		
		$registros = $this->db->get($this->tbl_usuario)->num_rows();
		
		//var_dump($registros);
		
		return ($registros >0) ? true : false;
	}
	
	function crearUsuario($username, $email, $pass1, $nroLegajo, $nombre, $nroEmpleado,$nroDNI, $esBridgestone, $esAdecco, $esManpower)
	{
		$this->db->insert("usuario", 
						array('username'=>$username, 
								'email'=>$email, 
								'passw'=>md5($pass1), 
								'nroLegajo'=> $nroLegajo,
								'nombre'=> $nombre,
								'nroEmpleado'=> $nroEmpleado,
								'nroDNI' => $nroDNI,
								'esBridgestone'=> $esBridgestone,
								'esAdecco'=> $esAdecco,
								'esManpower'=> $esManpower
							)
						);
			return $this->db->insert_id();
	}
	
	function guardarPartido($idUsuario, $idPartido, $golesLocal, $golesVisitante, $equipoGanador)
	{
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$this->db->where('idUsuario', $idUsuario);
		$this->db->where('idPartido', $idPartido);
		$resultado = $this->db->get("usuariopartido")->result();
		//var_dump($resultado);
		if (empty($resultado)){
		
			$this->db->insert("usuariopartido", 
						array('idUsuario'=>$idUsuario, 
								'idPartido'=>$idPartido, 
								'golesLocal'=>$golesLocal, 
								'golesVisitante'=> $golesVisitante,
								'idGanador' => $equipoGanador,
								'fechaUpdate' => date('Y-m-d G:i')));
			return $this->db->insert_id();
		} else {
			$this->db->where('idUsuario', $idUsuario);
			$this->db->where('idPartido', $idPartido);
			$this->db->update('usuariopartido', 
								array('golesLocal'=>$golesLocal, 
										'golesVisitante'=> $golesVisitante,
										'idGanador' => $equipoGanador,
										'fechaUpdate' => date('Y-m-d G:i')));
		}
	}

	function  asignarPuntaje($partido, $golesLocal, $golesVisitante)
	{
		$sql = "CALL sp_asignarPuntajeUsuario(?,?,?)";
		$params = array($partido,$golesLocal, $golesVisitante);
		$this->db->query($sql, $params);
		
		$sql = "CALL sp_actualizarPuntos()";
		$this->db->query($sql);
	}
	
	function getUsuarios()
	{
		$this->db->where('puntos > ', 0);
		$this->db->order_by('puntos','desc');
		$resultado = $this->db->get("usuario");
		return $resultado;
	}
	
	function getUsuario($idUsuario)
	{
		$this->db->where('idUsuario', $idUsuario);
		$resultado = $this->db->get($this->tbl_usuario)->result();
		return $resultado;
	}

}