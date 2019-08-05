<?php

function addScripts() {
    wp_enqueue_script('script-ajax', get_theme_file_uri('/js/cript.js'), array('jquery'), '2.1.2', true); 

    wp_localize_script('script-ajax', 'Sandia', array('ajaxUrl' => admin_url('admin-ajax.php')));

}
add_action('wp_enqueue_scripts', 'addScripts');




    add_action('wp_ajax_nopriv_funcion_filtro', 'funcion_filtro');
    add_action('wp_ajax_funcion_filtro', 'funcion_filtro');


    function funcion_filtro(){

    	$args = array(
    		'orderby' => 'date',
    		'order'	=> $_POST['date']
    	);

    	// Para taxonomias
    	if( isset( $_POST['categoriafiltro'] ) )
    		$args['tax_query'] = array(
    			array(
    				'taxonomy' => 'categoria',
    				'field' => 'id',
    				'terms' => $_POST['categoriafiltro']
    			)
    		);

    	$query = new WP_Query( $args );


    	if( $query->have_posts() ) :
    		while( $query->have_posts() ): $query->the_post();

     echo get_template_part('template-parts/resultado-filtro'); //Acá iría el HTML del resultado del filtro

      endwhile;
    		wp_reset_postdata();
    	else :
    		echo 'Ningún resultado para esta búsqueda';
    	endif;

    	wp_die();
    }
?>
