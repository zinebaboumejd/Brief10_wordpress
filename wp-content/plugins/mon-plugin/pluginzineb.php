<?php
/*
Plugin Name: zineb 
Plugin URI: https://wordpress.com
Description: form de feedback
Version: 1.0
Author: zineb
Author URI: https://wordpress.com
*/

if( !defined('ABSPATH'))
{
    die;
}

class pluginform{

    public function __construct()
    {
        //Create custom post type
        add_action('init', array($this, 'create_custom_post_type'));   
        
        //Add assets (js, css, etc)
        add_shortcode('feedback-form', array($this, 'load_shortcode'));

        //Add shortcode
        add_action('wp_enqueue_scripts', array($this, 'load_assets'));
    }

    public function create_custom_post_type()
    {
        $args= array(
            'public' => true,
            'has_archive' => true,
            'supports' => array('title'),
            'exlude_from_search' => true,
            'publicly_queryable' => false,
            'capability' => 'manage_options',
            'labels' => array(
                'name' => 'Feedback Form',
                'singular_name' => 'Feedback_Form'
            ),
            'menu_icon' => 'fa fa-commenting-o'
        );

        register_post_type('simple_feedback_form', $args);
    }

    public function load_assets()
    {
        wp_enqueue_style(
            'simple-feedback-form',
            plugin_dir_url(__FILE__) . 'css/style.css',
            array(), 
            1, 
            'all'
        );
    }

    public function load_shortcode()
    {?>
     <script src="https://cdn.tailwindcss.com"></script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <div style="background-image:url('https://cdn.pixabay.com/photo/2016/02/23/07/37/wall-1217083_960_720.jpg')  ;" class="bg-no-repeat bg-cover object-cover  m-auto rounded-lg p-5">
    <h2 style="text-align:center ;" class=" font-black text-lg text-5xl text-black content-center m-4"> Feedback Form</h2>
    <div class="">
        <h3>Aidez-nous à mieux vous servir en prenant quelques minutes. </h3>
        <form action="http://localhost/brief10-plugin/hello/" method="post" class="">
            <h2 class="">Dans quelle mesure étiez-vous satisfait de notre service ?</h2>
            <ul class="">
            <li>
                <input class="" type="radio" name="view" value="very satisfied" id="very satisfied" required> 
                <label class="" for="very satisfied">very satisfied</label>
                <div class=""></div>
            </li>
            <li>
                <input class="" type="radio" name="view" value="satisfied" id="satisfied"> 
                <label class="" for="satisfied"> satisfied</label>
                <div class=""></div>
            </li>
            <li>
                <input class="" type="radio" name="view" value="neutral" id="neutral">
                <label class="" for="neutral">neutral</label>
                <div class=""></div>
            </li>
            <li>
                <input class="" type="radio" name="view" value="unsatisfied" id="unsatisfied"> 
                <label class="" for="unsatisfied">unsatisfied</label>
                <div class=""></div>

            <li>
                <input class="" type="radio" name="view" value="very unsatisfied" id="very unsatisfied"> 
                <label class="" for="very unsatisfied">very unsatisfied</label>
                <div class=""></div>
            </li>
            </ul>
            <h2 class="">Si vous avez des commentaires spécifiques, écrivez-nous..</h2>
            <div><input class="mt-5" style="background-color:#EEE6D8; width: 100%; padding: 12px 20px; margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius:4px;box-sizing: border-box;" type="text" placeholder="Your Name (optional)" name="name"/></div>
            <div><input class="mt-5" style="background-color:#EEE6D8; width: 100%; padding: 12px 20px; margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius:4px;box-sizing: border-box;" type="email" placeholder="Your Email (optional)" name="email"/></div>
            <div><textarea placeholder="message"  style="background-color:#EEE6D8;" class="h-24 w-full rounded-lg" name="comments" required=""></textarea></div>

            <div><input type="hidden" name="id" value="<?php echo get_the_ID() ?> "></div>
             <input type="submit" name="submit" value="submit" style="border-radius: 12px;background-color:#EEE6D8; " class="btn mt-4 " /> 
        </form>
    </div>
</div>

    <?php }
}

new pluginform;

global $wpdb;
if (isset($_POST['submit'])) {
  
   $name = $_POST['name'];
   $email = $_POST['email'];
   $comments = $_POST['comments'];
   $id = $_POST['id'];
   $view = $_POST['view'];
   $wpdb->insert('wp_feedback', array('comments' => $comments, 'name' => $name,'view'=>$view, 'email' => $email, 'page_id' => $id));
//    echo " <script> alert('thank you for send us your feedback ') </script>";
   header('refresh:0', 'Location: ' . $_SERVER['HTTP_REFERER']);
   exit();
}