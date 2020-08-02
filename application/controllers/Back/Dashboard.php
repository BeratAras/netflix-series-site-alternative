<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    // Login & Logout Process //
    public function index()
    {
        $this->load->view('back/dashboard');
    }

    public function loginPage()
    {
        $this->load->view('back/login');
    }

    public function login()
    {
        $username   = $this->input->post("username");
        $password   = $this->input->post("password");

        $this->load->model('Back');
        $result=$this->Back->login($username, $password);

        if($result){
            $this->session->set_userdata('status', true);
            $this->session->set_userdata('admin', $result);
            $this->load->view('back/dashboard');
        }else{
            $data['form_errors'] = "Kullanıcı Adı veya Şifre Yanlış!";
            $this->load->view('back/login', $data);
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->load->view('back/login');
    }

    // Series & Movie Process //

    public function smListPage()
    {
        $this->load->model('Back');
        $data['contents'] = $this->Back->get('contents');
        $this->load->view('back/pages/smList', $data);
    }

    public function smViewPage($id)
    {
        $this->load->model('Back');
        $data = new stdClass();
        $data->contents = $this->Back->getWhere('contents', ['content_id' => $id]);
        $data->seasons = $this->Back->getWhereResult('episodes', ['ep_content_id' => $id], 'ep_season');
        $data->actors  = $this->Back->getResult('actors');
        $this->load->view('back/pages/smView', $data);
    }

    public function smCreatePage()
    {
        $this->load->view('back/pages/smCreate');
    }

    public function smCreate()
    {
        $name           =   $this->input->post('name');
        $kind           =   $this->input->post('kind');
        $director       =   $this->input->post('director');
        $writer         =   $this->input->post('writer');
        $trailer        =   $this->input->post('trailer');
        $description    =   $this->input->post('description');
        $keywords       =   $this->input->post('keywords');
        $slug           =   url_title($name, '-', true);
        $type           =   $this->input->post('type');
        $date           =   date('d-m-Y');

        $config=array
		(
			'upload_path' 	=>	'public/front/images/uploads/banner/out_banner',
			'allowed_types' => 	'jpeg|jpg|png',
			'max_size'		=>	1024,
        );
		
        $this->load->library('upload', $config);

        $out_banner = $this->upload->do_upload('out_banner');
        
        if($out_banner){
            $img 				= $this->upload->data();
            $img_path 			= $img['file_name'];
            $databaseInsertImg 	= $img_path;

            $in_banner = $this->upload->do_upload('in_banner');
            if($in_banner)
            {
                $in_img 		= $this->upload->data();
                $in_img_path 	= $in_img['file_name'];
                $inImgInsert 	= $in_img_path;
            }

            $data=array(
                'content_name'          =>  $name,
                'content_description'   =>  $description,
                'content_kind'          =>  $kind,
                'content_out_banner'    =>  $databaseInsertImg,
                'content_in_banner'     =>  $inImgInsert,
                'content_director'      =>  $director,
                'content_writer'        =>  $writer,
                'content_trailer'       =>  $trailer,
                'content_keywords'      =>  $keywords,
                'content_url'           =>  $slug,
                'content_type'          =>  $type,
                'content_create_date'   =>  $date
            );

            $this->load->model('Back');
            $result = $this->Back->add('contents', $data);

            if($result)
            {
                $this->session->set_flashdata('Info', '<div class="alert alert-success" role="alert"> Kayıt Eklendi! </div>');
                redirect('nedmin/sm-list');
            }else{
                $this->session->set_flashdata('Info', '<div class="alert alert-danger" role="alert"> Kayıt Eklenemedi! </div>');
            }
        }
        
        $this->load->view('back/pages/smCreate');
    }

    public function smUpdatePage($id)
    {
        $data = new stdClass();
        $this->load->model('Back');
        $data->contents = $this->Back->getWhere('contents', ['content_id' => $id]);
        $this->load->view('back/pages/smUpdate', $data);
    }

    public function smUpdate()
    {
        $id             =   $this->input->post('id');
        $name           =   $this->input->post('name');
        $kind           =   $this->input->post('kind');
        $director       =   $this->input->post('director');
        $writer         =   $this->input->post('writer');
        $trailer        =   $this->input->post('trailer');
        $description    =   $this->input->post('description');
        $keywords       =   $this->input->post('keywords');
        $type           =   $this->input->post('type');

        $contentUpdate = array
		(
			'content_name'			=> 	$name,
			'content_kind'		    => 	$kind,
			'content_director'		=>	$director,
            'content_writer'		=>	$writer,
            'content_trailer'       =>  $trailer,
			'content_description'	=>  $description,
            'content_keywords' 	    =>  $keywords,
            'content_type' 	        =>  $type
        );
        
        $this->load->model('Back');
        $result = $this->Back->update('contents', $contentUpdate, ['content_id' => $id]);

        if($result)
        {
            $this->session->set_flashdata('Update', '<div class="alert alert-success" role="alert"> Güncelleme Başarılı! </div>');
            redirect('nedmin/sm-list');
        }else{
            $this->session->set_flashdata('Update', '<div class="alert alert-danger" role="alert"> Güncelleme Başarısız! </div>');
        }
    }

    public function smDelete($id)
    {
        $this->load->model('Back');
        $result = $this->Back->delete('contents', ['content_id' => $id]);

        if($result)
        {
            $this->session->set_flashdata('Delete', '<div class="alert alert-success" role="alert"> Silme Başarılı! </div>');
            redirect('nedmin/sm-list');
        }
        else
        {
            $this->session->set_flashdata('Delete', '<div class="alert alert-danger" role="alert"> Silme Başarısız! </div>');
        }
    }

    public function smEpisodePage($id)
    {
        $this->load->model('Back');
        $data = new stdClass();
        $data->episode = $this->Back->getWhere('episodes', ['ep_id' => $id]);
        $this->load->view('back/pages/smEpisodeUpdate', $data);
    }

    public function smEpisodeCreate()
    {
        $contentId  =   $this->input->post('contentId');
        $season     =   $this->input->post('season');
        $episode    =   $this->input->post('episode');
        $name       =   $this->input->post('name');
        $frame      =   $this->input->post('frame');
        $slug       =   $this->input->post('season').'-season-'.$this->input->post('episode').'-episode';
        $date       =   date('d-m-Y');
        $type       =   $this->input->post('type');

        $data = array(
            'ep_content_id'   =>  $contentId,
            'ep_season'       =>  $season,
            'ep_episode'      =>  $episode,
            'ep_name'         =>  $name,
            'ep_frame'        =>  $frame,
            'ep_url'          =>  $slug,
            'ep_date'         =>  $date,
            'ep_type'         =>  $type
        );

        $this->load->model('Back');
        $result = $this->Back->add('episodes', $data);

        if($result)
        {
            $this->session->set_flashdata('Episode', '<div class="alert alert-success" role="alert"> Bölüm Eklendi! </div>');
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $this->session->set_flashdata('Episode', '<div class="alert alert-danger" role="alert"> Bölüm Eklenemedi! </div>');
        }

    }

    public function smEpisodeUpdate()
    {
        $epId       =   $this->input->post('epId');
        $season     =   $this->input->post('season');
        $episode    =   $this->input->post('episode');
        $name       =   $this->input->post('name');
        $frame      =   $this->input->post('frame');
        $slug       =   url_title($name, '-', true);
        $date       =   date('d-m-Y');
        $type       =   $this->input->post('type');

        $data = array(
            'ep_season'       =>  $season,
            'ep_episode'      =>  $episode,
            'ep_name'         =>  $name,
            'ep_frame'        =>  $frame,
            'ep_url'          =>  $slug,
            'ep_date'         =>  $date,
            'ep_type'         =>  $type
        );

        $this->load->model('Back');
        $result = $this->Back->update('episodes', $data, ['ep_id' => $epId]);

        if($result)
        {
            $this->session->set_flashdata('EpisodeUpdate', '<div class="alert alert-success" role="alert"> Bölüm Güncellendi! </div>');
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $this->session->set_flashdata('EpisodeUpdate', '<div class="alert alert-danger" role="alert"> Bölüm Güncellenemedi! </div>');
        }
    }

    public function smEpisodeDelete($id)
    {
        $this->load->model('Back');
        $result = $this->Back->delete('episodes', ['ep_id' => $id]);

        if($result)
        {
            $this->session->set_flashdata('Delete', '<div class="alert alert-success" role="alert"> Silme Başarılı! </div>');
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
            $this->session->set_flashdata('Delete', '<div class="alert alert-danger" role="alert"> Silme Başarısız! </div>');
        }
    }

    public function smActorAdd()
    {
        $contentID = $this->input->post('contentId');
        $actor     = $this->input->post('actor');

        $data = array
        (
            'cast_actor_id'     =>  $actor,
            'cast_content_id'   =>  $contentID
        );

        $this->load->model('Back');

        $result = $this->Back->add('content_cast', $data);

        if($result)
        {
            $this->session->set_flashdata('InsertActor', '<div class="alert alert-success" role="alert"> Oyuncu Eklendi! </div>');
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $this->session->set_flashdata('InsertActor', '<div class="alert alert-danger" role="alert"> Oyuncu Eklenemedi! </div>');
        }
    }

    // Actor & Process //

    public function actorListPage()
    {
        $this->load->model('Back');
        $data['actors'] = $this->Back->get('actors');
        $this->load->view('back/pages/actorList', $data);
    }
    
    public function actorCreatePage()
    {
        $this->load->view('back/pages/actorCreate');
    }

    public function actorCreate()
    {
        $name           =   $this->input->post('name');
        $birthday       =   $this->input->post('birthday');
        $birthplace     =   $this->input->post('birthplace');
        $bio            =   $this->input->post('bio');
        $img            =   $this->input->post('img');
        $status         =   $this->input->post('status');

        $data = array
		(
			'actor_name'		=> 	$name,
            'actor_birthday'    => 	$birthday,
			'actor_birthplace'	=>	$birthplace,
            'actor_bio'		    =>	$bio,
            'actor_img'         =>  $img,
            'actor_status'      =>  $status
        );
        
        $this->load->model('Back');
        $result = $this->Back->add('actors', $data);

        if($result)
        {
            $this->session->set_flashdata('Insert', "<div class='alert alert-success' role='alert'> {$name} Adlı Oyuncu Eklendi.  </div>");
            redirect('nedmin/actor-list');
        }else{
            $this->session->set_flashdata('Insert', '<div class="alert alert-danger" role="alert"> Güncelleme Başarısız! </div>');
        }
    }

    public function actorUpdatePage($id)
    {
        $data = new stdClass();
        $this->load->model('Back');
        $data->actor = $this->Back->getWhere('actors', ['actor_id' => $id]);
        $this->load->view('back/pages/actorUpdate', $data);
    }

    public function actorUpdate()
    {
        $id             =   $this->input->post('id');
        $name           =   $this->input->post('name');
        $birthday       =   $this->input->post('birthday');
        $birthplace     =   $this->input->post('birthplace');
        $bio            =   $this->input->post('bio');
        $img            =   $this->input->post('img');
        $status         =   $this->input->post('status');

        $data = array
		(
			'actor_name'		=> 	$name,
            'actor_birthday'    => 	$birthday,
			'actor_birthplace'	=>	$birthplace,
            'actor_bio'		    =>	$bio,
            'actor_img'         =>  $img,
            'actor_status'      =>  $status
        );
        
        $this->load->model('Back');
        $result = $this->Back->update('actors', $data, ['actor_id' => $id]);

        if($result)
        {
            $this->session->set_flashdata('Update', '<div class="alert alert-success" role="alert"> Güncelleme Başarılı! </div>');
            redirect('nedmin/actor-list');
        }else{
            $this->session->set_flashdata('Update', '<div class="alert alert-danger" role="alert"> Güncelleme Başarısız! </div>');
        }
    }
}


?>