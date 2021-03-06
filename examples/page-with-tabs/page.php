<?php
/*
    Page with Tabs
*/

include_once __DIR__ . '/../../better-wp-admin-api/init.php';

// creates a page
$my_page = wp_create_admin_page( [
    'menu_name'         => 'Page with Tabs',
    'id'                => 'page-with-tabs',
    'options_prefix'    => 'with_tabs_',
] );

// hook your setup function
$my_page->on_setup( 'my_prefix_setup_my_page' );

// setup this page (add fields, add hooks, etc)
function my_prefix_setup_my_page ( $the_page, $hook_suffix ) {

    // changes default tab title
    $the_page->set_tab([
        'id'   => 'default',
        'name' => 'General',
        'desc' => 'Tabs can have description and with **markdown**! Also <u>some html tags are allowed too.</u>',
    ]);

    // creates a second tab
    $the_page->set_tab([
        'id'   => 'extra',
        'name' => 'Extra'
    ]);

    // creates a third tab
    $the_page->set_tab([
        'id'   => 'about',
        'name' => 'About'
    ]);

    // creates a text field in default tab
    $the_page->add_field( [
        // fields without "tag" parameter will appears in default tab
        'type'      => 'text',
        'id'        => 'text_field',
        'label'     => 'Text field',
    ] );

    // creates a select field in "extra" tab
    $the_page->add_field( [
        'tab'       => 'extra',

        'type'      => 'code',
        'id'        => 'code_field',
        'label'     => 'Code editor field',

        'lang'      => 'javascript',
        'default'   => 'console.log(\'hello world\');',
    ] );

    $the_page->add_field( [
        'tab'       => 'extra',

        'type'      => 'content',
        'id'        => 'content_field',
        'label'     => 'Content editor field',

        'default'   => 'Hello world!',
    ] );

    $the_page->add_field( [
        'tab'       => 'extra',

        'type'      => 'color',
        'id'        => 'color_field',
        'label'     => 'Color picker field',

        'default'   => 'rgb(255,0,0)', // or a hex code
    ] );

    // creates a html field in "about" tab
    $the_page->add_field( [
        'tab'       => 'about',

        'type'      => 'html',
        'id'        => 'html_field',
        'label'     => 'HTML field',
        'content'   => '<code>' . date('Y') . '. All rights reserved.</code>'
    ] );

}