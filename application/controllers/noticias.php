<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class noticia extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mnoticia');
        //Definir o timezone - Fuso Horário
        date_default_timezone_set('America/Sao_Paulo');
    }
    
  function index() {
        $data['titulo'] = "CRUD com CodeIgniter | Cadastro de Noticias";
        /**
         * Lista todos os registros da tabela noticias
         */
        $data['noticias'] = $this->mnoticias->listar();
        /**
         * Carrega a view
         */
        //$this->load->view('usuarios_view.php', $data);
        $this->load->view('home-header');
        $this->load->view('home', $data);
        $this->load->view('home-footer');
    }
    
    public function info() {
        phpinfo();
        exit();
    }
    
    public function novaNoticia() {
        $data['titulo'] = $this->input->post('titulo');
        $data['texto'] = $this->input->post('texto');
        $data['idusuario'] = $this->session->userdata('idusuario');
        $data['dtCriacao'] = date('Y-m-d H:i:s');

        /* Chama a função inserir do modelo */
        if ($this->mnoticia->inserir($data)) {
            redirect('noticias');
        } else {
            log_message('error', 'Erro ao inserir a noticia.');
        }
    }


    function editar($id) {

        /* Aqui vamos definir o título da página de edição */
        $data['titulo'] = "CRUD com CodeIgniter | Editar Noticia";

        /* Busca os dados da usuario que será editada (id) */
        $data['dados_noticia'] = $this->mnoticia->editar($id);
        /**
         * debug is on the table
         */
        /*
          echo "<pre>";
          var_dump($data);
          echo "</pre>";
          die();
         * 
         */

        /* Carrega a página de edição com os dados da noticia */
        $this->load->view('home-header-logado');
        $this->load->view('home-edit-noticia', $data);
        $this->load->view('home-footer');
    }

    function atualizar() {

        /* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */
        $this->load->library('form_validation');

        /* Define as tags onde a mensagem de erro será exibida na página */
        $this->form_validation->set_error_delimiters('<span>', '</span>');

        /* Aqui estou definindo as regras de validação do formulário, assim como 
          na função inserir do controlador, porém estou mudando a forma de escrita */
        $validations = array(
            array(
                'field' => 'nome',
                'label' => 'Nome',
                'rules' => 'trim|required|max_length[40]'
            ),
            array(
                'field' => 'email',
                'label' => 'E-mail',
                'rules' => 'trim|required|valid_email|max_length[100]'
            )
        );
        $this->form_validation->set_rules($validations);

        /* Executa a validação... */
        if ($this->form_validation->run() === FALSE) {
            /* Caso houver erro chama função editar do controlador novamente */
            $this->editar($this->input->post('idnoticia'));
        } else {
            /* Senão obtém os dados do formulário */
            $data['idnoticia'] = $this->input->post('idnoticia');
            $data['titulo'] = $this->input->post('titulo');
            $data['texto'] = $this->input->post('texto');

            //Pegando a data de atualização
            $data['dtatualizacao'] = date('Y-m-d H:i:s');

            /* Executa a função atualizar do modelo passando como parâmetro os dados obtidos do formulário */
            if ($this->mnoticia->atualizar($data)) {
                /* Caso sucesso ao atualizar, recarrega a página principal */
                redirect('noticias');
            } else {
                /* Senão exibe a mensagem de erro */
                log_message('error', 'Erro ao atualizar a noticia.');
            }
        }
    }

    function deletar($idnoticia) {

        /* Executa a função deletar do modelo passando como parâmetro o id da usuario */
        if ($this->mnoticia->deletar($idnoticia)) {
            /* Caso sucesso ao atualizar, recarrega a página principal */
            redirect('noticias');
        } else {
            /* Senão exibe a mensagem de erro */
            log_message('error', 'Erro ao deletar a noticia.');
        }
    }

    /**
     * Converte uma data padrão brasileiro DD/MM/AAAA
     * para o padrão MySQL AAAA-MM-DD 
     * @param date $databrasileira
     * @return date
     */
    private function converterDataParaMySql($databrasileira) {
        $data = explode('/', $databrasileira);
        $data = array_reverse($data);
        $dataMySQL = implode('-', $data);
        return $dataMySQL;
    }

    /**
     * Converte uma data padrão MySQL AAAA-MM-DD
     * para o padrão brasileiro DD/MM/AAAA
     * @param date $dataMySQL
     * @return date
     */
    private function converteDataParaPadraoBrasileiro($dataMySQL) {
        $data = explode('-', $dataMySQL);
        $data = array_reverse($data);
        $dataBrasileira = implode('/', $data);
        return $dataBrasileira;
    }

}
