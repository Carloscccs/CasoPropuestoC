<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('datamodel');
	}
	
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function ValidarUsuariov2(){
		$Rut = $this->input->post("rut");
		$Clave =  $this->input->post('clave');
		$Rol = $this->input->post('slRol');

		if($Rol == 0){
			$User = $this->datamodel->BuscarAlumno($Rut,$Clave);
			if($User->num_rows() == 1){
				$data = array(
					'User'=>$User->result()[0],
					'Rol'=>$Rol,
					'logged_in' => TRUE
				);
				$this->session->set_userdata($data);
				redirect('/CVA');
			}else{
				$data['error'] = "El alumno no existe en el sistema";
            	$this->load->view('welcome_message',$data);
			}
			
		}else if($Rol == 1){
			$User = $this->datamodel->BuscarProfesor($Rut,$Clave);
			if($User->num_rows() == 1){
				$data = array(
					'User'=>$User->result()[0],
					'Rol'=>$Rol,
					'logged_in' => TRUE
				);
				$this->session->set_userdata($data);
				redirect('/CVP');
			}else{
				$data['error'] = "El profesor no existe en el sistema";
            	$this->load->view('welcome_message',$data);
			}
		}else if($Rol == 2){
			$User = $this->datamodel->BuscarGuia($Rut,$Clave);
			if($User->num_rows() == 1){
				$data = array(
					'User'=>$User->result()[0],
					'Rol'=>$Rol,
					'logged_in' => TRUE
				);
				$this->session->set_userdata($data);
				redirect('/CVG');
			}else{
				$data['error'] = "El alumno no existe en el sistema";
            	$this->load->view('welcome_message',$data);
			}
		}else{
			$data['error'] = "Datos incorrectos o el usuario no existe en el sistema";
            $this->load->view('welcome_message',$data);
		}


	}

	function CargarVistaAlumno(){
		if($_SESSION['logged_in']){
			$data = array("User"=> $this->session->userdata('User'));
			$this->load->view('alumnoview',$data);
		}else{
			redirect('/CVL');
		}
	}

	function CargarVistaProfesor(){
		if($_SESSION['logged_in']){
			$data = array("User"=> $this->session->userdata('User'));
			$this->load->view('profesorview',$data);
		}else{
			redirect('/CVL');
		}
	}

	function CargarVistaGuia(){
		if($_SESSION['logged_in']){
			$data = array("User"=> $this->session->userdata('User'));
			$this->load->view('guiaview',$data);
		}else{
			redirect('/CVL');
		}
	}

}
