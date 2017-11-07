<?php
// Share Widget
//
// Copyright (c) 2017 Share Widget.
// http://www.share-widget.com
//
//
// Released under the GPL license
// http://www.opensource.org/licenses/gpl-license.php
//
// This is an add-on for WordPress
// http://wordpress.org/
//
// **********************************************************************
// This program is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
// *****************************************************************


/**
* Plugin Name: Share-Widget
* Plugin URI: http://www.share-widget.com
* Description: Add the share-widget button on the footer of your post. Users can share your content through the most popular social networking and bookmarking site.
* Version: 2.0.0
*
* Author: Moqu Adv
* Author URI: http://www.share-widget.com
*/

if (!defined('SHAREWIDGET_INIT')) define('SHAREWIDGET_INIT', 1);
else return;

load_plugin_textdomain('share-widget');

define( 'SHAREWIDGET_VERSION', '2.0' );
define( 'SHAREWIDGET_PLUGIN', __FILE__ );
define( 'SHAREWIDGET_PLUGIN_BASENAME', plugin_basename( SHAREWIDGET_PLUGIN ) );
define( 'SHAREWIDGET_PLUGIN_NAME', trim( dirname( SHAREWIDGET_PLUGIN_BASENAME ), '/' ) );
define( 'SHAREWIDGET_PLUGIN_DIR', untrailingslashit( dirname( SHAREWIDGET_PLUGIN ) ) );
define( 'SHAREWIDGET_PLUGIN_URL', untrailingslashit( plugins_url( '', SHAREWIDGET_PLUGIN ) ) );
define( 'SHAREWIDGET_PLUGIN_URL_IMG', SHAREWIDGET_PLUGIN_URL .'/img' );
define( 'SHAREWIDGET_PLUGIN_URL_JS', SHAREWIDGET_PLUGIN_URL .'/js' );
define( 'SHAREWIDGET_PLUGIN_URL_CSS', SHAREWIDGET_PLUGIN_URL .'/css' );

$sharewidget_mode = array();

$sharewidget_mode['normal-ico'] = array(
	'style' => 'text-decoration:none; color:#000000; font-size:11px; line-height:20px;',
	'img'=>'<img src="'.SHAREWIDGET_PLUGIN_URL_IMG.'/share-icon-white.png" width="20" height="20" alt="Share" style="border:0;vertical-align:middle;margin:0 5px 0 0;"/>', 
	'txtbtn' => ' SHARE',
	'opt' => '',
	'txt' => '');

$sharewidget_mode['normal-ico-notxt'] = array(
	'style' => 'text-decoration:none; color:#000000; font-size:11px; line-height:20px;',
	'img'=>'<img src="'.SHAREWIDGET_PLUGIN_URL_IMG.'/share-icon-white.png" width="20" height="20" alt="Share" style="border:0;vertical-align:middle;margin:0 5px 0 0;"/>',
	'txtbtn' => '',
	'opt' => '',
	'txt' => '');

$sharewidget_mode['normal-btn'] = array(
	'style' => 'text-decoration:none; color:#000000; font-size:11px; line-height:20px;',
	'img'=>'<img src="'.SHAREWIDGET_PLUGIN_URL_IMG.'/share-button-white-small.png" height="20" alt="Share" style="border:0"/>',
	'txtbtn' => '',
	'opt' => '',
	'txt' => '');

$sharewidget_mode['tablet-ico'] = array(
	'style' => 'text-decoration:none; color:#000000; font-size:21px; line-height:40px;',
	'img'=>'<img src="'.SHAREWIDGET_PLUGIN_URL_IMG.'/share-icon-white.png" width="40" height="40" alt="Share" style="border:0;vertical-align:middle;margin:0 5px 0 0;" />',
	'txtbtn' => ' SHARE',
	'opt' => '',
	'txt' => '');

$sharewidget_mode['tablet-ico-notxt'] = array(
	'style' => 'text-decoration:none; color:#000000; font-size:21px; line-height:40px;',
	'img'=>'<img src="'.SHAREWIDGET_PLUGIN_URL_IMG.'/share-icon-white.png" width="40" height="40" alt="Share" style="border:0;vertical-align:middle;margin:0 5px 0 0;" />',
	'txtbtn' => '',
	'opt' => '',
	'txt' => '');

$sharewidget_mode['tablet-btn'] = array(
	'style' => 'text-decoration:none; color:#000000; font-size:21px; line-height:40px;',
	'img'=>'<img src="'.SHAREWIDGET_PLUGIN_URL_IMG.'/share-button-white.png" width="122" height="40" alt="Share" style="border:0"/>',
	'txtbtn' => '',
	'opt' => '',
	'txt' => '');


$sharewidget_mode['normal-ico-2'] = array(
	'style' => 'text-decoration:none; color:#000000; font-size:11px; line-height:20px;',
	'img'=>'<img src="'.SHAREWIDGET_PLUGIN_URL_IMG.'/share-icon-black.png" width="20" height="20" alt="Share" style="border:0;vertical-align:middle;margin:0 5px 0 0;"/>', 
	'txtbtn' => ' SHARE',
	'opt' => '',
	'txt' => '');

$sharewidget_mode['normal-ico-notxt-2'] = array(
	'style' => 'text-decoration:none; color:#000000; font-size:11px; line-height:20px;',
	'img'=>'<img src="'.SHAREWIDGET_PLUGIN_URL_IMG.'/share-icon-black.png" width="20" height="20" alt="Share" style="border:0;vertical-align:middle;margin:0 5px 0 0;"/>',
	'txtbtn' => '',
	'opt' => '',
	'txt' => '');

$sharewidget_mode['normal-btn-2'] = array(
	'style' => 'text-decoration:none; color:#000000; font-size:11px; line-height:20px;',
	'img'=>'<img src="'.SHAREWIDGET_PLUGIN_URL_IMG.'/share-button-black-small.png" height="20" alt="Share" style="border:0"/>',
	'txtbtn' => '',
	'opt' => '',
	'txt' => '');

$sharewidget_mode['tablet-ico-2'] = array(
	'style' => 'text-decoration:none; color:#000000; font-size:21px; line-height:40px;',
	'img'=>'<img src="'.SHAREWIDGET_PLUGIN_URL_IMG.'/share-icon-black.png" width="40" height="40" alt="Share" style="border:0;vertical-align:middle;margin:0 5px 0 0;" />',
	'txtbtn' => ' SHARE',
	'opt' => '',
	'txt' => '');

$sharewidget_mode['tablet-ico-notxt-2'] = array(
	'style' => 'text-decoration:none; color:#000000; font-size:21px; line-height:40px;',
	'img'=>'<img src="'.SHAREWIDGET_PLUGIN_URL_IMG.'/share-icon-black.png" width="40" height="40" alt="Share" style="border:0;vertical-align:middle;margin:0 5px 0 0;" />',
	'txtbtn' => '',
	'opt' => '',
	'txt' => '');

$sharewidget_mode['tablet-btn-2'] = array(
	'style' => 'text-decoration:none; color:#000000; font-size:21px; line-height:40px;',
	'img'=>'<img src="'.SHAREWIDGET_PLUGIN_URL_IMG.'/share-button-black.png" width="122" height="40" alt="Share" style="border:0"/>',
	'txtbtn' => '',
	'opt' => '',
	'txt' => '');


if ( ! defined( 'SHAREWIDGET_LOAD_JS' ) ) {
	define( 'SHAREWIDGET_LOAD_JS', true );
}

if ( ! defined( 'SHAREWIDGET_LOAD_CSS' ) ) {
	define( 'SHAREWIDGET_LOAD_CSS', true );
}

function sharewidget_load_js() {
	return apply_filters( 'sharewidget_load_js', SHAREWIDGET_LOAD_JS );
}

function sharewidget_load_css() {
	return apply_filters( 'sharewidget_load_css', SHAREWIDGET_LOAD_CSS );
}

add_action( 'wp_enqueue_scripts', 'sharewidget_do_enqueue_scripts' );

function sharewidget_do_enqueue_scripts() {
	if ( sharewidget_load_js() ) {
		sharewidget_enqueue_scripts();
	}

	if ( sharewidget_load_css() ) {
		sharewidget_enqueue_styles();
	}
}

function sharewidget_enqueue_styles() {
	wp_enqueue_style( 'sharewidget-style', SHAREWIDGET_PLUGIN_URL_CSS .'/style.css' , array(), SHAREWIDGET_VERSION, 'all' );
	do_action( 'sharewidget_enqueue_styles' );
}

function sharewidget_enqueue_scripts() {
	wp_enqueue_script( 'sharewidget-default-js', SHAREWIDGET_PLUGIN_URL_JS . '/default_scripts.js', array(), SHAREWIDGET_VERSION, true );	
	do_action( 'sharewidget_enqueue_scripts' );
}


function sharewidget_footer_append() {
	$link = SHAREWIDGET_PLUGIN_URL . '/shareit.php';

	$content = <<<EOF
<div style="width: 100%; top: 0px; left: 0px; display: none;" id="mys_ol"></div>
<div id="mys_box">
	<div id="mys_bd">
		<div id="myshare_box">
			<div id="myshare_window">
				<div id="mys_tab_1" class="mys_tab">
					<div class="mys_top">
						<div class="mys_logo"><a href="http://www.share-widget.com" target="_blank"><span></span>SHARE WIDGET</a></div>
						<input type="button" name="close" class="mys_close" onclick="_mysin.hm()" value="">
					</div>
					<div id="s-1" class="mys_box">
						<div class="mys_best">
							<ul>
								<li><a href="$link?p=facebook" class="mys_partners fb" target="_blank"><span></span></a></li>
								<li><a href="$link?p=twitter" class="mys_partners tw" target="_blank"><span></span></a></li>
								<li><a href="$link?p=googleplus" class="mys_partners gp" target="_blank"><span></span></a></li>
								<li><a href="$link?p=pinterest" class="mys_partners pt" target="_blank" onclick="javascript:_mysin.pinMarklet();return false;"><span></span></a></li>
								<li><a href="$link?p=linkedin" class="mys_partners in" target="_blank"><span></span></a></li>
								<li><a href="$link?p=tumblr" class="mys_partners tb" target="_blank"><span></span></a></li>
							</ul>
						</div>
					</div>
					<p><a href="http://www.share-widget.com" target="_blank">http://www.share-widget.com</a></p>
				</div>
			</div>	
		</div>
	</div>
</div>
EOF;

	echo $content;
}

add_action('wp_footer', 'sharewidget_footer_append');

/**
* Appends Share-Widget button to post content.
*/
function sharewidget_social_widget($content) {
	global $sharewidget_mode;

	$type = get_option('sharewidget_type');
	if (empty($sharewidget_mode[$type]))
		$type = 'normal-btn';
	$sharewidget_img = $sharewidget_mode[$type]['img'];
	$sharewidget_txtbtn = $sharewidget_mode[$type]['txtbtn'];
	$sharewidget_opt = $sharewidget_mode[$type]['opt']; 
   
	#text next to button
	$txtbtn = get_option('sharewidget_txtbtn');
	$final_txtbtn = $sharewidget_txtbtn;
	if ( !empty($sharewidget_txtbtn) && !empty($txtbtn) ) {
		$final_txtbtn = $txtbtn;
	}
	$sharewidget_img .= $final_txtbtn;
	
    if (is_feed()) return $content;
    else if (is_search()) return $content;
    else if (is_page()) return $content;
    else if (is_archive()) return $content;
    else if (is_category()) return $content;

    $link  = get_permalink();
    $title = the_title('', '', false);

	$content .= "\n<!-- Share-Widget Button BEGIN -->\n";
    $content .= <<<EOF
<a href="javascript:void(0);" myshare_id="mys_shareit" myshare_url="$link" myshare_title="$title" rel="nofollow" onclick=" return false;" style="text-decoration:none; color:#000000; font-size:11px; line-height:20px;">
$sharewidget_img</a>
<script type="text/javascript">
<!--
var _myssmw=true;
$sharewidget_opt
//-->
</script>
EOF;
    $content .= "\n<!-- Share-Widget Button END -->";

    return $content;
}

function sharewidget_admin_menu() {
   add_options_page(__('Share-Widget Options', 'share-widget'), __('Share-Widget', 'share-widget'), 8, __FILE__, 'sharewidget_plugin_options');
}

/**
*	admin plugin options
*/
function sharewidget_plugin_options() {
	global $sharewidget_mode;
	add_option('sharewidget_type');	
	$type = get_option('sharewidget_type');
	$txtbtn = get_option('sharewidget_txtbtn');
?>
 <div class="wrap">
	<h2><?php _e('Share-Widget Options', 'share-widget');?></h2>
	<p><?php _e('Select button and choose size and version you like:', 'share-widget');?></p>
    <?php 
	  if( isset($_POST['op']) && $_POST['op'] =='sw_update_opt') {
	    // Save the posted values into the database
	    update_option('sharewidget_type', $_POST[ 'sharewidget_type' ] );    
	    update_option('sharewidget_txtbtn', $_POST[ 'sharewidget_txtbtn' ] );
	    
		$type = get_option('sharewidget_type');
		echo '<div style="padding:10px;border:1px solid #aaa;background-color:#9fde33;text-align:center;display:none;" id="st_updated">';
		_e('Option succesfully updated', 'share-widget');
		echo '</div>';
	}
    ?>
	<form id="sw_share" name="sw_share" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
	<input name="op" type="hidden" value="sw_update_opt" />	
	<?php
		$counter = 0;
		foreach ($sharewidget_mode as $k => $v){
			$counter ++;
			echo '<div style="margin:4px 0;vertical-align:middle;">'.$counter.' - <input type="radio" name="sharewidget_type" value="'.$k.'" id="sw-'.$k.'" '.($type == $k ? " checked":"").'> ';
			echo '<label for="sw-'.$k.'"><a style="'.$v['style'].'">'.$v['img'].''.$v['txtbtn'].'</a></label> '.__($v['txt'], 'share-widget').' </div>';
		}
	?>
	<p style="margin:4px 0;vertical-align:middle;">Change the "SHARE" text next to the icon with: <input type="text" name="sharewidget_txtbtn" value="<?php echo $txtbtn?>" /><br />
	* - Only for type 1, 4, 7 and 10.
	</p>
		
	<p class="submit">
    	<input type="submit" name="Submit" value="<?php _e('Save Changes', 'share-widget') ?>" />
    </p>
   </form>
 </div>
<?php
}
add_filter('the_content', 'sharewidget_social_widget');
add_filter('admin_menu', 'sharewidget_admin_menu');
?>
