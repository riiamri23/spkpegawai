<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Batch extends CI_Controller {
    var $tabel= 'batch';
    var $tabel2 = 'calon_pegawai'; //variabel tabel 

    public function __construct() {
        parent::__construct();
        $this->load->model('model');
        $this->load->helper('form','url');
         $this->session_data = $this->session->userdata('session_data');
        if ($this->session_data['status'] != "YA"){
               redirect('login');
        }
    }

    // awal tampil index
    public function index() {
        $data['title'] = 'Data Calon Pegawai';
        $data['data'] = $this->model->get_all($this->tabel);
        // $this->load->view('vcalonpenerima', $data);
        $data['page'] = 'contents/batch/index';

        $this->load->view('app.php', $data);
    }

}