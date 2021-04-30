<?php 
$user_id = get_current_user_id();
$user = new WP_User($user_id);
$info_messages = array();    
 

/* If profile was saved, update profile. */
if ( is_user_logged_in() && 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user-info' ) {



    /* Update user information. */
    if ( !empty( $_POST['user_firstname'] ) ){
		update_user_meta( $user_id, 'first_name', esc_attr( $_POST['user_firstname'] ) );
    }
	if ( !empty( $_POST['user_lastname'] ) ){
		update_user_meta( $user_id, 'last_name', esc_attr( $_POST['user_lastname'] ) );
    }
	
	if ( !empty( $_POST['user_company_name'] ) ){
		update_user_meta( $user_id, 'company_name', esc_attr( $_POST['user_company_name'] ) );
    }
	if ( !empty( $_POST['user_company_url'] ) ){
		update_user_meta( $user_id, 'company_url', esc_attr( $_POST['user_company_url'] ) );
    }
	
	if ( !empty( $_POST['user_phone'] ) ){
		update_user_meta( $user_id, 'phone', esc_attr( $_POST['user_phone'] ) );
    }
	
	if ( !empty( $_POST['user_subscribed'] ) ){
		update_user_meta( $user_id, 'user_subscribed', 1);
		//add to list
		$options = get_option('shoplync-store-info');
		array_push($options['shoplync-mailing-list'], $_POST['user_email']);//add email to mailing list
		update_option('shoplync-store-info', $options);	
    }else {
		update_user_meta( $user_id, 'user_subscribed', 0);
		//remove from mailing list
		$options = get_option('shoplync-store-info');
		$options['shoplync-mailing-list'] = array_values( array_diff( $options['shoplync-mailing-list'], array($_POST['user_email']) ) );
		update_option('shoplync-store-info', $options);	
	}
	
	if(stripslashes($user->user_email) != $_POST['user_email']) {
		if(!empty( $_POST['user_email']) && !username_exists($_POST['user_email']) && !email_exists($_POST['user_email']) ){
			$email_cleaned = sanitize_email($_POST['user_email']);
			
			if(is_email($email_cleaned)){
				$usr_args = array(
					'ID' => $user_id,
					'user_email' => esc_attr( $email_cleaned  )
				);
				wp_update_user( $usr_args);
				
				$user_subscribed = get_user_meta( $user_id, 'user_subscribed', true);
				if($user_subscribed){
					//update mailing list only if user is subscribed
					$options = get_option('shoplync-store-info');
					array_push($options['shoplync-mailing-list'], $email_cleaned);//add email to mailing list
					$options['shoplync-mailing-list'] = array_values( array_diff( $options['shoplync-mailing-list'], array($user->user_email) ) );//remove email from mailing list
					update_option('shoplync-store-info', $options);					
				}

				
			}
		}else {
			array_push($info_messages,'<p class="text-danger mb-0"><i class="material-icons">warning</i> The email address provided is invalid or already in use.</p>');
		}
	}


    /* Redirect so the page will show updated info.*/
    if ( count($info_messages) == 0 ) {
       array_push($info_messages,'<p class="text-primary mb-0"><i class="material-icons">check_circle</i> Profile Information Has Been Updated!</p>');
    }
}
?>


<!-- Begin jumbotron -->
<div class="jumbotron jumbotron-fluid px-2 py-3" id="profile-info">
	<div class="row">
	<div class="col-md-5"></div>
	<div class="col-md-2">
		<img class="d-flex mx-auto img-block w-65" src="https://static.shoplync.com/images/shoplync/user-icon-blue.png" alt="User Profile">
	</div>
	<div class="col-md-5"></div>
	</div>
	<div class="row">
		<div class="col-xs-12 text-center">
		<h1 class="display-1">Profile Information</h1>	
		<?php 
		if(!empty($info_messages) && $info_messages) {
			foreach ($info_messages as &$value) {
				echo $value;
			}
		}
		?>
		</div>
	</div>
	<div class="row mt-2 text-center">
		<div class="hidden-sm-down col-md-3"></div>
		<div class="col-xs-12 col-md-6">
			<?php 
			//$user_id = get_current_user_id();
		
			
			$first_name = get_user_meta( $user_id, 'first_name', true ); 
			$last_name = get_user_meta( $user_id, 'last_name', true ); 
			$company_name = get_user_meta( $user_id, 'company_name', true ); 
			$company_url = get_user_meta( $user_id, 'company_url', true ); 
			$user_email = stripslashes($user->user_email);
			$user_phone = get_user_meta( $user_id, 'phone', true ); 
			$user_subscribed = get_user_meta( $user_id, 'user_subscribed', true);
			?>
			<form action="<?php the_permalink(); echo '#profile-info'; ?>" method="post" name="user-profile-info">
				<div class="form-group row">
					<label class="col-md-3 form-control-label">First Name</label>
					<div class="col-md-8">
						 <input type="text" name="user_firstname" value="<?php echo $first_name; ?>" size="40" class="form-control cursor-text" aria-required="true" aria-invalid="false" placeholder="Required">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3 form-control-label">Last Name</label>
					<div class="col-md-8">
						 <input type="text" name="user_lastname" value="<?php echo $last_name; ?>" size="40" class="form-control cursor-text" aria-required="true" aria-invalid="false" placeholder="Required">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3 form-control-label">Company Name</label>
					<div class="col-md-8">
						 <input type="text" name="user_company_name" value="<?php echo $company_name; ?>" size="40" class="form-control cursor-text" aria-required="true" aria-invalid="false" placeholder="Required">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3 form-control-label">Company Website</label>
					<div class="col-md-8">
						 <input type="text" name="user_company_url" value="<?php echo $company_url; ?>" size="40" class="form-control cursor-text" aria-required="true" aria-invalid="false" placeholder="Optional">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3 form-control-label">Email Address</label>
					<div class="col-md-8">
						 <input type="text" name="user_email" value="<?php echo $user_email; ?>" size="40" class="form-control cursor-text" aria-required="true" aria-invalid="false" placeholder="Required">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3 form-control-label">Phone</label>
					<div class="col-md-8">
						 <input type="text" name="user_phone" value="<?php echo $user_phone; ?>" size="40" class="form-control cursor-text" aria-required="true" aria-invalid="false" placeholder="Required">
					</div>
				</div>
				<div class="form-check row">
					<label class="col-md-3 form-check-label">Email Subscription</label>
					<div class="col-md-8">
						 <input type="checkbox" name="user_subscribed" <?php if(empty($user_subscribed) || $user_subscribed == '' || (int)$user_subscribed == 0){ echo 'value="false" '; }else { echo 'value="'.$user_subscribed.'" checked="checked"'; } ?> aria-required="true" aria-invalid="false" class="form-check-input"  >
						 <em>Stay up-to-date on the latest Shoplync news &amp; announcements</em>
					</div>
				</div>
				
				<input type="text" name="user_id" value="<?php echo $user_id; ?>" size="40" class="display-none">
				<input type="hidden" name="action" value="update-user-info" class="display-none">
				<button type="submit" class="btn btn-primary rounded-30 text-center mx-auto">Save Information</button>
			</form>
			<form action="<?php echo wp_lostpassword_url(); ?>" method="post" name="user-reset-password" class="mt-2" >
				<input class="form-control" id="user_login" name="user_login" type="hidden" class="display-none" value="<?php echo $user_email; ?>">
				<p class="card-text"><em>*Never share your login details with anyone. To send password reset link please <button type="submit" class="btn btn-primary-text">click here</em></p>
			</form>
		</div>
		<div class="hidden-sm-down col-md-3"></div>
	</div>
</div>
<!-- End jumbotron -->