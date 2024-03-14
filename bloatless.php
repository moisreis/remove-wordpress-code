<?php
/*
Plugin Name: Remove WordPress Code
Description: This plugin removes unnecessary scripts and styles from WordPress.
Version: 1.0
Author: Moisés Reis
License: GPL2
*/

/**
 * Remove 'wpemojiSettings' from the environment
 */
function sdb_remove_wpemoji()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');
}
add_action('init', 'sdb_remove_wpemoji');

/**
 * Disable Gutenberg styles
 */
function sdb_deregister_styles()
{
    wp_dequeue_style('global-styles');
}
add_action('wp_enqueue_scripts', 'sdb_deregister_styles', 100);
