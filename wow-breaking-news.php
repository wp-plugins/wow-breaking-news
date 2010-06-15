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
Plugin URI: http://www.fnaticstudios.se/wow-breaking-news
Description: World of Warcraft Breaking News Displaying Widget
Author: StoffeTiX
Version: 1.6
Author URI: http://www.tfnaticstudios.se/
*/

function eu()
{
$curl = curl_init();
curl_setopt ($curl, CURLOPT_URL, "http://status.wow-europe.com/en/alert");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$dataeu = curl_exec ($curl);
curl_close ($curl);

//Show if no news
if (strlen($dataeu)<=1) { 
echo "* There are no serveralerts at this time.".$thelink;
} else {
echo nl2br($dataeu);
}
}

function us()
{
$fpus = fopen("http://launcher.worldofwarcraft.com/alert", "r");
$dataus = fread($fpus, 2000);
fclose($fpus);

//Show if no news
if (strlen($dataus)<=1) { 
echo "* There are no serveralerts at this time.".$thelink;
} else {
echo nl2br($dataus);
}
}

function de()
{
$fpde = fopen("http://status.wow-europe.com/de/alert", "r");
$datade = fread($fpde, 2000);
fclose($fpde);

//Show if no news
if (strlen($datade)<=1) { 
echo "* Es gibt keine nachrichten in dieser zeit.".$thelink;
} else {
echo nl2br($datade);
}
}

function ru()
{
$fpru = fopen("http://status.wow-europe.com/ru/alert", "r");
$dataru = fread($fpru, 2000);
fclose($fpru);

//Show if no news
if (strlen($dataru)<=1) { 
echo "* Нет никаких новостей в это время.".$thelink;
} else {
echo nl2br($dataru);
}
}

function es()
{
$fpes = fopen("http://status.wow-europe.com/es/alert", "r");
$dataes = fread($fpes, 2000);
fclose($fpes);

//Show if no news
if (strlen($dataes)<=1) { 
echo "* No hay ningunas noticias en este tiempo.".$thelink;
} else {
echo nl2br($dataes);
}
}

function fr()
{
$fpfr = fopen("http://status.wow-europe.com/fr/alert", "r");
$datafr = fread($fpfr, 2000);
fclose($fpfr);

//Show if no news
if (strlen($datafr)<=1) { 
echo "* Il n'y a aucune nouvelle à ce temps.".$thelink;
} else {
echo nl2br($datafr);
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

    //Realm location settings: (Default is eu)
	  eu(); //Europe (English)
	//us(); //Unitead States (English)
	//de(); //German
	//ru(); //Russian
	//es(); //Spanish
	//fr(); //French	
	
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