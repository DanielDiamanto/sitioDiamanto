<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Home extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function index()
 {
  //Esta condicion verifica la variable de sesión para comprobar si se ha autenticado o no
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     

      $this->load->library('Layout');
      $this->layout->setTitulo('Home');
      //Agregamos CSS y JS
      $this->layout->add_css('assets/css/semantic.css');
      $this->layout->add_js('assets/js/jquery.min.js');   
      $this->layout->add_js('assets/js/semantic.js');
      $this->layout->add_js('assets/components/sidebar.js');
      $this->layout->add_css('assets/components/grid.css');
      $this->layout->add_css('assets/components/icon.css');
      $data = array();

      
      $data['username'] = $session_data['username'];
      $this->layout->view('home_view',$data);


     //$this->load->view('home_view', $data);
   }
   else
   {
     //Si no existe la sesión redirecciona al login
     redirect('verifylogin', 'refresh');
   }
 }

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('Main', 'refresh');
 }

}

?>