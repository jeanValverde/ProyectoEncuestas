<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pregunta_model
 *
 * @author jean
 */
class Pregunta_model extends CI_Model {
    //put your code here
    
    function __construct() {
        $this->load->database();
    }
    
    public function get_pregunta_por_encuestas($idEncuesta = -1) {

        $this->db->select(" id_cuestionario , pregunta , descripcion, tipo, id_encuesta  ", FALSE);
        $this->db->from("pregunta p");
        $this->db->where('id_encuesta', $idEncuesta);

        $query = $this->db->get();
        
        return $query->result_array();
    }
    
       
    
    
    public function agregar_pregunta($pregunta) {
        $this->db->insert('pregunta', $pregunta);
    }
    
    public function modificar_pregunta($id, $pregunta) {
        
        $this->db->set('pregunta', $pregunta['pregunta']);
        $this->db->set('descripcion', $pregunta['descripcion']);
        $this->db->set('tipo', $pregunta['tipo']);
        $this->db->where('id_cuestionario', $id);
        $this->db->update('pregunta');
        
    }
    
    
    public function eliminar_pregunta($id) {
        $this->db->delete('pregunta', array('id_cuestionario' => $id));
    }
        
            
    
}
