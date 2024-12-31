<?php
add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );
function my_show_extra_profile_fields( $user ) { ?>
    <h3>Personal information</h3>
    <table class="form-table">
        <tr>
            <th><label for="birthday">Birthday</label></th>
            <td>
                <input type="text" name="birthday" id="birthday" value="<?php echo esc_attr( get_the_author_meta( 'birthday', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">Enter your birthday: 01/01/1999</span>
            </td>
        </tr>
    </table>
<?php } ?>

<?php 
add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );
    function my_save_extra_profile_fields( $user_id ) {
        if ( !current_user_can( 'edit_user', $user_id ) ) return false;
        update_usermeta( $user_id, 'birthday', $_POST['birthday'] );
    } 
?>

<?php
add_action('wp_ajax_signinForm', 'signinForm');
add_action('wp_ajax_nopriv_signinForm', 'signinForm');
function signinForm(){
    $errors = array();
    if (!isset($_POST['nonce_field_signin']) || !wp_verify_nonce($_POST['nonce_field_signin'], 'nonce_field_signin_submit')) {
        wp_send_json_error(__('Phiên làm việc đã hết, vui lòng tải lại trang và thử lại.', 'corex'));
        exit;
    }

    $fields = array();
    foreach ($_POST as $key => $data) {
        $fields[$key] = sanitize_text_field($data);
    }

    $user = get_user_by('email', $fields['email']);
    if($user){
        wp_send_json_error(__('Email này đã được đăng ký.', 'corex'));
        exit;
    }

    $userdata = array(
        'user_login'    =>  convertStr($fields['username']). '-' .$fields['email'],
        'user_nicename'  => convertStr($fields['username']),
        'display_name'  => $fields['username'],
        'user_email' => $fields['email'],
        'user_pass'=> $fields['pwd'], //'user_pass'=>wp_hash_password('123456') -> Create a hash (encrypt) of a plain text password.
        'role' => 'customer'
    );
    $user_id = wp_insert_user( $userdata ) ;

    if(!is_wp_error($user_id)){
        if(isset($fields['birthday'])) {
            update_user_meta( $user_id, 'birthday', sanitize_text_field( $fields['birthday']));
        }
        wp_send_json_success(__('Đăng kí thành công.', 'corex'));
    }else{
        wp_send_json_error(__('Lỗi, không thể tạo đăng kí mới.', 'corex'));
    }
}


add_action('wp_ajax_loginForm', 'loginForm');
add_action('wp_ajax_nopriv_loginForm', 'loginForm');
function loginForm(){
    $errors = array();
    if (!isset($_POST['nonce_field_login']) || !wp_verify_nonce($_POST['nonce_field_login'], 'nonce_field_login_submit')) {
        wp_send_json_error(__('Phiên làm việc đã hết, vui lòng tải lại trang và thử lại.', 'corex'));
        exit;
    }

    $info = array();
    $info['user_login'] = $_POST['email'];
    $info['user_password'] = $_POST['password'];
    $info['remember'] = true;
    $user_signon = wp_signon( $info, false );
    if (is_wp_error($user_signon) ){
        wp_send_json_error(__('Tài khoản hoặc mật khẩu không chính xác.', 'corex'));
    } else {
        wp_send_json_success(__('Đăng nhập thành công, Chuyển hướng...', 'corex'));
    }
}

// CHANGE PASSWORD
