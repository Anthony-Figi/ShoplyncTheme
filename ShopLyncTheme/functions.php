<?php

// Include php files
include get_theme_file_path('/includes/shortcodes.php');

// Enqueue needed scripts
function needed_styles_and_scripts_enqueue() {
    
    // Add-ons

    
    // Custom script
    wp_enqueue_script( 'wpbs-custom-script', get_stylesheet_directory_uri() . '/assets/javascript/script.js' , array( 'jquery' ) );
	wp_enqueue_script( 'wpbs-fancybox-script', get_stylesheet_directory_uri() . '/assets/javascript/jquery.fancybox.min.js' , array( 'jquery' ) );

    // enqueue style
	//wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'wp-fancybox-css', get_stylesheet_directory_uri() . '/assets/css/jquery.fancybox.min.css' );
	wp_enqueue_style( 'wp-bootstrap-starter-bootstrap-css2', get_stylesheet_directory_uri() . '/assets/css/theme.css' );
	wp_enqueue_style( 'shoplync-style', get_stylesheet_directory_uri() . '/assets/css/custom.css' );


}
add_action( 'wp_enqueue_scripts', 'needed_styles_and_scripts_enqueue', 99);

function cc_mime_types($mimes) {
$mimes['svg'] = 'image/svg+xml';
return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


add_filter( 'widget_text', 'do_shortcode' );


/*
 *
 * Register all the widget sidebars across the site to enable custom positioning of elements.
 *
 */
function shoplync_starter_widgets_init() {
	//shoplync_after_content
    register_sidebar( array(
        'name'          => esc_html__( 'After Content', 'ShopLyncTheme' ),
        'id'            => 'shoplync_after_content',
        'description'   => esc_html__( 'Add widgets here. Is displayed after page content but before page footer', 'ShopLyncTheme' ),
        'before_widget' => '<section id="%1$s" class="contact-form widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<div class="col-md-9 col-md-offset-3"><h3>',
        'after_title'   => '</h3></div>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Above Footer 1', 'ShopLyncTheme' ),
        'id'            => 'above-footer-1',
        'description'   => esc_html__( 'Add widgets here.', 'ShopLyncTheme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<div class="h3"><span class="widget-title">',
        'after_title'   => '</span></div>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Above Footer 2', 'ShopLyncTheme' ),
        'id'            => 'above-footer-2',
        'description'   => esc_html__( 'Add widgets here.', 'ShopLyncTheme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<div class="h3"><span class="widget-title">',
        'after_title'   => '</span></div>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'wp-bootstrap-starter' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<div class="h3"><span class="widget-title">',
        'after_title'   => '</span></div>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 2', 'wp-bootstrap-starter' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<div class="h3"><span class="widget-title">',
        'after_title'   => '</span></div>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 3', 'wp-bootstrap-starter' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<div class="h3"><span class="widget-title">',
        'after_title'   => '</span></div>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 4', 'ShopLyncTheme' ),
        'id'            => 'footer-4',
        'description'   => esc_html__( 'Add widgets here.', 'ShopLyncTheme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<div class="h3"><span class="widget-title">',
        'after_title'   => '</span></div>',
    ) );
}
add_action( 'widgets_init', 'shoplync_starter_widgets_init', 99 );



/*
 *
 * Redirects the user to the /customers/ page and sets the login variable to 'register'
 *
 */
function account_registration(){
    if ( 'GET' == $_SERVER['REQUEST_METHOD'] ) {
        if ( is_user_logged_in() ) {
            wp_redirect( home_url( '/customers/' ) );
        } else {
			$register_page = home_url( '/customers/' );
            wp_redirect( $register_page.'?login=register' );
        }
        exit;
    }
}
add_action( 'login_form_register', 'account_registration' );


/**
 * Validates and then completes the new user signup process if all went well.
 *
 * @param array $new_user_info  The new user's information
 *
 * @return int|WP_Error         The id of the user that was created, or error if failed.
 */
function register_user( $new_user_info ) {
	require_once SHOPLYNC_PATH.'/includes/class-shoplync-store-info-helpers.php';
	
    $errors = array();
 
    // Email address is used as both username and email. It is also the only
    // parameter we need to validate

 
    if ( username_exists( $new_user_info['email'] ) || email_exists( $new_user_info['email'] ) ) {
        $errors['email'] = 'email_exists';
		$errors['fn'] = $new_user_info['first_name'];
		$errors['ln'] = $new_user_info['last_name'];
		$errors['cn'] = $new_user_info['company_name'];
		$errors['c_url'] = $new_user_info['company_url'];
		$errors['tel'] = $new_user_info['phone'];
		$errors['mail'] = $new_user_info['email'];
        return $errors;
    }
 
    // Generate the password so that the subscriber will have to check email...
    $password = wp_generate_password( 12, false );
	do{
		$login_id = Shoplync_Store_Info_Helpers::random_str(10, '0123456789');
	}while(username_exists( $login_id ));
 
    $user_data = array(
        'user_login'    => $login_id,
        'user_email'    => $new_user_info['email'],
        'user_pass'     => $password,
        'first_name'    => $new_user_info['first_name'],
        'last_name'     => $new_user_info['last_name'],
        'nickname'      => $new_user_info['first_name'].' '.$new_user_info['last_name'],
    );

    $user_id = wp_insert_user( $user_data );
	//store additional information
	update_user_meta( $user_id, 'company_name', $new_user_info['company_name'], true );	
	update_user_meta( $user_id, 'company_url', $new_user_info['company_url'], true );
	update_user_meta( $user_id, 'phone', $new_user_info['phone'], true );	
	
	//Generate SMS login
	update_user_meta( $user_id, 'sms-username', $new_user_info['email'] );
	update_user_meta( $user_id, 'sms-password', Shoplync_Store_Info_Helpers::random_str(10) );
	
	//Mark users as subscribed
	update_user_meta( $user_id, 'user_subscribed', 1);
	
    wp_new_user_notification( $user_id, $password );
 
    return $user_id;
}


/**
 * Handles the registration of a new user.
 *
 * Used through the action hook "login_form_register" activated on wp-login.php
 * when accessed through the registration action.
 */
function validate_new_user() {
    if ( 'POST' == $_SERVER['REQUEST_METHOD'] ) {
        $redirect_url = home_url( '/customers/' );
 
		if(!anr_verify_captcha()){//fails captcha
			$redirect_url = add_query_arg( '?login=register&check', '0', $redirect_url );
			wp_redirect( $redirect_url );
			exit;
		}
        if ( ! get_option( 'users_can_register' )) {
            // Registration closed, display error
            $redirect_url = add_query_arg( 'login', 'disabled', $redirect_url );
        } else {
			if( !isset($_POST['first_name']) || empty($_POST['first_name']) || ctype_space($_POST['first_name'].' ') ||
				!isset($_POST['last_name']) || empty($_POST['last_name']) || ctype_space($_POST['last_name'].' ') ||
				!isset($_POST['company_name']) || empty($_POST['company_name']) || ctype_space($_POST['company_name'].' ') ||
				!isset($_POST['phone']) || empty($_POST['phone']) || ctype_space($_POST['phone'].' ') ||
				!isset($_POST['email']) || empty($_POST['email']) || ctype_space($_POST['email'].' ')){
				//A required field is empty
				$error_inputs = '&err=1';
				$error_inputs = ( (!isset($_POST['first_name']) || empty($_POST['first_name']) || ctype_space($_POST['first_name'].' ') ) ? $error_inputs.'&fname=0' : $error_inputs.'&first_name='.$_POST['first_name'] );
				$error_inputs = ( (!isset($_POST['last_name']) || empty($_POST['last_name']) || ctype_space($_POST['last_name'].' ') ) ? $error_inputs.'&lname=0' : $error_inputs.'&last_name='.$_POST['last_name'] );
				$error_inputs = ( (!isset($_POST['company_name']) || empty($_POST['company_name']) || ctype_space($_POST['company_name'].' ') ) ? $error_inputs.'&cname=0' : $error_inputs.'&company_name='.$_POST['company_name'] );
				$error_inputs = ( (!isset($_POST['phone']) || empty($_POST['phone']) || ctype_space($_POST['phone'].' ') ) ? $error_inputs.'&tel=0' : $error_inputs.'&phone='.$_POST['phone'] );
				$error_inputs = ( (!isset($_POST['email']) || empty($_POST['email']) || ctype_space($_POST['email'].' ') ) ? $error_inputs.'&e-mail=0' : $error_inputs.'&email='.$_POST['email']);
				$error_inputs = ( (isset($_POST['company_url']) && !empty($_POST['email']) & !ctype_space($_POST['email'].' ') ) ? $error_inputs.'&company_url='.$_POST['company_url'] : $error_inputs);
				
				$redirect_url = $redirect_url.'?login=register'.$error_inputs;
			}else {
				$new_user_info = array();
				
				$new_user_info['first_name'] = sanitize_text_field( $_POST['first_name'] );
				$new_user_info['last_name'] = sanitize_text_field( $_POST['last_name'] );
				$new_user_info['company_name'] = sanitize_text_field( $_POST['company_name'] );
				$new_user_info['company_url'] = esc_url( $_POST['company_url'] );
				
				$invalidChars = array('-', '.', '(', ')', ' ');
				$cleaned_tel = preg_replace('/\s+/', '', $_POST['phone'] ); //remove whitespace
				$cleaned_tel = str_replace($invalidChars,'', $cleaned_tel); // remove - . ( )
				
				if(preg_match('/^[0-9]?[0-9]{10}$/', $cleaned_tel)) {
						//CAD phone number length verified
						$new_user_info['phone'] = $cleaned_tel;
				}else {
					$redirect_url = $redirect_url.'?login=register&err=1&phone=0';
					wp_redirect( $redirect_url );
					exit;
				}

				//Cleanup Email
				$sanitize_email = sanitize_email($_POST['email']);
				if(is_email($sanitize_email)){
					$new_user_info['email'] = $sanitize_email;
				}else {
					$redirect_url = $redirect_url.'?login=register&err=1&email=0';
					wp_redirect( $redirect_url );
					exit;
				}

	 
				$result = register_user( $new_user_info );
				
				if ( is_array($result) ) {
					// Parse errors into a string and append as parameter to redirect
					$redirect_url = add_query_arg( '?login=register', '&mail=email_exists'.make_query_args($new_user_info), $redirect_url );
				} else {
					// Success, redirect to login page.
					$redirect_url = home_url( '/customers/' );
					$redirect_url = add_query_arg( 'login', 'new', $redirect_url );
					$redirect_url = add_query_arg( 'registered', $sanitize_email, $redirect_url );
				}
			}
        }
 
        wp_redirect( $redirect_url );
        exit;
    }
}
add_action( 'login_form_register', 'validate_new_user');

/*
* @param array $query_values  A key=>value array for url variables
 *
 * Generates a url string with values from array to be used with $_GET requests
 *
 */
function make_query_args($query_values){
	if(empty($query_values)){
		return '';
	}
	$query_args = '';
	foreach($query_values as $key => $value) {
	  $query_args = $query_args.'&'.$key.'='.$value;
	}
	return $query_args;
}
/*
 *
 * Redirects the user to the /customers/ page and sets the login variable to 'failed'
 *
 */
function login_failed() {
	$login_page  = home_url( '/customers/' );
	wp_redirect( $login_page . '?login=failed' );
	exit;
}
add_action( 'wp_login_failed', 'login_failed' );


/*
 *
 * Redirects the user to the /customers/ page and checks
 * to see if the username and/or password is empty. If empty
 * it will add a variable to the redirect link depending on what field was empty
 *
 */
function verify_username_password( $user, $username, $password ) {
  $login_page  = home_url( '/customers/' );
  $error_inputs = '';
    if( $username == "" || $password == "" ) {
		if($username == ""){ $error_inputs = $error_inputs.'&username=0'; }
		if($password == ""){ $error_inputs = $error_inputs.'&password=0'; }
        wp_redirect( $login_page . "?login=empty".$error_inputs );
        exit;
    }
}
add_filter( 'authenticate', 'verify_username_password', 1, 3);

/*
 *
 * Redirects the user to the /customers/ page and sets the login variable to 'lostpassword'
 *
 */
function login_reset_password() {
	global $errors;
	$error = '';
	if( isset($errors) && !empty($errors->get_error_code()) ) {
		$error = '&error='.$errors->get_error_code();
	}
	$login_page  = home_url( '/customers/' );
	wp_redirect( $login_page . '?login=lostpassword' . $error );
	exit;
}
add_action('lost_password', 'login_reset_password', 10, 0);


/*
 *
 * Receives the users password reset request and processes the data
 *
 */
function do_password_lost() {
    if ( 'POST' == $_SERVER['REQUEST_METHOD'] ) {
		
		if(!anr_verify_captcha()){//fails captcha
			$redirect_url = home_url('/customers/?login=lostpassword&err=1');
			wp_redirect( $redirect_url );
			exit;
		}
		
        $errors = retrieve_password();
        if ( is_wp_error( $errors ) ) {
            // Errors found
            $redirect_url = home_url( '/customers/?login=lostpassword&err=2' );
            $redirect_url = add_query_arg( 'errors', join( ',', $errors->get_error_codes() ), $redirect_url );
        } else {
            // Email sent
            $redirect_url = home_url( '/customers/' );
            $redirect_url = add_query_arg( 'checkemail', 'confirm', $redirect_url );
        }
 
        wp_redirect( $redirect_url );
        exit;
    }
}
add_action( 'login_form_lostpassword', 'do_password_lost');



/*
 *
 * Redirect the user to a custom password reset page or login page if there are errors
 *
 */
function reset_password_page() {
    if ( 'GET' == $_SERVER['REQUEST_METHOD'] ) {
        // Verify key / login combo
        $user = check_password_reset_key( $_REQUEST['key'], $_REQUEST['login'] );
        if ( ! $user || is_wp_error( $user ) ) {
            if ( $user && $user->get_error_code() === 'expired_key' ) {
                wp_redirect( home_url( '/customers/?login=expiredkey' ) );
            } else {
                wp_redirect( home_url( '/customers/?login=invalidkey' ) );
            }
            exit;
        }
 
        $redirect_url = home_url( '/customers/' );
		$redirect_url = add_query_arg( 'rp', 1, $redirect_url );
        $redirect_url = add_query_arg( 'login', esc_attr( $_REQUEST['login'] ), $redirect_url );
        $redirect_url = add_query_arg( 'key', esc_attr( $_REQUEST['key'] ), $redirect_url );
 
        wp_redirect( $redirect_url );
        exit;
    }
}
add_action( 'login_form_rp', 'reset_password_page');
add_action( 'login_form_resetpass', 'reset_password_page');

/*
 *
 * Resets the user's password if the password reset form was submitted.
 *
 */
function do_password_reset(){
    if ( 'POST' == $_SERVER['REQUEST_METHOD'] ) {
        $rp_key = $_REQUEST['rp_key'];
        $rp_login = $_REQUEST['rp_login'];
 
        $user = check_password_reset_key( $rp_key, $rp_login );
 
        if ( ! $user || is_wp_error( $user ) ) {
            if ( $user && $user->get_error_code() === 'expired_key' ) {
                wp_redirect( home_url( '/customers/?login=expiredkey' ) );
            } else {
                wp_redirect( home_url( '/customers/?login=invalidkey' ) );
            }
            exit;
        }
 
        if ( isset( $_POST['pass1'] ) ) {
            if ( $_POST['pass1'] != $_POST['pass2'] ) {
                // Passwords don't match
                $redirect_url = home_url( '/customers/' );
 
                $redirect_url = add_query_arg( 'key', $rp_key, $redirect_url );
                $redirect_url = add_query_arg( 'login', $rp_login, $redirect_url );
                $redirect_url = add_query_arg( 'err', '1', $redirect_url );
 
                wp_redirect( $redirect_url );
                exit;
            }
 
            if ( empty( $_POST['pass1'] ) ) {
                // Password is empty
                $redirect_url = home_url( '/customers/' );
 
                $redirect_url = add_query_arg( 'key', $rp_key, $redirect_url );
                $redirect_url = add_query_arg( 'login', $rp_login, $redirect_url );
                $redirect_url = add_query_arg( 'err', '0', $redirect_url );
 
                wp_redirect( $redirect_url );
                exit;
            }
 
            // Parameter checks OK, reset password
            reset_password( $user, $_POST['pass1'] );
            wp_redirect( home_url( '/customers/?pass-changed=1' ) );
        } else {
            echo "Invalid request.";
        }
 
        exit;
    }
	
}
add_action( 'login_form_rp', 'do_password_reset');
add_action( 'login_form_resetpass', 'do_password_reset');

//For Dev Only
function move_admin_bar() {
echo '
<style type="text/css">
html {
    margin-top: 0 !important;
	margin:0 !important;
}
#wpadminbar { 
	/*top: unset !important;*/
	/*bottom: 0;*/
	opacity:0.1;
	/*transform: translateY(20px);*/
	transform: translateY(-25px);
	transition: transform 330ms ease-in-out, opacity 330ms ease-in;
}
#wpadminbar:hover {
	opacity:1;
	transform: translateY(0);
}
</style>';
}
add_action( 'wp_head', 'move_admin_bar', 99 );