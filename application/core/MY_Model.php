<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Model extends CI_Model
{

    protected $table = '';

    public function __construct()
    {
        parent::__construct();
        // jika $table kosong 
        if (!$this->table) {
            // akan diisi dengan ...
            $this->table = strtolower(
                str_replace('_model', '', get_class($this))
            );
        }
    }
    // fungsi input validasi
    public function validate()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters(
            '<small class="form-text text-danger">',
            '</small>'
        );
        // mendapatkan rules dari masing2 model dan disimpan dalam $validationRules
        $validationRules = $this->getValidationRules();

        $this->form_validation->set_rules($validationRules);

        return $this->form_validation->run();
    }


    // seleksi data perkolom
    public function select($columns)
    {
        $this->db->select($columns);
        return $this;
    }
    // mencari data dan harus sama persis
    public function where($column, $condition)
    {
        $this->db->where($column, $condition);
        return $this;
    }
    //  mencari data yang mirip pada suatu kolom
    public function like($column, $condition)
    {
        $this->db->like($column, $condition);
        return $this;
    }
    //  mencari data yang mirip pada semua kolom dalam suatu tabel
    public function orlike($column, $condition)
    {
        $this->db->or_like($column, $condition);
        return $this;
    }
    // mengabungkan dua tabel dengan data sama dalam kolom
    public function join($table, $type = 'left')
    {
        $this->db->join($table, "$this->table.id_$table = $table.id", $type);
        return $this;
    }
    // mengurutkan data tabel secara asc ()
    public function orderBy($column, $order = 'asc')
    {
        $this->db->order_by($column, $order);
        return $this;
    }
    // menampilkan 1 data dari hasil query dan kondisi dalam bentuk object
    public function first()
    {
        return $this->db->get($this->table)->row();
    }
    // menampilkan semua data dalam suatu tabel dalam bentuk object
    public function get()
    {
        return $this->db->get($this->table)->result();
    }
    // menampilkan nilai jumlah data dalam 1 tabel dari hasil query dan kondisi
    public function count()
    {
        return $this->db->count_all_results($this->table);
    }

    // CRUD #################################################################################
    // menyimpan data baru ke database
    public function create($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    // edit atau mengubah data di database
    public function update($data)
    {
        return $this->db->update($this->table, $data);
    }
    // menghapus data di database
    public function delete()
    {
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
}

/* End of file MY_Model.php */
