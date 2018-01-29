<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detail_paket extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged') <> 1) 
        {
            redirect(site_url('auth'));
        }
        $this->load->model('Detail_paket_model');
        $this->load->library('form_validation');        
	   $this->load->library('datatables');
    }

    public function index()
    {
        $data['title']      = 'Admin Geo Travel Lombok';
        $data['judul']      = 'Dashboard';
        $data['sub_judul']  = 'Sub Paket';
        $data['content']    = 'detail_paket/detail_paket_list';
        $this->load->view('dashboard', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Detail_paket_model->json();
    }

    public function read($id) 
    {
        $row = $this->Detail_paket_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_detai_paket' => $row->id_detai_paket,
		'nama_detail' => $row->nama_detail,
		'id_paket' => $row->id_paket,
		'gambar' => $row->gambar,
		'tanggal' => $row->tanggal,
	    );
            $data['title']      = 'Admin Geo Travel Lombok';
            $data['judul']      = 'Dashboard';
            $data['sub_judul']  = 'Sub Paket';
            $data['content']    = 'detail_paket/detail_paket_read';
            $this->load->view('dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_paket'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('detail_paket/create_action'),
	    'id_detai_paket' => set_value('id_detai_paket'),
	    'nama_detail' => set_value('nama_detail'),
	    'id_paket' => set_value('id_paket'),
	    'gambar' => set_value('gambar'),
	    //'tanggal' => set_value('tanggal'),
	);
        $data['title']      = 'Admin Geo Travel Lombok';
        $data['judul']      = 'Dashboard';
        $data['sub_judul']  = 'Sub Paket';
        $data['content']    = 'detail_paket/detail_paket_form';
        $this->load->view('dashboard', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            //upload gambar
        $config['upload_path']      = './assets2/images/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp';
        $config['max_size']         = '50000';
        $config['remove_space']     = TRUE;
      
        $this->load->library('upload', $config); // Load konfigurasi uploadnya
        $this->upload->initialize($config);
        $this->upload->do_upload('gambar');

        $result = $this->upload->data();
        $gambar = $result['file_name'];

        //print_r($gambar);
        $data = array(
        'id_detai_paket' => $this->Detail_paket_model->buat_kode(),
		'nama_detail' => $this->input->post('nama_detail',TRUE),
		'id_paket' => $this->input->post('id_paket',TRUE),
		'gambar' => $gambar,
		//'tanggal' => $this->input->post('tanggal',TRUE),
	    );

            $this->Detail_paket_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('detail_paket'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Detail_paket_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('detail_paket/update_action'),
		'id_detai_paket' => set_value('id_detai_paket', $row->id_detai_paket),
		'nama_detail' => set_value('nama_detail', $row->nama_detail),
		'id_paket' => set_value('id_paket', $row->id_paket),
		'gambar' => set_value('gambar', $row->gambar),
		//'tanggal' => set_value('tanggal', $row->tanggal),
	    );
            $data['title']      = 'Admin Geo Travel Lombok';
            $data['judul']      = 'Dashboard';
            $data['sub_judul']  = 'Sub Paket';
            $data['content']    = 'detail_paket/detail_paket_form';
            $this->load->view('dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_paket'));
        }
    }
    
    public function update_action() 
    {
        /*$this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_detai_paket', TRUE));
        } else {*/
            //upload gambar
            $config['upload_path']      = './assets2/images/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp';
            $config['max_size']         = '50000';
            $config['remove_space']     = TRUE;
          
            $this->load->library('upload', $config); // Load konfigurasi uploadnya
            $this->upload->initialize($config);
            $this->upload->do_upload('gambar');

            $result = $this->upload->data();
            $gambar = $result['file_name'];

            //print_r($gambar);
            $id_detai_paket = $this->input->post('id_detai_paket',TRUE);

            $query = $this->db->query("SELECT * FROM detail_paket WHERE id_detai_paket= '{$id_detai_paket}'");
                foreach ($query->result() as $key) {
                unlink('./assets2/images/'.$key->gambar);
            }
            
            $data = array(
            'id_detai_paket' => $this->Detail_paket_model->buat_kode(),
    		'nama_detail' => $this->input->post('nama_detail',TRUE),
    		'id_paket' => $this->input->post('id_paket',TRUE),
    		'gambar' => $gambar,
    		//'tanggal' => $this->input->post('tanggal',TRUE),
	           );

            $this->Detail_paket_model->update($this->input->post('id_detai_paket', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('detail_paket'));
        //}
    }
    
    public function delete($id) 
    {
        $row = $this->Detail_paket_model->get_by_id($id);

        if ($row) {
            $this->Detail_paket_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('detail_paket'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_paket'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_detail', 'nama detail', 'trim|required');
	$this->form_validation->set_rules('id_paket', 'id paket', 'trim|required');
	//$this->form_validation->set_rules('gambar', 'gambar', 'trim|required');
	//$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');

	$this->form_validation->set_rules('id_detai_paket', 'id_detai_paket', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "detail_paket.xls";
        $judul = "detail_paket";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Detail");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Paket");
	xlsWriteLabel($tablehead, $kolomhead++, "Gambar");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");

	foreach ($this->Detail_paket_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_detail);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_paket);
	    xlsWriteLabel($tablebody, $kolombody++, $data->gambar);
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
        header("Content-Disposition: attachment;Filename=detail_paket.doc");

        $data = array(
            'detail_paket_data' => $this->Detail_paket_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('detail_paket/detail_paket_doc',$data);
    }

}

/* End of file Detail_paket.php */
/* Location: ./application/controllers/Detail_paket.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-01-27 06:31:31 */
/* http://harviacode.com */