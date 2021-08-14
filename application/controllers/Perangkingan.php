<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perangkingan extends CI_Controller {
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
        $data['title'] = 'Proses Perangkingan';
        // $this->load->view('vperangkingan', $data);
        $data['batches'] = $this->model->get_all($this->tabelBatch);

        $data['page'] = 'contents/perangkingan/index';
    
        $this->load->view('app.php', $data);
    }

    public function hapus($gid) {
        $this->model->delete($this->tabel,$gid);
        $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Hapus</div>");
        redirect('perangkingan');
    }
    public function proses()
    {
        $batch = $this->input->post('batch');
        $bobotahp = $this->model->get_where('skripsi_bobotahp');
        // print_r($bobotahp);

        $this->db->where('batch',$batch);  
        $data = $this->db->get('skripsi_hasil_normalisasi');
        // var_dump($data->result());
        if ($data->num_rows() > 0) {
           $this->model->delete_dum('skripsi_hasil_perangkingan',$batch);
            foreach ($data->result() as $row) {
                $data= array();
                $hasil = 0;
                foreach($row as $key =>$val){
                    if (preg_match('/[0-9]/', $key)){
                        // print_r(strtolower($key));
                        foreach($bobotahp as $k => $v){
                            // print_r($v->kode);
                            if(strtolower($key) == $v->kode)
                                $hasil += $val*$v->bobot;
                        }
                        $data[$key] = $val;

                    }else{
                        $data[$key] = $val;
                    }
                }
                $data['hasil'] = $hasil;

                // echo "<br>";
                $this->model->get_insert('skripsi_hasil_perangkingan',$data);
            }

            $dt_hasil = $this->db->query("SELECT * FROM skripsi_hasil_perangkingan WHERE batch = '$batch' ORDER BY hasil desc");
            if ($dt_hasil->num_rows() > 0) {
                $num = 1;
                foreach ($dt_hasil->result() as $dt) {
                    $rangking = $num;
                    $this->db->query("UPDATE skripsi_hasil_perangkingan SET rangking = '$rangking' WHERE id = ". $dt->id);
                    $num++;
                }
            }   

        }
    

          $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil Di Dirangkingkan, Cek Menu Hasil Perangkingan</div>");
        redirect('perangkingan');
    }

}
