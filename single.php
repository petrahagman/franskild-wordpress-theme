<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage franskild
 * @since 1.0
 * @version 1.0
 */

get_header();
?> 

<main>

	<article>
		<?php
		if ( have_posts() ) :

			/* Start the loop */
			while ( have_posts() ) :
				the_post();

				if ( has_post_thumbnail() ):
					?>
					<div class="post-img">
						<?php
						the_post_thumbnail( 'full' );
						?>
					</div> <!-- .post-img -->
					<?php
				endif;
				?>

				<div class="post-content">
					<h1><?php the_title(); ?></h1>
					<span><?php the_time( 'Y-m-d / g:i a' ); ?></span>
					<?php
					$terms = wp_get_post_terms( get_the_ID(), 'franskild_taxonomies' );
					foreach($terms as $term) :
						?>
						<span><?php echo ' | ' . $term->name; ?></span>
						<?php
					endforeach;
					the_content();
					?>
					<div class="colab">
						<?php
						$meta = get_post_meta( $post->ID );
						if ( ! empty ( $meta['colab_name'][0] ) || ! empty ( $meta['colab_url'][0] ) ):
							?><span><?php echo "In collaboration with: "; ?></span><?php
							if ( ! empty ( $meta['colab_name'] ) ) :
								?><span><?php echo esc_attr( $meta['colab_name'][0] ); ?></span><?php
							endif;
							if ( ! empty ( $meta['colab_url'] ) ) :
								?><span><a href="<?php echo esc_attr( $meta['colab_url'][0] ); ?>"><?php echo esc_attr( $meta['colab_url'][0] ); ?></a></span><?php
							endif;
						endif;
						?>
					</div> <!-- .colab -->
				</div> <!-- .post-content -->
				
				<?php
				//Comment area
				if ( comments_open() || get_comments_number() ) :
			  		comments_template();
				endif;

			endwhile;

		endif;
		?>
	</article>

</main>

<?php
get_footer();
?>