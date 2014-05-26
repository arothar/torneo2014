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
	
	function crearUsuario($username, $email, $pass1, $nroLegajo, $nombre, $nroCliente, $esBridgestone, $esAdecco, $esManpower)
	{
		$this->db->insert("usuario", 
						array('username'=>$username, 
								'email'=>$email, 
								'passw'=>md5($pass1), 
								'nroLegajo'=> $nroLegajo,
								'nombre'=> $nombre,
								'nroCliente'=> $nroCliente,
								'esBridgestone'=> $esBridgestone,
								'esAdecco'=> $esAdecco,
								'esManpower'=> $esManpower
							)
						);
			return $this->db->insert_id();
	}
	
	function guardarPartido($idUsuario, $idPartido, $golesLocal, $golesVisitante, $equipoGanador)
	{
	
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
								'idGanador' => $equipoGanador));
			return $this->db->insert_id();
		} else {
			$this->db->where('idUsuario', $idUsuario);
			$this->db->where('idPartido', $idPartido);
			$this->db->update('usuariopartido', 
								array('golesLocal'=>$golesLocal, 
										'golesVisitante'=> $golesVisitante,
										'idGanador' => $equipoGanador));
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
		$this->db->order_by('puntos','desc');
		$resultado = $this->db->get("usuario");
		return $resultado;
	}

}