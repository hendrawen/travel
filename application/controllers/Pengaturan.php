<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged') <> 1) 
        {
            redirect(site_url('auth'));
        }
        $this->load->model('Pengaturan_model');
        $this->load->library('form_validation');        
	   $this->load->library('datatables');
    }

    public function index()
    {
        $data['title']      = 'Admin Geo Travel Lombok';
        $data['judul']      = 'Dashboard';
        $data['sub_judul']  = 'Pengaturan';
        $data['content']    = 'pengaturan/pengaturan_list';
        $this->load->view('dashboard',$data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Pengaturan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Pengaturan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'program_promo' => $row->program_promo,
		'kerjasama' => $row->kerjasama,
		'nama_perusahaan' => $row->nama_perusahaan,
		'manajer_perusahaan' => $row->manajer_perusahaan,
		'email' => $row->email,
		'website' => $row->website,
		'phone1' => $row->phone1,
		'phone2' => $row->phone2,
		'phone3' => $row->phone3,
		'keterangan' => $row->keterangan,
		'about_us' => $row->about_us,
		'pemilik_perusahaan' => $row->pemilik_perusahaan,
		'tanggal' => $row->tanggal,
	    );
            $data['title']      = 'Admin Geo Travel Lombok';
            $data['judul']      = 'Dashboard';
            $data['sub_judul']  = 'Pengaturan';
            $data['content']    = 'pengaturan/pengaturan_read';
            $this->load->view('dashboard',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengaturan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pengaturan/create_action'),
	    'id' => set_value('id'),
	    'program_promo' => set_value('program_promo'),
	    'kerjasama' => set_value('kerjasama'),
	    'nama_perusahaan' => set_value('nama_perusahaan'),
	    'manajer_perusahaan' => set_value('manajer_perusahaan'),
	    'email' => set_value('email'),
	    'website' => set_value('website'),
	    'phone1' => set_value('phone1'),
	    'phone2' => set_value('phone2'),
	    'phone3' => set_value('phone3'),
	    'keterangan' => set_value('keterangan'),
	    'about_us' => set_value('about_us'),
	    'pemilik_perusahaan' => set_value('pemilik_perusahaan'),
	    'tanggal' => set_value('tanggal'),
	);
        $data['title']      = 'Admin Geo Travel Lombok';
        $data['judul']      = 'Dashboard';
        $data['sub_judul']  = 'Pengaturan';
        $data['content']    = 'pengaturan/pengaturan_form';
        $this->load->view('dashboard',$data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        $this->load->helper('date');
        $datestring = '%Y-%m-%d %h:%i:%s';
        $time = time();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'program_promo' => $this->input->post('program_promo',TRUE),
		'kerjasama' => $this->input->post('kerjasama',TRUE),
		'nama_perusahaan' => $this->input->post('nama_perusahaan',TRUE),
		'manajer_perusahaan' => $this->input->post('manajer_perusahaan',TRUE),
		'email' => $this->input->post('email',TRUE),
		'website' => $this->input->post('website',TRUE),
		'phone1' => $this->input->post('phone1',TRUE),
		'phone2' => $this->input->post('phone2',TRUE),
		'phone3' => $this->input->post('phone3',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'about_us' => $this->input->post('about_us',TRUE),
		'pemilik_perusahaan' => $this->input->post('pemilik_perusahaan',TRUE),
		'tanggal' => mdate($datestring, $time),
	    );

            $this->Pengaturan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pengaturan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pengaturan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pengaturan/update_action'),
		'id' => set_value('id', $row->id),
		'program_promo' => set_value('program_promo', $row->program_promo),
		'kerjasama' => set_value('kerjasama', $row->kerjasama),
		'nama_perusahaan' => set_value('nama_perusahaan', $row->nama_perusahaan),
		'manajer_perusahaan' => set_value('manajer_perusahaan', $row->manajer_perusahaan),
		'email' => set_value('email', $row->email),
		'website' => set_value('website', $row->website),
		'phone1' => set_value('phone1', $row->phone1),
		'phone2' => set_value('phone2', $row->phone2),
		'phone3' => set_value('phone3', $row->phone3),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'about_us' => set_value('about_us', $row->about_us),
		'pemilik_perusahaan' => set_value('pemilik_perusahaan', $row->pemilik_perusahaan),
		'tanggal' => set_value('tanggal', $row->tanggal),
	    );
            $data['title']      = 'Admin Geo Travel Lombok';
            $data['judul']      = 'Dashboard';
            $data['sub_judul']  = 'Pengaturan';
            $data['content']    = 'pengaturan/pengaturan_form';
            $this->load->view('dashboard',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengaturan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        $this->load->helper('date');
        $datestring = '%Y-%m-%d %h:%i:%s';
        $time = time();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'program_promo' => $this->input->post('program_promo',TRUE),
		'kerjasama' => $this->input->post('kerjasama',TRUE),
		'nama_perusahaan' => $this->input->post('nama_perusahaan',TRUE),
		'manajer_perusahaan' => $this->input->post('manajer_perusahaan',TRUE),
		'email' => $this->input->post('email',TRUE),
		'website' => $this->input->post('website',TRUE),
		'phone1' => $this->input->post('phone1',TRUE),
		'phone2' => $this->input->post('phone2',TRUE),
		'phone3' => $this->input->post('phone3',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'about_us' => $this->input->post('about_us',TRUE),
		'pemilik_perusahaan' => $this->input->post('pemilik_perusahaan',TRUE),
		'tanggal' => mdate($datestring, $time),
	    );

            $this->Pengaturan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pengaturan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pengaturan_model->get_by_id($id);

        if ($row) {
            $this->Pengaturan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pengaturan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengaturan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('program_promo', 'program promo', 'trim|required');
	$this->form_validation->set_rules('kerjasama', 'kerjasama', 'trim|required');
	$this->form_validation->set_rules('nama_perusahaan', 'nama perusahaan', 'trim|required');
	$this->form_validation->set_rules('manajer_perusahaan', 'manajer perusahaan', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('website', 'website', 'trim|required');
	$this->form_validation->set_rules('phone1', 'phone1', 'trim|required');
	$this->form_validation->set_rules('phone2', 'phone2', 'trim|required');
	$this->form_validation->set_rules('phone3', 'phone3', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('about_us', 'about us', 'trim|required');
	$this->form_validation->set_rules('pemilik_perusahaan', 'pemilik perusahaan', 'trim|required');
	// $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pengaturan.xls";
        $judul = "pengaturan";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Program Promo");
	xlsWriteLabel($tablehead, $kolomhead++, "Kerjasama");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Perusahaan");
	xlsWriteLabel($tablehead, $kolomhead++, "Manajer Perusahaan");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Website");
	xlsWriteLabel($tablehead, $kolomhead++, "Phone1");
	xlsWriteLabel($tablehead, $kolomhead++, "Phone2");
	xlsWriteLabel($tablehead, $kolomhead++, "Phone3");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "About Us");
	xlsWriteLabel($tablehead, $kolomhead++, "Pemilik Perusahaan");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");

	foreach ($this->Pengaturan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->program_promo);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kerjasama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_perusahaan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->manajer_perusahaan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->website);
	    xlsWriteLabel($tablebody, $kolombody++, $data->phone1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->phone2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->phone3);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->about_us);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pemilik_perusahaan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=pengaturan.doc");

        $data = array(
            'pengaturan_data' => $this->Pengaturan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('pengaturan/pengaturan_doc',$data);
    }

}

/* End of file Pengaturan.php */
/* Location: ./application/controllers/Pengaturan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-01-27 06:45:21 */
/* http://harviacode.com */