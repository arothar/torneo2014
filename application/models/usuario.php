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
	
	function crearUsuario($username, $email, $pass1, $direccion, $nombre, $localidad, $telefono, $dni)
	{
		$this->db->insert("usuario", 
						array('username'=>$username, 
								'email'=>$email, 
								'passw'=>md5($pass1), 
								'direccion'=> $direccion,
								'nombre'=> $nombre,
								'localidad'=> $localidad,
								'telefono'=> $telefono,
								'dni'=> $dni
							)
						);
			return $this->db->insert_id();
	}
	
	function guardarPartido($idUsuario, $idPartido, $golesLocal, $golesVisitante)
	{
	
		$this->db->where('idUsuario', $idUsuario);
		$this->db->where('idPartido', $idPartido);
		$resultado = $this->db->get("usuarioPartido")->result();
		//var_dump($resultado);
		if (empty($resultado)){
		
			$this->db->insert("usuarioPartido", 
						array('idUsuario'=>$idUsuario, 
								'idPartido'=>$idPartido, 
								'golesLocal'=>$golesLocal, 
								'golesVisitante'=> $golesVisitante));
			return $this->db->insert_id();
		} else {
			$this->db->where('idUsuario', $idUsuario);
			$this->db->where('idPartido', $idPartido);
			$this->db->update('usuarioPartido', 
								array('golesLocal'=>$golesLocal, 
										'golesVisitante'=> $golesVisitante));
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

}