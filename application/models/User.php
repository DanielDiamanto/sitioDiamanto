<?php
Class User extends CI_Model
{
 function login($username, $password)
 {
   //$this -> db -> select('id, username, password');
  $this -> db -> select('id, username, password');
   $this -> db -> from('users');
   $this -> db -> where('username', $username);
   //$this -> db -> where('password', $password);
   //la line anterior se dejó de utilizar ya que consultando con el nombre de usuario retorna todos los datos del usuario
   //por lo que en las siguientes lineas se obtiene el valor de la contraseña retornado y se desencripta para ser comparado 
   //con el texto plano enviado por el usuario

   $this -> db -> limit(1);

   $query = $this -> db -> get();
   $enc_pass = $query->row()->password;
   $dec_pass = $this->decrypt_password_callback($enc_pass);


   if($query -> num_rows() == 1)
   {
    if($password==$dec_pass){
     return $query->result();
    }
   }
   else
   {
     return false;
   }
 }

 function decrypt_password_callback($value)
{
  $this->load->library('encrypt');
  $key = 'password';
  $decrypted_password = $this->encrypt->decode($value, $key);
  return $decrypted_password;
}


}
?>