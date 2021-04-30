<?php 

$login_msg = (isset($_GET['login']) ? $_GET['login'] : '' );
$login_reset = (isset($_GET['checkemail']) ? $_GET['checkemail'] : '' );
$new_password_page = (isset($_GET['rp']) ? true : false );
$new_password_changed = (isset($_GET['pass-changed']) ? true : false );

$dl = (isset($_GET['dl']) ? $_GET['dl'] : false );

//'a string' == 0 also evaluates to true because any string is converted into an integer when compared with an integer. 
//If PHP can't properly convert the string then it is evaluated as 0. So 0 is equal to 0, which equates as true. 
if($login_msg === 'lostpassword' && $login_msg != ''){
	if(is_user_logged_in()){
		echo '<script>location.href ="'.home_url( '/customers/' ).'" </script>';
	}
	get_template_part('_partials/page', 'pass-reset');
}else if( ($login_msg === 'expiredkey' || $login_msg === 'invalidkey') && $login_msg != ''){
	if(is_user_logged_in()){
		echo '<script>location.href ="'.home_url( '/customers/').'" </script>';
	}
	get_template_part('_partials/page', 'pass-reset-invalid');
}else if($new_password_page){
	if(is_user_logged_in()){
		echo '<script>location.href ="'.home_url( '/customers/' ).'" </script>';
	}
	get_template_part('_partials/page', 'pass-reset-form');
}else if(($login_reset === 'confirm' && $login_reset != '') || $new_password_changed){
	if(is_user_logged_in()){ 
		get_template_part('_partials/page', 'logout-countdown');

	}else {
		get_template_part('_partials/page', 'pass-reset-confirmed');
	}
}else if($login_msg === 'register' && $login_msg != ''){
	if(is_user_logged_in()){
		echo '<script>location.href ="'.home_url( '/customers/' ).'" </script>';
	}
	get_template_part('_partials/page', 'register');
}else if($login_msg === 'new' && $login_msg != ''){
	if(is_user_logged_in()){
		echo '<script>location.href ="'.home_url( '/customers/' ).'" </script>';
	}
	get_template_part('_partials/page', 'register-new');
}else if($dl){
	$user_id = get_current_user_id();
	$approved = get_the_author_meta( 'user-status', $user_id);
	if(is_user_logged_in() && $user_id != 0 && $approved){
		$links = get_option('shoplync-store-info');
		switch ((int)$dl){
			case 1:
				echo '<script>location.href ="'.$links['link-1'].'" </script>';
				break;
			case 2:
				echo '<script>location.href ="'.$links['link-2'].'" </script>';
				break;
			case 3:
				echo '<script>location.href ="'.$links['link-3'].'" </script>';
				break;
		}
	}else {
		get_template_part('_partials/page', 'not-authorized');
	}
}else {
	if (is_user_logged_in()){
		$user_id = get_current_user_id();
		if($user_id != 0){
			$approved = get_the_author_meta( 'user-status', $user_id); 
			if($approved){
				get_template_part('_partials/page', 'account');
			}else {
				get_template_part('_partials/page', 'account-pending');
			}
		}
	}else{
		get_template_part('_partials/page', 'login');
	}
}
?>