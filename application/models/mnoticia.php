<!-- http://www.codeproject.com/Articles/476944/Create-user-login-with-Codeigniter -->
<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */

class mnoticia extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($data) {
        return $this->db->insert('noticia', $data);
    }

    function listar() {
        $query = $this->db->get('noticia');
        return $query->result();
    }

    function editar($idnoticia) {
        $this->db->where('idnoticia', $idnoticia);
        $query = $this->db->get('noticia');
        return $query->result();
    }

    function atualizar($data) {
        $this->db->where('idnoticia', $data['idnoticia']);
        $this->db->set($data);
        return $this->db->update('noticia');
    }

    function deletar($idnoticia) {
        $this->db->where('idnoticia', $idnoticia);
        return $this->db->delete('noticia');
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