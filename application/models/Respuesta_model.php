<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Respuesta_model
 *
 * @author jean
 */
class Respuesta_model extends CI_Model {
    //put your code here
    
    
    function __construct() {
        $this->load->database();
    }
    
    public function get_respuesta_por_pregunta($idCuestionario = -1) {

        $this->db->select(" id_respuesta , respuesta, id_cuestionario, id_encuesta  ", FALSE);
        $this->db->from("respuesta r");
        $this->db->where('id_cuestionario', $idCuestionario);

        $query = $this->db->get();
        
        return $query->result_array();
    }
    
       
    
    
    public function agregar_respuesta($respuesta) {
        $this->db->insert('respuesta', $respuesta);
    }
    
    public function modificar_respuesta($idRespuesta, $respuesta) {
        
        $this->db->set('respuesta', $respuesta['respuesta']);
        $this->db->where('id_respuesta', $idRespuesta);
        $this->db->update('pregunta');
        
    }
    
    
    public function eliminar_respuesta($id) {
        $this->db->delete('respuesta', array('id_respuesta' => $id));
    }
        
            
    
    
}
