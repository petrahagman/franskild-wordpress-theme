<?php
/**
 * The template for the blog page
 *
 * Displays all of the published blog posts
 *
 * @package WordPress
 * @subpackage franskild
 * @since 1.0
 * @version 1.0
 */

get_header();

//Get current page
$paged = currentPage();

//Shows only content with type 'post'
$blog = new WP_Query( array(
	'post_type'		=> 'post',
	'posts_per_page'=> 5,
	'paged' 		=> $paged,
	'post_status'	=> 'publish',
	'orderby'		=> 'date',
	'order'			=> 'DESC'
) );

$counter = 0;
?>

<main>
	
	<?php
	//Includes header (sidebar for widget)
	dynamic_sidebar( 'header1' );
	
	//Includes template part for filter/search bar
	get_template_part( '/template-parts/navigation', 'search' );
	?>

	<section class="posts">
		<?php
		if ( $blog -> have_posts() ) :
			
			//Start the loop
			while ( $blog -> have_posts() ) :
				$blog -> the_post();
				$counter++;
				$class = '';
				if( $counter % 2 == 0 ) :
					$class = 'reverse';
				endif;
				?>
				<article class="<?php echo $class; ?>">
					
					<?php
					if ( has_post_thumbnail() ) :
						?>
						<div class="post-img">
							<a href="<?php the_permalink();?>">
								<?php
								the_post_thumbnail( 'cover' );
								?>
							</a>
						</div> <!-- .post-img -->
					<?php
					else: 
						?>
						<div class="placeholder">
							<h3><?php _e( 'f r a n s k i l d', 'franskild' ); ?></h3>
						</div>
						<?php
					endif;
					?>

					<div class="post-content">
						<a href="<?php the_permalink();?>">
							<h2><?php the_title(); ?></h2>
						</a>
						<span><?php the_time( 'Y-m-d / g:i a' ); ?></span>
						<?php
						$terms = wp_get_post_terms( get_the_ID(), 'franskild_taxonomies' );
						foreach($terms as $term) :
							?>
							<span><?php echo ' | '; ?><a href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a></span>
							<?php
						endforeach;
						?>
						<a href="<?php the_permalink();?>">
							<?php the_excerpt(); ?>
						</a>
						<span><i class="fa fa-comments" aria-hidden="true"></i> <a href="<?php the_permalink();?>#comments"><?php comments_number( _x( 'Comments(0)', 'franskild' ), _x( 'Comments(1)', 'franskild' ), _x( 'Comments(%)', 'franskild' ) ); ?></a></span>
					</div> <!-- .post-content -->

				</article>
				<?php
			endwhile;

			//Custom pagination
		    if ($blog->max_num_pages > 1) :
		        $orig_query = $wp_query;
		        $wp_query = $blog;
		        ?>
		        <nav class="prev-next-posts">
		            <div class="next-posts-link"> 
		                <?php echo get_previous_posts_link( _x( '&xlarr; Newer', 'franskild' ) ); ?>
		            </div> <!-- .next-posts-link -->
		            <div class="prev-posts-link">
		                <?php echo get_next_posts_link( _x( 'Older &xrarr;', 'franskild' ), $blog->max_num_pages ); ?>
		            </div> <!-- .prev-posts-link -->
		        </nav> <!-- .prev-next-posts -->
		        <?php
		        $wp_query = $orig_query;
		    endif;
		    wp_reset_postdata();

		endif;
		?>
	</section> <!-- .posts -->

</main>
<?php
get_footer(); 
?>