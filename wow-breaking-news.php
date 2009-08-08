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
Plugin URI: http://www.journeyofashaman.com/wp-plugins/
Description: World of Warcraft Breaking News Displaying Widget
Author: Stoffe Nilsson
Version: 1.0
Author URI: http://www.journeyofashaman.com/
*/

function wowbreakingnews() 
{
$fp = fopen("http://status.wow-europe.com/en/alert", "r");
$data = fread($fp, 128);
fclose($fp);

if (strlen($data)<=1) { 
echo "* There are no alerts at this time.".$thelink;
} else {
echo $data;
}

}
function widget_wowbreakingnews() {
?>
  <h2 class="widgettitle">WoW Breaking News</h2>
  <?php wowbreakingnews(); ?>
<?php
}

function wowbreakingnews_init()
{
  register_sidebar_widget(__('WoW Breaking News'), 'widget_wowbreakingnews');     
}
add_action("plugins_loaded", "wowbreakingnews_init");

?>
