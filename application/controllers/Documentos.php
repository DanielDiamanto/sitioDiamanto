<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class documentos extends CI_Controller {
 
function __construct()
{
        parent::__construct();
 
$this->load->database();
$this->load->library('grocery_CRUD');// Aqui cargo las librerias para que funcionen correctamente los objetos instanciados 
}
 
public function index()
{
$this->documentos();
}

public function documentos()
{

if ($this->session->userdata('logged_in')) {


	$crud = new grocery_CRUD();// Aqui se crea el objeto
	$crud->set_subject('Documentos');
	//$crud->set_model('custom_query_model');
	$crud->set_table('Documentos');// Aqui se referencia la tabla de la base de datos que alimentara al objeto
	$crud->callback_add_field('Relevancia',array($this,'select'));
	$crud->callback_edit_field('Relevancia',array($this,'select'));
	
	$crud->required_fields('Nombre','Relevancia', 'PDF');
	
	$crud->set_field_upload('PDF','assets/uploads/files');



$crud->set_crud_url_path(site_url('documentos/documentos'));
	

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

function salida_Output($output = null)
{
//$this->load->view('general/header.php');   	//en esta linea se carga la seccion del header para todas las vistas que sean generadas usando esta función 
$this->load->view('general/navbar.php');
$this->load->view('crud_template.php',$output); //Aquí se carga la vista de la carpeta views y se envia adicionalmente la variable que contiene el redenderizado del objeto $crud para meterlo en la vista
//$this->load->view('general/footer.php');  //Aqui cargo el pie de pagina    
}

function select($value = '', $primary_key = null)
{
return '
	<select  name="Relevancia">  
	  	<option value="">Seleccione un valor</option> 
		<option value="Importante">Importante</option>    
		<option value="Común">Común</option>    
		<option value="No relevante">No relevante</option>
		</select>
 ';
}

}
