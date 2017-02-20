<?php
/**
 * franskild theme settings
 *
 * Settings for contact information, social media links and copyright
 *
 * @package WordPress
 * @subpackage franskild
 * @since 1.0
 * @version 1.0
 */

/**
* Menu setup
*/
function setup_theme_admin_menus() {

	$page_title = _x( 'Theme Settings', 'franskild' );
	$menu_name = _x( 'Theme Settings' , 'franskild' );
	add_menu_page( $page_title, $menu_name, 'manage_options', 'franskild_settings', 'franskild_theme_setting_page' );

}

add_action( 'admin_menu', 'setup_theme_admin_menus' );

/**
* Setup for theme settings page
*/
function franskild_theme_setting_page() {

	$social_heading = '';
	$facebook = '';
	$instagram = '';
	$soundcloud = '';
	$spotify = '';
	$contact_heading = '';
	$email1 = '';
	$email2 = '';
	$copyright = '';
	?>

	<div class="wrap">
		<h1><?php _e( 'Theme Settings', 'franskild' );?></h1>
		
		<?php
		if( isset($_POST['submit']) ) :

			$new_social_heading = esc_attr( $_POST['social-heading'] );
			$new_facebook = esc_attr( $_POST['facebook'] );
			$new_instagram = esc_attr( $_POST['instagram'] );
			$new_soundcloud = esc_attr( $_POST['soundcloud'] );
			$new_spotify = esc_attr( $_POST['spotify'] );
			$new_contact_heading = esc_attr( $_POST['contact-heading'] );
			$new_email1 = esc_attr( $_POST['email1'] );
			$new_email2 = esc_attr( $_POST['email2'] );
			$new_copyright = esc_attr( $_POST['copyright'] );

			update_option( 'social-heading', $new_social_heading );
			update_option( 'facebook', $new_facebook );
			update_option( 'instagram', $new_instagram );
			update_option( 'soundcloud', $new_soundcloud );
			update_option( 'spotify', $new_spotify );
			update_option( 'contact-heading', $new_contact_heading );
			update_option( 'email1', $new_email1 );
			update_option( 'email2', $new_email2 );
			update_option( 'copyright', $new_copyright );
			?>

			<div id="settings-error-settings_updated" class="updated settings-error notice is-dismissable">
				<p>
					<strong><?php _e( 'Settings saved', 'franskild' ); ?></strong>
				</p>
				<button type="button" class="notice-dismiss"></button>
			</div> <!-- #settings-error-settings_updated, .updated settings-error notice is-dismissable -->
			<?php

		endif;

		$social_heading = get_option( 'social-heading', true );
		$facebook = get_option( 'facebook', true );
		$instagram = get_option( 'instagram', true );
		$soundcloud = get_option( 'soundcloud', true );
		$spotify = get_option( 'spotify', true );
		$contact_heading = get_option( 'contact-heading', true );
		$email1 = get_option( 'email1', true );
		$email2 = get_option( 'email2', true );
		$copyright = get_option( 'copyright', true );
		?>

		<form method="post">
			
			<!-- Social media settings -->
			<h2><?php _e( 'Social media settings', 'franskild' ); ?></h2>
			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row"><label for="social-heading"><?php _e( 'Heading', 'franskild' ); ?></label></th>
						<td>
							<input type="text" name="social-heading" id="social-heading" value="<?php echo $social_heading; ?>">
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="facebook"><?php _e( 'Facebook', 'franskild' ); ?></label></th>
						<td>
							<input type="url" name="facebook" id="facebook" value="<?php echo $facebook; ?>">
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="instagram"><?php _e( 'Instagram', 'franskild' ); ?></label></th>
						<td>
							<input type="url" name="instagram" id="instagram" value="<?php echo $instagram; ?>">
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="soundcloud"><?php _e( 'Soundcloud', 'franskild' ); ?></label></th>
						<td>
							<input type="url" name="soundcloud" id="soundcloud" value="<?php echo $soundcloud; ?>">
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="spotify"><?php _e( 'Spotify', 'franskild' ); ?></label></th>
						<td>
							<input type="url" name="spotify" id="spotify" value="<?php echo $spotify; ?>">
						</td>
					</tr>
				</tbody>
			</table> <!-- .form-table -->

			<!-- Contact settings -->
			<h2><?php _e( 'Contact settings', 'franskild' ); ?></h2>
			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row"><label for="contact-heading"><?php _e( 'Heading', 'franskild' ); ?></label></th>
						<td>
							<input type="text" name="contact-heading" id="contact-heading" value="<?php echo $contact_heading; ?>">
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="email1"><?php _e( 'Email 1', 'franskild' ); ?></label></th>
						<td>
							<input type="email" name="email1" id="email1" value="<?php echo $email1; ?>">
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="email2"><?php _e( 'Email 2', 'franskild' ); ?></label></th>
						<td>
							<input type="email" name="email2" id="email2" value="<?php echo $email2; ?>">
						</td>
					</tr>
				</tbody>
			</table> <!-- .form-table -->

			<!-- Copyright settings -->
			<h2><?php _e( 'Copyright settings', 'franskild' ); ?></h2>
			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row"><label for="copyright"><?php _e( 'Copyright', 'franskild' ); ?></label></th>
						<td>
							&copy; <input type="text" name="copyright" id="copyright" value="<?php echo $copyright; ?>">
						</td>
					</tr>
				</tbody>
			</table> <!-- .form-table -->

			<!-- Submit -->
			<p class="submit">
				<input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e( 'Save changes', 'franskild' ); ?>">
			</p>

		</form>

	</div> <!-- .wrap -->
	<?php

}
?>