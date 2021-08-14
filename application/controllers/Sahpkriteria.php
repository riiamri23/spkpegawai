<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sahpkriteria extends CI_Controller {

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
        $data['title'] = 'Pembobotan Kriteria Dengan AHP';
        $data['page'] = 'contents/sahpkriteria/index';

        $data['data'] = $this->model->get_all('skripsi_perbandingankriteria');
        $data['data_bobot'] = $this->model->get_bobot2();
        $data['data_eigen'] = $this->model->get_eigen2();

        $this->load->view('app.php', $data);
    }

    public function proses(){
        $pk = $this->model->get_all('skripsi_perbandingankriteria', 'asc');

        if(!empty($pk)){

            $matriks_a = array();
            $matriks_b = array();

            foreach ($pk as $r) {
                $matriks_a[] = array($r->c1,     $r->c2,      $r->c3,      $r->c4,  $r->c5, $r->c6);
                $matriks_b[] = array($r->c1,     $r->c2,      $r->c3,      $r->c4,  $r->c5, $r->c6);
             }

             $hasil = $this->perkalian_matriks($matriks_a, $matriks_b);
             $this->model->deleteall("skripsi_hasiliterasi");

             $urut=1;
             for ($i=0; $i<sizeof($hasil); $i++) {

                $nma= "c".$urut;
                $c1 = $hasil[$i][0];
                $c2 = $hasil[$i][1];
                $c3 = $hasil[$i][2];
                $c4 = $hasil[$i][3];
                $c5 = $hasil[$i][4];
                $c6 = $hasil[$i][5];

                $data = array(
                    'kriteria'=>$nma,
                    'c1'=>$c1,
                    'c2'=>$c2,
                    'c3'=>$c3,
                    'c4'=>$c4,
                    'c5'=>$c5,
                    'c6'=>$c6,
                    'hasil'=>$c1+$c2+$c3+$c4+$c5+$c6
                    
                );
                $this->model->get_insert("skripsi_hasiliterasi",$data);
                $urut=$urut+1; 
            }

        }

        /* 
            Perhitungan Eigen Vector
        */
        $dt_eigen = $this->db->query("SELECT x.*,x.hasil / x.tot as eigen 
                        FROM
                        (
                        SELECT a.*, (SELECT SUM(hasil)hasil FROM skripsi_hasiliterasi )as tot
                            FROM skripsi_hasiliterasi a
                        )x")->result();

        if (!empty($dt_eigen)) {
                $this->model->deleteall("skripsi_bobotahp");
            foreach ($dt_eigen as $it) {
                $kode = $it->kriteria;
                $eigen = $it->eigen;

                $data_e = array('kode'=>$kode,'bobot'=>number_format($eigen,2));

                    $this->model->get_insert("skripsi_bobotahp",$data_e);
            }
        }
        $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Pembobotan diperbaharui</div>");

       redirect("sahpkriteria");
    }

    function perkalian_matriks($matriks_a, $matriks_b) {
        $hasil = array();
        for ($i=0; $i<sizeof($matriks_a); $i++) {
            for ($j=0; $j<sizeof($matriks_b[0]); $j++) {
                $temp = 0;
                for ($k=0; $k<sizeof($matriks_b); $k++) {
                    $temp += $matriks_a[$i][$k] * $matriks_b[$k][$j];
                }
                $hasil[$i][$j] = $temp;
            }
        }
        return $hasil;
    }

}