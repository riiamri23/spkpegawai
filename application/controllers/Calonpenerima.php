<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Calonpenerima extends CI_Controller {
     var $tabel = 'calon_penerima'; //variabel tabel 
     var $tabelBatch = "batch";

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
            redirect('batch');
        }
        $data['title'] = 'Data Calon Pegawai';
        $data['data'] = $this->model->get_where($this->tabel, ["batch"=> $batch]);
        // $this->load->view('vcalonpenerima', $data);
        $data['batch'] = $batch;
        $data['page'] = 'contents/pegawai/index';

        $this->load->view('app.php', $data);
    }
    
    // function form
    public function form() {
        // ambil variable url
        $mau_ke = $this->uri->segment(3);
        $idu = $this->uri->segment(4);

        // ambil variabel dari form
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $batch = $this->input->post('batch');
        $wawancara = $this->input->post('wawancara');
        $pendidikan = $this->input->post('pendidikan');
        $pengalaman = $this->input->post('pengalaman');
        $karakter = $this->input->post('karakter');
        $gaji = $this->input->post('gaji');

      
        // mengarahkan fungsi form sesuai dengan uri segmentnya
        if ($mau_ke == "add") {
            $data['title'] = 'Tambah Calon Penerima';
            $data['aksi'] = 'aksi_add';
            $data['batches'] = $this->model->get_all($this->tabelBatch);
            // print_r($data['batches']);
            // $this->load->view('vformcalonpenerima', $data);
            $data['page'] = 'contents/pegawai/form';
    
            $this->load->view('app.php', $data);
        } 
        elseif ($mau_ke == "edit") {
            $data['qdata'] = $this->model->get_byid($this->tabel,$idu);
            $data['title'] = 'Edit Calon Penerima';
            $data['aksi']  = 'aksi_edit';
            $data['batches'] = $this->model->get_all($this->tabelBatch);
            $data['page'] = 'contents/pegawai/form';
    
            $this->load->view('app.php', $data);
        } 
        elseif ($mau_ke == "aksi_add") {
            // jika uri segmentasinya AKSI_ADD sebagai fungsi untuk insert data
              $data = array(
                'nama'      => $nama,
                'batch'     => $batch,
                'wawancara' => $wawancara,
                'pendidikan'=> $pendidikan,
                'karakter'  => $karakter,
                'gaji'      => $gaji
                  
            );

             $this->db->where('id',$id);
             $cek = $this->db->get($this->tabel);
             if ($cek->num_rows()>0) {
                $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data Tahun dan Pegawai Tidak Boleh Sama</div>");
               redirect('calonpenerima');
             }else{
    
                $this->model->get_insert($this->tabel,$data);
                $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Simpan</div>");
                redirect('calonpenerima');
            }
        } elseif ($mau_ke == "aksi_edit") {
            // jika uri segmentnya aksi_edit sebagai fungsi untuk update
             $data = array(
                'nama'      => $nama,
                'batch'     => $batch,
                'wawancara' => $wawancara,
                'pendidikan'=> $pendidikan,
                'karakter'  => $karakter,
                'gaji'      => $gaji
                  
            );
            // var_dump($data);
    
            $this->model->get_update($this->tabel,$id, $data);
            $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Update</div>");
            redirect('calonpenerima');
        }
    }


    public function hapus($gid) {
        $this->model->delete($this->tabel,$gid);
        $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Hapus</div>");
        redirect('calonpenerima');
    }
     public function hapusall() {
        $this->model->deleteall($this->tabel);
        $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Hapus Semua</div>");
        redirect('calonpenerima');
    }

}
