<?php

/*
  Plugin Name: Custom User Data Display
  Version: 1.0
  Description: Let the user choose which meta data they would prefer to be displayed
  Author: Snigdha
*/


//php form with checkboxes to let users select which data they would like to be displayed
// use shortcode [test] to apply
add_shortcode( 'test', 'test_func' );
function test_init()
{
 function test_func()
  {
    echo '<p>If you are logged in, you can see your details.</p>';
    echo '<p>Select the details you would like to be displayed: </p>';
    echo '<div>
          <form method="post">
          <p><label><input type="checkbox" id="first_name" name="first_name" value="first_name">
           Your first name</label></p>
          <p><label><input type="checkbox" id="last_name" name="last_name" value="last_name">
           Your last name</label></p>
          <p><label><input type="checkbox" id="username" name="username" value="username">
           Your Username</label></p>
          <p><label><input type="checkbox" id="email" name="email" value="email">
           Your Email ID</label></p>
          <br>
          <input type="submit" value="Submit" name="Submit">
          </form>
          </div>';
 }
}
add_action('init', 'test_init');

?>
