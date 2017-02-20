<?php
/**
* The template for displaying the footer with theme options
*
* @package WordPress
* @subpackage franskild
* @since 1.0
* @version 1.0
*
*/
?>

<footer class="footer">

    <!-- Theme option for copyright -->
    <div class="footer-col1">
        <?php 
        $copyright = get_option( 'copyright' );
        echo "&copy; " . $copyright;
        ?>
    </div> <!-- .footer-col1 -->

    <!-- Theme option for social media links -->
    <div class="footer-col2">
        <?php
        $social_heading = get_option( 'social-heading' );
        $facebook = get_option( 'facebook' );
        $instagram = get_option( 'instagram' );
        $soundcloud = get_option( 'soundcloud' );
        $spotify = get_option( 'spotify' );
        ?>
        <h2><?php echo $social_heading; ?></h2>
        <span>
            <a href="<?php echo $instagram;  ?>"><i class="fa fa-instagram"></i></a>
            <a href="<?php echo $facebook;  ?>"><i class="fa fa-facebook"></i></a>
            <a href="<?php echo $soundcloud;  ?>"><i class="fa fa-soundcloud"></i></a>
            <a href="<?php echo $spotify;  ?>"><i class="fa fa-spotify"></i></a>
        </span>
    </div> <!-- .footer-col2 -->
    
</footer> <!-- .footer -->
<?php
wp_footer();
?>
</body>
</html>