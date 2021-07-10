<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Skripsikriteria extends CI_Controller {

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
        
        $data['title'] = 'Kriteria';
        $data['page'] = 'contents/skripsikriteria/index';

        $data['data'] = $this->model->get_all('skripsi_kriteria');
        
        // print_r($data['data']);

        $this->load->view('app.php', $data);
    }

    public function form(){
        // ambil variable url
        $mau_ke = $this->uri->segment(3);
        $idu = $this->uri->segment(4);
        
        // ambil variabel dari form
        $kriteria = $this->input->post('kriteria');
        if ($mau_ke == "add") {
            $data['title'] = 'Tambah Kriteria';
            $data['aksi'] = 'aksi_add';
            $data['page'] = 'contents/skripsikriteria/form';
    
            $this->load->view('app.php', $data);
        } 
        elseif ($mau_ke == "edit") {
            $data['title'] = 'Edit Kriteria';
            $data['aksi'] = 'aksi_edit';
            $data['page'] = 'contents/skripsikriteria/form';
            
            $data['data'] = $this->model->get_byid('skripsi_kriteria',$idu)[0];
    
            $this->load->view('app.php', $data);

        }
        elseif ($mau_ke == "aksi_add") {
            $data = array(
                'kriteria'      => $this->input->post('kriteria'),
            );

            $this->db->where('id',$id);
            $cek = $this->db->get('skripsi_kriteria');
            if ($cek->num_rows()>0) {
                $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Ada yang salah</div>");
               redirect('skripsikriteria');
             }else{
    
                $this->model->get_insert('skripsi_kriteria',$data);

                $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Simpan</div>");
                redirect('skripsikriteria');
            }
        }
        elseif ($mau_ke == "aksi_edit") {
            $data = array(
                'kriteria'      => $this->input->post('kriteria'),
            );

            $this->model->get_update('skripsi_kriteria',$this->input->post('id'), $data);
            $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Updsate</div>");
            redirect('skripsikriteria');

        }


    }

    public function hapus($gid) {
        // if($this->input->get('batch') == null){
        //     redirect('batch');
        // }
        $this->model->delete('skripsi_kriteria',$gid);
        $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Hapus</div>");
        redirect('skripsikriteria');
    }

}