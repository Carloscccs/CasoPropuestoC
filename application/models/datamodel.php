<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class datamodel extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    function BuscarAlumno($Rut,$Clave){
        $this->db->select('*');
        $this->db->from('Alumno');
        $this->db->where('Rut',$Rut);
        $this->db->where('Clave',$Clave);
        return $this->db->get();
    }

    function BuscarGuia($Rut,$Clave){
        $this->db->select('*');
        $this->db->from('Guia');
        $this->db->where('Rut',$Rut);
        $this->db->where('Clave',$Clave);
        return $this->db->get();
    }

    function BuscarProfesor($Rut,$Clave){
        $this->db->select('*');
        $this->db->from('Profesor');
        $this->db->where('Rut',$Rut);
        $this->db->where('Clave',$Clave);
        return $this->db->get();
    }
    
    
}