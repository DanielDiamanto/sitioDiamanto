<?php
class contacto extends CI_Controller {
   public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }
     
   public function index(){ 

    if($this->session->userdata('logged_in'))
   {
      $this->load->library('Layout');
      $this->layout->setTitulo('Inicio');
      $this->layout->add_css('assets/css/semantic.css');
      $this->layout->add_js('assets/js/jquery.min.js');   
      $this->layout->add_js('assets/components/sidebar.js');
      $this->layout->add_css('assets/components/grid.css');
      $this->layout->add_css('assets/components/icon.css');

        $data = array();


      $this->layout->view('contacto_view',$data);

      }
   else
   {
     //Si no existe la sesión redirecciona al login
     redirect('verifylogin', 'refresh');
   }
      
   }
    
   public function enviar(){
      /*
       * Cuando cargamos una librería
       * es similar a hacer en PHP puro esto:
       * require_once("libreria.php");
       * $lib=new Libreria();
       */
        
       //Cargamos la librería email
       $this->load->library('email');
        
       /*
        * Configuramos los parámetros para enviar el email,
        * las siguientes configuraciones es recomendable
        * hacerlas en el fichero email.php dentro del directorio config,
        * en este caso para hacer un ejemplo rápido lo hacemos 
        * en el propio controlador
        */
       
      $configGmail = array(
      'protocol' => 'smtp',//Protocolo de envio de mensaje
      'smtp_host' => 'ssl://smtp.gmail.com', //El servidor de correo que utilizaremos
      'smtp_port' => 465,//El puerto que utilizará el servidor smtp
      'smtp_user' => 'diamanto@diamanto.esy.es',//Un correo como referencia
      'smtp_pass' => 'whitebull901',//La contraseña de la cuenta
      'mailtype' => 'html',
      'charset' => 'utf-8',
      'newline' => "\r\n"
    );    



$email = $_POST['email'];//Quien envia
                 $dest = $_POST['des'];//Destinatario
                 $subj = $_POST['subject'];//Cabeza de mensaje
                 $mensaje = $_POST['mensaje'];//Cuerpo de mensaje






      //Establecemos esta configuración
        //$this->email->initialize($configGmail);
 
      //Ponemos la dirección de correo que enviará el email y un nombre
        $this->email->from('diamanto@diamanto.esy.es', 'Sitio Diamanto');
         
      /*
       * Ponemos el o los destinatarios para los que va el email
       * en este caso al ser un formulario de contacto te lo enviarás a ti
       * mismo
       */
        //$this->email->to('qoi.951@gmail.com', 'Sitio Diamanto');
$this->email->to("$dest");
         
      //Definimos el asunto del mensaje
        //$this->email->subject($this->input->post("asunto"));
$this->email->subject("$subj");
         
      //Definimos el mensaje a enviar
        //$this->email->message("Email: ".$this->input->post("email")." Mensaje: ".$this->input->post("mensaje"));

$this->email->message($mensaje);
//        $this->email->send();
         
        //Enviamos el email y si se produce bien o mal que avise con una flasdata
        if($this->email->send()){
            $this->session->set_flashdata('envio', 'Email enviado correctamente');
        }else{
            $this->session->set_flashdata('envio', 'No se a enviado el email');
        }
         
        redirect(base_url("contacto"));
   }    
}
 
?>	