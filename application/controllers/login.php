<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class login extends CI_Controller {


 
public function index()
{
 	$this->load->library('Layout');
 	$this->layout->setTitulo('Login');

 	//Agregamos CSS y JS
 	$this->layout->add_css('assets/css/semantic.css');
 	$this->layout->add_js('assets/js/jquery.min.js'); 	
 	$this->layout->add_js('assets/js/semantic.js');
 	$this->layout->add_js('assets/components/sidebar.js');
	$this->layout->add_css('assets/components/grid.css');
	$this->layout->add_css('assets/components/icon.css');
	$this->layout->add_css('assets/components/divider.css');
	 	//COMPONETES GENERALES DE LA PAGINA CON SEMANIC UI
	$this->layout->add_css('assets/components/reset.css');
	$this->layout->add_css('assets/components/site.css');
	$this->layout->add_css('assets/components/container.css');
	$this->layout->add_css('assets/components/header.css');
	$this->layout->add_css('assets/components/image.css');
  	$this->layout->add_css('assets/components/menu.css');
	$this->layout->add_css('assets/components/divider.css');
	$this->layout->add_css('assets/components/dropdown.css');
	$this->layout->add_css('assets/components/segment.css');
	$this->layout->add_css('assets/components/button.css');
	$this->layout->add_css('assets/components/list.css');
	$this->layout->add_css('assets/components/sidebar.css');
	$this->layout->add_css('assets/components/transition.css');






 	

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
      redirect('home', 'refresh');


     //$this->load->view('home_view', $data);
   }
   else
   {
     //Si no existe la sesión redirecciona al login
     //redirect('login', 'refresh');
   	$data = array();
 	$this->load->library('form_validation');
 	$this->layout->view('log',$data);
   }
 

   


}

 
 



}
