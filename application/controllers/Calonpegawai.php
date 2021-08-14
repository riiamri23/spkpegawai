<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Calonpegawai extends CI_Controller {
     var $tabel = 'skripsi_calon_pegawai'; //variabel tabel 
     var $tabelBatch = "skripsi_batch";

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
        // $data['data'] = $this->model->get_where($this->tabel, ["batch"=> $batch]);
        // $kriteria = $this->model->get_where('skripsi_kriteria');
        $kriteria = $this->model->get_where('skripsi_kriteria_terpilih', [], 
            ['skripsi_kriteria'=> 'skripsi_kriteria_terpilih.id_kriteria = skripsi_kriteria.id']
        );    
        $query = "SELECT a.nama, b.batch, a.batch as id_batch, a.id, ";

        $i = 1;
        
        foreach($kriteria as $key => $val){
            $as = preg_replace('/\s+/', '_',strtolower($val->kriteria));
            $query2 = "(select subkriteria from skripsi_subkriteria where id_kriteria = {$val->id} AND value = a.C{$i} LIMIT 1)";
            $query .="{$query2} as {$as}";
            if (next($kriteria)==true) $query .= ", ";
            $i++;
        }

        $query = $query . " from {$this->tabel} a left join {$this->tabelBatch} b on a.batch = b.id where a.batch =" . $batch;
        $data['data'] = $this->db->query($query)->result();
        // print_r($data['data']);
        // $this->load->view('vcalonpegawai', $data);
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

        $usia = $this->input->post('usia');
        $pengalaman = $this->input->post('pengalaman');
        $pendidikan = $this->input->post('pendidikan');
        $sertifikat = $this->input->post('sertifikat');
        $wawancara = $this->input->post('wawancara');
        $penampilan = $this->input->post('penampilan');

      
        // mengarahkan fungsi form sesuai dengan uri segmentnya
        if ($mau_ke == "add") {
            if($this->input->get('batch') == null){
                redirect('batch');
            }
            $data['title'] = 'Tambah Calon Pegawai';
            $data['aksi'] = 'aksi_add';
            $data['qdata'] = $this->model->get_byid($this->tabel,'0');

            $data['batch'] = $this->input->get('batch');
            $kriteria = $this->model->get_where('skripsi_kriteria_terpilih', 
                [], 
                ['skripsi_kriteria'=> 'skripsi_kriteria_terpilih.id_kriteria = skripsi_kriteria.id'],
                'skripsi_kriteria_terpilih.id, skripsi_kriteria.kriteria, skripsi_kriteria.id as id_kriteria'
            );

            $dataKriteria = array();
            foreach($kriteria as $val){

                $subkriteria = $this->model->get_where('skripsi_subkriteria', ["id_kriteria"=> $val->id_kriteria]);

                array_push($dataKriteria, array(
                    'id'            => $val->id,
                    'kriteria'      => $val->kriteria,
                    'id_kriteria'   => $val->id_kriteria,
                    'subkriteria'   => $subkriteria
                ));
            }

            $data['kriteria'] = $dataKriteria;
            // print_r($data['kriteria']);

            $data['page'] = 'contents/pegawai/form';
    
            $this->load->view('app.php', $data);
        } 
        elseif ($mau_ke == "edit") {
            if($this->input->get('batch') == null){
                redirect('batch');
            }
            $data['qdata'] = $this->model->get_byid($this->tabel,$idu)[0];
            $data['title'] = 'Edit Calon Pegawai';
            $data['aksi']  = 'aksi_edit';
            // print_r($data['qdata']);

            $data['batch'] = $this->input->get('batch');
            $kriteria = $this->model->get_where('skripsi_kriteria_terpilih', 
                [], 
                ['skripsi_kriteria'=> 'skripsi_kriteria_terpilih.id_kriteria = skripsi_kriteria.id'],
                'skripsi_kriteria_terpilih.id, skripsi_kriteria.kriteria, skripsi_kriteria.id as id_kriteria'
            );

            $dataKriteria = array();
            foreach($kriteria as $val){

                $subkriteria = $this->model->get_where('skripsi_subkriteria', ["id_kriteria"=> $val->id_kriteria]);

                array_push($dataKriteria, array(
                    'id'            => $val->id,
                    'kriteria'      => $val->kriteria,
                    'id_kriteria'   => $val->id_kriteria,
                    'subkriteria'   => $subkriteria
                ));
            }

            $data['kriteria'] = $dataKriteria;

            $data['page'] = 'contents/pegawai/form';
    
            $this->load->view('app.php', $data);
        } 
        elseif ($mau_ke == "aksi_add") {
            // jika uri segmentasinya AKSI_ADD sebagai fungsi untuk insert data
            $data = array(
                'nama'      => $this->input->post('nama'),
                'batch'     => $this->input->post('batch'),
                'C1'        => $this->input->post('C1'),
                'C2'        => $this->input->post('C2'),
                'C3'        => $this->input->post('C3'),
                'C4'        => $this->input->post('C4'),
                'C5'        => $this->input->post('C5'),
                'C6'        => $this->input->post('C6'),
            );

             $this->db->where('id',$id);
             $cek = $this->db->get($this->tabel);
             if ($cek->num_rows()>0) {
                $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data Tahun dan Pegawai Tidak Boleh Sama</div>");
               redirect('calonpegawai?batch='. $batch);
             }else{
    
                $this->model->get_insert($this->tabel,$data);
                $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Simpan</div>");
                redirect('calonpegawai?batch='. $batch);
            }
        } elseif ($mau_ke == "aksi_edit") {
            // jika uri segmentnya aksi_edit sebagai fungsi untuk update
            $data = array(
                'nama'      => $this->input->post('nama'),
                'batch'     => $this->input->post('batch'),
                'C1'        => $this->input->post('C1'),
                'C2'        => $this->input->post('C2'),
                'C3'        => $this->input->post('C3'),
                'C4'        => $this->input->post('C4'),
                'C5'        => $this->input->post('C5'),
                'C6'        => $this->input->post('C6'),
            );
            // var_dump($data);
            // var_dump($id);
    
            $this->model->get_update($this->tabel,$id, $data);
            $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Updsate</div>");
            redirect('calonpegawai?batch='. $batch);
        }
    }


    public function hapus($gid) {
        if($this->input->get('batch') == null){
            redirect('batch');
        }
        $this->model->delete($this->tabel,$gid);
        $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Hapus</div>");
        redirect('calonpegawai?batch='. $this->input->get('batch'));
    }
     public function hapusall() {
        if($this->input->get('batch') == null){
            redirect('batch');
        }
        $this->model->deleteall($this->tabel);
        $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Hapus Semua</div>");
        redirect('calonpegawai?batch='. $this->input->get('batch'));
    }

}
