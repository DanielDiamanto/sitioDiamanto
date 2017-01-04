<?php
               //extendemos CI_Model
class usuarios_model extends CI_Model{
    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct(); 
        $this->load->library('encrypt');
         
        //cargamos la base de datos
        $this->load->database();
    }
     
    public function ver(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM users;");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
     
    public function add($username,$password){
        $consulta=$this->db->query("SELECT username FROM users WHERE username LIKE '$username';");
        if($consulta->num_rows()==0){
            //en la siguiente linea se usa la funcion enc para encriptar la contraseña, la libreria de encriptacion se encuentra en el autoload y la llave de encriptacion en el config, por lo cual no esta en la función
            $password=$this->enc($password);
            
            $consulta=$this->db->query("INSERT INTO users VALUES(NULL,'$username','$password');");
            if($consulta==true){
              return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

//La siguiente funcion encripta la contraseña tratandola como un arreglo por cada caracter por lo que devolverá solo el primer caracter encriptado al usarse
    function encriptar_password($post_array) {
$this->load->library('encrypt');
$key = 'password';
$post_array['password'] = $this->encrypt->encode($post_array['password'], $key);
 
return $post_array;
//return $this->db->insert('users',$post_array);
}
// En la siguiente funcion se encripta la contraseña tratándose como una cadena 
function enc($value)
{
  $contEnc = $this->encrypt->encode($value);
  return $contEnc;
}
 
 
}
?>