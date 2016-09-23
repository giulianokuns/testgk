<?php 

    class Personas extends Controller
    {
        
        function __construct()
        {
            parent::__construct();
            $this->load->model('personasModel');
            $this->load->library('form_validation');
            $this->load->library('personaslib');
        }

        function index()
        {
         
            $data['titulo'] = "Lista de personas";
            $data['tituloAgr'] = "Agregar Personas";
            if (isset($_POST['agregar'])) {
               
                $config = array(
                        array(
                            'field' => 'nombre',
                            'label' => 'Nombre',
                            'rules' => 'trim|required|alpha|xss_clean'
                        ),
                        array(
                            'field' => 'apellido',
                            'label' => 'Apellido',
                            'rules' => 'trim|required|alpha|xss_clean'
                        ),
                        array(
                            'field' => 'ci',
                            'label' => 'Documento de identidad',
                            'rules' => 'trim|required|numeric|exact_length[8]|xss_clean'
                        ),
                        array(
                            'field' => 'tel',
                            'label' => 'Teléfono',
                            'rules' => 'trim|required|xss_clean'
                        ),
                        array(
                            'field' => 'pass',
                            'label' => 'Contraseña',
                            'rules' => 'trim|required|min_length[4]|md5|xss_clean'
                        )
                );

                $this->form_validation->set_message('required', 'El campo %s es requerido');
                $this->form_validation->set_message('alpha', 'El campo %s debe contener solo letras');
                $this->form_validation->set_message('numeric', 'El campo %s debe contener solo números');
                $this->form_validation->set_message('min_length', 'El campo %s debe tener mínimio %s caracteres');
                $this->form_validation->set_message('exact_length[8]', 'El campo %s tiene exactamente %s caracteres');

                $this->form_validation->set_rules($config);

                if ($this->form_validation->run()) 
                {
                    $nombre = $this->input->post('nombre');
                    $apellido = $this->input->post('apellido');
                    $ci = $this->input->post('ci');
                    $tel = $this->input->post('tel');
                    $pass = md5($this->input->post('pass'));
                    $actividadString = $this->input->post('actividad');
                    
                    if($actividadString == 'activo'){
                        $actividad = 1; //Activo 
                    } else {
                        $actividad = 0; //No activo
                    }
                    
                    $this->agregarPersona($nombre, $apellido, $ci, $tel, $pass, $actividad);
                } else {
                    $this->load->view('personas', $data);
                }


            } elseif (isset($_POST['listar'])) {
                $data['resultado'] = $this->personasModel->obtenerPersona();
                $this->load->view('listapersonas', $data);              
            } elseif (isset($_POST['cerrar'])) {
                $this->session->sess_destroy();
                $this->load->view('login', $data);
            } else {
                if ($this->session->userdata('logged_in')) {
                    $this->load->view('personas', $data);      
                } else {
                    $this->load->view('login', $data);
                }
            }
        }   
        //asdddddddddddddddddddddd
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
            $this->personaslib->agregarPersona($nombre, $apellido, $ci, $tel, $pass, $actividad);

            $data['resultado'] = $this->personaslib->obtenerPersona();
            $data['titulo'] = "Lista de personas";
            $data['tituloAgr'] = "Agregar Personas";
            $this->load->view('personas', $data);

        }
        /**
        *   @return void 
        */
        function login () 
        {  
            $data['titulo'] = "Lista de personas";
            $data['tituloAgr'] = "Agregar Personas";

            $user = $this->input->post('username');
            $pass = md5($this->input->post('pass_log'));
            $resultado = $this->personaslib->login($user, $pass);

            if ($resultado) {
                $this->load->view('personas', $data);
                $data = array(
                    'username' => $user,
                    'logged_in' => true
                );
                $this->session->set_userdata($data);
            } else {
                $data['error_pass'] = false;
                $this->load->view('login', $data);
            }
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
            $result = $this->personaslib->changeActivity($ci, $activity);
            echo $result; 
        }
}