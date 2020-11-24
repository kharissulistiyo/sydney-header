<?php
/**
 * Sydney Header
 *
 * @package     Sydney Header
 * @author      kharisblank
 * @copyright   2020 kharisblank
 * @license     GPL-2.0+
 *
 * @sydney-header
 * Plugin Name: Sydney Header
 * Plugin URI:  https://easyfixwp.com/
 * Description: A simple plugin to customize Sydney theme's header.
 * Version:     0.0.6
 * Author:      kharisblank
 * Author URI:  https://easyfixwp.com
 * Text Domain: sydney-header
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 */


// Disallow direct access to file
defined( 'ABSPATH' ) or die( __('Not Authorized!', 'sydney-header') );

define( 'SYDNEY_HEADER_FILE', __FILE__ );
define( 'SYDNEY_HEADER_URL', plugins_url( null, SYDNEY_HEADER_FILE ) );


if ( ! function_exists( 'ignis_setup' ) ) :
  // return;
endif;


if ( !class_exists('Sydney_Header') ) :
  class Sydney_Header {

    public function __construct() {
      add_action('sydney_before_header', array($this, 'sydney_header'), 9999);
      add_action( 'wp_enqueue_scripts', array($this, 'enqueue_scripts'), 9999 );
    }

    function sydney_header() {
      ?>

      <header id="masthead2" class="site-header sydney-header-2" role="banner">
    		<div class="header-wrap">
                <div class="<?php echo esc_attr( sydney_menu_container() ); ?>">
                    <div class="row">
    					<div class="col-md-4 col-sm-8 col-xs-12">
    					<?php if ( get_theme_mod('site_logo') ) : ?>
    						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><img class="site-logo" src="<?php echo esc_url(get_theme_mod('site_logo')); ?>" alt="<?php bloginfo('name'); ?>" /></a>
    						<?php if ( is_home() && !is_front_page() ) : ?>
    							<h1 class="site-title screen-reader-text"><?php bloginfo( 'name' ); ?></h1>
    						<?php endif; ?>
    					<?php else : ?>
    						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
    						<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
    					<?php endif; ?>
    					</div>
    					<div class="col-md-8 col-sm-4 col-xs-12">
    						<div class="btn-menu2"><i class="sydney-svg-icon"><?php sydney_get_svg_icon( 'icon-menu', true ); ?></i></div>

                <?php do_action('sydney-header-mainnav-before'); ?>

                <nav id="mainnav2" class="mainnav" role="navigation">
    							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'fallback_cb' => 'sydney_menu_fallback' ) ); ?>
    						</nav><!-- #site-navigation -->

                <?php do_action('sydney-header-mainnav-after'); ?>

              </div>
    				</div>
    			</div>
    		</div>
    	</header><!-- #masthead -->

      <?php
    }

    function enqueue_scripts() {
      wp_register_style( 'sydney-header-style', SYDNEY_HEADER_URL . '/css/sydney-header-style.css', array(), null );
      wp_register_script('sydney-header-script',
                        SYDNEY_HEADER_URL .'/js/sydney-header.js',
                        array ('jquery'),
                        false, true);

      wp_enqueue_style( 'sydney-header-style' );
      wp_enqueue_script( 'sydney-header-script' );
    }

  }
endif;

new Sydney_Header;
