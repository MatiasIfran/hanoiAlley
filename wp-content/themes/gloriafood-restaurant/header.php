<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GloriaFoodRestaurant
 * @since 1.0.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <?php wp_head(); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 </head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>
    <nav class="navbar navbar-expand-md navbar-light fixed-top" id="navbar">
        <div class="container ">
            <?php
		if ( has_custom_logo() ) {
			the_custom_logo();
		} else {
			?>
            <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
            <?php
		}
		?>

            <button id="bs4navbar-toggler" class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php
		wp_nav_menu( array(
			'theme_location'  => 'menu-1',
			'container'       => 'div',
			'container_id'    => 'bs4navbar',
			'container_class' => 'collapse navbar-collapse',
			'menu_id'         => false,
			'menu_class'      => 'navbar-nav ml-auto',
			'depth'           => 0,
			'fallback_cb'     => 'bs4navwalker::fallback',
			'walker'          => new bs4navwalker()
		) );
		?>

            <?php
		if ( 1 === get_theme_mod( 'glf_order_buttons_show_buttons', 0 ) ) {
			if ( $gloriafood_order_buttons = gloriafood_generate_order_buttons_html() ) {
				echo "<div id='glf-navigation-order-buttons' style='display:none;'>" . $gloriafood_order_buttons . "</div>";
			}
		}
		?>
        </div>
    </nav>

    <div class="container-fluid header-container">

        <?php   global $post; if ( is_page() && $post->menu_order==0) { ?>
        <div class='header wp-block-cover' style="padding:0px; min-height:auto">
            <?php echo do_shortcode('[metaslider id="17"]'); ?>
            <div class="wp-block-cover__inner-container" style="position: absolute">
                <h1 class="lead"><?php bloginfo( 'name' ); ?></h1>
                <h2 class="jumbotron-description-container">
                    <span class="jumbotron-description-left-dash ml-auto"></span>
                    <span class="jumbotron-description lead"><?php bloginfo( 'description' ); ?></span>
                    <span class="jumbotron-description-right-dash mr-auto"></span>
                </h2>
            </div>

            <?php } elseif ( is_404() ) { } elseif ( is_search() ) {
                if ( have_posts() ) {
				    echo "<h1 class='lead'>" . esc_html__( 'Search results for:', 'gloriafood-restaurant' ) . ' ' . get_search_query() . "</h1>";
			    } else {
				    echo "<h1 class='lead'>" . esc_html__( "Nothing found", 'gloriafood-restaurant' ) . "</h1>";
			    }
            } elseif ( is_archive() ) {
                echo "<h1 class='lead'>" . get_the_archive_title() . "</h1>";
            } elseif ( is_home() ) {
                echo "<h1 class='lead'>" . get_the_title( get_option( 'page_for_posts', true ) ) . "</h1>";
            } else {
                echo "<div class='jumbotron'>";
                echo "<h1 class='lead'>" . get_the_title() . "</h1>";
            }
            ?>

        </div>
    </div>