<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    public function __construct()
    {
        // akan meload otomatis jika controller memiliki nama sama dalam model
        parent::__construct();
        // mengubah nama controller menjadi huruf kecil
        $model = strtolower(get_class($this));
        // jika dalam model ada nama depan yang sama dengan controller tadi ($model)
        // controller + _model.php
        if (file_exists(APPPATH . 'models/' . $model . '_model.php')) {
            // akan meload model secara otomatis
            $this->load->model($model . '_model', $model, true);
        }
    }

    // load view layouts/template yang dikemas beserta data lainnya di dalam $data
    public function view($data)
    {
        // menampilkan halaman layouts/template beserta data yang diperlukan di monitor
        $this->load->view('layouts/app', $data);
    }
}
