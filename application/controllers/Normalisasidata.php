<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Normalisasidata extends CI_Controller {
     var $tabel = 'hasil_normalisasi'; //variabel tabel 
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
        $data['title'] = 'Data Penerima Pegawai Ternormalisasi';
        // $data['data'] = $this->model->get_all($this->tabel);
        $data['data'] = $this->model->get_where($this->tabel, ['batch'=>$batch]);
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
        $c1=$this->db->get_where('kriteria', array('kode' => "c1"))->row()->jenis;
        $c2=$this->db->get_where('kriteria', array('kode' => "c2"))->row()->jenis;
        $c3=$this->db->get_where('kriteria', array('kode' => "c3"))->row()->jenis;
        $c4=$this->db->get_where('kriteria', array('kode' => "c4"))->row()->jenis;
        $c5=$this->db->get_where('kriteria', array('kode' => "c5"))->row()->jenis;

       $this->db->where('batch',$batch);  
       $data = $this->db->get('calon_penerima');
       print_r($data->result());
       print_r($data->num_rows());
    
       if ($data->num_rows() > 0) {
         $this->model->delete_dum('calon_penerima_konversi',$batch);
            foreach ($data->result() as $row) {
                // $nis = $row->nis; 
                $nama = $row->nama;
                // $jurusan = $row->jurusan;
                // $rc1 = 0, $rc2 = 0, $rc3 = 0, $rc4 =0, $rc5 = 0;
                if($row->wawancara == 'sangat baik'){
                    $rc1 = 4;
                }else if($row->wawancara == 'baik'){
                    $rc1 = 3;
                }else if($row->wawancara == 'kurang baik'){
                    $rc1 = 2;
                }else{
                    $rc1 = 1;
                }

                if($row->pendidikan == 's1'){
                    $rc2 = 5;
                }else if($row->pendidikan == 'd3'){
                    $rc2 = 4;
                }else if($row->pendidikan == 'sma/smk'){
                    $rc2 = 3;
                }else if($row->pendidikan == 'smp'){
                    $rc2 = 2;
                }else if($row->pendidikan == 'sd'){
                    $rc2 = 1;
                }

                if($row->pengalaman == 'sangat berpengalaman'){
                    $rc3 = 4;
                }else if($row->pengalaman == 'berpengalaman'){
                    $rc3 = 3;
                }else if($row->pengalaman == 'kurang berpengalaman'){
                    $rc3 = 2;
                }else{
                    $rc3 = 1;
                }

                if($row->karakter == 'sangat aktif'){
                    $rc4 = 4;
                }else if($row->karakter == 'aktif'){
                    $rc4 = 3;
                }else if($row->karakter == 'kurang aktif'){
                    $rc4 = 2;
                }else{
                    $rc4 = 1;
                }
                

                $data = array(
                    'id'            => $row->id,
                    'nama'          => $nama,
                    'batch'         => $batch,
                    'wawancara'     => $rc1,
                    'pendidikan'     => $rc2,
                    'pengalaman'     => $rc3,
                    'karakter'     => $rc3,
                    'gaji'     => $row->gaji,
                      
                );
        
                $this->model->get_insert('calon_penerima_konversi',$data);
            }
        } 

        $this->db->where('batch',$batch);  
        $data2 = $this->db->get('calon_penerima_konversi');
        if ($data2->num_rows() > 0) {
            $this->model->delete_dum('hasil_normalisasi',$batch);

            $max_c1=1;
            $min_c1=1;
            $max_c2=1;
            $min_c2=1;
            $max_c3=1;
            $min_c3=1;
            $max_c4=1;
            $min_c4=1;
            $max_c5=1;
            $min_c5=1;
            
            if($c1=="benefit"){
               $max_c1 = $this->db->query("SELECT max(wawancara) as c1  FROM calon_penerima_konversi WHERE batch='$batch'")->row()->c1;
            }else{
               $min_c1 = $this->db->query("SELECT min(wawancara) as c1 FROM calon_penerima_konversi WHERE batch='$batch'")->row()->c1;
            }

            if($c2=="benefit"){
                 $max_c2 = $this->db->query("SELECT max(pendidikan) as c2 FROM calon_penerima_konversi WHERE batch='$batch'")->row()->c2;
            }else{
                 $min_c2 = $this->db->query("SELECT min(pendidikan) as c2 FROM calon_penerima_konversi WHERE batch='$batch'")->row()->c2;
            }

            if($c3=="benefit"){
                 $max_c3 = $this->db->query("SELECT max(pengalaman) as c3 FROM calon_penerima_konversi WHERE batch='$batch'")->row()->c3;
            }else{
                 $min_c3 = $this->db->query("SELECT min(pengalaman) as c3 FROM calon_penerima_konversi WHERE batch='$batch'")->row()->c3;
            }
            if($c4=="benefit"){
                $max_c4 = $this->db->query("SELECT max(karakter) as c4 FROM calon_penerima_konversi WHERE batch='$batch'")->row()->c4;
            }else{
                 $min_c4 = $this->db->query("SELECT min(karakter) as c4 FROM calon_penerima_konversi WHERE batch='$batch'")->row()->c4;
            }
            if($c5=="benefit"){
                $max_c5 = $this->db->query("SELECT max(gaji) as c5 FROM calon_penerima_konversi WHERE batch='$batch'")->row()->c5;
            }else{
                 $min_c5 = $this->db->query("SELECT min(gaji) as c5 FROM calon_penerima_konversi WHERE batch='$batch'")->row()->c5;
            }

            $tess = array(
               'max_c1' =>  $max_c1,
               'min_c1' =>$min_c1,
               'max_c2' => $max_c2,
                'min_c2'=>$min_c2,
               'max_c3' => $max_c3,
               'min_c3'=> $min_c3,
               'max_c4' => $max_c4,
               'min_c4'=> $min_c4,
               'max_c5' => $max_c5,
               'min_c5'=> $min_c5
            );

      
            foreach ($data2->result() as $row) {
                $nama = $row->nama;
                $nc1 = $row->wawancara;
                $nc2 = $row->pendidikan;
                $nc3 = $row->pengalaman;
                $nc4 = $row->karakter;
                $nc5 = $row->gaji;

                if($c1=="benefit"){
                  $hc1 = $nc1/$max_c1;
                }else{
                  $hc1= $min_c1/$nc1;
                }

                if($c2=="benefit"){
                  $hc2 = $nc2/$max_c2;
                }else{
                  $hc2= $min_c2/$nc2;
                }

                if($c3=="benefit"){
                  $hc3 = $nc3/$max_c3;
                }else{
                  $hc3= $min_c3/$nc3;
                }

                 if($c4=="benefit"){
                  $hc4 = $nc4/$max_c4;
                }else{
                  $hc4= $min_c4/$nc4;
                }

                if($c5=="benefit"){
                  $hc5 = $nc5/$max_c5;
                 //   $hc5 = 55;
                }else{
                   $hc5= $min_c5/$nc5;
                  
                }

                $data = array(
                    'id'        => $row->id,
                    'nama'      => $nama,
                    'batch'     => $batch,
                    'wawancara' => $hc1,
                    'pendidikan'=> $hc2,
                    'pengalaman'=> $hc3,
                    'karakter'  => $hc4,
                    'gaji'      => $hc5
                      
                );
        
                $this->model->get_insert('hasil_normalisasi',$data);

            }
            # code...
        }

          $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil Di Normalisasi</div>");
        redirect('normalisasidata?batch='.$batch);
    }

}
