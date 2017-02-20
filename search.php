<?php
/**
 * The template for the search page
 *
 * Displays the search result
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
    //Search bar
    get_template_part( '/template-parts/navigation', 'search' );
    ?>

    <div>
        <?php
        if ( have_posts() ) :
            ?>
            <h1><?php printf( __( 'Search results for: "%s"', 'franskild' ), get_search_query() ); ?></h1>
            <?php
        else:
            ?>
            <h1><?php _e( 'No result found', 'franskild' ) ?></h1>
            <?php
    endif;
    ?>
    </div>

    <?php
    //Display search result
    get_template_part( '/template-parts/content', 'posts' );
    ?>
    
</main>

<?
get_footer();
?>
