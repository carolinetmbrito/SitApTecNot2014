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
        $email = $this->security->xss_clean($this->input->post('email'));
        $senha = $this->security->xss_clean($this->input->post('senha'));
        
        $this->db->where('email', $email);
        $this->db->where('senha', $senha);
        
        $query = $this->db->get('usuario');
        if($query->num_rows == 1)
            
        {
            
            $row = $query->row();
            
            
            $data = array(
                    'idusuario' => $row->idusuario,
                    'nome' => $row->nome,
                    'email' => $row->email,
                    'senha' => $row->senha,
                    'validated' => true
                    );
            
            $this->session->set_userdata($data);
           
            
            return true;
        }
        return false;
    }

    function inserir($data) {
        
        $this->db->insert('usuario', $data);
        return true;
    }

    function listar() {
        $query = $this->db->get('usuario');
        return $query->result();
    }

    function editar($idusuario) {
        $this->db->where('idusuario', $idusuario);
        $query = $this->db->get('usuario');
        return $query->result();
    }

    function atualizar($data) {
        $this->db->where('idusuario', $data['idusuario']);
        $this->db->set($data);
        return $this->db->update('usuario');
    }

    function deletar($idusuario) {
        $this->db->where('idusuario', $idusuario);
        return $this->db->delete('usuario');
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