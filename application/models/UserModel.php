<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{
    public function tambahUser()
    {
        $data = array(
            'username'  => htmlspecialchars($this->input->post('username')),
            'password'  => md5(htmlspecialchars($this->input->post('password'))),
            'image'     => 'default.png',
            'nama'      => htmlspecialchars($this->input->post('nama')),
            'email'     => htmlspecialchars($this->input->post('email')),
            'telp'      => htmlspecialchars($this->input->post('telp')),
            'alamat'    => htmlspecialchars($this->input->post('alamat')),
            'level'     => $this->input->post('level'),
        );
        $this->db->insert('user', $data);
    }

    public function editUser()
    {
        $data = array(
            'nama'      => htmlspecialchars($this->input->post('nama')),
            'email'     => htmlspecialchars($this->input->post('email')),
            'telp'      => htmlspecialchars($this->input->post('telp')),
            'alamat'    => htmlspecialchars($this->input->post('alamat')),
            'level'     => $this->input->post('level'),
        );

        $where = array('id_user' => $this->input->post('id_user'));
        $this->db->update('user', $data, $where);
    }
}
