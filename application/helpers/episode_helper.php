<?php

function getEpisode($season, $content)
{
    $ci =& get_instance();
    $result = $ci->db 
    ->select('*')
    ->from('episodes')
    ->order_by('ep_episode', 'ASC')
    ->where('ep_season', $season)
    ->where('ep_content_id', $content)
    ->get()
    ->result();
    return $result;
}

function getLastEpisode($id)
{
    $ci =& get_instance();
    $result = $ci->db 
    ->select('*')
    ->from('episodes')
    ->order_by('ep_episode', 'DESC')
    ->limit(1)
    ->where('ep_content_id', $id)
    ->get()
    ->row();
    return $result;
}

function getAllEpisode($id)
{
    $ci =& get_instance();
    $result = $ci->db 
    ->select('*')
    ->from('episodes')
    ->order_by('ep_episode', 'DESC')
    ->group_by('ep_season')
    ->where('ep_content_id', $id)
    ->get()
    ->result();
    return $result;
}

function getUserComment($id) //Yorumlar kısmındaki kullanıcı verileri çekiliyor.
{
    $ci =& get_instance();
    $result = $ci->db
    ->select('user_name, user_img, user_username')
    ->from('users')
    ->where('user_id', $id)
    ->get()
    ->row();
    return $result;
}

function getPointCount($id) //Dizinin toplam puan ortalaması
{
    $ci =& get_instance();
    $result = $ci->db
    ->select_sum('comment_point')
    ->where('comment_content_id', $id)
    ->get('comments')
    ->row();
    return $result->comment_point;
}

?>