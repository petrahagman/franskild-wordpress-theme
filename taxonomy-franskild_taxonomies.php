<?php
/**
 * The template for the custom taxonomy archive
 *
 * @package WordPress
 * @subpackage franskild
 * @since 1.0
 * @version 1.0
 */

get_header(); 
?>

<main>
    <div class="tax-header">
        <h1><?php single_term_title( _e( 'Currently browsing: ', 'franskild' ) ); ?></h1>
    </div>
    <?php
    //Display posts
    get_template_part( '/template-parts/content', 'posts' );
    ?>
</main>

<?php
get_footer();
?>