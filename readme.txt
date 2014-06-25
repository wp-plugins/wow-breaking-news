=== WoW Breaking News ===
=== Plugin URI: http://wow-breaking-news.ticstyle.se/ ===
=== Description: World of Warcraft Breaking News Displaying Widget ===
=== Author: StoffeTiX ===
=== Version: 2.1 ===
=== Author URI: http://www.ticstyle.se/ ===
=== License: GPL2 ===

Contributors: StoffeTiX
Donate link: http://donate.ticstyle.com/
Tags: World of Warcraft, WoW
Requires at least: 2.8
Tested up to: 3.9.1
Stable tag: trunk 

== Description ==

This plugin will let you add a widget on your wordpress site displaying the in-game breaking news that you can se while logging in to World of Warcraft.

Supports EU, US, DE, RU, ES, FR, BR, TW, CN and KR Servers

== Installation ==

Fast and easy.

1. Extract the downloaded file and copy the 'wow-breaking-news' directory to your plugin directory, like this: `/wp-content/plugins/wow-breaking-news/`. 
2. All files should remain under the 'wow-breaking-news' directory, ie: `/wp-content/plugins/wow-breaking-news/wow-breaking-news.php`
3. Visit the plugin admin page and activate the plugin.
4. Go to the widget admin page and drag it to the sidbar of your choise.
5. Edit the widget settings to customize it for your blog/website.

Done! 

== Upgrade Notice ==

After an update you need to change your realm location settings again if you are on any other realm location than europe

Done!

== Changing Realm ==

To edit realm location settings edit wow-breaking-news.php and find:

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

Europe is in this case the choosen setting.

To change it to let's say Russian, edit the code to look like this:

    //Realm location settings: (Default is eu)
	//eu(); //Europe (English)
	//us(); //Unitead States & Australia (English)
	//de(); //German
	  ru(); //Russian
	//es(); //Spanish
	//fr(); //French	
	//br(); //Portuguese
	//tw(); //Taiwanese
	//cn(); //Chinese
	//kr(); //Korean

== Frequently Asked Questions ==

Don't have any yet...

== Screenshots ==

1. A typical news message

== Changelog ==

= 2.1 =

= 2.0 =
* Added some server locations.

= r10 =
* New version system and some updates to the contact information of this plugin.

= 1.7.0 =
* Various tweakes due to changes from blizzards feeds.

= 1.6.1 =
* Compability check with WordPress 3.0, working just fine!

= 1.6 =
* Swapping of some coding stuff to be more compatilbe.

= 1.5 =
* Added the possibility to change server location i.e. EU server, US Server, DE Server, RU Server, ES Server and FR Server.

= 1.4 =
* Resolved a problem with saving and displaying a ne widget title.

= 1.3 =
* Added formating to the output message
* Increased max output lenght to 2000 characters

= 1.2 =
* Tested for Wordpress 2.9.1

= 1.1 =
* Added widget namechange option
* Inreased the amount of caracters allowed to show in the widget

= 1.0 =
* First release