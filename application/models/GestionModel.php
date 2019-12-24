<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class gestionModel extends CI_Model {
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

    function BuscarPracticaAlumno($Rut){
        $this->db->select('*');
        $this->db->from('Alumno_practica');
        $this->db->where('RutAlumno',$Rut);
        $this->db->where('Estado','1');
        return $this->db->get();
    }

    function ObtenerBitacoraAlumno($Rut,$IdAlumnoPractica){
        $this->db->select('*');
        $this->db->from('Bitacora');
        $this->db->where('RutAutor',$Rut);
        $this->db->where('Tipo',"0");
        $this->db->where('IdAlumnoPractica',$IdAlumnoPractica);
        return $this->db->get();
    }

    function InsertarBitacora($Rut,$Texto,$Tipo,$IdAlumnoPractica){
        $datetime = date('Y/m/d h:i');
        $data = array(
            "Texto"=>$Texto,
            "Fecha"=>$datetime,
            "Tipo"=>$Tipo,
            "RutAutor"=>$Rut,
            "IdAlumnopractica"=>$IdAlumnoPractica
        );
        return $this->db->insert('Bitacora',$data);
    }

    function ObtenerTextoBitacoraId($Id){
        $this->db->select("*");
        $this->db->from('Bitacora');
        $this->db->where('Id',$Id);
        return $this->db->get();
    }

    function ActualizarBitacora($Id,$Texto){
        $this->db->where("Id",$Id);
        $data = array(
            "Texto"=>$Texto
        );
        return $this->db->update('Bitacora',$data);
    }

    function ObtenerPracticasProfesor($Rut){
        $this->db->select('ap.Id as "Id", ap.RutAlumno as "RutAlumno", al.Nombre as "NombreAlumno", p.Nombre as "Practica", ap.FechaInicio as "FechaInicio", ap.FechaFin as "FechaFin", ap.RutGuia as "RutGuia"');
        $this->db->from('Alumno_practica ap');
        $this->db->join('Practica p','p.Id = ap.IdPractica');
        $this->db->join('Alumno al','al.Rut = ap.RutAlumno');
        $this->db->where('ap.RutProfesor',$Rut);
        return $this->db->get();
    }
    
    
}