<?php
class Post extends CI_Model{
    
    public function __construct(){
        parent::__construct();
    }
    
    
    //get post sub_categories
    public function get_post_sub_categories($parent)
    {   
        $sql = "SELECT c.term_id, c.name
                FROM wp_terms c JOIN wp_term_taxonomy t ON c.term_id = t.term_id
                WHERE taxonomy = 'category' AND c.term_id != '1' AND parent = ".$parent." ";
        $query = $this->db->query($sql);
        
        return $query->result();
    }
    
}