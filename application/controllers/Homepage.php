<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

	private $fb;
    public function __construct()
    {
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->library("facebookSDK");
        $this->fb=$this->facebooksdk;
    }

	public function index()
	{
		
		$data = new stdClass();

		// Facebook Login Process //
        $this->load->library("facebookSDK");
        $this->fb=$this->facebooksdk;
        $callback="http://localhost/Netflix/homepage/facebookLogin";
		$data->url = $this->fb->getLoginUrl($callback);

		// Homepage Process //
		$this->load->model('Database');
		$data->contents = $this->Database->getResult('contents');
		$data->seriesContents = $this->Database->getWhereResult('contents', ['content_type' => 'Series']);

        $this->load->view('front/homepage', $data);
	}

    public function facebookLogin()
    {
		error_reporting(0);
        $token = $this->fb->getAccessToken();
		$data = $this->fb->getUserData($token);
		$email = $data['email'];
		$this->load->model('Database');
		$result = $this->Database->facebookLogin($email);

		if($result == true)
		{
            redirect('homepage');
		}
		else
		{
			$date   = date("d-m-Y");
			$random = rand(123456,987654);
			$data=array(
				'user_name'         => $data['first_name'],
				'user_surname'      => $data['last_name'],
				'user_email'        => $data['email'],
				'user_pass'         => md5($random),
				'user_img'			=> 'http://graph.facebook.com/'.$data['id'].'/picture',
				'user_type'			=> 'facebook',
				'user_status'       => 1,
				'user_create_date'  => $date
				);
				$this->load->model('Database');
				$create = $this->Database->create($data, 'users');
				if($create){
					redirect('homepage');
			}
		}
	}
	
	// Profile Process //

	public function profile()
	{
		$user = $this->session->userdata('user');

		$this->load->model('Database');
		$data['users'] = $this->Database->profileInfoGet($user[0]->user_id);
		return $this->load->view("front/profile", $data);
	}

	public function profileUpdate()
	{
		
		$username 	= $this->input->post('username');
		$name 		= $this->input->post('name');
		$surname    = $this->input->post('surname');
		$email      = $this->input->post('email');
		$facebook	= $this->input->post('facebook');
		$instagram	= $this->input->post('instagram');
		$twitter	= $this->input->post('twitter');

		$userUpdate = array
		(
			'user_name'			=> 	$name,
			'user_surname'		=> 	$surname,
			'user_username'		=>	$username,
			'user_email'		=>	$email,
			'user_twitter'		=>  $twitter,
			'user_instagram' 	=>  $instagram
		);

		$user = $this->session->userdata('user');

		$this->load->model('Database');
		$result = $this->Database->profileUpdate($userUpdate, $user[0]->user_id);

		if($result)
		{
			$this->session->set_flashdata('Info', '<div class="alert alert-success" role="alert"> Bilgiler Güncellendi! </div>');
			redirect('profile');
		}else{
			echo "Update Hatası";
		}

	}

	public function profilPhotoUpload()
	{
		$upload_path = 'public/front/images/uploads/user/';
		$config=array
		(
			'upload_path' 	=>	$upload_path,
			'allowed_types' => 	'jpeg|jpg|png',
			'max_size'		=>	1024,
		);
		
		$this->load->library('upload', $config);

		if($this->upload->do_upload('user_img'))
		{
			$img 				= $this->upload->data();
			$img_path 			= $img['file_name'];
			$databaseInsertImg 	= $img_path;

			$photoUpdate = array
			(
				'user_img'			=>	$databaseInsertImg,
			);

			$user = $this->session->userdata('user');

			$this->load->model('Database');
			$result = $this->Database->profileUpdate($photoUpdate, $user[0]->user_id);

			if($result)
			{
				$this->session->set_flashdata('Info', '<div class="alert alert-success" role="alert"> Fotoğraf Güncellendi! </div>');
				redirect('profile');
			}else{
				$this->session->set_flashdata('Info', '<div class="alert alert-danger" role="alert"> Fotoğraf Güncellenemedi! </div>');
			}
		}
	}

	public function passwordUpdate()
	{
		$oldPassword	= $this->input->post('oldpassword');
		$password 		= $this->input->post('password');
		$rePassword		= $this->input->post('repassword');

		$user = $this->session->userdata('user');

		$newPassword = array('user_pass' => md5($password));

		$this->load->model('Database');
		$oldPasswordCheck = $this->Database->oldPasswordCheck($user[0]->user_id);
		
		
		if($oldPasswordCheck[0]->user_pass == md5($oldPassword))
		{
			if($password == $rePassword)
			{
				$newPassword = $this->Database->newPassword($newPassword, $user[0]->user_id);

				if($newPassword)
				{
					$this->session->set_flashdata('Info', '<div class="alert alert-success" role="alert"> Şifre Değiştirildi! </div>');
					redirect('profile');
				}
				else
				{
					$this->session->set_flashdata('Info', '<div class="alert alert-danger" role="alert"> Şifre Değiştirilemedi! </div>');
					redirect('profile');
				}
			}
			else
			{
				$this->session->set_flashdata('Info', '<div class="alert alert-danger" role="alert"> Yeni Şifreler Eşleşmiyor! Tekrar Dene. </div>');
				redirect('profile');
			}
		}
		else
		{
			$this->session->set_flashdata('Info', '<div class="alert alert-danger" role="alert"> Eski Şifren Eşleşmiyor! Tekrar Dene. </div>');
			redirect('profile');
		}
	}
}
