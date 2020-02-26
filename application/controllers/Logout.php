<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends MY_Controller
{

    public function index()
    {
        // menentukan data session apa saja yang akan dihapus (sesuai key data di tabel user)
        $sess_data = ['id', 'name', 'email', 'role', 'is_login'];
        // proses hapus session login yang sudah tersimpan
        $this->session->unset_userdata('$sess_data');
        $this->session->sess_destroy();
        redirect(base_url());
    }
}

/* End of file Logout.php */
