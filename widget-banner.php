<?php
/**
* Widget for upcoming gigs
*
* @package WordPress
* @subpackage franskild
* @since 1.0
* @version 1.0
*
*/

class Banner_Widget extends WP_Widget {
    
    public function __construct() {

        parent::__construct( 
            'banner_franskild', 
            __( 'Upcoming gig', 'franskild' ), 
            array ( 'description'=>__( 'Banner for upcoming gig (blog page)', 'franskild' ) ) 
            );

    }

    //Widget form
    public function form( $instance ) {

        $img_url = $instance['img_url'];
        $img_id = esc_attr( $this->get_field_id( 'img_url' ) );
        $img_name = $this->get_field_name( 'img_url' );
        $when = $instance['when'];
        $when_id = esc_attr( $this->get_field_id( 'when' ) );
        $when_name = $this->get_field_name( 'when' );
        $where = $instance['where'];
        $where_id = esc_attr( $this->get_field_id( 'where' ) );
        $where_name = $this->get_field_name( 'where' );
        ?>

        <div>
            <label for="<?php echo $img_id; ?>">Image URL:</label>
        </div>
        <div>
            <input type="url" id="<?php echo $img_id; ?>" name="<?php echo $img_name; ?>" value="<?php echo $img_url; ?>">
        </div>
        <div>
            <label for="<?php echo $when_id; ?>">When:</label>
        </div>
        <div>
            <input type="text" id="<?php echo $when_id; ?>" name="<?php echo $when_name; ?>" value="<?php echo $when; ?>">
        </div>
        <div>
            <label for="<?php echo $where_id; ?>">Where:</label>
        </div>
        <div>
            <input type="text" id="<?php echo $where_id; ?>" name="<?php echo $where_name; ?>" value="<?php echo $where; ?>">
        </div>
        <?php

    }

    //Update content
    public function update( $new_instance, $old_instance ) {

        $instance = array();


        if ( ! empty( $new_instance['img_url'] ) ) {
            $instance['img_url'] = $new_instance['img_url'];
        }
        if ( ! empty( $new_instance['when'] ) ) {
            $instance['when'] = $new_instance['when'];
        }
        if ( ! empty( $new_instance['where'] ) ) {
            $instance['where'] = $new_instance['where'];
        }

        return $instance;

    }

    //Widget layout
    public function widget( $args, $instance ) {
        
        ?>
        <section class="banner">
            
            <!-- Show image if available -->
            <?php
            if ( ! empty ($instance['img_url'] ) ) : 
                ?>
                <div class="banner-img">
                    <img src="<?php echo $instance['img_url']; ?>" alt="Upcoming gig">
                </div> <!-- .banner-img -->
                <?php
            endif;
            ?>

            <!-- Show banner content -->
            <div class="banner-content">
                <h1>Upcoming gig</h1>
                <div class="banner-first-content">
                    <h2>When</h2>
                    <p>
                        <?php
                        echo $instance['when'];
                        ?>
                    </p>
                </div> <!-- .banner-first-content -->
                <div>
                    <h2>Where</h2>
                    <p>
                        <?php
                        echo $instance['where'];
                        ?>
                    </p>
                </div>
            </div> <!-- .banner-content -->

        </section> <!-- .banner -->
        <?php

    }

}

//Register widget
function register_banner_franskild() {
    register_widget( 'Banner_Widget' );
}

add_action( 'widgets_init', 'register_banner_franskild' );