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
		$this->db->insert("usuarioPartido", array($idUsuario, $idPartido, $golesLocal, $golesVisitante));
		return $this->db->insert_id();
	}

}