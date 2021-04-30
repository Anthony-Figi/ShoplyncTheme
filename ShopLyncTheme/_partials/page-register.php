<?php 
$user_data = array(
	'first_name'=> false,
	'last_name'=> false,
	'company_name'=> false,
	'phone'=> false,
	'email'=> false,
);

if(isset($_GET['err']) && !empty($_GET['err'])) {
	$user_data['first_name'] = (isset($_GET['fname']) ? true : false );
	$user_data['last_name'] = (isset($_GET['lname']) ? true : false );
	$user_data['company_name'] = (isset($_GET['cname']) ? true : false );
	$user_data['phone'] = (isset($_GET['tel']) ? true : false );
	$user_data['email'] = (isset($_GET['e-mail']) ? true : false );
}else if ( isset($_GET['mail']) ){
	$email_exists = false;
	$email_exists = ($_GET['mail'] === 'email_exists' ? true : false );
}

//print_r($_GET);
?>
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
		<h1 class="display-1 text-center">Register For An Account</h1>
			<div class="card rounded-15 text-center pt-2 px-1 my-2" id="login-form">
			<i class="material-icons font-10rem text-primary">account_circle</i>
			  <div class="card-body">
			  	<?php if(isset($_GET['err']) && !empty($_GET['err'])): ?>
					<h6 class="text-danger"><i class="material-icons">warning</i> Please fill the highlighted required fields.</h6>
				<?php endif ?>
				<?php if(isset($_GET['mail']) && !empty($_GET['email'])): ?>
					<h6 class="text-danger"><i class="material-icons">cancel</i> Email address already exists. <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>">Forgot Your Password?</a></h6>
				<?php endif ?>
				<?php if(isset($_GET['check']) &&!empty($_GET['check'])): ?>
					<h6 class="text-warning"><i class="material-icons">info</i> Captcha verification failed, please try again.</h6>
				<?php endif ?>
				<form id="login-form" action="<?php echo wp_registration_url(); ?>" method="post">
					<section>
					<div class="form-group row ">
						<label class="col-md-3 form-control-label required">First name</label>
						<div class="col-md-8">
							<input class="form-control <?php if($user_data['first_name']){ echo ' error-highlight';} ?>" <?php if(isset($_GET['first_name'])){ echo 'value="'.$_GET['first_name'].'"';} ?> id="first_name" name="first_name" type="text" required>
						</div>
					</div>
					<div class="form-group row ">
						<label class="col-md-3 form-control-label required">Last Name</label>
						<div class="col-md-8">
							<input class="form-control <?php if($user_data['last_name']){ echo ' error-highlight';} ?>" <?php if(isset($_GET['last_name'])){ echo 'value="'.$_GET['last_name'].'"';} ?> id="last_name" name="last_name" type="text" required>
						</div>
					</div>
					<div class="form-group row ">
						<label class="col-md-3 form-control-label required">Company Name</label>
						<div class="col-md-8">
							<input class="form-control <?php if($user_data['company_name']){ echo ' error-highlight';} ?>" <?php if(isset($_GET['company_name'])){ echo 'value="'.$_GET['company_name'].'"';} ?> id="company_name" name="company_name" type="text" required>
						</div>
					</div>
					<div class="form-group row ">
						<label class="col-md-3 form-control-label required">Company Website (Optional)</label>
						<div class="col-md-8">
							<input class="form-control" id="company_url" name="company_url" type="text" <?php if(isset($_GET['company_url'])){ echo 'value="'.$_GET['company_url'].'"';} ?> >
						</div>
					</div>
					<div class="form-group row ">
						<label class="col-md-3 form-control-label required">Phone Number</label>
						<div class="col-md-8">
							<input class="form-control <?php if($user_data['phone']){ echo ' error-highlight';} ?>" <?php if(isset($_GET['phone'])){ echo 'value="'.$_GET['phone'].'"';} ?> id="phone" name="phone" type="tel" required>
						</div>
					</div>
					<div class="form-group row ">
						<label class="col-md-3 form-control-label required">Email</label>
						<div class="col-md-8">
							<input class="form-control <?php if($user_data['email'] || $email_exists){ echo ' error-highlight';} ?>" <?php if(isset($_GET['email'])){ echo 'value="'.$_GET['email'].'"';} ?> id="email" name="email" type="email" placeholder="example@mail.com" required>
						</div>
					</div>
					<p class="card-text my-2"><em>Your password will be sent to your email.</em></p>
					</section>
					<?php do_action( 'anr_captcha_form_field' ); ?>
					<footer class="form-footer text-sm-center clearfix mt-2">
						<button id="submit-register" name="submit-register" class="btn btn-primary rounded-30" type="submit">Register</button>
					</footer>
				</form>
				<p class="card-text mt-2"><a href="<?php echo esc_url( wp_lostpassword_url() ); ?>">Forgot Your Password?</a></p>
				<p class="card-text mt-2"><em>*Never share your login details with anyone. <a href="#custom_html-5">Contact us</a> immediately if you think your account has been compromised.</em></p>
			  </div>
			</div>
		</div>
		<div class="hidden-sm-down col-md-2"></div>
	</div>
</div>


<!-- Begin SMS Pro Showcase Jumbotron -->
<div id="sms-pro-showcase" class="jumbotron jumbotron-fluid">
	<div class="row">
		<div class="col-md-5 px-1">
			<a class="fancybox" href="https://static.shoplync.com/images/shoplync/aio-solution-small.jpg"> 
			<img class="d-flex mx-auto img-block w-100" src="https://static.shoplync.com/images/shoplync/aio-solution-small.jpg" alt="Small-To-Large Sized Business">
			</a>
		</div>
		<div class="col-md-7 px-2">
			<h1 class="display-1">Introducing <span class="text-capitalize text-primary">SMS Pro</span></h1>
			<p class="lead"> 
			Keep costs low and profits high across channels with SMS Pro's advanced and easy to use features. Scalable from small-to-large sized busninessess, 
			SMS Pro enables you to finetune your busniness and achieve maximum efficiency.</p>
			<p class="lead">Enjoy the ability to fully manage your ecommerce store, keep track of inventory, sales orders, and customers. 
			The optional website add-on is built on an open-source software with over 3,000 modules to help maximize your ecommerce store. Make your business a success today!</p>
			<ul>
				<li class="display-4 pt-1"><i class="material-icons mx-1 text-primary">local_shipping</i>Full invetory management, including automatic re-order</li>
				<li class="display-4 pt-1"><i class="material-icons mx-1 text-primary">trending_up</i>Ability to set scaling price models</li>
				<li class="display-4 pt-1"><i class="material-icons mx-1 text-primary">code</i>Full Website Integration</li>
				<li class="display-4 pt-1"><i class="material-icons mx-1 text-primary">assignment_ind</i>Fully Integrated Paypal Customer Verification</li>
				<li class="display-4 pt-1"><i class="material-icons mx-1 text-primary">compare_arrows</i>Import/Export Parts List</li>
				<li class="display-4 pt-1"><i class="material-icons mx-1 text-primary">receipt</i>Built-in invoicing and order management</li>
			</ul>
		</div>
	</div>
</div>
<!-- End SMS Pro Showcase Jumbotron -->