<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Spkriteria extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->model('model');
        $this->load->helper('form','url');
         $this->session_data = $this->session->userdata('session_data');
        if ($this->session_data['status'] != "YA"){
               redirect('login');
        }
    }

    public function index(){

        $data['title'] = 'Perbandingan Kriteria';
        $data['page'] = 'contents/spkriteria/index';
        $data['aksi'] = 'aksi_edit';

        $data['kterpilih'] = $this->model->get_all('skripsi_kriteria_terpilih', 'asc');

        $data['data'] = $this->model->get_all('skripsi_perbandingankriteria');
        // print_r($data['data']);

        $this->load->view('app.php', $data);
    }

    public function proses(){
        $q = $this->db->query("SELECT c1_1, c1_2, c1_3, c1_4, c1_5, c2_1, c2_2, c2_3, c2_4, c3_1, c3_2, c3_3, c4_1, c4_2, c5_1 FROM skripsi_nilaikriteria")->row();

        $this->model->deleteall("skripsi_perbandingankriteria");
        for($i = 1; $i <= 6; $i++){
            if($i == 1){
                $data['kriteria'] = "c1";
                $data['c1'] = 1;
                $data['c2'] = $q->c1_1;
                $data['c3'] = $q->c1_2;
                $data['c4'] = $q->c1_3;
                $data['c5'] = $q->c1_4;
                $data['c6'] = $q->c1_5;
                $this->model->get_insert("skripsi_perbandingankriteria",$data);
            }else if($i == 2){
                $data['kriteria'] = "c2";
                $data['c1'] = 1/$q->c1_1;
                $data['c2'] = 1;
                $data['c3'] = $q->c2_1;
                $data['c4'] = $q->c2_2;
                $data['c5'] = $q->c2_3;
                $data['c6'] = $q->c2_4;
                $this->model->get_insert("skripsi_perbandingankriteria",$data);
            }else if($i == 3){
                $data['kriteria'] = "c3";
                $data['c1'] = 1/$q->c1_2;
                $data['c2'] = 1/$q->c2_1;
                $data['c3'] = 1;
                $data['c4'] = $q->c3_1;
                $data['c5'] = $q->c3_2;
                $data['c6'] = $q->c3_3;
                $this->model->get_insert("skripsi_perbandingankriteria",$data);
            }else if($i == 4){
                $data['kriteria'] = "c4";
                $data['c1'] = 1/$q->c1_3;
                $data['c2'] = 1/$q->c2_2;
                $data['c3'] = 1/$q->c3_1;
                $data['c4'] = 1;
                $data['c5'] = $q->c4_1;
                $data['c6'] = $q->c4_2;
                $this->model->get_insert("skripsi_perbandingankriteria",$data);
            }else if($i == 5){
                $data['kriteria'] = "c5";
                $data['c1'] = 1/$q->c1_4;
                $data['c2'] = 1/$q->c2_3;
                $data['c3'] = 1/$q->c3_2;
                $data['c4'] = 1/$q->c4_1;
                $data['c5'] = 1;
                $data['c6'] = $q->c5_1;
                $this->model->get_insert("skripsi_perbandingankriteria",$data);
            }else if($i == 6){
                $data['kriteria'] = "c6";
                $data['c1'] = 1/$q->c1_5;
                $data['c2'] = 1/$q->c2_4;
                $data['c3'] = 1/$q->c3_3;
                $data['c4'] = 1/$q->c4_2;
                $data['c5'] = 1/$q->c5_1;
                $data['c6'] = 1;
                $this->model->get_insert("skripsi_perbandingankriteria",$data);
            }
        }

        $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data Perbandingan diperbaharui</div>");
       
       redirect("spkriteria");
    }

    
}