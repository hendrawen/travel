<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Promo_wisata extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged') <> 1) 
        {
            redirect(site_url('auth'));
        }
        $this->load->model('Promo_wisata_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $data['title']      = 'Admin Geo Travel Lombok';
        $data['judul']      = 'Dashboard';
        $data['sub_judul']  = 'Paket Promo';
        $data['content']    = 'promo_wisata/promo_wisata_list';
        $this->load->view('dashboard', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Promo_wisata_model->json();
    }

    public function read($id) 
    {
        $row = $this->Promo_wisata_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_promo' => $row->id_promo,
		'nama_paket' => $row->nama_paket,
		'harga' => $row->harga,
		'keterangan' => $row->keterangan,
		'tanggal' => $row->tanggal,
	    );
            $data['title']      = 'Admin Geo Travel Lombok';
            $data['judul']      = 'Dashboard';
            $data['sub_judul']  = 'Paket Promo';
            $data['content']    = 'promo_wisata/promo_wisata_read';
            $this->load->view('dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('promo_wisata'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('promo_wisata/create_action'),
	    'id_promo' => set_value('id_promo'),
	    'nama_paket' => set_value('nama_paket'),
	    'harga' => set_value('harga'),
	    'keterangan' => set_value('keterangan'),
	    'tanggal' => set_value('tanggal'),
	);
        $data['title']      = 'Admin Geo Travel Lombok';
        $data['judul']      = 'Dashboard';
        $data['sub_judul']  = 'Paket Promo';
        $data['content']    = 'promo_wisata/promo_wisata_form';
        $this->load->view('dashboard', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_paket' => $this->input->post('nama_paket',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
	    );

            $this->Promo_wisata_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('promo_wisata'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Promo_wisata_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('promo_wisata/update_action'),
		'id_promo' => set_value('id_promo', $row->id_promo),
		'nama_paket' => set_value('nama_paket', $row->nama_paket),
		'harga' => set_value('harga', $row->harga),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'tanggal' => set_value('tanggal', $row->tanggal),
	    );
            $this->load->view('promo_wisata/promo_wisata_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('promo_wisata'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_promo', TRUE));
        } else {
            $data = array(
		'nama_paket' => $this->input->post('nama_paket',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
	    );

            $this->Promo_wisata_model->update($this->input->post('id_promo', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('promo_wisata'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Promo_wisata_model->get_by_id($id);

        if ($row) {
            $this->Promo_wisata_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('promo_wisata'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('promo_wisata'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_paket', 'nama paket', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required|numeric');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');

	$this->form_validation->set_rules('id_promo', 'id_promo', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "promo_wisata.xls";
        $judul = "promo_wisata";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Paket");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");

	foreach ($this->Promo_wisata_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_paket);
	    xlsWriteNumber($tablebody, $kolombody++, $data->harga);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
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
        header("Content-Disposition: attachment;Filename=promo_wisata.doc");

        $data = array(
            'promo_wisata_data' => $this->Promo_wisata_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('promo_wisata/promo_wisata_doc',$data);
    }

}

/* End of file Promo_wisata.php */
/* Location: ./application/controllers/Promo_wisata.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-01-27 06:35:04 */
/* http://harviacode.com */