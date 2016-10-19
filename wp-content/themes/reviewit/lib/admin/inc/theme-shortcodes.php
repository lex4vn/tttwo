<?php

// Blockquotes
require_once(gp_admin . 'shortcodes/blockquotes.php');

// Buttons
require_once(gp_admin . 'shortcodes/buttons.php');

// Columns
require_once(gp_admin . 'shortcodes/columns.php');

// Contact Form
require_once(gp_admin . 'shortcodes/contact-form.php');

// Dividers
require_once(gp_admin . 'shortcodes/dividers.php');

// Logged In
require_once(gp_admin . 'shortcodes/logged-in.php');

// Logged Out
require_once(gp_admin . 'shortcodes/logged-out.php');

// Sidebars
require_once(gp_admin . 'shortcodes/sidebars.php');

// Toggle Boxes
require_once(gp_admin . 'shortcodes/toggle-boxes.php');

// Videos
if(get_option($dirname.'_old_video_shortcode') == "0") {
	require_once(gp_admin . 'shortcodes/videos.php');
}

?>