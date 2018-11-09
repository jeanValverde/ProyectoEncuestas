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

    //cargan los modelos a utilizar 
    public function __construct() {
        parent::__construct();
        $this->load->model('encuesta_model');
    }

    public function index() {
        //carga la vista de los diseños 
        $data['title'] = "Home";

        $this->session->encuesta = -1;
        
        
        $this->load->view('templates/head.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('encuestas/index');

        $this->load->view('templates/footer.php');
    }

    //View encabezado
    //carga la vita del formulario 
    public function agregarEncuesta() {
        
        $data['title'] = "Encuestas";

        $this->load->view('templates/head.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('cuestionario/encabezado.php');
        $this->load->view('templates/footer.php');
    }

    //agrega una encuesta nueva a la base de datos 
    //depacha la viata con la inforamcion de la encuesta mas el formulario de pregunta
    public function crearEncuesta() {
        
        $data['title'] = "Encuestas";

        //fecha Hoy 
        $hoy = date("j, n, Y"); //arreglar fecha 
        
        $encuesta = array(
            'fecha_creacion' => $hoy ,
            'fecha_termino' => $this->input->post('fecha_termino'),
            'valor_base' => $this->input->post('valor_base'),
            'nombre' => $this->input->post('nombre'),
            'estado' => true,
            'descripcion' => $this->input->post('descripcion')
        );

        $idInsertado = $this->encuesta_model->agregar_encuesta($encuesta);
        
        $data['encuestas'] = $this->encuesta_model->get_encuesta($idInsertado); //debolver los datos recien insertados 
        
        
        $this->session->encuesta = $idInsertado; //mantenemos el id de la encuesta siempre en la app 
                
        
        $this->load->view('templates/head.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('cuestionario/viewEncabezado.php', $data); //ESTE NO DEBE IR YA QUE SE MUESTRA SOLO LA VISTA no el formulario!!!!! 
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

    public function prueba() {

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
