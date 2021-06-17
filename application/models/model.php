<?php

class Model extends CI_Model {

   

    function __construct() {
        parent::__construct();
    }

    function get_all($tabel,$urut="desc") {
        $this->db->from($tabel);
         $this->db->order_by("id", $urut); 
        $query = $this->db->get(); //cek apakah ada ba 

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function get_where($tabel, $wheres = array(), $joins = array(), $select = '*') {
        $this->db->select($select);
        $this->db->from($tabel);
        if(count($wheres) > 0){
            foreach($wheres as $key => $where){
                // echo $where;
                $this->db->where($key, $where);
            }
        }
        if(count($joins) > 0){
            foreach($joins as $key => $join){
                $this->db->join($key, $join);
            }
        }
        $query = $this->db->get(); //cek apakah ada ba 

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function get_byid($tabel,$id) {
        $this->db->from($tabel);
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        }
    }

    // function get_bybatch($tabel,$batch) {
    //     $this->db->from($tabel);
    //     $this->db->where('batch', $batch);
    //     $query = $this->db->get();
    //     if ($query->num_rows() == 1) {
    //         return $query->result();
    //     }
    // }


    function get_insert($tabel,$data) {
        $this->db->insert($tabel, $data);
        return TRUE;
    }

    function get_update($tabel,$id, $data) {
        $this->db->where('id', $id);
        $this->db->update($tabel, $data);
        return TRUE;
    }

    function delete($tabel,$id) {
        $this->db->where('id', $id);
        $this->db->delete($tabel);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return FALSE;
    }
     function deleteall($tabel) {
        $sql = "TRUNCATE  $tabel";
        $this->db->query($sql);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return FALSE;
    }
    function delete_dum($tabel,$batch) {
        $this->db->where('batch', $batch);
        $this->db->delete($tabel);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return FALSE;
    }

    function get_bobot()
    {
        $sql = "SELECT k.nama as nama_kriteria, p.*,a.bobot FROM hasil_bobot_ahp a 
        LEFT JOIN perbandingan_kriteria p ON p.kriteria = a.kode
        LEFT JOIN kriteria k ON k.kode = a.kode 
        order by a.kode asc
        ";
        $query = $this->db->query($sql); 
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }
    public function get_eigen()
    {
        $sql="SELECT a.*,
            (SELECT SUM(hasil)hasil FROM hasil_iterasi_1) as total_hasil,
            p.bobot
             FROM hasil_iterasi_1 a
            LEFT JOIN hasil_bobot_ahp p ON p.kode = a.kriteria
            ORDER BY a.kriteria asc";
         $query = $this->db->query($sql); 
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }
     function getdatarangkingawal($batch=1)
    {
      $where = " 1=1 ";
      if ($batch!=null) {
          $where.=" and a.batch = '$batch'";
      }
      $sql="SELECT a.*,h.hasil,h.rangking FROM calon_penerima a 
      LEFT JOIN hasil_perangkingan h ON h.id = a.id
      where $where
      ORDER BY h.rangking ASC";

        
        $query = $this->db->query($sql); //cek apakah ada ba 
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }
     function gethasilperangkingan($batch=1)
    {
      $sql="SELECT * FROM hasil_perangkingan 
      where batch = $batch
      ORDER BY rangking ASC";

        
        $query = $this->db->query($sql); //cek apakah ada ba 
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

}

?>