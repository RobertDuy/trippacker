<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

    /**
     * Cauth controller.
     *
     */
    function __construct(){
        parent::__construct();
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
    }

    public function get_complete_filter(){
        header('Content-Type: application/json');
        // TODO : must check user session or user token before excute this task
        if(isset($_GET['filter_model'])){
            // this is example data
            // $filter_model = $_GET['filter_model'];
            $result = array();
            for($index = 0; $index < 10; $index++){
                $result[] = array(
                    'location_name' => 'Example Name' . $index,
                    'location_address' => 'Example Address' . $index,
                    'location_icon' => 'fa fa-map-marker'
                );
            }
            echo json_encode($result);
        }
    }

}
