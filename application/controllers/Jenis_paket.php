<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenis_paket extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged') <> 1)
        {
            redirect(site_url('auth'));
        }
        $this->load->model('Jenis_paket_model');
        $this->load->library('form_validation');
	$this->load->library('datatables');
    }

    public function index()
    {
        $data['title']      = 'Admin Geo Travel Lombok';
        $data['judul']      = 'Dashboard';
        $data['sub_judul']  = 'Jenis Paket';
        $data['content']    = 'jenis_paket/jenis_paket_list';
        $this->load->view('dashboard', $data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Jenis_paket_model->json();
    }

    public function read($id)
    {
        $row = $this->Jenis_paket_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_jenis_paket' => $row->id_jenis_paket,
		'jenis_paket' => $row->jenis_paket,
        'gambar'    => $row->gambar,
		'tanggal' => $row->tanggal,
	    );
            $data['title']      = 'Admin Geo Travel Lombok';
            $data['judul']      = 'Dashboard';
            $data['sub_judul']  = 'Jenis Paket';
            $data['content']    = 'jenis_paket/jenis_paket_read';
            $this->load->view('dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_paket'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenis_paket/create_action'),
	    'id_jenis_paket' => set_value('id_jenis_paket'),
        'jenis_paket' => set_value('jenis_paket'),
	    'gambar' => set_value('gambar'),
	    'tanggal' => set_value('tanggal'),
	);
        $data['title']      = 'Admin Geo Travel Lombok';
        $data['judul']      = 'Dashboard';
        $data['sub_judul']  = 'Jenis Paket';
        $data['content']    = 'jenis_paket/jenis_paket_form';
        $this->load->view('dashboard', $data);
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
            //upload gambar
        $config['upload_path']      = './assets2/images/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp';
        $config['max_size']         = '50000';
        $config['remove_space']     = TRUE;

        $this->load->library('upload', $config); // Load konfigurasi uploadnya
        $this->upload->initialize($config);
        $this->upload->do_upload('gambar');

        $result = $this->upload->data();
        $config['image_library']    ='gd2';
        $config['source_image']     ='./assets2/images/'.$result['file_name'];
        $config['create_thumb']     = FALSE;
        $config['maintain_ratio']   = FALSE;
        $config['width']            = 340;
        $config['height']           = 230;
        $config['new_image']        = './assets2/images/'.$result['file_name'];
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();

        $gambar = $result['file_name'];
        //print_r($gambar);
        $data = array(
            'id_jenis_paket' => $this->Jenis_paket_model->buat_kode(),
            'jenis_paket' => $this->input->post('jenis_paket',TRUE),
            'gambar' => $gambar,
              //'tanggal' => mdate($datestring, $time),
         );

        $this->Jenis_paket_model->insert($data);
        $this->session->set_flashdata('message', 'Create Record Success');
        redirect(site_url('jenis_paket'));
        }
    }

    public function update($id)
    {
        $row = $this->Jenis_paket_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenis_paket/update_action'),
        		'id_jenis_paket' => set_value('id_jenis_paket', $row->id_jenis_paket),
        		'gambar' => set_value('gambar', $row->gambar),
                'jenis_paket' => set_value('jenis_paket', $row->jenis_paket),
		// 'tanggal' => set_value('tanggal', $row->tanggal),
	    );

            $data['title']      = 'Admin Geo Travel Lombok';
            $data['judul']      = 'Dashboard';
            $data['sub_judul']  = 'Jenis Paket';
            $data['content']    = 'jenis_paket/jenis_paket_form';
            $this->load->view('dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_paket'));
        }
    }

    public function update_action()
    {
        $this->_rules();
        $this->load->helper('date');
        $datestring = '%Y-%m-%d %h:%i:%s';
        $time = time();

        if ($this->form_validation->run() == FALSE) {
            /*$this->update($this->input->post('id_jenis_paket', TRUE));*/
            $this->index();
        } else {
            // setting konfigurasi upload
            $config['upload_path']      = './assets2/images/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp';
            $config['max_size']         = '50000';
            $config['remove_space']     = TRUE;

            $this->load->library('upload', $config); // Load konfigurasi uploadnya
            $this->upload->initialize($config);
            $this->upload->do_upload('gambar');
            $result = $this->upload->data();
            
            $config['image_library']    ='gd2';
            $config['source_image']     ='./assets2/images/'.$result['file_name'];
            $config['create_thumb']     = FALSE;
            $config['maintain_ratio']   = FALSE;
            $config['width']            = 340;
            $config['height']           = 230;
            $config['new_image']        = './assets2/images/'.$result['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            $gambar = $result['file_name'];

            $id_jenis_paket = $this->input->post('id_jenis_paket',TRUE);

            $query = $this->db->query("SELECT * FROM jenis_paket WHERE id_jenis_paket= '{$id_jenis_paket}'");
                foreach ($query->result() as $key) {
                unlink('./assets2/images/'.$key->gambar);
            }

            $data = array(
            'id_jenis_paket' => $this->Jenis_paket_model->buat_kode(),
    		'jenis_paket' => $this->input->post('jenis_paket',TRUE),
            'gambar' => $gambar,
    		//'tanggal' => mdate($datestring, $time),
	    );

            $this->Jenis_paket_model->update($this->input->post('id_jenis_paket', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenis_paket'));
        }
    }

    public function delete($id)
    {
        $row = $this->Jenis_paket_model->get_by_id($id);

        if ($row) {
            $this->Jenis_paket_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenis_paket'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_paket'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('jenis_paket', 'jenis paket', 'trim|required');
	// $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');

	$this->form_validation->set_rules('id_jenis_paket', 'id_jenis_paket', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "jenis_paket.xls";
        $judul = "jenis_paket";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Paket");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");

	foreach ($this->Jenis_paket_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_paket);
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
        header("Content-Disposition: attachment;Filename=jenis_paket.doc");

        $data = array(
            'jenis_paket_data' => $this->Jenis_paket_model->get_all(),
            'start' => 0
        );

        $this->load->view('jenis_paket/jenis_paket_doc',$data);
    }

}

/* End of file Jenis_paket.php */
/* Location: ./application/controllers/Jenis_paket.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-01-27 06:24:00 */
/* http://harviacode.com */
