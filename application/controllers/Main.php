<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller
{

    public function __construct()
    {
      parent::__construct();
      //Codeigniter : Write Less Do More
      $this->load->model(array('Model_main'));
    }

    function index()
    {
        $data ['tittle']  = 'LOMBOK GEO CITRA – Tour & Travel';
        $data ['paket']   = $this->Model_main->getall();
        $this->load->view('front/main', $data);
    }
}
