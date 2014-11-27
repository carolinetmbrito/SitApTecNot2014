<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class noticia extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mnoticia');
        
    }

    function index() {
        
    }

    public function novaNoticia() {
        $data['titulo'] = $this->input->post('titulo');
        $data['texto'] = $this->input->post('texto');
        $data['idusuario'] = $this->session->userdata('idusuario');
        $data['dtCriacao'] = date('Y-m-d H:i:s');
        
        if($this->mnoticia->inserir($data))
        {
            echo 'POSTADO COM SUCESSO';
        }
        else
        {
            echo 'erro';
        }
    }

}
