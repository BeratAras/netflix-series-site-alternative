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

?>