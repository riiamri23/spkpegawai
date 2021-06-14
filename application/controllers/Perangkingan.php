<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perangkingan extends CI_Controller {
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

        $c1=$this->db->get_where('hasil_bobot_ahp', array('kode' => "c1"))->row()->bobot;
        $c2=$this->db->get_where('hasil_bobot_ahp', array('kode' => "c2"))->row()->bobot;
        $c3=$this->db->get_where('hasil_bobot_ahp', array('kode' => "c3"))->row()->bobot;
        $c4=$this->db->get_where('hasil_bobot_ahp', array('kode' => "c4"))->row()->bobot;
        $c5=$this->db->get_where('hasil_bobot_ahp', array('kode' => "c5"))->row()->bobot;

        $this->db->where('batch',$batch);  
        $data = $this->db->get('hasil_normalisasi');
        // var_dump($data->result());
        if ($data->num_rows() > 0) {
           $this->model->delete_dum('hasil_perangkingan',$batch);
            foreach ($data->result() as $row) {
                $nama = $row->nama;
                $nc1 = $row->wawancara;
                $nc2 = $row->pendidikan;
                $nc3 = $row->pengalaman;
                $nc4 = $row->karakter;
                $nc5 = $row->gaji;
                // var_dump($nc1);

                $hasil = ($c1*$nc1)+($c2*$nc2)+($c3*$nc3)+($c4*$nc4)+($c5*$nc5);
                // var_dump($hasil);
                  $data = array(
                    'id'            => $row->id,
                    'batch'         => $batch,
                    'nama'          => $nama,
                    'wawancara'     => $nc1,
                    'pendidikan'    => $nc2,
                    'pengalaman'    => $nc3,
                    'karakter'      => $nc4,
                    'gaji'          => $nc5,
                    'hasil'         => number_format((float)$hasil, 3, '.', '')
                      
                );
                var_dump($data);
        
                $this->model->get_insert('hasil_perangkingan',$data);
            }

            $dt_hasil = $this->db->query("SELECT * FROM hasil_perangkingan WHERE batch = '$batch' ORDER BY hasil desc");
            if ($dt_hasil->num_rows() > 0) {
                $num = 1;
                foreach ($dt_hasil->result() as $dt) {
                    $idku = $dt->id;
                    $rangking = $num;
                    $this->db->query("UPDATE hasil_perangkingan SET rangking = '$rangking' WHERE id = $idku");
                    $num++;
                }
            }      

        }
    

          $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil Di Dirangkingkan, Cek Menu Hasil Perangkingan</div>");
        redirect('perangkingan');
    }

}
