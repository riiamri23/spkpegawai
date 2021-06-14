<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Calonpegawai extends CI_Controller {
    var $tabel= 'calon_pegawai';
    var $tabelLookup = "lookup_pegawai";
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
        $data['data'] = $this->model->get_where($this->tabel, 
                /* where */array("{$this->tabel}.{$this->tabelBatch}"=> $batch),
                /* join */ array($this->tabelBatch=> "{$this->tabel}.batch = {$this->tabelBatch}.id",
                "{$this->tabelLookup} as wawancara"=> "{$this->tabel}.wawancara = wawancara.id",
                "{$this->tabelLookup} as pendidikan"=> "{$this->tabel}.pendidikan = pendidikan.id",
                "{$this->tabelLookup} as pengalaman"=> "{$this->tabel}.pengalaman = pengalaman.id",
                "{$this->tabelLookup} as karakter"=>"{$this->tabel}.karakter = karakter.id",
                "{$this->tabelLookup} as gaji"=> "{$this->tabel}.gaji = gaji.id"
            ),
                /*select */ "{$this->tabel}.nama, {$this->tabelBatch}.batch, wawancara.keterangan as wawancara, pendidikan.keterangan as pendidikan, pengalaman.keterangan as pengalaman, karakter.keterangan as karakter, gaji.keterangan as gaji"
            );
        // print_r($data['data']);
        // $this->load->view('vcalonpenerima', $data);
        $data['page'] = 'contents/pegawai2/index';

        $this->load->view('app.php', $data);
    }

    public function form(){
        $mau_ke = $this->uri->segment(3);

        // mengarahkan fungsi form sesuai dengan uri segmentnya
        if ($mau_ke == "add") {
            $data['title'] = 'Tambah Calon Penerima';
            $data['aksi'] = 'aksi_add';
            // $this->load->view('vformcalonpenerima', $data);
            $data['page'] = 'contents/pegawai/form';
    
            $this->load->view('app.php', $data);
        } 
    }

    public function formsave(){
        $mau_ke = $this->uri->segment(3);
        
        if ($mau_ke == "aksi_add") {
            // jika uri segmentasinya AKSI_ADD sebagai fungsi untuk insert data
              $data = array(
                'tahun'  => $tahun,
                'nis'   => $nis,
                'nama'   => $nama,
                'jurusan'     => $jurusan,
                'nilai_rata'    => $c1,
                'penghasilan_ortu'    => $c2,
                'tanggungan_ortu'    => $c3,
                'pekerjaan_ortu'    => $c4,
                'alat_transportasi'    => $c5
                  
            );

             $this->db->where('tahun',$tahun);
             $this->db->where('nis',$nis);
             $cek = $this->db->get($this->tabel);
             if ($cek->num_rows()>0) {
                $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data Tahun dan Pegawai Tidak Boleh Sama</div>");
               redirect('calonpenerima');
             }else{
    
                $this->model->get_insert($this->tabel,$data);
                $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Simpan</div>");
                redirect('calonpenerima');
            }
        } 
    }
    
}