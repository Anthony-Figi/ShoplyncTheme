
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
			<i class="material-icons font-10rem text-primary">lock_open</i>
			  <div class="card-body">
				<h6 class="text-primary"><i class="material-icons">info</i> Enter your email address to receive a password reset link.</h6>
				  <?php if(isset($_GET['err']) && (int)$_GET['err'] == 1): ?>
				  <h6 class="text-warning"><i class="material-icons">info</i> Captcha verification failed, please try again.</h6>
				  <?php elseif(isset($_GET['err']) && (int)$_GET['err'] == 2): ?>
					<?php if(isset($_GET['errors']) && $_GET['errors'] == 'invalid_email' ): ?>
						<h6 class="text-warning"><i class="material-icons">info</i> This email is not associated with an account. <a href="<?php echo home_url( '/customers/' ).'?login=register'; ?>" class="text-primary">Create account</a> </h6>
					<?php else: ?>
						<h6 class="text-warning"><i class="material-icons">info</i> An error occured, please try again.</h6>
					<?php endif ?>
				  <?php endif ?>
					<form id="login-form" action="<?php echo wp_lostpassword_url(); ?>" method="post">
						<section>
						<div class="form-group row ">
							<label class="col-md-3 form-control-label required">Email</label>
							<div class="col-md-6">
								<input class="form-control" id="user_login" name="user_login" type="text" required>
							</div>
						</div>
						</section>
						<?php do_action( 'anr_captcha_form_field' ); ?>
						<footer class="form-footer text-sm-center clearfix mt-2">
							<button id="submit-login" class="btn btn-primary rounded-30" type="submit">Reset Password</button>
						</footer>
					</form>
				<p class="card-text mt-2"><em>*Never share your login details with anyone. <a href="#custom_html-5">Contact us</a> immediately if you think your account has been compromised.</em></p>
				<hr>
				<a href="<?php echo home_url( '/customers/' ).'?login=register'; ?>">No account? Register here</a>
			  </div>
			</div>
		</div>
		<div class="hidden-sm-down col-md-2"></div>
	</div>
</div>