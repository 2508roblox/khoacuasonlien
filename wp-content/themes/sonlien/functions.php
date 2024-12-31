<?php

define('THEME_DIR', get_template_directory());
define('THEME_URI', get_template_directory_uri());
define('THEME_ASSETS', get_template_directory_uri() . '/assets');
define('ADMIN_AJAX_URL', admin_url('admin-ajax.php'));
define('HOME_URL', home_url('/'));

//Shares
require_once('inc/Shared.php');
//menu
require_once('inc/Menu.php');
//options page
require_once('inc/Options.php');
//suport woo
require_once('inc/Woocommerce.php');
//pagiantion
require_once('inc/Panigation.php');
//generral_infomation
require_once('inc/General-information.php');
//Frequently Asked Questions
require_once('inc/Questions.php');
// About
require_once('inc/About.php');
// Project list
require_once('inc/Projects.php');
// User
require_once('inc/User.php');
//Sale Point
require_once('inc/Sale-point.php');
//Quote Price
// require_once('inc/Quote-price.php');
//contact form

require_once('inc/contact-form/ContactForm.php');
$formCommon = new FormCommon();
// $contactFrom = new ContactForm(array(
//     'name', 'phone', 'district', 'problem', 'submit_nonce'
// ));
// require_once('inc/contact-form/ContactProductDetail.php');
// $contactFromProductDetail = new ContactProductDetail(array(
//     'nameDetailP', 'phoneDetailP', 'questionDetailP', 'submit_nonce'
// ));


class MainCore {
    private static $_instance = null;

    function __construct() {
        add_action('after_setup_theme', array($this, 'afterSetupTheme'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue'));
    }

    public static function instance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function afterSetupTheme () {
        load_theme_textdomain('corex', get_template_directory() . '/languages');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support( 'woocommerce' );
        
    }

    public function enqueue() {
        wp_enqueue_style('styles', THEME_URI . '/style.css');
        
        wp_enqueue_style('swiper-js-style', THEME_URI . '/assets/js/Swiper/dist/css/swiper.min.css');

        //wp_enqueue_style('swiper-css', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css');

        wp_enqueue_style('font-awesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');

        wp_enqueue_style('fancybox-css', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css');

        wp_enqueue_style('aos-css', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.css');

        wp_enqueue_script('scripts', THEME_URI . '/assets/js/scripts.js', array('jquery'));
        wp_enqueue_script('validator-js', THEME_URI . '/assets/js/validator.js', array('jquery'));
        wp_enqueue_script('swiper-js', THEME_URI . '/assets/js/Swiper/dist/js/swiper.min.js', array('jquery'));
       
        //wp_enqueue_script('swiper-js', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js', array('jquery'));

        wp_enqueue_script('fancybox-js', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js', array('jquery'));

        wp_enqueue_script('aos-js', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.js', array('jquery'));

        $wp_script_data = array(
            'AJAX_URL' => ADMIN_AJAX_URL,
            'HOME_URL' => HOME_URL
        );

        wp_localize_script('scripts', 'obj', $wp_script_data);
    }
}

MainCore::instance();