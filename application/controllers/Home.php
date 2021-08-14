<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(array('model'));
        $this->session_data = $this->session->userdata('session_data');
		if ($this->session_data['status'] != "YA"){
        	   redirect('login');
        }

	}

    public function index(){
        $data['title'] = "SPK Penerimaan Pegawai";

        $data['page'] = 'home';
        $this->load->view('app.php', $data);
    }

}
