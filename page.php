<?php
/**
 * Fallback template for pages
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
    //Display posts
    get_template_part( '/template-parts/content', 'posts' );
    ?>
</main>

<?
get_footer();
?>