<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Model extends CI_Model
{

    protected $table    = '';
    // untuk menentukan jumlah data dalam 1 halaman di pagination
    protected $perPage  = 5;

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


    // pagination ###########################################################################
    // menampilkan data sesuai perPage di halaman pertama dan seterusnya...
    // setting perPage ada di atas bagian construct
    public function paginate($page)
    {
        $this->db->limit(
            $this->perPage,
            $this->calculateRealOffset($page)
        );
        return $this;
    }
    // menentukan offset jumlah halaman di pagination
    public function calculateRealOffset($page)
    {
        // jika halaman kosong nilai offset = 0
        if (is_null($page) || empty($page)) {
            $offset = 0;
        } else {
            // jika ada data / nilai tidak kosong ...
            $offset = ($page * $this->perPage) - $this->perPage;
        }
        return $offset;
    }
    // style pagination + rules dan kondisi
    public function makePagination($baseUrl, $uriSegment, $totalRows = null)
    {
        $this->load->library('pagination');

        $config = [
            'base_url'          => $baseUrl,
            'uri_segment'       => $uriSegment,
            'per_page'          => $this->perPage,
            'total_rows'        => $totalRows,
            'use_page_numbers'  => true,
            // desain pagination
            'full_tag_open'     => '<ul class="pagination">',
            'full_tag_close'    => '</ul>',
            'attributes'        => ['class' => 'page-link'],
            'first_link'        => false,
            'last_link'         => false,
            'first_tag_open'    => '<li class="page-item">',
            'first_tag_close'   => '</li>',
            'prev_link'         => '&laquo',
            'prev_tag_open'     => '<li class="page-item">',
            'prev_tag_close'    => '</li>',
            'next_link'         => '&raquo',
            'next_tag_open'     => '<li class="page-item">',
            'next_tag_close'    => '</li>',
            'last_tag_open'     => '<li class="page-item">',
            'last_tag_close'    => '</li>',
            'cur_tag_open'      => '<li class="page-item active"><a href="#" class="page-link">',
            'cur_tag_close'     => '<span class="sr-only">(current)</span></a></li>',
            'num_tag_open'      => '<li class="page-item">',
            'num_tag_close'     => '</li>',
        ];

        $this->pagination->initialize($config);
        return $this->pagination->create_links();
    }
}

/* End of file MY_Model.php */
