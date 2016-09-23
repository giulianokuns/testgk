<?php if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script'); 

class Personaslib
{
    
    function __construct()
    {
        $this->CI=& get_instance();
        $this->CI->load->model('personasModel');
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
    function agregarPersona ($nombre, $apellido, $ci, $tel, $pass, $actividad)
    {
        $this->CI->personasModel->agregarPersona($nombre, $apellido, $ci, $tel, $pass, $actividad);
    }

    /**
    *   Obtiene todas las personas
    *
    *   @return array
    */
    function obtenerPersona()
    {
        $result = $this->CI->personasModel->obtenerPersona();
        return $result;
    }
        //asdsadd
    /**
    *   @return int
    *   @param string user 
    *   @param string pass
    */
    function login ($user, $pass)
    {    
        $resultado = $this->CI->personasModel->login($user, $pass);
        return $resultado;
    }

    /**
    *   Cambia la actividad de una persona
    *
    *   @param string ci
    *   @param int activity
    *   @return int
    */
    function changeActivity($ci, $activity){
        if ($activity == 1) {
            $activity = 0;
        } else {
            $activity = 1;
        }

        $result = $this->CI->personasModel->changeActivity($ci, $activity);
        if ($result == 1) {
            if ($activity == 0) {
                return 1;
            } else {
                return 0;
            }
        }
    }
    
}
