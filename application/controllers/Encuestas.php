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
        
        $this->load->view('templates/head.php', $data);
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
        
        //Falta el view de la encuesta !!!! ya que para agregar una pregunta debo 
        //saber y ver literalmente la encuesta 
        

        $this->load->view('templates/head.php');
        $this->load->view('templates/sidebar.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('cuestionario/preguntas.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function agregarRespuesta() {
        $data['title'] = "Respuesta";

        
        //Falta el view de la encuesta y pregunta!!!! ya que para agregar una pregunta debo 
        //saber y ver literalmente la encuesta y la pregunta 
        
        $ultimo = "";

        $this->load->view('templates/head.php');
        $this->load->view('templates/sidebar.php');
        $this->load->view('templates/navbar.php');
        
        $this->load->view('templates/footer.php');
    }
    
    
    public function  prueba(){
        
        $data['title'] = "Encuestas";

        $ultimo = "";
        
        $this->load->view('templates/head.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('cuestionario/encabezado.php');
        $this->load->view('cuestionario/preguntas.php');
        $this->load->view('cuestionario/respuestas.php');
        $this->load->view('templates/footer.php');
    }
    

}
