<?php
	function isMobileDevice() {
		return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo
	|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i"
	, $_SERVER["HTTP_USER_AGENT"]);
	}
class Glf_Promo_Cards extends WP_Widget {

	public $args = array(
		'before_title'  => '<h4 class="widgettitle">',
		'after_title'   => '</h4>',
		'before_widget' => '<div class="widget-wrap">',
		'after_widget'  => '</div></div>'
	);

	function __construct() {

		parent::__construct(
			'glf-promo-cards',  // Base ID
			__( 'Hanoi Alley - Promo Card', 'hanoialley-restaurant' )   // Name
		);
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( empty( $instance['position'] ) ) {
			$instance['position'] = 1;
		}

		$count = 0;
		for ( $i = 1; $i <= 8; $i ++ ) {
			if ( ! empty( $instance[ 'title_' . $i ] ) ) {
				$count ++;
			}
		}

		echo "<div class='row justify-content-center'>";
		for ( $i = 1; $i <= 8; $i ++ ) {
			if ( ! empty( $instance[ 'title_' . $i ] ) ) {
				if(isMobileDevice()){if($i%2!=0) {$result='data-aos="fade-right"';}else{$result='data-aos="fade-left"';}}else{$result='data-aos="zoom-in"';}
				echo "<div class='col-lg-4 col-md-6 glf-promo-card-supercontainer'>
                    <div class='glf-promo-card-container card' ".$result." id='card_".$i."'>
                        <div class='glf-promo-card card-body'>
                            <h3>{$instance[ 'title_' . $i ]}</h3>
                            <span class='glf-card-subbtitle-container'>
                                <span class='glf-card-subtitle-dash'></span>
                                <span class='glf-card-subtitle subtitle-small'>{$instance[ 'subtitle_' . $i ]}</span>
                            </span>" . wpautop( $instance[ 'text_' . $i ] ) . ( ( ! empty( $instance[ 'price_label_' . $i ] ) || ! empty( $instance[ 'price_' . $i ] ) ) ? "<span class='glf-promo-card-price'>{$instance[ 'price_label_' . $i ]} <span
                                    class='glf-promo-card-price-value'>{$instance[ 'price_' . $i ]}</span></span>" : '' ) . "
                        </div>
                    </div>
                </div>";
			}
		}
		echo "</div>";

		echo $args['after_widget'];

	}

	public function form( $instance ) {
		for ( $i = 1; $i <= 8; $i ++ ) :
			$title = ! empty( $instance[ 'title_' . $i ] ) ? $instance[ 'title_' . $i ] : '';
			$subtitle = ! empty( $instance[ 'subtitle_' . $i ] ) ? $instance[ 'subtitle_' . $i ] : '';
			$text = ! empty( $instance[ 'text_' . $i ] ) ? $instance[ 'text_' . $i ] : '';
			$price_label = ! empty( $instance[ 'price_label_' . $i ] ) ? $instance[ 'price_label_' . $i ] : '';
			$price = ! empty( $instance[ 'price_' . $i ] ) ? $instance[ 'price_' . $i ] : '';
			?>
            <style>
                #available-widgets [class*=glf-promo-cards] .widget-title:before {
                    font-family: "GLFIcons";
                    content: "\0042";
                }
            </style>
            <p>
                <b <?php echo( $i > 1 ? "style='display:block;margin-top:30px;border-top:1px solid #ddd;padding-top:20px;'" : '' ); ?>><?php echo esc_html('Promo card','gloriafood-restaurant').' '.$i; ?></b>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title_' . $i ) ); ?>"><?php esc_html_e( 'Title:', 'gloriafood-restaurant' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title_' . $i ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'title_' . $i ) ); ?>" type="text"
                       value="<?php echo esc_attr( $title ); ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'subtitle_' . $i ) ); ?>"><?php esc_html_e( 'Subtitle:', 'gloriafood-restaurant' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'subtitle_' . $i ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'subtitle_' . $i ) ); ?>" type="text"
                       value="<?php echo esc_attr( $subtitle ); ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'text_' . $i ) ); ?>"><?php esc_html_e( 'Text:', 'gloriafood-restaurant' ); ?></label>
                <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text_' . $i ) ); ?>"
                          name="<?php echo esc_attr( $this->get_field_name( 'text_' . $i ) ); ?>" type="text" cols="30"
                          rows="10"><?php echo esc_html( $text ); ?></textarea>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'price_label_' . $i ) ); ?>"><?php esc_html_e( 'Price label:', 'gloriafood-restaurant' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'price_label_' . $i ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'price_label_' . $i ) ); ?>" type="text"
                       value="<?php echo esc_attr( $price_label ); ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'price_' . $i ) ); ?>"><?php esc_html_e( 'Price:', 'gloriafood-restaurant' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'price_' . $i ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'price_' . $i ) ); ?>" type="text"
                       value="<?php echo esc_attr( $price ); ?>">
            </p>

		<?php
		endfor;


	}

	public function update( $new_instance, $old_instance ) {

		$instance = array();

		for ( $i = 1; $i <= 8; $i ++ ) {
			$instance[ 'title_' . $i ]       = ( ! empty( $new_instance[ 'title_' . $i ] ) ) ? wp_strip_all_tags( $new_instance[ 'title_' . $i ] ) : '';
			$instance[ 'subtitle_' . $i ]    = ( ! empty( $new_instance[ 'subtitle_' . $i ] ) ) ? wp_strip_all_tags( $new_instance[ 'subtitle_' . $i ] ) : '';
			$instance[ 'text_' . $i ]        = ( ! empty( $new_instance[ 'text_' . $i ] ) ) ? $new_instance[ 'text_' . $i ] : '';
			$instance[ 'price_label_' . $i ] = ( ! empty( $new_instance[ 'price_label_' . $i ] ) ) ? wp_strip_all_tags( $new_instance[ 'price_label_' . $i ] ) : '';
			$instance[ 'price_' . $i ]       = ( ! empty( $new_instance[ 'price_' . $i ] ) ) ? $new_instance[ 'price_' . $i ] : '';
		}

		return $instance;
	}

}
