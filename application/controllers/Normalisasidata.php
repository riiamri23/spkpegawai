<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Normalisasidata extends CI_Controller {
     var $tabel = 'skripsi_hasil_normalisasi'; //variabel tabel 
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
        $data['title'] = 'Data Penerima Pegawai Ternormalisasi';
        // $data['data'] = $this->model->get_where($this->tabel, ['batch'=>$batch]);

        // $kriteria = $this->model->get_where('skripsi_kriteria');

        $kriteria = $this->model->get_where('skripsi_kriteria_terpilih', [], 
            ['skripsi_kriteria'=> 'skripsi_kriteria_terpilih.id_kriteria = skripsi_kriteria.id']
        );
        $query = "SELECT a.nama, b.batch, a.batch as id_batch, a.id, ";

        $i = 1;
        foreach($kriteria as $key => $val){
            $as = preg_replace('/\s+/', '_',strtolower($val->kriteria));
            $query .="a.C{$i} as {$as}";
            if (next($kriteria)==true) $query .= ", ";
            $i++;
        }

        $query = $query . " from {$this->tabel} a left join {$this->tabelBatch} b on a.batch = b.id where a.batch =" . $batch;
        $data['data'] = $this->db->query($query)->result();

        $data['batch'] = $batch;
        // $data['batches'] = $this->model->get_all($this->tabelBatch);
        // $this->load->view('vnormalisasidata', $data);

        $data['page'] = 'contents/normalisasi/index';
    
        $this->load->view('app.php', $data);
    }

   
      public function hapusall() {
        $this->model->deleteall('hasil_normalisasi');
        $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Hapus Semua</div>");
        redirect('normalisasidata');
    }
    public function proses()
    {
        $batch = $this->input->post('batch');
        //1. select kriteria
        $kriteria = $this->db->query("select a.id, b.kriteria, b.jenis from skripsi_kriteria_terpilih a left join skripsi_kriteria b on a.id_kriteria = b.id")->result();
        // print_r($kriteria[0]->jenis);
    
        //2. select pegawai
        $data = $this->model->get_where('skripsi_calon_pegawai', ['batch'=>$batch]);

        if (!empty($data)) {
            $this->model->delete_dum('skripsi_hasil_normalisasi',$batch);

            //3. tentukan normalisasi
            foreach($data as $row){
                $data = array(
                    
                );
                foreach($row as $key => $val){

                    if (preg_match('/[0-9]/', $key)){
                        $krit = $kriteria[array_search($key, array_column($kriteria, 'id'))];
                        $jenis = $krit->jenis == 'benefit' ? "max({$key})" : "min({$key})";

                        $query = "select $jenis as value from skripsi_calon_pegawai where batch = {$batch} LIMIT 1";

                        $maxormin = $this->db->query($query)->result()[0]->value;
                        if($krit->jenis == 'benefit')
                            $value = $val/$maxormin;
                        else
                            $value = $maxormin/$val;

                        $data[$key] = $value;

                    }else{
                        $data[$key] = $val;
                    }
                }
                print_r($data);

                //4. insert data
                $this->model->get_insert('skripsi_hasil_normalisasi',$data);
            }
            // print_r($data);


        }

          $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil Di Normalisasi</div>");
        redirect('normalisasidata?batch='.$batch);
    }

}
