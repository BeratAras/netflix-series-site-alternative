<?php
class Back extends CI_Model {

    //Login
    function login($username, $pass){
        $result=$this->db
        ->select('*')
        ->from('admins')
        ->where('admin_username', $username)
        ->where('admin_pass', md5($pass))
        ->get()
        ->result();
        return $result;
    }

    function get($table)
    {
        return $this->db->get($table)->result();
    }

    function getResult($table)
    {
        return $this->db->get($table)->result();
    }

    function getWhere($table, $where = array())
    {
        return $this->db->where($where)->get($table)->row();
    }

    function getWhereResult($table, $where = array(), $group)
    {
        return $this->db->group_by($group)->where($where)->get($table)->result();
    }

    function getEpisode($table, $where = array())
    {
        return $this->db->where($where)->get($table)->result();
    }

    function add($table, $data = array())
    {
        return $this->db->insert($table, $data);
    }

    function update($table, $data = array(), $where = array())
    {
        return $this->db->where($where)->update($table, $data);
    }

    function delete($table, $where = array())
    {
        return $this->db->where($where)->delete($table);
    }

}
?>