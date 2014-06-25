<?php
/*
Plugin Name: WoW Breaking News
Plugin URI: http://wow-breaking-news.ticstyle.se/
Description: World of Warcraft Breaking News Displaying Widget
Version: 2.1
Author: StoffeTiX
Author URI: http://www.ticstyle.se/
License: GPL2
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
echo "* There are no server alerts at this time.".$thelink;
} else {
echo ($dataeu);
}
}

function kr()
{
$curl = curl_init();
curl_setopt ($curl, CURLOPT_URL, "http://launcher.worldofwarcraft.co.kr/alert");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_BINARYTRANSFER, 1);

$datakr = curl_exec ($curl);
curl_close ($curl);

//Show if no news
if (strlen($datakr)<=1) { 
echo "* 현재도 서버 알림이 없습니다.".$thelink;
} else {
echo ($datakr);
}
}

function cn()
{
$curl = curl_init();
curl_setopt ($curl, CURLOPT_URL, "http://launcher.battlenet.com.cn/alert");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_BINARYTRANSFER, 1);

$datacn = curl_exec ($curl);
curl_close ($curl);

//Show if no news
if (strlen($datacn)<=1) { 
echo "* 在这个时候有没有服务器警报.".$thelink;
} else {
echo ($datacn);
}
}

function tw()
{
$curl = curl_init();
curl_setopt ($curl, CURLOPT_URL, "http://launcher.wowtaiwan.com.tw/alert");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_BINARYTRANSFER, 1);

$datatw = curl_exec ($curl);
curl_close ($curl);

//Show if no news
if (strlen($datatw)<=1) { 
echo "* 在這個時候有沒有服務器警報.".$thelink;
} else {
echo ($datatw);
}
}

function br()
{
$curl = curl_init();
curl_setopt ($curl, CURLOPT_URL, "http://launcher.worldofwarcraft.com/pt/alert");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_BINARYTRANSFER, 1);

$databr = curl_exec ($curl);
curl_close ($curl);

//Show if no news
if (strlen($databr)<=1) { 
echo "* Não há alertas do servidor neste momento.".$thelink;
} else {
echo ($databr);
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
echo "* There are no server alerts at this time.".$thelink;
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
	//us(); //Unitead States & Australia (English)
	//de(); //German
	//ru(); //Russian
	//es(); //Spanish
	//fr(); //French	
	//br(); //Portuguese
	//tw(); //Taiwanese
	//cn(); //Chinese
	//kr(); //Korean
	
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