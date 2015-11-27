<?php

class Tag_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    /**
     * @return mixed array
     */
    public function get_all_post_tag(){
        $sql = "SELECT * FROM wp_terms term
                         LEFT JOIN wp_term_taxonomy term_taxo ON term.term_id = term_taxo.term_id
                         WHERE term_taxo.taxonomy = 'post_tag'" ;
        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function filter_post_tag_by_name($name){
        $sql = "SELECT * FROM wp_terms term
                         LEFT JOIN wp_term_taxonomy term_taxo ON term.term_id = term_taxo.term_id
                         WHERE term_taxo.taxonomy = 'post_tag' AND term.name like ". $this->db->escape($name . "%");
        $query = $this->db->query($sql);

        return $query->result_array();
    }

}