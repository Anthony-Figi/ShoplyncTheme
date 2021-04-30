

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
		<h1 class="display-1 text-center">Password Reset</h1>
			<div class="card rounded-15 text-center pt-2 px-1 my-2" id="login-form">
			<i class="material-icons font-10rem text-primary">report</i>
			  <div class="card-body">
				<h6 class="text-primary"><i class="material-icons">block</i> This link is no longer valid.</h6>
				<a href="<?php echo esc_url ( home_url('/customers/') ); ?>" class="btn btn-primary rounded-30" type="submit">Login</a>
				<p class="card-text mt-2"><a href="<?php echo esc_url( wp_lostpassword_url() ); ?>">Forgot Your Password?</a></p>
				<p class="card-text mt-2"><em>*Never share your login details with anyone. <a href="#custom_html-5">Contact us</a> immediately if you think your account has been compromised.</em></p>
				<hr>
				<a href="<?php echo home_url( '/customers/' ).'?login=register'; ?>">No account? Register here</a>
			  </div>
			</div>
		</div>
		<div class="hidden-sm-down col-md-2"></div>
	</div>
</div>