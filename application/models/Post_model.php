<?php

class Post_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function getAllPostFilterByTitle($title){
        $sql = "SELECT post.ID, post.post_title, post.post_date, user.user_nicename,user.ID as post_author, user.user_email, user.cus_avatar
                         FROM wp_posts as post
                         LEFT JOIN wp_users as user ON post.post_author = user.ID
                         WHERE post.post_type='post'
                         AND post.post_status='publish'
                         AND post.post_title like ". $this->db->escape($title . "%") . " LIMIT 10";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getPostThumbImage($post_id){
        $sql = "SELECT * FROM wp_postmeta WHERE meta_key='_wp_attached_file' AND post_id = (SELECT meta_value FROM wp_postmeta WHERE meta_key='_thumbnail_id' AND post_id=". (int)$post_id. ")";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0){
            return $query->result_array()[0]['meta_value'];
        }
        return '';
    }

    public function getPostByAuthorId($page, $limit, $authorID){
        $start = ($page-1)*$limit;
        $sql = "SELECT post.ID, post.post_title, post.post_date, user.user_nicename,user.ID as post_author, user.user_email, user.cus_avatar, user.cus_city
                       FROM wp_posts as post
                       LEFT JOIN wp_users as user ON post.post_author = user.ID
                       WHERE post.post_type='post'
                       AND post.post_status='publish'
                       AND user.ID=". (int)$authorID . " ORDER BY post.post_date ASC LIMIT ". $start. ",". $limit;
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getCountPostByAuthorId($authorID){
        $sql = "SELECT count(1) FROM wp_posts as post
                       LEFT JOIN wp_users as user ON post.post_author = user.ID
                       WHERE post.post_type='post'
                       AND post.post_status='publish'
                       AND user.ID=". (int)$authorID;
        $query = $this->db->query($sql);
        return $query->result_array()[0]['count(1)'];
    }


}