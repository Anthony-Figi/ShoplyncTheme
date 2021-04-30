<?php if ( is_active_sidebar( 'above-footer-1' ) || is_active_sidebar( 'above-footer-2' ) ): ?>
	<div id="footer-widget" class="row m-0">
		<div class="container">
			<div class="row">
				<?php if ( is_active_sidebar( 'above-footer-1' )) : ?>
					<div class="col-12"><?php dynamic_sidebar( 'above-footer-1' ); ?></div>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php endif ?>

<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ): ?>
        <div id="footer-widget" class="row m-0 <?php //if(!is_theme_preset_active()){ echo 'bg-light'; } ?>">
            <div class="container">
                <div class="row">
                    <?php if ( is_active_sidebar( 'footer-1' )) : ?>
                        <div class="col-12 col-md-3 mb-2"><?php dynamic_sidebar( 'footer-1' ); ?></div>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( 'footer-2' )) : ?>
                        <div class="col-12 col-md-3 mb-2"><?php dynamic_sidebar( 'footer-2' ); ?></div>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( 'footer-3' )) : ?>
                        <div class="col-12 col-md-3 mb-2"><?php dynamic_sidebar( 'footer-3' ); ?></div>
                    <?php endif; ?>
					<?php if ( is_active_sidebar( 'footer-4' )) : ?>
                        <div class="col-12 col-md-3 mb-2"><?php dynamic_sidebar( 'footer-4' ); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

<?php endif ?>