
<!-- Begin CTA Jumbotron -->
<div <?php if ($args && $args['eleID']){ echo 'id="jumbotron-' . $args['eleID'] . '"';}?> class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-1">Are you ready to <span class="text-capitalize text-primary">Unlock</span> your business potential?</h1>
    <p class="lead">Unlock a new revenue stream that never closes its doors. Manage inventory, shipping, marketing and reports from one platform in a booming online marketplace.</p>
	  <p class="lead text-center mt-3">
    		<a class="bounce text-block" href="#login-form" role="button"><i class="material-icons font-7rem">keyboard_arrow_down</i></a>
  	  </p>
  </div>
</div>
<!-- End CTA Jumbotron -->


<!-- Start WP Login Form -->
<div class="container container-fluid">
	<div class="row">
		<div class="hidden-sm-down col-md-2"></div>
		<div class="col-sm-12 col-md-8">
		<h1 class="display-1 text-center">Reset Password</h1>
			<div class="card rounded-15 text-center pt-2 px-1 my-2" id="login-form">
			<i class="material-icons font-10rem text-primary">security</i>
			  <div class="card-body">
			  <?php if(isset($_GET['err']) && (int)$_GET['err']): ?>
			  <h6 class="text-danger"><i class="material-icons">warning</i> Passwords do not match, please try again.</h6>
			  <?php elseif(isset($_GET['err']) && !((int)$_GET['err']) ): ?>
			  <h6 class="text-danger"><i class="material-icons">warning</i> Fields cannot be empty, please try again.</h6>
			  <?php endif ?>
				<h6 class="text-primary"><i class="material-icons">info</i> Use a strong password that is atleast 8 characters long.</h6>
					<form id="login-form" action="<?php echo site_url( 'wp-login.php?action=resetpass'); ?>" method="post">
					    <input type="hidden" id="user_login" name="rp_login" value="<?php echo esc_attr( $_REQUEST['login'] ); ?>" autocomplete="off" class="display:none" />
						<input type="hidden" name="rp_key" value="<?php echo esc_attr( $_REQUEST['key'] ); ?>" class="display:none" />
						<section>
						<div class="form-group row ">
							<label class="col-md-3 form-control-label required">New Password</label>
							<div class="col-md-6">
								<input class="form-control" id="pass1" name="pass1" type="password" autocomplete="off" required>
							</div>
						</div>
						<div class="form-group row ">
							<label class="col-md-3 form-control-label required">Confirm Password</label>
							<div class="col-md-6">
								<input class="form-control" id="pass2" name="pass2" type="password" autocomplete="off" required>
							</div>
						</div>
						</section>
						<footer class="form-footer text-sm-center clearfix">
							<button id="submit-login" class="btn btn-primary rounded-30" type="submit">Reset Password</button>
						</footer>
					</form>
				<p class="card-text mt-2"><?php echo wp_get_password_hint(); ?></p>
				<hr>
				<p class="card-text mt-2"><em>*Never share your login details with anyone. <a href="#custom_html-5">Contact us</a> immediately if you think your account has been compromised.</em></p>
			  </div>
			</div>
		</div>
		<div class="hidden-sm-down col-md-2"></div>
	</div>
</div>