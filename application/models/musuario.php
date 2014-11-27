<!-- http://www.codeproject.com/Articles/476944/Create-user-login-with-Codeigniter -->
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Musuario extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function login(){
        // grab user input
        $email = $this->security->xss_clean($this->input->post('email'));
        $senha = $this->security->xss_clean($this->input->post('senha'));
        
        // Prep the query
        $this->db->where('email', $email);
        $this->db->where('senha', $senha);
        
        // Run the query
        $query = $this->db->get('usuario');
        // Let's check if there are any results
        
        
        
        if($query->num_rows == 1)
        {
          
            // If there is a user, then create session data
            
            
            $row = $query->row();
            
            
            $data = array(
                    'idusuario' => $row->idusuario,
                    
                    'email' => $row->email,
                    'senha' => $row->senha,
                    'validated' => true
                    );
            
            $this->session->set_userdata($data);
           
            
            return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }
}
?>




<!-- http://www.iluv2code.com/login-with-codeigniter-php.html 
< ?php
Class Musuario extends CI_Model {

    function login($email, $senha) {
        $this->db->select('id, email, senha');
        $this->db->from('usuario');
        $this->db->where('email', ($email));
        $this->db->where('senha', ($senha));
        $this->db->limit(1);
        
        $query = $this->db->get('usuario');
        
        
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
}
?> -->
<!-- http://www.iluv2code.com/login-with-codeigniter-php.html -->