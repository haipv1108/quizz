<?php defined('BASEPATH') OR exit('No direct script access allowed');
if (!function_exists('pagi_config')){
	function pagi_config($base, $total, $per_page){
		$config = array(
						'base_url' => base_url().$base,
						'total_rows' => $total,
						'per_page' => $per_page,
						'next_link' => 'Next >',
						'prev_link' => '< Prev',
						'num_tag_open' => '',
						'num_tag_close' => '',
						'num_links' => 5,
						'cur_tag_open' => '<a class="currentpage">',
						'cur_tag_close' => '</a>',
						'uri_segment' => 2,
						'use_page_numbers' => TRUE
						);
		return $config;
	}
}