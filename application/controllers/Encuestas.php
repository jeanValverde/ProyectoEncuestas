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
        $this->load->model('pregunta_model');
        $this->load->model('respuesta_model');
    }

    public function index() {
        //carga la vista de los diseños 
        $data['title'] = "Home";

        $this->session->encuesta = null;


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

        $this->session->encuesta = null;

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
            'fecha_creacion' => $hoy,
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
        $this->load->view('cuestionario/viewEncabezado.php', $data);
        $this->load->view('cuestionario/preguntas.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function agregarPregunta() {

        $data['title'] = "Preguntas";

        // id_cuestionario , pregunta , descripcion, tipo, id_encuesta

        $pregunta = array(
            'pregunta' => $this->input->post('pregunta'),
            'descripcion' => $this->input->post('descripcion'),
            'tipo' => $this->input->post('tipo'),
            'id_encuesta' => $this->session->encuesta
        );


        $idPregunta = $this->pregunta_model->agregar_pregunta($pregunta);

        //despachamos la vista 
        $data['encuestas'] = $this->encuesta_model->get_encuesta($this->session->encuesta); //debolver los datos recien insertados

        $data['preguntas'] = $this->pregunta_model->get_preguntas_por_encuesta($this->session->encuesta);
        
        $data['respuestas'] = $this->respuesta_model->get_respuesta_por_encuesta($this->session->encuesta);

        $this->load->view('templates/head.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('cuestionario/viewEncabezado.php', $data);
        $this->load->view('cuestionario/respuestas.php', $data);
        $this->load->view('cuestionario/preguntas.php');
        $this->load->view('templates/footer.php');
        
    }

    public function agregarRespuesta() {
        $data['title'] = "Respuesta";

        //respuesta 
        //id_respuesta , respuesta, id_cuestionario, id_encuesta 
        //pregunta
        //id_cuestionario , pregunta , descripcion, tipo, id_encuesta

        $respuesta = array(
            'respuesta' => $this->input->post('respuesta'),
            'id_cuestionario' => $this->input->post('id_cuestionario'),
            'id_encuesta' => $this->session->encuesta
        );

        $this->respuesta_model->agregar_respuesta($respuesta);

        //despachamos la vista 
        $data['encuestas'] = $this->encuesta_model->get_encuesta($this->session->encuesta); //debolver los datos recien insertados

        $data['preguntas'] = $this->pregunta_model->get_preguntas_por_encuesta($this->session->encuesta);

        $data['respuestas'] = $this->respuesta_model->get_respuesta_por_encuesta($this->session->encuesta);

        
        $this->load->view('templates/head.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('cuestionario/viewEncabezado.php', $data);
        $this->load->view('cuestionario/respuestas.php', $data);
        $this->load->view('cuestionario/preguntas.php');
        $this->load->view('templates/footer.php');
    }

}
