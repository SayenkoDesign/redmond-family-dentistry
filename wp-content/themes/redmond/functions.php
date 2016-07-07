<?php
require_once __DIR__.'/App/bootstrap.php';
require_once __DIR__.'/src/functions.php';

if(function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => 'Theme Options',
        'capability' => 'edit_theme_options',
        'icon_url' => 'dashicons-sayenko',
    ]);
}