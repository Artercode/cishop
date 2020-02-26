<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends MY_Model
{
    // menentukan tabel yang digunakan karena nama model tidak sama dengan nama tabel
    protected $table = 'user';

    public function getDefaultValues()
    {
        return [
            'email'     => '',
            'password'  => '',
        ];
    }

    public function getValidationRules()
    {
        $validationsRules = [
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ],
        ];

        return $validationsRules;
    }

    public function run($input)
    {
        // mencari email apa sudah terdaftar atau belum
        $query = $this->where('email', strtolower($input->email))
            ->where('is_active', 1)
            ->first();
        // jika email ada dalam database
        if (!empty($query) && hashEncryptVerify($input->password, $query->password)) {
            $sess_data = [
                'id'        => $query->id,
                'name'      => $query->name,
                'email'     => $query->email,
                'role'      => $query->role,
                'is_login'  => true,
            ];
            $this->session->set_userdata($sess_data);
            return true;
        }
        return false;
    }
}

/* End of file Login_model.php */
