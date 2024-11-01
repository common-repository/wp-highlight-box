<?php
/*

Plugin Name: WP Highlight Box

Plugin URI: shopcode.org

Description:  Easy with WP Highlight Box Plugin For WordPress, Custom easily in editor with shortcode

Author: Shopcode

Version: 1.0

Author URI: http://shopcode.org

*/

#prefix: ewhb
#function main: highlight_box

// add shorcode

function ewhb_highlight_box_shortcode(){
   add_shortcode('highlight-box', 'ewhb_highlight_box_name');
}

add_action( 'init', 'ewhb_highlight_box_shortcode');



function ewhb_highlight_box_name($atts,  $content = null) {
   extract(shortcode_atts(array(
      'class'=> 'wp-highlight-box',
	  'style'=> '',
     'content'=> "Can not display: can not insert link or text with quote, please remove", 	  
   ), $atts));


   $return_string = "<div class='".$class."' style='".$style."'>".$content."</div>";
	
   $return_string .= '';
   return $return_string;
}


//add style plugin

add_action('wp_enqueue_scripts','ewhb_highlight_box_style');
function ewhb_highlight_box_style(){

$name = dirname ( plugin_basename ( __FILE__ ) );

 wp_enqueue_style('ewhb-highlight-box-style', plugins_url('/highlight-box-style.css', __FILE__)); 

}






// tinymce : add tinymce

add_action('init', 'ewhb_highlight_box_tinymce_init');

function ewhb_highlight_box_tinymce_init() {
	add_filter("mce_external_plugins", "ewhb_highlight_box_jquery_tinymce"); 
	add_filter('mce_buttons', 'ewhb_highlight_box_button_tinymce');
}

// tinymce : jquery

function ewhb_highlight_box_jquery_tinymce($plugin_array) {
	$plugin_array['ewhb_highlight_box_button'] = plugin_dir_url( __FILE__ ) . '/js/ewhb-highlight-box-jquery.js';
	return $plugin_array;
}

// tinymce : button
function ewhb_highlight_box_button_tinymce($buttons) {
$buttons[] = "ewhb_highlight_box_button";
	return $buttons ;
}


// add style tinymce editor

function ewhb_highlight_box_editor_style() {
    wp_enqueue_style('ewhb-highlight-box-editor-style', plugins_url('editor-highlight-box.css', __FILE__));
}
add_action('admin_enqueue_scripts', 'ewhb_highlight_box_editor_style');
add_action('login_enqueue_scripts', 'ewhb_highlight_box_editor_style');








?>