<?php

require_once config_item('home_dir') . '/wp-includes/class-phpass.php';
require_once config_item('home_dir') . '/c/application/utils/CommonUtils.php';

class User_model extends CI_Model {

    private $wp_hasher;

    public function __construct()
    {
        parent::__construct();
        $this->wp_hasher = new PasswordHash(8, true);
    }

    /**
     * @param $input_data
     * @return user object
     */
    public function get_user($input_data){
        $sql = "1=1";
        if(isset($input_data['id'])){
            $sql .= " and ID = ". (int)$input_data['id'];
        }
        if(isset($input_data['user_email'])){
            $sql .= " and user_email = ". $this->db->escape($input_data['user_email']);
        }else if(isset($input_data['user_login'])){
            $sql .= " and user_login = ". $this->db->escape($input_data['user_login']);
        }

        if($sql == "1=1"){
            return null;
        }
        $query = $this->db->query("SELECT * FROM wp_users WHERE ". $sql);
        if($query->num_rows() > 0){
            return $query->result_array()[0];
        }
        return null;
    }

    /**
     * @param $email
     * @param $pass
     * @return 0 = false, > 0 = true
     */
    public function validate_login($email, $pass){
        if(empty($email) || empty($pass)){
            return 0;
        }
        $user = $this->get_user(array('user_email' => $email));
        if(!empty($user) || isset($user['ID'])){
            $dataPass = $user['user_pass'];  // MD 5
            $isValid = $this->wp_hasher->CheckPassword($pass, $dataPass);
            if($isValid){
                return $user;
            }else{
                return 0;
            }
        }
        return 0;
    }

    /**
     * @param $data = array
     *  have user_email, user_login, user_pass = raw passowrd
     */

    public function insert_user($data){
        if(isset($data['user_email']) && isset($data['user_login']) && isset($data['user_pass'])){
            $sql = "INSERT INTO wp_users SET
                        user_login = ". $this->db->escape($data['user_login']) .",
                        user_email = ". $this->db->escape($data['user_email']) .",
                        user_pass = ". $this->db->escape($data['user_pass']);
            if(isset($data['user_nicename']) && !empty($data['user_nicename'])){
                $sql .= ",user_nicename = ". $this->db->escape($data['user_nicename']);
            }else{
                $sql .= ",user_nicename = ". $this->db->escape($data['user_login']);
            }
            if(isset($data['display_name']) && !empty($data['display_name'])){
                $sql .= ",display_name = ". $this->db->escape($data['display_name']);
            }else{
                $sql .= ",display_name = ". $this->db->escape($data['user_login']);
            }
            //first name
            if(isset($data['first_name'])){
                $sql .= ", first_name = ". $this->db->escape($data['first_name']);
            }
            //last_name
            if(isset($data['last_name'])){
                $sql .= ", last_name = ". $this->db->escape($data['last_name']);
            }
            //in_access_token
            if(isset($data['in_access_token'])){
                $sql .= ", in_access_token = ". $this->db->escape($data['in_access_token']);
            }
            //in_token_expire
            if(isset($data['in_token_expire'])){
                $sql .= ", in_token_expire = ". $this->db->escape($data['in_token_expire']);
            }
            // user_activation_key
            if(isset($data['user_activation_key'])){
                $sql .= ", user_activation_key = ". $this->db->escape($data['user_activation_key']);
            }
            // cus_description
            if(isset($data['cus_description'])){
                $sql .= ", cus_description = ". $this->db->escape($data['cus_description']);
            }
            // cus_avatar
            if(isset($data['cus_avatar'])){
                $sql .= ", cus_avatar = ". $this->db->escape($data['cus_avatar']);
            }else{
                $rand = rand(1,5);
                $sql .= ", cus_avatar = 'upload/avatar/default_". $rand . ".png'";
                $data['cus_avatar'] = "upload/avatar/default_". $rand . ".png";
            }
            // cus_cover
            if(isset($data['cus_cover'])){
                $sql .= ", cus_cover = ". $this->db->escape($data['cus_cover']);
            }else{
                $rand = rand(1,5);
                $sql .= ", cus_cover = 'upload/cover/default_". $rand . ".jpg'";
                $data['cus_cover'] = "upload/cover/default_". $rand . ".jpg";
            }
            // cus_quote
            if(isset($data['cus_quote'])){
                $sql .= ", cus_quote = ". $this->db->escape($data['cus_quote']);
            }
            // cus_career
            if(isset($data['cus_career'])){
                $sql .= ", cus_career = ". $this->db->escape($data['cus_career']);
            }
            // cus_company
            if(isset($data['cus_company'])){
                $sql .= ", cus_company = ". $this->db->escape($data['cus_company']);
            }
            // cus_city
            if(isset($data['cus_city'])){
                $sql .= ", cus_city = ". $this->db->escape($data['cus_city']);
            }

            try{
                $this->db->query($sql);
                $data['ID'] = $this->db->insert_id();
                return $data;
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }
    }

    public function update_user($data){
        if(isset($data['user_email']) && isset($data['user_login']) && isset($data['user_pass']) && isset($data['ID'])){
            $sql = "UPDATE wp_users SET
                        user_login = ". $this->db->escape($data['user_login']) .",
                        user_email = ". $this->db->escape($data['user_email']) .",
                        user_pass = ". $this->db->escape($data['user_pass']);
            if(isset($data['user_nicename']) && !empty($data['user_nicename'])){
                $sql .= ",user_nicename = ". $this->db->escape($data['user_nicename']);
            }else{
                $sql .= ",user_nicename = ". $this->db->escape($data['user_login']);
            }
            if(isset($data['display_name']) && !empty($data['display_name'])){
                $sql .= ",display_name = ". $this->db->escape($data['display_name']);
            }else{
                $sql .= ",display_name = ". $this->db->escape($data['user_login']);
            }
            //first name
            if(isset($data['first_name'])){
                $sql .= ", first_name = ". $this->db->escape($data['first_name']);
            }
            //last_name
            if(isset($data['last_name'])){
                $sql .= ", last_name = ". $this->db->escape($data['last_name']);
            }
            //in_access_token
            if(isset($data['in_access_token'])){
                $sql .= ", in_access_token = ". $this->db->escape($data['in_access_token']);
            }
            //in_token_expire
            if(isset($data['in_token_expire'])){
                $sql .= ", in_token_expire = ". $this->db->escape($data['in_token_expire']);
            }
            //user_activation_key
            if(isset($data['user_activation_key'])){
                $sql .= ", user_activation_key = ". $this->db->escape($data['user_activation_key']);
            }
            // cus_description
            if(isset($data['cus_description'])){
                $sql .= ", cus_description = ". $this->db->escape($data['cus_description']);
            }
            // cus_avatar
            if(isset($data['cus_avatar'])){
                $sql .= ", cus_avatar = ". $this->db->escape($data['cus_avatar']);
            }
            // cus_cover
            if(isset($data['cus_cover'])){
                $sql .= ", cus_cover = ". $this->db->escape($data['cus_cover']);
            }
            // cus_quote
            if(isset($data['cus_quote'])){
                $sql .= ", cus_quote = ". $this->db->escape($data['cus_quote']);
            }
            // cus_career
            if(isset($data['cus_career'])){
                $sql .= ", cus_career = ". $this->db->escape($data['cus_career']);
            }
            // cus_company
            if(isset($data['cus_company'])){
                $sql .= ", cus_company = ". $this->db->escape($data['cus_company']);
            }
            // cus_city
            if(isset($data['cus_city'])){
                $sql .= ", cus_city = ". $this->db->escape($data['cus_city']);
            }

            $sql .= " WHERE ID = ". (int)$data['ID'];
            try{
                $this->db->query($sql);
                return $data['ID'];
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }else{
            return null;
        }
    }

    public function delete_user($user_id){
        if(isset($user_id) && (int)$user_id > 0){
            try{
                $this->db->query("DELETE FROM wp_users WHERE ID = ". (int)$user_id);
                return true;
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }
        return false;
    }

    public function getuser_by_activate_code($activate_code){
        $sql = "SELECT * FROM wp_users WHERE user_activation_key = ". $this->db->escape($activate_code);
        $query = $this->db->query($sql);
        if($query->num_rows() == 1){
            return $query->result_array()[0];
        }else{
            return null;
        }
    }

    public function update_user_info($data){
        if(isset($data['ID']) && $data['ID'] > 0){
            $sqlSetData = "user_activation_key = ''";
            // user_nicename;
            if(isset($data['user_nicename']) && !empty($data['user_nicename'])){
                $sqlSetData .= ",user_nicename = ". $this->db->escape($data['user_nicename']);
            }
            // display_name
            if(isset($data['display_name']) && !empty($data['display_name'])){
                $sqlSetData .= ",display_name = ". $this->db->escape($data['display_name']);
            }
            // first name
            if(isset($data['first_name'])){
                $sqlSetData .= ", first_name = ". $this->db->escape($data['first_name']);
            }
            // last_name
            if(isset($data['last_name'])){
                $sqlSetData .= ", last_name = ". $this->db->escape($data['last_name']);
            }
            // in_access_token
            if(isset($data['in_access_token'])){
                $sqlSetData .= ", in_access_token = ". $this->db->escape($data['in_access_token']);
            }
            // in_token_expire
            if(isset($data['in_token_expire'])){
                $sqlSetData .= ", in_token_expire = ". $this->db->escape($data['in_token_expire']);
            }
            // user_activation_key
            if(isset($data['user_activation_key'])){
                $sqlSetData .= ", user_activation_key = ". $this->db->escape($data['user_activation_key']);
            }
            // cus_description
            if(isset($data['cus_description'])){
                $sqlSetData .= ", cus_description = ". $this->db->escape($data['cus_description']);
            }
            // cus_avatar
            if(isset($data['cus_avatar'])){
                $sqlSetData .= ", cus_avatar = ". $this->db->escape($data['cus_avatar']);
            }
            // cus_cover
            if(isset($data['cus_cover'])){
                $sqlSetData .= ", cus_cover = ". $this->db->escape($data['cus_cover']);
            }
            // cus_quote
            if(isset($data['cus_quote'])){
                $sqlSetData .= ", cus_quote = ". $this->db->escape($data['cus_quote']);
            }
            // cus_career
            if(isset($data['cus_career'])){
                $sqlSetData .= ", cus_career = ". $this->db->escape($data['cus_career']);
            }
            // cus_company
            if(isset($data['cus_company'])){
                $sqlSetData .= ", cus_company = ". $this->db->escape($data['cus_company']);
            }
            // cus_city
            if(isset($data['cus_city'])){
                $sqlSetData .= ", cus_city = ". $this->db->escape($data['cus_city']);
            }

            // user_interested
            if(isset($data['interested'])){
                $termIdArray = explode(',',$data['interested']);
                $meta_value_build = '';
                foreach($termIdArray as $termId){
                    if(is_numeric($termId)){
                        (!empty($meta_value_build))? $meta_value_build .= ','. $termId : $meta_value_build .= $termId;
                    }else if(is_string($termId) && !empty($termId) && strlen($termId) > 0){
                        // Insert into TERM table
                        $sqlInsert = "INSERT INTO wp_terms SET name = ". $this->db->escape($termId) . ", slug = ". $this->db->escape(CommonUtils::remove_vietnamese_accents($termId));
                        $this->db->query($sqlInsert);
                        $inTermId = $this->db->insert_id();
                        // Insert into TERM_TAXONOMY table
                        $sqlInsert = "INSERT INTO wp_term_taxonomy SET term_id =". (int) $inTermId. ", taxonomy = 'post_tag', description = ". $this->db->escape($termId) . ", parent=0,count=1";
                        $this->db->query($sqlInsert);
                        (!empty($meta_value_build))? $meta_value_build .= ','. $inTermId : $meta_value_build .= $inTermId;
                    }
                }
                if(!empty($meta_value_build) && strlen($meta_value_build) > 0){
                    $sqlMetaValue = "SELECT * FROM wp_usermeta WHERE user_id =" . (int) $data['ID'] . " AND meta_key = 'interested'";
                    $tempQuery = $this->db->query($sqlMetaValue);
                    if($tempQuery->num_rows() > 0){  // UPDATE
                        $sqlMetaValue = "UPDATE wp_usermeta SET meta_value = ". $this->db->escape($meta_value_build) ." WHERE user_id = ". (int) $data['ID'] ." AND meta_key = 'interested'";
                    }else{  // INSERT
                        $sqlMetaValue = "INSERT INTO wp_usermeta
                                    SET user_id = ". (int)$data['ID']. ",
                                        meta_key = 'interested' ,
                                        meta_value = ". $this->db->escape($meta_value_build);
                    }
                    $this->db->query($sqlMetaValue);
                }
            }

            //
            $sql = "UPDATE wp_users SET ". $sqlSetData . " WHERE ID = ". (int)$data['ID'];
            try{
                $this->db->query($sql);
                return $data['ID'];
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }else{
            return null;
        }
    }

    public function getUserInterested($user_id){
        $sqlTerm = "SELECT usermeta.meta_value FROM wp_usermeta usermeta WHERE usermeta.user_id =".(int)$user_id. " and usermeta.meta_key = 'interested'";
        $query1 = $this->db->query($sqlTerm);
        if($query1->num_rows() > 0){
            $inValue = $query1->result_array()[0]['meta_value'];
            if(!empty($inValue)){
                $sql = $sql = "SELECT * FROM wp_terms term LEFT JOIN wp_term_taxonomy term_tx ON term.term_id = term_tx.term_id
                         WHERE term_tx.taxonomy = 'post_tag' AND term.term_id in (". $inValue .")";
                $query = $this->db->query($sql);
                return $query->result_array();
            }
        }
        return array();
    }
}