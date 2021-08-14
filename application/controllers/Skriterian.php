<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Skriterian extends CI_Controller {

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

        $data['title'] = 'Kriteria Terpilih';
        $data['page'] = 'contents/skriterian/index';
        $data['aksi'] = 'aksi_edit';

        $data['data'] = $this->model->get_all('skripsi_kriteria_terpilih', 'asc');
        $data['dnilai'] = $this->model->get_where('skripsi_nilaikriteria', ["id"=> 1])[0];
        // $data['data'] = $this->model->get_all('skripsi_kriteria');
        // print_r($data['dnilai']);

        $this->load->view('app.php', $data);

    }
    public function form(){

        $mau_ke = $this->uri->segment(3);
        $idu = $this->uri->segment(4);
        $this->load->library('form_validation');

        if ($mau_ke == "aksi_edit") {
            
            $data = array(
                'c1_1'  => $this->input->post('c1_1'),
                'c1_2'  => $this->input->post('c1_2'),
                'c1_3'  => $this->input->post('c1_3'),
                'c1_4'  => $this->input->post('c1_4'),
                'c1_5'  => $this->input->post('c1_5'),
                'c2_1'  => $this->input->post('c2_1'),
                'c2_2'  => $this->input->post('c2_2'),
                'c2_3'  => $this->input->post('c2_3'),
                'c2_4'  => $this->input->post('c2_4'),
                'c3_1'  => $this->input->post('c3_1'),
                'c3_2'  => $this->input->post('c3_2'),
                'c3_3'  => $this->input->post('c3_3'),
                'c4_1'  => $this->input->post('c4_1'),
                'c4_2'  => $this->input->post('c4_2'),
                'c5_1'  => $this->input->post('c5_1')
            );
            // print_r($data);
            $this->model->get_update("skripsi_nilaikriteria","1",$data);
            $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Simpan</div>");
            redirect('skriterian/');

        }
    }



}