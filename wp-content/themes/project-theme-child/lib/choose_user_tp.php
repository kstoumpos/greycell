<?php

/***************************************************************************
*
*	ProjectTheme - copyright (c) - sitemile.com
*	The only project theme for wordpress on the world wide web.
*
*	Coder: Andrei Dragos Saioc
*	Email: sitemile[at]sitemile.com | andreisaioc[at]gmail.com
*	More info about the theme here: http://sitemile.com/products/wordpress-project-freelancer-theme/
*	since v1.2.5.3
*
***************************************************************************/


if(!is_user_logged_in()) { wp_redirect( home_url()."/wp-login.php"); exit; }

global $wpdb,$wp_rewrite,$wp_query;

//---------------------------------
global $current_user;
$current_user = wp_get_current_user();
$uid = $current_user->ID;

	if(isset($_POST['submit']))
	{
		// Get the values after form submission
    $username = sanitize_user( $_POST['user_name'], true );

    // Get the current user
    $current_user = wp_get_current_user();

    // Initailizing variables
    $error = false;
    $message = '';
    $uname = 0;

    // Checking the validatiy of the username and change it
    if ( $username ) {
        if ( $username !== $current_user->user_login ) {
           if ( username_exists( $username ) ) {
               $error = true;
               $message = 'Username already exists';
           } else {
               global $wpdb;

               // Query to change the username
               $query = $wpdb->query( $wpdb->prepare( "UPDATE $wpdb->users SET user_login = %s WHERE user_login = %s", $username, $current_user->user_login ) );

               if ( $query ) {
                   $message = 'Profile updated';
                   $uname = 1;
               }
           }
       }
    } else {
        $error = true;
        $message = 'Username is a required field.';
    }

		update_user_meta($uid, 'user_tp', $_POST['user_tp']);

		$user = new WP_User($uid);
		$user->set_role($_POST['user_tp']);

		wp_redirect(get_permalink(get_option('ProjectTheme_my_account_page_id')));
		exit;
	}

	if ( $_POST ) {

}


//==========================

get_header();

?>

		<?php projectTheme_get_the_search_box() ?>
	</div>
</div>


<?php projecttheme_search_box_thing() ?>

<div id="main_wrapper">
	<div id="main" class="wrapper-register">
		<div class="my_box3">
			<div class="padd10">
				<div class="box_title">
				</div>
				<div class="box_content">
					<div class="clear10">
					</div>
					<div class="login-submit-form">
						<form method="post">
							<h4>
								<?php _e( 'Username', 'ProjectTheme' ) ?>
										<br><br>
										<input type="text" class="do_input" id="user_name" name="user_name">
										<br><br>
									</h4>

									<h4>
								<?php _e( 'I want to', 'ProjectTheme' ); ?>
							</h4>

							<div class="container" style="width:100%">
								<div class="row" >
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 member-type-radio-container" id="register_radio">
											<label for="user_tp_contractor">
												<span class="ml-2">
													<input type="radio" onclick="javascript:Checked();" class="do_input" name="user_tp" id="user_tp" value="service_provider" checked="checked" />
													<?php echo _e("Place a bid"); ?>
													</span>
												</label>
											</div>
											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 member-type-radio-container" id="register_radio">
												<label for="user_tp_contractor">
													<span class="ml-2">
														<input type="radio" onclick="javascript:Checked();" class="do_input" name="user_tp" id="user_tp" value="business_owner" />
														<?php echo _e("Post a project"); ?>
														</span>
													</label>
												</div>
											</div>
										</div><br>

							<input type="submit" class="submit_bottom"
							<?php if (get_locale() == 'en_GB') { ?>
							<?php echo "Submit"; } ?>
							<?php if(get_locale() =='el'); { ?>
							<?php echo "Υποβολή"; } ?>
							name="submit" />
						</form>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="clear100"></div>

	<?php

	get_footer();

	?>
