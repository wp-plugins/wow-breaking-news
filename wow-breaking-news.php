<?php
//    This program is free software: you can redistribute it and/or modify
//    it under the terms of the GNU General Public License as published by
//    the Free Software Foundation, either version 3 of the License, or
//    (at your option) any later version.
//
//    This program is distributed in the hope that it will be useful,
//    but WITHOUT ANY WARRANTY; without even the implied warranty of
//    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//    GNU General Public License for more details.
//
//    You should have received a copy of the GNU General Public License
//    along with this program.  If not, see <http://www.gnu.org/licenses/>.

/*
Plugin Name: WoW Breaking News
Plugin URI: http://www.journeyofashaman.com/
Description: World of Warcraft Breaking News Displaying Widget
Author: Stoffe Nilsson
Version: 1.1
Author URI: http://www.journeyofashaman.com/
*/

function samplewowbreakingnews()
{
$fp = fopen("http://status.wow-europe.com/en/alert", "r");
$data = fread($fp, 1000);
fclose($fp);

if (strlen($data)<=1) { 
echo "* There are no alerts at this time.".$thelink;
} else {
echo $data;
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

function wowbreakingnews_control()
{
  $options = get_option("widget_wowbreakingnews");
  if (!is_array( $options ))
        {
                $options = array(
      'title' => 'WoW Breaking News'
      );
  }    

  if ($_POST['wowbreakingnews-Submit'])
  {
    $options['title'] = htmlspecialchars($_POST['wowbreakingnews-WidgetTitle']);
    update_option("widget_wowbreakingnews", $options);
  }

?>
  <p>
    <label for="wowbreakingnews-WidgetTitle">Widget Title: </label>
    <input type="text" id="wowbreakingnews-WidgetTitle" name="wowbreakingnews-WidgetTitle" value="<?php echo $options['title'];?>" />
    <input type="hidden" id="wowbreakingnews-Submit" name="wowbreakingnews-Submit" value="1" />
  </p>
<?php
}

function wowbreakingnews_init()
{
  register_sidebar_widget(__('WoW Breaking News'), 'widget_wowbreakingnews');
  register_widget_control(   'WoW Breaking News', 'wowbreakingnews_control', 300, 200 );    
}
add_action("plugins_loaded", "wowbreakingnews_init");
?>