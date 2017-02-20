<?php
/**
* Template part for displaying posts
*
* @package WordPress
* @subpackage franskild
* @since 1.0
* @version 1.0
*
*/

$counter = 0;
?>

<section class="posts">
    <?php
    if ( have_posts() ) :
        
        //Start the loop
        while ( have_posts() ) :
            the_post();
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
                    </div> <!-- .placeholder -->
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
                        <span><?php echo ' | ' . $term->name; ?></span>
                        <?php
                    endforeach;
                    ?>
                    <a href="<?php the_permalink();?>">
                        <?php the_excerpt(); ?>
                    </a>
                    <span><i class="fa fa-comments" aria-hidden="true"></i> <a href="<?php the_permalink();?>"><?php comments_number( _x( 'Comments(0)', 'franskild' ), _x( 'Comments(1)', 'franskild' ), _x( 'Comments(%)', 'franskild' ) ); ?></a></span>
                </div> <!-- .post-content -->

            </article>
            <?php
        endwhile;

    endif;
    ?>
</section> <!-- .posts -->