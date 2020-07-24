<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SmDetail extends CI_Controller {

    public function index($slug)
    {
        $data = new stdClass();
        $this->load->model('Database');
        $data->series = $this->Database->seriesGet($slug);
        $this->load->view('front/seriessingle', $data);

    }

}