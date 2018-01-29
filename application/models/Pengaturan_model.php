<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengaturan_model extends CI_Model
{

    public $table = 'pengaturan';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id,program_promo,kerjasama,nama_perusahaan,manajer_perusahaan,email,website,phone1,phone2,phone3,keterangan,about_us,pemilik_perusahaan,tanggal');
        $this->datatables->from('pengaturan');
        //add this line for join
        //$this->datatables->join('table2', 'pengaturan.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('pengaturan/read/$1'),'Read')." | ".anchor(site_url('pengaturan/update/$1'),'Update')." | ".anchor(site_url('pengaturan/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('program_promo', $q);
	$this->db->or_like('kerjasama', $q);
	$this->db->or_like('nama_perusahaan', $q);
	$this->db->or_like('manajer_perusahaan', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('website', $q);
	$this->db->or_like('phone1', $q);
	$this->db->or_like('phone2', $q);
	$this->db->or_like('phone3', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->or_like('about_us', $q);
	$this->db->or_like('pemilik_perusahaan', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('program_promo', $q);
	$this->db->or_like('kerjasama', $q);
	$this->db->or_like('nama_perusahaan', $q);
	$this->db->or_like('manajer_perusahaan', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('website', $q);
	$this->db->or_like('phone1', $q);
	$this->db->or_like('phone2', $q);
	$this->db->or_like('phone3', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->or_like('about_us', $q);
	$this->db->or_like('pemilik_perusahaan', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Pengaturan_model.php */
/* Location: ./application/models/Pengaturan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-01-27 06:45:21 */
/* http://harviacode.com */