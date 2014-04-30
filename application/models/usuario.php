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

	function  asignarPuntaje($partido)
	{
		
	}

}