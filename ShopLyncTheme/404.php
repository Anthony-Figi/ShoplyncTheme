<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>



<!-- Start WP Login Form -->
<div class="container container-fluid">
	<div class="row">
		<div class="hidden-sm-down col-md-2"></div>
		<div class="col-sm-12 col-md-8">
		<h1 class="display-1 text-center"><?php esc_html_e( 'Oops! Page Not Found.', 'wp-bootstrap-starter' ); ?></h1>
			<div class="card rounded-15 text-center pt-2 px-1 my-2" id="login-form">
			<i class="material-icons font-10rem text-primary">warning</i>
			  <div class="card-body error-404 not-found">
				<h6 class="text-primary"><i class="material-icons">find_in_page</i> <?php esc_html_e( 'It looks like nothing was found at this location.', 'wp-bootstrap-starter' ); ?></h6>
				<a href="<?php echo esc_url ( home_url() ); ?>" class="btn btn-primary rounded-30" type="submit">Home</a>
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


<?php if ( is_active_sidebar( 'shoplync_after_content' )  ): ?>
<div class="after-content-block my-3">
	<div class="container">
		<div class="row">
			<?php dynamic_sidebar( 'shoplync_after_content' ); ?>
		</div>
	</div>
</div>
<?php endif ?>


<?php
get_sidebar();
get_footer();
