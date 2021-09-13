<?php

/*
Plugin Name: My Custom Block
Description: Exploring creating blocks from scratch
Author: Snigdha
Version: 1.0
*/

function loadMyBlockFiles()
{
  wp_enqueue_script
  (
    'myhandle',
    plugin_dir_url(__FILE__).'my-block.js',
    array('wp-blocks','wp-i18n', 'wp-editor'),
    true
  );
}

add_action('enqueue_block_editor_assets','loadMyBlockFiles');

?>
