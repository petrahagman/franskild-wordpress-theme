<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <main>
 *
 * @package WordPress
 * @subpackage franskild
 * @since 1.0
 * @version 1.0
 */
?>

<!DOCTYPE html>
<html>
<head>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
	
	<!-- Cookie Notification -->
	<div id="cookie-notification" class="cookie-notification">
    	<p><?php _e( 'This site uses cookies. If you continue we assume that you concent to this.', 'franskild' ); ?></p>
    	<button id="hide-notification">Got it!</button>
	</div> <!-- #cookie-notification, .cookie-notification -->
	
	<!-- Header (logo & main menu) -->
	<div class="wrapper">
		<div class="logo">
			<!-- If not home page, add link to index -->
			<?php
			if( ! is_home() ) :
			    ?>
			    <a href="<?php echo home_url(); ?>">
			    <?php
			endif; 
			?>
			<h1><?php echo bloginfo( 'name' );?></h1>
			<?php
			if( ! is_home() ) : 
				?>
				</a>
				<?php 
			endif;
			?>
		</div> <!-- .logo -->
		<nav>
			<?php wp_nav_menu( array( 'theme_location' => 'mainmenu' ) ); ?>
		</nav>
	</div> <!-- .wrapper -->
	