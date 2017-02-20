<?php
/**
 * The template for the music page
 *
 * Displays all of the published music posts (CPT from franskild_plugins)
 *
 * @package WordPress
 * @subpackage franskild
 * @since 1.0
 * @version 1.0
 */

get_header();

//Get current page
$paged = currentPage();

//Shows only content with type 'franskild_cpt_music'
$music = new WP_Query( array(
	'post_type' 		=> 'franskild_cpt_music',
	'post_status'		=> 'publish',
	'posts_per_page'	=> 8,
	'orderby'			=> 'date',
	'order'				=> 'DESC'
) );

$counter = 0;
?>

<main>

	<?php
	if( $music -> have_posts() ) :

		//Start the loop
		while ( $music -> have_posts() ) :
			$music->the_post();
			$counter++;
			$class = '';
			if( $counter % 2 == 0 ) :
				$class = 'reverse';
			endif;
			?>
			<article class="music <?php echo $class; ?>">

				<div class="music-thumbnail">
					<?php
					if( has_post_thumbnail() ) :
						the_post_thumbnail( 'full' );
					endif;
					?>
				</div> <!-- .music-thumbnail -->

				<div class="music-content">
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
				</div> <!-- .music-content -->

			</article>
			<?php
		endwhile;

		//Custom pagination
	    if ($music->max_num_pages > 1) :
	        $orig_query = $wp_query;
	        $wp_query = $music;
	        ?>
	        <nav class="prev-next-posts">
	            <div class="next-posts-link"> 
	                <?php echo get_previous_posts_link( _x( '&xlarr; Back', 'franskild' ) ); ?>
	            </div> <!-- .next-posts-link -->
	            <div class="prev-posts-link">
	                <?php echo get_next_posts_link( _x( 'View more &xrarr;', 'franskild' ), $music->max_num_pages ); ?>
	            </div> <!-- .prev-posts-link -->
	        </nav> <!-- .prev-next-posts -->
	        <?php
	        $wp_query = $orig_query;
	    endif;
	    wp_reset_postdata();

	endif;
	?>

</main>
<?php
get_footer();
?>