<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'SWTW_Widget' ) ) {

    Class SWTW_Widget extends WP_Widget {
 
        function __construct() {
            parent::__construct(
            
            // Base ID of your widget
            'swtw_widget', 
            
            // Widget name will appear in UI
            __('StreamWeasels Twitch Widget', 'streamweasels-twitch-widget'), 
            
            // Widget description
            array( 'description' => __( 'StreamWeasels Twitch Widget', 'streamweasels-twitch-widget' ), )
            );
        }
  
        // Creating widget front-end
        
        public function widget( $args, $instance ) {
            $title = apply_filters( 'widget_title', $instance['title'] );
            
            // before and after widget arguments are defined by themes
            echo $args['before_widget'];

            $siteURL = parse_url(get_site_url());
            $twitchParent = $siteURL['host'];
            $channel = !empty( $instance['title'] ) ? $instance['title'] : 'monstercat';
            $width = !empty( $instance['width'] ) ? $instance['width'] : '100%';
            $height = !empty( $instance['height'] ) ? $instance['height'] : '500px';
            $autoplay = !empty( $instance['autoplay'] ) ? 'true' : 'false';
            $muted = !empty( $instance['muted'] ) ? 'true' : 'false';

            
            // This is where you run the code and display the output
            echo '<iframe 
                src="https://player.twitch.tv/?channel='.esc_attr($channel).'&parent='.esc_url($twitchParent).'&autoplay='.esc_attr($autoplay).'&muted='.esc_attr($muted).'"
                title="'.esc_attr($instance['title']).'"
                frameBorder="0"
                height="'.esc_attr($height).'"
                width="'.esc_attr($width).'"
                    ></iframe>';
            echo $args['after_widget'];
        }
  
        // Widget Backend
        public function form( $instance ) {

            // Widget admin form
            ?>
            <!-- Twitch Username -->
            <?php $title = isset( $instance['title'] ) ? $instance['title'] : 'monstercat'; ?>
            <p><?php esc_attr_e( 'This is a very simple widget to display a single Twitch embed.', 'streamweasels-twitch-widget' ); ?></p>
            <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Twitch Username:', 'streamweasels-twitch-widget' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo sanitize_text_field( $title ); ?>" />
            </p>

            <!-- Width -->
            <?php $width = isset( $instance['width'] ) ? $instance['width'] : '100%'; ?>
            <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'width' ) ); ?>"><?php esc_attr_e( 'Embed Width:', 'streamweasels-twitch-widget' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'width' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'width' ) ); ?>" type="text" value="<?php echo sanitize_text_field( $width ); ?>" />
            </p>
            
            <!-- Height -->
            <?php $height = isset( $instance['height'] ) ? $instance['height'] : '500px'; ?>
            <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'height' ) ); ?>"><?php esc_attr_e( 'Embed Height:', 'streamweasels-twitch-widget' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'height' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'height' ) ); ?>" type="text" value="<?php echo sanitize_text_field( $height ); ?>" />
            </p>            

            <!-- Autoplay -->
            <?php $autoplay = ( isset( $instance['autoplay'] ) && $instance['autoplay'] == '1' ) ? 1 : 'false'; ?>
            <p><?php esc_attr_e( 'Choose to autoplay the embedded stream.', 'streamweasels-twitch-widget' ); ?></p>
            <p>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'autoplay' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'autoplay' ) ); ?>" type="checkbox" value="1" <?php checked( $autoplay, true ); ?>>
                <label for="<?php echo esc_attr( $this->get_field_id( 'autoplay' ) ); ?>"><?php esc_attr_e( 'Autoplay', 'streamweasels-twitch-widget' ); ?></label>
            </p>       
            
            <!-- Start Muted -->
            <?php $muted = ( isset( $instance['muted'] ) && $instance['muted'] == '1' ) ? 1 : 'false'; ?>
            <p><?php esc_attr_e( 'Choose to start the embedded stream muted.', 'streamweasels-twitch-widget' ); ?></p>
            <p>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'muted' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'muted' ) ); ?>" type="checkbox" value="1" <?php checked( $muted, true ); ?>>
                <label for="<?php echo esc_attr( $this->get_field_id( 'muted' ) ); ?>"><?php esc_attr_e( 'Start Muted', 'streamweasels-twitch-widget' ); ?></label>
            </p>            
            <?php            
        }
  
        // Updating widget replacing old instances with new
        public function update( $new_instance, $old_instance ) {
            $instance = array();
            $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
            $instance['width'] = ( ! empty( $new_instance['width'] ) ) ? sanitize_text_field( $new_instance['width'] ) : '';
            $instance['height'] = ( ! empty( $new_instance['height'] ) ) ? sanitize_text_field( $new_instance['height'] ) : '';
            $instance['autoplay'] = ( ! empty( $new_instance['autoplay'] ) ) ? sanitize_text_field( $new_instance['autoplay'] ) : '';
            $instance['muted'] = ( ! empty( $new_instance['muted'] ) ) ? sanitize_text_field( $new_instance['muted'] ) : '';
            return $instance;
        }
    }
}