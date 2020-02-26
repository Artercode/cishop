<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Category extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function index($page = null)
    {
        $data['title']      = 'Admin: Category';
        $data['content']    = $this->category->paginate($page)->get();
        $data['total_rows'] = $this->category->count(); // total seluruh data dalam tabel category
        // 3 parameter untuk membuat pagination 
        $data['pagination'] = $this->category->makePagination(
            base_url('category'),
            // merubah posisi halaman pagination dari segmen 3 ke segmen 2 (pengaturannya ada di bagian [57]routes.php)
            2,
            $data['total_rows']
        );
        $data['page']       = 'pages/category/index';

        $this->view($data);
    }


    public function search($page = null)
    {
        if (isset($_POST['keyword'])) {
            $this->session->set_userdata('keyword', $this->input->post('keyword'));
        } else {
            redirect(base_url('category'));
        }

        $keyword = $this->session->userdata('keyword');
        $data['title']      = 'Admin: Category';
        $data['content']    = $this->category->like('title', $keyword)->paginate($page)->get();
        // total seluruh data dalam tabel category
        $data['total_rows'] = $this->category->like('title', $keyword)->count();
        // 3 parameter untuk membuat pagination 
        $data['pagination'] = $this->category->makePagination(
            base_url('category/search'),
            // merubah posisi halaman pagination dari segmen 4 ke segmen 3 (pengaturannya ada di bagian [57]routes.php)
            3,
            $data['total_rows']
        );
        $data['page']       = 'pages/category/index';

        $this->view($data);
    }
    // untuk menghapust keyword jika sudak tidak digunakan
    public function reset()
    {
        $this->session->unset_userdata('keyword');
        redirect(base_url('category'));
    }


    public function create()
    {
        if (!$_POST) {
            $input = (object) $this->category->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }

        if (!$this->category->validate()) {
            $data['title']          = 'Tambah Kategori';
            $data['input']          = $input;
            $data['form_action']    = base_url('category/create');
            $data['page']           = 'pages/category/form';

            $this->view($data);
            return;
        }
        // ########## create dan alert ##########
        if ($this->category->create($input)) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan');
        }
        redirect(base_url('category'));
    }

    // memerlukan parameter $id
    public function edit($id)
    {
        // menampilkan data yang mau kita edit dalam form edit
        $data['content'] = $this->category->where('id', $id)->first();
        // jika tidak ada data..
        if (!$data['content']) {
            $this->session->set_flashdata('warning', 'Maaf! Data tidak ditemukan!');
            redirect(base_url('category'));
        }
        // jika data ada akan mengunakan 'content' atau data menggunakan inputan baru
        if (!$_POST) {
            $data['input']  = $data['content'];
        } else {
            $data['input']  = (object) $this->input->post(null, true);
        }
        // menampilkan view
        if (!$this->category->validate()) {
            $data['title']          = 'Ubah Kategori';
            $data['form_action']    = base_url("category/edit/$id");
            $data['page']           = 'pages/category/form';

            $this->view($data);
            return;
        }
        // ########## proses edit dan alart ##########
        if ($this->category->where('id', $id)->update($data['input'])) {
            $this->session->set_flashdata('success', 'Data berhasil diperbaharui!');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan.');
        }
        redirect(base_url('category'));
    }

    // memerlukan parameter $id
    public function delete($id)
    {
        if (!$_POST) {
            redirect(base_url('category'));
        }
        // jika tidak ada data dalam database yang sesuai dengan $id
        if (!$this->category->where('id', $id)->first()) {
            $this->session->set_flashdata('warning', 'Maaf! Data tidak ditemukan!');
            redirect(base_url('category'));
        }
        // ########## proses delete dan alart ##########
        if ($this->category->where('id', $id)->delete()) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan.');
        }
        redirect(base_url('category'));
    }


    public function unique_slug()
    {
        $slug       = $this->input->post('slug');
        $id         = $this->input->post('id');
        $category   = $this->category->where('slug', $slug)->first();

        if ($category) {
            if ($id == $category->id) {
                return true;
            }
            $this->load->library('form_validation');
            $this->form_validation->set_message('unique_slug', '%s sudah digunakan!');
            return false;
        }
        return true;
    }
}

/* End of file Caterory.php */
