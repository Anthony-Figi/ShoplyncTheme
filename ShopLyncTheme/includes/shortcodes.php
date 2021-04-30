<?php

	// Add shortcodes here

	// Array helper
	function print_array( $array ){
		if( !empty( $array ) ){
			echo '<pre>';
				print_r($array);
			echo '</pre>';
		}
	}
	
//Dynamic Year
function site_year(){
	ob_start();
	echo date( 'Y' );
	$output = ob_get_clean();
    return $output;
}
add_shortcode( 'site_year', 'site_year' );


//Generates a list of active pages
function show_pages(){
	ob_start();
	get_template_part('_partials/sitemap', 'pages');
	$template = ob_get_clean();
    return $template;
}
add_shortcode( 'show_pages', 'show_pages' );

//Generates a list of active pages
function get_customer_page(){
	ob_start();
	get_template_part('_partials/page', 'customer');
	$template = ob_get_clean();
    return $template;
}
add_shortcode( 'shoplync_customer_page', 'get_customer_page' );

/**
 * Forked From Site: https://digwp.com/2010/04/call-widget-with-shortcode/
 *
 * Docs: https://developer.wordpress.org/reference/functions/the_widget/
 *
 * Usage: [widget widget_name="Your_Custom_Widget"]
 */
function add_widget($atts) {
    
    global $wp_widget_factory;
    
    extract(shortcode_atts(array(
        'widget_name' => FALSE
    ), $atts));
    
    $widget_name = wp_specialchars($widget_name);
    
    if (!is_a($wp_widget_factory->widgets[$widget_name], 'WP_Widget')):
        $wp_class = 'WP_Widget_'.ucwords(strtolower($class));
        
        if (!is_a($wp_widget_factory->widgets[$wp_class], 'WP_Widget')):
            return '<p>'.sprintf(__("%s: Widget class not found. Make sure this widget exists and the class name is correct"),'<strong>'.$class.'</strong>').'</p>';
        else:
            $class = $wp_class;
        endif;
    endif;
    
    ob_start();
    the_widget($widget_name, $instance, array('widget_id'=>'arbitrary-instance-'.$id,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => ''
    ));
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
    
}
add_shortcode('add_widget','add_widget'); 



?>