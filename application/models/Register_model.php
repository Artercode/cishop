<?php

defined('BASEPATH') or exit('No direct script access allowed');
// Register_model merupakan turunan dari MY_Model
class Register_model extends MY_Model
{
    protected $table = 'user';

    public function getDefaultValues()
    {
        return [
            'name'      => '',
            'email'     => '',
            'password'  => '',
            'role'      => '',
            'ia_active' => ''
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'name',
                'label' => 'Nama',
                'rules' => 'trim|required',
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email|is_unique[user.email]',
                'errors'    => [
                    'is_unique' => '%s sudah terdaftar.'
                ]
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|min_length[8]',
            ],
            [
                'field' => 'password_confirmation',
                'label' => 'Konfirmasi Password',
                'rules' => 'required|matches[password]',
            ],
        ];
        return $validationRules;
    }

    public function run($input)
    {
        $data       = [
            'name'      => $input->name,
            'email'     => strtolower($input->email),
            'password'  => hashEncrypt($input->password),
            'role'      => 'member'
        ];

        $user       = $this->create($data);

        $sess_data  = [
            'id'        => $user,
            'name'      => $data['name'],
            'email'     => $data['email'],
            'role'      => $data['role'],
            'is_login'  => true
        ];

        $this->session->set_userdata($sess_data);
        return true;
    }
}

/* End of file Register_model.php */
