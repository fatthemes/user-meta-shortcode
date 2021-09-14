<?php

/*
  Plugin Name: User Meta Select
  Description: Adds a new block where user can select the meta data to be displayed
  Version: 1.0
  Author: Snigdha
*/

if(! defined('ABSPATH'))
   exit;

class MyUserMetaSelect{
  function __construct(){
    add_action('init',array($this,'adminAsset'));
  }
  function adminAsset(){
    wp_register_script('myblock',plugin_dir_url(__FILE__).'build/index.js',array('wp-blocks','wp-element'));
    register_block_type('ourplugin/usermetaselect', array(
      'editor_script'=>'myblock',
      'render_callback'=> array($this, 'displayUserMeta')
    ));
  }

  function displayUserMeta($attributes){
    $user_id = get_current_user_id();
    $data = get_userdata( $user_id );
    $username = $data->user_login;
    $user_email = $data->user_email;
    $first_name = $data->first_name;
    $last_name = $data->last_name;
    if( $attributes['choice'] == 1) {
       $message = 'First Name: '.$first_name;
     }
    elseif ($attributes['choice'] == 2) {
      $message = 'Last Name: '.$last_name;
    }
    elseif ($attributes['choice'] == 3) {
      $message = 'User ID: '.$username;
    }
    elseif ($attributes['choice'] == 4){
      $message = 'User Email: '.$user_email;
    }
    return '<p>If you are logged in, you will be able to see the following user data: </p>'.$message;

  }

}

$userMetaSelect = new MyUserMetaSelect();

?>
