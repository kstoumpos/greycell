<?php defined( 'ABSPATH' ) or die( "Cheating........Uh!!" ); ?>
<h2>Social Login Buttons</h2>
<form action="options.php" method="post">
	<?php settings_fields( 'heateor_slb_license_options' ); ?>
	<div class="metabox-holder columns-2" id="post-body">
		<div class="heateor_left_column">
			<div class="stuffbox">
				<h3 class="hndle"><label><?php _e( 'License Options', 'heateor-social-login-buttons' );?></label></h3>
				<div class="inside">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form-table editcomment menu_content_table">
						<tr>
							<td colspan="2">
							<div>
							<?php printf( __( '<strong>Note:</strong> If you are replacing old expired license key with a new valid license key, just click the "Check for updates" link once below the name of the add-on at <a target="_blank" href="%s">Plugins</a> page, to refresh previous license expiry notification you are seeing', 'heateor-social-login-buttons' ), admin_url() . 'plugins.php' ) ?>
							</div>
							</td>
						</tr>

						<tr>
							<th>
							<img id="heateor_slb_license_key_help" class="heateor_help_bubble" src="<?php echo plugins_url( '../images/info.png', __FILE__ ) ?>" />
							<label for="heateor_slb_license_key"><?php _e( "License Key", 'heateor-social-login-buttons' ); ?></label>
							</th>
							<td>
							<input style="width:330px" type="text" id="heateor_slb_license_key" name="heateor_slb_license[license_key]" value="<?php echo isset( $heateor_slb_license_options['license_key'] ) ? $heateor_slb_license_options['license_key'] : '' ?>" />
							</td>
						</tr>

						<tr class="heateor_help_content" id="heateor_slb_license_key_help_cont">
							<td colspan="2">
							<div>
							<?php _e( 'Save the license key you received with this plugin, to enable updates', 'heateor-social-login-buttons' ) ?>
							</div>
							</td>
						</tr>

					</table>
				</div>
			</div>
			<div style="clear:both"></div>
			<p class="submit">
				<input type="submit" name="save" class="button button-primary" value="<?php _e( "Save Changes", "heateor-social-login-buttons" ); ?>" />
			</p>
		</div>
		<?php require 'help.php' ?>
	</div>
</form>