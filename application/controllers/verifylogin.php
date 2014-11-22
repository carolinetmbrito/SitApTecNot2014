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
   

   if($this->form_validation->run() == FALSE){
     $this->load->view();
     echo 'voce nao conseguiu, voce esta no verifylogin';
   } else {
       echo 'voce conseguiu você está no verifylogin';
     //redirect(//'area_restrita','refresh');
   }
 }

 function check_dados($senha){
   $email = $this->input->post('email');
   $result = $this->Musuario->login($email, $senha);

   if($result){
     $sess_array = array();
     foreach($result as $row){
       $sess_array = array(
         'id' => $row->idusuario,
         'email'     => $row->email
       );
       $this->session->set_userdata($sess_array);
     }
     return true;
   } else {
     $this->form_validation->set_message('check_database', 'Email ou senha incorretos');
     return false;
   }
 }
}
