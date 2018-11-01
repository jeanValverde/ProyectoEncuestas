<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Encuestas
 *
 * @author jean
 */
class Encuestas extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        //carga la vista de los diseños 
        $data['title'] = "Home";
        
        $this->load->view('templates/head.php');
        $this->load->view('templates/sidebar.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('encuestas/index');
        
        $this->load->view('templates/footer.php');
      
    }

    //View encabezado
    public function agregarEncuesta() {

        $data['title'] = "Encuestas";

        $ultimo = "";
        
        $this->load->view('templates/head.php');
        $this->load->view('templates/sidebar.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('cuestionario/encabezado.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function agregarPregunta() {

        $data['title'] = "Preguntas";

        $ultimo = "";

        $this->load->view('templates/head.php');
        $this->load->view('templates/sidebar.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('cuestionario/preguntas.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function agregarRespuesta() {
        $data['title'] = "Respuesta";

        $ultimo = "";

        $this->load->view('templates/head.php');
        $this->load->view('templates/sidebar.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('cuestionario/respuestas.php', $data);
        $this->load->view('templates/footer.php');
    }

}
