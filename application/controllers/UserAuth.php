<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserAuth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('javascript');
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->library('session');
      }

    public function index()
    {
        echo "in";
    }
    
    public function register()
    {
        $this->form_validation->set_rules('email', 'email', 'is_unique[users.user_email]');
        $this->form_validation->set_rules('password', 'password', 'matches[repassword]|min_length[8]|trim');
        $this->form_validation->set_rules('repassword', 'repassword', 'min_length[8]|trim');

        $this->form_validation->set_message('matches', '<div class="alert alert-danger" role="alert">Şifreler Eşleşmiyor.</div>');
        $this->form_validation->set_message('min_length', '<div class="alert alert-danger" role="alert"> Şifre Çok Kısa. </div>');
        $this->form_validation->set_message('is_unique', '<div class="alert alert-danger" role="alert"> Bu E-Posta Adresi Mevcut. </div>');

        if($this->form_validation->run())
        {
            $username   = $this->input->post('username');
            $name       = $this->input->post('name');
            $surname    = $this->input->post('surname');
            $email      = $this->input->post('email');
            $password   = $this->input->post('password');
            $date       = date("d-m-Y");

            $data=array(
            'user_username'     => $username,
            'user_name'         => $name,
            'user_surname'      => $surname,
            'user_email'        => $email,
            'user_pass'         => md5($password),
            'user_status'       => 1,
            'user_create_date'  => $date
            );
            $this->load->model('Database');
            $create = $this->Database->create('users', $data);
            if($create){
                $this->session->set_flashdata('inf', '<div class="alert alert-success" role="alert"> Üyelik İşlemi Tamamlandı. </div>' );
                redirect('homepage');
            }
        }else{
            $data['form_errors'] = validation_errors();
            $this->load->view('front/register', $data);
        }
    }

    public function login(){
        $username   = $this->input->post('username');
        $password   = $this->input->post('password');
        $this->load->model('Database');
        $result=$this->Database->login($username, $password);
        if($result){
            $this->session->set_userdata('status', true);
            $this->session->set_userdata('user', $result);
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $data['form_errors'] = "Kullanıcı Adı veya Şifre Yanlış!";
            $this->load->view('front/login', $data);
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect($_SERVER['HTTP_REFERER']);
    }
}
