<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hasilperangkingan extends CI_Controller {
     var $tabel = 'hasil_perangkingan'; //variabel tabel 
     var $tabelBatch = 'batch';

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
        $batch = $this->input->get('batch');
        if($batch == null){
            $batch = 1;
        }
        $data['title'] = 'Data Hasil Perangkingan';
        $data['data'] = $this->model->getdatarangkingawal($batch);
        // $data['datahasil']= $this->model->gethasilperangkingan($batch);
        $data['batches'] = $this->model->get_all($this->tabelBatch);
        // $this->load->view('vhasilperangkingan', $data);
        // var_dump($data['data']);
        $data['page'] = 'contents/hasilperangkingan/index';
    
        $this->load->view('app.php', $data);
    }
   
   

}
