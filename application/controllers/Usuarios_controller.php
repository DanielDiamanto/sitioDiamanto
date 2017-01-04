<?php
                        //extendemos CI_Controller
class usuarios_controller extends CI_Controller{
    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct(); 
         
        //llamo al helper url
        $this->load->helper("url");  
         
        //llamo o incluyo el modelo
        $this->load->model("usuarios_model");
         
        //cargo la libreria de sesiones
        $this->load->library("session");
        $this->load->library('form_validation');
    }
     
    //controlador por defecto
    public function index(){
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|callback_add');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|');
         
        //array asociativo con la llamada al metodo
        //del modelo
        //$usuarios["ver"]=$this->usuarios_model->ver();
         
        //cargo la vista y le paso los datos
        //$this->load->view("usuarios_view",$usuarios);

        
            $this->load->library('Layout');
          $this->layout->setTitulo('Registro');
          //Agregamos CSS y JS
          $this->layout->add_css('assets/css/semantic.css');
          $this->layout->add_js('assets/js/jquery.min.js');   
          $this->layout->add_js('assets/js/semantic.js');
          $this->layout->add_js('assets/components/sidebar.js');
          $this->layout->add_css('assets/components/grid.css');
          $this->layout->add_css('assets/components/icon.css');
          $data = array();
          $this->load->library('form_validation', 'session');
          $this->layout->view('usuarios_view',$data);

        
          


    }
     
    //controlador para añadir
    public function add(){
         
        //compruebo si se a enviado submit
        if($this->input->post("submit")){

         
        //llamo al metodo add
        $add=$this->usuarios_model->add(
                $this->input->post("username"),
                $this->input->post("password")
                );
        }
        if($add==true){
            //Sesion de una sola ejecución
            $this->session->set_flashdata('correcto', 'Usuario añadido correctamente');
            
        }else{
            $this->session->set_flashdata('incorrecto', 'El usuario ya existe');
            
        
        }
         
        //redirecciono la pagina a la url por defecto
         redirect(base_url('verifylogin'));
    }

    

  
     
    
}
?>