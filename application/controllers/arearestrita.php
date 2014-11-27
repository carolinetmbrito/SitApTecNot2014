<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class arearestrita extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {

        if ($this->session->userdata('idusuario') > -1) {
            //$this->load->view('areaRestrita'); // tu cria
            $this->load->view('home-header-logado'); // tu cria
            $this->load->view('home-logado'); // tu cria
            $this->load->view('home-footer'); // tu cria
        } else {
            $this->load->view('home-header'); // tu cria
            $this->load->view('home'); // tu cria
            $this->load->view('home-footer'); // tu cria
            
            echo "<p style='text-align:center;'>Você não está logado.</p>";
        }
    }

}
