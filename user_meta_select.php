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
    wp_register_script('myblockScript',plugin_dir_url(__FILE__).'build/index.js',array('wp-blocks','wp-element','wp-i18n', 'wp-editor'));
    wp_register_style('myblockStyle', plugin_dir_url(__FILE__) . 'build/editor.css');
    wp_register_style('myblockStyleComplete', plugin_dir_url(__FILE__) . 'build/style-index.css');
    register_block_type('ourplugin/usermetaselect', array(
      'editor_script'=>'myblockScript',
      'editor_style' => 'myblockStyle',
      'style' => 'myblockStyleComplete',
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
       if(!empty($first_name))
       {
          $message = 'First Name: '.$first_name;
       }
       else {
         $message = 'First Name: This field is empty';
       }
     }
    elseif ($attributes['choice'] == 2) {
      if (!empty($last_name))
      {
        $message = 'Last Name: '.$last_name;
      }
      else{
        $message = 'Last Name: This field is empty';
      }
    }
    elseif ($attributes['choice'] == 3) {
      if(!empty($username))
      {
        $message = 'User ID: '.$username;
      }
      else {
        $message = 'User ID: This field is empty';
      }
    }
    elseif ($attributes['choice'] == 4){
      if(!empty($user_email))
      {
        $message = 'User Email: '.$user_email;
      }
      else {
        $message = 'User Email: This field is empty';
      }
    }
    ob_start();?>
     <div>
     <p>If you are logged in, you will be able to see the following user data: </p><p class="userdata"><?php echo esc_html($message);?></p></div>
     <?php return ob_get_clean();

  }

}

$userMetaSelect = new MyUserMetaSelect();

?>
