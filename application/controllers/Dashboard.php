<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}
	public function index()
	{	
		$data['title']		= 'Admin Geo Travel Lombok';
		$data['judul']		= 'Dashboard';
		$data['sub_judul']	= '';
		$data['content']	= 'content';
		$this->load->view('dashboard', $data);
	}
}
