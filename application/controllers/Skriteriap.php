<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Skriteriap extends CI_Controller {

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
        $data['page'] = 'contents/skriteriap/index';
        $data['aksi'] = 'aksi_edit';

        $data['kterpilih'] = $this->model->get_all('skripsi_kriteria_terpilih', 'asc');
        $data['data'] = $this->model->get_all('skripsi_kriteria');
        // print_r($data['data']);

        $this->load->view('app.php', $data);
    }

    public function form(){

        $mau_ke = $this->uri->segment(3);
        $idu = $this->uri->segment(4);
        $this->load->library('form_validation');

        if ($mau_ke == "aksi_edit") {
            // print_r($this->input->post('kriteria'));
            foreach($this->input->post('kriteria') as $key =>$val){
                $this->form_validation->set_rules('kriteria[' . $key . ']', 'kriteria[' . $key . ']', 'is_unique[skripsi_kriteria_terpilih.id_kriteria]');

                $data = array(
                    'id_kriteria'       => $val,
                );

                $this->model->get_update('skripsi_kriteria_terpilih', $key, $data);
            }
            // $this->model->get_update('skripsi_subkriteria',$this->input->post('id'), $data);
            $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Updsate</div>");
            redirect('skriteriap');

        }

    }
}