<?php

class ContactProductDetail {
    private static $_instance = null;
    private $fields;

    public function __construct($fields = array()) {
        $this->fields = $fields;
        add_action('wp_ajax_contactFormAjaxProductDetail', array($this, 'contactFormAjaxProductDetail'));
        add_action('wp_ajax_nopriv_contactFormAjaxProductDetail', array($this, 'contactFormAjaxProductDetail'));
        add_action('init', array($this, 'initContactPostType'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue'));

    }

    public static function instance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public static function security() {
        wp_nonce_field( 'contact_form_productDetail_submit', 'contact_productDetail_nonce' );
    }

    public function enqueue() {
        wp_enqueue_script('contact-form-js', THEME_URI . '/inc/contact-form/ContactForm.js', array('jquery'));
        $wp_script_data = array(
            'AJAX_URL' => ADMIN_AJAX_URL,
            'HOME_URL' => HOME_URL
        );
        wp_localize_script('contact-form-js', 'obj', $wp_script_data);
    }

    /**
     * Post Type: REGISTER CONSULTANT.
     */
    public function initContactPostType() {
        $labels = [
            "name" => __("Customer inquiries", "corex"),
            "singular_name" => __("Customer inquiries", "corex"),
        ];

        $args = [
            "label" => __("Customer inquiries", "corex"),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_rest" => false,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "has_archive" => false,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "delete_with_user" => false,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => ["slug" => "contact", "with_front" => true],
            "query_var" => true,
            "menu_icon" => "dashicons-buddicons-pm",
            "supports" => ["title", "custom-fields"],
        ];

        register_post_type("custome_inquiries", $args);
    }

    public function contactFormAjaxProductDetail() {
        $errors = array();
        if (!isset($_POST['contact_productDetail_nonce']) || !wp_verify_nonce($_POST['contact_productDetail_nonce'], 'contact_form_productDetail_submit')) {
            wp_send_json_error(__('Không thể xác nhận mã khoá bảo mật', 'corex'));
            exit;
        }

        $fields = array();

        foreach ($_POST as $key => $data) {
            if (in_array($key, $this->fields)) {
                if (empty($data)) {
                    array_push($errors, array($key));
                } else {
                    $fields[$key] = sanitize_text_field($data);
                }
            }
        }

        if ( empty($fields['nameDetailP']) || empty($fields['phoneDetailP']) || empty($fields['questionDetailP'])){
            wp_send_json_error(__('Vui lòng điền đầy đủ thông tin!', 'corex'));
        }

        // Check phone
        if (!empty($fields['phoneDetailP'])) {
            if (!preg_match('/^08([0-9]{8})|09([0-9]{8})|03([0-9]{8})|05([0-9]{8})|07([0-9]{8})$/', $fields['phoneDetailP'])) {
                wp_send_json_error(__('Số điện thoại không hợp lệ!', 'corex'));
            }
        }

        if (!empty($errors)) {
            wp_send_json_error($errors);
        }

        $post_arr = array(
            'post_title' => $fields['nameDetailP'] . ' - ' . $fields['phoneDetailP'],
            'post_content' => '',
            'post_status' => 'pending',
            'post_type' => 'custome_inquiries',
            'meta_input' => $fields
        );

        $resp = wp_insert_post($post_arr);

        if ($resp) {
            wp_send_json_success(__('Gửi thành công', 'corex'));
        } else {
            wp_send_json_error(__('Lỗi, không thể tạo đăng kí mới', 'corex'));
        }
    }
}
