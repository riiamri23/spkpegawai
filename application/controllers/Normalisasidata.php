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
        $c5=$this->db->get_where('kriteria', array('kode' => "c6"))->row()->jenis;

       $this->db->where('batch',$batch);  
       $data = $this->db->get('calon_pegawai');
    //    print_r($data->result());
    //    print_r($data->num_rows());
    
       if ($data->num_rows() > 0) {
         $this->model->delete_dum('calon_pegawai_konversi',$batch);
            foreach ($data->result() as $row) {
                // $nis = $row->nis; 
                $nama = $row->nama;
                // $jurusan = $row->jurusan;
                // $rc1 = 0, $rc2 = 0, $rc3 = 0, $rc4 =0, $rc5 = 0;

                if($row->pengalaman == 'Belum Ada/Freshgraduate'){
                    $rc2 = 3;
                }else if($row->pengalaman == '1 - < 2 Tahun'){
                    $rc2 = 4;
                }else if($row->pengalaman == '> 2 Tahun'){
                    $rc2 = 5;
                }

                if($row->pendidikan == 'SMA/SMK'){
                    $rc3 = 3;
                }else if($row->pendidikan == 'D3'){
                    $rc3 = 4;
                }else if($row->pendidikan == 'S1'){
                    $rc3 = 5;
                }


                if($row->sertifikat == 'Tidak Ada'){
                    $rc4 = 4;
                }else if($row->sertifikat == 'Ada'){
                    $rc4 = 5;
                }

                if($row->wawancara == 'Sangat Buruk'){
                    $rc5 = 1;
                }else if($row->wawancara == 'Buruk'){
                    $rc5 = 2;
                }else if($row->wawancara == 'Cukup'){
                    $rc5 = 3;
                }else if($row->wawancara == 'Baik'){
                    $rc5 = 4;
                }else if($row->wawancara == 'Sangat Baik'){
                    $rc5 = 5;
                }

                if($row->penampilan == 'Sangat Buruk'){
                    $rc6 = 1;
                }else if($row->penampilan == 'Buruk'){
                    $rc6 = 2;
                }else if($row->penampilan == 'Cukup'){
                    $rc6 = 3;
                }else if($row->penampilan == 'Baik'){
                    $rc6 = 4;
                }else if($row->penampilan == 'Sangat Baik'){
                    $rc6 = 5;
                }

                $data = array(
                    'id'            => $row->id,
                    'nama'          => $nama,
                    'batch'         => $batch,
                    'usia'          => $row->usia,
                    'pengalaman'    => $rc2,
                    'pendidikan'    => $rc3,
                    'sertifikat'    => $rc4,
                    'wawancara'     => $rc5,
                    'penampilan'    => $rc6,
                      
                );
        
                $this->model->get_insert('calon_pegawai_konversi',$data);
            }
        } 

        $this->db->where('batch',$batch);  
        $data2 = $this->db->get('calon_pegawai_konversi');
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
            $max_c6=1;
            $min_c6=1;
            
            if($c1=="benefit"){
               $max_c1 = $this->db->query("SELECT max(usia) as c1  FROM calon_pegawai_konversi WHERE batch='$batch'")->row()->c1;
            }else{
               $min_c1 = $this->db->query("SELECT min(usia) as c1 FROM calon_pegawai_konversi WHERE batch='$batch'")->row()->c1;
            }

            if($c2=="benefit"){
                 $max_c2 = $this->db->query("SELECT max(pengalaman) as c2 FROM calon_pegawai_konversi WHERE batch='$batch'")->row()->c2;
            }else{
                 $min_c2 = $this->db->query("SELECT min(pengalaman) as c2 FROM calon_pegawai_konversi WHERE batch='$batch'")->row()->c2;
            }

            if($c3=="benefit"){
                 $max_c3 = $this->db->query("SELECT max(pendidikan) as c3 FROM calon_pegawai_konversi WHERE batch='$batch'")->row()->c3;
            }else{
                 $min_c3 = $this->db->query("SELECT min(pendidikan) as c3 FROM calon_pegawai_konversi WHERE batch='$batch'")->row()->c3;
            }
            if($c4=="benefit"){
                $max_c4 = $this->db->query("SELECT max(sertifikat) as c4 FROM calon_pegawai_konversi WHERE batch='$batch'")->row()->c4;
            }else{
                 $min_c4 = $this->db->query("SELECT min(sertifikat) as c4 FROM calon_pegawai_konversi WHERE batch='$batch'")->row()->c4;
            }
            if($c5=="benefit"){
                $max_c5 = $this->db->query("SELECT max(wawancara) as c5 FROM calon_pegawai_konversi WHERE batch='$batch'")->row()->c5;
            }else{
                 $min_c5 = $this->db->query("SELECT min(wawancara) as c5 FROM calon_pegawai_konversi WHERE batch='$batch'")->row()->c5;
            }
            if($c6=="benefit"){
                $max_c6 = $this->db->query("SELECT max(penampilan) as c6 FROM calon_pegawai_konversi WHERE batch='$batch'")->row()->c6;
            }else{
                 $min_c6 = $this->db->query("SELECT min(penampilan) as c6 FROM calon_pegawai_konversi WHERE batch='$batch'")->row()->c6;
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
                'min_c5'=> $min_c5,
                'max_c6' => $max_c6,
                'min_c6'=> $min_c6
            );

      
            foreach ($data2->result() as $row) {
                $nama = $row->nama;
                $nc1 = $row->usia;
                $nc2 = $row->pengalaman;
                $nc3 = $row->pendidikan;
                $nc4 = $row->sertifikat;
                $nc5 = $row->wawancara;
                $nc6 = $row->penampilan;

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

                if($c6=="benefit"){
                    $hc6 = $nc6/$max_c6;
                }else{
                    $hc6= $min_c6/$nc6;
                }

                $data = array(
                    'id'        => $row->id,
                    'nama'      => $nama,
                    'batch'     => $batch,
                    'usia'          => $hc1,
                    'pengalaman'    => $hc2,
                    'pendidikan'    => $hc3,
                    'sertifikat'    => $hc4,
                    'wawancara'     => $hc5,
                    'penampilan'    => $hc6
                      
                );
        
                $this->model->get_insert('hasil_normalisasi',$data);

            }
            # code...
        }

          $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil Di Normalisasi</div>");
        redirect('normalisasidata?batch='.$batch);
    }

}
