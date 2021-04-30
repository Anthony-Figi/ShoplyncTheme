<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php 

    // WordPress 5.2 wp_body_open implementation
    if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
    } else {
        do_action( 'wp_body_open' );
    }

?>

<div id="page" class="site">
    <?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
	<?php  do_action( 'shoplync_store_cta' ); ?>
	<?php  do_action( 'shoplync_store_contact' ); ?>
	<header id="masthead" class="site-header navbar-static-top <?php echo wp_bootstrap_starter_bg_class(); ?> py-1" role="banner">
        <div class="container">
            <nav class="navbar navbar-expand-xl p-0">
                <div class="navbar-brand col-md-3">
                    <?php if ( get_theme_mod( 'wp_bootstrap_starter_logo' ) ): ?>
                        <a href="<?php echo esc_url( home_url( '/' )); ?>">
                            <img class="img-fluid" src="<?php echo esc_url(get_theme_mod( 'wp_bootstrap_starter_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                        </a>
                    <?php else : ?>
                        <a class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?></a>
                    <?php endif; ?>

                </div>
                <button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
                </button>

                <?php
                wp_nav_menu(array(
                'theme_location'    => 'primary',
                'container'       => 'div',
                'container_id'    => 'main-nav',
                'container_class' => 'collapse navbar-collapse justify-content-start col-md-9',
                'menu_id'         => false,
                'menu_class'      => 'navbar-nav',
                'depth'           => 3,
                'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                'walker'          => new wp_bootstrap_navwalker()
                ));
				
				get_template_part('_partials/btn', 'freetrial');
                ?>
				
            </nav>
        </div>
		<?php get_template_part('_partials/sticky', 'header'); ?>
	</header><!-- #masthead -->
     <?php 
	 global $pagenow;
	 if(is_front_page()){//Main Index Page
		 //include get_theme_file_path('_partials/home-jumbotron.php');
		 $jumbotronID = array("eleID" => "1");
		 get_template_part('_partials/jumbotron', 'home', $jumbotronID);
	 }else if(is_page(52)){//Our Products Page
		 $jumbotronID = array("eleID" => "our-products");
		 get_template_part('_partials/jumbotron', 'products', $jumbotronID);
	 }else if(is_page(47)){//help
		 $jumbotronID = array("eleID" => "help");
		 get_template_part('_partials/jumbotron', 'help', $jumbotronID);
	 }else if(is_page(20)){//Our Products Page
		 get_template_part('_partials/jumbotron', 'contact');
	 }else if(is_home()){
		 //for post page
	 }
	 echo "<!--front-page-->";
	 
	 ?>
	<!-- #masthead end -->
	<div id="content" class="site-content">
		<!--<div class="container">-->
			<!--<div class="row">-->
                <?php endif; ?>