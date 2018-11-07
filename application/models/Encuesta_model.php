<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Encuesta_model
 *
 * @author jean
 */
class Encuesta_model extends CI_Model {
    //put your code here
    
        
    function __construct() {
        $this->load->database();
    }
    
    public function get_encuesta($id = -1) {

        $this->db->select(" id_encuesta , fecha_creacion, fecha_termino, valor_base, nombre, estado, descripcion  ", FALSE);
        $this->db->from("encuesta e");
        $this->db->where('id_encuesta', $id);

        $query = $this->db->get();
        
        return $query->result_array();
    }
    
    
    public function agregar_encuesta($encuesta) {
        $this->db->insert('encuesta', $encuesta);
    }
    
      public function modificar_encuesta($id, $encuesta) {
        
        $this->db->set('estado', $encuesta['estado']);
        $this->db->set('descripcion', $encuesta['descripcion']);
        $this->db->set('nombre', $encuesta['nombre']);
        $this->db->set('valor_base', $encuesta['valor_base']);
        $this->db->set('fecha_termino', $encuesta['fecha_termino']);
        $this->db->where('id_encuesta', $id);
        $this->db->update('encuesta');
        
    }
    
    
    public function eliminar_encuesta($id) {
        $this->db->delete('encuesta', array('id_encuesta' => $id));
    }
        
            
    
}
