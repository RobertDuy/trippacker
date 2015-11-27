<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//check valid file upload format
function is_valid_file_format($array_type, $filename)
{
    $allowed =  $array_type;
    $filename = $_FILES['video_file']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(!in_array($ext,$allowed) ) {
        echo 'error';
    } 
}