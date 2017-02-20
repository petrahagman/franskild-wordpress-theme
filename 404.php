<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage franskild
 * @since franskild 1.0
 */
?>

<!DOCTYPE html>
<html>
<head>
	<?php wp_head(); ?>
</head>
	<body <?php body_class(); ?> >
		<i class="fa fa-meh-o" aria-hidden="true"></i>
		<h1>Oops!</h1>
		<p>Sorry - we couldn't find that page.</p>
		<a href="<?php echo home_url(); ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go home</a>
	</body>
</html>