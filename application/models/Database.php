<?php
class Database extends CI_Model {
    
    function create($table, $data=array()){
        return $this->db->insert($table, $data);
    }

    function getResult($table)
    {
        return $this->db->get($table)->result();
    }

    function getWhereResult($table, $where = array())
    {
        return $this->db->where($where)->get($table)->result();
    }

    function getWhereLimitResult($table, $where = array(), $limit, $count)
    {
        return $this->db->limit($limit, $count)->where($where)->get($table)->result();
    }

    function delete($table, $where = array())
    {
        return $this->db->where($where)->delete($table);
    }

    function getCount($table)
    {
        return $this->db->count_all($table);
    }

    function seriesGet($slug)
    {
        $result = $this->db
        ->select('*')
        ->from('contents')
		->join('episodes', 'content_id = ep_content_id')
        ->where('content_url', $slug)
		->get()
        ->row();
        return $result;
    }

    function watchGet($content_slug, $ep_slug)
    {
        $result = $this->db
        ->select('*')
        ->from('episodes')
		->join('contents', 'content_id = ep_content_id')
        ->where('content_url', $content_slug)
        ->where('ep_url', $ep_slug)
		->get()
        ->row();
        return $result;
    }

    function login($username, $pass){
        $result=$this->db
        ->select('*')
        ->from('users')
        ->where('user_username', $username)
        ->where('user_pass', md5($pass))
        ->get()
        ->result();
        return $result;
    }

    function Facebooklogin($email){
        $result=$this->db
        ->select('*')
        ->from('users')
        ->where('user_email', $email)
        ->where('user_type', 'facebook')
        ->get()
        ->result();

        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function profileInfoGet($id)
    {
        $result = $this->db
        ->select('*')
        ->from('users')
        ->where('user_id', $id)
        ->get()
        ->result();
        return $result;
    }

    function profileUpdate($data=array(), $id)
    {
        $result = $this->db
        ->where('user_id', $id)
        ->update('users', $data);
        return $result;
    }

    function oldPasswordCheck($id)
    {
        $passwordResult = $this->db
        ->select('user_pass')
        ->from('users')
        ->where('user_id', $id)
        ->get()
        ->result();
        return $passwordResult;
    }

    function newPassword($data=array(), $id)
    {
        $result = $this->db
        ->set('user_pass')
        ->where('user_id', $id)
        ->update('users', $data);
        return $result;
    }

    function listCheck($contentID, $userID)
    {
        $listCheck = $this->db
        ->select('*')
        ->from('user_content_list')
        ->where('list_user_id', $userID)
        ->where('list_content_id', $contentID)
        ->get()
        ->result();
        return $listCheck;
    }

    function smSearch($character)
    {
        $result = $this->db
        ->like('content_name', $character)
        ->limit(10)
        ->from('contents')
        ->get()
        ->result();
        return $result;
    }

    function actorGet()
    {
        return $this->db->order_by('actor_id', 'RANDOM')->where(['actor_status' => 1])->get('actors')->row();
    }

    function getCast($id)
    {
        return $this->db
        ->select('*')
        ->from('content_cast')
        ->join('actors', 'cast_actor_id = actor_id')
        ->where('cast_content_id', $id)
        ->get()
        ->result();
    }

}
?>