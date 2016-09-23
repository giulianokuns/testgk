<?php

    class PersonasModel extends Model
    {
        
        function __construct()
        {   
           
            parent::__construct();    
            $this->load->database();
        }

        /**
        *   Agrega una persona a la BD.
        *   
        *   @param string $nombre
        *   @param string $apellido
        *   @param string $ci
        *   @param string $tel
        *   @param string $pass
        *   @param string $actividad
        *   @return void 
        */
        function agregarPersona($nombre, $apellido, $ci, $tel, $pass, $actividad)
        {

            $data = array(
                "nombre" => $nombre,
                "apellido" => $apellido,
                "ci" => $ci,
                "tel" => $tel,
                "pass" => $pass,
                "activo" => $actividad
            );
            
            $this->db->insert('personas', $data);
            
        }

        /**
        *   Obtiene todas las personas
        *
        *   @return array
        */
        function obtenerPersona()
        {
            $query = $this->db->get('personas');
            if ($query->num_rows() != 0) {
                return $query->result_array();
            }   
        }

        /**
        *   @return int 
        *   @param string nombre
        *   @param string pass
        */
        function login ($nombre, $pass)
        {
            $data = array("nombre" => $nombre, "pass" => $pass);
            $query = $this->db->get_where('login', $data);
            return ($query->num_rows() == 1);
        }

        /**
        *   Cambia la actividad de una persona
        *
        *   @param string ci
        *   @param int activity
        *   @return int
        */
        function changeActivity($ci, $activity)
        {  
            $data = array('activo' => $activity);
            $this->db->where('ci', $ci);    
            $this->db->update('personas', $data);

            return ($this->db->affected_rows());
        }
    }




