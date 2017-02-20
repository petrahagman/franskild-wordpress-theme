<?php
/**
* The template for displaying franskild_cpt_music archive (our-music)
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
    <section class="posts">
    <h1><?php the_archive_title(); ?></h1>
    
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
                endif;
                ?>

                <div class="post-content">
                    <a href="<?php the_permalink();?>">
                        <h2><?php the_title(); ?></h2>
                    </a>
                    <span><?php the_content(); ?></span>
                </div> <!-- .post-content -->

            </article>
            <?php
        endwhile;

    endif;
    ?>
    
</section> <!-- .posts -->
</main>

<?php
get_footer();
?>