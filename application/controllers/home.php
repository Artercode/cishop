<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{

    public function index()
    {
        // title pada home akan diisi dengan Homepage
        $data['title']  = 'Homepage';
        $data['page']   = 'pages/home/index';
        // untuk Pfunction view ada di app../controllers/core/MY_Controler.php
        $this->view($data);
    }
}

/* End of file Home.php */
