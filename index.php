<?php

/*
Plugin Name: Coffee Admin Theme
Plugin URI: http://michaelgunner.co.uk
Description: This theme gives the Wordpress dashboard a darker, sleeker look. This theme is only compatible with Wordpress 3.3.
Author: Michael Gunner
Version: 1.4
Author URI: http://michaelgunner.co.uk
*/



function load_custom_wp_admin_style(){
$options = get_option('dashtheme_theme');
        wp_register_style( 'custom_wp_admin_css', plugin_dir_url(__FILE__) . $options['option1']. $options['themeselect'] . '.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action('admin_enqueue_scripts', 'load_custom_wp_admin_style');

function load_custom_wp_admin_font_style(){
$options = get_option('dashtheme_theme');
$url = explode(',',$options['fontselect']);
        wp_register_style( 'custom_wp_admin_font_css', 'http://fonts.googleapis.com/css?family=' . $url[0], false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_font_css' );
}
add_action('admin_enqueue_scripts', 'load_custom_wp_admin_font_style');


function load_custom_wp_admin_font_script(){
$options = get_option('dashtheme_theme');

$val = explode(',',$options['fontselect']);
		echo '<style type="text/css">
 /* ---- wp-admin.css ------ */ .quicktags,.search,#wphead h1,.widefat th,.tablenav .displaying-num,.inline-edit-row fieldset span.title,.inline-edit-row fieldset span.checkbox-title,#your-profile legend,.pressthis a,#poststuff h3,.metabox-holder h3,.tool-box .title {font-family: '. $val[1] .', sans-serif!important;}
/* ---- widgets.css ------- */ div.sidebar-name h3 {font-family: '. $val[1] .', sans-serif!important;}
/* ---- press-this.css ---- */ body,.category-add input,.category-add select,.submit input,.button,.button-primary,.button-secondary,.button-highlighted,#postcustomstuff .submit input {font-family: '. $val[1] .', sans-serif!important;}
/* ---- nav-menu.css ------ */ #menu-management .nav-tab {font-family: '. $val[1] .', sans-serif;!important}
/* ---- media.css --------- */ .media-upload-form label.form-help,td.help,#media-upload p.help,#media-upload label.help,#gallery-settings .title,h3.media-title,h4.media-sub-title {font-family: '. $val[1] .', sans-serif!important;}
/* ---- dashboard.css ----- */ #dashboard-widgets h4,#dashboard_right_now td.b,a.rsswidget,#dashboard_plugins h5 {font-family: '. $val[1] .', sans-serif!important;}
			</style>';
}
add_action('admin_enqueue_scripts', 'load_custom_wp_admin_font_script');

add_action('admin_init', 'dashtheme_themeoptions_init' );
add_action('admin_menu', 'dashtheme_themeoptions_add_page');

// Init plugin options to white list our options
function dashtheme_themeoptions_init(){
	register_setting( 'dashtheme_themeoptions_options', 'dashtheme_theme', 'dashtheme_themeoptions_validate' );
}

// Add menu page
function dashtheme_themeoptions_add_page() {
	add_options_page('Coffee Theme Options', 'Coffee Theme Options', 'manage_options', 'dashtheme_themeoptions', 'dashtheme_themeoptions_do_page');
}

// Draw the menu page itself
function dashtheme_themeoptions_do_page() {
	?>
	<div class="wrap">
		<h2>Coffee Admin Theme Options</h2>
		
		<form method="post" action="options.php">
			<?php settings_fields('dashtheme_themeoptions_options'); ?>
			<?php $options = get_option('dashtheme_theme'); ?>
			<table class="form-table">
				<tr valign="top"><th scope="row">Activate the theme</th>
					<td><input name="dashtheme_theme[option1]" type="checkbox" value="1" <?php checked('1', $options['option1']); ?> /></td>
				</tr>

				
				<tr valign="top"><th scope="row">Select theme</th>
						<td><select name="dashtheme_theme[themeselect]" id="<?php echo $options['themeselect']; ?>">
						  <option value="coffee-admin" <?php if ( $options['themeselect'] == 'coffee-admin' ) echo 'selected="selected"'; ?>>Coffee Green</option>
						  <option value="coffee-admin-red" <?php if ( $options['themeselect'] == 'coffee-admin-red' ) echo 'selected="selected"'; ?>>Coffee Red</option>
						  <option value="coffee-admin-white" <?php if ( $options['themeselect'] == 'coffee-admin-white' ) echo 'selected="selected"'; ?>>Coffee White</option>
						  <option value="simple-classic" <?php if ( $options['themeselect'] == 'simple-classic' ) echo 'selected="selected"'; ?>>Simple Piano</option>
						</select>	</td>
				</tr>
				<tr valign="top"><th scope="row">Select font</th>
				
						<td>						
						<select name="dashtheme_theme[fontselect]" id="<?php echo $options['fontselect']; ?>">
						  <option value="Default" <?php if ( $options['fontselect'] == 'Default' ) echo 'selected="selected"'; ?>>Default</option>
						  <option value="Open+Sans,Open Sans" <?php if ( $options['fontselect'] == 'Open+Sans,Open Sans' ) echo 'selected="selected"'; ?>>Open Sans</option>
						  <option value="Questrial,Questrial" <?php if ( $options['fontselect'] == 'Questrial,Questrial' ) echo 'selected="selected"'; ?>>Questrial</option>
						  <option value="Oxygen,Oxygen" <?php if ( $options['fontselect'] == 'Oxygen,Oxygen' ) echo 'selected="selected"'; ?>>Oxygen</option>
						  <option value="Telex,Telex" <?php if ( $options['fontselect'] == 'Telex,Telex' ) echo 'selected="selected"'; ?>>Telex</option>
						  <option value="Gudea,Gudea" <?php if ( $options['fontselect'] == 'Gudea,Gudea' ) echo 'selected="selected"'; ?>>Gudea</option>
						  <option value="Alegreya,Alegreya" <?php if ( $options['fontselect'] == 'Alegreya,Alegreya' ) echo 'selected="selected"'; ?>>Alegreya</option>
						  <option value="Ovo,Ovo" <?php if ( $options['fontselect'] == 'Ovo,Ovo' ) echo 'selected="selected"'; ?>>Ovo</option>
						  <option value="Baumans,Baumans" <?php if ( $options['fontselect'] == 'Baumans,Baumans' ) echo 'selected="selected"'; ?>>Baumans</option>
						  <option value="Vollkorn,Vollkorn" <?php if ( $options['fontselect'] == 'Vollkorn,Vollkorn' ) echo 'selected="selected"'; ?>>Vollkorn</option>
						  <option value="Jockey+One,Jockey One" <?php if ( $options['fontselect'] == 'Jockey+One,Jockey One' ) echo 'selected="selected"'; ?>>Jockey One</option>
						  <option value="Quattrocento+Sans,Quattrocento Sans" <?php if ( $options['fontselect'] == 'Quattrocento+Sans,Quattrocento Sans' ) echo 'selected="selected"'; ?>>Quattrocento Sans</option>
						  <option value="Advent+Pro,Advent Pro" <?php if ( $options['fontselect'] == 'Advent+Pro,Advent Pro' ) echo 'selected="selected"'; ?>>Advent Pro</option>
						  <option value="Cabin+Condensed,Cabin Condensed" <?php if ( $options['fontselect'] == 'Cabin+Condensed,Cabin Condensed' ) echo 'selected="selected"'; ?>>Cabin Condensed</option>
						  <option value="Fanwood+Text,Fanwood Text" <?php if ( $options['fontselect'] == 'Fanwood+Text,Fanwood Text' ) echo 'selected="selected"'; ?>>Fanwood Text</option>
						</select>
						<p>The fonts are provided by the Google Web Fonts Service. If your browser does not support custom WOFF fonts, please use the default setting.</p>
						</td>
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
function dashtheme_themeoptions_validate($input) {
	// Our first value is either 0 or 1
	$input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );
	
	// Say our second option must be safe text with no HTML tags
	$input['sometext'] =  wp_filter_nohtml_kses($input['sometext']);
	
	$input['themeselect'] =  $input['themeselect'];
	
	$input['fontselect'] =  $input['fontselect'];
	
	return $input;
}
?>
