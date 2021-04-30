<?php 

$current_user_id = get_current_user_id(); 



?>
<!-- Begin CTA Jumbotron -->
<div <?php if ($args && $args['eleID']){ echo 'id="jumbotron-' . $args['eleID'] . '"';}?> class="jumbotron jumbotron-fluid parallax-bg">
  <div class="container">
	<div class="row">
		<div class="col-md-1 hidden-sm-down"></div>
		<div class="col-md-2 col-xs-6 mx-auto">
			<img class="d-flex mx-auto img-block w-100" src="https://static.shoplync.com/images/shoplync/user-icon-blue.png" alt="User Profile">
		</div>
		<div class="col-md-8 col-xs-12">
		<h1 class="display-1">Welcome Back<span class="text-capitalize text-primary">
		<?php 
		
		
		if($current_user_id == 0){
			get_template_part('_partials/page', 'login');
		}
		
		$last_name = get_user_meta( $current_user_id, 'nickname', true ); 
		
		echo ($last_name ? $last_name : 'User');
		?>!
		</span></h1>	
		</div>
		<div class="col-md-1 hidden-sm-down"></div>
	</div>
	<div class="row">
	  <p class="lead text-center w-100 px-1">
    		<a class="btn btn-primary btn-lg rounded-30 pulse-primary break-spaces" href="#custom_html-5" role="button">Schedule A Training Session</a>
			<a class="btn btn-primary btn-primary-inverted btn-lg rounded-30" href="<?php echo wp_logout_url( home_url() ); ?>" role="button">Log Out</a>
  	  </p>
	</div>
  </div>
</div>
<!-- End CTA Jumbotron -->
<?php $links = get_option('shoplync-store-info'); ?>
<div id="sms-feature-showcase-quick-selection" class="jumbotron jumbotron-fluid parallax-bg">
	<div class="row">
		<div class="col-md-2 hidden-sm-down"></div>
		<div class="col-md-8 col-xs-12 px-3 text-center">
		<h1 class="display-1 mb-3">Download SMS Pro</h1>
		<a class="btn btn-primary btn-primary-inverted btn-lg rounded-30 pulse-only" href="<?php echo esc_url_raw(home_url('/customers/').'?dl=1'); ?>" role="button" target="_blank"><i class="material-icons">file_download</i>Latest Version</a>
		</div>
		<div class="col-md-2 hidden-sm-down"></div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<p class="text-center">
			  <a class="btn btn-primary btn-lg rounded-30" data-toggle="collapse" href="#collapseDL" role="button" aria-expanded="false" aria-controls="collapseDL">
				Other Versions
			  </a>
			</p>
			<div class="collapse mx-3" id="collapseDL">
			  <div class="card card-body">
			  <p>The latest and most current version is always recommended. Please <a href="#custom_html-5">Contact Us</a> if you have any questions or need assistance.</p>
				<ul>
					<li class="px-1 pt-1 btn-dl"><a href="<?php echo esc_url_raw(home_url('/customers/').'?dl=1'); ?>" target="_blank"><i class="material-icons">system_update_alt</i> <?php if(isset($links['link-1-name'])){ echo $links['link-1-name']; } ?> <span class="badge badge-main hidden-sm-down">Latest</span></a></li>
					<li class="px-1 pt-1 btn-dl"><a href="<?php echo esc_url_raw(home_url('/customers/').'?dl=2'); ?>" target="_blank"><i class="material-icons">system_update_alt</i> <?php if(isset($links['link-2-name'])){ echo $links['link-2-name']; } ?> </a></li>
					<li class="px-1 pt-1 btn-dl"><a href="<?php echo esc_url_raw(home_url('/customers/').'?dl=3'); ?>" target="_blank"><i class="material-icons">system_update_alt</i> <?php if(isset($links['link-3-name'])){ echo $links['link-3-name']; } ?> </a></li>
				</ul>
			  </div>
			</div>
		</div>
	</div>
</div>


<div class="container container-fluid">
	<div class="row">
		<div class="hidden-sm-down col-md-3"></div>
		<div class="col-sm-12 col-md-6">
			<div class="card rounded-15 text-center py-2 px-1">
			  <img class="card-img-top w-65" src="https://static.shoplync.com/images/shoplync/sms-pro-opacity.png" alt="Card image cap">
			  <div class="card-body">
				<h5 class="card-title text-center">Your Login Credentials</h5>
				<?php 
				$username = get_the_author_meta( 'sms-username', get_current_user_id() ); 
				$password = get_the_author_meta( 'sms-password', get_current_user_id() ); 
				?>
				<form action="" method="post" name="sms-credentials">
					<div class="form-group row">
						<label class="col-md-3 form-control-label">Username</label>
						<div class="col-md-8">
							 <input type="text" name="username_display" value="<?php echo $username; ?>" size="40" class="form-control cursor-text" aria-required="true" aria-invalid="false" disabled>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-3 form-control-label">Password</label>
						<div class="col-md-8">
							 <input type="text" name="password_display" value="<?php echo $password; ?>" size="40" class="form-control cursor-text" aria-required="true" aria-invalid="false" disabled>
						</div>
					</div>
					<p class="card-text"><em>*Never share your login details with anyone. <a href="#custom_html-5">Contact us</a> immediately if you think your account has been compromised.</em></p>
					<input type="text" name="user_id" value="<?php echo get_current_user_id(); ?>" size="40" class="display-none">
					<input type="hidden" name="action" value="reset_sms_passcode" class="display-none">
					<button type="submit" class="btn btn-primary rounded-30">Generate New Password</button>
				</form>
			  </div>
			</div>
		</div>
		<div class="hidden-sm-down col-md-3"></div>
	</div>
</div>


<div id="sms-feature-showcase-quick-selection" class="jumbotron jumbotron-fluid mt-2">
	<div class="row">
		<div class="col-md-2 hidden-sm-down"></div>
		<div class="col-md-8 col-xs-12 px-3">
		<h1 class="display-1 text-center mb-3">Discover The Power Of SMS Pro</h1>
			<?php echo do_shortcode('[wedocs]'); ?>
		</div>
		<div class="col-md-2 hidden-sm-down"></div>
	</div>
</div>


<?php get_template_part('_partials/page', 'account-profile-info'); ?>