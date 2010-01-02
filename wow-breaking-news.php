<?php
/*    This program is free software: you can redistribute it and/or modify
      it under the terms of the GNU General Public License as published by
      the Free Software Foundation, either version 3 of the License, or
      (at your option) any later version.
  
      This program is distributed in the hope that it will be useful,
      but WITHOUT ANY WARRANTY; without even the implied warranty of
      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
      GNU General Public License for more details.
  
      You should have received a copy of the GNU General Public License
      along with this program.  If not, see <http://www.gnu.org/licenses/>.


Plugin Name: WoW Breaking News
Plugin URI: http://www.tixdesign.com/wow-breaking-news
Description: World of Warcraft Breaking News Displaying Widget
Author: StoffeTiX
Version: 1.4
Author URI: http://www.tixdesign.com/
*/

function samplewowbreakingnews()
{
$fp = fopen("http://status.wow-europe.com/en/alert", "r");
$data = fread($fp, 2000);
fclose($fp);

//Show if no news
if (strlen($data)<=1) { 
echo "* There are no serveralerts at this time.".$thelink;
} else {
echo nl2br($data);
}
}

function widget_wowbreakingnews($args) {
  extract($args);

  $options = get_option("widget_wowbreakingnews");
  if (!is_array( $options ))
        {
                $options = array(
      'title' => 'WoW Breaking News'
      );
  }      

  echo $before_widget;
    echo $before_title;
      echo $options['title'];
    echo $after_title;

    //Widget Content
    samplewowbreakingnews();
  echo $after_widget;
}

	function widget_wowbreakingnews_control() {
		$options = $newoptions = get_option('widget_wowbreakingnews');
		if ( $_POST["wowbreakingnews-submit"] ) {
			$newoptions['title'] = strip_tags(stripslashes($_POST["wowbreakingnews-title"]));
			if ( empty($newoptions['title']) ) $newoptions['title'] = 'WoW Breaking News';
		}
		if ( $options != $newoptions ) {
			$options = $newoptions;
			update_option('widget_wowbreakingnews', $options);
		}
		$title = htmlspecialchars($options['title'], ENT_QUOTES);
	?>
				<p><label for="wowbreakingnews-title"><?php _e('Title:'); ?> <input style="width: 250px;" id="wowbreakingnews-title" name="wowbreakingnews-title" type="text" value="<?php echo $title; ?>" /></label></p>
				<input type="hidden" id="wowbreakingnews-submit" name="wowbreakingnews-submit" value="1" />
	<?php
	}

function wowbreakingnews_init()
{
  register_sidebar_widget(__('WoW Breaking News'), 'widget_wowbreakingnews');
  register_widget_control(   'WoW Breaking News', 'widget_wowbreakingnews_control', 300, 200 );    
}
add_action("plugins_loaded", "wowbreakingnews_init");
?>