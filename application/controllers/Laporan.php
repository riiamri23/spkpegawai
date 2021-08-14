<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan extends CI_Controller {
    var $tabel = 'skripsi_hasil_perangkingan'; //variabel tabel 
    var $tabelBatch = 'skripsi_batch';

    public function __construct() {
        parent::__construct();
        $this->load->model('model');
        // $this->load->library('pdfgenerator');
        $this->load->helper('form','url');
         $this->session_data = $this->session->userdata('session_data');
        if ($this->session_data['status'] != "YA"){
               redirect('login');
        }
    }

    // awal tampil index
    public function index() {
        $data['title'] = 'Laporan';
        // $this->load->view('vlaporan', $data);
        $data['page'] = 'contents/laporan/index';

        $data['batches'] = $this->model->get_all($this->tabelBatch);

        $this->load->view('app.php', $data);
    }

    function generate()
    {
        //data
        if($this->input->post('batch')){
            $batch = $this->input->post('batch');
        }

        // $kriteria = $this->model->get_where('skripsi_kriteria');
        $kriteria = $this->model->get_where('skripsi_kriteria_terpilih', [], 
            ['skripsi_kriteria'=> 'skripsi_kriteria_terpilih.id_kriteria = skripsi_kriteria.id']
        );   

        $query = "SELECT a.nama, b.batch, a.batch as id_batch, a.id, c.hasil, c.rangking, ";

        $i = 1;
        foreach($kriteria as $key => $val){
            $as = preg_replace('/\s+/', '_',strtolower($val->kriteria));
            $query2 = "(select subkriteria from skripsi_subkriteria where id_kriteria = {$val->id} AND value = a.C{$i} LIMIT 1)";
            $query .="{$query2} as {$as}";
            if (next($kriteria)==true) $query .= ", ";
            $i++;
        }

        $query = $query . " from skripsi_calon_pegawai a left join {$this->tabel} c on c.id = a.id left join {$this->tabelBatch} b on a.batch = b.id where a.batch =" . $batch . " order by rangking asc";
        $data['data'] = $this->db->query($query)->result();

        $this->load->library('pdf');
        $html = $this->load->view('contents/laporan/template', $data, true);
        $this->pdf->createPDF($html, 'mypdf', false);
    }
    
 

}
