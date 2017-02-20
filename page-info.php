<?php
/**
 * The template for the info page
 *
 * Displays information (about, contact & social media links)
 *
 * @package WordPress
 * @subpackage franskild
 * @since 1.0
 * @version 1.0
 */

get_header();
?>

<main> 
	
	<?php
	if(have_posts()) :
		
		//Start the loop
		while(have_posts()) :
			?>
			
			<!-- About the band -->
			<article class="info">
				<?php
				the_post();
				the_content();
				?>
				
				<div class="container">
					<!-- Contact info -->
					<div class="contact">
						<?php
						$contact_heading = get_option( 'contact-heading' );
						$email1 = get_option( 'email1' );
						$email2 = get_option( 'email2' );
						?>
						<h2><?php _e( $contact_heading, 'franskild' ); ?></h2>
						<p><a href="<?php echo "mailto:" . $email1; ?>"><?php echo $email1; ?></a></p>
						<p><a href="<?php echo "mailto:" . $email2; ?>"><?php echo $email2; ?></a></p>
					</div> <!-- .contact -->

					<!-- Social media links -->
					<div class="social">
						<?php
						$social_heading = get_option( 'social-heading' );
						$facebook = get_option( 'facebook' );
						$instagram = get_option( 'instagram' );
						$soundcloud = get_option( 'soundcloud' );
						$spotify = get_option( 'spotify' );
						?>
						<h2><?php _e( $social_heading, 'franskild' ); ?></h2>
						<div class="social-links">
							<a href="<?php echo $instagram;  ?>"><i class="fa fa-instagram"></i></a>
							<a href="<?php echo $facebook;  ?>"><i class="fa fa-facebook"></i></a>
							<a href="<?php echo $soundcloud;  ?>"><i class="fa fa-soundcloud"></i></a>
							<a href="<?php echo $spotify;  ?>"><i class="fa fa-spotify"></i></a>
						</div>
					</div> <!-- .social -->
				</div>

			</article> <!-- .info -->
			<?php
		endwhile;
	endif;
	?>

	<!-- Image gallery (Plugin: Gallery by Supsystic) -->
	<section>
		<?php echo do_shortcode( '[supsystic-gallery id=2]' ) ?>
	</section>

</main>

<?php
get_footer();
?>