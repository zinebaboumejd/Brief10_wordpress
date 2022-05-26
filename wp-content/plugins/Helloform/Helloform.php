<?php
/**
 * @package Helloforms
 * @version 1.0.0
 */
/*
 Plugin Name: Helloform
Plugin URI: https://brief10-plugin.com
Description: ma 1er plugin pour formulair
Author: zineb aboumejd
Version: 1.0.0
Author URI:https://brief10-plugin.com
 */
add_action('wp_form','say_hello');
add_filter('default-content','contenu_par_defaut');
function registration_form($first_name, $last_name,$bio ) {
    echo '
    <style>
    div {
      margin-bottom:2px;
    }
     
    input{
        margin-bottom:4px;
    }
    </style>
    ';
 
    echo '
    <form action="' . $_SERVER['REQUEST_URI'] . '" method="post">
  
    <div>
    <label for="firstname">First Name</label>
    <input type="text" name="fname" value="' . ( isset( $_POST['fname']) ? $first_name : null ) . '">
    </div>
     
    <div>
    <label for="website">Last Name</label>
    <input type="text" name="lname" value="' . ( isset( $_POST['lname']) ? $last_name : null ) . '">
    </div>
     
    <div>
    <label for="bio">About / Bio</label>
    <textarea name="bio">' . ( isset( $_POST['bio']) ? $bio : null ) . '</textarea>
    </div>
    <input type="submit" name="submit" value="Register"/>
    </form>
    ';
}
// ( isset( $_POST['lname'] ) ? $last_name : null );
function registration_validation(  $first_name, $last_name, $bio )  {
    global $reg_errors;
    $reg_errors = new WP_Error;
    if ( empty( $username ) || empty( $password ) || empty( $email ) ) {
        $reg_errors->add('field', 'Required form field is missing');
    }
    // if ( 4 > strlen( $username ) ) {
    //     $reg_errors->add( 'username_length', 'Username too short. At least 4 characters is required' );
    // }
    // if ( username_exists( $username ) )
    // $reg_errors->add('user_name', 'Sorry, that username already exists!');
    // if ( ! validate_username( $username ) ) {
    //     $reg_errors->add( 'username_invalid', 'Sorry, the username you entered is not valid' );
    // }
    // if ( 5 > strlen( $password ) ) {
    //     $reg_errors->add( 'password', 'Password length must be greater than 5' );
    // }
    // if ( !is_email( $email ) ) {
    //     $reg_errors->add( 'email_invalid', 'Email is not valid' );
    // }
    // if ( email_exists( $email ) ) {
    //     $reg_errors->add( 'email', 'Email Already in use' );
    // }
    // if ( ! empty( $website ) ) {
    //     if ( ! filter_var( $website, FILTER_VALIDATE_URL ) ) {
    //         $reg_errors->add( 'website', 'Website is not a valid URL' );
    //     }
    // }
    // if ( is_wp_error( $reg_errors ) ) {
 
    //     foreach ( $reg_errors->get_error_messages() as $error ) {
         
    //         echo '<div>';
    //         echo '<strong>ERROR</strong>:';
    //         echo $error . '<br/>';
    //         echo '</div>';
             
    //     }
     
    // 
}
function complete_registration() {
    global $reg_errors, $first_name, $last_name, $bio;
    if ( 1 > count( $reg_errors->get_error_messages() ) ) {
        $userdata = array(
        'first_name'    =>   $first_name,
        'last_name'     =>   $last_name,
        'description'   =>   $bio,
        );
        // $user = wp_insert_user( $userdata );
        // echo 'Registration complete. Goto <a href="' . get_site_url() . '/wp-login.php">login page</a>.';   
    }
}
function custom_registration_function() {
    if ( isset($_POST['submit'] ) ) {
        registration_validation(
        $_POST['fname'],
        $_POST['lname'],
        $_POST['bio']
        );
         
        // sanitize user form input
        global $first_name, $last_name, $bio;
       
        $first_name =   sanitize_text_field( $_POST['fname'] );
        $last_name  =   sanitize_text_field( $_POST['lname'] );
        $bio        =   esc_textarea( $_POST['bio'] );
 
        // call @function complete_registration to create the user
        // only when no WP_error is found
        complete_registration(
      
        $first_name,
        $last_name,
        $bio
        );
    }
 
    registration_form(
        
        $first_name,
        $last_name,
        $bio
        );
}


// Register a new shortcode: [cr_custom_registration]
add_shortcode( 'cr_custom_registration', 'custom_registration_shortcode' );
 
// The callback function that will replace [book]
function custom_registration_shortcode() {
    ob_start();
    custom_registration_function();
    return ob_get_clean();
}
?>
