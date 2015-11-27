<?php

class Bookmark_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function insert($data){
        if(isset($data['post_id']) && $data['post_id'] > 0 && isset($data['user_id']) && $data['user_id'] > 0){
            $sql = "SELECT * FROM wp_user_bookmark WHERE post_id=". (int)$data['post_id'] . " AND user_id=". (int)$data['user_id'];
            $query = $this->db->query($sql);
            if($query->num_rows() == 0){
                $sql = "INSERT INTO wp_user_bookmark SET
                        post_id = " . (int)$data['post_id'] . ",
                        user_id = " . (int)$data['user_id'] . ",
                        post_title = ". $this->db->escape($data['post_title']) . ",
                        post_vote = ". (int)$data['post_vote'] . ",
                        post_thumb_img = ". $this->db->escape($data['post_thumb_img']) . ",
                        post_author_id = ". (int)$data['post_author_id'] .",
                        post_author_name = ". $this->db->escape($data['post_author_name']) .",
                        post_author_email = ". $this->db->escape($data['post_author_email']) . ",
                        post_author_avatar = ". $this->db->escape($data['post_author_avatar']) . ",
                        post_author_city = ". $this->db->escape($data['post_author_city']);
                $this->db->query($sql);
                $data['user_bookmark_id'] = $this->db->insert_id();
                return $data;
            }else{
                return $query->result_array()[0];
            }
        }
    }

    public function getBookmarkPost($user_id){
        $sql = "SELECT * FROM wp_user_bookmark WHERE user_id = ". (int)$user_id;
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function delete($data){
        if(isset($data['post_id']) && $data['post_id'] > 0 && isset($data['user_id']) && $data['user_id'] > 0){
            $sql = "DELETE FROM wp_user_bookmark WHERE user_id=". (int)$data['user_id'] . " AND post_id=". (int)$data['post_id'];
            $this->db->query($sql);
        }
    }

}