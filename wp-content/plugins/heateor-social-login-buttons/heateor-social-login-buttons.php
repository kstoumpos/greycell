<?php
/*
Plugin Name: Social Login Buttons by Heateor
Plugin URI: https://www.heateor.com/social-login-buttons
Description: Replace default Social Login buttons with premium social login buttons
Version: 1.1.10
Author: Team Heateor
Author URI: https://www.heateor.com
Domain Path: /languages
License: GPL2+
*/
defined( 'ABSPATH' ) or die( "Cheating........Uh!!" );

define( 'HEATEOR_SOCIAL_LOGIN_BUTTONS_VERSION', '1.1.10' );
define( 'HEATEOR_SOCIAL_LOGIN_BUTTONS_SLUG', 'heateor-social-login-buttons' );

$heateor_slb_options = get_option( 'heateor_slb' );
$heateor_slb_license_options = get_option( 'heateor_slb_license' );

if ( is_admin() && isset( $heateor_slb_license_options['license_key'] ) && $heateor_slb_license_options['license_key'] != '' ) {
	require 'library/plugin-update-checker/plugin-update-checker.php';
	$heateor_slb_update_checker = Puc_v4_Factory::buildUpdateChecker(
	    'https://www.heateor.com/api/license-manager/v1/info?l=' . $heateor_slb_license_options['license_key'] . '&w=' . urlencode( str_replace( array( 'http://', 'https://' ), '', site_url() ) ),
	    __FILE__,
	    HEATEOR_SOCIAL_LOGIN_BUTTONS_SLUG
	);
}

/**
 * Default options when plugin is activated
 */
function heateor_slb_default_options() {
	// plugin defaul options
	add_option( 'heateor_slb', array(
	   'theme' => '1',
	   'icon_text' => 'Login with',
	) );

	// plugin version
	add_option( 'heateor_slb_version', HEATEOR_SOCIAL_LOGIN_BUTTONS_VERSION );

	set_transient( 'heateor-slb-admin-notice-on-activation', true, 5 );
}
register_activation_hook( __FILE__, 'heateor_slb_default_options' );

/**
 * Hook the plugin function on 'init' event
 */
function heateor_slb_init() {
	if ( ! is_user_logged_in() ) {
		add_action( 'wp_enqueue_scripts', 'heateor_slb_frontend_styles' );
		add_action( 'login_enqueue_scripts', 'heateor_slb_frontend_styles' );
	}
}
add_action( 'init', 'heateor_slb_init' );

/**
 * Update options, version on basis of version comparison
 */
function heateor_slb_update_check() {
	$current_version = get_option( 'heateor_slb_version' );

	if ( $current_version != HEATEOR_SOCIAL_LOGIN_BUTTONS_VERSION ) {
		if ( version_compare( $current_version, "1.0" ) > 0 ) {
			global $heateor_slb_options;
			$heateor_slb_options['theme'] = '1';
			$heateor_slb_options['icon_text'] = 'Login with';
			update_option( 'heateor_slb', $heateor_slb_options );
		}

		update_option( 'heateor_slb_version', HEATEOR_SOCIAL_LOGIN_BUTTONS_VERSION );
	}
}
add_action( 'plugins_loaded', 'heateor_slb_update_check' );

/**
 * Stylesheets to load at front end
 */
function heateor_slb_frontend_styles() {
	global $heateor_slb_options;
	wp_enqueue_style( 'heateor_slb_frontend_css', plugins_url( 'css/theme' . $heateor_slb_options['theme'] . '.css', __FILE__ ), false, HEATEOR_SOCIAL_LOGIN_BUTTONS_VERSION );
}

/**
 * Create plugin menu in admin
 */	
function heateor_slb_create_admin_menu() {
	$options_page = add_menu_page( __( 'Heateor - Social Login Buttons', 'heateor-social-login-buttons' ), __( 'Social Login Buttons', 'heateor-social-login-buttons' ), 'manage_options', 'heateor-slb', 'heateor_slb_options_page', plugins_url( 'images/logo.png', __FILE__ ) );
	$license_page = add_submenu_page( 'heateor-slb', 'License Settings', 'License Settings', 'manage_options', 'heateor-slb-license-settings', 'heateor_slb_license_settings_page' );
	add_action( 'admin_print_scripts-' . $options_page, 'heateor_slb_admin_scripts' );
	add_action( 'admin_print_scripts-' . $options_page, 'heateor_slb_admin_style' );
	add_action( 'admin_print_scripts-' . $options_page, 'heateor_slb_fb_sdk_script' );
	add_action( 'admin_print_scripts-' . $license_page, 'heateor_slb_admin_scripts' );
	add_action( 'admin_print_scripts-' . $license_page, 'heateor_slb_fb_sdk_script' );
	add_action( 'admin_print_styles-' . $license_page, 'heateor_slb_admin_style' );
}
add_action( 'admin_menu', 'heateor_slb_create_admin_menu' );

/**
 * Options page for the add-on
 */
function heateor_slb_options_page() {
	global $heateor_slb_options;
	echo heateor_slb_settings_saved_notification();
	require 'admin/plugin-options.php';
}

/**
 * Include javascript files in admin
 */	
function heateor_slb_admin_scripts() {
	?>
	<script>var heateorSlbWebsiteUrl = '<?php echo site_url() ?>', heateorSlbHelpBubbleTitle = "<?php echo __( 'Click to show help', 'heateor-social-login-buttons' ) ?>", heateorSlbHelpBubbleCollapseTitle = "<?php echo __( 'Click to hide help', 'heateor-social-login-buttons' ) ?>"; </script>
	<?php
	wp_enqueue_script( 'heateor_slb_admin_scripts', plugins_url( 'js/admin/admin.js', __FILE__ ), array( 'jquery' ), HEATEOR_SOCIAL_LOGIN_BUTTONS_VERSION );
}

/**
 * Include CSS files in admin
 */	
function heateor_slb_admin_style() {
	wp_enqueue_style( 'heateor_slb_admin_style', plugins_url( 'css/admin.css', __FILE__ ), false, HEATEOR_SOCIAL_LOGIN_BUTTONS_VERSION );
}

/**
 * Include Javascript SDK in admin
 */	
function heateor_slb_fb_sdk_script() {
	wp_enqueue_script( 'heateor_slb_fb_sdk_script', plugins_url( 'js/admin/fb_sdk.js', __FILE__ ), false, HEATEOR_SOCIAL_LOGIN_BUTTONS_VERSION );
}

/**
 * Admin initialization
 */
function heateor_slb_plugin_settings_fields() {
	register_setting( 'heateor_slb_license_options', 'heateor_slb_license', 'heateor_slb_validate_options' );
	register_setting( 'heateor_slb_options', 'heateor_slb', 'heateor_slb_validate_options' );
}
add_action( 'admin_init', 'heateor_slb_plugin_settings_fields' );

/**
 * Display notification message when plugin options are saved
 */
function heateor_slb_settings_saved_notification() {
	if ( isset( $_GET['settings-updated']) && $_GET['settings-updated'] == 'true' ) {
		return '<div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible below-h2"> 
<p><strong>' . __( 'Settings saved', 'heateor-social-login-buttons' ) . '</strong></p><button type="button" class="notice-dismiss"><span class="screen-reader-text">' . __( 'Dismiss this notice', 'heateor-social-login-buttons' ) . '</span></button></div>';
	}
}

/**
 * License Options page
 */
function heateor_slb_license_settings_page() {
	global $heateor_slb_license_options;
	echo heateor_slb_settings_saved_notification();
	require 'admin/license-options.php';
}

/** 
 * Validate plugin options
 */ 
function heateor_slb_validate_options( $options) {
	foreach( $options as $k => $v ) {
		if ( is_string( $v ) ) {
			$options[$k] = trim( esc_attr( $v ) );
		}
	}
	return $options;
}

/**
 * Show notifications related to license in admin area
 */
function heateor_slb_license_notification() {
	if ( current_user_can( 'manage_options' ) ) {
		global $heateor_slb_license_options;
		if ( ( ! isset( $heateor_slb_license_options['license_key'] ) || $heateor_slb_license_options['license_key'] == '' ) ) {
			?>
			<div class="error">
				<h3>Social Login Buttons</h3>
				<p><?php _e( 'Save license key at <strong>Social Login Buttons</strong> page to enable plugin updates', 'heateor-social-login-buttons' ) ?><a style="margin-left: 8px" href="<?php echo admin_url() . 'admin.php?page=heateor-slb-license-settings' ?>"><input type="button" class="button button-primary" value="<?php _e( 'Let\'s do it', 'heateor-social-login-buttons' ) ?>" /></a></p>
			</div>
			<?php
		}

		$heateor_slb_last_update_check = get_option( 'external_updates-' . HEATEOR_SOCIAL_LOGIN_BUTTONS_SLUG );
		if ( $heateor_slb_last_update_check && !empty( $heateor_slb_last_update_check->update->upgrade_notice ) ) {
			?>
			<div class="error">
				<h3>Social Login Buttons</h3>
				<p><?php echo $heateor_slb_last_update_check->update->upgrade_notice ?></p>
			</div>
			<?php
		}

		if(get_transient('heateor-slb-admin-notice-on-activation')){ ?>
		    <div class="notice notice-success is-dismissible">
		    	<h3>Social Login Buttons</h3>
		        <p><?php _e( 'Update Super Socializer plugin to latest version to ensure compatibiltiy with this version of Social Login Buttons', 'social-login-buttons' ); ?></p>
		    </div> <?php
		    // Delete transient, only display this notice once
		    delete_transient('heateor-slb-admin-notice-on-activation');
		}
	}
}
add_action( 'admin_notices', 'heateor_slb_license_notification' );


/**
 * Custom Social Login html
 */
function heateor_slc_custom_login_interface( $html, $theChampLoginOptions, $widget ) {
	if ( isset( $theChampLoginOptions['providers'] ) && is_array( $theChampLoginOptions['providers'] ) && count( $theChampLoginOptions['providers'] ) > 0 ) {
		$html = the_champ_login_notifications( $theChampLoginOptions );
		if ( ! $widget ) {
			$html .= '<div class="the_champ_outer_login_container">';
			if( isset( $theChampLoginOptions['title'] ) && $theChampLoginOptions['title'] != '' ) {
				$html .= '<div class="the_champ_social_login_title">' . $theChampLoginOptions['title'] . '</div>';
			}
		}
		$html .= '<div class="the_champ_login_container">';
		$gdprOptIn = '';
		if(isset($theChampLoginOptions['gdpr_enable'])){
			$gdprOptIn = '<div class="heateor_ss_sl_optin_container"><label><input type="checkbox" class="heateor_ss_social_login_optin" value="1" />'. str_replace($theChampLoginOptions['ppu_placeholder'], '<a href="'. $theChampLoginOptions['privacy_policy_url'] .'" target="_blank">'. $theChampLoginOptions['ppu_placeholder'] .'</a>', wp_strip_all_tags($theChampLoginOptions['privacy_policy_optin_text'])) .'</label></div>';
		}
		if(isset($theChampLoginOptions['gdpr_enable']) && $theChampLoginOptions['gdpr_placement'] == 'above'){
			$html .= $gdprOptIn;
		}
		$html .= '<ul class="the_champ_login_ul">';
		if ( isset( $theChampLoginOptions['providers'] ) && is_array( $theChampLoginOptions['providers'] ) && count( $theChampLoginOptions['providers'] ) > 0 ) {
			global $heateor_slb_options;
			if($heateor_slb_options['theme'] != '2'){
				foreach ( $theChampLoginOptions['providers'] as $provider ) {
					$html .= '<li><div class="theChampLoginButtonBackground theChamp'. ucfirst( $provider ) .'LoginBackground" onclick="theChampInitiateLogin(this)" alt="Login with ' . ucfirst( $provider ) . '"><i ';
					// id
					if ( $provider == 'google' ) {
						$html .= 'id="theChamp'. ucfirst( $provider ) .'Button" ';
					}
					// class
					$html .= 'class="theChampLogin theChamp'. ucfirst( $provider ) .'Background theChamp'. ucfirst( $provider ) .'Login" ';
					$html .= 'alt="Login with ';
					$html .= ucfirst( $provider );
					$html .= '" title="' . $heateor_slb_options['icon_text'] . ' ';
					if ( $provider == 'live' ) {
						$html .= 'Windows Live';
					} else {
						$html .= ucfirst( $provider );
					}
					if ( current_filter() == 'comment_form_top' || current_filter() == 'comment_form_must_log_in_after' ) {
						$html .= '" onclick="theChampCommentFormLogin = true; theChampInitiateLogin(this)" >';
					} else {
						$html .= '" onclick="theChampInitiateLogin(this)" >';
					}
					$html .= '<ss style="display:block" class="theChampLoginSvg theChamp'. ucfirst( $provider ) .'LoginSvg"></ss></i><div class="theChampLoginButtonText">' . $heateor_slb_options['icon_text'] . ' '. ucfirst( $provider ) .'</div></li>';
				}
			}else{
				foreach($theChampLoginOptions['providers'] as $provider){
					$html .= '<li class="theChamp'. ucfirst($provider) .'Li" alt="Login with '. ucfirst($provider) .'" onclick="theChampInitiateLogin(this)"><i ';
					// id
					if( $provider == 'google' ){
						$html .= 'id="theChamp'. ucfirst($provider) .'Button" ';
					}
					// class
					$html .= 'class="theChampLogin theChamp'. ucfirst($provider) .'Background theChamp'. ucfirst($provider) .'Login" ';
					$html .= 'alt="Login with ';
					$html .= ucfirst($provider);
					$html .= '" title="' . $heateor_slb_options['icon_text'] . ' ';
					if($provider == 'live'){
						$html .= 'Windows Live';
					}else{
						$html .= ucfirst($provider);
					}
					if(current_filter() == 'comment_form_top' || current_filter() == 'comment_form_must_log_in_after'){
						$html .= '" onclick="theChampCommentFormLogin = true; theChampInitiateLogin(this)" >';
					}else{
						$html .= '" onclick="theChampInitiateLogin(this)" >';
					}
					$html .= '<ss style="display:block" class="theChampLoginSvg theChamp'. ucfirst($provider) .'LoginSvg"></ss></i></li>';
				}
			}
		}
		$html .= '</ul>';
		if(isset($theChampLoginOptions['gdpr_enable']) && $theChampLoginOptions['gdpr_placement'] == 'below'){
			$html .= $gdprOptIn;
		}
		$html .= '</div>';
		if ( ! $widget ) {
			$html .= '</div><div style="clear:both; margin-bottom: 6px"></div>';
		}
	}
	return $html;
}
add_filter( 'the_champ_login_interface_filter', 'heateor_slc_custom_login_interface', 10, 3 );