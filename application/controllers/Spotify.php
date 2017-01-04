<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Spotify extends CI_Controller {
 
public function index()
{
 	$this->load->library('Layout');
 	$this->layout->setTitulo('Inicio');
 	//Agregamos CSS y JS
 	//$this->layout->add_css('assets/css/bootstrap.min.css');
 	//$this->layout->add_css('assets/css/material-kit.css');
 	//$this->layout->add_js('assets/js/jquery.min.js');
 	//$this->layout->add_js('assets/js/bootstrap.min.js');
 	//$this->layout->add_js('assets/js/material.min.js');
 	//$this->layout->add_js('assets/js/nouislider.min.js');
 	//$this->layout->add_js('assets/js/bootstrap-datepicker.js');
 	//$this->layout->add_js('assets/js/material-kit.js');
 	$this->layout->add_css('assets/css/semantic.css');
 	$this->layout->add_js('assets/js/jquery.min.js'); 	
 	//$this->layout->add_js('assets/js/semantic.js');
 	$this->layout->add_js('assets/components/sidebar.js');
 	//$this->layout->add_css('assets/components/menu.css');



// 	$this->layout->add_js('assets/components/visibility.js');
 	
// 	$this->layout->add_js('assets/components/transition.js');
 	//COMPONETES GENERALES DE LA PAGINA CON SEMANIC UI
//	$this->layout->add_css('assets/components/reset.css');
//	$this->layout->add_css('assets/components/site.css');
//	$this->layout->add_css('assets/components/container.css');
	$this->layout->add_css('assets/components/grid.css');
//	$this->layout->add_css('assets/components/header.css');
//	$this->layout->add_css('assets/components/image.css');
	
//	$this->layout->add_css('assets/components/divider.css');
//	$this->layout->add_css('assets/components/dropdown.css');
//	$this->layout->add_css('assets/components/segment.css');
//	$this->layout->add_css('assets/components/button.css');
//	$this->layout->add_css('assets/components/list.css');
	$this->layout->add_css('assets/components/icon.css');
//	$this->layout->add_css('assets/components/sidebar.css');
//	$this->layout->add_css('assets/components/transition.css');




 	$data = array();


 	$this->layout->view('spotify_view',$data);


}



}
