<!-- Sticky Header -->
    <div id="sticky-header" class="container-fluid hidden hidden-sm-down">
       <div class="container">
        <div class="col-md-3 hidden-sm-down" id="_desktop_logo">
              <h1>
				<?php if ( get_theme_mod( 'wp_bootstrap_starter_logo' ) ): ?>
					<a href="<?php echo esc_url( home_url( '/' )); ?>">
						<img class="img-fluid logo img-responsive" src="<?php echo esc_url(get_theme_mod( 'wp_bootstrap_starter_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
					</a>
				<?php else : ?>
					<a class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?></a>
				<?php endif; ?>
              </h1>
        </div>
        <div class="col-md-9 col-sm-12 position-static">
          
			<?php
			wp_nav_menu(array(
			'theme_location'    => 'primary',
			'container'       => 'div',
			'container_id'    => '_desktop_top_menu',
			'container_class' => 'menu js-top-menu position-static hidden-sm-down inline-block mt-1',
			'menu_id'         => 'top-menu',
			'menu_class'      => 'top-menu',
			'depth'           => 3,
			'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
			'walker'          => new wp_bootstrap_navwalker()
			));
			
			$addClass = array('class' => 'inline-block');
			get_template_part('_partials/btn', 'freetrial', $addClass);
		  //{include file="module:ps_customersignin/_partials/corner-btn.tpl"}
			
			?>

          <div class="clearfix"></div>
        </div>
      </div>
    </div>