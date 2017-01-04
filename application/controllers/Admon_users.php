<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class admon_users extends CI_Controller {
 
function __construct()
{
        parent::__construct();
 
$this->load->database();
$this->load->library('grocery_CRUD');// Aqui cargo las librerias para que funcionen correctamente los objetos instanciados 
}
 
public function index()
{
$this->usuarios();
}

public function usuarios()
{

if ($this->session->userdata('logged_in')) {


	$crud = new grocery_CRUD();// Aqui se crea el objeto
	$crud->set_subject('Usuarios');
	$crud->set_model('custom_query_model');
	$crud->set_table('users');// Aqui se referencia la tabla de la base de datos que alimentara al objeto
	$crud->basic_model->set_query_str('SELECT * FROM users');
	$crud->display_as('username','Usuario');
	$crud->display_as('password','Contraseña');
	$crud->required_fields('username','password');
	$crud ->unset_read();
	//$crud->set_field_upload('password','assets/uploads/files');

	$crud->callback_before_insert(array($this,'encriptar_password'));
	$crud->callback_before_update(array($this,'encriptar_password'));

	$crud->callback_edit_field('password',array($this,'decrypt_password_callback'));


$crud->set_crud_url_path(site_url('admon_users/usuarios'));
	//$crud->set_crud_url_path(site_url('admon_users/users'));

$output = $crud->render();// Aqui se hace uso de el metodo render para crear la vista a partir del modelo (application/models/Grocery_crud_model.php) y se mete el resultado del redenderizado a la variable $output

$this->salida_Output($output);// Aqui se hace uso de la funcion salida_Output para enviar el objeto a la vista con la misma mecanica tradicional de code igniter de enviar objetos y vaiables a las vistas
// ------------------Aqui termina el proceso de creacion de la vista a partir del modelo----------------------------
}
else
   {
     //Si no existe la sesión redirecciona al login
     redirect('verifylogin', 'refresh');
   }


}

function encriptar_password($post_array) {
$this->load->library('encrypt');
$key = 'password';
$post_array['password'] = $this->encrypt->encode($post_array['password'], $key);
 
return $post_array;
//return $this->db->insert('users',$post_array);
}  

function decriptar_password($post_array) {
$this->load->library('encrypt');
$key = 'password';
$post_array['password'] = $this->encrypt->decode($post_array['password'], $key);
 
//return $post_array;

} 

function decrypt_password_callback($value)
{
  $this->load->library('encrypt');
  $key = 'password';
  $decrypted_password = $this->encrypt->decode($value, $key);
  return "<input class='form-control' type='text' name='password' value='$decrypted_password' />";
}    

function salida_Output($output = null)
{
//$this->load->view('general/header.php');   	//en esta linea se carga la seccion del header para todas las vistas que sean generadas usando esta función 
$this->load->view('general/navbar.php');
$this->load->view('crud_template.php',$output); //Aquí se carga la vista de la carpeta views y se envia adicionalmente la variable que contiene el redenderizado del objeto $crud para meterlo en la vista
//$this->load->view('general/footer.php');  //Aqui cargo el pie de pagina    
}

}
