<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Myorder extends MY_Controller
{

    private $id;

    public function __construct()
    {
        parent::__construct();
        $is_login   = $this->session->userdata('is_login');
        $this->id   = $this->session->userdata('id');
        // jika belum login akan diarahkan ke halaman home
        if (!$is_login) {
            redirect(base_url());
            return;
        }
    }

    public function index()
    {
        $data['tile']       = 'Daftar Order';
        $data['content']    = $this->myorder->where('id_user', $this->id)
            ->orderBy('date', 'DESC')->get();
        $data['page']       = 'pages/myorder/index';

        $this->view($data);
    }
}

/* End of file Myorder.php */
