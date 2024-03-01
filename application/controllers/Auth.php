<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required', [
            'required' => 'Username Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password Tidak Boleh Kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = htmlspecialchars($this->input->post('username', true));
        $password = md5($this->input->post('password', true));

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($user) {
            if ($password == $user['password']) {
                $data = [
                    'id_user'   => $user['id_user'],
                    'nama'      => $user['nama'],
                    'username'  => $user['username'],
                    'image'     => $user['image'],
                    'level'     => $user['level'],
                ];
                $this->session->set_userdata($data);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon-copy dw dw-warning"></i> <span>Password anda salah!</span> </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon-copy dw dw-warning
            "></i> <span>Username tidak terdaftar!</span> </div>');
            redirect('auth');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('username');
        // $this->session->sess_destroy();
        redirect('auth');
    }

    public function block()
    {
        $this->load->view('errors/404');
    }


    public function forgotPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Email Tidak Boleh Kosong',
            'valid_email' => 'Email anda harus valid.',
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/forgotPassword');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email])->row_array();
            if ($user) {
                $this->_sendEmail($email);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-icon fade show" role="alert"><i class="mdi mdi-alert-circle-outline"></i>Email tidak terdaftar! </div>');
                redirect('auth');
            }
        }
    }

    private function _sendEmail($email)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'storybagas10@gmail.com',
            'smtp_pass' => 'bagas m b',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];
        $this->load->library('email', $config);
        $this->email->from('storybagas10@gmail.com', 'CMS');
        $this->email->to($email);
        $this->email->subject('helllo');
        $this->email->message('laalklk');
        $this->email->send();
    }
}
