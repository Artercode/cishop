<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends my_Model
{

    protected $table = 'product';
    protected $perPage = 2;    // overwrite


    public function __construct()
    {
        parent::__construct();
        if (!$this->table) {
            $this->table = strtolower(
                str_replace('_model', '', get_class($this))
            );
        }
    }
}

/* End of file Home_model.php */
