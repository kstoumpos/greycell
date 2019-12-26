<?php defined( 'ABSPATH' ) or die( "Cheating........Uh!!" ); ?>
<h2>Social Login Buttons</h2>
<form action="options.php" method="post">
<?php settings_fields( 'heateor_slb_options' ); ?>
<div class="metabox-holder columns-2" id="post-body">
	<div class="heateor_left_column">
		<div class="stuffbox">
			<h3 class="hndle"><label><?php _e( 'Configuration', 'heateor-social-login-buttons' );?></label></h3>
			<div class="inside">
				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form-table editcomment menu_content_table">
					<tr>
						<th colspan="2">
						<img id="heateor_slb_theme_help" class="heateor_help_bubble" src="<?php echo plugins_url( '../images/info.png', __FILE__ ) ?>" />
						<label for="heateor_slb_theme"><?php _e( "Choose a theme", 'heateor-social-login-buttons' ); ?></label>
						</th>
					</tr>

					<tr id="heateor_slb_icon_themes">
						<td>
						<input style="float:left" id="heateor_slb_theme_1" type="radio" name="heateor_slb[theme]" <?php echo $heateor_slb_options['theme'] == '1' ? 'checked' : ''; ?> value="1" /><br/>
						<label style="float:left" for="heateor_slb_theme_1"><img height="430" width="290" src="<?php echo plugins_url( '../images/themes/1.png', __FILE__ ); ?>" /></label>
						</td>

						<td>
						<input style="float:left" id="heateor_slb_theme_2" type="radio" name="heateor_slb[theme]" <?php echo $heateor_slb_options['theme'] == '2' ? 'checked' : ''; ?> value="2" /><br/>
						<label style="float:left" for="heateor_slb_theme_2"><img height="430" width="290" src="<?php echo plugins_url( '../images/themes/2.png', __FILE__ ); ?>" /></label>
						</td>
					</tr>

					<tr>
						<td colspan="2">
						<input style="float:left" id="heateor_slb_theme_3" type="radio" name="heateor_slb[theme]" <?php echo $heateor_slb_options['theme'] == '3' ? 'checked' : ''; ?> value="3" /><br/>
						<label style="float:left" for="heateor_slb_theme_3"><img height="430" src="<?php echo plugins_url( '../images/themes/3.png', __FILE__ ); ?>" /></label>
						</td>
					</tr>

					<tr class="heateor_help_content" id="heateor_slb_theme_help_cont">
						<td colspan="2">
						<div>
						<?php _e( 'Choose a theme for social login icons', 'heateor-social-login-buttons' ) ?>
						</div>
						</td>
					</tr>

					<tr>
						<th>
						<img id="heateor_slb_icon_text_help" class="heateor_help_bubble" src="<?php echo plugins_url( '../images/info.png', __FILE__ ) ?>" />
						<label for="heateor_slb_icon_text"><?php _e( "Button text", 'heateor-social-login-buttons' ); ?></label>
						</th>
						<td>
						<input id="heateor_slb_icon_text" name="heateor_slb[icon_text]" type="text" value="<?php echo $heateor_slb_options['icon_text'] ?>" />
						</td>
					</tr>
					
					<tr class="heateor_help_content" id="heateor_slb_icon_text_help_cont">
						<td colspan="2">
						<div>
						<?php _e( 'Text to show in login buttons before the name of social network', 'heateor-social-login-buttons' ) ?>
						</div>
						</td>
					</tr>
				</table>
			</div>
		</div>

		<div class="heateor_clear"></div>
		<p class="submit">
			<input style="margin-left:8px" type="submit" name="save" class="button button-primary" value="<?php _e( "Save Changes", 'heateor-social-login-buttons' ); ?>" />
		</p>
	</div>
	<?php require 'help.php' ?>
</div>
</form>