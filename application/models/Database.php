<?php
class Database extends CI_Model {
    
    function create($data=array(), $where){
        $result=$this->db->insert($where, $data);
        return $result;
    }

    function getResult($table)
    {
        return $this->db->get($table)->result();
    }

    function getWhereResult($table, $where = array())
    {
        return $this->db->where($where)->get($table)->result();
    }

    function seriesGet($slug)
    {
        $this->db->select('*');
		$this->db->from('contents');
		$this->db->join('episodes', 'content_id = ep_content_id');
        $this->db->where('content_type', 'series');
        $this->db->where('content_url', $slug);
		$query = $this->db->get();
        return $query->row();
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

}
?>