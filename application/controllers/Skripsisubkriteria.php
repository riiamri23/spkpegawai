<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Skripsisubkriteria extends CI_Controller {

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

        if($this->input->get('kriteria') == null){
            redirect('skripsisubkriteria');
        }

        $data['title'] = 'Subkriteria';
        $data['page'] = 'contents/skripsisubkriteria/index';

        $data['data'] = $this->model->get_where('skripsi_subkriteria', ["id_kriteria"=> $this->input->get('kriteria')]);
        $data['kriteria'] = $this->input->get('kriteria');
        // print_r($data['data']);
        $this->load->view('app.php', $data);
    }

    public function form(){
        
        // ambil variable url
        $mau_ke = $this->uri->segment(3);
        $idu = $this->uri->segment(4);
        
        if ($mau_ke == "add") {
            if($this->input->get('kriteria') == null){
                redirect('skripsisubkriteria');
            }
            $data['title'] = 'Tambah Subkriteria';
            $data['aksi'] = 'aksi_add';
            $data['page'] = 'contents/skripsisubkriteria/form';
            $data['kriteria'] = $this->input->get('kriteria');
    
            $this->load->view('app.php', $data);
        } 
        elseif ($mau_ke == "edit") {
            if($this->input->get('kriteria') == null){
                redirect('skripsisubkriteria');
            }
            $data['title'] = 'Edit Subkriteria';
            $data['aksi'] = 'aksi_edit';
            $data['page'] = 'contents/skripsisubkriteria/form';
            $data['kriteria'] = $this->input->get('kriteria');
            
            $data['data'] = $this->model->get_byid('skripsi_subkriteria',$idu)[0];
    
            $this->load->view('app.php', $data);

        }
        elseif ($mau_ke == "aksi_add") {
            $data = array(
                'subkriteria'       => $this->input->post('subkriteria'),
                'id_kriteria'       => $this->input->post('kriteria'),
                'value'             => $this->input->post('value'),
            );

            $this->db->where('id', $this->input->post('id'));
            $cek = $this->db->get('skripsi_subkriteria');
            if ($cek->num_rows()>0) {

                $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Ada yang salah</div>");
               redirect('skripsisubkriteria?kriteria' . $this->input->post('kriteria'));
             }else{
    
                $this->model->get_insert('skripsi_subkriteria',$data);

                $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Simpan</div>");
                redirect('skripsisubkriteria?kriteria='. $this->input->post('kriteria'));
            }
        }
        elseif ($mau_ke == "aksi_edit") {
            $data = array(
                'subkriteria'       => $this->input->post('subkriteria'),
                'id_kriteria'       => $this->input->post('kriteria'),
                'value'             => $this->input->post('value'),
            );

            $this->model->get_update('skripsi_subkriteria',$this->input->post('id'), $data);
            $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Updsate</div>");
            redirect('skripsisubkriteria?kriteria='. $this->input->post('kriteria'));

        }


    }

    public function hapus($gid) {
        // if($this->input->get('batch') == null){
        //     redirect('batch');
        // }
        $this->model->delete('skripsi_subkriteria',$gid);
        $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Hapus</div>");
        redirect('skripsisubkriteria?kriteria=' . $this->input->get('kriteria'));
    }
    
}