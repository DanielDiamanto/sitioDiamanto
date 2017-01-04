<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->library('form_validation');
   $this->load->model('user','',TRUE);
 }

 function index()
 {
   //This method will have the credentials validation
   

   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
$this->form_validation->set_rules('g-recaptcha-response', 'Captcha', 'trim|required|xss_clean');

   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     redirect('Home', 'refresh');
     }

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page

  $this->load->library('Layout');
  $this->layout->setTitulo('Login');
  //Agregamos CSS y JS
  $this->layout->add_css('assets/css/semantic.css');
  $this->layout->add_js('assets/js/jquery.min.js');   
  $this->layout->add_js('assets/js/semantic.js');
  $this->layout->add_js('assets/components/sidebar.js');
  $this->layout->add_css('assets/components/grid.css');
  $this->layout->add_css('assets/components/icon.css');
  $data = array();
  $this->load->library('form_validation', 'session');
  $this->layout->view('log',$data);
   }
   else 
   {
     //Saltar login
     redirect('Home', 'refresh');
   }

 }

function check_database($password)
 {


   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');
   //$password=$this->encriptar_password($password);
   //query the database

   $result = $this->user->login($username, $password);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'username' => $row->username
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Contraseña o Usuario inválido');
     return false;
   }
 }

}
?>