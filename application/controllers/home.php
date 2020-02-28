<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{

    public function index($page = null)
    {
        // title pada home akan diisi dengan Homepage
        $data['title']  = 'Homepage';
        $data['content']    = $this->home->select(
            [
                'product.id', 'product.title AS product_title',
                'product.description', 'product.image', 'product.price', 'product.is_available',
                'category.title AS category_title', 'category.slug AS category_slug'
            ]
        )
            ->join('category')
            ->where('product.is_available', 1)
            ->paginate($page)
            ->get();
        $data['total_rows'] = $this->home->where('product.is_available', 1)->count();
        $data['pagination'] = $this->home->makePagination(
            base_url('home'),
            2,
            $data['total_rows']
        );
        $data['page']   = 'pages/home/index';
        // untuk Pfunction view ada di app../controllers/core/MY_Controler.php
        $this->view($data);
    }
}

/* End of file Home.php */
