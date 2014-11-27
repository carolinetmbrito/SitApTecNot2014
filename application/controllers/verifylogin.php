<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

 function __construct(){
   parent::__construct();
   $this->load->model('Musuario','',TRUE);
 }

 function index(){
   $this->load->library('form_validation');
   $this->form_validation->set_rules('email', 'E-mail', 'required');
   $this->form_validation->set_rules('senha', 'Senha',  'callback_check_dados', 'required');
   
   if($this->Musuario->login())
   {
       //echo 'Login realizado';
       
       redirect('arearestrita'); //chama outro controller
   }
   else
   {
       echo 'Login falhou burro!';
   }

/*   if($this->form_validation->run() == FALSE){
   //  $this->load->view('');
     echo 'voce nao conseguiu, voce esta no verifylogin';
   } else {
       echo 'voce conseguiu você está no verifylogin';
     //redirect(//'area_restrita','refresh');
   }*/
 }
}
