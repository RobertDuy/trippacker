<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {

    function __construct(){
        parent::__construct();
    }

    public function index(){
        $data = array();
        $this->load->view('common/tpl_header');
        $this->load->view('common/tpl_home', $data);
        $this->load->view('common/tpl_footer');
    }
}
