// Login Page
add_shortcode( 'login_page', 'login_page' );
function login_page( $atts ) {
	ob_start();
	include('login_page.php');	
	$login_page = ob_get_contents();
	ob_end_clean();
	return $login_page;
};

// Login Form 
add_action( 'init', 'my_add_shortcodes' );
function my_add_shortcodes() {
	add_shortcode( 'my-login-form', 'my_login_form_shortcode' );
};

function my_login_form_shortcode() {
	if ( is_user_logged_in() )
		return wp_login_form( array( 'echo' => false ) );
	return wp_login_form( array( 'echo' => false ) );
};

// Forgot Password Page
add_shortcode( 'forgot_password', 'forgot_password' );
function forgot_password( $atts ) {
	ob_start();
	include('forgot_password.php');	
	$forgot_password = ob_get_contents();
	ob_end_clean();
	return $forgot_password;
};