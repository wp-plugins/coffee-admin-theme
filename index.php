<?php

/*
Plugin Name: Coffee Admin Theme
Plugin URI: http://michaelgunner.co.uk
Description: This theme gives the Wordpress dashboard a darker, sleeker look. This theme is only compatible with Wordpress 3.3.
Author: Michael Gunner
Version: 1.3
Author URI: http://michaelgunner.co.uk
*/



function load_custom_wp_admin_style(){
$options = get_option('dashtheme_sample');
        wp_register_style( 'custom_wp_admin_css', plugin_dir_url(__FILE__) . $options['option1']. $options['themeselect'] . '', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action('admin_enqueue_scripts', 'load_custom_wp_admin_style');


add_action('admin_init', 'dashtheme_sampleoptions_init' );
add_action('admin_menu', 'dashtheme_sampleoptions_add_page');

// Init plugin options to white list our options
function dashtheme_sampleoptions_init(){
	register_setting( 'dashtheme_sampleoptions_options', 'dashtheme_sample', 'dashtheme_sampleoptions_validate' );
}

// Add menu page
function dashtheme_sampleoptions_add_page() {
	add_options_page('Coffee Theme Options', 'Coffee Theme Options', 'manage_options', 'dashtheme_sampleoptions', 'dashtheme_sampleoptions_do_page');
}

// Draw the menu page itself
function dashtheme_sampleoptions_do_page() {
	?>
	<div class="wrap">
		<h2>Coffee Admin Theme Options</h2>
		
		<form method="post" action="options.php">
			<?php settings_fields('dashtheme_sampleoptions_options'); ?>
			<?php $options = get_option('dashtheme_sample'); ?>
			<table class="form-table">
				<tr valign="top"><th scope="row">Activate the theme</th>
					<td><input name="dashtheme_sample[option1]" type="checkbox" value="1" <?php checked('1', $options['option1']); ?> /></td>
				</tr>
				<tr valign="top"><th scope="row">Ignore this field for now</th>
					<td><input type="text" name="dashtheme_sample[sometext]" value="<?php echo $options['sometext']; ?>" /></td>	
				</tr>
				
				<tr valign="top"><th scope="row">Select theme</th>
						<td><select name="dashtheme_sample[themeselect]" selected="<?php echo $options['themeselect']; ?>">
						  <option value="coffee-admin">Coffee Green</option>
						  <option value="coffee-admin-red">Coffee Red</option>
						  <option value="coffee-admin-white">Coffee White</option>
						</select>	</td>
				</tr>				
			</table>
			<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</p>
		</form>
		

	</div>
	<?php	
}

// Sanitize and validate input. Accepts an array, return a sanitized array.
function dashtheme_sampleoptions_validate($input) {
	// Our first value is either 0 or 1
	$input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );
	
	// Say our second option must be safe text with no HTML tags
	$input['sometext'] =  wp_filter_nohtml_kses($input['sometext']);
	
	$input['themeselect'] =  $input['themeselect'];
	
	return $input;
}
?>
