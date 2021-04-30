<?php $current_user_id = get_current_user_id(); ?>
<!-- Begin CTA Jumbotron -->
<div <?php if ($args && $args['eleID']){ echo 'id="jumbotron-' . $args['eleID'] . '"';}?> class="jumbotron jumbotron-fluid parallax-bg">
  <div class="container">
	<div class="row">
		<div class="col-md-1 hidden-sm-down"></div>
		<div class="col-md-2 col-xs-6 mx-auto">
		<?php $avatar_url = get_avatar_url($current_user_id, ['size' => '160']); ?>
		<?php if(!$avatar_url): ?>
			<img class="d-flex mx-auto img-block w-100" src="https://static.shoplync.com/images/shoplync/user-icon.png" alt="User Profile">
		<?php else: ?>
			<img class="d-flex mx-auto img-block w-100" src="<?php echo $avatar_url; ?>" alt="User Profile">
		<?php endif ?>
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
		<i class="material-icons font-8rem ">warning</i>
		<h1 class="display-1 mb-3">Pending Account Verification</h1>
		  <p>Please <a href="#custom_html-5">Contact us</a> directly if you have any questions or need assistance.</p>
		</div>
		<div class="col-md-2 hidden-sm-down"></div>
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