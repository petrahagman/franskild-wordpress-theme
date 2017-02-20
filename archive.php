<?php
/**
* The template for displaying archives
*
* @package WordPress
* @subpackage franskild
* @since 1.0
* @version 1.0
*
*/

get_header(); 
?>

<main>
    <?php
    //Search bar
    get_template_part( '/template-parts/navigation', 'search' );
    //Display posts
    get_template_part( '/template-parts/content', 'posts' );
    ?>
</main>

<?php
get_footer();
?>

