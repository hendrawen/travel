<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paket extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Paket_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {   
        $data['title']      = 'Admin Geo Travel Lombok';
        $data['judul']      = 'Dashboard';
        $data['sub_judul']  = 'Paket';
        $data['content']    = 'paket/paket_list';
        $this->load->view('dashboard',$data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Paket_model->json();
    }

    public function read($id) 
    {
        $row = $this->Paket_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'id_paket' => $row->id_paket,
        		'nama_paket' => $row->nama_paket,
        		'harga' => $row->harga,
        		'keterangan' => $row->keterangan,
        		'id_jenis_paket' => $row->id_jenis_paket,
        		'gambar' => $row->gambar,
        		'tanggal' => $row->tanggal,
    	    );  
            $data['title']      = 'Admin Geo Travel Lombok';
            $data['judul']      = 'Dashboard';
            $data['sub_judul']  = 'Detail Paket';
            $data['content']    = 'paket/paket_read';
            $this->load->view('dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paket'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('paket/create_action'),
	    'id_paket' => set_value('id_paket'),
	    'nama_paket' => set_value('nama_paket'),
	    'harga' => set_value('harga'),
	    'keterangan' => set_value('keterangan'),
	    'id_jenis_paket' => set_value('id_jenis_paket'),
	    'gambar' => set_value('gambar'),
	    //'tanggal' => set_value('tanggal'),
	);
        $data['title']      = 'Admin Geo Travel Lombok';
        $data['judul']      = 'Dashboard';
        $data['sub_judul']  = 'Tambah Paket';
        $data['content']    = 'paket/paket_form';
        $this->load->view('dashboard', $data);
    }
    
    public function create_action() 
    {
        /*$this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {*/

        /*// setting konfigurasi upload
        $config['upload_path']   = './assets2/images/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['max_size']      = 500000;
        // load library upload
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload('gambar');
        
        $result = $this->upload->data();
               //Compress Image
                $config['image_library']    ='gd2';
                $config['source_image']     ='./assets2/images/'.$result['file_name'];
                $config['create_thumb']     = FALSE;
                $config['maintain_ratio']   = FALSE;
                $config['width']            = 270;
                $config['height']           = 320;
                $config['new_image']        = './assets2/images/'.$result['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();*/
        $config['upload_path']      = './assets2/images/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp';
        $config['max_size']         = '50000';
        $config['remove_space']     = TRUE;
      
        $this->load->library('upload', $config); // Load konfigurasi uploadnya
        $this->upload->initialize($config);
        $this->upload->do_upload('gambar');

         /* 
        if($this->upload->do_upload('input_gambar')){ // Lakukan upload dan Cek jika proses upload berhasil
          // Jika berhasil :
          $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
          return $return;
        }else{
          // Jika gagal :
          $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
          return $return;
        }*/
        $result = $this->upload->data();
     
        $gambar = $result['file_name'];
        //print_r($gambar);
       
           $data = array(
                    'id_paket'  => $this->Paket_model->buat_kode(),
            		'nama_paket' => $this->input->post('nama_paket',TRUE),
            		'harga' => $this->input->post('harga',TRUE),
            		'keterangan' => $this->input->post('keterangan',TRUE),
            		'id_jenis_paket' => $this->input->post('id_jenis_paket',TRUE),
            		'gambar' => $gambar,
            		//'tanggal' => date('Y:m:d H:i:s')
            	    );
        
            $this->Paket_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('paket'));
        //}
   
    }
    
    public function update($id) 
    {
        $row = $this->Paket_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('paket/update_action'),
		'id_paket' => set_value('id_paket', $row->id_paket),
		'nama_paket' => set_value('nama_paket', $row->nama_paket),
		'harga' => set_value('harga', $row->harga),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'id_jenis_paket' => set_value('id_jenis_paket', $row->id_jenis_paket),
		'gambar' => set_value('gambar', $row->gambar),
		//'tanggal' => set_value('tanggal', $row->tanggal),
	    );  
            $data['title']      = 'Admin Geo Travel Lombok';
            $data['judul']      = 'Dashboard';
            $data['sub_judul']  = 'Tambah Paket';
            $data['content']    = 'paket/paket_form';
            $this->load->view('dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paket'));
        }
    }
    
    public function update_action() 
    {
        /*$this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_paket', TRUE));
        } else {*/
            // setting konfigurasi upload
            $config['upload_path']      = './assets2/images/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp';
            $config['max_size']         = '50000';
            $config['remove_space']     = TRUE;
          
            $this->load->library('upload', $config); // Load konfigurasi uploadnya
            $this->upload->initialize($config);
            $this->upload->do_upload('gambar');

            $result = $this->upload->data();
            $gambar = $result['file_name'];

            $id_paket = $this->input->post('id_paket',TRUE);

            $query = $this->db->query("SELECT * FROM paket WHERE id_paket= '{$id_paket}'");
                foreach ($query->result() as $key) {
                unlink('./assets2/images/'.$key->gambar);
            }

            $data = array(
            		'nama_paket' => $this->input->post('nama_paket',TRUE),
            		'harga' => $this->input->post('harga',TRUE),
            		'keterangan' => $this->input->post('keterangan',TRUE),
            		'id_jenis_paket' => $this->input->post('id_jenis_paket',TRUE),
            		'gambar' => $gambar,
            		//'tanggal' => date('Y-m-d H:i',TRUE),
            	    );

            $this->Paket_model->update($this->input->post('id_paket', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('paket'));
        //}
    }
    
    public function delete($id) 
    {
        $row = $this->Paket_model->get_by_id($id);

        if ($row) {
            $this->Paket_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('paket'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paket'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_paket', 'nama paket', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required|numeric');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('id_jenis_paket', 'id jenis paket', 'trim|required');
	//$this->form_validation->set_rules('gambar', 'gambar', 'trim|required');
	//$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');

	$this->form_validation->set_rules('id_paket', 'id_paket', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "paket.xls";
        $judul = "paket";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Jenis Paket");
	xlsWriteLabel($tablehead, $kolomhead++, "Gambar");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");

	foreach ($this->Paket_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_paket);
	    xlsWriteNumber($tablebody, $kolombody++, $data->harga);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_jenis_paket);
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
        header("Content-Disposition: attachment;Filename=paket.doc");

        $data = array(
            'paket_data' => $this->Paket_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('paket/paket_doc',$data);
    }

}

/* End of file Paket.php */
/* Location: ./application/controllers/Paket.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-01-27 06:25:53 */
/* http://harviacode.com */