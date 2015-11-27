<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$home_dir = config_item('home_dir');



require($home_dir.'/wp-blog-header.php');
require_once(ABSPATH . 'wp-admin/includes/media.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/image.php');



/* Create an new image from URL and create attachment obj */
function download_image($post_id, $filename, $image_temp) {
	try {
		$upload_dir = wp_upload_dir(); // Set upload folder
        var_dump($upload_dir);
        $image_data = file_get_contents($image_temp); // Get image data
        
		// Check folder permission and define file location
		if( wp_mkdir_p( $upload_dir['path'] ) ) {
			$file = $upload_dir['path'] . '/' . $filename;
		} else {
			$file = $upload_dir['basedir'] . '/upload/' . $filename;
		}
		
		if($image_data!==false) {
			file_put_contents( $file, $image_data ); // Create the image  file on the server
		} else {
			throw new Exception('Cannot fetch image from URL: '.$image_temp);
		}
        
	} catch (Exception $e) {
		echo 'Error upload image! ';
		return;
	}
	
	$wp_filetype = wp_check_filetype( $filename, null ); // Check image file type

	$attachment = array(
		'post_mime_type' => $wp_filetype['type'],
		'post_title'     => sanitize_file_name( $filename ),
		'post_content'   => '',
		'post_status'    => 'inherit'
	);

	$attach_id = wp_insert_attachment( $attachment, $file, $post_id ); // create attachment
	$attach_data = wp_generate_attachment_metadata( $attach_id, $file ); // Define attachment metadata
	wp_update_attachment_metadata( $attach_id, $attach_data ); // Assign metadata to attachment
	// message("--> attachment downloaded: ".wp_get_attachment_url($attach_id));

	return $attach_id;
}


function c_set_createpost_title($title='Vneconomist')
{
    $title = "Tạo bài viết mới - VnEconomist";
    return $title;
}

//insert post by reusing wordpress function
function c_insert_post($postdata){
    $post_id = wp_insert_post($postdata);
    
    return $post_id;
}

//set post thumbnail
function c_set_post_thumbnail($post_id, $filename, $image_temp ){
    set_post_thumbnail($post_id,download_image($post_id, $filename, $image_temp));
}













?>