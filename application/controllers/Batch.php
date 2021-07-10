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
        $data['page'] = 'contents/batch/index';

        $this->load->view('app.php', $data);
    }


    // function form
    public function form() {
        // ambil variable url
        $mau_ke = $this->uri->segment(3);
        $idu = $this->uri->segment(4);

        // ambil variabel dari form
        $id = $this->input->post('id');
        $batch = $this->input->post('batch');

      
        // mengarahkan fungsi form sesuai dengan uri segmentnya
        if ($mau_ke == "add") {
            $data['title'] = 'Tambah Batch';
            $data['aksi'] = 'aksi_add';
            $data['batches'] = $this->model->get_all($this->tabel);
            $data['page'] = 'contents/batch/form';
    
            $this->load->view('app.php', $data);
        } elseif ($mau_ke == "edit") {
            $data['qdata'] = $this->model->get_byid($this->tabel,$idu);
            $data['title'] = 'Edit Batch';
            $data['aksi']  = 'aksi_edit';
            $data['batches'] = $this->model->get_all($this->tabel);
            // $data['page'] = 'contents/pegawai/form';
            $data['page'] = 'contents/batch/form';
    
            $this->load->view('app.php', $data);
    
            $this->load->view('app.php', $data);
        } elseif ($mau_ke == "aksi_add") {
            // jika uri segmentasinya AKSI_ADD sebagai fungsi untuk insert data
              $data = array(
                'batch'     => $batch,
            );

             $this->db->where('id',$id);
             $cek = $this->db->get($this->tabel);
             if ($cek->num_rows()>0) {
                $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"mdi mdi-ok\"></i> Salah</div>");
               redirect('batch');
             }else{
    
                $this->model->get_insert($this->tabel,$data);
                $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"mdi mdi-ok\"></i> Data berhasil di Simpan</div>");
                redirect('batch');
            }
        } elseif ($mau_ke == "aksi_edit") {
            // jika uri segmentnya aksi_edit sebagai fungsi untuk update
             $data = array(
                'batch'     => $batch,
            );
            // var_dump($data);
    
            $this->model->get_update($this->tabel,$id, $data);
            $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"mdi mdi-ok\"></i> Data berhasil di Update</div>");
            redirect('batch');
        }
    }

}