<?php
/*
Plugin Name: WoW Breaking News
Plugin URI: http://www.fnaticstudios.se/wow-breaking-news
Description: World of Warcraft Breaking News Displaying Widget
Version: 1.7
Author: StoffeTiX
Author URI: http://www.fnaticstudios.se/
*/

function eu()
{
$curl = curl_init();
curl_setopt ($curl, CURLOPT_URL, "http://status.wow-europe.com/en/alert");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_BINARYTRANSFER, 1);

$dataeu = curl_exec ($curl);
curl_close ($curl);

//Show if no news
if (strlen($dataeu)<=1) { 
echo "* There are no serveralerts at this time.".$thelink;
} else {
echo ($dataeu);
}
}

function us()
{
$curl = curl_init();
curl_setopt ($curl, CURLOPT_URL, "http://launcher.worldofwarcraft.com/alert");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_BINARYTRANSFER, 1);

$dataus = curl_exec ($curl);
curl_close ($curl);

//Show if no news
if (strlen($dataus)<=1) { 
echo "* There are no serveralerts at this time.".$thelink;
} else {
echo ($dataus);
}
}

function de()
{
$curl = curl_init();
curl_setopt ($curl, CURLOPT_URL, "http://status.wow-europe.com/de/alert");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_BINARYTRANSFER, 1);

$datade = curl_exec ($curl);
curl_close ($curl);

//Show if no news
if (strlen($datade)<=1) { 
echo "* Es gibt keine nachrichten in dieser zeit.".$thelink;
} else {
echo ($datade);
}
}

function ru()
{
$curl = curl_init();
curl_setopt ($curl, CURLOPT_URL, "http://status.wow-europe.com/ru/alert");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_BINARYTRANSFER, 1);

$dataru = curl_exec ($curl);
curl_close ($curl);

//Show if no news
if (strlen($dataru)<=1) { 
echo "* Нет никаких новостей в это время.".$thelink;
} else {
echo ($dataru);
}
}

function es()
{
$curl = curl_init();
curl_setopt ($curl, CURLOPT_URL, "http://status.wow-europe.com/es/alert");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_BINARYTRANSFER, 1);

$dataes = curl_exec ($curl);
curl_close ($curl);

//Show if no news
if (strlen($dataes)<=1) { 
echo "* No hay ningunas noticias en este tiempo.".$thelink;
} else {
echo ($dataes);
}
}

function fr()
{
$curl = curl_init();
curl_setopt ($curl, CURLOPT_URL, "http://status.wow-europe.com/fr/alert");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_BINARYTRANSFER, 1);

$datafr = curl_exec ($curl);
curl_close ($curl);

//Show if no news
if (strlen($datafr)<=1) { 
echo "* Il n'y a aucune nouvelle à ce temps.".$thelink;
} else {
echo ($datafr);
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