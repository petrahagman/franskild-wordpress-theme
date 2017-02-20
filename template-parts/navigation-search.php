<?php
/**
* Template part for displaying filter and search bar
*
* @package WordPress
* @subpackage franskild
* @since 1.0
* @version 1.0
*
*/
?>

<section class="options">

	<!-- Filter options for keywords -->
	<div class="filter">
		<p>Filter on:</p>
		<?php 
		$args = array(
		  'public'   => true,
		  '_builtin' => false
		);
		$output = 'names';
		$operator = 'and';
		$taxonomies = get_taxonomies( $args, $output, $operator ); 
		if  ( $taxonomies ) {
		  	foreach ( $taxonomies  as $taxonomy ) {
			    $terms = get_terms( array(
			    	'taxonomy' 	 => $taxonomy,
			    	'hide_empty' => true
			    	) );
		        foreach ( $terms as $term) {
					?>
					<a href="<?php echo get_term_link( $term ); ?>">
						<?php
						echo $term->name;
						?>
					</a>
					<?php
                }
          	}
        }  
        ?>
	</div> <!-- .filter -->

	<!-- Search form -->
	<div class="search">
		<?php get_search_form(); ?>
	</div> <!-- .search -->

</section> <!-- .options -->