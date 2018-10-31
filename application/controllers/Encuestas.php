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
    
    public function index(){
        //carga la vista de los diseños 
        $data['title'] = "Encuestas";
        
        $this->load->view('templates/head.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('templates/navbar.php', $data);
        $this->load->view('encuestas/index.php', $data);
        $this->load->view('templates/footer.php');
    }
    
    
    public function agregarEncuesta(){
        
        $data['title'] = "Encuestas";

        $ultimo = "";


      
        
    }
    
   
    public function agregarRespuesta(){
        $data['title'] = "Encuestas";

        $ultimo = "";
    }
   
}
