<?php

class FormCommon {
	private static $_instance = null;
	private $fields;
	public function __construct($fields = array()) {
		$this->fields = $fields;
		add_action('wp_ajax_formCommonAjax', array($this, 'formCommonAjax'));
		add_action('wp_ajax_nopriv_formCommonAjax', array($this, 'formCommonAjax'));
		add_action('init', array($this, 'initRegisterPostType'));
		//add_action('wp_enqueue_scripts', array($this, 'enqueue'));
		add_filter('script_loader_tag', array($this, 'addDeferAttrScript'), 10, 2);
		//add_action('manage_posts_extra_tablenav', array($this, 'admin_order_list_top_bar_button'), 20, 1);
		//add_action('admin_init', array($this, 'sub_menu_pages_export_contact_handle'));
	}

	public static function instance() {
		if (is_null(self::$_instance)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public static function security() {
		wp_nonce_field('form_submit', 'contact_nonce');
	}

	public function addDeferAttrScript($tag, $handle) {
		if ('contact-form-js' !== $handle) {
			return $tag;
		}

		return str_replace(' src', 'defer src', $tag);
	}

	/**
	 * Post Type: Form.
	 */

	public function initRegisterPostType() {
		$labels = [
			"name" =>"Form register",
			"singular_name" => "Form register",
		];

		$args = [
			"label" =>"Form register",
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
			'capabilities' => array(
				'create_posts' => 'do_not_allow', // false < WP 4.5, credit @Ewout
			),
		];

		register_post_type("register", $args);
	}

	public function formCommonAjax() {
		if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'form_submit')) {
			wp_send_json_error('Unable to confirm the security key');
			exit;
		}
		$post_arr = array(
			'post_title' => $_POST['data'][$_POST['postTitle']],
			'post_content' => '',
			'post_status' => 'pending',
			'post_type' => $_POST['postType'],
			'meta_input' => $_POST['data'],
		);
		$resp = wp_insert_post($post_arr);
		if ($resp) {
			wp_send_json_success('Gửi thông tin thành công');
		} else {
			wp_send_json_error('Có lỗi xảy ra');
		}
	}
	
}

