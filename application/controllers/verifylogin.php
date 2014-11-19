<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

 function __construct(){
   parent::__construct();
   $this->load->model('musuario','',TRUE);
 }

 function index(){
   $this->load->library('form_validation');

   $this->form_validation->set_rules('email', 'E-mail', 'trim|required|xss_clean');
   $this->form_validation->set_rules('senha', 'Senha',  'trim|required|xss_clean|callback_check_dados');

   if($this->form_validation->run() == FALSE){
     $this->load->view('home');
   } else {
     redirect(//'area_restrita',
             'refresh');
   }
 }

 function check_dados($senha){
   $email = $this->input->post('email');
   $result = $this->musuario->login($email, $senha);

   if($result){
     $sess_array = array();
     foreach($result as $row){
       $sess_array = array(
         'id'           => $row->idusuario,
         'nome'         => $row->nome,
         'tipo_usuario' => $row->tipo_usuario
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
