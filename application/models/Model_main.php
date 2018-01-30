<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_main extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  public function getall()
  {
    # code...
    return $this->db->get('jenis_paket')->result_array();
  }

}
