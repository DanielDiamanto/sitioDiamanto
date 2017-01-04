<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Custom_query_model extends grocery_CRUD_model {
 
	private  $query_str = ''; 
	function __construct() {
		parent::__construct();
	}
 
	function get_list() {
		$query=$this->db->query($this->query_str);
 
		$results_array=$query->result();
		
		//en la siguiente linea se obtiene el numero de resultados que se obtienen de la consulta
		$row = $query->num_rows();
		
		//en el siguiente ciclo se cuenta el numero de resultados de la consulta
		//y se retorna el valor de las contraseñas desencriptadas ya que recorre cada resultado de password
		
		for ($i=0; $i < $row; $i++) { 
			$query->row($i)->password = $this->decrypt_password_callback($query->row($i)->password);
		}
	
		return $results_array;		
	}
 
	public function set_query_str($query_str) {
		$this->query_str = $query_str;
	}

function decrypt_password_callback($value)
{
  $decrypted_password = $this->encrypt->decode($value);
  return $decrypted_password;
}

}