<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SmDetail extends CI_Controller {

    public function index($slug)
    {
        $this->load->model('Database');
        $this->load->library("pagination");

        $data = new stdClass();
        $data->series   = $this->Database->seriesGet($slug);
        $series         = $this->Database->seriesGet($slug);
        

        //Comment pagination process
        $config["base_url"] = base_url("watch/$series->content_name");
        $config["total_rows"] = $this->Database->getCount("comments");
        $config["uri_segment"] = 3;
        $config["per_page"] = 10;
        $this->pagination->initialize($config);
        $data->links    = $this->pagination->create_links();

        $page           = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data->comments = $this->Database->getWhereLimitResult('comments', ['comment_content_id' =>  $series->content_id], $config["per_page"], $page);

        //List check process
        $userStatus = $this->session->userdata('status');
        $user = $this->session->userdata('user');
        if($userStatus){
            $data->listCheck = $this->Database->listCheck($series->content_id, $user[0]->user_id);
        }
        

        $this->load->view('front/seriessingle', $data);
    }

    public function watchDetail($content_slug, $ep_slug)
    {
        $this->load->model('Database');
        $data = new stdClass();
        $data->watchDetail = $this->Database->watchGet($content_slug, $ep_slug);
        $watchDetail = $this->Database->watchGet($content_slug, $ep_slug);
        $data->comments = $this->Database->getWhereResult('comments', ['comment_content_id' =>  $watchDetail->content_id]);
        $this->load->view('front/watchsingle', $data);
    }

    public function createComment()
    {
        $userID        = $this->input->post('userID');
        $contentID     = $this->input->post('contentID');
        $point         = $this->input->post('point');
        $title         = $this->input->post('title');
        $description   = $this->input->post('description');

        $data = array
        (
            'comment_user_id'       =>  $userID,
            'comment_content_id'    =>  $contentID,
            'comment_title'         =>  $title,
            'comment_description'   =>  $description,
            'comment_point'         =>  $point,
            'comment_create_date'   =>  date('d-m-Y')
        );

        $this->load->model('Database');
        $result = $this->Database->create('comments', $data);

        if($result)
		{
			$this->session->set_flashdata('Comment', '<div class="alert alert-success" role="alert"> İnceleme Gönderildi! </div>');
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$this->session->set_flashdata('Comment', '<div class="alert alert-danger" role="alert"> İnceleme Gönderilemedi! </div>');
		}
    }

    public function addList($contentID)
    {
        $this->load->model('Database');

        $user = $this->session->userdata('user');
        $data = array
        (
            'list_user_id'      =>  $user[0]->user_id,
            'list_content_id'   =>  $contentID
        );

        $result = $this->Database->create('user_content_list', $data);

        if($result)
		{
			$this->session->set_flashdata('List', '<div class="alert alert-success" role="alert"> Listenize Eklendi! </div>');
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$this->session->set_flashdata('List', '<div class="alert alert-danger" role="alert"> Listenize Eklenemedi! </div>');
		}
    }

    public function deleteList($contentID)
    {
        $user = $this->session->userdata('user');
        $this->load->model('Database');
        $result = $this->Database->delete('user_content_list', ['list_user_id' => $user[0]->user_id, 'list_content_id' => $contentID]);

        if($result)
		{
			$this->session->set_flashdata('List', '<div class="alert alert-success" role="alert"> Listenizen Çıkartıldı! </div>');
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$this->session->set_flashdata('List', '<div class="alert alert-danger" role="alert"> Listenizden Çıkartılamadı! </div>');
		}
    }

}