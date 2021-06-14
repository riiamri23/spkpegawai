<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Normalisasidata extends CI_Controller {
     var $tabel = 'hasil_normalisasi'; //variabel tabel 

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
        $data['title'] = 'Data Penerima Pegawai Ternormalisasi';
        $data['data'] = $this->model->get_all($this->tabel);
        // $this->load->view('vnormalisasidata', $data);

        $data['page'] = 'contents/normalisasi/index';
    
        $this->load->view('app.php', $data);
    }
}