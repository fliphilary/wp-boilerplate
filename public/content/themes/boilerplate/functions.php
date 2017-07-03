<?php

function boilerplate_setup() {

	show_admin_bar(false);
	if (function_exists('acf_add_options_page')) {
		$parent = acf_add_options_page([
			'page_title' => 'Customisation',
			'menu_title' => 'Customisation',
			'menu_slug' => 'theme-options',
			'redirect' => false
		]);
	}
}

add_action('init', 'boilerplate_setup');

function boilerplate_webpack_setup() {

	if (is_admin() || !file_exists(dirname(__FILE__) . '/dist/manifest.json'))) { return false; }

	$j_manifest = json_decode(file_get_contents(dirname(__FILE__) . '/dist/manifest.json'),true);

	if (isset($j_manifest['main']['css'])) {
		wp_enqueue_style('webpackcss', get_template_directory_uri() . '/dist/'.$j_manifest['main']['css']);
	}

	if (isset($j_manifest['main']['js'])) {
		wp_enqueue_script('webpackjs', get_template_directory_uri() . '/dist/'.$j_manifest['main']['js'], true);
	}
}

add_action('init', 'boilerplate_webpack_setup');
