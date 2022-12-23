<?php
//kPlaylist 1.2 Build 236 (10-07-02_06.54) build by rolf as rolf
/*****************************************************************************
kPlaylist v1.2 is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

kPlaylist is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with kPlaylist; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
##############################################################################


kPlaylist v1.2 makes your MP3 archive available via the WEB. Play music, 
	search, create and edit playlists from everywhere by just having a webbrowser 
	and a MP3 player. Features include logon, accounts, account classes, user editor, 
	automatic installation (MySQL) and automatic search engine update. 

Are you a PHP programmer? 
	Would you like to join us in the creation of this product? Before you start 
	changing the code please send a mail to us and tell us that you want to help us. 
	We'll send you some information on how you can  send us upgrade information and 
	how to get the latest up2date source. We got a development source available.

Translate or errors in the grammar?
	Please submit new languages, or grammar fixes directly to us for immediate
	new builds. Se http://www.kplaylist.com/ for more information.

	Our website helps you to create new languages. Please look there if your
	language is missing here.

Note!
	You can get updates and installation instructions here: http://www.kplaylist.com
	You can reach us at this e-mail address: kplaylist@kplaylist.com
  
	We develop other products than PHP applications, for commercial and non
	commercial use. Contact our company here: http://www.keyteq.no.

Script information:
	Also note, this is a script under construction and weird things may happen,
	though it hasn't on the machines we tested it on. The code
	does not write to any file or device other than the MySQL tables it uses. 
	(However, the id3 class does infact contain direct file write code, but 
	kPlaylist does not currently use it.)

	Due to the legal responsibility however, we have to note: There
	are NO GUARANTEES WHATSOEVER other than this application will
	occupy certain amount of space on the device you put it.

*****************************************************************************/

// Try to set the execution time to 900 sec = 15 min. You need this to play
// 15 minutes long mp3 and for the update of mp3s to work correct.
@ini_set('max_execution_time',900);
@ini_set('register_globals', "Off");

// turn of cache if it's enabled by default.
if (function_exists("session_cache_limiter")) session_cache_limiter('nocache');


######################################################
## START OF EASY CONFIGURATION
######################################################


#  STEP 1
#  FIRST THING FIRST: START YOUR WEBBROWSER,
#  AND POINT IT TO THIS SCRIPT.
#


# Note: Default login user is: admin, password: admin

# STEP 2
# Have fun! Remember to click settings and change
# base_dir to somewhere you have audio files :)

######################################################
## END OF EASY CONFIGURATION
######################################################

$settings = array(	's_base_dir', 's_streamlocation', 's_default_language',
			's_windows', 's_require_https', 's_allowseek', 
			's_allowdownload', 's_timeout', 's_report_attempts', 's_install'
);

function slashtranslate($in,$key='\\', $rep='/')
{
        $out = stripslashes($in);        
		if (!empty($out)) { for ($i=0;$i<strlen($out);$i++) if ($out[$i] == $key ) $out[$i] = $rep; } return $out;
}


// use inbuilt images, or you external? Please fill
// out the path to the images. The images must be
// be called the following:

$externimages = array(				"dir.gif", "login.jpg", 
						"album.gif", "link.gif",
						"cdback.gif", "root.gif", 
						"saveicon.gif", "spacer.gif", 
						"w3c_xhtml_valid.gif",
						"kplaylist.gif", "php.gif"
					);

$externimages_mime = array(
						"image/gif", "image/jpg",
						"image/gif", "image/gif",
						"image/gif", "image/gif",
						"image/gif", "image/gif",
						"image/gif", "image/gif",
						"image/gif"
						);

// the path to the external images. 
$externimagespath = "";
// set this to 1 to use external images. Remember to set the path. 
$imguseextern = 0;

// audio file types to look for..

// Example: $streamtypes (file .name, mime, get header, internal (stream)). Use 0 for direct plays (video & others).
// Warning! DO NOT CHANGE THE 3 FIRST TYPES!

$streamtypes[0] = array("mp3", "audio/mpeg", "&file=.mp3", "1");
$streamtypes[1] = array("wav", "audio/wave", "&file=.wav", "1");
$streamtypes[2] = array("ogg", "application/x-ogg", "&file=.ogg", "1");

$streamtypes[3] = array("mpeg", "video/mpeg", "&file=.mpeg", "0");
$streamtypes[4] = array("avi", "video/avi", "&file=.avi", "0");
$streamtypes[5] = array("mp2", "audio/mpeg", "&file=.mp2", "1");
$streamtypes[6] = array("mpg", "video/mpeg", "&file=.mpeg", "0");


// fix for older versions of PHP.  
if (!isset($_GET) && !isset($_POST))
{
	$_GET = @$HTTP_GET_VARS;
	$_POST = @$HTTP_POST_VARS;
	$_COOKIE = @$HTTP_COOKIE_VARS;
	$_SESSION = @$HTTP_SESSION_VARS;
	$_ENV = @$HTTP_ENV_VARS;
	$_SERVER = @$HTTP_SERVER_VARS;
}


###########################################
# Nothing below this line should be
# necessary to configure.
#
# Open up your webbrowser and continue 
# installation/configuration there!
###########################################
####  - END OF SIMPLE CONFIGURATION -  ####
###########################################


//////////////////////////////////////////////////////////////////////
// Database config - created throu web - READ THE IMPORTANT NOTICE!!
$db = array('host','name','user','pass');
$db['host']	 = "localhost"; # MySql server
$db['name']	 = "kplaylist"; # Database name
$db['user']	 = "kplaylist"; # MySql user
$db['pass']	 = "kplaylist"; # MySql password


if (@isset($getconfig)) return($db);

//////////////////////////////////////////////////////////////////////
// IMPORTANT!! READ THIS!!!
// Before changing the database information; you should be aware that the 
// installer-script will start when you point your browser to 
// this script and create (AND EVEN DROP DATABASE if the checkbox 
// 'drop database' is checked on the installer page)
// You should NOT need to change the default information above.
// The automatic installer will create both database and the mysql user.
//////////////////////////////////////////////////////////////////////

function db_execcheck($query)
{
	global $db, $u_playlist, $u_playlistid, $link;
	$link = @mysql_connect($db['host'], $db['user'], $db['pass']);
	if (!$link) return 0;	
	if (mysql_select_db ($db['name'])) return mysql_query($query); else return 0;
}

function settings_retrieve()
{
	global $settings;

	$query = "select * from tbl_settings";
	$result = db_execcheck($query);
	if ($result)
	{
		$data = mysql_fetch_array($result);	
		if ($data)
		{
			$settings['s_base_dir'] = @$data['s_base_dir'];
			$settings['s_streamlocation'] = @$data['s_streamlocation'];
			$settings['s_default_language'] = @$data['s_default_language'];
			$settings['s_windows'] = @$data['s_windows'];
			$settings['s_require_https'] = @$data['s_require_https'];
			$settings['s_allowseek'] = @$data['s_allowseek'];
			$settings['s_allowdownload'] = @$data['s_allowdownload'];
			$settings['s_timeout'] = @$data['s_timeout'];
			$settings['s_report_attempts'] = @$data['s_report_attempts'];	
			$settings['s_install'] = 1;
			$settings['s_install'] = @$data['s_install'];			
			return 1;
		} 
		return 0;	
	}
}

//fetch settings from db.
if (!settings_retrieve())
{
	// or set them manually.
	$settings['s_base_dir'] = "/path/to/my/music/archive";
	$settings['s_allowdownload'] = 1;
	$settings['s_allowseek'] = 1;
	$settings['s_require_https'] = 0;
	$settings['s_timeout'] = 43200;
	$settings['s_streamlocation'] = "";
	$settings['s_report_attempts'] = 1;
	$settings['s_default_language'] = 0;
	$settings['s_install'] = 1;
	if (preg_match("/win/i", $_SERVER["SERVER_SOFTWARE"])) $settings['s_windows'] = 1; else $settings['s_windows'] = 0;

	$settings['s_base_dir'] = slashtranslate($settings['s_base_dir']);
	if ($settings['s_base_dir'][strlen($settings['s_base_dir'])-1] != '/') $settings['s_base_dir'] .= '/';
	
}

// if you want to override the settings in MySQL, here is where you do it.

$base_dir = $settings['s_base_dir'];
$stream_location = $settings['s_streamlocation'];
$deflanguage = $settings['s_default_language'];
$win32 = $settings['s_windows'];

// 0 = don't care, 1 = only HTTPS allowed.
$require_https = $settings['s_require_https'];
$allow_seek = $settings['s_allowseek'];
$allow_download = $settings['s_allowdownload'];
$kTimeout = $settings['s_timeout'];
$report_attempts= $settings['s_report_attempts'];

// set this to 0 to be sure that installer will not show up, or 1 to reinstall.
#ex: $enable_install = 0;
$enable_install = $settings['s_install'];

$demo_mode = 0; 
// If you set $demo_mode to 1 then sessionkeys are turned off. Please
// be aware that this mode has not been tested properly, and
// a whole lot of functionality regarding security is closed when demo_mode is enabled.

$u_searchstr    = "";

$userauth = 0;
$cookie_name = "kplaylist";

$u_playlist=array();
$u_playlistid=array();
// list of playlists..

// should we show the 'keyteq gives you' part? 1= show, 0=dont.
$show_keyteq=1;

// should we show the 'upgrade check?' part? 1=show, 0=dont.
$show_upgrade=1;

$app_name = "<b>k</b>P<I>laylist</I>";
$app_ver  = "1.2"; 
$app_build = "236";
// data filled out at each request..

$u_cookieid = -1;
$u_id = -1;

$dir_list=array();
$file_list=array();
$playlist_list=array();

$pdir64="";

$phpenv = array('streamlocation', 'remote', 'useragent');

$streamport = "";
if (!(($_SERVER['SERVER_PORT'] == 80) || ($_SERVER['SERVER_PORT'] == 443)))	$streamport = ":".$_SERVER['SERVER_PORT'];

if (!empty($stream_location)) $phpenv['streamlocation'] = $stream_location; else 
	$phpenv['streamlocation'] = $_SERVER['SERVER_NAME'].$streamport.$_SERVER['SCRIPT_NAME'];

$phpenv['remote'] = $_SERVER['REMOTE_ADDR'];
$phpenv['useragent'] = $_SERVER['HTTP_USER_AGENT'];

if (isset($_SERVER['HTTPS'])) $https=1; else $https=0;

if (!isset($PHP_SELF) || empty($PHP_SELF)) $PHP_SELF = $_SERVER['PHP_SELF'];


##################################################################################
## END OF CONFIGURATION ##########################################################
##################################################################################
// end of config...

// functions.php.

function verchar($in)
{
	if ($in == '1' || $in == '0') return $in; else return 0;
}

function vernum($in)
{
	if (is_numeric($in)) return $in; else return 0;
}

function checkchs($in)
{

       return htmlentities($in);
#        return htmlspecialchars($in,ENT_QUOTES,"ISO-8859-1");
}

function lzero($in, $len=2)
{
	$out = "00000000";
	if (strlen($in) >= $len) return $in; else
	return (substr($out,0,$len-strlen($in)).$in);
}



# LANGUAGES FOR KPLAYLIST:
# Please submit new languages, or grammar fixes directly to us for immediate
# new builds. Se http://www.kplaylist.com/ for more information.
#
# Our website helps you to create new languages. Please look there if your
# language is missing here.


// array("Norwegian\tiso-8859-1\tNorsk","Norsk"
// 0 = english language name.
// 1 = ISO value for language
// 2 = Native name of language

// changes: key 28, new from 124 -> 137

$klang[0]  = array("English", "iso-8859-1", "English", // 2
"What's hot",	"What's new",	"Search",	"(only %1 shown)",	"sec",	"Search results: '%1'", // 8
"found",	"None.",		"update search database options", "<b>Delete</b> unused records?", "Rebuild <b>IDv3</b>?", // 13
"Debug mode?", "Update", "Cancel", // 16
"update search database", "Found %1 files.", "Could not determine this file: %1, skipped.", "Installed: %1 - Update: %2, scan: ", "Scan: ", // 21
"Failed - query: %1", "Could not read this file: %1. Skipped.", "Removed: %1", // 24
"Inserted %1, updated %2, deleted %3 where %4 failed and %5 skipped through %6 files - %7 sec - %8 marked for deletion.", // 25
"Done", "Close", "Could not find any files here: \"%1\"", "kPlaylist Logon", "Album list for artist: %1", "Hotselect %1", // 31
"No tunes seleted. Playlist not updated.", "Playlist updated!", "Back", "Playlist added!", "Remember to reload page.", // 36
"login:", "secret:", "Notice! This is a non public website. All actions are logged.", "Login", "SSL required for logon.", // 41
"Play", "Delete", "Shared: ", "Save", "Control playlist: \"%1\" - %2 titles", "Editor", "Viewer", "Select", "Seq", // 50
"Status", "Info", "Del", "Name", "Totals:", "Error", "Action on selected: ", "Sequence:", "edit playlist", // 59
"Delete this entry", "add playlist", "Name:", "Create", "Play: ", "File", "Album", "All", "Selected", "add", // 69
"play", "edit", "new", "Select:", "Play Control: ", "Playlist: ", "Hotselect numeric", "Keyteq gives you:", // 77
"(check for upgrade)", "Homesite", "only id3", "album", "title", "artist", "Hotselect album from artist", // 84
"view", "Shared playlists", "Users", "Admin control", "What's new", "What's hot", "Logout", "Options", // 92
"Check", "My", "edit user", "new user", "Full name", "Login", "Change password?", "Password", "Comment", // 101
"Access level", "On", "Off", "Delete user", "Logout user", "Refresh", "New user", "del", "logout", // 110
"Use WinAmp EXTM3U feature?", "Show how many rows (hot/new)", "Max search rows", "Reset", "Open directory", // 115
"Go to directory: %1", "Download", "Go one step up", "Go to root directory.", "Check for upgrade", "users", "Language", // 122
"options", "Booted", "Shuffle:", "Settings", //126
"Base directory", "Stream location", "Default language", "A Windows system", "Require HTTPS", // 131
"Allow seek", "Allow download", "Session timeout", "Report failed login attempts", //135
"Hold on - fetching file list", "Playlist could not be added!", "0 = Admin, 1 = User", "Login with HTTPS to change!", // 139

// settings


);

$klang[1]  = array("Norwegian", "iso-8859-1", "Norsk", // 2
"Hva er mest spilt",	"Hva er nytt",	"Søk",	"(bare %1 vist)",	"sek",	"Søke resultater: '%1'", // 8
"fant",	"Ingen.",		"oppdater søke database valg", "<b>Slett</b> ubrukte rader?", "Ombygg <b>IDv3</b>?", // 13
"Debug modus?", "Oppdater", "Avbryt", // 16
"oppdaterer søke database", "Fant %1 filer.", "Kunne ikke lese fil: %1, hoppet over.", "Installert: %1 - Oppdaterer: %2, skanner: ", "Skanner: ", // 21
"Feilet - query: %1", "Kunne ikke lese denne filen: %1. Hoppet over.", "Fjernet: %1", // 24
"La inn %1, oppdaterte %2, slettet %3 hvor %4 feilet og %5 ble hoppet over igjennom %6 filer - %7 sek - %8 markert for sletting.", // 25
"Ferdig", "Lukk", "Kunne ikke finne noen filer her: \"%1\"", "kPlaylist Innlogging", "Album liste fra artist: %1", "Hurtigvelg %1", // 31
"Ingen låter valgt. Låtliste ikke oppdatert.", "Låtliste oppdatert!", "Tilbake", "Låtliste lagt til!", "Husk å oppdatere side.", // 36
"logg inn:", "hemmelighet:", "Advarsel! Dette er en privat webside. Alle handlinger blir logget.", "Logg inn", "SSL kreves for pålogging.", // 41
"Spill", "Slett", "Delte: ", "Lagre", "Kontroller låtliste: \"%1\" - %2 titler", "Editor", "Viser", "Velg", "Sek", // 50
"Status", "Info", "Slett", "Navn", "Totalt:", "Feil", "Handling på valgte: ", "Sekvens:", "editer låtliste", // 59
"Slett denne raden", "ny låtliste", "Navn:", "Lag", "Spill: ", "Fil", "Album", "Alle", "Valgte", "legg til", // 69
"spill", "editer", "ny", "Velg:", "Spille kontroll: ", "Låtliste: ", "Hurtigvelg numerisk", "Keyteq gir deg:", // 77
"(sjekk for ny versjon)", "Hjemmeside", "bare id3", "album", "tittel", "artist", "Hurtigvelg album fra artist", // 84
"vis", "Delte låtlister", "Brukere", "Admin kontroll", "Hva er nytt", "Mest spilt", "Logg ut", "Valg", // 92
"Sjekk", "Min", "editer bruker", "ny bruker", "Fullt navn", "Brukernavn", "Endre passord?", "Passord", "Kommentar", // 101
"Aksess nivå", "På", "Av", "Slett bruker", "Logg ut bruker", "Oppdater", "Ny bruker", "slett", "logg ut", // 110
"Bruke WinAmp EXTM3U egenskap?", "Vise hvor mange rader (mest spilt/nytt)", "Maks søke rader", "Omsetting", "Åpne katalog", // 115
"Gå til katalog: %1", "Last ned", "Gå ett steg opp", "Gå til kjerne katalog.", "Sjekk for ny versjon", "brukere", "Språk", // 122
"valg", "Avsperret", "Omskuff:", "Innstillinger",  "Arkiv katalog", "Nedlastningslokalisasjon", "Standard språk", // 129
"Et Windows system", "Krev HTTPS", "Tillat spoling", "Tillat nedlastninger", "Innloggingstidsavbrudd",  // 134
"Rapportere mislykkete påloggingsforsøk", "Vent - skaper filliste", "Spilleliste kunne ikke bli lagt til!", // 137
"0 = Admin, 1 = Bruker", "Logg inn med HTTPS for å endre!" // 139

);


$klang[2]  = array("German", "iso-8859-15", "Deutsch", // 2
"Was ist begehrt",	"Was ist neu",	"Suchen",	"(nur %1 angezeigt)",	"sek",	"Such Ergebnisse: '%1'", // 8
"gefunden",	"keine.", "aktuelle Datenbank-Such-Optionen", "unbenutze Datensätze <b>löschen</b> ?", "<b>IDv3</b> erneuern?", // 13
"Debug Modus?", "Update", "Abbrechen", // 16
"Such Datenbank erneuern", "%1 Dateien gefunden", "Konnte Datei nicht ermitteln: %1, übersprungen.", "Installertieten: %1 - Bearbeitet: %2, untersuche: ", "Scan: ", // 21
"Fehler - Abfrage: %1", "Konnte File nicht lesen: %1. Übersprungen.", "Entfernt: %1", // 24
"eingefügt %1, geändert %2, gelöscht %3 dabei %4 fehlgeschlagen und %5 übersprungen; %6 Dateien gesamt - %7 sek - %8 markiert zum löschen", // 25
"Erledigt", "Schliessen", "Konnte hier keine Dateien finden: \"%1\"", "kPlaylist Login", "Album Liste für Interpret: %1", "Kurzwahl %1", // 31
"Keine Lieder ausgewählt. Playliste nicht aktualisiert.", "Playliste aktualisiert", "Zurück", "Playliste hinzugefügt!", "Die Seite erneut laden !", // 36
"Login:", "Passwort:", "Achtung ! Dies ist eine Private Webseite ! Alle Aktionen werden protokolliert !", "Login", "SSL wird zum einloggen benötigt", // 41
"Abspielen", "Löschen", "Gemeinsame: ", "Sichern", "Playliste bearbeiten: \"%1\" - %2 Titel", "Editor", "Viewer", "Auswählen", "Seq", // 50
"Status", "Info", "Löschen", "Name", "Summe", "Fehler", "Aktion auf ausgewählte ", "Reihenfolge:", "bearbeite playlist", // 59
"Diesen Eintrag löschen", "Playliste hinzufügen", "Name:", "Erstellen", "Spielen: ", "Datei", "Album", "Alle", "Ausgewählte", "Hinzufügen", // 69
"Spielen", "ändern", "neu", "Auswählen:", "Spielen: ", "Playlist: ", "Kurzwahl Numerisch", "Keyteq präsentiert:", // 77
"(Suche nach Update)", "Webseite", "Nur id3 Tags", "Album", "Titel", "Interpret", "Kurzwahl Album nach Interpret", // 84
"view", "Gemeinsamme Playliste", "Benutzer", "Admin Kontrolle", "Was ist neu", "Was ist Hip", "Logout", "Optionen", // 92
"Überprüfen", "Meine", "Benutzer ändern", "Neuer Benutzer", "Vollständiger Name", "Login", "Passwort ändern ?", "Passwort", "Anmerkung", // 101
"Zugangs Level", "An", "Aus", "Benutzer löschen", "Benutzer ausloggen", "Erneuern", "Neuer Benutzer", "Löschen", "Logout", // 110
"WinAmp EXTM3U Feature benutzen?", "Wieviele Zeilen zeigen (hip/neu)", "max. Zeilen bei Suchergebnissen", "Reset", "Verzeichnis öffnen", // 115
"Gehe zum Verzeichnis: %1", "Download", "Eine Ebene höher", "In dass Basisverzeichnis", "Nach einem Upgrade suchen", "Benutzer", "Sprache", "Optionen", "Gestoppt",  "Shuffle:",  // 125
"Einstellungen", "Hauptverzeichnis", "Stream location", "Voreingestellte Sprache",  //129
"Ein Windows-System", "benötigt HTTPS", "Suche erlaubt", "Download erlaubt", "Session abgelaufen", // 134
"Berichte fehlgeschlagene Login-Versuche", "Bitte warten - hole Dateiliste",  //136
"Playliste konnte nicht erstellt werden!", "0 = Administrator, 1 = Benutzer", "LOGON mit HTTPS zum zu ändern" // 138


);


$klang[3]  = array("Swedish", "iso-8859-10", "Svenska", "Vad är mest spelat", // 3
"Vad är nytt", "Sök", "(endast %1 visad)", "sek", "Sökresultat: '%1'", "hittade", // 9
"Ingen.", "uppdatera sök databas inställningar", "<b>Ta bort</b> oanvända album", // 12
"Återuppbygg <b>IDv3</b>? ", "Kör debug?", "Uppdatera", "Avbryt",  // 16
"uppdatera sökdatabas", "Hittade %1 filer.", "Kunde inte läsa fil: %1, hoppade över.", // 19
"Installerer %1 - Uppdaterar: %2, läser:", "Läser:", // 21
"Misslyckades - query: %1", "Kunde inte läsa filen: %1, hoppade över",  "Tog bort: %1", // 24
"Infogade %1, uppdaterade %2, tog bort %3, varav %4 misslyckades och hoppade över %5 av %6 filer - %7 sek - %8 markerade för borttaganing", // 25
"Färdig", "Stäng",  "Kunde inte hitta några filer här: '%1'", "kPlaylist Inloggning", "Albumlista för artist: %1", // 30
"Snabbval %1", "Inga låtar valda. Låtlistan är ej updaterad.", 
"Låtlista uppdaterad!", "Tillbaka", "Spellista inlagd!", 
"Kom ihåg att uppdatera sidan.", "inloggning:", "hemligt:", 
"Observera! Detta är inte en publik websida. All aktivitet är loggad.", "Inloggning", 
"SSL behövs för inloggning", "Spela", "Ta Bort", "Delad:", "Spara", 
"Kontrollera låtlista: \"%1\" - %2 titlar", 
"Redigerare", "Visare", "Välj", "Sek", "Status", "Info", "Ta bort", "Namn",
"Totalt:", "Fel", "Handling vid val", 
"Sekvens:", "redigera spellista", "Ta bort den här raden", "Lägg till spelllista",
"Namn:", "Skapa", "Spela:", "Fil", "Album", "Alla", "Markerad", 
"lägg till", "spela", "redigera", "ny", "Välj:", "Spelkontroll:", "Spellista:",
"Snabbvälj numeriskt", "Keyteq ger dig:", "(kolla efter uppgradering)", "Hemsida",
"endast id3", "album", "titel", "artist", "Snabbvälj album från artist", "visa",
"Delade spellistor", "Användare", "Adminkontroll", "Vad är nytt", 
"Mest spelat", 
"Logga ut", "Inställningar", "Kontrollera", "Min", "redigera användare", 
"ny användare", "Fullständigt namn", "Användarnamn", "Ändra lösenord?", "Lösenord",
"Kommentar", 
"Behörighet", "På", "Av", "Ta bort användare", "Logga ut användare", "Uppdatera",
"Ny användare", "ta bort", "logga ut", "Använd WinAmps EXTM3U funktion?", 
"Visa hur många rader (mest spelat/nytt)", 
"Högst antal sökrader", "Nollställ", "Öppna katalog", "Gå till katalog: %1", 
"Ladda ner", "Gå ett steg upp", "Gå till rotkatalogen", "Kolla efter uppgradering",
"användare", "Språk", "inställningar",
"Avsperret", "Omskuff:", "Inställningar",  "Rotnivå", "Stream  lokalisering", "Default språk", // 129
"Ett Windowssystem", "Kräv HTTPS", "Tillåt filsök", "Tillåt nedlastning", "Innloggingstidsavbrudd",  // 134
"Rapportera misslyckat  loginförsök", "Vänta -  hämtar fillista", "Spellista kunde inte läggas till!", // 137
"0 = Admin, 1 = Användare", "Logg inn med HTTPS for å endre!" // 139


);

$klang[4]  = array("Dutch", "iso-8859-15", "Nederlands", "Wat is hot", "Wat is nieuw", "Zoeken",  // 6
"(slecht %1 aangewezen)", "sec", "Zoek resultaten: '%1'", "gevonden", "Geen.", "bijwerken zoek database opties", // 12
"<b>verwijderen</b> ongebruikte bestanden?", "herbouwen <b>IDv3</b>?", //14
 "Fout opsporings mode?", "Bijwerken", "Annuleren", "Bijwerken zoek database", "%1 gevonden bestanden.", // 17
 "Bestand kan niet benaderd worden: %1, overgeslagen.", "%1 - Bijwerken: %2, scan:", "Scannen:", "Fout - selectie: %1", // 22
 "Kan het bestand niet lezen: %1. Overgeslagen.", "Verwijderd: %1", // 24
 "Toegevoegd %1, bijgewerkt %2, verwijderd %3 waar %4 is mislukt en %5 overgelagen op %6 bestanden - %7 sec - %8 gemarkeerd voor verwijdering.", // 25
 "Klaar", "Sluiten", "Kan geen bestanden vinden in: \"%1\"", "kPlaylist inloggen", "Album lijst voor artiest: %1", "Hotselectie %1", 
 "Geen muziek geselecteerd. Afspeellijst niet bijgewerkt.", "Afspeellijst bijgewerkt!", "Terug", "Afspeellijst toegevoegd!", 
 "Onthoudt om de pagina te herladen.", "Gebruikersnaam:", "Wachtwoord:", 
 "NB! Dit is een niet publieke website. Alle acties worden opgeslagen in een log bestand.", "Ga verder...", "SSL benodigd om in te loggen.", 
 "Afspelen", "Verwijderen", "Lijst delen?:", "Bewaren", "Opties afspeellijst: \"%1\" - %2 nummer(s)", 
 "Editor", "Viewer", "Selecteren", "Volgorde", "Status", "Informatie", "Verwijderen", "Naam", "Totalen:", "Fout", "Actie op selectie:", 
 "Volgorde:", "afspeellijst bewerken", "Verwijder dit bestand", "afspeellijst toevoegen", "Naam:", "Aanmaken", 
"Afspelen:", "Bestand", "Album", "Allen", "Geselecteerd", 
 "selectie toevoegen", "afspelen", "bewerken", "nieuw", "Geselecteerd:", "Afspeel besturing:", "Afspeellijst:", 
"Hotselectie nummers", "Keyteq brengt u:", "(klik voor updates)", "Homepage", 
 "alleen id3", "album", "titel", "artiest", "Hotselectie albums van artiest", "bekijk", "Gedeelde afspeellijsten", 
"Gebruikers", "Administratie opties", "Wat is nieuw", "Wat is hot", 
 "Uitloggen", "Opties", "Check", "Mijn", "bewerk gebruikersaccount", "nieuw gebruikersaccount", "Volledige naam", 
"Gebruikersnaam", "Wachtwoord veranderen?", "Wachtwoord", "Extra info", 
 "Toegangs level", "Aan", "Uit", "Verwijder gebruiker", "Gebruiker afsluiten", "Vernieuwen", "Nieuwe gebruiker", 
"verwijderen", "uitloggen", "Gebruik WinAmp EXTM3U optie?", "Aantal vertoonde rijen (hot/nieuw)", 
 "Maximaal zoek aantal", "Reset", "Open map", "Ga naar map: %1", "Download", "Een stap terug", "Bovenste map", 
"Controleren voor updates", "gebruikers overzicht", "Taal", "opties", "Booted", "Shuffle", "Instellingen",
"Begin folder", "Stream lokatie", "Standaard taal", "Een Windows systeem", "HTTPS benodigd",
"Seek toestaan", "Downloaden toestaan", "Sessie timeout", "Raporteer niet geslaagde inlog procedures",
"Een ogenblik - fetching file list", "Afspeellijst kan niet toegevoegd worden!", "0 = Beheer, 1 = Gebruiker",
"LOGON mit HTTPS zum zu ändern!"

);
$klang[5]  = array("Spanish", "ISO-8859-1", "Español", "Lo Padre", "Lo Nuevo", "Búsqueda", "sólo 1% visible", "seg",  // 8
"Resulados de Búsqueda: \'%1\'", "encontrado", "Ninguno.", "actualizar opciones de base de datos de búsqueda",  // 12
"¿<b>Suprimir</b> entradas sin uso? ", "¿Reconstruir<b>IDv3</b>? ",  // 14
 "¿Modo de Debug? ", "Actualizar", "Cancelar", "actualizar base de datos de búsqueda", "Se Encontraron %1 archivos",  // 19
 "No se podía determinar este archivo: %1, saltado", "%1 - Actualizar: %2, scanear:  ", "Scanear", "Búsqueda Fallada: %1", 
 "No se podía enconrar archivo: %1. Saltado. ", "Quitado: %1", 
 "Insertado %1, actualizado %2, quitado %3 dónde %4 falló y %5 saltado por %6 archivos - %7 seg - %8 marcado para borrar.", 
 "Finalizado", "Cerrar", "No se podía encontrar archivos utilzando %1", "kPlaylist Nombre de Usuario", "Lista de disco de artista: %1 ", 
 "Hotselect %1 ", "Ninguna canción seleccionada. Lista no actualizada. ", "¡Lista actualizada con éxito!", "Regresar", "¡Lista actualizada!", 
 "Actualice la página", "nombre de usuario:", "contraseña", "Aviso! Este es un sitio restringido. Todos movimientos se guardan.", 
 "Nombre de usuario", "SSL requirido para entrar.", "Tocar", "Suprimir", "Compartido:", "Guardar", "Lista de Control: \"%1\" - %2 títulos", 
 "Editor", "Visor", "Seleccionar", "Seq", "Estatus", "Info", "Sup", "Nombre", "Totales:", "Error", "Acción sobre seleccionado", 
 "Sequencia:", "editar lista", "Suprimir esta entrada", "agregar lista", "Nombre:", "Crear", "Tocar:", "Archivo", 
"Disco", "Todo", "Seleccionados", "agregar", "tocar", "editar", "nuevo", "Seleccionar:", "Tocar Control:", "Lista:", "Seleccionador Númerico ", 
"Keyteq le proporciona:", "(checar por actualizaciones)", "Página Principal", 
 "sólo id3", "disco", "título", "artista", "Seleccionador disco de artista", "vista", "Listas compartidas", "Usuarios", 
"Control de administrador", "Lo nuevo", "Lo popular", 
 "Salir", "Opciones", "Checar", "Mi", "editar usuario", "nuevo usuario", "Nombre completo", "Nombre de usuario", 
"¿cambiar contraseña?", "Contraseña", "Comentario", 
 "Nivel de aceso", "Encendido", "Apagado", "Suprimir usuario", "Salir usuario", "Actualizar", "Nuevo usuario", "sup", 
"salir", "Utilizar la opción de EXTM3U WinAmp?", "Mostrar cuantas filas (popular/nuevo)", 
 "Máx filas de búsqueda", "Restaurar", "Directorio abierto", "Abriri directorio: %1", "Descargar", "Subir un nivel", 
 "Ir directo al directorio de raíz", "Buscar actualizaciones", "usuarios", "Idioma", "opciones",
"Cerrado", "Barajadura:", "Ajustes", //126
"Directorio bajo", "Localización de la corriente", "Lengua del defecto", "Un sistema de Windows", "Requiera HTTPS", // 131
"Permita seek", "Permita download", "Sesión descanso", "Informe fallado conexión tentativas", //135
"Sostenga encendido - traer la lista del archivo", "Playlist no podía ser agregado!", "0 = Admin, 1 = Usuario", // 138
"Conexión con HTTPS a cambiar"// 139

 
 );

 $klang[6]  = array("Portuguese", "ISO-8859-1", "Português", "este é popular", "Este é novo", "Busca", "(apenas %1 encontrado)", "seg", "Resultados da busca: \'%1\'", "encontrado", "Nenhum", "atualizar opções da busca na base de dados ", "<b>Apagar</b> entradas sem uso? ", "Reconstruir <b>IDv3</b>?", 
 "Modo Debug?", "Atualizar", "Cancelar", "Atualizar busca no banco de dados", "Encontrados %1 arquivos.", "Não foi possível determinar este arquivo: %1, descartado", "Install %1 - Atualizar: %2, escanear:", "Escanear:", "Falha na busca: %1", "Não foi possível ler este arquivo: %1. Descartado.", "Removido: %1", 
 "Inserido %1, atualizado %2, apagado %2, onde %4, falhou em %5, descartado por %6, arquivos - %7 seg - %8 marcado para ser deletado", "Finalizado", "Fechar", "Não foi possível encontrar arquivos aqui: \"%1\"", "Logon kPlaylist", "Lista de álbum por artista: %1", "Populares %1", "Nenhuma música selecionada. Lista não atualizada.", "Lista atualizada!", "Voltar", "Lista atualizada", 
 "Lembre-se de atualizar a página.", "login:", "senha:", "Atenção! Este não é um site restrito. Todas as ações são monitoradas.", "Login", "SSL necessário para entrar.", "Tocar", "Apagar", "Compartilhado", "Salvar", "Lista de controlhe: \"%1\" - %2 títulos", 
 "Editor", "Visualizador", "Selecionar", "Seq", "Status", "Info", "Del", "Nome", "Totais", "Erro", "Ação selecionada:", 
 "Sequência", "editar lista", "Apagar esta entrada", "adicionar lista", "Nome:", "Criar", "Tocar:", "Arquivo", "Álbum", "Todos", "Selecionado", 
 "adicionar", "tocar", "editar", "novo", "Selecionar", "Controle", "Lista:", "Selecionar número", "Keyteq oferece:", "(verificar atualização)", "Página incial", 
 "apenas id3", "álbum", "título", "artista", "Selecionar álbum por artista", "ver", "Listas compartilhadas", "Usuários", "Controle de administrador", "Este é novo", "Este é popular", 
 "Logout", "Opções", "Verificar", "Meu", "editar usuário", "novo usuário", "Nome completo", "Login", "Mudar senha?", "Senha", "Comentário", 
 "Nível de acesso", "Ligado", "Desligado", "Apagar usuário", "Desconectar usuário", "Atualizar", "Novo usuário", "apagar", "desconectar", "Utilizar opção EXTM3U do Winamp?", "Mostrar quantos arquivos (popular/novo)", 
 "Máximo de arquivos encontrados", "Restaurar", "Abrir diretório", "Para o diretório: %1", "Download", "Subir um nível", "Para o diretório principal", "Verificar atualizações", "usuários", "Linguagem", "opções", 
 "Carregado", "Aleatório", "Configurações", "Diretório base", "Local de stream", "Linguagem padrão", "Sistema Windows", "Requer HTTPS", "Permitir busca", "Permitir download", "Sessão expirou", 
 "Falha na tentativa de login", "Aguarde - buscando a lista de arquivos", "Lista não pode ser adicionada!", "0 = Admin, 1 = Usuário",
 "Início de uma sessão com o HTTPS a mudar");



$klang[7]  = array("Finnish", "ISO-8859-1", "Suomi", "Suosituimmat", "Uusimmat", "Etsi", "(pelkästään %1 näytetään)", "sek", "Haku-tulokset: '%1'", "löytyi", "Tyhjä.", "päivitä hakutietokannan asetukset", "<b>Poista</b> käyttämättömät tiedot?", "Uudelleenrakenna <b>IDv3</b>?", 
 "Debug-moodi?", "Päivitä", "Peruuta", "päivitä hakutietokanta", "Löytyi %1 tiedostoa", "Ei voinut määrittää: %1, skipattu.", "Install %1 - Päivitä: %1,  tarkistus:", "Tarkistus:", "Epäonnistui - haku: %1", "Ei voinut lukea tätä tiedostoa: %1. Skipattu.", "Poistettu: %1", 
 "Syötetty %1, päivitetty %2, poistettu %3, missä %4 epäonnistui ja %5 skipattiin %6 tiedostosta - %7 sekuntia - %8 merkitty poistettavaksi", "Valmis", "Sulje", "Mikään ei vastannut: %1", "kPlaylist Kirjautuminen", "Albumilista artistille: %1", "Pikavalinta: %1", "Ei valittuina mitään. Soittolistaa ei päivitetty", "Soittolista päivitetty!", "Takaisin", "Soittolista lisätty!", 
 "Muista päivittää sivu.", "kirjaudu:", "salaisuus:", "Huomautus! Tämä ei ole julkinen sivu. Kaikki teot kirjataan ylös", "Kirjaudu", "SSL vaaditaan kirjautumiseen.", "Soita", "Poista", "Jaettu:", "Tallenna", "Hallitse soittolistaa: \"%1\" - %2 nimet", 
 "Muokkain", "Selain", "Valitse", "Järj.", "Tila", "Info", "Poista", "Nimi", "Yhteensä:", "Virhe", "Toiminto valitussa:", 
 "Järjestys:", "muokkaa soittolistaa", "Poista tämä tulos", "lisää soittolista", "Nimi:", "Luo", "Soita", "Tiedosto", "Albumi", "Kaikki", "Valitut", 
 "lisää", "soita", "muokkaa", "uusi", "Valitse:", "Hallinta:", "Soittolista", "Pikavalinta numero", "Keyteq tuo sinulle:", "(tarkista päivityksien varalta)", "Kotisivu", 
 "pelkästään id3", "albumi", "biisi", "artisti", "Pikavalitse albumi artistilta", "katso", "Jaetut soittolistat", "Käyttäjät", "Ylläpito", "Mitä uutta", "Suosituimmat", 
 "Kirjaudu ulos", "Asetukset", "Tarkasta", "Oma", "muokkaa käyttäjää", "uusi käyttäjä", "Kokonimi", "Kirjaudu", "Vaihda salasana?", "Salasana", "Kommentti", 
 "Taso", "On", "Off", "Poista käyttäjä", "Kirjaa ulos käyttäjä", "Päivitä", "Uusi käyttäjä", "poista", "kirjaa ulos", "Käytä WinaMpin EXT3MU-toimintoa?", "Näytä kuinka monta tulosta (suosittu/uusi)", 
 "Maksimi haku tulokset", "Resetoi", "Avaa hakemisto", "Mene hakemistoon: %1", "Imuroi", "Avaa yläkansio", "Mene päähakemistoon", "Tarkista päivityksien varalta", "läyttäjät", "Kieli", "asetukset", 
 "Boottasi", "Shuffle", "Asetukset", "Perushakemisto", "Streamin lähde", "Oletuskieli", "Windows systeemi", "Vaadi HTTPS (Salattu yhteys)", "Salli etsiminen", "Salli imurointi", "Istunto päättynyt", 
 "Ilmoita epäonnistuneet kirjautumisyritykset", "Hetki. Haen tiedostolistaa", "Soittolistaa ei voitu lisätä", "0 = Ylläpitäjä, 1 = Käyttäjä", "Login with HTTPS to change!" 

 );


$klang[8]  = array("Danish", "ISO-8859-1", "Dansk", "Hvad er hot", "Hvad er nyt", "Søg", "(kun %1 vist)", "sek", 
"Søgeresultater: \'%1\'", "fundet", "Ingen.", "opdater søge database instillinger", "<b>Slet</b> ubrugte album", 
"Genetabler <b>IDv3</b>? ", "Kør fejlfinding?", "Opdater", "Fortryd", "opdater søge database", "Fandt %1 filer.", "Kunne ikke læse denne fil: %1, ignoreret.", "Installerer %1 - Opdaterer: %1, skanner:", "Skanner:", "Fejlede - forespørgsel: %1", "Kunne ikke læse denne fil: %1. ignoreret", "Fjernet: %1", 
 "Tilføjede %1, opdaterede %2, slettet %3, hvor %4, fejlede og %5 ignorerede &6 filer - %7 sek - &8 markeret til sletning.", "Færdig", "Luk", "Ingen filer blev fundet ved brug af %1", "Log på kPlaylist ", "Album liste for kunstner: %1", "Hurtigvælg %1", "Ingen numre valgt. Afspilningslisten er ikke opdateret.", "Afspilningslisten er opdateret!", 
"Tilbage", "Afspilningsliste er tilføjet!", 
 "Husk at opdatere siden.", "bruger:", "kodeord:", "Bemærk! Dette er ikke en offentlig webside. Alle handlinger vil blive gemt.", "Log på", "SSL er nødvendigt for at logge på", "Afspil", "Slet", "Delt", "Gem", "Opsætning for afspilningsliste: \"%1\" - %2 titler", 
 "Redigerings vindue", "Fremviser", "Vælg", "Sek", "Status", "Information", "Slet", "Navn", "Totalt:", "Fejl", "Handling på de valgte", 
 "Sekvens", "rediger afspilningsliste", "Slet dette nummer fra listen", "ny afspilningsliste", "Navn:", "Lav en ny", 
"Afspil:", "Fil", "Album", "Alle", "Valgte", 
 "tilføj", "afspil", "rediger", "ny", "Vælg:", "Afspilnings kontrol", "Afspilningsliste:", "Numerisk hurtigvalg", 
"Keyteq giver dig:", "(se efter opdatering)", "Hjemmeside", 
 "kun id3", "album", "titel", "kunstner", "Hurtigvælg album fra kunstner", "vis", "Delt afspilningsliste", "Brugere", 
"Administrator instillinger", "Hvad er nyt", "Hvad er hot", 
 "Log af", "Instillinger", "Kontroller", "Min", "rediger bruger", "ny bruger", "Fulde navn", "Bruger", "Ændre kodeord", 
"Kodeord", "Kommentar", 
 "Adgangsniveau", "På", "Af", "Slet bruger", "Log bruger af", "Opdater", "Ny bruger", "slet", "log af", "Brug WinAmp\'s EXTM3U funktion", "Vis hvor mange rækker (hot/nye)", 
 "Max søge rækker", "Nulstil", "Åben katalog", "Gå til katalog: %1", "Download", "Gå et niveau op", "Gå til rod-kataloget", "se efter opdatering", "brugere", "Sprog",  "valg", "Avsperret", "Omskuff:", "Innstillinger",  "Arkiv katalog", "Nedlastningslokalisasjon", "Standard språk", // 129
"Et Windows system", "Krev HTTPS", "Tillat spoling", "Tillat nedlastninger", "Innloggingstidsavbrudd",  // 134
"Rapportere mislykkete påloggingsforsøk", "Vent - skaper filliste", "Spilleliste kunne ikke bli lagt til!", // 137
"0 = Admin, 1 = Bruker", "Logg inn med HTTPS for å endre!"

 );

# 'windows-1251'
# "ISO-8859-5"

$klang[9] = array("Russian", "windows-1251", "Ðóññêèé", "×òî ãîðÿ÷åíüêîãî", "×òî íîâîãî", "Íàéòè", "(òîëüêî %1 ïîêàçàí)", "ñåê", "Ðåçóëüòàò ïîèñêà: \'%1\'", "íàéäåíî", "Íè îäèí.", "îáíîâèòü íàñòðîéêè ïîèñêà áàçû äàííûõ", "Óäàëèòü íå èñïîëüçîâàííûé ðåêîðä? ", "Ïåðåñîçäàòü IDv3? ", "Ðåæèì îòëàäêè?", "Îáíîâèòü", "Îòìåíà", "Oáíîâèòü áàçó äàííûõ ïîèñêà", "Íàéäåíî %1 ôàéë(îâ).", "Íå ñìîã îïðåäåëèòü ýòîò ôàéë: %1 %2, ïðîïóùåíî", "Îáíîâëåíî: %1, ñêàíèðóåòñÿ:", 
"Ñêàíèðîâàòü:", "Ïîäâåäåííûé - çàïðîñ: %1", "Íå ñìîã ïðî÷èòàòü ýòîò ôàéë: %1. Ïðîïóùåíî", "Óäàëåííî: %1", "Âñòàâëåííî %1, îáíîâëåíî %2, óäàëåííî %3 ãäå %4 íåóäàâøèõñÿ è %5 ïðîïóùåííî(ûõ) %6 ôàéë(îâ)-%7 ñåê- %8 îòìå÷åííûé äëÿ óäàëåíèÿ.", 
"Ãîòîâî", "Çàêðûòü", "Íå íàéäåíî íè îäèí ôàéë ñ èñïîëüçîâàíèåì %1", "kPlaylist Âõîä", "Ñïèñîê àëüáîìîâ äëÿ àðòèñòà: %1", 
"Áûñòðûé âûáîð %1", "Íèêàêèå ìåëîäèè íå âûáðàíû. Playlist íå îáíàâëåí.", "Playlist îáíàâëåí! ", "Íàçàä", "Playlist äîáàâëåí!", "Íå çàáóäòå ïåðåçàãðóçèòü ñòðàíèöó.", "Èìÿ:", "Ïàðîëü:", "Ïðèìå÷àíèå! Ýòî - íå îáùåñòâåííûé ñàéò. Âñå äåéñòâèÿ çàïèñûâàþòñÿ", "Âîéòè", "Íåîáõîäèì SSL äëÿ âõîäà.", "Èãðàòü", "Óäàëèòü", "Ñîâìåñòíî èñïîëüçîâàííûé:", 
"Ñîõðàíèòü", " Óïðàâëåíèå playlist: \"%1\" - %2 çàãîëîâêîâ", "Ðåäàêòèðîâàòü", "Ïðîñìîòð", "Âûáðàòü", "Ïîñëåä.", 
"Ñîñòîÿíèå", "Èíôîðìàöèÿ", "Óäë.", "Èìÿ", "Èòîãè:", "Îøèáêà", "Äåéñòâèå íà âûáðàííîì:", "Ïîñëåäîâàòåëüíîñòü:", 
"Ðåäàêòèðîâàòü playlist", "Óäàëèòü ýòîò ââîä", "Äîáàâèòü playlist ", "Èìÿ:", "Ñîçäàòü", "Èãðàòü:", "Ôàéë", "Àëüáîì", 
"Âñå", "Âûáðàííûå", "Äîáàâèòü", "Èãðàòü", "Ðåäàêòèðîâàòü", "Íîâûé", "Ïîìåòèòü âñå:", "Óïðàâëåíèå ïðîèãðîâàíèåì:", 
"Playlist:", "Áûñòðûé âûáîð ïî ÷èñëó", "Keyteq äàåò âàì", "(ïðîâåðèòü îáíîâëåíèå) ", "Äîìàøíÿÿ ñòðàíèöà", "òîëüêî id3", 
"àëüáîì", "çàãîëîâîê", "àðòèñò", "Áûñòðûé âûáîð ïî àðòèñòó", "Ïðîñìîòð", "Ñîâìåñòíî èñïîëüçîâàííûé playlists", 
"Ïîëüçîâàòåëè", "Óïðàâëåíèå àäìèíèñòðàöèè ", "×òî íîâîãî", "×òî ãîðÿ÷åíüêîãî", "Âûéòè", "Íàñòðîéêè", "Ïîìåòèòü", "Ìîé", 
"Ðåäàêòèðîâàòü ïîëüçîâàòåëÿ", "Íîâûé ïîëüçîâàòåëü", "Ïîëíîå èìÿ", "Èìÿ", "Èçìåíèòü ïàðîëü?", "Ïàðîëü", "Êîììåíòàðèè", 
"Óðîâåíü äîñòóïà", "âêë.", "âûêë.", "Óäàëèòü ïîëüçîâàòåëÿ", "Îòêëþ÷èòü ïîëüçîâàòåëÿ", "Îáíîâèòü", "Íîâûé ïîëüçîâàòåëü", 
"óäë.", "îòêëþ÷èòü", "Èñïîëüçîâàòü Winàmp EXTM3U îñîáåííîñòü?", "Ïîêàç ñêîëüêî ñòðîê (ãîðÿ÷èõ/íîâûõ)", "Ìàêñ ïîèñê ñòðîê", 
"Ñáðîñèòü", "Îòêðûòü êàòàëîã", "Èäòè â êàòàëîã: %1", "Çàãðóçèòü", "Èäòè øàã ââåðõ", "Èäòè â îñíîâíóþ äèððåêòîðèþ", 
"Ïðîâåðèòü îáíîâëåíèÿ", "Ïîëüçîâàòåëè", "ßçûê", "Îïöèè"

);

$klang[10]  = array("Swiss German", "iso-8859-15", "Schwiizerdütsch", "Wasch geil", "Wasch neu", "Wo isch das Züüg", "Gseesch nur äs Prozänt", "sek", "Suechergebnis: \'%1\'", "gfundä", "keini", "pass das datebank-suech-züüg aa", "nöd benutzte seich i de db <b>kickä</b> ?", "<B>IDv3</B> erneuerä?", 
 "Dibög-Modus?", "Update", "Abbräche", "Suech-DB update", "%1 Files gfundä", "Bin bi dem File nöd druus cho: %1. Has usglaa.", "Inschtalliert:%1 - Draa umebaschtlet: %2, abchecke:", "scän:", "Problem bi de Abfrag: %1", "Han glaub es File verhüeneret: %1. Ussglaa..", "Weggnoo: %1", 
 "inetaa: %1, umebaschtlet: %2, weggnoo: %3, %4 händ nöd gfunzt und %5 hani ussglaa; %6 dateie insgesamt - %7 sekunde - %8 hani markiert zum abtschüsse.", "Schnornig.", "Zuemachä.", "Da hätts kei Dateie: \"%1\"", "KPlaylist Login", "Albumlischte für Interpret: %1", "Churzwahl %1", "Kein Song usgwählt. Playlischte nöd aktualisiert.", "Playlischte aktualisiert.", "Zrugg", "Playlischte zuegfüegt!", 
 "Nomal lade das züüg.", "Login:", "Passwort:", "Achtung! Dasch privat da züüg. Jede seich gitt eis uf de Deckel!", "Login", "Bruchsch SSL zum inechoo", "Abschpile", "Lösche", "Die wommer zäme händ:", "Seivä", "A de Playlischte umebaschtle: \"%1\" - %2 Titel", 
 "Editor", "Aazeiger", "Uswähle", "Nummerä", "Schtatus", "Info", "Abtschüsse", "Namä", "Zämezellt", "Schöne seich", "Das machemer mit dene wo uusgwählt sind", 
 "Reiefolg", "a de Playlischte umebaschtle", "De Iitrag useschmeisse", "Playlischte dezuetue", "Namä:", "Mache", "Abschpile:", "Datei", "Album", "Ali", "die Uusgwählte", 
 "Dezue tue", "Abschpile", "draa umebaschtle", "neu", "Uswähle:", "Abschpile:", "Playlischte:", "Churzwahl numerisch", "Keyteq präsentiert eu:", "(Suche nacheme neue versiönli)", "Houmpeitsch", 
 "Nume id3 TägZ", "Album", "Titel", "Interpret", "Churzwahl Album nach Interpret", "Aasicht", "Playlischtene, wommer zäme händ", "Benutzer", "Admin kontrollä", "Wasch neu", "Wasch geil", 
 "Und tschüss", "Iischtellige", "Abtschägge", "Mini", "Benutzer abändere", "Neue Benutzer", "De ganz Name", "Login", "Passwort abändere?", "Passwort", "Sänf dezue gee", 
 "Wie mächtig isch de Typ", "Aagschtellt", "Abgschtellt", "Benutzer abtschüsse", "Uuslogge", "Erneuerä", "Neue Benutzer", "Lösche", "Uuslogge", "Söli das Winamp-EXTM3U züüg bruuche?", "Wivill ziile aazeige (geil/neu)", 
 "Max. Ziile bi Suechergebnis", "Reset", "Ordner ufmache", "Gang zum Ordner: %1", "Abesuuge", "Ein Ordner ufe", "Is Grundverzeichnis", "Mal luege öbs es Update gitt", "Benutzer", "Spraach", "Opzione", 
 "Aaghalte", "Mischle:", "Iischtellige", "Hauptverzeichnis", "Stream location", "Standardspraach", "Es windoof-system", "bruucht HTTPS", "dörf me sueche", "dörf me suuge", "session isch abgloffe", 
 "säg mer, wenn eine sis PW verhängt", "momäntli, mues schnäll go d\'files läse", "han die blööd playlist nöd chöne mache!", "0 = Admin, 1 = Normale User", "Login mit HTTPS zum ändere"
 
 );




function get_lang($n) 
{
	global $deflanguage, $klang, $i;
	$numargs = func_num_args();

	$olang = @$klang[$deflanguage][$n];
	
	if (empty($olang)) 
	{
#		$olang = '<font color="RED">'."Missing key #".$n.'</font>';
		$olang = ''."Missing language key #".$n.'';
		return $olang;
	}

	if ($numargs > 1)
	{
		$arg = func_get_args();
		for ($i=1;$i<$numargs;$i++)
		{	
			$reps = "%".$i;
			$olang = str_replace($reps, $arg[$i], $olang);
		}
	} 
	return $olang;
}

function get_lang_combo($userlang="", $fieldname="u_language")
{
	global $klang;
	$langout = '<select name="'.$fieldname.'" class="fatbuttom">';
	for ($c=0;$c<count($klang);$c++) 
	{
		$langout .= '<option value="'. $c. '"';
		if ($c == $userlang) $langout .= ' selected="selected"'; 
		$langout .= '>';
		if ($c == $userlang) $langout .= $klang[$c][2];
		else $langout .= $klang[$c][0];
		$langout .='</option>'."\n";
	}
	$langout .= "</select>\n";
	return $langout;
}

// MySQL db and table definition. Used during automatic installation.

$installdb[0] = "DROP DATABASE IF EXISTS ".$db['name'];
$installdb[1] = "CREATE DATABASE IF NOT EXISTS ".$db['name'];
$installdb[2] = "CREATE TABLE tbl_playlist (
  u_id int(4) NOT NULL default '0',
  name varchar(32) NOT NULL default '',
  public char(1) NOT NULL default '0',
  status tinyint(1) NOT NULL default '0',
  listid int(11) NOT NULL auto_increment,
  PRIMARY KEY  (listid),
  UNIQUE KEY u_login (u_id,name)
) TYPE=MyISAM";
$installdb[3] = "CREATE TABLE tbl_playlist_list (
  listid int(11) NOT NULL default '0',
  id int(11) NOT NULL auto_increment,
  title varchar(255) NOT NULL default '',
  pdir varchar(255) NOT NULL default '',
  cnt int(4) NOT NULL default '0',
  file varchar(255) NOT NULL default '',	
  seq int(4) NOT NULL default '0',
  PRIMARY KEY  (id)
) TYPE=MyISAM";
$installdb[4] = "CREATE TABLE tbl_search (
  id int(11) NOT NULL auto_increment,
  title varchar(75) NOT NULL default '',
  free varchar(255) NOT NULL default '',
  album varchar(50) NOT NULL default '',
  artist varchar(200) NOT NULL default '',
  md5 varchar(32) NOT NULL default '',
  hits int(4) NOT NULL default '0',
  date int(4) NOT NULL,
  fsize int(4) NOT NULL,
  PRIMARY KEY (id)
) TYPE=MyISAM";
$installdb[5] ="CREATE TABLE tbl_users (
  u_name varchar(32) NOT NULL default '',
  u_pass varchar(32) NOT NULL default '',
  u_login varchar(32) NOT NULL default '',
  u_ip varchar(16) NOT NULL default '',
  u_comment varchar(64) default NULL,
  u_id int(4) NOT NULL auto_increment,
  u_sessionkey bigint(16) unsigned default '0',
  u_booted tinyint(4) NOT NULL default '0',
  u_status tinyint(4) NOT NULL default '0',
  u_time bigint(16) NOT NULL default '0',
  u_access tinyint(4) default '1',
  extm3u CHAR(1) NOT NULL default '1', 
  defplaylist INT(4) NOT NULL default '0', 
  defshplaylist INT(4) NOT NULL default '0', 
  defaultid3 CHAR(1) NOT NULL default '0', 
  defaultsearch INT(1) NOT NULL default '0', 
  partymode CHAR(1) NOT NULL default '0', 
  theme INT(4) NOT NULL default '0', 
  lockedtime INT(8) NOT NULL default '0',
  hotrows INT(4) NOT NULL default '25',
  searchrows INT(4) NOT NULL default '25',
  lang TINYINT NOT NULL default '0', 
  PRIMARY KEY  (u_id),
  UNIQUE KEY u_login (u_login),
  UNIQUE KEY u_id (u_id)
) TYPE=MyISAM";

$installdb[6] ="DROP TABLE IF EXISTS tbl_kplayversion"; // delete and empty it first!
$installdb[7] ="CREATE TABLE tbl_kplayversion (
  app_ver varchar(6) NOT NULL default '',
  app_build varchar(6) NOT NULL default ''
) TYPE=MyISAM";
$installdb[8] ="INSERT INTO tbl_kplayversion (app_ver, app_build) VALUES ('".$app_ver."', '".$app_build."')";
$installdb[9] = 'INSERT into tbl_users set u_name = "admin", u_login = "admin", u_pass = "'.md5("admin").'",  u_comment = "admin", u_access = "0"';

$installdb[10] = "CREATE TABLE tbl_settings (
  s_allowseek CHAR(1) NOT NULL default '1',
  s_allowdownload CHAR(1) NOT NULL default '1',
  s_base_dir varchar(255) NOT NULL default '/path/to/my/music/archive',
  s_streamlocation varchar(255) NOT NULL default '',
  s_max_execution_time INT(4) NOT NULL default '900',
  s_default_language INT(4) NOT NULL default '0',
  s_windows CHAR(1) NOT NULL default '0',
  s_timeout INT(4) NOT NULL default '43200',
  s_require_https CHAR(1) NOT NULL default '0',
  s_maxusers INT(2) NOT NULL default '0',
  s_report_attempts CHAR(1) NOT NULL default '1',
  s_show_keyteq CHAR(1) NOT NULL default '1',
  s_show_upgrade CHAR(1) NOT NULL default '1',
  s_lastupdate INT(4) NOT NULL default '0',
  s_updateprogress CHAR(1) NOT NULL default '0',
  s_install CHAR(1) NOT NULL default '0'
) TYPE=MyISAM";

$installdb[11] = 'INSERT INTO tbl_settings set s_windows = "'.$win32.'"'; 
if ($win32) $installdb[12] = 'UPDATE tbl_settings set s_streamlocation = "'.@$GLOBALS["HTTP_HOST"].@$GLOBALS["REQUEST_URI"].'"';

$installdbuser[0] = "GRANT SELECT,INSERT,UPDATE,DELETE,CREATE,DROP ON ".$db['name'].".* 
TO ".$db['user']."@".$db['host']." IDENTIFIED BY '".$db['pass']."'";
$installdbuser[1] = "FLUSH PRIVILEGES";

//ALTER TABLE `kplaylist`.`tbl_playlist_list` ADD `file` VARCHAR(255) NOT NULL; 
// OPPGRADERING FRA 0.9B
$upgradedb[1] = "ALTER TABLE tbl_playlist_list ADD file VARCHAR(255) NOT NULL, ADD seq int(4) NOT NULL";
$upgradedb[2] = "ALTER TABLE tbl_search ADD MD5 VARCHAR(32) NOT NULL, ADD hits TINYINT NOT NULL, ADD date INT(4) NOT NULL, add fsize int(4) NOT NULL";
   
// upgrade fra 1.0 til neste..
//ALTER TABLE `kplaylist`.`tbl_users` ADD `lang` TINYINT DEFAULT '0' NOT NULL; 


##### STOP HERE ##### - No more configuration options.

// First Images, class.id3.php then more code...

// start of pictures...



function image_expireheader()
{
	header("Expires: ".date("D, d M Y H:i:s",mktime(date("H"),date("i"),date("s"),date("m"),date("d")+1,date("Y"))));
}

function loadimage($imgnr)
{
	global $externimagespath, $externimages, $externimages_mime;
	if (file_exists($externimagespath.$externimages[$imgnr]))
	{
		if ( ($fp = fopen($externimagespath.$externimages[$imgnr], "r") ))
		{
			$fsize = filesize($externimagespath.$externimages[$imgnr]);
			$data = fread($fp, $fsize);
			if ($fsize)
			{
				$imgmime = $externimages_mime[$imgnr];
				image_expireheader();	
				header("Content-type: $imgmime");
				header("Content-length: $fsize");
				echo $data;
			}
			fclose($fp);
		}
	}
}


  function image_saveicon() 
  {
    header("Content-type: image/gif");
    header("Content-length: 138");
    echo base64_decode(
'R0lGODlhCwALALMAAL+/v////35+fj09PV5eXgAAAI6Ojm5ubt'.
'/f3y0tLc/Pz+/v701NTR0dHZ6engAAACH5BAAAAAAALAAAAAAL'.
'AAsAAAQ3EIFJaUjGVECEGVMgigIggMBImqgalKfCCDRNsO6II8'.
'cxDIIAjlIoDISCxIJoRCoIUEKxISA4IgA7'.
'');
  }


function image_dir() 
 {
	image_expireheader();
	header("Content-type: image/gif");
    header("Content-length: 120");

	echo base64_decode(
'R0lGODlhEgANAKIAAPf39///zpycAP/OnM7OY////wAAAP//nC'.
'wAAAAAEgANAAADRVglzKYwKgFCOEc8CQX5INE0kWCdqHUQ23Jh'.
'cDyw3RsfA7625g3nM54NA9TRJkOiLlj7LXFMZHE6iC5C2FCrYO'.
'h6v19IAgA7'.
'');
  }

  function image_php() 
  {
		image_expireheader();

	header("Content-type: image/gif");
    header("Content-length: 3285");
    echo base64_decode(
'R0lGODlhXwAyAPf/AAAAAFVUVSAfIT08Pk5NUUdGS0NCSbCvuN'.
'fW3mBfa1pZZsLB0LCvxbSzyAMDBAoKDQQEBYGBmhISFQYGBzc3'.
'PxsbHo2NnBQUFjQ0OW5ud1VVXMXF1EpKTikpK6WlqyMjJOXl65'.
'GRlYCAgzg4OcPDxaKio5iYmY6Pq4eJqGJjdV5fcLm6zWZogqCi'.
'wKiqxHp7iLu8y3+Dp2xvjXZ5mEdJWpmcuQwNFGNoikFEWl1hfW'.
'FlgjU3R1BTahMVIDs/VWBmiWZsjnd9omRpiI+Vu7i6xaipr1Jg'.
'oVpnpB8jOF5rp2BspmJup2dzrGZyqV5pnGl1rGdxo2BplnF7rk'.
'RKaCwwQ2Boj2lxmhocJlRaeY+Zyi0wPpagzo2WwqGp0Z2lyrK5'.
'3LG31ba71a6zy7i91b/E277C1sfL3tLW6b7B0c3Q4L3Azq2us0'.
'xcnlFgolFgoVJholRjpFNiolNioVVkpFRjolVko1dmplhnpldm'.
'pFdlpFtqqlppqFpop11srFlopVlnpV5trVpopVhmoSsyT2Bvr1'.
'5sq11rql1rqVxqqFtppiYsRVxqp0ROe1tpo1Zjm09bjV5rpmJw'.
'rWFvq1xpoWRyrlRgkmZ0sFtnnWl2sWBsoW16tUtUe1tmk3J/t1'.
'9plXiEuX6LwIOPwIaSxAsMEIuXyIGLuCgrOI+ZxpKdypiizpyn'.
'05qkz56nz6St0iQmLra/5aqy07zD4Li/3LvA1d3i9rO2ws3O0r'.
'y9wVhiibvA05qcowQFCA4RGggJDBgZHK+yu2hpbKytsAYHCXJz'.
'dWxtb6eoqYaHiLW2t8DAwAQEAgICAQcHBQkJBwwMChMTEBQUER'.
'cXFBkZFhERDxQUEgsLCg4ODTo6N3p6dWxsaWVlY29vbWhoZqqq'.
'qH19fHV1dICAf0NCPhgXFB0cGSMiHzg3NEhHREtKR1BPTAkIBi'.
'AfHSgnJTIxLzU0Ml5dW2FgXgQDAgYFBBYVFHJxcKinpkVDQi4t'.
'LZGRkY6Ojnh4eHd3dxYWFg8PDwICAgEBAf///wAAACH5BAEAAM'.
'gALAAAAABfADIAQAj/AJEJHEiwoMGDBvUJwFBAQ4IMLyJYOEER'.
'BYoIM2TowDLFxw5TrnxJ2IewpMmTBl29YMBgyJM7cwIlmkmzps'.
'2afywRAcCTpwlQeW4KHWpTj55LOTRwGHEBAEobQIIs8UPUTyQ1'.
'0npq3arVHZk2XbBxHdsz3QY9Z0yQJcssxKegNgFVssFTIC5ORG'.
'sa+eJNq7pZfPjQ5IOozDitA+b167mMxFuaecJY0xrgjC1mWkOI'.
'qlOzTqgSi3tm6PRnKKJAV/ohg8CjyqSheDSteadVA758uPN1u+'.
'cBBphQc+oYgVUid755Xt7Q9GzLOD41tLRp1efNuQgTRcSgisQ5'.
'byK5o+qW/7yC5UaVS5EwqVe/SKb390T5LLK0HlMk9/ABAWLUoy'.
'fK/ydBIIErO9CgQg4sJKigEAzecMMPEEKogw455JCCCgpkqEEA'.
'BBQwQgcVVOMAgCSWiEwHxByAAAgIzOJFKUwkUkccedzhh2Dw5b'.
'hHIo04EcUNLKSQggYU+GIiQjtQJMUdpdmEBx+HRCnllIjcEUcc'.
'eNQUGTtaydPKHFLuMccbdTSZyB91TKlmlGLSiCNNiPTxiBbiPO'.
'AUQb5UYQV8cIABjlbtwOKGH38UyoYq32x1CzdaNQNDJHkUmkck'.
'tTSjlQi0lKDVMrVggkehf+DxBhlc9jTOEHDdBAgSAFCzw3k7Ev'.
'9FxxbGaAUBMd188w0+2VhDm1b0pLFBVj3ZQ0p3icTRhXRlkQFC'.
'qTx1oKuu8gQQzVbLGAMKskLt188EBI3Cww2e1BTIIbmIo1U3q8'.
'SR47s0uQELoz01g4Ih8NbURyGD+HckMhLsgIUQ5kXxWqz5JmxT'.
'nIhUsokP9aQTDzUj/mtxPxUQIEIRtoDAYhpliNHCEKV8IsUTTS'.
'yhRBIsQ+IyJErEnEkmTjjBCSdVVHGDEDnw4IMpEvBj8ZEQGGDB'.
'AhusUIMUicDxZI54dMLK1FOjIgl+Ce84SRU5ZFjABxAMjYwvM7'.
'SwtB13KGzTrCJoJU4Zh2Ct9k1xVkLDCPVQgxIOMcT/sETaQr0B'.
'CzbQFG744eLUc043v8hCSR13dFIEP41OE07h0XxgjTv2LLAFHX'.
'KcAsI4h5cOzTjktBOCGKDAcVMfgpiSzGIEXWEFFO/VkUWt9ZJQ'.
'BhpowPCLCQNspY4ZacSjlTdqEOH8LyVMphUxX4CQjlbaIKAGGm'.
'rUEowI+mwFzCd23LQIIYrUhQMnr3l3Bya/wKNVCY/RxLZWDhwD'.
'LQDXfOGG/ajgHU8cRYsAaKUcYHCdlsJADq3UA1VDMUQldgEBLO'.
'DFO3+QBAIO0xN5pIINdKDDG+AACjPUQyvMQEA2gBWGOdDkD5o4'.
'gPx6EgJa3EMrz1jBHuJAhzi8QRJfKMYE/4DFBRea5gg96Ic0Wt'.
'OIvESmgWvhSjsQ8IlQ3LAnzlDD1WZyhEKk4Xo9AQYtjqGMKG4l'.
'GiZAhXLycghH0KUaA9kBuQLXim1oZR1haAMPQ0iHOnzKJn/gIx'.
'+pUhM+1EGQbsAECK7VE2JowgiC9OMf3sRGRKRPPAZxgA/M85o5'.
'iEIX6GCGKJ9BBEuYaW5C+UMSCihKUZojFKnKkSEIsYn+YJJEEs'.
'CBDszjBFT60juGAMQRGEGFffhLbAhxQAV2wAMdNKgKUXBC+/ZA'.
'TbUhwih6QEQiLlEJLPCABgYYADs64ItmCA2Z6OyHBEbQjhfo4g'.
'BI28ACVtAABrjAbDUYwgks0v+3IATBCgD1BCdwwREfaOEKozgn'.
'OpE5gXoAwwMrYhEZXMCFTzAhCYnAAxzqkAe0/eFGgQmpSPlQTZ'.
'o0YhI+qoIQEpQCHlCgAuBa6En60YEXbAABIPOCFP4QhzrYQW43'.
'wcOVrgSHOAAVPlrzhA5SkIAEGMAXCl1oPwZgARisoAWfSAIc8n'.
'DU+NxhFtfYhlizcYxT0OGXekgEJ7oWAAMIoGL/GkUKWuCCITCh'.
'o5TMFx4+oameMKNTp/zlNS+BhQIMoAPMKJEpUFCDUiyhfDYJhG'.
'QnS1nJ5nUmb2iFOw4IhjdQdih8qKxoLzsTQzRiExhQBxxN0g8a'.
'WKQJkLVJHjpBhlz/2Pa2uJ1FGGCxik44LRFWgQGxeHKPNNx2Fm'.
'MAQytIQQl3/YEJZCgDbqebizHAwgugMKSqHKEFaWDmIK4Igt8A'.
'JxQ7jGEdZmRMN9JACTdk4YrpBcA4SHAKNoCBBPHlCTnWIAoF1g'.
'QQjrjCLZExhRlAgbxCiVowKNcTajjjwd4diz1QAYs/9YQf1GiG'.
'hjHDlXtkgRab7QkEpPFgZ1SjjFuBRg3wdRNCMILBApmCFTJB2p'.
'pkdoU9YQcZ+iAJSUTCEqJIAxR5wg9b2CI0AFBGMEBBCUs4mRTH'.
'WMb0zkACB8yPFIaIRCQooQlYrIHDPBkBLLv1CGEAYB9a8EQm3h'.
'OIQqRr/12p8K+MSGGPrRwDH1phRxnugKPITa4n/dAFLRLVE3Hk'.
'Im41aQMszKGVdEBQKISYAgAmsAlONNE7dMiCWhpcylMKrh1akc'.
'YxLNWTEqTCXZhtBY55Ug8zgOAD2OsCqmcSCEmowRla4UApYrsw'.
'QfCCH3d5Dx/sYIZzaOUcsFjjTNxAir72xBh17kk00hCJJrUZDc'.
'rryTBoEQytvGMNmjCTHdwQCwP2BB0nAESNT5OaKVjaO3boxC1m'.
'CAB+HOMVqNjCKloRhmNIryfe8Ad6e4KNLii7DqIIwaZqAWLE0C'.
'Lf+oYFGoxhzAbrghKBrUkbe+GAK/ygXHn5dH57Ag4ziMIDv/8C'.
'QDIOoAny9qkcWjFHGhBQjZEDoC1ZMCJR0NcqZJgCmkSptRqeEV'.
'9pnKMYZOgEGzTrwDGkKg+fwK9WjEGLTZtxGePAxi9CIeehEMIH'.
'mPR4FYZSB1LAFwDVsIUqtpCKtm+BFJ+IRHBm8ocnoKLtbbcafg'.
'KRBFHgve2gOIOFeUKAL7Dd7VkABSb2AAdC5sUQh2DVnQbigHGB'.
'vCYvp0yyf0l2UdgCAoB+ASYynqNDEKJfAx5IL2hArkv/AX4pB0'.
'AJQJElzt9EDmbohtuGoHN4AUIQkp+8SUyxS08I4hMb+IXyf1EL'.
'WNihxr4MxCLIQITl/6IBTCD9UM7niEHs4pgAesCyDnJgnkv8gU'.
'l/6KrtExEIUIEKPogARCEeYQoko7MHuhQCNA+2/rkF8xCVMAWm'.
'EA/NkAzCJ1MCIQxawAMMon/SNBMI038zgQiIYAiI0AiOgAV3Uw'.
'8dIAD7AFcIOFMSYAo4gAU6wALP5AnRJE2XVhPUFIE8clKXMFA5'.
'4E0a0CH08CG+QA2qEYIyJQEV4AoYsAM4QAM8oAAqcCEqsIRNlQ'.
'AZkiEBwAHhhAH18AEiQRI+iAwBAQA7'.
'');
}


function image_kplaylist()
  {
    	image_expireheader();

#	header("Last-Modified: " . date("D, d M Y H:i:s",mktime(date("H"),date("i"),date("s"),date("m"),date("d")-1,date("Y")))) . " GMT"); 
	header("Content-type: image/gif");
    header("Content-length: 4638");
    echo base64_decode(
'R0lGODlh0ABAAPcAALPV57nY6P+tAJVlAJXF3ciIAMHd69qUAG'.
'mszujy+K+vr9Xo8eSaADKPvUlkchR9szNETfH3+nq21F2lylJ5'.
'jeTw9jUkAIuotxJxoiAhH5jG3mBhYdLm8LjJ0uDu9Q5VeVWhyB'.
'Fsm7N5AGpIABqBtYNZALXW54m+2aXN4iNLX4K611M5AmmUqt3s'.
'9Lza6ZW3ySNig8Tf7AtGZHGLmSkcAG6hukaVvay/yjuTwKfO4l'.
'iZuY3A2n6ovpzI3xN4rH241eygAMzj72erzkWYwwgGAAYaI3Kw'.
'0AMTG0SFpoa82Nrq86t0AGKpzZSnsQYmNqHL4fmpAAk1S0iaxA'.
'k6VBBchGiatCSGuJmjqDeRv63L2svi7hN1p3l8fnSy0lOgyJrA'.
'1Mfg7WSjw06exq21uUCWwUszAGytzxFmky48Qq/T5XlSACmIuq'.
'rQ5LrU4aPM4RFjjZDC2xs5SZbD2hsTADs9Pr2BAJ7K4KTM33NO'.
'AIy913N5fDU8Oy+NvCRrj4qNjpLD3PCjAKfD0id1nS2LuwchLh'.
'goMT5SW2iOoUEsAI5gALu9vhMNAB+EtrvS3gpAXBp/slGfxw9f'.
'iAxOb/7+/4CAgP3+/vz9/kBAQO/v7/v9/vn8/c/Pz7+/v/P5+/'.
'r8/fX6/Pj7/fb6/Pf7/d/f34+PjxAQEPP4+/T5/Oz0+dvr9C8w'.
'MJ+fn+31+VBQUPL4++71+ebx9+/2+t7t9Ov0+Onz+M7k76zR5H'.
'BwcNnq8+Hv9ePw9ufy99/u9cjh7dfp8r/c6sPe7NPn8dHm8NDl'.
'8He008/l8Mnh7q3S5anP4xR8sieIuW+w0X5/gActQRR7r2CnzF'.
'5AAPyrALbX5/6sAPioAJTE3RZ9sRZ/tC6Mu2OpzZOYm7jDyD9L'.
'TXyxzS42OhgiJ0yYvkubxVteXh40PzZhd4CwydGOAJaxv+bq7D'.
'KHs8zc5C97oxtcfbXQ3sfLzbS5u2dyeB5vmEhaZJC91AMJDXOS'.
'on2fsdPY26KvtT5thR58rOns7YeZop9sAAAAAP///yH5BAAAAA'.
'AALAAAAADQAEAAAAj/AP8JHEiwoMGDBicpXMiw4UKEECNKnEix'.
'osWLGDNq1Djpn8NJlUKKtESSpMiQDTeqXMmypcuXCD82HEkyk8'.
'1MnnJq0pTTk82SKBXCHEq0qNGNM0+WLGlTpyZQoESJCkWVqlRQ'.
'O31mslRJ6NGvYMMSVUjT0k2nT6NS/XSqk1tTcF3B7XTqUyhRWH'.
'1y9Sq2r9+/EcnWxLkT6tRPiNt2MuUqQoRYr1ihmoyK1atYEVzR'.
'/YTXZ9eOgEOL9gvSrKenhxUzdhwhMipatBLAglWhgi5dFWDtoj'.
'XrVWa6onjuHU28+NhKlk6DCsV2ceNXqGbB3kU7Vy5eLVqk2s69'.
'Ba9csBL0/47QibOn4cbTq+eYfPmnxY9ZSYelK5cH7KmU+FoQjM'.
'OwYrXUUswwHCzgSyqygEeLb52EokkmXa0n4YSBVeLJcvC9Mp8u'.
'vKSCy37BCFOLFr3EEIMBBvyiogHAxNBLEBwc6AEstMRiyiegQA'.
'gahTzyOIkloLzX2iwJVJBLC0osUIwWYMQAjAEuBCANAGkcY8uV'.
'x6RhQgAuAANGLQukMiMqEZwiynk79qhmeiB5EkonEaBSpAceBh'.
'MEGFBOmYYtyKDwRA8aaEAAAYHa8cQXL5wTSBtBBJNKLjU2iOaa'.
'lBr3IyhwzgLLkbhwEEQMv5hgyx09yGEqHDskocIPrP6gQhJ58P'.
'9AgSGGzBBIDLX4IgssrJjioCVpVipsXyBlEoorqMDSoZ2givrE'.
'PDywwEINRnSxDAJCZMMEE9kggAALhvhDwwDcXOACGBykosssrn'.
'yiCbDDxkusJZp0wgossvgyTC+/SGPLEwQkUYUDe3CTjw4giCGF'.
'FEM0LAU4SIzjjwUMlIHGBSYAE4QvHtBS5rvByivyUJUYG0ECvP'.
'hSSwwupIGCBidIIAQ59IxQRhzr8DGIMlb0vEY6fRThzwoCJOKP'.
'Ay+k4YIxC8iSwMfwjiw1TCDVi0ouuAQBjDRs9ADHD8tMgEQRRJ'.
'iDyBEhPKD22lt8QI8/aghQhz/fsCAHGwHEEEwLu0D/HfLUgGc0'.
'SSaiuLJLKsUAYwIyMBOTDSQ4sONPGQLQQA8Gaz+QDAaS+OPPAN'.
'MAMoc/FHRTTQ4mxMBBC0+7G3XgsGPU5imseBBMDCbkQIAKRkwg'.
'BR9bOOFPHVAQUYQPaycTggz+ECGCAAJA408KOvwAhxsAALN665'.
'PG7n1Fl5qSQCrGBIDM7maAQIYyyVAhrgAH+OOEM2o7E8IU/ixS'.
'APT9+EMIEtmQwA6ekD0OyIIWrgiFJyL0vQZCpE2feEUuOPALW2'.
'hABWbwAg4Y8YAtRMEf/RCACPwxBbX54AzNENcBoHcAIvgDBjZ4'.
'BjEGCAC98YIWpjgTAx3IQ4KEjxap6AUA/3qQhGWAAAskUNsb/D'.
'EHQBTNHzJ4gA8iQQh/IAII0IOCBfxRhD7EcIZuSN0CcoGKTohC'.
'Rz1Mo0dKFooI6CIYv8gBHLoAAhwkUYrMKwH0RuCPD/iACkfwBz'.
'SoAb2iLQIaGYChDOGAggD0whe6YEUncrRDNTawap2YRQu0AAAN'.
'/OAZZOCg2kJwBCIwAHpl6KPb4FZI6EVjGokoAgyZIIE/IMMFWl'.
'ACLGJxCpD9zZKBu5ThfAEMNuxgGWIYxNqc0TloQI8aNCCh5wbQ'.
'SugVIJpTEEQ4hKACDRzDAMNgXQQU+Dpgfm9woYhFLoQRADt8Eg'.
'fXWBsGqrg/ATBgEZ5zXjUBwf9Hf0ThDenwwjJO8AQT8KMUnkuo'.
'Qv1RCgUUBBMbYOgmMrIJVSz0opQYCCk8t4qIjMKilxiFRjmKkY'.
'9edKEZNYgCEHpSzzX0IBttqedUMdGCTMITp0DFJgFQjS6IYQ3J'.
'+8DkChm//JmjmiIY3RE+gAFGkGECxLClC5qwBzpY9RJYzSpWa0'.
'qQVVyiFZjIyChaodWyYrWjAtnEViVyi0vcgiBqvQRXK4IJsppV'.
'q6QIa0E4cdeyznUgXu0rVlvx139YqBO0UEIMkHECIZDhjh1M4R'.
'KIKq5TFhIIK/DcFM6AvDVIgZsaSEMTOiBO1wVrFJwwCCdEipFN'.
'FNYgmOCEXl07kdj/6nUgtGUJaiey2pf0ViKV0IQrYBEMFzzhBx'.
'NoQPIi8b5CigARTizkEkZHiA9sIRlqa4AXjLCDL3iDoVco4xkr'.
'uQqEXkKvmLgEQx1qkVt4LqUI2UQG/JGBTbjXH/A9iHzpy9X75j'.
'cj5fWHKm77UPW+dCXpJekDLSGKCOSiGNLQgE+twDb8UbOQ1IjG'.
'ZaXnD0eEgH5qIwEOJiABAtiCqhvwWC/L+Q9MtDW1A+HrWy8yVr'.
'BKhBSXIMU/akxgmOaYIDxmyYsjImOXqPUWPbapJULBihYYIw1w'.
'MMMQIHsGJmKxmtYcXRGYit21MWII3OwBABqBj22gIodoLMgmZE'.
'uQ2L5W/yKcgLFHfxvniaCWtTGWs0rWnOQ2c+LNGHGzRAb3iVmk'.
'IgZsOEE2cLA2HzAvblgWwABcSAhHUOHDmVNGOMxwAhRkwaL+eM'.
'eKQ7aKmaIX1HqeSETxG5FNILQUm1j1f9X8aq7KeiUKMDVCMIFq'.
'liTYH2iNSSY6kQBf/MINKkju2khJhBVGeov+owEhJLGFzA1CDE'.
'aAAxt+0QE9aMOMC/zbKiiB5x1TIth0JUVe4UyJ1GJC3X0mCCfa'.
'3WZ4s2TcgDY3ulUyCkroODCeMAVxXeBOEPChfkIlGpZXWAAXEu'.
'GaRzhD5rDhhS5UwxbA8AUsIqAAZnicGZQIucj3LZB+s5eiIv9P'.
'ucjXrWaVq5zl9f43rslNEQW4POUkPwgmzg1c4epiGAHQADG8oM'.
'zI+qOerQQCDZyIByYKgI8fyBwfQEAMAqQhBrhIABdkmtANPHS+'.
'/ji5RTjBdV3HuOwC7nErPDfjjZSavvEeCCXQ7vWI8NpzMj9IJU'.
'Dh4FqYQOhEH+URLDCNwrey6c8THQ0EsAR/gvgBU696GsCQClp0'.
'wg8fvznMB7JzsV/E5jcXebkFAvrQ09wg6m6JzeNOEFKY3t+sF0'.
'jngct3DwTh78QwuNrOUIQSPLeVLfQHHqC3BD0CgQhHwJzaKC55'.
'MNxAD37QRCUnsgl/Bzrksbe55yWi/TZj/96UyLf/RVyf737n/S'.
'AMjgUvgtDJ3GNhlI6IJiJamVlxadjwAkCEPyKxNmxAwuJp0Aig'.
'pgjTZ3e9ZhG3BhGuxlCjp4CvhmcJuBG5lnb35jnntWvqBWwRwW'.
'CvIAta8HcSMAF21EFvIDR6RHxcFEjOVkhGIwNddm1d8AdXpw5j'.
'4A4LFGh/lhF1JhGoFXsF0YN7lWoaAYQtsWa8lW8/wmQeaAI98A'.
'NMMAQUtjlCc1QCAASj8wGO4A+JUE0N5wTV9gBrIAbLAAe2EANX'.
'QAfisA+VgBEKcAkb4INw1QqEJRGUcAmzFhF1mF+bIIfiJxEudg'.
'k5F2gbcAnbJ29fFXdJ2GRaIA12oAII/yAG2KBEE1NIfOQIW+A+'.
'CtdK0SRxYLhpO4AM7cANDEWAv6Rza1cKQoiHeNdqFkVTFVFRAs'.
'ZVc+cP58eG5gWHEbFS/mBjpshQgegRmfAJOhUEAeAGJ2AEdcQI'.
'zsA8Wyg3XHQGykMPi3BllOgPkoBdyiAFCHACOfALwTAG9yAKLM'.
'ZbDUh9fWhbF4GOcNWHtZWKQ+iOcFWOA0FoqCALteACOfAHEpAN'.
'4YANW1BFK6RFfYQ8PpBCdYBU/oQ82SgESeAGWRBRquAO40h9oN'.
'ZSGaBnpFAKB4aB/nCBLbZ2MlUKtSh7INlSIllgZTeSsChTFzkR'.
'c1dfDxSM9TgMFXRBYUMG8f8wMdMgACXgT8qXDJ0zAtV0T8kHhp'.
'+VBE8QAPAgYOiQCaUIEZzAUiapZysFax4VURvAWibFdSO5YxXZ'.
'Uue3lTJFCUkWlVyHin6YkaoAj4NDO7YDDADwBF+DAF4AA4IkAO'.
'ZABPTwBo9XZTQABQwQXfm3fw8wCNuElAEQBC2ACqfglOaURoTG'.
'CrmwAGAQAGwAMxIQBnHgD8+zRZKAPGzzQUtAA84EPS1oDQ0gBm'.
'aAmFrQArPQCZ7wlI85NYT2ChWgBEHwCwCAAgRwAlVQCnPwRM2Q'.
'NpmTDJEQBS4EQtBjDvKjDzgAAgPlBgGgBZUHm2s4mw5EaBEACy'.
'3AAWDQMi9zCP7/MAIMoJd98AiZozZbEAKRwDyLsELQ5A+CMARQ'.
'xUiJWZ3Sh53ZaTK04AEqwzIAgAwzUAr9kErkYANk0ABWAFmakw'.
'xbwDyU83Qv5AUI8APVwAYuEASVZwr5qZ/nRDimgAoV0AIL8Cmh'.
'cgHysALf4ABVYAbPAAJSgAMKyqAhIDwhNEIpMAFdkAQ9cAy/UA'.
'wtgEMd6qGxcymdEAsJkAupoCS9AAyBcAEzUA88kAdJ8ANdgADP'.
'4AUx2gBrwAgk8AjuM41A4A+FEAYq8AdhpDoHZAqgcJ1ECjuXcg'.
'pxAgt04gueYgCNkAVZkAM5YAcaAAdVagRCMAFeEA5DQAY4kA4p'.
'IEjT/2AB9FAFO9ADtuACvbAAHvCaQ/qmgPMjmvAJphALtLApSL'.
'IAwvApUBIAAHAMfUoAO6ACEmAECMAEEzABIIAEhcCZeFAKLNAD'.
'yJAxtaAEZNQJmaqpUtMmotAJrqAhu1ABHqAdvlCqTHIiqGoLKN'.
'ADrFqlEkAMXWAGFFAIc4AHEGAPyAAAv2AMewMLryCsbkqsxVoy'.
'QYKssfAay5oLsuAhIDIMWgAq04oCfloNqHIC5XAIDuAAM/ACJv'.
'ALYCAMSuABT3MKN8iutFkymiAK72EK8TEfRmIfstACuBAMtVAi'.
'v4Cqe5IDbvAniPICgdAOBtALw6ArsIAKCfSwEDsypZEJT/vBHM'.
'5xsbAxHRXQIb7gscZwIiE7JQAAANLgAgYABo2CCy2gCwtiRhAy'.
'sxFrGmrRHDnLGhHACqFKrx5CqiPSJMDQIi8SI6nACxWQAKxQJp'.
'Qkte2KHE2RFlPBHIiRGPD6GvTRrF0bIsJQILiAIAqStuUBMmxL'.
'syAREoOBFjuRuBSbIfJ6txubCi2QILlBC6jAIOYxkYNLKQyhFE'.
'yxFUxxs21hsbEgH7ExG7rBG6yAGaZQHsGRZpkrMjJxEp9huMpB'.
'saHbGJDBCpbhGJpRHnchHAX4urTJEAIhGKaBGsyhGqu7GXeRF1'.
'uBEsILTMb7tnBrFXiRF1rBFZ8RvZQSEAA7'.
'');
  }

function image_link()
{
 	image_expireheader();

  header("Content-type: image/gif");
  header("Content-length: 311");
  echo base64_decode(
'R0lGODlhCgAKANX/APn28ffz7fHp3+7j1uvf0Onby+jayOfXxu'.
'XUwOLYzOLQut/Ls9/Ksd3HrNrSydS5mdS4l9G0kdCzj8+wi8ys'.
'hsvHw8rHw7+WZb6WZLujhrmTZbaHT7KBRrB+Qqt7P6CPfI5mNY'.
'B5cIBbL3VUK3RTK21cSVg/IVZNQFA5Hko+L0gzG0Y7LS8iESwg'.
'EP///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'.
'AAAAAAAAAAAAAAAAAAAAAAACH/C0FET0JFOklSMS4wAt7tACH5'.
'BAEAAC4ALAAAAAAKAAoAAAZCQJdwSHQBBIcGYzAMEAqIx0WTEB'.
'oWCAWlI/oIJRNIZENSpYQYjgeEarVWwszIxHK3QkJHyd46WYYV'.
'ISsrIX9Fhy5BADs='.
'');
}
 
function image_root()
{
	 	image_expireheader();

	  header("Content-type: image/gif");
    header("Content-length: 109");
    echo base64_decode(
'R0lGODlhEgALAKIAAP///8zMzJmZmWZmZgAAAAAAAAAAAAAAAC'.
'H5BAAAAAAALAAAAAASAAsAAAMyCLrcPjDKyEa4ON9B1HCOwHla'.
'BgliB3yChgZtSk6DeMprAC7wCNi0iUpBKBqPxp2SkQAAOw=='.
'');
}

function image_cdback()
{
   	image_expireheader();

  header("Content-type: image/gif");
   header("Content-length: 125");
    echo base64_decode(
'R0lGODlhDwANAKIAAP//////zP//mf/MmczMZpmZAAAAAAAAAC'.
'H5BAAAAAAALAAAAAAPAA0AAANCCFDMphAWEIIQ5cVFuidNs1Rk'.
'WQmEUViXcb3CkK6t4cb4bNn8NcS6l+tHRKlYgltRdhTybAPmao'.
'mLSj/Yz+PJ5SYAADs='.
'');
}

function image_album() 
{
   	image_expireheader();

	header("Content-type: image/gif");
    header("Content-length: 286");

	    echo base64_decode(
'R0lGODlhEgANAMQAAKZlCvvu1/eon/zQb/7LUvTKxr56Bv/7+/'.
'zotv+6J//2429IC/7ahvK8YOuZA9OGAORyUc+zevHh2finDpx4'.
'MubHtOyJTP/BPOZLM7o9BN+jRPrv7bSXW8ePTsWMP////yH5BA'.
'AAAAAALAAAAAASAA0AAAWP4Cd+R2BK0naMrCg1AxIoiqm0YmU4'.
'FzPTtcBqVADsejJgQDbadB5QQoRCiSAQDMJgJAE4vp1FJrPgDB'.
'KTyahidCQoCwhmQSE4DAYi4DG5NBaACxp3ABRcEH0EDAwREQ0J'.
'DwAAESMHAhZai4sXEw6FGywblw2aAwQTDx4SOJYQFg2wGhoCoD'.
'giGwUCugUqOCEAOw=='.
'');
 }

  function image_login() 
  {
	image_expireheader();
	header("Content-type: image/jpg");
    header("Content-length: 37698");
    echo base64_decode(
'/9j/4AAQSkZJRgABAgEASABIAAD/7RBSUGhvdG9zaG9wIDMuMA'.
'A4QklNA+0KUmVzb2x1dGlvbgAAAAAQAEgAAAACAAIASAAAAAIA'.
'AjhCSU0EDRhGWCBHbG9iYWwgTGlnaHRpbmcgQW5nbGUAAAAABA'.
'AAAHg4QklNBBkSRlggR2xvYmFsIEFsdGl0dWRlAAAAAAQAAAAe'.
'OEJJTQPzC1ByaW50IEZsYWdzAAAACQAAAAAAAAAAAQA4QklNBA'.
'oOQ29weXJpZ2h0IEZsYWcAAAAAAQAAOEJJTScQFEphcGFuZXNl'.
'IFByaW50IEZsYWdzAAAAAAoAAQAAAAAAAAACOEJJTQP1F0NvbG'.
'9yIEhhbGZ0b25lIFNldHRpbmdzAAAASAAvZmYAAQBsZmYABgAA'.
'AAAAAQAvZmYAAQChmZoABgAAAAAAAQAyAAAAAQBaAAAABgAAAA'.
'AAAQA1AAAAAQAtAAAABgAAAAAAAThCSU0D+BdDb2xvciBUcmFu'.
'c2ZlciBTZXR0aW5ncwAAAHAAAP////////////////////////'.
'////8D6AAAAAD/////////////////////////////A+gAAAAA'.
'/////////////////////////////wPoAAAAAP////////////'.
'////////////////8D6AAAOEJJTQQAC0xheWVyIFN0YXRlAAAA'.
'AgABOEJJTQQCDExheWVyIEdyb3VwcwAAAAAEAAAAADhCSU0ECA'.
'ZHdWlkZXMAAAAAEAAAAAEAAAJAAAACQAAAAAA4QklNBB4NVVJM'.
'IG92ZXJyaWRlcwAAAAQAAAAAOEJJTQQaBlNsaWNlcwAAAAB1AA'.
'AABgAAAAAAAAAAAAABRwAAAlgAAAAKAFUAbgB0AGkAdABsAGUA'.
'ZAAtADEAAAABAAAAAAAAAAAAAAAAAAAAAAAAAAEAAAAAAAAAAA'.
'AAAlgAAAFHAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'.
'AAAAADhCSU0EERFJQ0MgVW50YWdnZWQgRmxhZwAAAAEBADhCSU'.
'0EFBdMYXllciBJRCBHZW5lcmF0b3IgQmFzZQAAAAQAAAACOEJJ'.
'TQQMFU5ldyBXaW5kb3dzIFRodW1ibmFpbAAADHUAAAABAAAAcA'.
'AAAD0AAAFQAABQEAAADFkAGAAB/9j/4AAQSkZJRgABAgEASABI'.
'AAD/7gAOQWRvYmUAZIAAAAAB/9sAhAAMCAgICQgMCQkMEQsKCx'.
'EVDwwMDxUYExMVExMYEQwMDAwMDBEMDAwMDAwMDAwMDAwMDAwM'.
'DAwMDAwMDAwMDAwMAQ0LCw0ODRAODhAUDg4OFBQODg4OFBEMDA'.
'wMDBERDAwMDAwMEQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwM'.
'DAz/wAARCAA9AHADASIAAhEBAxEB/90ABAAH/8QBPwAAAQUBAQ'.
'EBAQEAAAAAAAAAAwABAgQFBgcICQoLAQABBQEBAQEBAQAAAAAA'.
'AAABAAIDBAUGBwgJCgsQAAEEAQMCBAIFBwYIBQMMMwEAAhEDBC'.
'ESMQVBUWETInGBMgYUkaGxQiMkFVLBYjM0coLRQwclklPw4fFj'.
'czUWorKDJkSTVGRFwqN0NhfSVeJl8rOEw9N14/NGJ5SkhbSVxN'.
'Tk9KW1xdXl9VZmdoaWprbG1ub2N0dXZ3eHl6e3x9fn9xEAAgIB'.
'AgQEAwQFBgcHBgU1AQACEQMhMRIEQVFhcSITBTKBkRShsUIjwV'.
'LR8DMkYuFygpJDUxVjczTxJQYWorKDByY1wtJEk1SjF2RFVTZ0'.
'ZeLys4TD03Xj80aUpIW0lcTU5PSltcXV5fVWZnaGlqa2xtbm9i'.
'c3R1dnd4eXp7fH/9oADAMBAAIRAxEAPwD1K62ump91rttdbS97'.
'vBrRuc5clgf4wvtVIzLelZFWC4Fzb2vY9waCW77Md5ot/N/wPr'.
'/8HvVn/GB1B9HR29OoJGR1R/oBwMbaW/pc2xxH5n2drq3/APGr'.
'in9Lqa6amsO2HF9NgB7WBx2OZ/W+gpIcvkyi4TjCj+mOIS/e2l'.
'BbLLCB9cZS0/QNEf8ANk97Z9d/q9VTZbbdZT6bC8+rRcwcS1u8'.
'1envfubsr3+o9ed9NzcSnCxcPqPTLzXRQ1phrcip5cN9l217bq'.
'2Ossfv2/of+PV3G6fd1DZguvt22PDgDY6SQI3OP03taz+wp9Q+'.
'rY6fV+0KMwuxqmOtl9TA4iHvaf1b7L9JjPzt+z1ETy+WGkzAy/'.
'qGW3+HwKjmxz1hxCP9cR3/AMBv9LxunZ3qfYs59NDGlxxy8hoj'.
'ndTl+uz/ADmf9cVnJqxa67Tk2NurZXvFuMPsluxv0vU9J1mHdU'.
'xv+F9H0lgfUr6xse/K6d1OLXZNbn13FhfZIh1mO91TH2eh6LN3'.
'82tSjp/RMzrGDj4+osyGuNLXP2baWuyntfj2O+g70mf4L01GSv'.
'G1u/8AU/6utw2N6xe5zsjLpHp1vDQ6ut59UMtsaN11+z0vVc76'.
'Hv8ASXTpJIE2hSSSSSlJJJJKUkkkkp//0B/Xbrd/UPrS3HwX+7'.
'Ht+w0O0cG7P0vVLvTduZ+dXjv/APCyP+YBsY0N4dGp0jVbf1jr'.
'wavrJTjY2Ox99mPZk5Vj2yKtz/SxnNte13ptzbX5FeRX/wAFXZ'.
'6X856kaMHHurHq1htwj1BU4tbr9FzW2fR9v71at8vmxw+YGxQs'.
'fy/enJhy45y2Io9D/L+qh6S6nHruvdcW2MaG1xo6XRWGVNs/nP'.
'pOWL9ceo2P6faYFVdzmUU0N4bXy6P3v0eOz1HLo/2MxpJZc7e0'.
'yGvZJ48i3/qVzf146H1JmJVl1MbZg4jHWX2h7QRu211n0nllj2'.
'bW/mKTLlxGM5Rlc5DhFiqBY8ePIDCJFRibNF5Xouff0/quNmY7'.
'/Tcx8FxAI2OHp3AtcWsf+jd9B69L+orXdR6jk9ScAaccFtbm1e'.
'k03W62fROyx9VH/tz9NeX9KLWZLXvY20NDttLnFnqFw2NrY9gP'.
'6R2/2L3f6u9KHSOjY2Dta21jd1+zg2v99xB/Ob6jvZ/IVBt9F+'.
'sddwejDHfmh4Zk2ekHsAIYY3epbq13pt/kb0LD+tHSMzJzKK7d'.
'jMEsbZkWbW0uLya2+jaXe79I30/+E/wPqIf1k6NkdVd070hW6r'.
'Gy2W5NdvDqoLbAPa/e7+QsjK+peQ79sY+IaqMXMZjfYmyTtdjn'.
'e6u1se1r3t/nd9n76cOGtd2KRycWgBj/AOg/9+7L/rNituvx24'.
'uXZdjevurZSS5wxxVudU3dusbkfaGNxNv8/wDpf9ErOB1rAz7L'.
'KqbG763ENYX1lz2tDd9zK6rLH+lvd6e6xrP9Iz9C+q2zFw/q9m'.
'WdU+3dSpxsPErxLMV2Pjvc4PFrn232vsLMd1Tnutssts/nH2fp'.
'FkdDxb+l9fopfbTSa/UbbSHG5zqmtf7qnPpp2bXU/wCn+0/8Ah'.
'Q7p4p2PTpf1p7Y9U6YMdmUcugY9h2suNjNjiJlrLN2x30Uam+n'.
'IqF1FjbanTtsYQ5pg7TDm+36S87prNFPS25lmPdmYLrxdiZAe6'.
'l4ueW1epfj031Oymv/AMHsu/6C3fqpm4mJidQvyHVY7HX+rdXU'.
'0troe932ZuAWu2u+2Mtr9N9ddH85s/nUiB0KomROorR6l72MEv'.
'cGgkNBJgS47GN/tPdtUl5V9ev8YPTndRs6QenftGvCeRaLbbK2'.
'NtZubaG1Y8eq+n/T2P8A0Vv9HZ/2ou636ofXbpvXMFkzi3scyl'.
'1Nz95D3D9Cz17Pdd6zf5qx/wCls/wn6X+dC+n/0en+u3RcmqjK'.
'+svSsy7G6hjUN9SlsOpurpLrPTtodXZus/S2en+Z/wAGuCwPrB'.
'1qq47sq2suJOzMZur1O5zWW2NY+v8A6ite0vYyxjq3jcx4LXNP'.
'BB0IXkHXep9e6B1+/pj7G2UUuL8X1mavot91P6b9G6z0v6Pb/w'.
'ALQkqrdjE+tmbXW37XhCwHRj8ezaZ3aV+lkB39bf6npLXr+s3R'.
'H+pVbksxLTpZTnVup1dofUZcKmWsd+ftt/trkqfrbafbZg1kaE'.
'ljyGyO/p/RWjldXxOv4rmZDbHZm1uPQ24CxrC8n9PV7W7LNzvp'.
'7vV/RoqA8baXTOg0M+vGPj0V0uwbshuTjGoi2r0aWvv9j3Oscz'.
'9ap2r0T6zdUu6fgsZi/wBMzLG0Y2hdtc76dzmD6TKa91j1j/UL'.
'6sZPSqrMrOe03S+mmlhlrGtefWsd+b691rPzPoV/4T9ItT6ydD'.
'yer/YxjXNodj2Oc+xwJIa9jqnOqDdv6b3ez3Ia1IxriqXBxfLx'.
'8P6vj/qcfzKn0GtWOKvm4eL18P8AW4XmOk9R6vmdSpOTnW243S'.
'3/AK7sc0BpafSqpyX17WX33Pd6mT/N4uL/AOeu3xOpY2WXCrd7'.
'GNsMt0LXOtrbsc3c233Y1n81v/kfTXOdA+rnUendYNeVWx+Eyh'.
'tbchjoFno2NtwfVone3Ix/3/oWVrpbun4t2S3KeHC1o2kse9ge'.
'0btrL2VvYzIYze/023ts9P1HpDi4Y8RuX6R03vh9PD+hL/J/+O'.
'/rvcWirlQoXp5b/wCN+80L+rdIzsZ+Pe81U2sO6xxa1oja4Vus'.
'3OZXkO/7i3fp/ZZ+hUf2Vg/YbHtt6g5rGv3D7Xk+rodztpfeHN'.
'e3b7Nrles6XhvpbSBZWxjWVt9K2yo7Kw5tTC+l9b3Mb6j/AM5J'.
'3SsRxtM2tbez031sutYwAx/NU12Nqof7f5ylldn+ekucpvT+jO'.
'v+zbsut2ZS+Kn5Dw1oyGllltNVt/8ASvbb+lxmWWV2X3Pf/PIg'.
'6DhdQwXU2uyj6WY3Jxn5VhtfTdj7Kqzjvsda70Gupd/OP/S+rk'.
'f6ZaX7LxJok2uGKAK2uutc07TuY62t1mzIexw3Msv9R6sV1sqa'.
'WsEAuc4/FxL3/wDSckp8X+sf1L6nifWPLyBRZfjZtj7YpsbX/P'.
'O3OoPqur31Oe7b9L/wRdH9TvqU/Lx7snqTHY2Nk202jHrMAjHd'.
'vpqDo3Or3s3W3fn/APaf/TLuOsdB6V1plLOpUC8Y9gtqMlpBH0'.
'm7mFu6qxvttq/m7Ffa1rGhjAGtaIa0aAAdgjab0f/S9VXM/wCM'.
'DomD1L6v5OXkDbk9MptyMa0GCC1u91Lv+Cv9NjbF0yzvrF+zP2'.
'Jmftbd+z/T/WPT37tsjj0P0v8Ar+k/RpKfFKMXIEWejYWjg1um'.
'QNT7XS9aV3UD0445ysS2izEsFxLxBsb7X+nrRV7bNv8AOb7/AP'.
'g1vY7fq67LZ+zrM+vUbPWZU8f8HG62nL2f11o5w6efrLjHqpub'.
'iB7Za4PNDrZ/QuyX2uZ6TPV/N2XU/wDoN6iS4Pa4VXo4lNRG0s'.
'ra0jzA93CMkkktUkkkkpSSSSSlJJJJKUkkkkp//9kAOEJJTQQh'.
'GlZlcnNpb24gY29tcGF0aWJpbGl0eSBpbmZvAAAAAFUAAAABAQ'.
'AAAA8AQQBkAG8AYgBlACAAUABoAG8AdABvAHMAaABvAHAAAAAT'.
'AEEAZABvAGIAZQAgAFAAaABvAHQAbwBzAGgAbwBwACAANgAuAD'.
'AAAAABADhCSU0EBgxKUEVHIFF1YWxpdHkAAAAABwADAQEAAwEA'.
'/+4AJkFkb2JlAGQAAAAAAQMAFQQDBgoNAAAAAAAAAAAAAAAAAA'.
'AAAP/bAIQACgcHBwgHCggICg8KCAoPEg0KCg0SFBAQEhAQFBEM'.
'DAwMDAwRDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAELDA'.
'wVExUiGBgiFA4ODhQUDg4ODhQRDAwMDAwREQwMDAwMDBEMDAwM'.
'DAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwM/8IAEQgBRwJYAwERAA'.
'IRAQMRAf/EAPgAAQACAwEBAAAAAAAAAAAAAAAEBQECAwYHAQEB'.
'AQEBAQEAAAAAAAAAAAAAAQIDBAUGEAACAgIBAwIGAQUAAwEAAA'.
'ABAgADEQQSEBMFICFAUGAxIhQwQTIjMxVwkCQ0EQABAgIECgYI'.
'AwgBAwUAAAABAAIRITFBEgPwUWFxgZGhwSIyECCx0eFC8VJikh'.
'MjMwQwUHJAgqKywuJDFNJgUyTyg5M0FRIAAAUBBgUFAAAAAAAA'.
'AAAAAGDwAREhEJBBUWFxcIAxocEgoJHhAhMBAAIBAgQFBAMBAQ'.
'EBAAAAAQARITFBEFFhcSCBkaGxMFDwwUDR4fFgcID/2gAMAwED'.
'AhEDEQAAAfZgAAAAAAA+ZF8d1hkKzjZNJZ3jsuI7LwIsupjU16'.
'Zj6zzxfSYXc0AAAAAAAAAAAAAAAAAAAAAAAAAAOR8+PRzUSzFk'.
'g1BGI8K6pMJx2moGdRSs1nazZPbx2UAAAAAAAAAAAAAAAAAAAA'.
'AQyETySZAABXni7LJdqlR3MxhYtneOpk0WvFlrHco5ZusWUs9c'.
'gAAAAAAAAAAAAAAAAAAAAA8TFUvbj2xvFhrNnczKmkkyUB46zm'.
'SjepROjuu5Yyd1incjEU6lfNQdY91LkyAAAAAAAAAAAAAAAAAA'.
'AAACMfOyf4fbY+fruaazXerjJxrnvEfrzkdMVVzYmq6WaEc6p2'.
'LCpctpHI4TXKzonIhktPTKAAAAAAAAAAAAAAAAAAAAAAPMx5/t'.
'zxy7d+e+nLfDeLHyeqVy1z1O+dVXu8cT0cdDdcnVJRg51LJ8SS'.
'lmua7nC5lJFufazXQAAAAAAAAAAAAAAAAAAAAAAweBMezz9tZx'.
'Lzs1l0zrXnuVi9+Han78dc2Vm7tYNyRLGueB6Gr2I5FmoksFIe'.
'pxT1SXi5AAAAAAAAAAAAAAAAAAAAAAKiXxfTFl6uG641nW4GTW'.
'zNb51sm+N9uPaKRJYsueeuUcSfZ6wnZsea4LFs0srU9odQAAAA'.
'AAAAAAAAAAAAAAAAAAeMlqvV57HpMpjWcayhZitpemddM2y4du'.
'2dbRWejlpZrjfm/P15xuX9no5Y0uudQ62ua89pZkAAAAAAAAAA'.
'AAAAAAAAAAAA4nzmrP1+edje8a6mtzrZH6csVvL1zvtjVn5+0b'.
'pmdy3w3mF0xBmvO+feV1JNl+1rnWU7JzWJc+4AAAAAAAAAAAAA'.
'AAAAAAAAABQS+W7c7rpiH34yMdNdZ2jaOe87GYxZO4d7Hj0idM'.
'yMazFd6OVNy6VHHeDJk9dLg4VHNZJ9eqAAAAAAAAAAAAAAAAAA'.
'AAAAMHhCP7PPM+f7unflIs17cufTjmuO8dsa1slY6WPn7b5uxH'.
'6ZidOfHefO+X0R+esA2PVlvnUCodnBL5LdQAAAAAAAAAAAAAAA'.
'AAAAAAK2PE9cvRwgeD2Xnt80zl16Z3y7+fTtxWZlylhw79ca5a'.
'lpw6UXs8/Dpzxz6ed8no0zRqbk621xrka2Ln25uAAAAAAAAAAA'.
'AAAAAAAAAAAeRlqfZ5q7l0zjV97fNmzbNWBZtEnn0kc+k/j0id'.
'cRunOL1561w4dqHzdsRgGTJ6VY8YJ1nqzIANEG66mqbrkGDU2B'.
'gyYMmQAAAAAAAAAAAco+caSfd5KTweu49PGy78smYyK3jJvmz+'.
'Pbti1Xq4aazqCt83oqeHTAMGToT6zZ0l9RFwADB4Pr4p2enqce'.
'ih3wo98fYcfbYKKQrSQaEAtynPYEgAAAAAAAAAAAFFHkO/LXeY'.
'Xm7+l9vm6azlcoNNZ2TJtNSeXTlvBddTaXRPP+X0xeWtULsYOh'.
'JOizU9yZABqeD6+HnVjjrX75YT1PH3cN8e01Nz185ctcL/AB3w'.
'tRvhhOqzJu4z1ptceSXue9fedXrnk1S9x3lNAAAVxYGQACmlr+'.
'uK/N4ln6uGmpkxZlNbnZSYrea1TvnfLWcxyl854/TyzcJhdzBN'.
'XY2T2iWagAanhOviZ7bpvNRenn9Rx9tD18m2enbHovbjyHXx+j'.
'5e2NrlUXMzHbclL6OaqbmtL2PI9fJ1x6J2ekTfHmz7LHp6gAwe'.
'dPGaerj1UZABqVxTrvqbx2NtZ5bzp0xy3jnvAHSa1s6TWE0sj8'.
'u3nfL1xLoDcyXBtLvZ7gyAAanguvhm57+kx3ga5eb6eb1HH2ef'.
'6+XbPT2mPRBuPH9fJ6Hl67Ka8rvhzMJ3ufV8/T5/p56+z1XP0+'.
'P6+O75er0s6VNxU3Pp89ewBggGsaLsSKlJkAA8kRVsOmI2NTSQ'.
'ZMxtZp0zw3jOpz3nlrPXOtap+PSn8/XBoYNjYnkhfQSegoAAan'.
'g+vimY7ewz3qtcvK9PN6jj7YWsU+vPYzeiQGvTY72x5Dfn0sys'.
'Q9Jz9EDfnqrn2XP1eX3w0uZksS5znt63PWSDBASGvn1iE49DEy'.
'piAAeIjiXWmTTU72dDEb5uF2joaGLNtTnvPmpqs5a5GgMncmnO'.
'X6HZ1AABgpgXJyKMtSUUqc1wkhbgyUxSJOUXBVpGPTrAISRlJc'.
'rHLkwV8lTb4y3jJoZJNvtJbhJqAaHzOPQkis11gdxZitgYOsc1'.
'2juaHI8YQAZOxLLnOvW6zkAAGAgLkAAAAGh5kjEg9EVJFKosTg'.
'djmSiYXRQJLPnl1Ek0Bk73VjHrllsWgKaPHp6y3QwZMHU3M0Os'.
'amK3jFmsvc1KOvORHMm8ux76LTUAwYTWsxrZys6S9JdlAAAAoS'.
'zMHQrS5IJXlyV51MEkqS5PI2RktWvDnGOxNtgkteB7iXz6emZv'.
'yjjxdzYS2S63NRZYTUxZhsdDJsZrCdowFyYKAoSOWkrG/fb59K'.
'A5pC6cqvOrDeK/pyq/J6rzri7x02UAAADyhCJhFJJkhk0ryAfR'.
'jyJyOp7E8zVOloviDnG6iwqUtYnsJvz9zczPszmUMUZV3PWM3G'.
'huubbSXss9ZRsbGTQV1k5W848wtYk+akZvvd4AwQenLyvXhx+d'.
'7M/X+Y+R9PXefU+vja8e+ygAAAYMmAAAZMAyCpLYwUqa14FriS'.
'CwWSQkzHonSQ5+hTIMA+YnAkS92drnonNOVdl1Wzl7tWBINTqY'.
'OZ5taiJUt0nrdQDRPN+rx1PzvZz1O/m7zfD6q39H8X2fPvLx0A'.
'yAYAAAMgwAAAAZBgqko7fJr1JRqcY9C6X7nbJkAA8CVBkydyWS'.
'bOKdIWck0l6N9lnEw6R3SBVHLFPUl/YBE1z8b6/FY/lf0GmpG9'.
'fCN9v5HpefePw9HdcmC9BAK8Ec9CZKs5l6CuKI9EQjmSSyPMnc'.
'9AZBgqCqtpjU2Wxmrpm6ZyAADzEtZYOdcU2l3JlYMyDqT7YCVi'.
'xY0Oy2MYiOvuLmRQwVXXz+U469F+c+zWerlTfX+fb/AEPB6vye'.
'6lzvsSSIX4K8rwSDiak8gl+AUJeleQwXRXncmAAwVFVltfLOtt'.
'85tUyAAARZfOGTpXJOpubAwDus6Oyebtj3MOIa9M6m1Nj12s5B'.
'gpe/m8lzt18H61X9XwX3w/p0H6z8/wC04emHjrdmCsIx2BYmSs'.
'OZoWBXmxYHMpD0BuVZyL8gHclgAGDwh5g96elMgAAAwUMePWWd'.
'CYdakGybmFwdDMQrJJXFMdM76HtGbHUAwlN28/nfD6eHs8+vbh'.
'f/AJX9BTfd+V6T1crrh6MqMGTBkwZMAAGTAMmAZMGTAMgAAwVJ'.
'bGQAAAAYPmkRq2NzobGyyDsdzsdzumVqSCnDO/Qyen3nIBhK/p'.
'y8pw63fr8vDWaLGpPyvoX31vBeef07KAAAAAAAAAAAAAAAAAAA'.
'AAPIx5mhsZMgG5uZJdXGbCrlEvOu9npdZyADBzuedm8oq+vCi4'.
'd/S9edhz67KAAAAAAAAAAAAAAAAAAAAAIR88jjXQ3NjJk3Mrqb'.
'HWO9nSPXkPOrTeQABgAGlzpW8u8uQAAAAAAAAAAAAAAAAAAAAA'.
'YKmPA1g3Njcwdq2jrUkwcM2VZeY1ZakmwAAAAYAMgAAAAAAAAA'.
'AAAAAAAAAAAAAweZjy5muYMG52l6297LBKvNlFzm3285AAAAAA'.
'AAAAAAAAAAAAAAAAAAAAAAABg8pL5izobnQG0vWu1d1iSdYupf'.
'QayAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIcfODNZOhmNlzWZNb'.
'do2W7PV3IAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAr48CdK6G5qa'.
'EshxzXWXB6yz0lgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA8/Hka'.
'nLsnReqTC2IVlYQV4R7mJ9AAAAAAAAAAAAAAAAAAAAAAAAAAAA'.
'AADystInSuhudiyOxEK1eUs6PX6zkAAAAAAAAAAAAAAAAAAAAA'.
'AAAAAAAAAGCFERYZGOKzLL2SDVMRs69vc9KAAAAAAAAAAAAAAA'.
'AAAAAAAAAAAAAAAAGAIVgq5rRY8RS7ZsNQAAAAAAAAAAAAAAAA'.
'AAAAAAAAAAD//aAAgBAQABBQL4Bfz2aLaUpCV2KdMS7V4qtmwg'.
'rcNBtWrBtVtBXq2A6USiqNrXZZ/IVRNpmhsrn90NdRnaCzx1WE'.
'+bWNwTVxDTSS+okFVyTvbST9ilp29S2WajpDXYJwMFllUTeMW2'.
'lpxBj0VtH1LwGQ55StzY1VYrr+WbGzTrqvltFomzr2fwbzcdPU'.
's4rzWC6sStnMLmdygzsVPOyqkC+ZIgWtodOvH6vCCyxIu1rEEV'.
'MN2xu7r+PDLVp1Vv8t3bhZu8u4f05wtqib+6sTypg8ppGJsUP1'.
'8xcE0wB2sLFu2EnfibNYK7BbotiCVhWjBZ+JncaO1s/Z4x7dS2'.
'W68QWWX/AC7YtFNLcu1qVlF/thUGNxBrqNrNXyr/AEsxKbJ+1v'.
'Vy9Ny9qu0B29R4dPIOteo/IROJiriLfsgLesG5r8eXKEYgtTOb'.
'TM1y79da/G0lm+XeWtzMByl7oE2G5jZ/y7VrvPws162QrQjLP7'.
'jdjZP6t4nK1D3ZzSC72W2wz8JjVytDSqnYl1jordkxSVY7Fxnc'.
'o5d11GtQb71VUX5dfb3bkH44hRTO0kFeCa7ML3EYcw73X4NVkD'.
'MsXauBGyvHuajFEpYLSYbWVP2LZqF3qQDDsphoqaNqLH1tiMHU'.
'/hjxdPGr5d5G/s67DNgH8QXM/SRwdOkxtIifr3Tm1csMzEv4HT'.
'2TatgSdpSCjx+8sGws2H53IvFPl3kLue1QIMj1joFlVWZcYqDg'.
'UyT7S3iA/u0zNHZZHPGyGpcstwhvKHv0vF7bbPy62wV1uTKwFI'.
'v5RmVgBVDSOHYaEYME9hE9yMgZLtZgJSvu45HbbC5meldrVyt9'.
'tU/Y2Fg2swbYlj63b1sHY+XeUs/Cn/JcRVhfygw9i+ypy5C1lT'.
'AmJ79KkzLSQlXu9pg/Grlk7b/l0HSmvYWprIx1mg163h1rs+Or'.
'zsfLty43WVjgirYah7uEE7eUdclkyzvme3aJYLWrE0HJtlaDFh'.
'ybbuQSWtyPo8fZyQtmWJSS+rWYarah46vhr/Ld67s6+MtsNhQ7'.
'iU5Re5AyRjlpkzMGJWv49tu03HGVrR3LdHPGlvv6Na8VQWswa0'.
'zuSxmuKrxX5b5O3lfUJc/KylOVnqAMRJ94cqobButL9dogJ6R9'.
'uLYIrnbE8dUDs+nkMgg9M4nNfSrKw6ZGYSB8VY4rS52ZmPbrmq'.
'nt6Ricorysflc2F5Fieu2Ry6DrjMzYIuw07xnjauGv6X9n1NgU'.
'xbEZNvaquqzNWzmnTy1xq0vHb9fLyu49Z8LY5V9tV3vHo2vq1a'.
'+x5NaEZKfiPKWYqp/Ozab3EROK+rEAiWFZYxYj7RoJe/I9P6dF'.
'IDdwTM1Nfv249T45SvbZF6aH9lnkXS7V3Wtba7HY0V7dV20ty6'.
'fa7L6Wr3W8gzqvkGSv/pvy1d1rWm3uvTZV5FnuBzNzZahP+nZP'.
'+nZn/p28abu6nrbdoW/1bRVbTrco/juRr0Sj8GmP4Fn9fsB92+'.
'7nFb/eH0UcQO3WZw4TQp7Wv6rOXOuvmz1PWz0EJND+za5d/WJ7'.
'l37e/ZtDhqzx5ONx9hdj3LdpePYHLWpHIfbcWsxKB3H5rQbrSt'.
'VTWT9J5drvXKrbVsR+Q9PkPI9qZnjfI59RAMv0KLpr0X1WM1ql'.
'XzOamdvI7STsmGtxD1EH3P2UdNk4TPqqpcUmt8UVi671tjlp/w'.
'C16A83kVdeaH9mxjv63+1ftvY/Wnj/ALX0CwWUMjcDOM17uy1F'.
'y3J5LHfpbjZaQ2rPH/ebt1aBX1u5WoA9D2Gwpr0pLO6Hs16XlZ'.
'4j1ecYqNS7cZEtbjz1mlSDALiAzKz2MaqdpJ2GnZcQiD7ATdP5'.
'+n+gutWfsuR4qkLV67P79P8A2j7eR/0TQ/s3Nb3Vip/f2I+5dY'.
'FQsdOpkB+x27if2bOJ2HJUZOmjrPJf7k/uReVOxQazVfZUf+hs'.
'5t2LLVqrZjTnj1dzab9zW1BZ5faaf9LczV5e6VbFV612erzD89'.
'rQNve/w3QVpEqCwF5kzKQDMxiBm6f42gVjCghRZfrXtGRlh9CD'.
'LCsxU7liIqL679PuNRp9tpYvJT4/3op7YIyH0st+iZ+gZTp8GA'.
'6W6hdq0ssvr1C6W0Wa6adve1/I2P3F1wt6LxXaZQf0JfrimuvX'.
'Fj0a/bmruXW39HfuTf3P1kzOc5mcpXc9ba+yt1VdvoZgq22m19'.
'Svta4FQhVwx9orjp7Tisw6zlPxgLGMiRPaEvOSRkQzbKm/rW2D'.
'3AZ4ynnd8KzBV1tha/F729fSf3OPjaK+3TVZW3lK7q/+vseT2D'.
'Lb+PkN3yFgsS176advsDR3jbdoEW2yzcF15cIlthtsY5PXE0Lu'.
'3en2p2lNvTyjEalNYvvM4LApAEPvARPefaDEOZ7TAgDxpyrmSZ'.
'xE3NZ7RZTZUegEH38fXw1vRmZmYWncgb+OzZ3Xvq7rU16uvUGp'.
'pY69de1XHo1q217zbf2quXkLU16aVS+mywV7FlYNOjocNWuuup'.
'fJeT5TxZCnyFv/AMZ6VJya5alCDM4wjDJ/u8i47vjfIjZWeT/s'.
'HNGTyOwoTyGs0tvVjTs21xN9YuzQ0zkAkTM9p94eUyJkw8WnbU'.
'D3xhptaZsa6l6WiEcAoZlXivVjHtxK98NabxLNsR9qyxdIv2h/'.
'FRsbGsfIJsWXLpO60a11dadx/G7mt2Bra+2mjdXsKvjKLBtW12'.
'WqoAXyJ5bdNG7Toadlux5WeT8d3Z4tUeb9edQ9BkQ8jKKjjhGO'.
'WZA9vkUWtvFeMOYyq4s8PrmbGlsaw5VmKBlleBVnFoHZZTsOEr'.
'3vZL6bAPcfaZIg4mEGKLBOU7vCDZqYb/HuD7swxpLys9F74Gzs'.
'Nixe1Yz+1VDbEdxdbrj2Hw+no/rN0u1e3c+HS+s12AZipEAmZc'.
'/GaFXcvo/KU6Qt2PQQDN7XFG5Ec57ixVradt4QVnBYveSV2Guf'.
'uOiJvrFtqcDOP65M/El61ab1KiJ/dyQzxiZt6mblvvrr3NjYcD'.
'ap1jYdm2pE1avzpXA+Lup7c29bvqyPWy2CC1Y18qqt2LAiImvr'.
'59fl/wD9/QEiDgYoEHfx3KjO1U0NVyxvyi1pyOzbU6+Qlfkap+'.
'zQIt9DQZEdarjeiI+J4qvFXW5sLfZNWrt0jVQXW7haV1flr0YC'.
'a9e8f+NoSgfrbG6gOx027npqHidJgfEaSi522NGv2rs/s8YoXX'.
'0UC3dNjR19k1+O1W2tfVp1l2f813/G0JR47V13IyNnxenVVR4v'.
'T4+i+jjLkDBtGoz/AJuxBqayTLFNXUwPXv6yts/p1T9IGNpMAa'.
'LJ+tcIFuBFlmDTruezck5XCa5DsdCoyzxgj6dlZh94lttc19uy'.
'yPUbGajjKUFdXXbOFRe7sSwrtKoc16xHKvHFclseYlGu3Le4fs'.
'dNs6oqUeV4sPK4pq0L6OHlhGHlcaZ1TXocO91p4f8ARmxr5OPM'.
'QXbVDAgjyGP1dXH6/p2EFQ/wWiutXs/+ema+uSf4L6+5WeanEw'.
's5AQNnr+U/IQHBWxQVtQw8cHY7k/TUy+haulGZkzVr71vo3f7X'.
'Qs21d2q9b/DsFFI1yVGu2U8c3Lrto+f+vqSryWtbZ5JuOvX/AK'.
'39k8a2aD5bVBPltUjVqsqrNv6Vn/X1Jr7VWwNjdp1ynkKl2dfZ'.
'r2FuuSmv/r6kbaTdgzjePHW1jmj1eU8Z2oORPjfGCj+PyWmba6'.
'Ni+fvbCweQaJuVkDZrMzW04pPwE7izkhigGdq3gmvh+Hvtr+Jl'.
'WRXzsmnR2avRtDIoA/Z5G6y3IC3VubRw2tNvx+QUeO16Lv5Nmv'.
'tXdAZzaczBZiDZtg2nE/aJgtSLsKJX+vmzgZetzBtd1UeyeO1S'.
'T6bVzFoueJrDF2r7NWazsMti6oxB8t8tVxuwJie/X36YnvAXiW'.
'WiU7TcGbXLLhmOvbYmhqqT6iJwnGMmRZrgy3TtEqTAHy3a112K'.
'rqXpszMmZnJZ+PTEwZ+MAi8s4/y0gixPxq0B/g/ixOEx8v39Mb'.
'FZyD7QETPTHQEQHMXWd5bQ9UGTNb/YXbtULxp+eeQ8fyIqYw0u'.
'JxImOnKB2ncMrKE2VPhvxbUJLuf8fz7zGovEMZ3GndnIzInJIt'.
'lQne14z60f/IaA1bn3+f7SK+uAuOCziZ/kEyZyE/H0faaD22Xf'.
'Pt1uOqqgTgZ2Uy1WJ2TDWwn65IblMzM5TxFf4fPvLt/gCmYUwZ'.
'nFjOMrR5SoliaxL015sqTJpONOvt63z7yq2G3LQEzHvhIolVlg'.
'fYJLNXmWE1tzZpqazXN9ANp6zRvG1R/FtDpXrPdIhyVSW1KZZr'.
'mU1dyxFCL9CHEsTx7RtSuHVuEbXczWr16/nH//2gAIAQIAAQUC'.
'+Nz1z0P/AJG5iZ+iXPUTlic53JyH0GBDWJ2oaoqYn9TD0QfQQ6'.
'46YhQGGkTsTj9Aj+XE4zj88X+MmD58OmIOnKcvSeohgh+dCD04'.
'9Jghg6n50J3fdXncnOA9B1JhghMECww/OQI0xAvt25xMQYHoPo'.
'A6GH5yojGD+An0AdT85E+3RB/BiGD0n5ysc9B/CRAPSfhsejHX'.
'ExMevExMfAgwmCZ/mMPwJ6D0H4EfDZnKcpn+E/BHoPQeg9GZmZ'.
'6j0Hrj4PHr5TnOUz6D8Eeg/nHxmeuPXmcofoPP/ivHTExHf6GE'.
'PsKPcy2+U1w/QqibLzX9ltviKSVGAfoQdLGyeftXRmBQIT9CrL'.
'2wIPxht9z9DLLcStOR2F/HMU5B+hRNgypOIcZBUzXb2b6G4/lm'.
'Ax0BFP4sfonMZff58P8A1sf/2gAIAQMAAQUC+Nx9GZ+vgJwnGY'.
'+iEHo4zjOE4zH0ETBZO5BZGb0sfoI9czMzA0Fk7sz9An+bMz88'.
'P8YH8uPmmevGcfSPQP4MfNTB6M+kdB8+M7cKThOEI6HriD0E/O'.
'yYJynL35zlGPpHoz0Hzpov8IHoJ6j5yZ9+jfwA9D6R8CD0J+TN'.
'F/jzCfh+Xo5QHoZy68pynKA9CZy6EzlOU5fA464/mHwSz+rdTE'.
'6HoIcwT29eYOjT3+FxMTjMfwj4JOjdTE6HoOnCcZxgOIDGiw9F'.
'6Ezl8VicZiY9A+CXo3XEE5GZijryM5GZMUdGg6ETM5GZgHx+Jj'.
'/xRn5Xnrn4nPTM5RV+ZZ+EJg9zd7CV1S14Pl+PhmMoWXe5rqxG'.
'MY5I+hDPvFGBxj24hYmKPoVpSvT7zt+wg+hWlUdsSlveP7EfQr'.
'SkS18xD75l4i/QpmfbjCsV8Gz3C/RJWKfYfPj/AOtj/9oACAEC'.
'AgY/AuTbW4H0Ym6XhCxthq/pVJDvmvNkMvsS/VyPASwEMKCtSR'.
'CcV+CRvYz5hsnTEicWGmI2GxIjO3sNiPOXRdvRCVSXOPi8X//a'.
'AAgBAwIGPwL2v6ryLV6EuOL+pIjDjLF4v//aAAgBAQEGPwL9gv'.
'Xmi0e1WHxa6fFVsxKTmujThKpcu7+1CDY5d0paVAONnFzbDFe3'.
'jEsAN6IJtNFMcIrjZCNYnsKkeLVsO5Sns8FB8QcRox00UzXyb3'.
'UYeC4jbb7QirJufdMNh4VSQfaG9uWuCqcNfcVRAqIKN7W6Qzfm'.
'7neqIpuJx49aFkAxrEuypYtvcoXd6c3piFyBwwxdy+dcwOPxEC'.
'uB8DhjmuF0WnDKpiNcexYYUxJ2IQNNXhRhlUHYYZlGGGhSMRi9'.
'Cxbe4qLDEHF3FcTAD7qpcwe8O9fDDaTBrqNYQYKB+W2r0wjQvq'.
'QzgrgvGnT+BfH2T3KVmYhB1Esq4rjSwr6rrvI8R71FrmXmaR3d'.
'i+ZcnOuaGfxkvK7DIvluddnF4GC5m3ucQOtfMuSMomuB0MnpU2'.
'/vCWGpEgnMp8Xb3di+ZwnE4bxEbVaY6Ipkg3/HD09yt3ldQVsT'.
'NUfy4nyXAhpr7lCxEr6eoq0195djGvqMvMjhA7l824cMrZqb7P'.
'6gQuC8adPSWea8kO0oWgpOguF8Rln2r5ly12UcJ2SXC+8uf4wo'.
'C9u73I4WVO4P6rsxUPikZHjvUTDIWqlUqUCpN3+K47vDT3qJ4H'.
'VOwki5sHe1RtahdvMXUfl770+UehR8zzafhlPYjeOoIorUuZ59'.
'OpAHlFWVG8fQ0QGGVG9+nd5MNqtXRjijOOtcQbaySUbv4jMoKs'.
'/7E8T271bvD8Q5NwRF+05Kd3cpOLMhwCix4OxUb1xBequEw2KE'.
'bQqiA7xXHczxsl4bVN1n9S4HMvMlBXHdPZlE+xQbfaHeKEWh2Z'.
'Qe0g5fBFzHfMqAMEb92jPj/L7v7YUu4nZhRt7EY0ZP4e9QaTZG'.
'NWjCMK5Zaoq04RFADTrphFQgQwINa+AlHuXy5hskXv8AqPwAUn'.
'cvMB2LhIbYlxSiuWOZQJIz+KnB2juXJqKhaLf1T2qUH4YiuO51'.
'eCk8sOXAKN28OioUZSoXl2HRrHco1rgvTmiR4bFxweMoB2iBUL'.
'JacbHQ2Ogotv5e2N/irNqIpcRhWg1sgPy+8vTQ7gZmx6u1Z592'.
'zomOgTkKvRWse3+aoBSZZjiPdEUK2Hm17U1wBuf0rlUiQgY2oS'.
'gd+GRWX3bXZaFA3ZZlBwOxRF9DI4YVKMA4Y2o2TI0LHnCDjdgt'.
'oEMiiIjIoFw0hcuoqLXFpy/2qUH4aCvmMIGGNRp9mjwRvIQL6M'.
'35eQOe84W79ibdihtOfzd34logdilEYZVJ+vwUmxzIjlJl3oDo'.
'EIiFbXQ8EJ+94LiG5RjDIe8QXARmjucuNkcvoiFQW7cNS4OWjv'.
'TW4hD8vPqfbj+LCARcaXfh9qs4ZFxZ4qSgFFwiEen4QmzCOs5l'.
'xNK4HwyFSEc0+4qYIOFRkpw0hAMHDaH5e55oaIoCl7zbdpoQGL'.
'VpVo0N7VRlz5FxiBxq2DmHYM6qlT3Z1A1dWKylHUESooDLHV1C'.
'Ww0zXC+EZkenvRttjmwIUK8MSmZZZovIFqqzLYrqHrTH5ey5/w'.
'C4eL9Imi81Ubtig2l3McletC7FbkY8jU93lqz1Lioha7lHGcDN'.
'YlGrphjWeWGhZkG10lHXuCknZrOunZ1WARhDPlzqDmA7O1QeCw'.
'5R3RXy3g6dyhTo7kTatC7FOWjv/L7xwoPC39I5jp3qecphjBxn'.
'GERCoGFCLQeU2dNehQEJ0qA5YxRIOhNHkaKdpVEEYThBNANOtS'.
'dRTFE+qEMQ3q1jRySQaJAdBykncOq4ueXO0yFAEaZzNa9bUfFT'.
'ZxZJdqiDD9Q3q013DkMlE0vn3flziOZ3C3SgyqjVzaz2KHrdi4'.
'XEIetSSqJ41iRPTCpSRxlCFZnuQsgxrisjR0uOTwWaXVNpsY1g'.
'wOipWmmINRgTprXGNXiuF5bhpGxXbBxYoZcyDRVL8uDR/i/mNG'.
'pF2gYZSjiEkPwJ9B2diEaOo0Yz2dfiumnMvM3ahB4OeSc7/t4q'.
'OtCM8SkY9InTR1YtMRjHTCM8XRP9qc91DRFD13G0dNGxZqOgu0'.
'fgTQhOtCNdXVOQQ1+HWAVY17oqZ1w9KMWDP4K1W+fd1nQdHLjR'.
'jGBqVsHhpRawwINdfQK+l1ml/Drp2CCuvs7phLYTvMvMTDFHKM'.
'yb9tdGw+8pvDKAopqz1Z1fXRdbZdu4H44xoycMdK+4+5vP8Hy7'.
'm7xmY1SJJ9oJ9/f0vjeuwxmnYn398+y2YuG1R7hRGk6Exjjac0'.
'AE/tIu/XM8wmUXmrAbEGYplZUG4vwZKfVOUx3DryiMMiptZ/7l'.
'QLA5z6JT65gIDF0WLMWUEdRzbPCJZcNCLXiGKCc6/AddtmQcKc'.
'Svfv3MAc+V20UBvdublUL25Y9wrO6vah8NgYPVC/2DdxvKcBRF'.
'Pa+7BY6rvx7E1jGNbDVq8VyCzir1+CLXiGKHQGNblMdyslsGHX'.
'0CyIk40OEe14YtqPAIVeK5Rax+Hig6iNX4AuC7iOoYgc/XHxCA'.
'wiUcemNRVq5LC3EJfyy2BFzosOgjVI6ooOLwQNHaqPxnHIs3Wd'.
'a3Ht3LnhnwKMwY5dyb6zuI7tnXda5ozUFDUVb6X2qY+jYgm/bG'.
'6NzctPzHGuFE4AZgIznQEW3cgBCGT0dMQSG+XFhnVNNKBLxBQt'.
'i0otcDjh0C0QDVFQtC1iTrPNCSslxIy9ORNIco9Y3V0fmVuxf3'.
'diiULi+M/I7cdx601RYfU9sjspT7p73FzZg0gg0ScDQaVNuze2'.
'I2KTHfuz2SOxc4OR0u2C5NSrCkQVR+CBjPZ12n1pwPiuSikjCC'.
'bdBsG0u3z7PwDCYq6QMsul8MaHQ6MupDoyIupVoallhNNKdakI'.
'dQNcIk1ICBga1Lqll2Zed/9Lfaxny51wsGfxKaLtgs+Y9q42A6'.
'EGGionf17ksJa6cxoR+ZGHldhFfNaP3cD2rnN2cTsCFwm1laVT'.
'72BU2g5sCvMNvZ3Lmac6nd6lTDOpEFcvUhiG09eTjhnREBOURh'.
'BG9rdKOQfgGVmdHTRGfSXtGdRFKbkyU4ZIJzXQLT5cW9SU+h0Q'.
'NVGGVVZ4LlEPVwmoLIhKqlBQNBXsrhRozYt+tD4kyPNuQICn1L'.
'DJM8z/6W73VVTosmbqrtuEtK4LN2NZw0L6uxQvIPGSlcPu4Uqy'.
'dB3HLhT1mXXqCJ0p5ZCFni3AZSVQ0u9kz71R789s+1Gy0fuy71'.
'TDI6feptBytVbc6lB+1UFv6SucH9Q9C4rvS1cxbnXA8P29qmwj'.
'MuF0M6Lg20C6kToUxDP1QO1Y8x9KDGxiTBBjaBR+BFR6IKKh0R'.
'6Y9MU67Zdxu2OsuvI1inag6BbGp1OFa+Iy7+IRSKJY/QmXtmza'.
'q2baUy5u7v4t44RhiFCZdEcbm2zkwKgru7hF16YDtJ6Lbp0CAy'.
'yV4wf4zZJy07Oh9zeXPwiwRpjm6bLTwVux5G5MbtWNC5ufqke6'.
'O/ErROdykOmLTA41b/APkb/Ugxx/ScK+3qFxoEyn3xpeZZqtiE'.
'ed/Ef6e/SoGs4o4TUnCGpcQnr7IKTp4vByiQOzwXm7V5Y6juXm'.
'G0bVxBp2d4UrTOzZFSLX9uzuXFdlpxjAFQbexyEz2qbcNChCeT'.
'xhNTd73ijZgBKijDHl6kVQviw4W0af2YuNAmU+9a8G94nOyOce'.
'GI1U0pl2L3iawfEA5rVcTZc3LAQ7EXXl5G+vWmw10LU+EQDYcN'.
'YMFd3fqtAV/FwtNa27YMfndDHAq9D7ycAy7EKYzLYwlA5olON3'.
'fFt5bsi5s+Wo2qzk2L7f8A2LywRdgwh53SLaCQDX2q+a2++Ebu'.
'AZd2Y2sZLqsmRfYtvXWnPebxxyXcTPYri8ebF39w+8vLwwjkaK'.
'zioyL7h95ej4DeSMgBEwmYVa19z9wJh77LTkYIRGePR/r3XIJ3'.
'jv6RppKLzQ0RTrx1LuzrCPK7hciw+WW9uxf67z8wCLco7xXr6X'.
'NFL+Hv2Jl2OSvNWsMNiww7FAuj+rdGvSpUathkpjWN4VYOSfiv'.
'Kdh71xAw1qR1cOxY84jtaqJ+ydxVPvDepGOYx2GK4mg5xDaI9i'.
'kS3bs8F5XbDhoVbVBtmLTmNGOtQeIYumPQ3G6f7K+7+0u2lt3J'.
'zn46YCBFCh9yG2zzBtG2NVKIu7sAOp0UalacxpOMgJn3N9dN+J'.
'5ZVAmz0O+5+GLbQXF2GRXNq7YLx918V7oTnJkDmxq3YFv1oT1o'.
'/cWGuvBAMiN9MqVd3t9dtL3NBMsc64lfb3LGjjtaGgRliiYIsa'.
'BRwCqNSN19yA8udaIpzYBWLttloqCNxccvnduGE1evdIABOs+a'.
'XTA0KXUj67GlXd7dOmJRGNpVh8r4bco3joZiiosdA4woPAvBl7'.
'whbBYdY79ic+7daF2INzmZOOZsjQUWx1riE8mAKpnll3KmI19q'.
'lRklsMlMRzje1Sj+6Y+K5gf1S7VQRmmN4VUcsjrHcq/5vHYp2T'.
'nkqCM0wuFw7EbbJZFFrqKnKD4TERDV0BuJCCDcXWsQkSQ0/pp7'.
'e3pLmmxctpvKz7LM+NNt834d6132t49zrxzrTRKeL0q9Dri8vK'.
'PgOEbLcchIxrX2Vz9w0uDQ83mT1WxGcapSX33y3C6gRd3eOmBG'.
'OyITryoXDLl12XOax3a9+QUxlARgrq7uLhz/ALYkm9u2F0SaBE'.
'zMK8RX3PA4fFg27uzTMwcYVSOIUTkvu3XLTEBl1d47I57OupWw'.
'LxsAaW2QTRxEk0medAOuL3/Zj8y8gTHIBICCAFARt/bvvWtZZb'.
'IwiZ2rQ1JpsOJ+KHm6rsjJSIuq0wTr5zHMDWwsmqqBorjp6Df3'.
'I+Z5m4/Htzq9Y8REpa0WtlZn0y6InoOVG6NDbsNKYwYonT6E37'.
'm+lXdt/qPd0WXCIUWOcw4YUoucPiXfrN3joi061MLEpTClFuZT'.
'dryU0Lib7uAUe0ehRjv2OUpa2+CnMZRHa1Ue6dxUnluR2EFQCM'.
'bPBU+8N8l9M57vukoWoZHyKFmFcSM6AUoau5Nbl60G8xk3Orm7'.
'HkYTr71EmStP4bmoVu/t7UA36F3yjGceYVftN661bdemMdffPp'.
'/2boUyvWj+YZRXjzqHldvrRaaumjohWVE/TuuJ+4a96ffOlbMd'.
'FS/2r4SH0mZvMc9IGvqwNCddjlpbmNWjoipjDOFKSlxYZUQ5sI'.
'0qRgpcQ1qgjN3UIWTTU7FoXEyBxs8IdijGP6hv4SpGXsn+l6oA'.
'OWLNokq4e8NYmowGgwOori/iCtNaBZMHEZaIDu6KlGHKPDqwUf'.
'LdfzHuCeT5Wgb96+JfDh8t3vd3Ky881DW06FJtltTYx1xr2ZP2'.
'0vYPlnnbi9oZPWGlS5/KcYxZ1BwgVNUrhGkqwyZrdUMpOGRf69'.
'0eATv7xBzxBg5Wb3bm1VzkOt+4N/UogVSR+mf8J4tRXDC9GIf8'.
'XTUL26sHJLtkvl3muSxjCuhcbNSECcyIaZV1qbB+7LwULRGRw/'.
'4qZbPzNP8A6TrX1Qcj4b4HauWWNvcUaI0QMsCoNFg1gz1YlUnP'.
'9Yy0dVzygDzHidnPdQnX7pmrEMufKrP2+m8q0Y+xes80uPQ533'.
'LGxZwtsXkdcKDqJxBch1lf61y1oujxTfxe4Z7sq+3ixrpyJfZO'.
'hvm2mqHTaYGk+26yNZ7wg5zOIzPETtrzokXcxRxEbalG8Zdnih'.
'9Xh98SjVC1lyJtUqIx21506uVFG2rOuFrWiPlfbGuYCv4Ma2c7'.
'L7eseXYcnSDeiJFEzuT7o3TbDaIXkXaWUjZpRbdCAM6Y9qH2r2'.
'tNy6Z44O9wTO0ZlyHWV8S6aQ7OVBF7buJHrPLRrPgmXliDqZPJ'.
'Gg19UkfTNI9XKMmPFSFC+b8RtTxzL5V+P0vkue7hnXzr637F2r'.
'N23/XuK/WKD3iAHIz+p/tYhVno69tw52wacoqU3bRvUndilE6E'.
'JQ0Haqtam2OWvYoPbbHtj+ob4qQN27Vt5excD5ZcIL5l1a9pvg'.
'jYpy0xqU8NI3rgdoPgomYGLoC+W8tzKzeAES4oTzy7laLgScpU'.
'dFKawVDqFNZ5W8bt23ovrhp4mV5e6Mirx/L8KAs/z9Lv/wAw3A'.
'b/AJIxjHR5cVWJc1x/F3L4v3LLs/cVPZi017lcR+DGP+SNr92E'.
'velHp/8AKs2IytY8leqpD4Z+3+H5YWqKoSxI/Ed9vY80bUIVxk'.
'rN01jruMwMfb4ZFBpuA0UDi7kfiO+3seaNqEK4yX/jWbNdnH26'.
'1f2fg0/4ox/ejL3ZR6l7A3MfZ+pp8v6oTx9HxbljP9kUPf4V4l'.
'zXH8XcrX3t5ci6MuG1GOTeoiYNBTo2P/d5dk44oK7hZhDycv7v'.
'Wtj6deT+3szLyvRt3Nlow0xXlGQU6ghe3on5GYsrsb/5c8/wYD'.
'mpacq5ImvPiUTd6vELlI1eC+o4Z/SvqYaiuZp1dwXkOrcVyDb4'.
'rlI07iFRZyju7lEgE+sKdVKpUTRjTx5apb+9UnLAhNgacfh0Wg'.
'qGoAiDWzMNg09UoMaZ3hAObwUG/UdJnfoTMTxZOekJwhz83YoG'.
'lhsnR0XvHb4v+38P0nPMV9Lb4PDWXU3CxbOisaM68/uoXbbVp1'.
'HCVzWZ02PibDIZym1yphD+GrMnVSphHZXmR4rU/U+HsEjnChxy'.
'9kqAtAmuyeytWbx4fXENDNgTjfvtC9MWht3DWW001zrXn91E3c'.
'ZYxBBt5aicQin3peSx1DfhQOl9J0ouu4wEpiCN4+NkYhHsXn91'.
'C5uH2H08d3aH8UhnU5nGncVnLZt/w0a1dmMZUws/w1dc39wPl+'.
'ZuLKMnZmUBMr419O+qHq+PZ+Gb26JF63FX4o/NIz0acSnNcTcN'.
'IK5T7o3QXlGcOHeF5Dmd3r6Z0eheYYZwuZ+3dFfU1jvauZrtPo'.
'RgeAyhTgFkpO6YUd/egQK6fRjRUqYrwU+d03dZz3cty3t8Eb45'.
'mDJ4q2KWG0NCstdxQtQyGjDvTxU/iHYUPyF180TPL7OOz+LeMo'.
'4zqq6lKmI6ApcOaIX1Ha4/zKo52b2rlbrI7ZKbDosnuKhxtGVr'.
't0VaJEM8NhgvlU549hQaccZx0agi6RwyoZV8Z4l5Rv65uiINLi'.
'68OP1W9EkH3Yg9u3Irn7huOydOPMR+Xtv/ACkQOerDJ16Ojm6O'.
'GGsjfBOa9pcTRQe2G2KaPhttHG2G1sFwyzE74qd46ycc9yJfxB'.
'kmg/iOZdzu7ycMTvW01oflxuzLEUWOpHRQqOrR0iCF40H4QEid'.
'owqV5mB2RTcjVaPmJP55KV42g7lAqhVrm1rylcqodhrXNrHoXM'.
'FJjTmKmwis1jYjDFQr46FT5UwZPz03102LjzDeqJipV4ZupSVz'.
'HDUpwOcelfSadMN4Rc26e1h9V1rZOS4bQ/VTuTx7JQywH5+PuG'.
'81Du9SVa5ujlaV9MayuK6iM6/+uIZZ9y+U74fvDsJUfiWnZT3w'.
'KcaiIR9EVdt9ofn9411FkoKlUrGuVUEKnqhrnFzWznq/P7zKID'.
'TLejMaVRqn3rm14NVR1qjUYrvC+U63kA111LiGzqOvTXIfn7GV'.
'ud2eMFaVI0juVWg96ojq3QU29vipR0T2KLoHOJowZqMOw7lS4Z'.
'xHcO1cMBrGlRqyGOylMbkidP5+x0PlhtOU+AVGkYFU61NojhmV'.
'BGn/AJRUnEIRhDGvpmBrp12YqUD+947lCJaVz7FaMPhj/oGd2J'.
'rhc5uGVcLg7OIdi5PdO4riiP1N3hSgcx/5d645nKuC80SPaokM'.
'cBXCz3KyxtOEZoNFA/6FnQuIsjnAXDfOb+9HtUvuRDKhbvbuxj'.
'jBQunBzvMYxP5x/9oACAEBAwE/If4HNNc+aXosKouTjcNOZBaj'.
'ahXPDWT5NYPDq0RUeWYyYVtszXmCAHoE+B7SiQDDVe96YwG2sb'.
'cVBHpd+ic7i7KedZklUr0P4yAM197vupnujXqrVkhFi8w2irTV'.
'YpUu3xLA6QA8motrt31/9SKu9jOrS6dUohdMCOSex+CWA+09nE'.
'vXqNT/AGG9rWdHLz+72ronoLll1oKujk74CFg7rbclvs1xE633'.
'B7m2GNFB1Nekxbu22w+ecq8nSX+Bymu6c6/H3QbrLHPZebvP3e'.
'Olq2w4hsiVs9gzezADWPQrbVzRslRpvHxYwCOnX8/JKdWnk9KZ'.
'i7lG2KesENJU3vGw1uOUxwncLPPBi+XKBujch8op0dZULZ0Ms1'.
'eiKTQ1a/t837aLosAZV5AT9Uz9JPbFF+msvx9qb1P7RSUUFqiy'.
'ZVV9GXF33zvp/wBgFHXgeuNRYFmb+AIg2w5af6ZQq3Tava+6JL'.
'oeej6/1hzljbBu6DE2YHb2gRwxt8HzrPrK4yN39UPaKZr/ALWm'.
'T2y7SdGE+R9I42t1wueeR5sAxu8jt1KSRdorx8koMQBLNVvG9j'.
'3Q4qazlOlvWZPiVyO3X7dcZdK/G7ZCVb7H9xTmw9C/moYaHced'.
'P6leUP8Aot8D5g4fTDN4fL5AqbuuwPji2nIF0GzyCVrQLs9sec'.
'Ac3smI2Sqn5+0M7W3v8jK3lMYDk/Bd+0wBObfrRKsspyI74bqY'.
'z1k+REsutV31rDrDF/j0i9b1/wBzGmqFZvX2xOaOmB+o/blfqQ'.
'p6CJtqZebFpIpgZHKkp/cyi4vr6pjEACjQ+3brEhzdnm1MhW2D'.
'o6XByUkC6c/OJovzG3N0Dtzjm0K5tnkawk5qD3a5rBGU8gwwct'.
'qN4G/vZXUp0DMOTyW9xp6S5Q5jQ+6WS7ie5eonQMFCB0NPSKxD'.
'dQwH7c4c5h6nfX9oPQP/AK095jje3/TMlfrf3LVDba/b9sdnbU'.
'vwqMHyjtA2Ym7eZTEDmHlLrmy9BMymGgb6XQj5MtkU6B+S5+oC'.
'96+0whHkU+tJp283/wBJkUvkx66Ocs4q00rXfRwZYd+NG6u7sD'.
'7fmnL+0d8ob4amOgwPQZoLDdUa6ZBHfWZNWArQNWULd49gaGMc'.
'24eZFQe8ndasxtmFbK+rRquVxYcjHQuvODc6pyP0RwlC7324nl'.
'vRNBNVvZOccqrFxyzuMfhnelGXfdG+y60/SOmeah/uYwq6A/sY'.
'Fo+jfyxW6XXD+vtLK8jaIWGtuGrvfNZTrLIs+RZt0dijM6hWa9'.
'2R84cSy2lZ5r5S9FTlHmZhjDje+OH9Jb3Kg9z7ywUHrh3qkWhe'.
'V/a81ys0QwqdB9u0y6Tetdg6+i+c1Dn/AMHlGfWW1PXH7JgKEr'.
'JTm9VVte1xdZJNmuraPNAUxy3Wp5i+5u5kGsrIb4sVBzTL9orB'.
'W5tUW6C6i78tFzVrfR+GN5Gq3Gn4mNEaANmuVWq6t2wS7T+zYW'.
'7v9Si7p4dXFg6RSEnXTauXoMv9w2Op3351rprLy7ctzsvaFFKH'.
'pPvrDXB2X4tWebLydxxMyPT8K9Zmqd6vZsi7QcFP3q9IB03Sh/'.
'qjvozX3isIc6csOsA7Y4dOnq39v6aC76vKNSB+pmGOaR41wqVK'.
'juqvvn5grzbGVc8ViEfOv2jOG9B/r4lLoeaH2aYaoArZpwPOVG'.
'2EOeFQOAsJ7mvMsxchBbWvJryjqRXZu3r/ALGm9QB+RM1ccmX4'.
'9YrHqqU+vsIxppa1Q/uGoriBqlXybtQzdC9GPt/MeIbKzXr6TF'.
'rIb/X1YNQqa/QMy5Xq6fmIbWzV/SBOoe4Xz54i7gZdwwrxCPX8'.
'2l0eXpAySqsPEAal7cmbsxXqmqwtUdO5h9pnLXVPVK9yFbPehe'.
'x+yXzc1X+LvN5o6mf1Me8dAwA86TNOhf2/UzC8tvPSLNRvNNfd'.
'fSGctNvZn+0DRPlZaPXF+sJaTdjsDijNsoli6jTyC8Vif3oc+8'.
'3iKgrDVoudXZiIgU4PlrwDAgsO0JBi8+W3tmanq1+diJAyP9Pk'.
'hLCYrF99b54lqCrfypQ+r6H/AFLOu8ODXEcYHVvk7jAzvpBBdQ'.
'q1WlENpZd/lXwVNcxspp8nK/KPw/QD3a+0RSHds7Gzdli1o1rK'.
'5rh54+34I1k9a96lNJaHsTsJrkJuXvDfQGIwY2R7aHoXLZpMHQ'.
'wf3HQaCh1PwNYsDw+K8uekuPXEc611sjWY0W4au+v7gaAjzafM'.
'QYlMxtzr+5rDGD+or7Dvoe8Dlf4P7mp4abd/c3qNU0Eqqch7HK'.
'FxmF3BxCowNjrXW9WLqo5Z+lfmXwp1PeHkoB8ldekfvNv2LnuS'.
'yVjFzdVP28Wd+R5cvNGZw/D4lqG5tzlljdlypo6n8e8ymWgGIq'.
'iTuL2jiBdF8YAK9olVgD+HVlShJbb9o3B0/wCmsAo1wGjPPrBg'.
'WH7HLylmgbh1wX5RCW6iZzydgj6tVh6GPmFaxudsY7sUVsj2t6'.
'zWrp+XL1z3t/RfDYl44NvF1VVlHoGNEXAQHP8AbXslAqbol96Q'.
'M/GM6KZZDbF2+h08pWFkfJp7M/br0V6zh7FsaC3rdsl6pFaNfg'.
'/Knt4KfELN2szm5b8oPOAiqTAu6cp140ls52e+YCmmWoYhLZbc'.
'W/qUFdBj87Rwm7Em+3eatSoAeqdCjTnEK9gHOv8AYpGd41eeHz'.
'EYmg9mvvGOIanKXki1w7meNxlrmyHdWitGwt1TTonJPxcmrYs3'.
'k86gQoV1hpcLcPchaAAPLH25cjBffGPJT6wKDR9M1YEgzgeWr6'.
'yqamr2M/5A41wqKh3cGVGrpLZyK+CBY4OnbMWzpy4VGe7j2y+Y'.
't5559c8NUm7wUYtLRyvqS06fK6ejcWoN+Wn9RUVWjmOCu2fFaq'.
'Ka2z5m0HshzM/HBAtaDVmFVrUvXtz8vCCI+iWepjXikELZN2Na'.
'Ol8NQBeM8+X8rVqi8v7mWm83XQ8l7wlTZXd/3M3lXO4eWX3lQI'.
'ESb5iO0eSV40MdbEZHb/YPPF+T/ZYLNfA1jgdTHd54tzOs2hYG'.
'6fmUJc0M5UPig8WvQv6i4KWsZFdbSvRmtfLT2Z8/C6RNgsonZv'.
'67zP6Uw+c0bwzmDLpv6ROITQqulGvO8xSAuDQ/qLacALd+vFrw'.
'QLyMvUkFt4XNaHCudwtMkCpHbKO5G4o3qJjLFA29ShQ5dAkrzk'.
'NzOoe1XsRv0cLsVene8xC6A2A81BnUaqOprU0KXOc/yRs6/Lnl'.
'A9nPPA8oxj/RpCrjKwEDlzPff3lQODwCWmW2Wu7SZcvhOWaAhz'.
'LFrd5D+x4LLqNo8oTUsLxDdfhzpBN47qy+DFMCrdBrlXkMQAAY'.
'DAeF0Yk+aa5OnlwIVU9UOuf8jVtYOGnKAV3Kyxi70BfRDU0ytH'.
'Zu85wkwLKovTSupxDug0VWKwGlqIBag0nB2Nb3qaTZZeZovNus'.
'LtFsYas5TfO/XWsJNlGe/sVy1zSZnF4ci1nXKfuE5eyrglCMrR'.
'ypu88uAMkqy2bxVKqubAAEUVo6ro9cQBZEAF0OgrOdM8sz/bs/'.
'h556WebO7fyCYm+zlVea75sFT2Fv425fQ5/qdzcc/GvMPYDg5L'.
'FLgfUpQvPL1Qdi1y/4nDJYqsq9tIa9Z3nUz8TDWVKjAzMEuWzR'.
'ccw+hwlG1javPBOTpQ/b7vFuRmrEgFtowHXAXfdDSdgp7kFels'.
'Jkb9WepMyK910eVPE6M1LdljS966TDtZcBALt34aM1NfI5QIQ4'.
'iuDfbFosLM0MBxgUNgaEO2jgrNuJgisHRWbNNdd0FF8xfMx0vT'.
'9zoqur/NvaIxSwFRU3ve/wmJsdbZ/OcFtou37zoxE9torz3ck0'.
'nbTglGL6YwApLLxW4mleOxi20/FgpXIurOxeu/J+fiNED3hd/i'.
'I4eqUDPemHLAuCaKac2l9pjaTnc86GIHhXIt7IpY2Obj1HqS6Z'.
'qz8syx04VNPAeiajKthW9a3bV8kbW82/Xg6w1uGvaBVwoIU8xn'.
'Zy6zNVSz+xWHpKPs2YujNgZMVFV4nRlZttbPAr1j4aQU5vJ6Vw'.
'0Zruy+Xnv6OOC0YM1TGnOyjzeOguJtfJmKLMtwdSpKqCceytR5'.
'TCpWmnLlXedBWOK3KfnPhrcEwbdy5v6iB4DPZenK8LKHo8NUY4'.
'HbZT+j7JtG5otea2LCyDq0NNlbYyQGurYPqUw2CjGQ9lz5O/jb'.
'aU201lqU1cQU7dK6WWui8ax+q5txr4PlF6vRDy/sI7S/zIWFRG'.
'lVyF+/8AaWvmGHxWGxRz0/Jh0BvLB96g1ad3/wAJdo3yP7hX6A'.
'zmj2z8Rjp0YaBM8G2ysPV9mJ4DgMCgbOTtViDRiYFOeg5d45Db'.
'LX/R8boxatlu3p5cDQjTpFvLXP64aMbXDmnzNPfN/wBlYBDd+z'.
'lAxQdnqHk6sq3Do6SFvKIDHY+DnDSKD0s+WnoR4Ngpp736otTe'.
'G0lRba+7+sac57qBTWFJLWDyf7CDz5E16f8AIXehMVx1Dq80JQ'.
'JxSmuyivKaTSAnf4Ej0YLV5r+TEBvB4qWd9oMNNnj3GKrXfJXx'.
'DIPMCvZ/UtjvmtfT9JQi2P5ns5+JT2Tzz/IRwlCyzptE2N8rg6'.
'W8tFtzaw41lJFnQ08oGcKtq7en9iEwv8Cn+0LvPSn0zMjd/T+y'.
'4ppFy/FzqPmh7Snjoc3r/aWhfnn9/wBx0LXK3yWe8zpvJT91Te'.
'Rz/pj4le+w/viJPodFgaP6iVMuivmaH804VNpo9z5MekVoHQ37'.
'r7wrINs58zlCco6H5z8bA4ABpL7mhPAsbEvhOtOpMggBiJZHEL'.
'wUxQcg67KI+c9iqgoWbWBCy9tXDU9VVpzRH7Sud7ozi6GyWDpV'.
'NUatN3FqRDowDICjXe0mJQQ97HVtRY6GIq4yuFhqKgB5svR1xo'.
'0sHouEecqVh3jhgDJmx4u8bZa9VBYQGFXYE5Rclirm1Xet2Ov1'.
'nP8Ak6sy19obqH4vnLErGP0DU6+sYbJdXfo/Hk8CI0dnQzORXn'.
'IYMWcJjN6/oZQRVRYYAXXCKXlglafsLX25e03qOevlYT3+vfsT'.
'LoG+F+pcW9KHkf79os6r8Wsa4Q6/k8pbYelv3gfuzPq+YmD6e4'.
'+Bi/ajXP8AEeYmzj0a/SCNbuf4mWrwvOv+raFYB5D9j9xkFDA1'.
'ai31hWeG9SzpeK9f+Qxr30p/pgpi3+7oa0KL/jaS6p0MvxD8Ep'.
'oqxyWdjRBC7C3XUHGASsdUM1a2C3+k62T3AF9ZTEaSCM03kLqC'.
'Z8rVGJsM5bzEQESGUBhENiU83JCSySAhg1UC39kb68azmgTVuj'.
'vaJkqpRyaS3f2XhGpbogv6imQBiVWg3lRY6bnCDoJcLH3aPcN3'.
'k0PQxNbfLsbf1Fgzq9OTsGJ2bY4msukz/wDGOC+zNb2v0ankjM'.
'cYER9f4nE/NKW6OfaZgmOvoz7MEo6lmw8ttS9Izbl6/wDG68mK'.
'LErjKzuti9IVcg6r9x+UNsD1+K8ITR3lq/jtBth6L+6rRaV3bD'.
'3t9470B3K+RFpXuL9j1gXp/L5TF3NH8t57w207b2kV4I/JgQFV'.
'/wAhp+09Eu0C12dPU9ciQgNhnCCHQULl17TsedJhm5CJVhp/Op'.
'L6dNvwlz6j4PY8LFeASUlkPpPI8fcs6EnOsJqLS9i2VqeZKjmJ'.
'DXVa7u2TlGm/bTjTKLiXYlbOjNRXNF54IPDBzgy8h5pcCAeAVS'.
'WlrNm58Ej4L94lLuCcrjoC8H0mJrYXRgaTOlzeCzG9Ma0Hk16X'.
'K4xApSsdAGtJl7M3CqDfMpe6GQaLS6+cRso4HV57wG7/ANLBQL'.
'7rjzqAMrKhOS5+I6H04AeDdKTrliFJcVs/7Eo5k76fuafA8l8g'.
'uBnB56T3uBpmizLpyLeXeN+qC+sb6YrpOzBNPsfE/FGtywQUnV'.
'TWgBexekgWuLetz0RE7SrlObM/Lnc2mee8mQXdhgeWD6MA28qf'.
'mxmYhs/5/tA5R6B9Meyac09jb2ykvu37D8UuyX6H+zGK7PZB6P'.
'wghgHSv3mgD1/F+oV9Cb9jXxLKAuqcs5vlW1QsELBYa5oclQ5m'.
'ZheL9DZNrgxbKf3rZNig0VWfMphDaAPTHgoIG6ZUHOS0a9MIEa'.
'wG8Qb30ch1ViHtrZzqDkF5hNH0nOTWKsVaqoDohPxDZaFqVleT'.
'iL0Y1aDl2MiGt5QKRRcLa6RzUhi3eEObTZq1kiCYOVKRTVjYNk'.
'FMleqFkwRjXJlDHEuiUS3NfyRddFmpKFvs2PZs8tbbqzWA7Yoh'.
'pUAB0MBBx3+BsvKhcgyixe/TUhF0uDqgCzaZm6yq9nClgOh5bO'.
'khSfU7dEdyrg4YqDtj9zfwac0sZthFjvSUgUM2x8HwS2yxDCPR'.
'20itrkzqqq2oCCo5F5lPtwOQLqMVVHzPTDHNRG15Vh10lTG/t6'.
'aytDex+3/JevzTT2it7e0p1dLX2nzYp7aR43maqaG7NDVAuDsX'.
'mr9hXsyoHPae154ixGnRD8vowNVeelf3POOZX+f1INAev8TMo6'.
'I0e5b1nqgVPow9oKqbdLvZ/aO5uWl6Z1xiYnbfOus+cTDICZeq'.
'Q5FXUF7C/wDsuaWd8H4HtG6dv5fbwi0asq1dWD0hL9YeqBfMMU'.
'VMaxgu7J1HcXrFA4tBoGMPInE/kCZdqRVFoNW11uJJpHNjGA7g'.
'2QG2sNTl+jDNdxe20CCg6hoSkjlHQ3YInvG2PcaekN6gDsMW5F'.
'Zj7QQnLR31+EgELWEfhJrE0Llk+Q4BFsG1/wB6eTFa9erPk95k'.
'Wr19sPvLy2Dl/lH0lgOlsvpmX6q6/wCSk3EE6L1QvD5Rd2LRYL'.
'0ymB7ZmnymuvnKXnF/Z+6agVXV2H9DnLrJ5k/DrLCxuCE96Su8'.
'+qpMoWXZ+KZeHkLvfOPOAarA1wpbkG7YqXdA5X0lXX4/shbczZ'.
'ktw/fgdEspZfvS/o97zjz4L89J5wcpDL+0aVlitR6U0OsZt1Me'.
'Zbm9VCl/magMg+ofUPbmDoa52tq0XOHs/PbrNkp5mkGdHSWiZv'.
'wx/c1y+toegCOZJHd5XsbByiHdp4Xp+/eeMRfZwFYmgRpnqDTz'.
'NvKUdJto+eFEp21gmeg1CXrW+29nwVB2hyMn7Peat39T0X7pmN'.
'goeU0MYjc9vZnymU1cEA18espcbmtfpmNhbpYPXL1hQTbKHqFD'.
'2TAius9GIEuwNHx5WnozOiGj1fg0YraBW8W5to6SjrfviYqAop'.
'y/0vgvpXyGn6PNjf7TR9FeSNbY2HZA1bK7Im5tl0du/rGqzzIX'.
'z5SqazLapyRrWgwLr2FPxv8AcEC1bLpyl1bKwc0tiRkZZN4tvj'.
'jGS4A0VPYL6QfjTQGty1cpfmjVkrCazS7NOsqHgAww3UtzMBo1'.
'gMKTGg8nq1gsqLLJo40TkeyLC1cXXXJHQY1pOZUtuu92Ta4mrl'.
'qgeyrzgzgWl2Kqcl3nCGDOsKy6Wa8pcfm7b24oIrqc4/G/3MVD'.
'q7sOuFp84DLRw7e5k7kA97LCrV6sMfimuWuFKdvCIHuBu9veCT'.
'0bUu/PuekzpHuvXp2hvFzfPSb9u5759iFCR1fJvb1bhak5df3b'.
'voHBWKLlUiuGqiVcsap/DklLL5X+GLFdDX7NR6M+DS81SecM48'.
'x/aoMbBoE9CrmWvIR9AYUTqDDyFrzIvXnbY+5aPOOzj1Per3uV'.
'0WlUcLZGBDnLgN3otD6Z7Iq9foxgbkXDv+d4/QCY3uRr00imds'.
'mpepQ2bVCDUM5vWOBZF0X16VfvMIgR+338Ot0/YdPnw1wqNWHJ'.
'rrQzquqt26E7ZiS89IOxMcjsdLprDbzcG2K0wN7LSNNLhZMcit'.
'RqxGuz1eP4QhWF21gxDU5TsKVsgWwP7gUpNbjQOsDHXmi8mBs1'.
'xlA2A5CA0h/cClJrc5lvL6ruuzkiyi6A1vUHm5ngdTA6B5Lu92'.
'XocE0tArg3bKoODYdjM8iomfhDTgrDInMdxizZMaF1cvTDNeun'.
'l6qOavnnn4nZNNJnvoz2TW8PK0/eYSASm+Y6jdUcipWbs0W6GR'.
'ekpBDPs9r2Nn0S2xDshpn2Y9ADmStyu9OZM3cbqz2agP4noxZS'.
'5yp+oqWPu3+x95n9w/dJZy/ByY8vkP6sGYqOwq9WRdWNkPlWIK'.
'menycF7xSj149bmiSmX5Nw8/IcsjkZXVQIp6TzNXGLSWxS8dcK'.
'j+oLuwgPvM+U7le9Td1GuWx1eFQYwDZuNV3oKsfoLfPYIAJqF9'.
'U9VEldwWw3ssvNqCNSey+J6JFG07DnoF2/unHZpbUrObb0VLpe'.
'pMokq1Hm5o66c5kcadAdm7mQaqtkczjW2/0R2rwXI41rmvqiux'.
'jp9oI5lEWUsq7Xen1IibECanS+hyl7AtBgOzWX1qDi+BUq+u4G'.
'TDpepMT103ei8PkzHwbLxy108rgwqoaGlUYyv8TP0LXei8Pkzn'.
'oixZ0xb1cTpepLsrs7ANqsnJQgioM0q+tZq5e+R5vd2r54ERTK'.
'eb66fKY5eKhKdIyynJyaiuTAH6IaBb1T9Gur9MaBbpIE1EOTRh'.
'EYRiy25C9XP2g7I87+mJ3+yfE2LWb5O+uVcoTzbeS/GUOUdaPu'.
'ftL/ALYh0LyXynkfpSH94PbUS7N2sNK0WzdCarRoZ/oXnyiwbO'.
'er2MM0JRVb5AeZa4gz2RP0f0wXGv45LH/Cmh5eB0lhLCVqOTqf'.
'SygOHsv76mUOjPcSqho5m4+PwTkiHe/al/YYQSksdSZ6dYdNg7'.
'uuhj6uCqWH48mXwrKPz0qG2/X+7lmh3p7lQ8ydT+Nqf4H7RNee'.
'zfphu/t+/jbPviAVeTAZ12pboXtrXqq+mZsycwBXmNxHmhLqYp'.
'rBtIFXTnPQGm8u5CkpeenWvOCzhzVv0cjbwunBKs8rddDzKBf+'.
'wVKxNYJY09nRuuYk0zcXlpTyaMCaPtrhakOnVkdRiyD5/ntOoJ'.
'jc/PKY5zvhV5H52lOp2f7uFdEd7/U1Cj3p+S/ec8ORKKNxVE9+'.
'TCAYzLg0bW0Coajal7e86USgp2PM1be8ylKgxblU3raUBRp4rZ'.
'W4CBC+xDy4C5JEHSlQ9jWszR9tdm2vLdmcrOcY6J0dYLo+0N/0'.
'yu6Pebfzf7h2+X+NQDn8P9M6AfU/uYNXlT8M7q6InzA2SAXKbK'.
'Rr3JvKXWao97i5KaR2oPS6leQD2I1tT136aWUhX7ejd653X3lg'.
'Iph4PNj3/uA/w/5Evf8ADzhl+j/yUhodswDVH46xsH73/sa6jY'.
'nxTHBWMl4ud6KM5jQ2TEGc4NOcF7CvYX+pdZYw9KnS8/2/fR10'.
'A6ryG/Ul4CEpSD6KM2L0X+03R6iRXIfP+4FbJ2/ypY/D+4bY6J'.
'F2PJH9QTt17frgMh1JX64PexKMXaLMA7ui7XNmNl+2e8Wr/qT9'.
'QKPvzSqCV7jou27AbPWoFrT3gn+xObT3CG55T+qmHc5nwXGvIr'.
'nyMV06Jf6QtL9B6WDiWv8AV7BoUfcigwjCp160qyvOqJgzeTl9'.
'/wBV57BY+STOnacik5MjuHdK9Q9v8lv4Pzzgox5ESVj+n9ayzn'.
'XeBC9GPzpDdE1yyFHnv9/v+697HFJyXpoo6xasa3X8OSCUw5U/'.
'7gkrN1Hvk95aWLyPZrFKVO4fIEL1WAvnMBOWNIDhSuaPkn5zH8'.
'VMTD+ecY11+UZfevv9YNC10N/KGrXf/PzEoDa9If2lWnqfixDO'.
'+T+yBDRfJ80mqx8qexT7SlR5YPUuKVfVlfaiFaByI+qsavLTS7'.
'1IX6TbHUPuRz69Rl9/CN1G4uzfLBmWHNzB9mL1AHkK/r4mXoDH'.
'xZg256fpRKX1A/ZUNNRuujdB/uFsOlT1C885Q9MA9kPlFn8vv/'.
'P3OoHUP+wfefLSXWxof+AoZZNjVWPiL9Iuz0gGelfM/rMue/jm'.
'/OdiCQme56D4g6vudR2c+0vCh3dPuuZephWe2frKuqKmloN6W0'.
'7wY6Cg/wDC4dPNf+xTF7p7JEmE8jpiCsnbU/0iwzujW7YFhjyC'.
'HmUtH3j/2gAIAQIDAT8h/g1K4XLl8Klcb4MQWHNKII/erlzEqU'.
'y+Fy/BXC+G33uvPjXC/vShwAy/p+8r6Nfc7scp+iDUToR0tYGN'.
'Mp5cIb/8FfHRxi1RH7pSWSBvO8fLQn7ih3l/UuX9zIMcK4KjOw'.
'RBO6WlSpUr76fpsU4ipT4qmZf3Mb/SvhGXmXDMfoX9yErHee+W'.
'mYZSniMqiao4vEuX90PtEx59JodWJEPea+0JfFzVNPDqyvoa+5'.
'ENEUKFpbpObaAueYQcdWGbwPbgfP6YQy+Fy/uMqO8TAw6R2XDk'.
'0bmEdZXFillwmr9EKlSvudm7Q2+O+AzViSvwX7y0cNzx1GFDKq'.
'HF/QqV9BOAfZjntNjho+jbKI8CP8PXhJXA4HwhOAROAfxBTLGU'.
'uVl/QeLCL+GX4BxHBhUZmZ8JweCmP4ly/CGVhxeBHh84/wAYPC'.
'PhCR4GHgB/DHjCwcIrKwYxY/b+ODGUSovGiVKI8TwGVKOC/QqV'.
'9QiyUS0rw3LwhX9C/vfqlzEr/wAZf1DxVwqVK/8AAL4iBFrcr8'.
'enATS6h+W6Smuv/gHwiVsj6gjEq5kVH/hwlB1TWQzyOc6Uc9I2'.
'RZ8vz3i+/LL8Il0TJ7bS9Dgh8sCCcfea/onhY014C3NPx/pMUf'.
'h/aaI/zz7OAL7lTtD8fnKbL8fjBYfJwg/+APFvoZfx/U746y0O'.
'kBl0v1Eurv8A+AA8QzOz8NeK0KXRfe143D6Fy5cJsA0f9Rf/AB'.
'S/v5/4W+B/+K7l8T/xFf8AhK4XL8K//A//2gAIAQMDAT8h/g3F'.
'4VK43L4XKJ0Mb7xlS2DD73UzLZfGpXG+KuJ95v6VzHhPuCMtFf'.
'xl/cmUHfi0awtlwRKY4LxpxeFfQqV91EIQEt7TCdIMPfhdK+pR'.
'4H7g8V+AqbxeCnG5cxK8Vy/uZFK4P0CAy+E8a5iJwfuL2+gcA4'.
'DwrgeIZRxP3Bfab9p7YzEeA8DwLjwMPDXBXC4/byL7wE5OsG3p'.
'LxBfQuae/CuIjwM2lw8J90Y7YBDnMmO05Yr0iXEz0I46T9w4DA'.
'i8Eh4QlfdA2y0dSHTmAx0l7Ll8RKxGaR4h4Rly/uSgxFr6Zfgh'.
'9J8V+C/svwmrguJ4L4BFLuPEfQv6DCCXDTtwPsix1Yd+Dr9CoR'.
'ZDgwh47+i8DZtxI1ekv4KiXg2eH38K2FnhV4ON/wABgKjwV4r4'.
'HEjBDxEr6LDjpEYGNjgTXPZw08NEydJrzVTyTHSFbcGt6hV9Y6'.
'cBxzlEHLSBb+BfgqU41o8SHA+jPpPFp4E18Wnhp8C07cJZNc1T'.
'Rw0cKZW/4TL8VSvDfhp/iHj0c+BpE6xJpPwqLlhK4fhU/wCk/w'.
'CUsgVNc18CCDOAUn7g67/wSHGpmXL8dOAPt5/Er/we/wDGOD4r'.
'4XwX/MPobR8BjiuEX/CPCxhEL58LG/hF5/mH0No+KpUqVwvgv+'.
'JaSYB+fmJlm4zZafZbH6NcFcbgy/4NuwoBAydYAZxCwYqD7GY7'.
'xfqsqVxDjUqVxqVHwOVaYyUu4GjLGc/Y0JpF+viV9C5f0djexw'.
'XI3IZL0TX9jX9I/lUrzJRuWrrK94Iv7dfDH0b8b4leZYraVQBm'.
'W+cf3S5cx9Al+IRrU1eIbJDnIPvz9CpUTgU2aQfftX1K+/v/AI'.
'd/8VUz0l/+Nf8Aw9y5cuP/AIepXF/8Rcv/AMFcuY4VK/8AF5ly'.
'5cfvH//aAAwDAQMCEQMRAAAQAAAAAAAAjusNUeH7QgAAAAAAAA'.
'AAAAAAAAAAAAAAAAAAAgcAFr2xm5mYAAAAAAAAAAAAAAAAAAAA'.
'AEAAAAEOgpUf4k0YcAAAAAAAAAAAAAAAAAAAAAAc3bMgHbq7DG'.
'h2RkAAAAAAAAAAAAAAAAAAAAAAFxHmLgZsn5E6qPQAAAAAAAAA'.
'AAAAAAAAAAAAAHSrsJBISRZPq0XMAAAAAAAAAAAAAAAAAAAAAA'.
'AeqqlZv49XwF25XgAAAAAAAAAAAAAAAAAAAAAA1UH6qR7puQ5a'.
'hFgAAAAAAAAAAAAAAAAAAAAAAH83Gsu7TuQWM7z0AAAAAAAAAA'.
'AAAAAAAAAAAAElPPXf3eF461kTWAAAAAAAAAAAAAAAAAAAAAAA'.
'yfgTh5xU5mSWe7QAAAAAAAAAAAAAAAAAAAAAAhViLA/tzJoOBZ'.
'qfAAAAAAAAAAAAAAAAAAAAAADUxtBm6/yN2SELzAAAAAAAAAAA'.
'AAAAAAAAAAAA7n19AT43cwywgSMAANAMAAgAEAAAAAAAAAAAAR'.
'GpCwSdcO+W2G2gAAGyowAEkEAAAAAAAAAAAAH+SctjL7wGj+2H'.
'DAAEUUqEgfKeErny7AAACAAAp2MEfXgwjrzikHYAAmCIdMhAms'.
'EHVR4AAmFgAEJhio12SF4OiQvMAAE8ADmCFvH+sg0wgAkEkgAA'.
'lTSGQIlYK0kHHAAAm8JUa2l1Ez5Q+sAhudcAAH8gR7GUesfBAO'.
'gAAAkAEBBkEMEpkIMAnM25IAEysS12VI0GcE10AAAlsAAAAAEE'.
'AgEgEm2AjydA3AeTUiwVwhVhKAEc7y4AAAAkggAAgAh489iFUD'.
'u7i1rSlbCjZO4AxCo7AAAAEEAgEEkknli1V94nRfaD+aEkY4IA'.
'Agzh94AAAAgkkkEgAEZmafaUAgBXrdMa8ggSXAHFelEgAEkkgA'.
'EAgkAE7h5ycAAACy9KBzxCWdAAa1jmAgEEkAgAgAAggEWgm0AA'.
'AGUO5jZhjZf1Aj5FNAkAkkkkAAgEgAAEl4UAAAEHjttfCULeGg'.
'Eny+QEAAgAkgAAgkgAAEEkAAAAn77orQit1EYAPUZwoEEEEkkE'.
'gkEEgAAAkAAAAAjJa4VJNGM0ADts1HAAAAAAAAAAAAAAAAAAAA'.
'AAZhpqfx9/sAAlmTD4AAAAAAAAAAAAAAAAAAAAAA9tJZkj7PAA'.
'AkksEAAAAAAAAAAAAAAAAAAAAAAnJBWHIjrgAAAAEkAAAAAAAA'.
'AAAAAAAAAAAAAAAh4rVYL9YAAAAAAAAAAAAAAAAAAAAAAAAAAA'.
'AAAktpOxJuAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAzmPcc6IAA'.
'AAAAAAAAAAAAAAAAAAAAAAAAAAAAH+Rpb+9AAAAAAAAAAAAAAA'.
'AAAAAAAAAAAAAAAAdFlSvBoAAAAAAAAAAAAAAAAAAAAAAAAAAA'.
'AAAE9WTzK0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAnBMivvAAA'.
'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAk0MDqAAAAAAAAAAAAAAAA'.
'AAAAAAAAAAAH//2gAIAQEDAT8Q/gA1UOpQrtCSZQAzYOA7BEKt'.
'EwoDBaalOTOcZC+4TjsGCRcl61lN6Q4obQ528/AjJAUuvIMFUR'.
'A7ankwhajZdS+dBOrfEW87pnhXpTUYSQUmxqEFjBuCZWsjNrXu'.
'MMRlLXGtUiZ47K5YKSwF4hOfdb4evPVb9AgKWwKVrBQ2pG1Pu+'.
'7w1Mfzv1gsFOCwdZByn2y13BphNjWuigG60JgJlwuvZBWNhJb4'.
'BCSt6knygxJRtEjKmJGwnC7BSRkoKANLJlpsXFDXaCIBD4ONC8'.
'jzmUjWVsNXOomZawuoBz1VAqEKm+juQRkDdkbVDuiNGkdGNpeL'.
'wCukkFpI4LS1sEqko0qYaJRZBsg6r9tCwPqZOLjag3pSkhI3eh'.
'8ogCWNnjFLYHeSZ9iyw3CztLMeHo3uyOHSwkoSBjDMHihyoyyG'.
'3sr1Ql8sl0PMsqG1KEDoCyAwjBlarXSQ2kbVGR3K8HratSB5UF'.
'81FFG7QINIeGKHXd4kNBEgBvJ1aQYXDTgF6oMDggDXWrKzVRYV'.
'WTlPoMcbizaJv8ghDugD7cZ6FoabaXEOWx8H2QAbXRPbD9tKop'.
't1QmSoPFpDyQOAn5HZzZB13J6xUlnoXfdcvgBg3V0IjcbY6xBb'.
'DApY7Gf6QzPjCpcqEt4BbfWMCypXXpzBeUTNknfNr6v0F0QqAC'.
'XSyY0sQyw0wBoNGDPhAsC3XrPImdLtJMOmWW3moqXcLywPONaD'.
'1eZJ6DPIpQNJS9pgBhum0LtqBLOc8U6uENhQUdjH27OZanJigO'.
'hqoiySdbhaDiAjNtA7bFjFAnzptrN5r6yCRKu70GuOxde1NkgP'.
'RNKAKWEjkny6mzoTMsFQtsa0TSkAMgAxqEUByUFCV9MSoFSsuT'.
'JXkwZFZQVJTelT2gCIebuGtqqSZBpyIyUCLjKZbKnrFGVCWaQe'.
'ainTW0wuGlBVoec6NYB+hrIGjMBvThxy9FFixBxioFK2pX2qYo'.
'DO0w/PMrXqKpos6O6EoZGU2CSXUBbCoDW1+3hMWCmwyeQSRig2'.
'OUakMaoIZzJEgK9VLnRFBSIhUhtKTNkZ4WXFQA2csygDnEmfML'.
'oXQDC2C19wGi53QD8fuZLVAssIENHIJpzeTPOhaTGhIxjQ0x0B'.
'frmYhoHpdoHesQIAcKD6WNlW9B9UOVd9RdXdBMAWgFw6kCighB'.
'U1GGDJZqVXyDAkj4dMvBdMm5p1BDJOYhgBM+dLWm9YQFQwwr0+'.
'ckJEaAQ6ManykzSqDsnAzJiD2D7coFKFq7VEPZLaZdUFaEpLht'.
'cAF7BdSz3h1mpkAWm+ZrGsTayIW4QiUjGWaN9kUIb8jaGIKtVa'.
'+5IUIoDDzCgGWpUioOyPPogCxW7/AGkXqtPIMEP4IkhGxBC4yt'.
'GkCrmkKWI7llysLEQ5JtoOVVtx/AIlg4dysGUBcuK73EEAxWMH'.
'3BDj0IdOFlSG2UrNi3QQtgOHZa7hAbVJqNXKE4aBsOTcYohXRb'.
'oAqtjCHGjAALxpFAJGpEba5cstCBdsn2+hYZq2tmMNiqjtAHox'.
'0lAMTm9Y4MSh1844QEumoaWGGmkL0mGUbl2AOcGAAYBQTlWldR'.
'i65LDbAuGj6qG1nhIRgBCiq4dTClbutrcS3A3mVQwsMsyPow4A'.
'1a1pibVHQwrTprRV82NhEGNeDWhhN0oZFGN+QNiLJ8qKUqTZ1u'.
'wQixoAdh9vNmGRNDEpdDVhbzbvjrWq0RNY3h6+copjXrDRiYiN'.
'QXqQLwREKqHYGnIa81d4pPFMOxpCo9Cw0MsJWfIuTNb+0dIpMq'.
'yjuASurpC0ZSV5U/uOI6WWRUbrcWwtMy8ssGqpFBlhDnHDrziy'.
'j7TwavUW2KMpOgw3mFHQ42wXiSPRyoOSqppb7eJD664Uv1IZ+D'.
'DugSPX8K7QC2odYKAWtckosacBGtc22KkkFBWZkuuBBJqNYBVw'.
'uGR5icIARb0WFuxI60wDzNpjYlUuWMWga9IbzXk76bwcQwxWoO'.
'PZjEUjvOXYZYKxrqL2jyIVuHqtEXEEEtjOi2sZzkq2+blmXPJr'.
'4hSleflGAIx1lGkIMB1EIAR6BQZSq4VM2wzKalGq94AxycHcc4'.
'nehKOtStSO5M4GQvsn7etVyiXoNrAAdsI7BhpGWgGIAMqEgEM7'.
'sAma3WwJQ6bzqBCIBTcVOV17sBK0bOuBb5dOqGsZkC00lmR1ea'.
'PRho0uXLH8EvlBHNxNvlORDQRgQw18YvXSipwK9CFAWF2a24y7'.
'zs/A+UBBVmXsQQ2Ba3EwJkNdD9wlnJXrAuhrmu7Kiq2TZ0EAsK'.
'W0a+2CiaqKLiumlJW85uzOs8YoKmyEOtCowILb5Jofbl1EPXL0'.
'DBUSj0ot0SyEwxQS11CRo1yHMhyVDEsCFnWOcP34da3XhgfErY'.
'jYORBcCVTWbEDxxDTbQbyoGmXJSp8kybPFQOFiFe2wi7S6Qiio'.
'BLDN5KiwM3ZqILFeSsdBCmKYr7SOLgqG7oyKhZisBeV5XpK/zc'.
'O6IHTXSCHWtvzhZI6uPiWXXPTyhGhlqflbVkOhiGqUaiGyVvnG'.
'I96mE6pswXHrdFje9BKUavS/bsxgOg1dYTBqty9ZvTCswau0Bl'.
'U2gZ6KXpbgLmFCqFQpz5xt7ZClZR5SiNFh00IHdLiGujsftEMI'.
'o6wmdpgcVEuoKoUyWsOsEJUr7QGl05BU0Y5FB5glCVE3CGhCBW'.
'rzW1sVrzlvNNC3vQQxBgehfuS1NYP7hA9CjvChOB+oGytM/uAV'.
'P4+ixKNj4FBVoM1Me3AFDNWCwNE09EtsNVzCKR0EA8o40wPtyl'.
'CnDkhATBZcms8RDAiGAqWnzEJvCqYaHOYPeODowtXaAYJU6RrL'.
'JqFU64jC1V8YpT9kEWSLqU6vaMbU3A0rWawo51lIAozk290Vrw'.
'q0FfK/iWg82YW5HzKwt50lDVVfflKRABgCUdWMIBYsgesaaU1R'.
'h3wg1nfbN718SCrHZCl+ZHLMKg9eBiYVo0BEMhwqUnnuV8Votd'.
'NZol9xqaauXEFQahpFLakBHRusMpG1AtVrQXNf5LMV5ArqKMAZ'.
'2NlSEmcmfNY+UGeZXMLXr0dMkgy5TAxsEWx0JRTZG90fQUSxra'.
'lQnqzuaEO6wo5jRcqrxobS5Tka94VW+mIVJtftGgwreJKzWXq7'.
'17syQ2oIDaN32jYM5cwhdoKsMGWQBOqLPqHMcAbYYh5yUobpMA'.
'9JcsaHPqp4Vqk8oPgpJLFs6SHtAVjVXvZIBG5rgNxi5rlgyYsV'.
'Ijfc2F5abQzRb5IAt34tIi7hsLiKLPtuGHge4dLLE4YQ87UUAs'.
'SE3Q2S+E9w5UJ232b33pIehJIahdol71G9q1lnJ/Jbj4XIINzh'.
'ZrRgVi/7GEiqWDmlwQWFUHyZFlmB6wKaN9YGsa6xFPeaXSFmk5'.
'YpxEG6YDtrLSyCi4UHNbmWc2iEAS3l0FeusoxbJpuaMHbbEoHa'.
'34xB0Gv7YlV3wEDZ2f3FXAwNNuDWGNRrCZwc+FqGrIKQvuYK7n'.
'SLCZdggBQBoHh9sxIC3eotpRjSWzdpuw1UNEJILHBdobZxw9h+'.
'oIa30mwZ5RQljPFLrOgCxiOQXbsVVtAxo40iqvklKC1iVFgp60'.
'C+SxHsze8hlD2hGr3bGgYZ3BAvhqCk6CgOr0nYGswLeM8UvVNy'.
'BEshQMdHE5HQQQ/awupqJAFLGIvHYYmw2UnT4jdkvrhCRSjShN'.
'nPJaYyW4jYgAvIRDo7/QDwApvmuS3S+XiSDGPgwcpgFCRBc01Y'.
'qympXkihAO29FGG8yItKjPYQpNEesaCy+GLYgKuBZL9p6EHetg'.
'e9ggETZR3hs9M3AaGaCJf0WOsVLmgHuSW9dcW9o8Acqe8Mhs5f'.
'KJaDW8QG3lmVxWYMo1RATaK6aMiJaauzoSxhDDVaWqb8UHtmaU'.
'ZACrOhCFgBqS0sNQ0b6xOlhMsVd8PPV+orxWKUVyIrYLUlqDEK'.
'ViaCJ6IsJY4AkVLA+JqxzYFGulHUrSpoVbgtKKXTXomlciN0F6'.
'yYBNYGts1GAdQiW4MBluXDceQDReOtRVa4Vqmt0BPjMMV5yQYB'.
'Xo3VMy3l1a1j2tlWmjzgIoljWOhEIzv4gxJYsnOYI0oVbVXm84'.
'fVDcjcPFAwFMgBz5zN0ORnyE7wYAlVK0IJAHlo5snJJQ5YxCGi'.
'0HMrE4iTMWnvI9o2nk2aiDh88HtANIrqU+8DASiUwVlssODsWx'.
'kczHrmYIvuv7jQo0fKuG5TV1Hqluga1f7mspjXznpivWVy5F84'.
'SW39EYeYMOvVPyg8AQrGbGDlSRTQEIgAAAGAOXi9swAMFqkFpZ'.
'WnYlfNAiealZwJqcHbcv1ALe9eoa9YPy9ye3IwHyBF3Y2uBrd3'.
'5nRw6RgYjQG3WYWGxzhqWpADbWdJhIBLQl3mX+pXRBuqZOki6Z'.
'O9BXrd5XPSJvVb45Vngp52ZRyhqQUpKDVjAo6BACjrAg+kMeFW'.
'j3eRccJuKM0DnQlqMFlNAtVKrzp7vogHUmAFAeeg3XxnbkClq0'.
'WwKECLOtIOJFOFSywvDUWI7gCTPqkpUgvPHLoqYsTt/wANIWqj'.
'Ci4UNjRIofXBZ7DfoTxkeS9GD5k9PYVLKr5UPoktPokWi8jCCN'.
'zqBn1iKUoNO8RZsYNkqBb5SnN6Aueeka9WGNN2Up6vxFcay482'.
'BDCG3BQJDairwjokDYLnUCa+N9sxLzTkBW43GlyxmewIAAhuM1'.
'rDFmm8PpfqKbF5bncEs7RgRdQmFgwDr54lmkNEQ2E3Jj9bclRN'.
'XmJTEKXq0NLjMBdgL2d0XiNW8zRuJbGW4EyeYgeFqgvfARIGkN'.
'bs27iK6W8PmJiWI0RKlGhKbghHQ1WlL1XmQZ5lnlJoxZhRpWq0'.
'SoM7YlaWbw+2PA/NF7S7HBOO4ZEBiUNMbo4PckA82+BDu7V1Ii'.
'wvnYJg2b47dvM8TFfKdOddT4ITBTmbUCKb0lbdTKJV1ojcOgYs'.
'i6g7tcPTRLRgx5CGp/DGpM93dyTq9mbC97lJpF0Ae8JQFdtDsa'.
'wMBHso6Qe3hg96OzybiJ3IsNpFOE98XUCdQSjujT745LAzc4V5'.
'esSC0sW1fKKvBtghTHLaBgc/21MmYqwZVvOYz6mayHohO9LGZm'.
'i3xSw7pDfv4wsTnHXM5YIX0goHKcnxVRXzMqYeJqTTnbc6/giL'.
'JUBAqpcHMqAVq22Lf0QAYVaIq8nYnCvBQ10JoDbRmp06w4QYxk'.
'y5sHkzltasC9gNBLSxC6YkfGA6YPdcmLZGs3KW5vZ8lQ0NJSWD'.
'leaCGyG/Pll1UnBVtIsVfSaUygmhIUZCilAgWlFU21vLAsABbp'.
'sx0XoQWGDz1RNmRTe4UGDrV1yND0gSUen8BlMZRoBaL/S3/gKJ'.
'dKPJK1LSq1XuDYhgSuvS6vsuboNMEBKTC1qDrUeUDUJ9gKllBK'.
'98H0Ym2+0u/IpBTXdqfMgdyrf2OCpv8YZYQDo/PUh8nUMr1uNW'.
'yqmgHIyQqRdQp62RWjWvAwmIAxcNrWXnoyy4GoVQSWoHeu0RrG'.
'qynsfqFWVgFSrXiocFyGR1zAjV7XUKtR9EVks+olFcuA/BAnqB'.
'rfXmSJs9YLEKlKU12FBrZo5bYVoNU382EXxunIAUMIBjKMNBfU'.
'Mpq13dAw3UrmkbVY2IR7gfzTRF6l8BiAGsRjEus1LDIbzjoeXY'.
'WmCV9detVYkk1rLpDdPJ60NSQvBqcGMN0hBua89JFWwsN9I4mw'.
'QZMdO8EOwDoxCm0Ppbu+o5wFR5StY0dbj8I5c1TWXOMFi6wQs7'.
'EEKwWoOqsIBRUjkBsIBFhDxE6bgjoERsDyCfUmPMUbhBmIaAP0'.
'Y2ia6wIWklogL0SUwTZ92JhMQ6BfOEulOahg11Nq89KQq2wanr'.
'ERHk8sVQT6IYpYed4AC3SF7VwUWHBoHqImYVqdEANJUtREay0K'.
'vB1TtLKu/4wlARyNXWLyQV1nBObJUCwUefWvAy1BN5c1crrc1d'.
'I24Ye/WO/pCmkQAEEQ89CNLwZ0kbDwajXUgiXnKcE2rTCPnW8C'.
'E0UQMf3ArOcB0nYJfaQBlWaKTDry73/S5SGdSgzUR9V90hCgow'.
'I61Ot4tCxM/EJCdHooAbAchQJPTaaypQttd0QrYvhTGDC0oNvt'.
'cuGzv98QKhORb04N9uLpMPqmvWGtBZpcIUZeUseCycx/6gsc2p'.
'NA2vtFYKaVG81jtqHOhWOBBbCLLwqGxaodeDqdbC3MAENXGkWs'.
'YnbQcAnbYQgwFEA5orKDkIQARz9ie5RqV2uocdV7y6ryYmXbtz'.
'EFIlg0byyzUCB/1K8qtCm6D6Ep6A5smmiBm2/wAqBUWLc9qcgP'.
'fiew8QxDyA/cEQINFXzqQ1FyJJ0dwNWK2AxhWBTKlsgbu5mPBH'.
'IhdQ6mBYBRNahDSQb5DwBuuW90g8Mm6FkIusy7rE1eVTRpDBSw'.
'REn5W1ivqDPpupL6NKZubaPwozSZP0aCPXsA4Mke6HEVFbBOtv'.
'BIOSkfCkLSbANakpdrxlanEBJQdFpctUyTarPjmuxwS39Vaotl'.
'sUaPm3qwBFTJOx3bXoETQV7FLHkCyHRU1Ri6vBPnXRXthUKhXh'.
'Rd5ABCKL5LCWKN2ng4cKakVYJyqCVlKblRpuno6ayhOSdeYTNh'.
'8VHMhdTh2ECjATNsxaOHp01VkVOilIa9REBTnSzzkCrVRTVag5'.
'lYvOlCnvzE3+GqV2q15ojlDs/tA7T2A9Ueqi60M74VcgpiamhR'.
'6PoVoV0Upa0pq6TkDZG0nkQJgbQ95Roa1sgnCKRjUrRsRRK+bQ'.
'Bbad5jPWJXz1sC3RBzrWYWwEJ0K43z3whnVQGuo0MahaAhnA3A'.
'17Oe++ageFF0HwBazLUaoiJoQNVcUZzxRvE7JiyEtFQoSNre4N'.
'CNAgBMrS8RlueRBQfwaPFpZUJnEiC0YUCVeG/qD0S6xKqMBZ5N'.
'dU5TJPpLxZtB7FvSYHFhpiXpoPRImfouQigKaZrRlyYV6f0Fvu'.
'JKPABAqEIjqiBvQA0ghWS9tnJM+mkrGnfFcq6UUKUYADozhBff'.
'AC4OxS6e/SAJHCNQ3avOWr5TOPWHQoUWgwhgrqQmuZloCJZLAq'.
'0KOYJzqv/oqGn9EUaNBqREdTYli2oloB1s3FEUq1ofzoGsNtAv'.
'DihlaGam+LxSHps+OFdKKcha6di3kpiIaGmVwYkFxrN07eALtx'.
'VznXMpFeFuISNJrmkpaWsH3M6RtpD3S1jdmC2DiRWV61RlArIQ'.
'K4X4NZpwG5pwHrxuZly5nx0SxcBA1OmckRlBEKeK3lkea9j1Lj'.
'NQ7bF+ib08llZqsqunHYMVBs3b6FE6mu/SaimrEvRzQSYGCKuV'.
'4q15l9RK1dpYHJuKde23nAiRbNrz4uai1ZAU3VQIJBa7qRMDgQ'.
'LGoHoHDcjSLm0ZSnAtgrzCtZp2KrBRBKsSazVxjB90BeDWRLg2'.
'tmsLyMEoXFZGdSZc9tMtQupCHbJLu19I8g1GRWRMcrcL03OWM2'.
'K3ehEIoxIqWV+tFfExHft2zNvg1gusMBMsvXdYAt6y7yAj+Oxo'.
'dcIEpgGBtOTxrlZDPXPVBVhreeddo/hdgQVcPIAhbWqhblW2QC'.
'q6lfTSPiCDTElK3CTRhQBaCiBFYxmQCwMC8OsjVgEJ3q1IHYoD'.
'Y5Lp/HbzEFKaKwpBVxH+tPZ7GLcWWL/CUFvScIQmJQOXsEzKlQ'.
'SmBOUtZYVwOCgQhFC2DKLj62hVSViqBVb7FRUobgv59IoWk8DH'.
'gfTdpquJppVi+CHlp+XXcYo6oiIvmaaCKt1tUd15SU5DsCg64S'.
'8FHOTWDT6AIloBbxagywELF0rH6ZCbKXrHVjTmiwJXaBUIClM1'.
'sYquSmxGF+N6WRbevGgQkA2KA2PJQRyYs1LCaTcogq07Bd5Xdm'.
'GOaRFJcYXfBmRWuyMgMbQZVd4owGpNKLzMTLAOnNzC4wPgGspQ'.
'ILRtHXNY00tdRkjCJytR9yY+opqbTDewB1rwB+yYrRRy6N6XhO'.
'Hqao1BqCBeyAoMvIIMCmovprElQsZvSKyC0hJcL8CK/50Vtg7J'.
'ioqscq4xSKjiCaQbkCu5BCoQEmmuMCOQhUNlcZtsNdCQTVWIwB'.
'jQCPTKQekh0Ohxm2etYdQg5Uxr7eNNY3VfAG3ELcPY4eCSyeI0'.
'GIBB/zo36GTIrymgHtDIhkBAHJfOyU2GIpKgoS2+EZ0HCYdZqn'.
'CNQ3OkQVjialu+KhgHThTiTgNBydLBGJloI23HQH6I5eS/kU6r'.
'SC03SFhiklBCzXGni5hI2OkBXbxaLhrIzXNKEKRRnaflNwBQzZ'.
'EM1pkHST1wpFo4tw1opC7EO9zjgUWjTFZpJwVpdW5sAay1Ei7E'.
'AuhFHC6QqXRCNmEtWSr03StvMOnSu7XMFdrFp0YR6tw89ENqmm'.
'RBwpY5RNwU8C6MsI5Mczh9FlhZAVS7yLvzPU25dRKppaIIBftw'.
'YklEHVMqZvOV5faPSwu25vLiJSy0i0ShouAC3NU4BLVeAg66BF'.
'TGrRTJUKNSSplC3BaSBKiwmNEImIBguGIN9EJAz0CASLkaoUYh'.
'usqIAIaUlNP0rQuEfbm2K/l0vIxCdSMbB2SSu6MlKDk6APi91e'.
'jG0sCZQVYXANyRpaXXNAa4CXiBUIKaWBw9m1gEYBAt2Ltvacnx'.
'BqACsI5EiPVaXLdQJDes5ZVcAEMWC2oDZhFX9MmCPZAriLwWQV'.
'+2hEGoKLDkJ0GJvciKa4dluEZFGoz63EMdsWXskarywRQGHpAS'.
'f3g8tDIppcoKLvta07hir6LbYAlma29TpDY+TKaQCje0V9oYaw'.
'2qDUkI06FTzuW+sxSrorunObwLgyVXFEBrlui14EqUovMZVwiL'.
'037IOkFZ2nCz6+WfdUU9IWtbFwC/ch2eP40RBdiGS/HX1KPqPj'.
'CRCxHURlmp2TBKD6t9YAa4wbpEtyermAGpjmSkxBdJY5b1cE+U'.
'2aADnWtiZHh/hUgwB2QUyh5dH1YrrHo3foZaJ55bfYZp1nPsie'.
'FiIaCreggqjYKvyjpT3iQ9qWLQMIQvVkqFiD6Gw2BCtEGQdCov'.
'Y+Ea0ppVxyv9KpssZxxICggjrNZNmHhrMKKJi32bcAwAN6qgiw'.
'+27MKISKGCYax2gdLcrpgNCDzP0wdydQs+UTpedezMNEnJzNIt'.
'xkKjLZfzsggMRoAHugHyO+KhSKBwIfeCd2IKa1SPZ+ABM1Qxep'.
'gqNGCBWJo4gg0qQuiWAC5VYAAAGAMAeFLIMXWqG2jQSIquZytI'.
'BjFDV3S89ZgofbVeu1Mp7EZZFsyV6yom5FuraAdS91/cKr6lR8'.
'ILq8h8DAMj5lSKbHWx+yS/YlSQrOLmX0ujbDdzR7IgzuzmGFyF'.
'g170pUeCOXujVSRkjAwFQBiI7h1eywYGveeH9eOpRwS+GZLqFo'.
'gUfbmDpUi6l4dJD9FBKRMVhijXzin6lLzdP9ot4r5P6kD6jR+Z'.
'czPRr+ZNUNa4T0jTO5OewgVRXJgmpN1RZRMGsEFKIvAnCiF5aX'.
'C41v18ilcpJbRQLlhGm6dU/Z99Szc83GkbqMKDGfpsGDjUP4+I'.
'k01Z/wISuzzR+0FMOhTfySLVw6CEonT+RIJ5uV/QzMWXQErJoM'.
'dfW8yYGcwuzBAdHuQ9NYjjrYAA0Cj77RLoPwYTo4AsFlxm+YkZ'.
'fMUTDCt2yZ7kUK7P8ArRHvlX1cAUqtoe0dt1o85C4FLV3He6yS'.
'5Mq0jHE7otGCPMlR5xNp4mUgxWq5Eti2ffyYtx6KSB4XNHDz5y'.
'5t+sYaNoaKD8zDAuST5xLPlCD9IZ1jrk/cWM79QeZBtsJdUF16'.
'IRaV2E+YTpk5WTmFtaU94EvJahQV/f3M9TImZRAKigbowM9wop'.
'3oyUHWbCDmOBHgJm+aQplXcv3TuNGu+sh1cYGmINBE/CpplTl5'.
'D+4Rzrqn4nILsZIWVSK1gDS6vv8AFl5hIbCFFSm9c8xtiMvyGi'.
'K2VwMJpWpSS4UA1LWEgW29ROpXWsjWurCtiARRxsxgddalWba8'.
'U8YVLR8FrsBbsRG6VTgzCAt2n8Dz+/uDLkU4PXJAiN0VSr0lE7'.
'orAPaNSErQQvK8CtUFa3wQe9grFZFftoGtLrMjdKAvbmgcU4sl'.
'Wi+U6KAQvFVN1XJFNVAZfW7YBwzniUAAACgwB9/QIgjhHRIpcy'.
'2brz0xJRXaC8hnqx+kNUAas0tW3eVQ87crW7eERiq4CIR5CiLE'.
'Uty12kEllbRByrAIwfawJCgmjgYwf+BxxxM30DXnC4b6pZRt14'.
'Goq6iIczwqfMKUxkKnNCJcpYtG33gP/9oACAECAwE/EP4ORctX'.
'AcpFEsZXaK4PSWIhMkOSCgsWwQv70qWnbwdLxF8GWsxEjGB4rX'.
'KL94DErrLQkqZTMvvLGAOkpiQWDEzKgZiy/t2sNtZ1ojRgXJL8'.
'RpwvnBhCOUrrG48alyhmGkbl7/cDnL1YG8ukFCkWEGJExi3aR1'.
'IYseOWWy5iXLlm5HhiXBuUcM4mn294JVYbQYSDOJCpAaAmiO6L'.
'nMuBcvw54MqW3LwDBqeUvGfuBtlUMq8Bpgt4jmYohADCEVyjwL'.
'RuXDTg1xZklw4L9vdI6kWprAgcCVLiy4gJeqJmcJGW3AYnBUKQ'.
'vrKIfcNWVloowqEI8Xg04NjcXogQgpc0sTbjqPBuKjAMqH3Cxm'.
'FYWYIAWXfETBIUQbplxY2wUSi1wWUaBKCoqI54mNYg1JVlyrlf'.
'cGZIs2w1BEJWIStiEtJWxHZMTHBNxhA1Y3TCpmLwso4KYzb7eL'.
'ZnGYwlhya0IjILDohQmdLcL1wFVgAgSDTGuocShuckefCxrgHl'.
'BfcC0S6Y+E7RV8XhARoROcFJUTMTUuYNnG5WU4oISo9Ys8HjRM'.
'zHWEXN/t4W1NyXUJpDiwYcETYJhmBC0ahZcFixMnxb8Kg+Ko8a'.
'+yhuKLFuYIGXFhMxFhO8TFHWUE0cHSbXjo4XBleIMS5lRh4Or9'.
'jZfacUBdEFA8BwuXFgUhDE1QwRcCvxBK4W+M0nSOt4usLHHC2u'.
'EVwRiVuUqGcLyUl8LmVzKVKxK+hXjumNGSYwLgm8o6Mu4MCXjh'.
'UAmqGCGWaIcSgWPNeO36JpFSQFRZ4Os0E08NZw1MxZmnE1TRG9'.
'+Be0bqapUeZbOZHDxhMRPoXmUMqCIHBmvBCaMQ6PHJjpBmKXRF'.
'ioVq+JMx+iaTbw1cHVmgmk4ajhqeOsLYl0FYmmaWajhq4Wy9eO'.
'5cv6KhcseB2lSuAoDeLuQSX7wIrfGC+CRMfRNCa+GqXHWJpANQ'.
'zQJUYeLilb4TSqi3FiMrgyxDfCAHE1DxVcriaeNjqQUmkplmpL'.
'NGMnwBrhCmXMG0rxP8FfC/q3wvxBLly+CfQ1zwuzjULNIIirqS'.
'lpHllMuV4Hxav2WuD4CMfEuPHcvhUzLS+FeBK4q3LnP4a4Khbh'.
'afygjCPgPGx4XN4njuXMRPDRE4MaoFHgC5ZFJiRvAAJB1C4f5I'.
'xhHgRhx24PgzwupcvjXjuXwTlKjwqC6PDexKUZmBoXMyMsqWY/'.
'yr4J4XgRfoV4blSvoXNeGZv4AubkwGaI4ZYohHBmF2P8y4cL4X'.
'L4X9F8FSk4kWVK8JxBnPgsYi+X0KvCSKqAJbFv+aPCoypUfoLT'.
'wuaypUrhcxKicFxrjXACNVBR4Bbx41BQ0Jiu7E1/z1Us4NRfop'.
'cGX9FWXLhBjrwXM2mvh1xlCXEgjRjEwwFJQ/bagZifTPA6xAhr'.
'wuowyhJxlyQLRB5pA5+3Gv06i1jhXB1ljnwkqhamzSWaxSCOFH'.
'cfu2JiVNjL4MAV8Y8DBSMQ5pb4/dqleB0l4hx9MeBfuA+Koysw'.
'C8sTlwdIwUffW7lzXjXC2apa4gXDw2iff0h4ag1LZdyokfv7Dh'.
'Xgvhcvhy+/sOFZgSm5WJUqVKlQ+/viuLCKTEcE0ff95Z4g4NiV'.
'U1/8DXBTLSsEeBLlmIFf+GolSmIwC+v3j//aAAgBAwMBPxD+CU'.
'YK4mJRlxgTJpLQ55iECawkocxRjySjWAzPP3kbG4gykoacKu5M'.
'SuC0zLhSFtZhijWXHDBR94umWlkvrMktlyjhmXCGKmZrGwIGB9'.
'u0FiNEYgykWbRJXhdZXDMxLzrCX4SNwcKibfcOSZaXlEtlRYKQ'.
'IMb8w5cbVw0mDGo4SoypmAw0hCFGsvhjMu2/t5KSABFtWMVYTo'.
'iwBAukKawwHwUynWPgs8NmkpHDF58NX3DAjthcUS8aYgjeA4gb'.
'bEpiXQTnBYLhGARczMDgQhLKNpVscfcNU14WzNJrizXMdIaQMn'.
'AIG5qmDiCAyzbjXAhIrWcmUkTX3AwXM1ICRuXhi5mk0JeIJvLO'.
'A9oGI3Y4amo8G8GBBYo0iv3HtReqApcMalVzAq4q4NSEtCiZM0'.
'IWYqIN4bYM+BgEmrWUmTgX2/qlRmKFEV1KwWMEy5TDYDKbwFDG'.
'zSA8N4muPaaWmbD4QRiy5cdft+ipiCCVyZll1hiAAxFxLBCzEp'.
'pioAQ1xXmMhTNLio4cQ8JeNzEr7eFsqtmcgO8UqglsW6oJ0lqe'.
'CyqhVygiqVKYIoJcy7YLqDHhoeNVxcfb7oubcpissNZcvE3jpN'.
'YDU3IZxFohRzLOATNAx4bgwZc1eKkG+DKfZUGNpyMJtR1lYgiT'.
'EEGM7DDm4QS6mqENZivxVMzCDmXfiVLGVwCXtEVPBoPsZjMp4F'.
'aR2maypeY6TaECG6V3EjRKtmBwGuBr4z46WypQYcJNBGoqHeTg'.
'9hMWkzHAfKXrTMvemI7pOCkBHorg5sl+Uvyl60zKl/XCyE6wxR'.
'L01FzCJU3iwmIQtzTHLNCZsdyxCDf6A4+he25YrjTpThwLUXLX'.
'uWt4LXrgWlw6MXvAtCLvDz4HYgtCpvaopKZebjpRaKRVfRrx2m'.
'3FhSJioyCanHRNUW8Q1MrBm4YPEsTXEfoDLKU8BfAcEFOAt4HP'.
'hQESbsy9awcrgrMA2QwMYcuFa8DkQH0CqhE8ZOaa+F14EMXiNo'.
'ysRDMDEDMOPFtBg5j9AKuJcHHDpxTNCZlMwRRHBCbEgNZCmnDU'.
'jASs1U5AkAUQYYhQ2RLmMECAIyOIQWUUjxA3mIVMcE8ZWMrg2l'.
'CWlZfhojB5ZVwrgeCtX+BXCvDUqVwqVxqVK8Q5xeJxTwrRAoDx'.
'VGKZcGX4r8FcHB9G5f8ALWGcRfAR4MSuJDP8MHEWSpyeG+C4g4'.
'C38pZU1R4kOBr4Qlopcw6MdTOZAXB+jfgviVDmLb4FUpgFyklz'.
'RESQBVaQ/lrMeATMDgOfG0RPC5cAwcIpwrxkqVjhhg0vhoJYhC'.
'ASWUSueYiOIfymEeJLiwIqxHnx3LuJ4LEXFQJaovCIxPEQ1mIv'.
'gWpszUfAAAhXWgNWFR/MqHG5c1hpbHI+mcOqJSX4NLMkGY4MJb'.
'hUPEqCCpgBFDesx/AgUECv5+ZURhUXv0AslTPC5cGNphwxAicC'.
'LmWnXFKiwuLb4FQwrfBIixNWDBDAV9guDjgX6KqVmafRqVwrEe'.
'JpwcHheGVxAVUQTCUhUlx9tGaYJwUSpUquFMpmeB4BCDiDcd+E'.
'2SouNWmvYpQyibEfbtvDeOIRRKlMqVLxDWaI0MeFlkpphDGSFl'.
'Qo1RD7aaR8W/C+FwL4Ym0VAeNOEgUlkVIKYfbniwOFS5fCuGjD'.
'Wb/Uk4Q+57TMz4Ll846Q1hrFb99JXG5cuFRCGN48w5x1h9/HxY'.
'gDvKShDBDH/gKmZfAIkJUqBNIrPv5xuLLJcya+AP8A4AIMqEuM'.
'qVGbTMC2LP38lMb43wupmFZltFr/AMDbgGKOBXDM1gVmLf8A4U'.
'gxflO2dkT94//Z'.
'');
}



function image_w3c_xhtml_valid() 
  {
	image_expireheader();
    header("Content-type: image/gif");
    header("Content-length: 2345");
    echo base64_decode(
'R0lGODlhWAAfAPf/AP///wgICBAQEBgYGCkpKTExMTk5OUJCQk'.
'pKSlJSUlpaWmNjY2tra3Nzc3t7e8DAwIyMjJSUlK2trbW1tb29'.
'vcbGxs7OztbW1t7e3u/v7/f391JKSt6trc57e8Zzc8Zra71aWp'.
'wICAgAAJQAAJwAAJwIAK1rY60hEIQ5KbU5GIwpCLVKIb1KIc5j'.
'McZaKaVSKdZzOc5rMd6EQs57OWNaUueUSt6MQntza1pSSnNjUh'.
'gQCDEhEBAIAGNKKVpCIe+tUq2MWoRjMUIxGP/v1ntrUpR7UnNa'.
'Mee1Y2tSKdalUve9WpRrKZyEWrWUWtatY86lWu+9Y72USue1Wv'.
'/GY5RzOd6tUrWMQoxrMSEYCIRzUqWMWr2cWt61Y//Oa1JCIaWE'.
'QvfGY3tjMc6lUu+9WsacSpx7OXNaKZRzMUo5GGtSIZSMe2tjUq'.
'2UWsalWue9Y4xzObWUSt61WikhEOe9Wv/OY9atUq2MQoRrMYx7'.
'UrWcWta1Y//Wa2NSKe/GY/fOY72cSpR7Od61UlpKIf/WY721nJ'.
'yUe5SMc3NrUr2lWjkxGDEpECkhCP/ea0I5GP/31ntzUv/nc//v'.
'c87OxlJSSpSUe1paShAQCBgYCAgIAO/39/f//97n573GxkJKSt'.
'bn787e57XO3r3W55S1zhBalIStznOcvWOUvUJ7rTlzpRhalN7n'.
'773O3q3G3jlCSgBKjOfv98bW56W91oytzoSlxnOcxmuUvVKEtU'.
'p7rTFrpSljnBBSlAhKjABChFqEtTlrpSFanBBKjAhKlABCjHuc'.
'xmOMvUJzrZy11iFSlAA5hAAxewAxhAApe9be787W5zE5Su/v9/'.
'f3/0JCSjk5SgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'.
'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'.
'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'.
'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEAAA'.
'8ALAAAAABYAB8AQAj/AC0IHEiwoMGDCC1IWsiwocOHECNGrPCg'.
'okULAAA8c/UrIwBmyFB5BAAKGTJhKHkpEwmAwbSXFRxMyOiIDp'.
'09cAJMsxRnDxg5mIyEMYNJzhRGkHxMi8OIUZhpOuT41KFjGhVI'.
'Zaa92WOzS5wzhixWxDjSlytbyGoBKHYWmayRAIYhywVAA9yRNb'.
'va5Eqni16/fbsMsvm3b9c9fgH33SODxIgRjkd4GHu3suXLcPP6'.
'3aPF2RbEYCZtcLNnS7RJQPBEw+Gm8GEYjiOTgMFoz9ewYsli3s'.
'1bc+LAwBML70J8uOHixhPfFvtANwBUwjwB+CSMVzBVJJXZAqAJ'.
'FzJWGTUU/7hgeQidQF68xIEkphESKHwEgekCRhCfrlcaxemy54'.
'uQOmCgwUcXczRiByRRCCFEIooI0oUUgKDg2AeUwTVMMuBlJEsy'.
'xjy3TC3QqJJLMrRowAB5GU0QAAUZmdfXE4hkEU0eiP1FQytt7D'.
'EIE9LgUeNmMjxGgmMh1GBDbLGpQAlzzvHm5F0uTtHFFIRNadiV'.
'imEpJZVbErYHX4Ytl9uTZEJJ2Jlopqnmmmx6tQRuF3mkyUiazH'.
'lXnXjWuVtNfXhxyReQ2KGDEX4IscN8YCQiRBxYUNWoJWSUcYkc'.
'dRA3RiKXlAHJF5ny5RVYTHoUSzKzeERLMqJ4dIsysWRUSjKmZP'.
'8EwQAZZLSAAR4N4RcjV+w0jRWM/GTJHH5AcQkWVO6hVBJdODUN'.
'GWgkIocidWiFlVWRfPmpGqF6VFIxAOTyCyvI3BLuLpkAYAowwi'.
'RTTCYaQHCZi1liqdhvVeqV5r1dMTIDZACPwEGTn7iCTCrpMrML'.
'L7q8AtcqwuyySWV2AeAiHVA48Yg0TXhqGBSHtLJBJ9EUcdyVe7'.
'Qwwgk/8LVHDbFBFkIHY8KVyTAjaTCMnaDkwoswuYTi0QQCvKRA'.
'rS2izIY0WwBWHBgJIOCEjktngW9gLAgpG8AtiBlnmWBbrC++Xf'.
'gh5V5guAEFlldi+XIJI8Dwo9cVVdDAAgrkjffeCvD/7XffgP+N'.
'd9+V9CCI4T0kjvjihy+eeOOHN+444pD34MUiN3QbNpm6Iuf556'.
'CHLnpxcVBRiOabO3kxm6y3zvpX3Nacuup0TDHGfH2BMcYUYIBB'.
'WO909C48GFPw7jthvHNJvF6wd/vJMaV4e8xbHr2CSy7YZ29uXR'.
'E4gNEFE4u9RxKWYCKoHH10gQUPXUCyhw5YuPHFF4pME8YXbgTx'.
'khF7MPLGS1fJylY2U4UzxO5rAOgFMmDhkVMIAzuuSoYtPOGJWE'.
'SsGQDIQAAI4IADDEAAKKLXHoQwDS8gZgpyeIkK5TCfLghiGnXo'.
'31PuIAIxfGEad8DEG641wL4U8IAVAsAr/1zBEgCcQhnb00Qqdu'.
'EwZgijYRk5gLw8giIA1KQLN6SUHGrYBR1gAgxcsYQO5rMHL0wj'.
'CTKchhjs8BI7HMFagJhGIsIQBirQ4StLkh0ASrGMtwyDF95JVS'.
'0wBIBZJMMVtUhXBhJQsbvUhErEkZLTqkS2ewmHK8SpXSY3GYcX'.
'BAwEzRlJJnaRClgI4xTPIKUpt1cXVgQjGW+pQCPhYh5+TTJf+a'.
'rXyfjVF0Y0BkmSCeVIZnESXrSKFMj42SoeZh1oYKaWi4FCE46g'.
'r65MoQl4YMITMommTMKgZcdhjNYeM5kgegQXyiCGR1ChHQDEwh'.
'TOBIAslIELClQALhGQAE1sMv+FNZAsGlsYTJaY4AyrHSEBrdjC'.
'vlT2mCL1L0gAc4wJUJeRVQQjXRlRmHRgsYuD6QIZo6jVBQzAAA'.
'coYBoJ8IgjqNTLpQW0baFBgB5u0oRWEOFMxFFCCsY5pIiOYAWA'.
'AKIw6RRPj8zyGaFgIFw0cAEM0PJMnJFGHgQKheMRQRpaYMQgHu'.
'EMJoApnC54DGR6OoIY2MaAFJ3dvKC6BRy0wS9gyMEaWrOHNtAg'.
'Ggg4BBfa1rZmHQlgtPFL8/So1stc0TW3dNogbonLxDCiBnIDzB'.
'5+yJwLaMACFMisZjfL2c56VrOc4AQhovAH0pY2CqRFrWpVe9rV'.
'pra0sG0tbFFLBjIGfCENQg0IADs='.
'');
}

function image_bl_pix()
{
	image_expireheader();
	header("Content-type: image/gif");
	header("Content-length: 43");
	echo base64_decode('R0lGODlhAQABAIAAAGYzzAAAACH5BAAAAAAALAAAAAABAAEAAA'.
	'ICRAEAOw=='.
	'');
}

if (isset($_GET['image']))
{
	$image = $_GET['image'];

	// use external
	if ($imguseextern)
	{
		if ($image == "dir") { loadimage(0); die(); }
		if ($image == "login") { loadimage(1); die(); }
		if ($image == "album") { loadimage(2); die(); }
		if ($image == "link") { loadimage(3); die(); }
		if ($image == "cdback") { loadimage(4); die(); }
		if ($image == "root") { loadimage(5); die(); }
		if ($image == "saveicon") { loadimage(6); die(); }
		if ($image == "spacer") { loadimage(7); die(); }
		if ($image == "w3c_xhtml_valid") { loadimage(8); die(); }
		if ($image == "kplaylist") { loadimage(9); die(); }
		if ($image == "php") { loadimage(10); die(); }
	} else
	// use inbuilt.
	{
		if ($image == "w3c_xhtml_valid") { image_w3c_xhtml_valid(); die(); }
		if ($image == "dir") { image_dir(); die(); }
		if ($image == "login") { image_login(); die(); }
		if ($image == "kplaylist") { image_kplaylist(); die(); }
		if ($image == "album") { image_album(); die(); }
		if ($image == "link") { image_link(); die(); }
		if ($image == "cdback") { image_cdback(); die(); }
		if ($image == "root") { image_root(); die(); }
		if ($image == "php") { image_php(); die(); }
		if ($image == "saveicon") { image_saveicon(); die(); }
		if ($image == "spacer") { image_bl_pix(); die(); }
	}
}

// end of pictures...

// start of class.id3.php ...
###############################################################################################################
###############################################################################################################
## START OF CLASS.ID3.PHP  - ADDED 17.FEB.02 - Thanks to Sandy McArthur, Jr for creating this class.
###############################################################################################################
###############################################################################################################
// Uncomment the folling define if you want the class to automatically
// read the MPEG frame info to get bitrate, mpeg version, layer, etc.
//
// NOTE: This is needed to maintain pre-version 1.0 behavior which maybe
// needed if you are using info that is from the mpeg frame. This includes
// the length of the song.
//
// This is discouraged because it will siginfincantly lengthen script
// execution time if all you need is the ID3 tag info.
define('ID3_AUTO_STUDY', true);

// Uncomment the following define if you want tons of debgging info.
// Tip: make sure you use a <PRE> block so the print_r's are readable.
// define('ID3_SHOW_DEBUG', true);

class id3 {
    /*
     * id3 - A Class for reading/writing MP3 ID3 tags
     * 
     * By Sandy McArthur, Jr. <Leknor@Leknor.com>
     * 
     * Copyright 2001 (c) All Rights Reserved, All Responsibility Yours
     *
     * This code is released under the GNU LGPL Go read it over here:
     * http://www.gnu.org/copyleft/lesser.html
     * 
     * I do make one optional request, I would like an account on or a
     * copy of where this code is used. If that is not possible then
     * an email would be cool.
     * 
     * Warning: I really hope this doesn't mess up your MP3s but you
     * are on your own if bad things happen.
     *
     * Note: This code doesn't try to deal with corrupt mp3s. So if you get
     * incorrect length times or something else it may be your mp3. To fix just
     * re-enocde from the CD. :~)
     * 
     * To use this code first create a id3 object passing the path to the mp3 as the first
     * parameter. Then just access the ID3 fields directly (look below for their names).
     * If you want to update a tag just change the fields and then $id3->write();
     * The methods designed for general use are study(), write(), copy($from), remove(),
     * and genres(). Please read the comment before each method for the specifics of each.
     *
     * eg:
     * 	require_once('class.id3.php');
     *	$id3 = new id3('/path/to/our lady peace - middle of yesterday.mp3');
     *  echo $id3->artists, ' - ', $id3->name;
     *	$id3->comment = 'Go buy some OLP CDs, they rock!';
     *	$id3->write();
     *
     * Change Log:
     *	1.24:	Small change to the write() method because the old way it worked was poorly
     *		thought out. The new write() method has optional parameters. $id3->frameoffset
     *		added which will have the byte offset of the first mpeg frame and $id3->filesize
     *	1.23:	MPEG Frame pasrsion code should be perfect on everything but VBR mp3's.
     *	1.20:	Reimplemented most of the mpeg frame parsing code plus a whole lot more.
     *	1.10:	ID3v1 and v1.1 functionality completed.
     *	1.00:	Decided to rewrite and correct all my poor choices and to implement ID3v1.1
     *		Looking at my old code I'm ashamed I ever released it and called it functional.
     * 
     * TODO:
     *	Implement ID3v2 reader and maybe writer if enought people want it.
     * 
     * The most recent version is available at:
     *	http://Leknor.com/code/
     *
     */

    var $_version = 1.24; // Version of the id3 class


    var $file = false;		// mp3/mpeg file name

    var $id3v1 = false;		// ID3 v1 tag found? (also true if v1.1 found)
    var $id3v11 = false;	// ID3 v1.1 tag found?
    var $id3v2 = false;		// ID3 v2 tag found? (not used yet)

    // ID3v1.1 Fields:
    var $name = '';		// track name
    var $artists = '';		// artists
    var $album = '';		// album
    var $year = '';		// year
    var $comment = '';		// comment
    var $track = 0;		// track number
    var $genre = '';		// genre name
    var $genreno = 255;		// genre number

    // MP3 Frame Stuff
    var $studied = false;	// Was the file studied to learn more info?
    var $mpeg_ver = false;	// version of mpeg
    var $layer = false;		// version of layer
    var $bitrate = false;	// bitrate
    var $crc = false;		// Frames are crc protected?
    var $frequency = 0;		// Frequency
    var $padding = false;	// Frames padded
    var $private = false;	// Private bit set?
    var $mode = '';		// Mode (Stereo etc)
    var $copyright = false;	// Copyrighted?
    var $original = false;	// On Original Media? (never used)
    var $emphasis = '';		// Emphasis (also never used)
    var $filesize = -1;		// Bytes in file
    var $frameoffset = -1;	// Byte at which the first mpeg header was found.

    var $length = false;	// length of mp3 format hh:ss
    var $lengths = false;	// length of mp3 in seconds

    var $error = false;		// if any errors they will be here

    var $debug = false;		// print debugging info?
    var $debugbeg = '<DIV STYLE="margin: 0.5 em; padding: 0.5 em; border-width: thin; border-color: black; border-style: solid">';
    var $debugend = '</DIV>';

    /*
     * id3 constructor - creates a new id3 object and maybe loads a tag
     * from a file.
     *
     * $file - the path to the mp3/mpeg file. When in doubt use a full path.
     * $study - (Optional) - study the mpeg frame to get extra info like bitrate and frequency
     *		You should advoid studing alot of files as it will siginficantly slow this down.
     */
    function id3($file, $study = false) {
	if (defined('ID3_SHOW_DEBUG')) $this->debug = true;
	if ($this->debug) print($this->debugbeg . "id3('$file')<HR>\n");

	$this->file = $file;
	$this->_read_v1();

	if ($study or defined('ID3_AUTO_STUDY'))
	    $this->study();

	if ($this->debug) print($this->debugend);
    } // id3($file)

    /*
     * write - update the id3v1 tags on the file.
     *
     * $v1 - if true update/create an id3v1 tag on the file. (defaults to true)
     *
     * Note: If/when ID3v2 is implemented this method will probably get another
     *       parameters.
     */
    function write($v1 = true) {
	if ($this->debug) print($this->debugbeg . "write()<HR>\n");
	if ($v1) {
	    $this->_write_v1();
	}
	if ($this->debug) print($this->debugend);
    } // write()

    /*
     * study() - does extra work to get the MPEG frame info.
     */
    function study() {
	$this->studied = true;
	$this->_readframe();
    } // study()

    /*
     * copy($from) - set's the ID3 fields to the same as the fields in $from
     */
    function copy($from) {
	if ($this->debug) print($this->debugbeg . "copy(\$from)<HR>\n");
	$this->name	= $from->name;
	$this->artists	= $from->artists;
	$this->album	= $from->album;
	$this->year	= $from->year;
	$this->comment	= $from->comment;
	$this->track	= $from->track;
	$this->genre	= $from->genre;
	$this->genreno	= $from->genreno;
	if ($this->debug) print($this->debugend);
    } // copy($from)

    /*
     * remove - removes the id3 tag(s) from a file.
     *
     * $id3v1 - true to remove the tag
     * $id3v2 - true to remove the tag (Not yet implemented)
     */
    function remove($id3v1 = true, $id3v2 = true) {
	if ($this->debug) print($this->debugbeg . "remove()<HR>\n");

	if ($id3v1) {
	    $this->_remove_v1();
	}

	if ($id3v2) {
	    // TODO: write ID3v2 code
	}

	if ($this->debug) print($this->debugend);
    } // remove


    /*
     * _read_v1 - read a ID3 v1 or v1.1 tag from a file
     *
     * $file should be the path to the mp3 to look for a tag.
     * When in doubt use the full path.
     *
     * if there is an error it will return false and a message will be
     * put in $this->error
     */
    function _read_v1() {
	if ($this->debug) print($this->debugbeg . "_read_v1()<HR>\n");

	if (! ($f = fopen($this->file, 'rb')) ) {
	    $this->error = 'Unable to open ' . $file;
	    return false;
	}

	if (fseek($f, -128, SEEK_END) == -1) {
	    $this->error = 'Unable to see to end - 128 of ' . $file;
	    return false;
	}

	$r = fread($f, 128);
	fclose($f);

	if ($this->debug) {
	    $unp = unpack('H*raw', $r);
	    print_r($unp);
	}

	$id3tag = $this->_decode_v1($r);

	if($id3tag) {
	    $this->id3v1 = true;

	    $tmp = explode(Chr(0), $id3tag['NAME']);
	    $this->name = $tmp[0];

	    $tmp = explode(Chr(0), $id3tag['ARTISTS']);
	    $this->artists = $tmp[0];

	    $tmp = explode(Chr(0), $id3tag['ALBUM']);
	    $this->album = $tmp[0];

	    $tmp = explode(Chr(0), $id3tag['YEAR']);
	    $this->year = $tmp[0];

	    $tmp = explode(Chr(0), $id3tag['COMMENT']);
	    $this->comment = $tmp[0];

	    if (isset($id3tag['TRACK'])) {
		$this->id3v11 = true;
		$this->track = $id3tag['TRACK'];
	    }

	    $this->genreno = $id3tag['GENRENO'];
	    $this->genre = $id3tag['GENRE'];
	}

	if ($this->debug) print($this->debugend);
    } // _read_v1()

    /*
     * _decode_v1 - decodes that ID3v1 or ID3v1.1 tag
     *
     * false will be returned if there was an error decoding the tag
     * else an array will be returned
     */
    function _decode_v1($rawtag) {
	if ($this->debug) print($this->debugbeg . "_decode_v1(\$rawtag)<HR>\n");

	if ($rawtag[125] == Chr(0) and $rawtag[126] != Chr(0)) {
	    // ID3 v1.1
	    $format = 'a3TAG/a30NAME/a30ARTISTS/a30ALBUM/a4YEAR/a28COMMENT/x1/C1TRACK/C1GENRENO';
	} else {
	    // ID3 v1
	    $format = 'a3TAG/a30NAME/a30ARTISTS/a30ALBUM/a4YEAR/a30COMMENT/C1GENRENO';
	}

	$id3tag = unpack($format, $rawtag);
	if ($this->debug) print_r($id3tag);

	if ($id3tag['TAG'] == 'TAG') {
	    $id3tag['GENRE'] = $this->getgenre($id3tag['GENRENO']);
	} else {
	    $this->error = 'TAG not found';
	    $id3tag = false;
	}
	if ($this->debug) print($this->debugend);
	return $id3tag;
    } // _decode_v1()


    /*
     * _write_v1 - writes a ID3 v1 or v1.1 tag to a file
     *
     * if there is an error it will return false and a message will be
     * put in $this->error
     */
    function _write_v1() {
	if ($this->debug) print($this->debugbeg . "_write_v1()<HR>\n");

	$file = $this->file;

	if (! ($f = fopen($file, 'r+b')) ) {
	    $this->error = 'Unable to open ' . $file;
	    return false;
	}

	if (fseek($f, -128, SEEK_END) == -1) {
	    $this->error = 'Unable to see to end - 128 of ' . $file;
	    return false;
	}

	$this->genreno = $this->getgenreno($this->genre, $this->genreno);

	$newtag = $this->_encode_v1();

	$r = fread($f, 128);

	if ($this->_decode_v1($r)) {
	    if (fseek($f, -128, SEEK_END) == -1) {
		$this->error = 'Unable to see to end - 128 of ' . $file;
		return false;
	    }
	    fwrite($f, $newtag);
	} else {
	    if (fseek($f, 0, SEEK_END) == -1) {
		$this->error = 'Unable to see to end of ' . $file;
		return false;
	    }
	    fwrite($f, $newtag);
	}
	fclose($f);


	if ($this->debug) print($this->debugend);
    } // _write_v1()

    /*
     * _encode_v1 - encode the ID3 tag
     *
     * the newly built tag will be returned
     */
    function _encode_v1() {
	if ($this->debug) print($this->debugbeg . "_encode_v1()<HR>\n");

	if ($this->track) {
	    // ID3 v1.1
	    $id3pack = 'a3a30a30a30a4a28x1C1C1';
	    $newtag = pack($id3pack,
		    'TAG',
		    $this->name,
		    $this->artists,
		    $this->album,
		    $this->year,
		    $this->comment,
		    $this->track,
		    $this->genreno
			  );
	} else {
	    // ID3 v1
	    $id3pack = 'a3a30a30a30a4a30C1';
	    $newtag = pack($id3pack,
		    'TAG',
		    $this->name,
		    $this->artists,
		    $this->album,
		    $this->year,
		    $this->comment,
		    $this->genreno
			  );
	}

	if ($this->debug) {
	    print('id3pack: ' . $id3pack . "\n");
	    $unp = unpack('H*new', $newtag);
	    print_r($unp);
	}

	if ($this->debug) print($this->debugend);
	return $newtag;
    } // _encode_v1()

    /*
     * _remove_v1 - if exists it removes an ID3v1 or v1.1 tag
     *
     * returns true if the tag was removed or none was found
     * else false if there was an error
     */
    function _remove_v1() {
	if ($this->debug) print($this->debugbeg . "_remove_v1()<HR>\n");

	$file = $this->file;

	if (! ($f = fopen($file, 'r+b')) ) {
	    $this->error = 'Unable to open ' . $file;
	    return false;
	}

	if (fseek($f, -128, SEEK_END) == -1) {
	    $this->error = 'Unable to see to end - 128 of ' . $file;
	    return false;
	}

	$r = fread($f, 128);

	$success = false;
	if ($this->_decode_v1($r)) {
	    $size = filesize($this->file) - 128;
	    if ($this->debug) print('size: old: ' . filesize($this->file));
	    $success = ftruncate($f, $size);	
	    clearstatcache();
	    if ($this->debug) print(' new: ' . filesize($this->file));
	}
	fclose($f);
	if ($this->debug) print($this->debugend);
	return $success;
    } // _remove_v1()

    function _readframe() {
	if ($this->debug) print($this->debugbeg . "_readframe()<HR>\n");

	$file = $this->file;

	if (! ($f = fopen($file, 'rb')) ) {
	    $this->error = 'Unable to open ' . $file;
	    if ($this->debug) print($this->debugend);
	    return false;
	}

	$this->filesize = filesize($file);

	do {
	    while (fread($f,1) != Chr(255)) { // Find the first frame
		//if ($this->debug) echo "Find...\n";
		if (feof($f)) {
		    $this->error = 'No mpeg frame found';
		    if ($this->debug) print($this->debugend);
		    return false;
		}
	    }
	    fseek($f, ftell($f) - 1); // back up one byte

	    $frameoffset = ftell($f);

	    $r = fread($f, 4);
	    // Binary to Hex to a binary sting. ugly but best I can think of.
	    $bits = unpack('H*bits', $r);
	    $bits =  base_convert($bits['bits'],16,2);
	} while (!$bits[8] and !$bits[9] and !$bits[10]); // 1st 8 bits true from the while
	if ($this->debug) print('Bits: ' . $bits . "\n");

	$this->frameoffset = $frameoffset;

	fclose($f);

	if ($bits[11] == 0) {
	    $this->mpeg_ver = "2.5";
	    $bitrates = array(
		    '1' => array(0, 32, 48, 56, 64, 80, 96, 112, 128, 144, 160, 176, 192, 224, 256, 0),
		    '2' => array(0,  8, 16, 24, 32, 40, 48,  56,  64,  80,  96, 112, 128, 144, 160, 0),
		    '3' => array(0,  8, 16, 24, 32, 40, 48,  56,  64,  80,  96, 112, 128, 144, 160, 0),
			     );
	} else if ($bits[12] == 0) {
	    $this->mpeg_ver = "2";
	    $bitrates = array(
		    '1' => array(0, 32, 48, 56, 64, 80, 96, 112, 128, 144, 160, 176, 192, 224, 256, 0),
		    '2' => array(0,  8, 16, 24, 32, 40, 48,  56,  64,  80,  96, 112, 128, 144, 160, 0),
		    '3' => array(0,  8, 16, 24, 32, 40, 48,  56,  64,  80,  96, 112, 128, 144, 160, 0),
			     );
	} else {
	    $this->mpeg_ver = "1";
	    $bitrates = array(
		    '1' => array(0, 32, 64, 96, 128, 160, 192, 224, 256, 288, 320, 352, 384, 416, 448, 0),
		    '2' => array(0, 32, 48, 56,  64,  80,  96, 112, 128, 160, 192, 224, 256, 320, 384, 0),
		    '3' => array(0, 32, 40, 48,  56,  64,  80,  96, 112, 128, 160, 192, 224, 256, 320, 0),
			     );
	}
	if ($this->debug) print('MPEG' . $this->mpeg_ver . "\n");

	$layer = array(
		array(0,3),
		array(2,1),
		      );
	$this->layer = $layer[$bits[13]][$bits[14]];
	if ($this->debug) print('layer: ' . $this->layer . "\n");

	if ($bits[15] == 0) {
	    // It's backwards, if the bit is not set then it is protected.
	    if ($this->debug) print("protected (crc)\n");
	    $this->crc = true;
	}

	$bitrate = 0;
	if ($bits[16] == 1) $bitrate += 8;
	if ($bits[17] == 1) $bitrate += 4;
	if ($bits[18] == 1) $bitrate += 2;
	if ($bits[19] == 1) $bitrate += 1;
	$this->bitrate = @$bitrates[$this->layer][$bitrate];

	$frequency = array(
		'1' => array(
		    '0' => array(44100, 48000),
		    '1' => array(32000, 0),
			    ),
		'2' => array(
		    '0' => array(22050, 24000),
		    '1' => array(16000, 0),
			    ),
		'2.5' => array(
		    '0' => array(11025, 12000),
		    '1' => array(8000, 0),
			      ),
		  );
	$this->frequency = $frequency[$this->mpeg_ver][$bits[20]][$bits[21]];

	$this->padding = $bits[22];
	$this->private = $bits[23];

	$mode = array(
		array('Stereo', 'Joint Stereo'),
		array('Dual Channel', 'Mono'),
		     );
	$this->mode = $mode[$bits[24]][$bits[25]];

	// XXX: I dunno what the mode extension is for bits 26,27

	$this->copyright = $bits[28];
	$this->original = $bits[29];

	$emphasis = array(
		array('none', '50/15ms'),
		array('', 'CCITT j.17'),
			 );
	$this->emphasis = $emphasis[$bits[30]][$bits[31]];

	if ($this->bitrate == 0) {
	    $s = -1;
	} else {
	    $s = ((8*filesize($this->file))/1000) / $this->bitrate;        
	}
	$this->length = sprintf('%02d:%02d',floor($s/60),floor($s-(floor($s/60)*60)));
	$this->lengths = (int)$s;

	if ($this->debug) print($this->debugend);
    } // _readframe()

    /*
     * getgenre - return the name of a genre number
     *
     * if no genre number is specified the genre number from
     * $this->genreno will be used.
     *
     * the genre is returned or false if an error or not found
     * no error message is ever returned
     */
    function getgenre($genreno) {
	if ($this->debug) print($this->debugbeg . "getgenre($genreno)<HR>\n");

	$genres = $this->genres();
	if (isset($genres[$genreno])) {
	    $genre = $genres[$genreno];
	    if ($this->debug) print($genre . "\n");
	} else {
	    $genre = '';
	}

	if ($this->debug) print($this->debugend);
	return $genre;
    } // getgenre($genreno)

    /*
     * getgenreno - return the number of the genre name
     *
     * the genre number is returned or 0xff (255) if a match is not found
     * you can specify the default genreno to use if one is not found
     * no error message is ever returned
     */
    function getgenreno($genre, $default = 0xff) {
	if ($this->debug) print($this->debugbeg . "getgenreno('$genre',$default)<HR>\n");

	$genres = $this->genres();
	$genreno = false;
	if ($genre) {
	    foreach ($genres as $no => $name) {
		if (strtolower($genre) == strtolower($name)) {
		    if ($this->debug) print("$no:'$name' == '$genre'");
		    $genreno = $no;
		}
	    }
	}
	if ($genreno === false) $genreno = $default;
	if ($this->debug) print($this->debugend);
	return $genreno;
    } // getgenreno($genre, $default = 0xff)

    /*
     * genres - reuturns an array of the ID3v1 genres
     */
    function genres() {
	return array(
		0   => 'Blues',
		1   => 'Classic Rock',
		2   => 'Country',
		3   => 'Dance',
		4   => 'Disco',
		5   => 'Funk',
		6   => 'Grunge',
		7   => 'Hip-Hop',
		8   => 'Jazz',
		9   => 'Metal',
		10  => 'New Age',
		11  => 'Oldies',
		12  => 'Other',
		13  => 'Pop',
		14  => 'R&B',
		15  => 'Rap',
		16  => 'Reggae',
		17  => 'Rock',
		18  => 'Techno',
		19  => 'Industrial',
		20  => 'Alternative',
		21  => 'Ska',
		22  => 'Death Metal',
		23  => 'Pranks',
		24  => 'Soundtrack',
		25  => 'Euro-Techno',
		26  => 'Ambient',
		27  => 'Trip-Hop',
		28  => 'Vocal',
		29  => 'Jazz+Funk',
		30  => 'Fusion',
		31  => 'Trance',
		32  => 'Classical',
		33  => 'Instrumental',
		34  => 'Acid',
		35  => 'House',
		36  => 'Game',
		37  => 'Sound Clip',
		38  => 'Gospel',
		39  => 'Noise',
		40  => 'Alternative Rock',
		41  => 'Bass',
		42  => 'Soul',
		43  => 'Punk',
		44  => 'Space',
		45  => 'Meditative',
		46  => 'Instrumental Pop',
		47  => 'Instrumental Rock',
		48  => 'Ethnic',
		49  => 'Gothic',
		50  => 'Darkwave',
		51  => 'Techno-Industrial',
		52  => 'Electronic',
		53  => 'Pop-Folk',
		54  => 'Eurodance',
		55  => 'Dream',
		56  => 'Southern Rock',
		57  => 'Comedy',
		58  => 'Cult',
		59  => 'Gangsta',
		60  => 'Top 40',
		61  => 'Christian Rap',
		62  => 'Pop/Funk',
		63  => 'Jungle',
		64  => 'Native US',
		65  => 'Cabaret',
		66  => 'New Wave',
		67  => 'Psychadelic',
		68  => 'Rave',
		69  => 'Showtunes',
		70  => 'Trailer',
		71  => 'Lo-Fi',
		72  => 'Tribal',
		73  => 'Acid Punk',
		74  => 'Acid Jazz',
		75  => 'Polka',
		76  => 'Retro',
		77  => 'Musical',
		78  => 'Rock & Roll',
		79  => 'Hard Rock',
		80  => 'Folk',
		81  => 'Folk-Rock',
		82  => 'National Folk',
		83  => 'Swing',
		84  => 'Fast Fusion',
		85  => 'Bebob',
		86  => 'Latin',
		87  => 'Revival',
		88  => 'Celtic',
		89  => 'Bluegrass',
		90  => 'Avantgarde',
		91  => 'Gothic Rock',
		92  => 'Progressive Rock',
		93  => 'Psychedelic Rock',
		94  => 'Symphonic Rock',
		95  => 'Slow Rock',
		96  => 'Big Band',
		97  => 'Chorus',
		98  => 'Easy Listening',
		99  => 'Acoustic',
		100 => 'Humour',
		101 => 'Speech',
		102 => 'Chanson',
		103 => 'Opera',
		104 => 'Chamber Music',
		105 => 'Sonata',
		106 => 'Symphony',
		107 => 'Booty Bass',
		108 => 'Primus',
		109 => 'Porn Groove',
		110 => 'Satire',
		111 => 'Slow Jam',
		112 => 'Club',
		113 => 'Tango',
		114 => 'Samba',
		115 => 'Folklore',
		116 => 'Ballad',
		117 => 'Power Ballad',
		118 => 'Rhytmic Soul',
		119 => 'Freestyle',
		120 => 'Duet',
		121 => 'Punk Rock',
		122 => 'Drum Solo',
		123 => 'Acapella',
		124 => 'Euro-House',
		125 => 'Dance Hall',
		126 => 'Goa',
		127 => 'Drum & Bass',
		128 => 'Club-House',
		129 => 'Hardcore',
		130 => 'Terror',
		131 => 'Indie',
		132 => 'BritPop',
		133 => 'Negerpunk',
		134 => 'Polsk Punk',
		135 => 'Beat',
		136 => 'Christian Gangsta Rap',
		137 => 'Heavy Metal',
		138 => 'Black Metal',
		139 => 'Crossover',
		140 => 'Contemporary Christian',
		141 => 'Christian Rock',
		142 => 'Merengue',
		143 => 'Salsa',
		144 => 'Trash Metal',
		145 => 'Anime',
		146 => 'Jpop',
		147 => 'Synthpop'
		    );
    } // genres
} // end of id3
###############################################################################################################
###############################################################################################################
## END OF CLASS.ID3.PHP
###############################################################################################################
###############################################################################################################
// end of class.id3.php...

// THIS IS BETA. DO NOT USE UNLESS YOU ENJOY THE RISK OF VERY BAD THINGS
// HAPPENING TO YOUR DATA. That said, it doesn't write anything so it
// should be harmless. This has been tested on a few ogg files I've
// created for testing but that is it.

// Uncomment the following define if you want tons of debgging info.
// Tip: make sure you use a <PRE> block so the print_r's are readable.
// define('OGG_SHOW_DEBUG', true);

class ogg {
    /*
     * ogg - A Class for reading Ogg comment tags
     * 
     * By Sandy McArthur, Jr. <Leknor@Leknor.com>
     * 
     * Copyright 2001 (c) All Rights Reserved, All Responsibility Yours
     *
     * This code is released under the GNU LGPL Go read it over here:
     * http://www.gnu.org/copyleft/lesser.html
     * 
     * I do make one optional request, I would like an account on or a
     * copy of where this code is used. If that is not possible then
     * an email would be cool.
     * 
     * Warning: I really hope this doesn't mess up your Ogg files but you
     * are on your own if bad things happen.
     *
     * To use this code first create a new instance on a file. Then loop
     * though the $ogg->fields array. Inside that loop, loop again. The
     * ogg comment format allows mome then one field with the same name
     * so it is possible for the ARTIST fields to appear twice if a work
     * has two performers.
     *
     * eg:
     *	require_once('class.ogg.php');
     *	$ogg = new ogg('/path/to/filename.ogg');
     *	echo '<UL>';
     *	foreach ($ogg->fields AS $name => $val) {
     *	    echo "<LI>$name:<OL>";
     *	    foreach ($val AS $contents) {
     *		echo '<LI>', $contents;
     *	    }
     *	    echo '</OL>';
     *	}
     *	echo '</UL>';
     *
     * This site was useful to me:
     *	http://www.xiph.org/ogg/vorbis/docs.html
     *
     * Change Log:
     *	0.10:	Clean up for release.
     *	0.01:	Got off my ass and wrote something until it works enough.
     * 
     * Thanks To:
     *
     * TODO:
     *	Collect nifty info like bitrate, etc...
     *	Maybe implement ogg comment writer. We'll see I don't like using php
     *	    to manipulate large amounts of data.
     * 
     * The most recent version is available at:
     *	http://Leknor.com/code/
     *
     */

    var $_version = 0.10;	// Version of the ogg class (float, not major/minor)

    var $file = false;		// ogg file name (you should never modify this)

    var $fields = array();	// comments fields, this is a two dimentional array.
    var $_rawfields = array();	// The comments fields read and split but not orgainzed.

    var $error = false;		// Check here for an error message
    var $debug = false;		// print debugging info?
    var $debugbeg = '<DIV STYLE="margin: 0.5 em; padding: 0.5 em; border-width: thin; border-color: black; border-style: solid">';
    var $debugend = '</DIV>';

    /*
     * ogg constructor - creates a new ogg object
     *
     * $file - the path to the ogg file. When in doubt use a full path.
     */
    function ogg($file) {
	if (defined('OGG_SHOW_DEBUG')) $this->debug = true;
	if ($this->debug) print($this->debugbeg . "ogg('$file')<HR>\n");

	$this->file = $file;
	$this->_read();

	if ($this->debug) print($this->debugend);
    } // ogg($file)

    /*
     * _read() - finds the comment in a ogg stream. You should not call this.
     */
    function _read() {
	if ($this->debug) print($this->debugbeg . "_read()<HR>\n");

	if (! ($f = fopen($this->file, 'rb')) ) {
	    $this->error = 'Unable to open ' . $file;
	    if ($this->debug) print("<B>$this->error</B>$this->debugend");
	    return false;
	}

	$this->_find_page($f);
	$this->_find_page($f);

	fseek($f, 26 - 4, SEEK_CUR);
	$segs = fread($f, 1);
	$segs = unpack('C1size', $segs);
	$segs = $segs['size'];
	if ($this->debug) print("segs: $segs<BR>");
	fseek($f, $segs, SEEK_CUR);

	// Skip preable
	//$r = fread($f, 1);
	//print_r(unpack('H*raw', $r));
	fseek($f, 7, SEEK_CUR);

	// Skip Vendor
	$size = fread($f, 4);
	$size = unpack('V1size', $size);
	$size = $size['size'];
	if ($this->debug) print("vendor size: $size<BR>");
	fseek($f, $size, SEEK_CUR);

	// Comments
	$comments = fread($f, 4);
	$comments = unpack('V1comments', $comments);
	$comments = $comments['comments'];
	if ($this->debug) print("Comments: $comments<BR>");
	for ($i=0; $i < $comments; $i++) {
	    $size = fread($f, 4);
	    $size = unpack('V1size', $size);
	    $size = $size['size'];
	    if ($this->debug) print("comment size: $size<BR>");

	    $comment = fread($f, $size);
	    if ($this->debug) print("comment: $comment<BR>");
	    $comment = explode('=', $comment, 2);
	    $this->fields[strtoupper($comment[0])][] = $comment[1];
	    $this->_rawfields[] = $comment;
	}

	if ($this->debug) print($this->debugend);
    } // _read()

    /*
     * _find_page - seeks to the next ogg page start.
     */
    function _find_page(&$f) {
	if ($this->debug) print($this->debugbeg . "_find_page($f)<HR>\n");

	$header = 'OggS'; // 0xf4 . 0x67 . 0x 67 . 0x53
	$bytes = fread($f, 4);

	while ($header != $bytes) {
	    //if ($this->debug) print('.');
	    $bytes = substr($bytes, 1);
	    $bytes .= fread($f, 1);
	}

	if ($this->debug) {
	    echo 'Page found at byte: ', ftell($f) - 4, '<BR>';
	    print($this->debugend);
	}
    } // _find_page(&$file)

} // end of class ogg

// start of gpl...

function show_gnu_license() {
?>
<pre>
		    GNU GENERAL PUBLIC LICENSE
		       Version 2, June 1991

 Copyright (C) 1989, 1991 Free Software Foundation, Inc.
                       59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 Everyone is permitted to copy and distribute verbatim copies
 of this license document, but changing it is not allowed.

			    Preamble

  The licenses for most software are designed to take away your
freedom to share and change it.  By contrast, the GNU General Public
License is intended to guarantee your freedom to share and change free
software--to make sure the software is free for all its users.  This
General Public License applies to most of the Free Software
Foundation's software and to any other program whose authors commit to
using it.  (Some other Free Software Foundation software is covered by
the GNU Library General Public License instead.)  You can apply it to
your programs, too.

  When we speak of free software, we are referring to freedom, not
price.  Our General Public Licenses are designed to make sure that you
have the freedom to distribute copies of free software (and charge for
this service if you wish), that you receive source code or can get it
if you want it, that you can change the software or use pieces of it
in new free programs; and that you know you can do these things.

  To protect your rights, we need to make restrictions that forbid
anyone to deny you these rights or to ask you to surrender the rights.
These restrictions translate to certain responsibilities for you if you
distribute copies of the software, or if you modify it.

  For example, if you distribute copies of such a program, whether
gratis or for a fee, you must give the recipients all the rights that
you have.  You must make sure that they, too, receive or can get the
source code.  And you must show them these terms so they know their
rights.

  We protect your rights with two steps: (1) copyright the software, and
(2) offer you this license which gives you legal permission to copy,
distribute and/or modify the software.

  Also, for each author's protection and ours, we want to make certain
that everyone understands that there is no warranty for this free
software.  If the software is modified by someone else and passed on, we
want its recipients to know that what they have is not the original, so
that any problems introduced by others will not reflect on the original
authors' reputations.

  Finally, any free program is threatened constantly by software
patents.  We wish to avoid the danger that redistributors of a free
program will individually obtain patent licenses, in effect making the
program proprietary.  To prevent this, we have made it clear that any
patent must be licensed for everyone's free use or not licensed at all.

  The precise terms and conditions for copying, distribution and
modification follow.

		    GNU GENERAL PUBLIC LICENSE
   TERMS AND CONDITIONS FOR COPYING, DISTRIBUTION AND MODIFICATION

  0. This License applies to any program or other work which contains
a notice placed by the copyright holder saying it may be distributed
under the terms of this General Public License.  The "Program", below,
refers to any such program or work, and a "work based on the Program"
means either the Program or any derivative work under copyright law:
that is to say, a work containing the Program or a portion of it,
either verbatim or with modifications and/or translated into another
language.  (Hereinafter, translation is included without limitation in
the term "modification".)  Each licensee is addressed as "you".

Activities other than copying, distribution and modification are not
covered by this License; they are outside its scope.  The act of
running the Program is not restricted, and the output from the Program
is covered only if its contents constitute a work based on the
Program (independent of having been made by running the Program).
Whether that is true depends on what the Program does.

  1. You may copy and distribute verbatim copies of the Program's
source code as you receive it, in any medium, provided that you
conspicuously and appropriately publish on each copy an appropriate
copyright notice and disclaimer of warranty; keep intact all the
notices that refer to this License and to the absence of any warranty;
and give any other recipients of the Program a copy of this License
along with the Program.

You may charge a fee for the physical act of transferring a copy, and
you may at your option offer warranty protection in exchange for a fee.

  2. You may modify your copy or copies of the Program or any portion
of it, thus forming a work based on the Program, and copy and
distribute such modifications or work under the terms of Section 1
above, provided that you also meet all of these conditions:

    a) You must cause the modified files to carry prominent notices
    stating that you changed the files and the date of any change.

    b) You must cause any work that you distribute or publish, that in
    whole or in part contains or is derived from the Program or any
    part thereof, to be licensed as a whole at no charge to all third
    parties under the terms of this License.

    c) If the modified program normally reads commands interactively
    when run, you must cause it, when started running for such
    interactive use in the most ordinary way, to print or display an
    announcement including an appropriate copyright notice and a
    notice that there is no warranty (or else, saying that you provide
    a warranty) and that users may redistribute the program under
    these conditions, and telling the user how to view a copy of this
    License.  (Exception: if the Program itself is interactive but
    does not normally print such an announcement, your work based on
    the Program is not required to print an announcement.)

These requirements apply to the modified work as a whole.  If
identifiable sections of that work are not derived from the Program,
and can be reasonably considered independent and separate works in
themselves, then this License, and its terms, do not apply to those
sections when you distribute them as separate works.  But when you
distribute the same sections as part of a whole which is a work based
on the Program, the distribution of the whole must be on the terms of
this License, whose permissions for other licensees extend to the
entire whole, and thus to each and every part regardless of who wrote it.

Thus, it is not the intent of this section to claim rights or contest
your rights to work written entirely by you; rather, the intent is to
exercise the right to control the distribution of derivative or
collective works based on the Program.

In addition, mere aggregation of another work not based on the Program
with the Program (or with a work based on the Program) on a volume of
a storage or distribution medium does not bring the other work under
the scope of this License.

  3. You may copy and distribute the Program (or a work based on it,
under Section 2) in object code or executable form under the terms of
Sections 1 and 2 above provided that you also do one of the following:

    a) Accompany it with the complete corresponding machine-readable
    source code, which must be distributed under the terms of Sections
    1 and 2 above on a medium customarily used for software interchange; or,

    b) Accompany it with a written offer, valid for at least three
    years, to give any third party, for a charge no more than your
    cost of physically performing source distribution, a complete
    machine-readable copy of the corresponding source code, to be
    distributed under the terms of Sections 1 and 2 above on a medium
    customarily used for software interchange; or,

    c) Accompany it with the information you received as to the offer
    to distribute corresponding source code.  (This alternative is
    allowed only for noncommercial distribution and only if you
    received the program in object code or executable form with such
    an offer, in accord with Subsection b above.)

The source code for a work means the preferred form of the work for
making modifications to it.  For an executable work, complete source
code means all the source code for all modules it contains, plus any
associated interface definition files, plus the scripts used to
control compilation and installation of the executable.  However, as a
special exception, the source code distributed need not include
anything that is normally distributed (in either source or binary
form) with the major components (compiler, kernel, and so on) of the
operating system on which the executable runs, unless that component
itself accompanies the executable.

If distribution of executable or object code is made by offering
access to copy from a designated place, then offering equivalent
access to copy the source code from the same place counts as
distribution of the source code, even though third parties are not
compelled to copy the source along with the object code.

  4. You may not copy, modify, sublicense, or distribute the Program
except as expressly provided under this License.  Any attempt
otherwise to copy, modify, sublicense or distribute the Program is
void, and will automatically terminate your rights under this License.
However, parties who have received copies, or rights, from you under
this License will not have their licenses terminated so long as such
parties remain in full compliance.

  5. You are not required to accept this License, since you have not
signed it.  However, nothing else grants you permission to modify or
distribute the Program or its derivative works.  These actions are
prohibited by law if you do not accept this License.  Therefore, by
modifying or distributing the Program (or any work based on the
Program), you indicate your acceptance of this License to do so, and
all its terms and conditions for copying, distributing or modifying
the Program or works based on it.

  6. Each time you redistribute the Program (or any work based on the
Program), the recipient automatically receives a license from the
original licensor to copy, distribute or modify the Program subject to
these terms and conditions.  You may not impose any further
restrictions on the recipients' exercise of the rights granted herein.
You are not responsible for enforcing compliance by third parties to
this License.

  7. If, as a consequence of a court judgment or allegation of patent
infringement or for any other reason (not limited to patent issues),
conditions are imposed on you (whether by court order, agreement or
otherwise) that contradict the conditions of this License, they do not
excuse you from the conditions of this License.  If you cannot
distribute so as to satisfy simultaneously your obligations under this
License and any other pertinent obligations, then as a consequence you
may not distribute the Program at all.  For example, if a patent
license would not permit royalty-free redistribution of the Program by
all those who receive copies directly or indirectly through you, then
the only way you could satisfy both it and this License would be to
refrain entirely from distribution of the Program.

If any portion of this section is held invalid or unenforceable under
any particular circumstance, the balance of the section is intended to
apply and the section as a whole is intended to apply in other
circumstances.

It is not the purpose of this section to induce you to infringe any
patents or other property right claims or to contest validity of any
such claims; this section has the sole purpose of protecting the
integrity of the free software distribution system, which is
implemented by public license practices.  Many people have made
generous contributions to the wide range of software distributed
through that system in reliance on consistent application of that
system; it is up to the author/donor to decide if he or she is willing
to distribute software through any other system and a licensee cannot
impose that choice.

This section is intended to make thoroughly clear what is believed to
be a consequence of the rest of this License.

  8. If the distribution and/or use of the Program is restricted in
certain countries either by patents or by copyrighted interfaces, the
original copyright holder who places the Program under this License
may add an explicit geographical distribution limitation excluding
those countries, so that distribution is permitted only in or among
countries not thus excluded.  In such case, this License incorporates
the limitation as if written in the body of this License.

  9. The Free Software Foundation may publish revised and/or new versions
of the General Public License from time to time.  Such new versions will
be similar in spirit to the present version, but may differ in detail to
address new problems or concerns.

Each version is given a distinguishing version number.  If the Program
specifies a version number of this License which applies to it and "any
later version", you have the option of following the terms and conditions
either of that version or of any later version published by the Free
Software Foundation.  If the Program does not specify a version number of
this License, you may choose any version ever published by the Free Software
Foundation.

  10. If you wish to incorporate parts of the Program into other free
programs whose distribution conditions are different, write to the author
to ask for permission.  For software which is copyrighted by the Free
Software Foundation, write to the Free Software Foundation; we sometimes
make exceptions for this.  Our decision will be guided by the two goals
of preserving the free status of all derivatives of our free software and
of promoting the sharing and reuse of software generally.

			    NO WARRANTY

  11. BECAUSE THE PROGRAM IS LICENSED FREE OF CHARGE, THERE IS NO WARRANTY
FOR THE PROGRAM, TO THE EXTENT PERMITTED BY APPLICABLE LAW.  EXCEPT WHEN
OTHERWISE STATED IN WRITING THE COPYRIGHT HOLDERS AND/OR OTHER PARTIES
PROVIDE THE PROGRAM "AS IS" WITHOUT WARRANTY OF ANY KIND, EITHER EXPRESSED
OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE.  THE ENTIRE RISK AS
TO THE QUALITY AND PERFORMANCE OF THE PROGRAM IS WITH YOU.  SHOULD THE
PROGRAM PROVE DEFECTIVE, YOU ASSUME THE COST OF ALL NECESSARY SERVICING,
REPAIR OR CORRECTION.

  12. IN NO EVENT UNLESS REQUIRED BY APPLICABLE LAW OR AGREED TO IN WRITING
WILL ANY COPYRIGHT HOLDER, OR ANY OTHER PARTY WHO MAY MODIFY AND/OR
REDISTRIBUTE THE PROGRAM AS PERMITTED ABOVE, BE LIABLE TO YOU FOR DAMAGES,
INCLUDING ANY GENERAL, SPECIAL, INCIDENTAL OR CONSEQUENTIAL DAMAGES ARISING
OUT OF THE USE OR INABILITY TO USE THE PROGRAM (INCLUDING BUT NOT LIMITED
TO LOSS OF DATA OR DATA BEING RENDERED INACCURATE OR LOSSES SUSTAINED BY
YOU OR THIRD PARTIES OR A FAILURE OF THE PROGRAM TO OPERATE WITH ANY OTHER
PROGRAMS), EVEN IF SUCH HOLDER OR OTHER PARTY HAS BEEN ADVISED OF THE
POSSIBILITY OF SUCH DAMAGES.

		     END OF TERMS AND CONDITIONS

	    How to Apply These Terms to Your New Programs

  If you develop a new program, and you want it to be of the greatest
possible use to the public, the best way to achieve this is to make it
free software which everyone can redistribute and change under these terms.

  To do so, attach the following notices to the program.  It is safest
to attach them to the start of each source file to most effectively
convey the exclusion of warranty; and each file should have at least
the "copyright" line and a pointer to where the full notice is found.

    <one line to give the program's name and a brief idea of what it does.>
    Copyright (C) <year>  <name of author>

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA


Also add information on how to contact you by electronic and paper mail.

If the program is interactive, make it output a short notice like this
when it starts in an interactive mode:

    Gnomovision version 69, Copyright (C) year name of author
    Gnomovision comes with ABSOLUTELY NO WARRANTY; for details type `show w'.
    This is free software, and you are welcome to redistribute it
    under certain conditions; type `show c' for details.

The hypothetical commands `show w' and `show c' should show the appropriate
parts of the General Public License.  Of course, the commands you use may
be called something other than `show w' and `show c'; they could even be
mouse-clicks or menu items--whatever suits your program.

You should also get your employer (if you work as a programmer) or your
school, if any, to sign a "copyright disclaimer" for the program, if
necessary.  Here is a sample; alter the names:

  Yoyodyne, Inc., hereby disclaims all copyright interest in the program
  `Gnomovision' (which makes passes at compilers) written by James Hacker.

  <signature of Ty Coon>, 1 April 1989
  Ty Coon, President of Vice

This General Public License does not permit incorporating your program into
proprietary programs.  If your program is a subroutine library, you may
consider it more useful to permit linking proprietary applications with the
library.  If this is what you want to do, use the GNU Library General
Public License instead of this License.
</pre>
<?
}

// end of gpl...

// start of styles...

function Kprint_header($html_title="",$js_out="")
{
	global $deflanguage, $klang;
	if (empty($html_title)) $html_title = "kPlaylist";
	$html_title = "| ".$html_title;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title><? print $html_title; ?></title>
   <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $klang[$deflanguage][1]; ?>" />
<?php   
	Kprint_Styles();
	if($js_out)	out_javascripts($js_out); 
	print "</head><body>";
}


function Kprint_end()
{
	 print "\n\t</body>\n</html>";
}

function blackbox($title,$code,$returncode=1,$bgcolor="#4F35B3",$textalign="center",$width="0")
{
// red:     #F57E36     //Hotselect
// ltblue:  #7494DE
// blue:    #4F35B3

   $mix = "\n<table class=\"blackbox\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"";
   if ($width != "0") $mix .= "width=\"$width\" ";
   $mix .= "  bgcolor=\"".$bgcolor."\">\n".
         "\t<tr><td class=\"bbox\">\n".
         "\t\t<b>&nbsp;".$title."&nbsp;</b></td></tr>\n".
         "\t\t<tr><td class=\"notice\">\n".
         "\t\t\t<table border=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\" width=\"100%\">\n".
         "\t\t\t\t<tr><td width=\"100%\" align=\"".$textalign."\">\n".
         "\t\t\t\t\t".$code."\n".
         "\t\t\t\t</td></tr>\n\t\t\t</table>\n".
         "\t\t</td></tr>\n</table>\n";

  if (!$returncode) print $mix;
  if ($returncode) return($mix);
}


function out_javascripts()
{
    print "<script type=\"text/javascript\">\n<!--\n\n";
    
            print "\tfunction openwin(name, url) {\n\t".
                "popupWin = window.open(url, name,\"resizable=yes,".
                "scrollbars=yes,status=no,toolbar=no,menubar=no,".
                "width=675,height=270,left=150,top=270\");\n".
                "\tpopupWin.focus();\n}\n\n";
            ?>
    function SelectAll() 
    {
        for(var i=0;i<document.psongs.elements.length;i++) 
        {
            if(document.psongs.elements[i].type == "checkbox")
            {
                if (document.psongs.elements[i].checked == false)
                    document.psongs.elements[i].checked = true; 
                else
                if (document.psongs.elements[i].checked == true)
                    document.psongs.elements[i].checked = false;
             }
         }
     }

	function add(value,text) {
		newentry = new Option(value);
		document.psongs.elements["sel_playlist"].options[document.psongs.elements["sel_playlist"].length] = newentry;
 		document.psongs.elements["sel_playlist"].options[document.psongs.elements["sel_playlist"].length-1].text = text;
		document.psongs.elements["sel_playlist"].options[document.psongs.elements["sel_playlist"].length-1].value = value;
		document.psongs.elements["sel_playlist"].options[document.psongs.elements["sel_playlist"].length-1].selected = true;
	}


    function chhttp(where)
    {
        document.location=where;
    }

<?php
    
    print "\n//-->\n</script>\n\n";
}



function Kprint_Styles()
{
?>
<style type="text/css">
<!--
body { background-color:#FFFFFF; color:#000000; }
.righttable { border-color: black black black black; border-style: solid; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px}

.smalltext {  font-family: Verdana, Arial, Helvetica, sans-serif; font-size: xx-small; background-color: #FFFFFF; color: #003333}
.fathr {  border-color: black; border-style: solid}

.toptable {  border-color: black black black black; border-style: groove; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px}

a:hover.hot { color:#EF610C; text-decoration: underline; font-style: normal}
.warning {  font-family: Verdana, Arial, Helvetica, sans-serif; font-size: xx-small; font-style: normal}
.bbox	{  font-family: Verdana, Arial, Helvetica, sans-serif; font-size: xx-small; font-style: normal; color: #FFFFFF}
.bboxred {  font-family: Verdana, Arial, Helvetica, sans-serif; font-size: xx-small; font-style: normal; color: #FFFFFF}

.notice	{  font-family: Verdana, Arial, Helvetica, sans-serif; font-size: xx-small; font-style: normal; color: #000000}
.buttom	{  font-family: Verdana, Arial, Helvetica, sans-serif; font-size: xx-small; background-color: #000000; border: 1px #CCCCCC solid; color: #FFFFFF}
.text { font-family: Verdana, Arial, Helvetica, sans-serif; font-size: x-small; font-style: normal; color: #FFFFFF }
.dir { font-family: Verdana, Arial, Helvetica, sans-serif; font-size: x-small; font-style: normal; color: #000000 }
.finfo { font-family: Verdana, Arial, Helvetica, sans-serif; font-size: xx-small; font-style: normal; color: #333333 }
a { font-family: Verdana, Arial, Helvetica, sans-serif; font-size: xx-small; font-style: normal; color: #000000; text-decoration: none}
.file { font-family: Verdana, Arial, Helvetica, sans-serif; font-size: xx-small; font-style: normal; color: #000066 }
.fatbuttom {  font-family: Verdana, Arial, Helvetica, sans-serif; font-size: xx-small; background-color: #FFFFFF; border: 1px #000000; border-style: solid}
.fatbuttom2 {  font-family: Verdana, Arial, Helvetica, sans-serif; font-size: xx-small; background-color: #D5D6F9; border: 1px #000000; border-style: solid}
.smallbuttom {  font-family: Verdana, Arial, Helvetica, sans-serif; font-size: xx-small; background-color: #FFF000; border: 0px #FFFFFF; border-style: solid}
.wtext { font-family: Verdana, Arial, Helvetica, sans-serif; font-size: xx-small; font-style: normal; color: #000000 }
.curdir {  font-family: Verdana, Arial, Helvetica, sans-serif; font-size: x-small; color: #000000; text-decoration: none}
.userfield {  font-family: Verdana, Arial, Helvetica, sans-serif; font-size: xx-small}
.blackbox {  border-style: solid; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 1px; border-left-width: 1px}
.tdborder {  border-color: black black black #666666; border-style: solid; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 1px; border-left-width: 0px}
-->
</style>
<?php
}

// end of styles...

$gData = "";

function GetDirArray($sPath)
{
	global $gData;
	if (@$handle=opendir($sPath))
	{
		while ($file = readdir($handle)) @$retVal[count($retVal)] = $file;
		closedir($handle);

		if (@$retVal)
		{
			sort($retVal);

			while (list($key, $val) = each($retVal))
			{
				if ($val != "." && $val != "..")
				{
					$path = str_replace("//","/",$sPath.$val);
					if (is_dir($sPath.$val)) GetDirArray($sPath.$val."/");
					else if (file_type($val) != -1) $gData .= $sPath.$val."\n"; 
				}
			}
		}
	}
}

$install_debug=1;
########################################
### INSTALL AND CONNECT FUNCTIONS... ###
########################################

$dbi = array("user,host,name,pass");

$dbi['host'] = $db['host'];

// dynamic from webpage.

$dbi['pass'] = $db['pass'];
$dbi['user'] = $db['user'];
$dbi['name'] = $db['name'];

$error = "";
$err   = "";
$dropdatabase = 0;

function Kinstall_logo($height="64", $width="208") 
{
	global $app_ver,$app_build,$PHP_SELF;
	echo "\n".'<a href="http://www.kplaylist.com" title="Visit homepage"><img width="'.$width.'" height="'.$height.'" src="'.$PHP_SELF.'?image=kplaylist" alt="kPlaylist" border="0" /></a>';
}

function Kinstall_error($errorno,$i="",$whyinstall="",$isupgrading = 0)
{
	echo "An error occured.<br/>";
	die();
}

function kInstall_check_default()
{
	global $db;
	if (@mysql_connect($db['host'], $db['user'], $db['pass'])) return 1; else return 0;
}

function showsql()
{
	global $installdb,$installdbuser;
	echo '<table width="600" border="0" align="center">';
	echo '<tr><td class="wtext">'."\n";
	echo '<font size="4">The installers SQL code:</font>';
	echo "\n".'</td></tr>';

		echo '<tr><td class="wtext"> <font color="green">##GREEN##</font> = Optional <br /><br /><br />'."\n";
		$querytext = str_replace("\n", "<br />\n", $installdb[0]);
		echo '<font color="green">'.$querytext.";</font>";
		echo '<br />';
		echo "\n".'</td></tr>';


	for ($i=1;$i<count($installdb);$i++)
	{
		echo '<tr><td class="wtext">'."\n";
		$querytext = str_replace("\n", "<br />\n", $installdb[$i]);
		echo $querytext.";";
		echo "\n".'</td></tr>';
	}
	for ($i=0;$i<count($installdbuser);$i++)
	{
		echo '<tr><td class="wtext">'."\n";
		$querytext = str_replace("\n", "<br />\n", $installdbuser[$i]);
		echo '<font color="green">'.$querytext.";</font>";
		echo "\n".'</td></tr>';
	}

	echo '</table>';
}

function kInstall_clean($pos=0,$link)
{
	global $db, $dbi, $installdb, $initdb, $dropdatabase, $installdbuser, $win32;
	// fresh install
	?>
	<table width="600" border="0" align="center">  
	<tr> 
      <td colspan="4" class="wtext"><font size="4">Installing database.</font></td>
	 </tr>
	<?php


	if ($dropdatabase) $result = mysql_query($installdb[0],$link);

	$error=0;
	// create database first.
	$result = mysql_query($installdb[1],$link);
	if ($result)
	{
		if (mysql_select_db($db['name']))
		{
			for ($i=2;$i<count($installdb);$i++)
			{
				
				$querytext = str_replace("\n", "<br />", $installdb[$i]);
				$result = mysql_query($installdb[$i]);
				if (!$result) 
				{ 
					echo '<tr><td class="wtext">';
					echo ' <font color="FF0000">Failed query ['.$i.']: </font>'.$querytext.";";
					echo '</td></tr>';
					$error=$i;
				}				
			}
		}
	}


	// check the user...
	if (kInstall_check_default() == 0) 
	{
			for ($i=0;$i<count($installdbuser);$i++)
			{
				echo '<tr><td class="wtext">';
				$querytext = str_replace("\n", "<br />", $installdbuser[$i]);
				$result = mysql_query($installdbuser[$i]);
				if (!$result) { 
					echo ' <font color="FF0000">Failed query ['.$i.']: </font>'.$querytext.";";
					$error=1;
					}
				echo '</td></tr>';
			}

	} 


	if ($error) {
		echo '<tr><td class="dir"><br /><b>Installation may have failed!</b>'."\n";
		echo "\n".'</td></tr>';
	} else {
		echo "\n".'<tr><td class="dir">'."\n";

		$code = '<br /><h2>Installation is now completed.</h2>';
		
				$code .= "\n".'<ul><li>To log in to kPlaylist, reload this page (firm reload) and you should be able to log in.</li>'."\n";

				if ($win32) $code .= '<li>The installation has detected Windows as the platform. You <i>must</i> set the option stream location in the settings after you\'ve logged in. If you don\'t, <b>streaming (playing music) won\'t work.</b></li>'."\n";

				$code .= "<li>All settings and configuration is available via WEB, click the 'Settings' button to the right when you've ".
				'logged in as a administrator.</li>'."\n";

				$code .= '<li>The default kPlaylist login is admin with admin as the password.</li></ul>'.
				'<br />Remember to visit <a href="http://www.kplaylist.com" target="_blank">http://www.kplaylist.com</a> for updates and help.'."\n";
			
		echo $code;
		echo "\n".'</td></tr>'."\n";
	}

	echo "</table>";

}

function kInstall_start()
{
	global $db, $dbi, $installdb, $initdb;
	$dbexist=false;
	$header = "";

	$link = @mysql_connect($db['host'], $dbi['user'], $dbi['pass']);
	if (!$link) { echo "Could not establish a connection to MySQL!"; die(); }

	if (mysql_select_db($db['name'],$link)) $dbexist = true;

	$header = "Installing MySQL database";
	Kprint_header("$header","7");

	kInstall_clean(0,$link);
	Kprint_end();
}

function kInstall_show_form($text="")
{
	global $dbi, $db, $PHP_SELF;

	$drop=' checked="checked" ';

	if (!function_exists("Kprint_header"))
	{
		echo "Error! Seems like we're not able to declare functions. Can't go further. Please either upgrade PHP ".
		"or tune your settings if possible.";
		die();
	}

	Kprint_header("Install","7");

	if (kInstall_check_default() == 0) 
	{
		$dbi['user'] = "root";
		$dbi['pass'] = "";
	} 
	?>

<form name="installform" method="post" action="<?php echo $PHP_SELF; ?>">
  <table width="680" border="0" align="center">
    <tr> 
      <td>	<?php Kinstall_logo("43","136"); ?>
</td>
    </tr>
  </table>
	<table width="600" border="0" align="center" class="tdborder">  

	<tr> 
      <td colspan="4" class="wtext"><font size="4">Welcome to the kPlaylist installer.</font></td>
	 </tr>
	 <tr>
	  <td class="wtext" colspan="4">
        To install kPlaylist, you'll need a working and running copy of MySQL. This is a GPL product, 
        please read the <a href="<?=$PHP_SELF ?>?showgpl=1" target="_blank"><font color="#0000FF">disclaimer of liability</font></a> 
        before you continue. If you do not agree with the disclaimer <u>you 
        must abort</u> the installation and use of this product.
	 </td>
    </tr>
    <tr> 
      <td height="22" colspan="4">
        <hr size="1"/>
      </td>
    </tr>
    <tr> 
      <td height="22" class="wtext" colspan="4">
	  If you are installing kPlaylist for the FIRST time, you must enter a user and password to MySQL 
	  which has access to create a new database and a new users for kPlaylist. 
	  In most cases, the root user of MySQL should be used.<br />
	  <a href="<?=$PHP_SELF ?>?showsql=1" target="_blank"><font color="#0000FF">Click here</font></a> to verify what this installer is going to do. Click 'Continue' when ready to install ! <br /><br />

	  <?php 

		  if ($db['name'] != "kplaylist")
		{
		?>
	  <b>NB!</b><font color="red">&nbsp;You have changed the database name. Make sure it is empty, and do not continue
	  unless you know EXACTLY what you're doing. Also, take a note to the 'drop database' option in the bottom!</font><br />
		
		<?php } ?>

		<?php if ($dbi['user'] == "root")
		{
			?><br><br>Note! The root password will only be used to create
		the tables, a new user called <?php echo $db['user']; ?> with password <?php echo $db['pass']; ?> will be created for the operation of kPlaylist. If you like to change the name and password for this user, please edit the script, and click Reload.<br> 
		<?php }
		if (!empty($text)) echo "<br><br>".$text."<br>"; ?>
		
		</td>
    </tr>
    <tr><td colspan="4">&nbsp;</td></tr>
	
	
	<tr> 
      <td height="22" class="wtext" width="121">MySQL user:</td>
      <td height="22" width="221"> 
        <input type="text" name="mysqluser" size="25" value="<?php echo $dbi['user']; ?>" class="fatbuttom"/>
      </td>
      <td height="22" colspan="2" class="wtext">default: <font color="green"><?php echo $db['user']; ?></font></td>
    </tr>
    <tr> 
      <td height="22" class="wtext" width="121">MySQL password:</td>
      <td height="22" width="221"> 
        <input type="password" name="mysqlpass" size="25" value="<?php echo $dbi['pass']; ?>" class="fatbuttom"/>
      </td>
      <td height="22" colspan="2" class="wtext">default: <font color="green"><?php echo $db['pass']; ?></font></td>
    </tr>
    
    <tr>
	<td colspan="4" class="wtext"><font color="gray">If you need to change the settings below, please edit them in the script and click Reload.</font></td>
	</tr>
	
	<tr> 
      <td height="22" class="wtext" width="121">MySQL host:</td>
      <td height="22" width="221"> 
        <input type="text" name="mysqlhost" size="25" value="<?php echo $db['host']; ?>" disabled="disabled" class="fatbuttom"/>
      </td>
      <td colspan="2" class="wtext" height="22">&nbsp;</td>
    </tr>
    <tr> 
      <td height="22" class="warning" width="121">MySQL database:</td>
      <td height="22" width="221"> 
        <input type="text" name="mysqldatabase" size="25" value="<?php echo $db['name']; ?>" disabled="disabled" class="fatbuttom"/>
      </td>
      <td colspan="4" class="wtext" height="22">&nbsp;</td>
    </tr>
	<tr>
	<td colspan="4" class="wtext"><br /><input type="checkbox" name="dropdatabase" value="on" <?php 
	if ($db['name'] == "kplaylist") echo 'checked="checked"'; ?>/> Drop database '<?php echo $db['name']; ?>' (for full reinstallation: deletes all tables in the database)&nbsp;</td></tr>
	<tr> 
      <td colspan="4">
        <input type="submit" name="reload" value="Reload" class="fatbuttom"/>      
		&nbsp;
		<input type="submit" name="continue" value="Continue" class="fatbuttom"/>
	  </td>
    </tr>
    <tr> 
      <td colspan="4" align="right"><font class="wtext">You'll find documentation here:</font>&nbsp;<a href="http://www.kplaylist.com" target="_blank"><font color="#0000FF">kPlaylist Homepage&nbsp;&nbsp;</font></a></td>
    </tr>
  
  </table>
</form><?php

	Kprint_end();
	die();
}


if ($enable_install == 1) {

	if (!function_exists("mysql_connect")) 

	{	
		Kprint_header("Error - function 'mysql_connect()' does not exist","7");
		Kinstall_logo();
		echo '<br /><blockquote><font color="red" face="Verdana, Arial, Courier" size="2">Your PHP implementation does not support MySQL. Please visit <a href="http://www.php.net"><font color="red" face="Verdana, Arial, Courier" size="2"><u>www.php.net</u></font></a> for information on how you can enable it.<br /></blockquote>';
		Kprint_end();
	} else
	if (!empty($_POST['continue']))
	{
		$user = $_POST['mysqluser'];
		$pass = $_POST['mysqlpass'];
		if (@$_POST['dropdatabase'] == 'on') $dropdatabase = 1; else $dropdatabase = 0;

		if (@mysql_connect($db['host'], $user, $pass))
		{
			// continue!
			$dbi['user'] = $user;
			$dbi['pass'] = $pass;
			kInstall_start();
		} else { kInstall_show_form('<font color="red">Could not login with the supplied user name and password!</font>'); die(); }
	} else	
	if (@$_GET['showgpl']) { 
		Kprint_header();
		show_gnu_license();
		Kprint_end();
	} else	
	if (@$_GET['showsql']) { 
		Kprint_header();
		showsql();
		Kprint_end();
	} 
	else kInstall_show_form();
	die();
}

if (($base_dir == "/path/to/your/mp3/") || (!$base_dir))
	{ 
		# If not.. Print info...
		Kprint_header();
		Kinstall_logo();
		$title="First you have to edit the script.";
		$code='<font class="notice">Use your favorite editor and edit the configuration part located in the top part 
of this php-file.<br 
/>The variable $base_dir should point to the directory where you have your mp3s located !<br /><br />$base_dir = 
"'.$base_dir.'";<br /></font>';
		blackbox($title,$code,0,"#4F35B3",0,"left");
		Kprint_end();
		die();
    }


/* kInstall_check_database(); */


// start of logon...

function Kprint_login()
{
	global $https,$require_https,$show_keyteq,$app_ver, $app_build, $PHP_SELF, $GLOBALS;
?>
<form name="userform" method="post" action="<?php if ((($require_https) && ($https)) || (!$require_https)) echo $PHP_SELF;?>">

<p>&nbsp;</p>
<table width="600" border="0" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" align="center">
  <tr>
	<td colspan="3"><img src="<? echo $PHP_SELF; ?>?image=login" width="600" height="327" alt="Kplaylist v<? echo $app_ver; ?> build <? echo $app_build; ?>"/></td>
  </tr>
  <tr><td bgcolor="#FFFFFF" height="12"></td>
  </tr>
<tr>
 <td height="12" width="600" bgcolor="#000000" align="left" valign="top">
		<table width="100%" bgcolor="#000000" border="0" cellpadding="0" cellspacing="5">

		  <tr>
			<td width="15%" height="30"><font color="#FFFFFF" class="text"><?php echo get_lang(37); ?></font></td>
			<td width="31%" height="30">
			  <input type="text" name="user" maxlength="30" size="15" class="buttom" />
			</td>
			<td rowspan="2" height="31" width="54%" align="right" valign="top"><img src="<? echo $PHP_SELF; ?>?image=php" border="0" alt="PHP - www.php.net" /></td>
		  </tr>
		  <tr>
			<td width="15%" height="27"><font color="#FFFFFF" class="text"><?php echo get_lang(38); ?></font></td>
			<td width="31%" height="27">
			  <input type="password" name="password" maxlength="30" size="15" class="buttom" />
			</td>
		  </tr>
		  <tr>
			<td width="15%">

				<?php 
				if ((($require_https) && ($https)) || (!$require_https))
				{
				?><input type="submit" name="Submit" value="<?php echo get_lang(40); ?>" class="buttom" />
				<?php
				} else echo '<a href="https://'.$GLOBALS["HTTP_HOST"].$GLOBALS["REQUEST_URI"].'"><font color="F92621" class="warning">'.get_lang(41).'</font></a>'; ?>

				</td>
			<td colspan="2" valign="bottom" align="right"><font color="#FFFFFF" class="warning"><?php echo get_lang(39); ?></font></td>
		  </tr>
		</table>
	</td>
	</tr>
</table>
</form>

<script type="text/javascript">
	<!--
	document.userform.user.focus();
	// -->
</script>

<table width="600" border="0" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" align="center">
  <tr><td align="right">

<p>
    <a href="http://validator.w3.org/check/referer">
	<img src="<? echo $PHP_SELF; ?>?image=w3c_xhtml_valid" border="0" 
        alt="Valid XHTML 1.0!" height="31" width="88" /></a>
<br />
<? if ($show_keyteq) { ?>  
  <a href="http://www.kplaylist.com/"><font color="#BBBBBB" size="1" face="Verdana">www.kplaylist.com</font></a>
<? } ?>  
  </p>
  </td></tr></table>

<?php
}

// end of logon...


// adds files to the playlist..
function playlist_createnew($name,$shared=0)
{
	global $HTTPS, $require_https, $u_id, $file_list;

	$query = "insert into tbl_playlist set name = \"$name\", u_id = $u_id, public = $shared";
	$result = db_execquery($query);
	if ($result) return 1; 
	return 0;
}


function playlist_savesequence($seqlist, $id)
{
	global $u_id;
	$query="select id from tbl_playlist_list where listid = $id order by seq asc";
	$result = db_execquery($query);
	$data = array();
	$cnt=0;
	while ($row = mysql_fetch_array($result))
	{
		$data['id'][$cnt] = $row['id'];
		$data['seq'][$cnt] = $seqlist[$cnt];
		$cnt++;
	}
	if ($cnt > 0)
	{
		for ($i=0;$i<$cnt;$i++)
		{
			$seq = $data['seq'][$i];
			$tid  = $data['id'][$i];
			$query= "update tbl_playlist_list set seq = $seq where id = $tid";
			db_execquery($query);
		}	
		playlist_rewriteseq($id);
	}
}



// removes a playlist..
function playlist_delete($nr)
{
	global $u_id, $file_list;
	$query = "delete from tbl_playlist_list where listid = $nr and u_id = $u_id";
	$result = db_execquery($query);
	$query = "delete from tbl_playlist where listid = $nr and u_id = $u_id";
	$result = db_execquery($query);

}

function db_addtoplaylist($playlistnr, $predir, $ascii=1, $tunes, $perdirectory="no")
{
	global $u_id, $file_list;

	$query = "select * from tbl_playlist_list where listid = $playlistnr";
	$result = db_execquery($query);	
	$row = mysql_num_rows($result);

	$cntr=$row;
	$cntr++;

	if (count($tunes) > 0 && count($tunes) < 999)
	{
		for ($i=0;$i<count($tunes);$i++)
		{
			
			$pos = strpos($tunes[$i],";");
			$fcnt = substr($tunes[$i], 0, $pos);
			$fpdir64 = substr($tunes[$i], $pos+1);
			$sdir=mysql_escape_string(stripslashes(base64_decode($fpdir64)));
			if (strlen($sdir) >2) if ($sdir[0] == '/' && $sdir[1] == '/') $sdir = substr($sdir,1);
			$fname = which_song($fcnt, $fpdir64);
			$dirins = base64confirm($sdir.$fname);
			$query = "insert into tbl_playlist_list values ($playlistnr, 0, \"$dirins\", \"$fpdir64\", $fcnt, \"$fname\", $cntr)";
			$ret = db_execquery($query);
			$cntr++;
		}
		
	}
}

function db_readplaylist($playlistnr)
{
	global $u_id, $file_list;
	// first, fetch the current list..
	$query = "select list from tbl_playlist where u_id = $u_id and listid = $playlistnr";
	$result = db_execquery($query);
	$row = mysql_fetch_array($result);
	return $row['list'];
}



function playlist_rewriteseq($plid)
{
	if (is_numeric($plid))
	{
		$query = "SELECT * from tbl_playlist_list WHERE listid = $plid order by seq asc";
		$result = db_execquery($query);
		if (mysql_num_rows($result) > 0)
		{
			$cntr=1;
			while ($row = mysql_fetch_array($result))
			{
				$id = $row['id'];
				$query = "update tbl_playlist_list set seq = $cntr where id = $id";
				db_execquery($query);
				$cntr++;
			}
		}
	}
}

function playlist_editor($plid, $prev)
{
	global $PHP_SELF,$u_cookieid, $base_dir, $u_id;
	Kprint_header(get_lang(59),6);

	$many = 0;
 	$name = "";
	$sel  = "";
	$sel2 = "";
	$out  = "";

	$query="select * from tbl_playlist where listid = $plid";
	$result = db_execquery($query);
	
	$myown = 0;
	
	if ($result)
	{
		$row = mysql_fetch_array($result);
		$name = $row['name'];
		$selected = $row['public'];
		if ($row['u_id'] != $u_id) $myown = 1;
		$shuffle = $row['status'];
		if ($selected == 1) $sel = 'checked="checked"'; 	
		if ($shuffle) $sel2 = 'checked="checked"';
	}

	
	$query="select * from tbl_playlist_list where listid = $plid order by seq asc";
	$result = db_execquery($query);

	if ($result) $many = mysql_num_rows($result);
	$playlistlink = "<input type=\"hidden\" name=\"action\" value=\"playlist\"/>".
	"<input type=\"hidden\" name=\"sel_playlist\" value=\"$plid\"/>".
	"<input type=\"hidden\" name=\"previous\" value=\"$prev\"/>";
	
	$code = '<table width="800" cellspacing="0" border="0" cellpadding="0"><tr><td align="left">';
	$code .= "&nbsp;&nbsp;<input type=\"button\" value=\"".get_lang(34)."\" class=\"fatbuttom\" onclick=\"chhttp('$PHP_SELF?p=$prev');\"/>&nbsp;&nbsp;".
	$playlistlink.
	'<input type="submit" name="playplaylist" value="'.get_lang(42).'" class="fatbuttom"/>&nbsp;&nbsp;';

	if ($myown == 0) $code .=
	"<input type=\"submit\" name=\"deleteplaylist\" value=\"".get_lang(43)."\" class=\"fatbuttom\"/>&nbsp;&nbsp;".
	"<input type=\"text\" name=\"playlistname\" value=\"$name\" size=\"30\" class=\"fatbuttom2\"/>&nbsp;&nbsp;";

	if ($myown == 0)
	{
			
		$code .= "<font class=\"wtext\">".get_lang(44)."&nbsp;<input type=\"checkbox\" name=\"shared\" value=\"on\" $sel/>&nbsp;".
		get_lang(125)."&nbsp;<input type=\"checkbox\" name=\"shuffle\" value=\"on\" $sel2/>&nbsp;&nbsp;&nbsp;</font>".
		"<input type=\"submit\" class=\"fatbuttom\" name=\"saveplaylist\" value=\"".get_lang(45)."\"/>";
	}

	
	$code .= "&nbsp;&nbsp;</td></tr></table>";
	$row_high="";

	if ($many > 0)
	{
		$out = "<input type=\"hidden\" name=\"previous\" value=\"$prev\"/>\n";
		$out .= "<input type=\"hidden\" name=\"action\" value=\"playlist\"/>\n";
		$out .=	"<input type=\"hidden\" name=\"sel_playlist\" value=\"$plid\"/>\n";

		$out .= '<table width="800" cellspacing="0" border="0" cellpadding="0">'."\n";
		
		$out .= '
		<tr> 
		    <td width="50" class="wtext"><b>'.get_lang(49).'</b></td>
		    <td width="40" class="wtext"><b>'.get_lang(50).'</b></td>
			<td width="50" class="wtext"><b>'.get_lang(51).'</b></td>
		    <td width="100" class="wtext"><b>'.get_lang(52).'</b></td>
		    <td width="60" class="wtext"><b>';		
			if ($myown == 0) $out .= get_lang(53);
			$out .= '
			</b></td>

			<td class="wtext" align="left"><b>'.get_lang(54).'</b></td>
		</tr>
		<tr><td>&nbsp;</td></tr>';		
			
		$totplaytime="";
		$count=0;
		$countfails=0;
		$highlight=1;
		while ($row = mysql_fetch_array($result))
		{
			$count++;
			$id = $row['id'];
			$p64 = $row['pdir'];
			$cnt = $row['cnt'];
			$filelink = "$PHP_SELF?s=$cnt&amp;p=$p64&amp;c=$u_cookieid";

			if($highlight != 0)
			{
				($row_high =="") ?  $row_high = " bgcolor=\"#D5D6F9\"" : $row_high = "";
			} else { $row_high = ""; }
			
			$out .= "<tr$row_high>";
		    $out .= '<td class="file" align="center" width="50">';
			$out .= '<input type="checkbox" class="wtext" name="selected[]" value="'. $row['id']. '"/>';
			$out .= '</td>';
			$out .= '<td width="40" class="wtext">';
			if ($myown == 0) $out .= '<input class="smalltext" type="text" name="seq[]" value="'.lzero($row['seq']).'" size="4"/>'; else
					$out .= lzero($row['seq']);
			$out .= '</td>';
			
			$out .= '<td width="50" class="file">';
			$idv3title = "";
			$idv3info  = "";
			if (!file_exists($base_dir.$row['title'])) { $out .= "<font color=\"RED\">ERR</font>"; $countfails++; }
			else 
			{
				$id3 = get_file_info($base_dir.$row['title']);
				@$idv3title = rtrim($id3['title']) . " - ". rtrim($id3['album']);				
				if (!empty($id3['bitrate']) && !empty($id3['length']))
				$idv3info = rtrim($id3['bitrate']).'kb - '. rtrim($id3['length']); else $idv3info = "";
				if (!empty($id3['lengths'])) $totplaytime += $id3['lengths'];
				$out .= "OK";
			}

			$out .= "</td>";
			$out .= '<td width="100" class="wtext">'.$idv3info;
			$out .= "</td>";
			$out .= '<td width="60" class="file">';
			if ($myown == 0) $out .= '<a title="'.get_lang(60).'" class="smalltext" href="'. $PHP_SELF . "?action=editplaylist&amp;plid=$plid&amp;del=$id&amp;p=$prev".'">&nbsp;'.get_lang(43).'&nbsp;</a>';
			$out .= "</td>";

			$out .= '<td align="left" class="file">';
	
			if (empty($row['file'])) $fileview = $row['title']; else $fileview = $row['file'];
		
			$out .= '<a title="'.$idv3title.'" href="'. $filelink .'">'. $fileview. "</a>\n";
			$out .= "</td></tr>";
		}

		$out .= '<tr><td colspan="6"><img src="'.$PHP_SELF.'?image=spacer" border="0" height="2" width="800" alt=""/></td></tr>'."\n".
		'<tr><td colspan="6">&nbsp;</td></tr>'."\n";

		$out .= '
		<tr>
		<td class="wtext" align="center" colspan="2"><b>'.get_lang(55).'</b></td>
		<td class="file" width="50">'; 

		if ($countfails==0) $out .= "OK"; else $out .= "<font color=\"red\">".get_lang(56)."</font>";
		$out .= '</td>';
		
		$totshow = sprintf('%02d:%02d',floor($totplaytime/60),floor($totplaytime-(floor($totplaytime/60)*60)));
		
		$out .= '<td class="wtext">'.$totshow. ' min.'.'</td></tr>'."\n";
		$out .= "<tr><td colspan=\"6\">&nbsp;</td></tr>"."\n";
		$out .= "<tr><td align=\"left\" class=\"file\" colspan=\"6\">\n";

		$out .= '&nbsp;&nbsp;'.get_lang(73).'&nbsp;&nbsp;<input type="button" value="+" class="fatbuttom" onclick="SelectAll();"/>&nbsp;&nbsp;'."\n".
				 '<input type="button" value="-" class="fatbuttom" onclick="SelectAll();"/>&nbsp;&nbsp;'."\n".
		get_lang(57)."&nbsp;&nbsp;<input type=\"submit\" class=\"fatbuttom\" name=\"playselected\" value=\"".get_lang(42)."\"/>&nbsp;&nbsp;"."\n";

		if ($myown == 0) $out .= "<input type=\"submit\" class=\"fatbuttom\" name=\"delselected\" value=\"".get_lang(43)."\"/>&nbsp;&nbsp;".
		get_lang(58)."&nbsp;&nbsp;<input type=\"submit\" class=\"fatbuttom\" name=\"saveseq\" value=\"".get_lang(45)."\"/>";

		$out .= "&nbsp;&nbsp;</td></tr><tr><td colspan=\"6\">&nbsp;</td></tr>";
		
		$out .= '</table>';
		
	}

	echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
	
	if ($myown == 1) blackbox(get_lang(46, $name, $many),$code,0,"#EF6100");
	else blackbox(get_lang(46,$name,$many),$code,0);
	echo "</form>";
	{
		echo "<form name=\"psongs\" action=\"$PHP_SELF\" method=\"post\">\n";	
		if ($myown == 0) blackbox(get_lang(47),$out,0); else blackbox(get_lang(48),$out,0);
		echo "</form></body></html>"; 
	}
}


function playlist_new()
{
	global $PHP_SELF;
	Kprint_header(get_lang(61),"7");
?>
<form method="post" action="<?php echo $PHP_SELF; ?>">
<input type="hidden" name="newplaylist" value="new"/>
<table width="300" border="0">
  <tr> 
	<td class="wtext" align="right" width="50"><?php echo get_lang(62); ?></td>
	<td class="wtext" colspan="2" width="250">&nbsp;<input type="text" name="name" class="wtext"/></td>
  </tr>
  <tr> 
	<td class="wtext" align="right" width="50"><?php echo get_lang(44); ?></td>
	<td class="wtext" colspan="2" width="250"><input type="checkbox" name="shared" value="on" class="wtext"/></td>
  </tr>
  <tr> 
	<td align="right" class="wtext"><b><input type="submit" value="<?php echo get_lang(63); ?>" class="fatbuttom"/></b></td>
	<td></td>
	<td></td>
  </tr>

</table>
</form>
</body>
</html><?php

}

// start of therest...

function KCreate_Mp3Table($pdir="")
{
	global $PHP_SELF, $pdir64;
	$pdir64 = base64_encode($pdir);

	?>
	<table width="100%" border="0" align="left" cellspacing="0" cellpadding="0">
	<tr> 
		<td bgcolor="#FFFFFF" width="70%" align="left" valign="top" colspan="2">
		<form name="psongs" action="<?php echo $PHP_SELF?>" method="post">
                <input type="hidden" name="previous" value="<?php echo $pdir64; ?>"/>	
		<table width="100%" border="0" cellpadding="0" cellspacing="0">	
	<tr>
	<td>
	<?php
}

function KCreate_EndMp3Table($showalbum=1) 
{ 
	global $dir_list, $file_list, $u_id, $u_playlist, $u_playlistid, $PHP_SELF;
	echo "\n<tr>\n<td>&nbsp;\n</td>\n</tr>";

	$files = count($file_list);
	$dirs =  count($dir_list);

	$crstr = '<span class="wtext">'.get_lang(64).'</span>';	
	if ($showalbum)
	{
		$crstr .= '<input type="submit" name="psongsall" value="'; 
		if ($files == 1 && $dirs == 0) $crstr .= get_lang(65); else
		if ($files > 0 && $dirs == 0) $crstr .= get_lang(66); else
		if ($files > 0 && $dirs > 0) $crstr .= get_lang(67);
		$crstr .= '" class="fatbuttom"'."/>".'&nbsp;&nbsp;';
	} 	
    $crstr .= 	'<input type="submit" name="psongsselected" value="'.get_lang(68).'" class="fatbuttom"'."/>";

	db_getplaylist($u_id);

	$ploutput = "";

	if (count($u_playlist)>0)
	{
		$ploutput .= "<input type=\"submit\" name=\"addplaylist\" value=\"".get_lang(69)."\" class=\"fatbuttom\"/>&nbsp;";
		$ploutput .= '<select name="sel_playlist" class="file">';
		
		$playid = user_getfield("defplaylist");
		for ($c=0;$c<count($u_playlist);$c++) 
		{
		
			if ($u_playlistid[$c] == $playid) $sel=" selected=\"selected\" "; else $sel="";
			$ploutput .= '<option value="'. $u_playlistid[$c].'"'.$sel.'>'.$u_playlist[$c].'</option>'."\n";
		}
		$ploutput .= "</select>\n";
	}

	$ploutput .= "<input type=\"hidden\" name=\"action\" value=\"playlist\"/>";
	if (count($u_playlist)>0)
	{
		$ploutput .= "<input type=\"submit\" name=\"playplaylist\" value=\"".get_lang(70)."\" class=\"fatbuttom\"/>&nbsp;";
		$ploutput .= "<input type=\"submit\" name=\"editplaylist\" value=\"".get_lang(71)."\" class=\"fatbuttom\"/>&nbsp;";
	}
	$ploutput .= "<input type=\"button\" name=\"newplaylist\" onclick=\"openwin('playlist', '$PHP_SELF?action=playlist_new');\" value=\"".get_lang(72)."\" class=\"fatbuttom\"".'/>';

	$selectallcode='<input type="button" value="+" class="fatbuttom" onclick="SelectAll();"'."/>".'&nbsp;&nbsp;<input type="button" value="-" class="fatbuttom" onclick="SelectAll();"'."/>";

	
	echo '
	<tr>
	<td>
	<table border="0" cellspacing="10">
	<tr>
	';

	if ($files > 0)
	{
		echo '<td valign="top"> '.blackbox(get_lang(73),$selectallcode).'</td>';
		echo '<td valign="top"> '.blackbox(get_lang(74),$crstr).'  </td>'; 
	}	
	echo '<td valign="top"> '.blackbox(get_lang(75),$ploutput).'</td>'; 
	echo '<td>&nbsp;</td>
	</tr>
	</table>

	</td>		
	</tr>
	
	</table>
	</form>
	</td>';
		
}

function album_hotlist($type)
{
	global $PHP_SELF;

	$out ="";
	for ($i="a";$i<"z";$i++)	
	$out .= "<a title=\"".get_lang(30, $i)."\" href=\"$PHP_SELF?$type=$i\" class=\"hot\">$i</a>&nbsp;";

	$out = "&nbsp;<a title=\"".get_lang(76)."\" href=\"$PHP_SELF?$type=0\" class=\"hot\">0</a>&nbsp;".$out;
	$out .= "<a title=\"".get_lang(30, "z")."\" href=\"$PHP_SELF?$type=z\" class=\"hot\">z</a>&nbsp;&nbsp;";
	return $out;
}


function KCreate_infobox()
{
	global $PHP_SELF, $u_cookieid, $u_id, $app_name, $app_ver, $u_id, $u_prefersearch, $u_preferid3, $u_searchstr,
		$show_keyteq, $show_upgrade, $u_playlist, $u_playlistid, $pdir64, $app_build;

	$u_prefersearch = user_getfield("defaultsearch");
	$u_preferid3 = user_getfield("defaultid3");
	
	?>
	<td class="toptable" align="left" valign="top" width="30%">
	<table width="100%" border="0" bgcolor="#FFFFFF" cellspacing="0">

	<tr>
		<td colspan="2">
		
		<?php if ($show_keyteq==1) 
		{
			?><span class="notice"><?php echo get_lang(77); ?></span><?php
		}?>
		
		<?php if ($show_upgrade==1) 
		{
			?><a title="<?php echo get_lang(120); ?>" href="http://www.kplaylist.com/?ver=<? echo $app_ver; ?>&amp;build=<? echo $app_build; ?>" target="_blank">
			<font color="#CCCCCC"><?php echo get_lang(78); ?></font></a><?php
		} else if ($show_keyteq==1) echo "<br>"; ?>
		
		<a title="<?php echo get_lang(79); ?>" href="http://www.kplaylist.com/?ver=<? echo $app_ver; ?>&amp;build=<? echo $app_build; ?>" target="_blank">
		<img alt="<?php echo get_lang(79); ?>" src="<? echo $PHP_SELF; ?>?image=kplaylist" border="0"/><span class="notice">v<?php echo $app_ver;?></span></a>
		</td>    
	</tr>

	<tr>
		<td width="50%" height="4"></td>
		<td width="50%" height="4"></td>
    </tr>

	</table>
	<form name="search" action="<?php echo $PHP_SELF; ?>" method="post">
	<input type="hidden" name="action" value="Search"/>
	<table width="100%" border="0" bgcolor="#FFFFFF" cellspacing="0">
	<tr>	
	<td width="50%">&nbsp;<input type="text" name="searchfor" value='<?php 
				if (!empty($u_searchstr)) echo $u_searchstr; ?>' maxlength="150" size="30" class="fatbuttom"/></td>
        
		<td width="50%" height="4" align="center"><input type="checkbox" name="onlyid3" value="1"<?php if ($u_preferid3) echo " checked=\"checked\""; ?>/><font class="notice"><?php echo get_lang(80); ?></font></td>
	</tr>
	<tr>
		<td>

		<input type="radio" name="search" value="0" <?php if ($u_prefersearch=="0") echo "checked=\"checked\"";?>/><font class="notice"><?php echo get_lang(81); ?>&nbsp;</font>

		<input type="radio" name="search" value="1" <?php if ($u_prefersearch=="1") echo "checked=\"checked\"";?>/><font class="notice"><?php echo get_lang(82); ?>&nbsp;</font>
				
		<input type="radio" name="search" value="2" <?php if ($u_prefersearch=="2") echo "checked=\"checked\"";?>/><font class="notice"><?php echo get_lang(83); ?></font>
		</td>

		<td align="center"><input type="submit" name="startsearch" value="<?php echo get_lang(5); ?>" class="fatbuttom"/></td>	
	</tr>
	<tr>		
		<td colspan="2"></td>  
	</tr>	
	<tr><td colspan="2">&nbsp;</td></tr>
	
	<tr>
		<td class="finfo" colspan="2" align="left">

<script type="text/javascript">
	<!--
	document.search.searchfor.focus();
	// -->
</script>

			<?php blackbox(get_lang(84), album_hotlist("artist"), 0, "#EF6100"); ?>
		</td>	
	</tr>

	</table>
	</form>
	<?php
		
		db_sharedplaylist($u_id);
		$ploutput = "";
		if (count($u_playlist)>0)
		{
			$ploutput .= '&nbsp;<input type="hidden" name="action" value="playlist"/>';
			$ploutput .= '<input type="hidden" name="previous" value="'.$pdir64.'"/>';
			$ploutput .= '<select name="sel_shplaylist" class="file">';

			$playid = user_getfield("defshplaylist");
			for ($c=0;$c<count($u_playlist);$c++) 
			{
				if ($u_playlistid[$c] == $playid) $sel=" selected=\"selected\" "; else $sel="";
				$ploutput .= '<option value="'. $u_playlistid[$c] . '"'.$sel.'>'.$u_playlist[$c].'</option>'."\n";
			}
			$ploutput .= "</select>\n";
			$ploutput .= "<input type=\"submit\" name=\"playplaylist\" value=\"".get_lang(70)."\" class=\"fatbuttom\"/>&nbsp;";
			$ploutput .= "<input type=\"submit\" name=\"viewplaylist\" value=\"".get_lang(85)."\"  class=\"fatbuttom\"/>&nbsp;";
		}


		if (!empty($ploutput))
		{
			?>
			<form name="sharedplaylist" action="<?php echo $PHP_SELF?>" method="post">
			<table width="100%" border="0" bgcolor="#FFFFFF" cellspacing="0">
			<tr>
				<td colspan="2"><?php echo blackbox(get_lang(86), $ploutput); ?></td>
			</tr>
			</table>
			</form>
			<?php 
		}
		?>

	<form name="misc" action="<?php echo $PHP_SELF?>" method="post">
	<table width="100%" border="0" bgcolor="#FFFFFF" cellspacing="0">
	<?php
		  // owner

		if (db_guinfo($u_id, "u_access") == 0)
		{
			?>
			<tr>
				<td align="left" colspan="2">
			<?php
			$admincode='&nbsp;<input type="button" name="action" value="'.get_lang(87).'" class="fatbuttom" onclick="openwin(\'Users\', \''.$PHP_SELF.'?users=show\');"/>
			<input type="button" name="updatesearch" value="'.get_lang(15).'" class="fatbuttom" onclick="openwin(\'Update\', \''. $PHP_SELF.'?filelist=update\');"/>&nbsp;'.
			'<input type="button" name="settings" value="'.get_lang(126).'" class="fatbuttom" onclick="openwin(\'Settings\',\''.
			$PHP_SELF.'?settings=edit\');"/>&nbsp;';
			
			echo blackbox(get_lang(88),$admincode); ?>
			</td></tr>
			<tr><td colspan="2">&nbsp;</td></tr>
		<?php } 


		$othercode = '&nbsp;<input type="submit" name="whatsnew" value="'.get_lang(89).'" class="fatbuttom"/>&nbsp;';
		$othercode .= '<input type="submit" name="whatshot" value="'.get_lang(90).'" class="fatbuttom"/>&nbsp;';
		$usermisc = '&nbsp;<input type="submit" name="logmeout" value="'.get_lang(91).'" class="fatbuttom"/>&nbsp;'.
					'<input type="button" name="editoptions" value="'.get_lang(92).'" class="fatbuttom" '. 'onclick="openwin(\'Options\', \''.$PHP_SELF.'?editoptions=show\');"/>&nbsp;';

		?>

		<tr>
            <td colspan="2"><?php echo blackbox(get_lang(93), $othercode); ?></td>
		</tr>
		<tr>
		<td>&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2"><?php echo blackbox(get_lang(94), $usermisc,1); ?></td>
		</tr>
		</table>
		</form>
		

</td>
<?php
}




function syslog_write($msg)
{
	global $phpenv, $win32;
	
	if (!$win32)
	{
		define_syslog_variables();
		openlog("kplaylist", LOG_PID | LOG_PERROR, LOG_LOCAL0);
		$access = date("Y/m/d H:i:s");
		$sysout = "Client ".$phpenv['remote']." ".$phpenv['useragent']." $msg";
		syslog(LOG_INFO,$sysout);
		closelog();
	}
}


//################################################################################################################
//									DB STUFF
//################################################################################################################

function db_execfast($query)
{
        global $db, $u_playlist, $u_playlistid, $link;
        $link = mysql_connect($db['host'], $db['user'], $db['pass']);

		if (!function_exists(mysql_unbuffered_query))
			    return mysql_query($query); else
					return mysql_unbuffered_query($query);	
		
}

function db_execquery($query)
{
	global $db, $u_playlist, $u_playlistid, $link;
	$link = mysql_connect($db['host'], $db['user'], $db['pass']);

	if (mysql_select_db ($db['name']))
		return mysql_query($query);
	else
	{
		// damn.. something went wrong.
		echo "(db_execquery) Critical: Could not select db. Exiting."; 
		die();	
	}
}

function db_getplaylist($u_id)
{
    global $u_playlist, $u_playlistid;
	$u_id = mysql_escape_string($u_id);
	$query = "SELECT u_id, name, listid from tbl_playlist where u_id = $u_id";
	$result = db_execquery($query);

	$u_playlist = array();
	$u_playlistid = array();
	$c=0;
	while ($row = mysql_fetch_array($result)) 
	{
		$u_playlist[$c]	= $row['name'];
		$u_playlistid[$c] = $row['listid'];
		$c++;
	}

}

function db_sharedplaylist($u_id)
{
    global $u_playlist, $u_playlistid;
	$u_id = mysql_escape_string($u_id);
	$query = "SELECT name, listid from tbl_playlist where public = 1 and u_id != $u_id";
	$result = db_execquery($query);

	$u_playlist = array();
	$u_playlistid = array();
	
	$c=0;
	while ($row = mysql_fetch_array($result)) 
	{
		$u_playlist[$c]	= " ".$row['name']. " ";
		$u_playlistid[$c] = $row['listid'];
		$c++;
	}

}

function which_song($cnt, $pdir_64)
{
	global $file_list;
	read_dir_noout($pdir_64);
	return $file_list[$cnt];
}

function s_count($tune)
{
	$pos = strpos($tune,";");
	$fcnt = substr($tune, 0, $pos);
	return $fcnt;
}

function s_base64($tune)
{
	$pos = strpos($tune,";");
	$fpdir64 = substr($tune, $pos+1);
	return $fpdir64;
}


function db_verify_stream($cookie, $ip)
{
	global $HTTPS, $require_https, $u_id, $demo_mode, $kTimeout;
	
	$query = "SELECT u_id, u_login, u_pass, u_booted, u_time FROM tbl_users WHERE u_sessionkey = $cookie";
	$hdquery = db_execquery($query);

	$row = mysql_fetch_array($hdquery);
	$u_id = $row['u_id'];
	$time = $row['u_time'];
	$booted = $row['u_booted'];

	// we dont care in demo_mode.
	if ($demo_mode == 1) return 1;
	if ($booted) return 0;

	if ($kTimeout != 0) { if (($time+$kTimeout) < time()) return 0; }

	$num_of_rows = 0;
	$num_of_rows = mysql_num_rows ($hdquery);
	return $num_of_rows;
}

function db_verify_user($user, $pass)
{
	global $u_id;

	$user = mysql_escape_string($user);
	$pass = md5(mysql_escape_string($pass));

	$query = "SELECT u_id FROM tbl_users WHERE u_login = \"$user\" AND u_pass = \"$pass\" and u_booted = 0";
	$result = db_execquery($query);

	$row = mysql_fetch_array($result);
	$u_id = $row['u_id'];
	return mysql_num_rows ($result);
}

function db_guinfo($u_id, $field)
{
	$query = "SELECT $field FROM tbl_users WHERE u_id = $u_id";
	$result = db_execquery($query);
	$row = mysql_fetch_array($result);
	return $row[$field];
}

function db_login($user, $ip)
{
	global $demo_mode;
	if ($demo_mode != 1)
	{
		$query = "UPDATE tbl_users SET u_ip = \"$ip\" WHERE u_login = \"$user\"";
		db_execquery($query);
		$query = "UPDATE tbl_users SET u_status = 1 WHERE u_login = \"$user\"";
		db_execquery($query);	
	}
}

function db_logout($cookie, $ip)
{
	global $demo_mode;
	if ($demo_mode != 1)
	{
		$query = "UPDATE tbl_users SET u_status = 0, u_sessionkey = 0 WHERE u_sessionkey = $cookie and u_ip = \"$ip\"";
		db_execquery($query);
	}
}


function db_update_session($num, $user)
{
	global $demo_mode;
	if ($demo_mode != 1)
	{
		$query = "UPDATE tbl_users SET u_sessionkey = ". $num. ", u_time = ". time(). " WHERE u_login like ". '"'. $user .'"';
		db_execquery($query);
	}
}

function webprocess()
{
	global $_POST, $cookie_name, $userauth, $u_cookieid, $demo_mode, $phpenv;
	if ($_POST['user'] != "" && $_POST['password'] != "")
	{
		if (db_verify_user($_POST['user'], $_POST['password']) == 1)
		{
			if ($demo_mode == 1) 
			{
				$u = $_POST['user'];
				$p = md5($_POST['password']);
				$query = "select u_sessionkey from tbl_users where u_pass = \"$p\" and u_login = \"$u\"";
				$result = db_execquery($query);
				$row = mysql_fetch_array($result);
				$num = $row['u_sessionkey'];
			} else
			{
				$randmax = getrandmax();
				srand((double)microtime()*1000000);
				$num = rand(1,$randmax);
				db_login($_POST['user'], $phpenv['remote']);
				db_update_session($num, $_POST['user']);
				$u_cookieid = $num;
			}
			$userauth = 1;
			SetCookie($cookie_name,"");
			SetCookie($cookie_name,$num);
		}
	}
}

// end of therest...


// start of settings


function settings_save($data)
{
	if ($data != NULL)
	{
		$s_base_dir = @$data['s_base_dir'];
		$s_streamlocation = mysql_escape_string(@$data['s_streamlocation']);
		$s_default_language = vernum(@$data['s_default_language']);
		$s_windows = verchar(@$data['s_windows']);
		$s_require_https = verchar(@$data['s_require_https']);
		$s_allowseek = verchar(@$data['s_allowseek']);
		$s_allowdownload = verchar(@$data['s_allowdownload']);
		$s_timeout = vernum(@$data['s_timeout']);
		$s_report_attempts = verchar(@$data['s_report_attempts']);
		//$s_install = verchar(@$data['s_install']);

		// Verify base_dir.
		if (!empty($s_base_dir)) 
		{
			$s_base_dir = slashtranslate($s_base_dir);
			if ($s_base_dir[strlen($s_base_dir)-1] != '/') $s_base_dir .= '/';		
			$s_base_dir = mysql_escape_string($s_base_dir);

			$query =	"update tbl_settings set s_base_dir = \"$s_base_dir\", ".
						"s_streamlocation = \"$s_streamlocation\", ".
						"s_default_language = $s_default_language, ".
						"s_windows = $s_windows, ".
						"s_require_https = $s_require_https, ".
						"s_allowseek = $s_allowseek, ".
						"s_allowdownload = $s_allowdownload, ".
						"s_timeout = $s_timeout, ".
						"s_report_attempts = $s_report_attempts";
						//"s_install = $s_install";
	
			$result = db_execquery($query);
			
			settings_edit();		
		}

	}

}

function settings_edit()
{
	global $userauth, $PHP_SELF, $https;
	Kprint_header(get_lang(126),2);

    $query = "SELECT * FROM tbl_settings";
	$result = db_execquery($query);
	
	$row = mysql_fetch_array($result);
	
	$on = 'checked="checked"';
	if ($row['s_windows']) $s_windows = $on; else $s_windows ="";
	if ($row['s_require_https']) $s_require_https = $on; else $s_require_https ="";
	if ($row['s_allowseek']) $s_allowseek = $on; else $s_allowseek ="";
	if ($row['s_allowdownload']) $s_allowdownload  = $on; else $s_allowdownload  ="";
	if ($row['s_report_attempts']) $s_report_attempts = $on; else $s_report_attempts ="";
	//if ($row['s_install']) $s_install = $on; else $s_install ="";

	if ($row!=NULL)
	{
		?>
		<form name="settings" method="post" action="<?php echo $PHP_SELF; ?>">
		<input type="hidden" name="settings" value="save"/>
		<table width="100%" border="0">
	
		<tr>
		<td class="wtext"><?php echo get_lang(127); ?></td>
		<td class="wtext"><input type="text" name="s_base_dir" class="fatbuttom" size="50" value="<?php echo $row['s_base_dir']; ?>"/></td>
		</tr>

		<tr>
		<td class="wtext"><?php echo get_lang(128); ?></td>
		<td class="wtext"><input type="text" name="s_streamlocation" class="fatbuttom" size="50" value="<?php echo $row['s_streamlocation']; ?>"/></td>
		</tr>

		<tr>
		<td class="wtext"><?php echo get_lang(129); ?></td>
		<td class="wtext"><?php echo get_lang_combo($row['s_default_language'],"s_default_language"); ?></td>
		</tr>

		<tr>
		<td class="wtext"><?php echo get_lang(130); ?></td>
		<td class="wtext"><input type="checkbox" value="1" name="s_windows" <?php echo $s_windows; ?>/></td>
		</tr>

		<tr>
		<td class="wtext"><?php if ($https) echo get_lang(131); else echo get_lang(139); ?></td>
		<td class="wtext"><input type="checkbox" <?php if (!$https) echo 'disabled="disabled"'; ?> value="1" name="s_require_https" <?php echo $s_require_https; ?>/></td>
		</tr>

		<tr>
		<td class="wtext"><?php echo get_lang(132); ?></td>
		<td class="wtext"><input type="checkbox" value="1" name="s_allowseek" <?php echo $s_allowseek; ?>/></td>
		</tr>

		<tr>
		<td class="wtext"><?php echo get_lang(133); ?></td>
		<td class="wtext"><input type="checkbox" value="1" name="s_allowdownload" <?php echo $s_allowdownload; ?>/></td>
		</tr>

		<tr>
		<td class="wtext"><?php echo get_lang(134); ?></td>
		<td class="wtext"><input type="text" class="fatbuttom" name="s_timeout" value="<?php echo $row['s_timeout']; ?>"/></td>
		</tr>

		<tr>
		<td class="wtext"><?php echo get_lang(135); ?></td>
		<td class="wtext"><input type="checkbox" value="1" name="s_report_attempts" <?php echo $s_report_attempts; ?>/></td>
		</tr>

		<?php
		// reinstall code. Disabled.
		/*<tr>
		<td class="wtext"><? php echo get_lang(140); ? ></td>
		<td class="wtext"><input type="checkbox" value="1" name="s_install" <? php echo $s_install; ? >/></td>
		</tr>*/ 
		?>


		<tr>
		<td align="left" colspan="2"><input class="fatbuttom" type="submit" name="submit" value="<?php echo get_lang(45); ?>" />
		&nbsp;<input class="fatbuttom" type="submit" name="button" value="<?php echo get_lang(27); ?>" onclick="window.close();window.opener.location.reload();" /></td>
		</tr>

		</table>
		</form>

		<?php
		
		}


	Kprint_end();
	die();

}

// end of settings-functions...

// start of users...

function show_new_user_form($id = -1, $name="", $pass="", $comment="",$login="", $access=1)
{
	global $userauth, $PHP_SELF;

	$td1=110;
	$td2=490;
	if ($id != -1)
	{
		$query = "SELECT * FROM tbl_users where u_id = $id";
		$result = db_execquery($query);

		$row = mysql_fetch_array($result);
		$name = $row['u_name'];
		$pass = $row['u_pass'];
		$comment = $row['u_comment'];
		$login = $row['u_login'];
		$access = $row['u_access'];
		$booted = $row['u_booted'];

		if ($booted) $boot = 'checked="checked"'; else $boot = "";
	}
	if ($id == -1) $title=get_lang(96); else $title = get_lang(95);
	Kprint_header($title,2);?>

	<form method="post" action="<?php echo $PHP_SELF; ?>">
	<input type="hidden" name="formusers" value="userchange" />
	<input type="hidden" name="u_id" value="<?php echo $id; ?>" />

	<table width="600" border="0" cellpadding="2" cellspacing="2">

<?php if ($id != -1) { ?>
	<tr> 
      <td width="110" height="17" class="wtext"><?php echo get_lang(124); ?></td>
		 <td width="490" height="17"><input type="checkbox" name="booted" value="on" <?php echo $boot; ?> /></td>
	  <td width="47" height="17">&nbsp;</td>
    </tr>
<?php } ?>

	<tr> 
      <td width="110" height="17" class="wtext"><?php echo get_lang(97); ?></td>
      <td width="490" height="17"><input type="text" name="name" class="userfield" value="<?php echo $name; ?>" /></td>
      <td width="47" height="17">&nbsp;</td>
    </tr>
    
	<tr> 
      <td width="110" class="wtext"><?php echo get_lang(98); ?></td>
      <td width="490"><input type="text" name="login" class="userfield" value="<?php echo $login; ?>" /></td>
      <td width="47">&nbsp;</td>
    </tr>

<?php if ($id != -1) { ?>
	<tr>
	<td class="wtext" width="110"><?php echo get_lang(99); ?></td>
	<td align="left"><input type="checkbox" name="passchange" value="on" /></td>
	</tr>
<?php } ?>

	<tr> 
      <td width="110" class="wtext"><?php echo get_lang(100); ?></td>
      <td width="490"><input type="password" name="password" class="userfield" value="" /></td>
      <td width="47">&nbsp;</td>
    </tr>
    
	<tr> 
      <td width="110" class="wtext"><?php echo get_lang(101); ?></td>
      <td width="490"><input type="text" name="comment" class="userfield" value="<?php echo $comment; ?>" /></td>
      <td width="47">&nbsp;</td>
    </tr>
	
	<tr> 
      <td width="110" class="wtext"><?php echo get_lang(102); ?></td>
      <td width="490">
        <input type="text" name="access" class="userfield" value="<?php echo $access; ?>" />&nbsp;<span class="wtext">(<?php echo get_lang(138); ?>)</span>
      </td>
	<td width="47">&nbsp;</td>
    </tr>

	<tr>
      <td colspan="2" class="wtext">
        <br/>
		<input type="submit" name="Submit" value="<?php echo get_lang(45); ?>" class="fatbuttom" />&nbsp;
        <input type="submit" name="Cancel" value="<?php echo get_lang(16); ?>" class="fatbuttom" />
      </td>
      <td width="490">&nbsp;</td>
	</tr>
  </table>
</form>
</body>
</html>

<?php
die();
}

function show_users()
{
	global $userauth, $PHP_SELF;
	Kprint_header(get_lang(121),2);

    $query = "SELECT * FROM tbl_users order by u_time desc";
	$result = db_execquery($query);
	
	$pereach=2;
	$out = '<table width="540" border="0" cellspacing="0" cellpadding="0">';
	while ($row = mysql_fetch_array($result)) 
	{

		if ($pereach == 2) { $pereach=0; $out .= "<tr bgcolor=\"#E8E8E8\">"; } else $out .= "<tr>";
		$pereach++;

		$ulogin = $row['u_login'];
		if ($row['u_access'] == 0) $uname = "<font color=\"red\">". $row['u_name']."</font>"; else $uname = $row['u_name'];
		
		$out .= '<td width="90" class="file"><a class="hot" href="'. $PHP_SELF .'?users=modify'. "&amp;edit=".$row['u_id'].'" title="'.get_lang(95).'">'. $ulogin. "</a></td>\n";
		$out .= '<td width="175" class="file">'. $uname. "</td>\n";
		$out .= '<td width="135" class="file"><font title="';
		$out .= date("d.m.y ".'\a\t'." H:i",$row['u_time']);
		$out .= '"> '.$row['u_ip']. "</font></td>\n";

		switch ($row['u_status'] )
		{
			case 0: $stout = get_lang(104); break;
			case 1: $stout = "<font color=\"red\">".get_lang(103)."</font>"; break;
			case 2: $stout = "Booted"; break;
			default: $stout = "Unknown"; break;
		}
		$out .= '<td width="60" class="file">'. $stout. "</td>\n";
		$out .= '<td width="80" class="file">'."\n";
		
		$out .= '<a class="hot" href="'. $PHP_SELF .'?users=modify'. "&amp;del=".$row['u_id'].' " title="'.get_lang(105).'">'.get_lang(109).'&nbsp;&nbsp;</a>';
		if ($row['u_status'] == 1)
		$out .= '<a class="hot" href="'. $PHP_SELF .'?users=modify'. "&amp;logout=".$row['u_id'].'" title="'.get_lang(106).'">'.get_lang(110).'</a>';

		$out .= "</td></tr>\n";
	}

	$out .= "</table>";
	$out .= "<form action=\"$PHP_SELF\" method=\"post\">". "\n";
	$out .= '<input type="hidden" name="formusers" value="modify"/>';
	$out .= '<table width="600" border="0">'."\n";
	$out .= "<tr><td height=\"5\" colspan=\"6\"></td></tr>\n";
	$out .= "<tr><td colspan=\"8\">";
	$out .= '<input type="submit" value="'.get_lang(107).'" name="Refresh" class="fatbuttom" />';
	$out .= '&nbsp;<input type="submit" value="'.get_lang(108).'" name="newuser" class="fatbuttom" />';

	$out .= '</td></tr></table></form>';

    echo $out;
	Kprint_end();
	die();
	
}

function user_getfield($which)
{
	global $u_id;
	$query = "select $which from tbl_users where u_id = $u_id";
	$result = db_execquery($query);
	if (!$result) return null;
	$row = mysql_fetch_array($result);
	return $row[$which];
}

// for saving dynamically playlist options !!! 
/*function save_runoptions($playlist=-1, $sharedplaylist=-1)
{
	global $u_id;
	$querypl="";
	if ($playlist!=-1) $querypl = "defplaylist = $playlist";
	if ($sharedplaylist!=-1)
	{ 
		if (!empty($querypl)) $querypl .=", set ";
		$querypl .= "defshplaylist = $sharedplaylist";
	}
	$query = "update tbl_users set $querypl where u_id = $u_id";
	db_execquery($query);
}*/

function user_saveoption($field, $value)
{
	global $u_id;
	$value = mysql_escape_string($value);
	$query = "update tbl_users set $field = \"$value\" where u_id = $u_id";
	db_execquery($query);
}

// for saving user options on the user page
function save_useroptions($_POST)
{
	global $u_id, $deflanguage;
	if (@$_POST['extm3u'] == '1') $extm3u = 1; else $extm3u = 0;
	if (is_numeric($_POST['hotrows'])) $hotrows = $_POST['hotrows']; else $hotrows = 25;
	if (is_numeric($_POST['searchrows'])) $searchrows = $_POST['searchrows']; else $searchrows = 25;
	if (is_numeric($_POST['u_language'])) $ulang = $_POST['u_language']; else $ulang = 0;
	
	$deflanguage = $ulang;
	$query = "update tbl_users set extm3u = $extm3u, hotrows = $hotrows, searchrows = $searchrows, lang = $ulang where u_id = $u_id";
	db_execquery($query);

}

// for showing user options
function show_useroptions()
{
	global $userauth, $PHP_SELF, $u_id, $klang, $deflanguage;
	
	$query = "select * from tbl_users where u_id = $u_id";
	$result = db_execquery($query);
	if ($result) $row = mysql_fetch_array($result);
	if (!$row) die();

	Kprint_header(get_lang(123),2);
	?>
	<form name="useroptions" method="post" action="<?php echo $PHP_SELF; ?>">
	<input type="hidden" name="useroptions" value="save"/>
	<table width="300" border="0">

	<?php if ($row['extm3u'] == 1) $ext3mu = 'checked="checked"'; else $ext3mu=""; ?>
	<tr>
		<td class="wtext"><?php echo get_lang(111); ?></td>
		<td><input type="checkbox" value="1" name="extm3u" <?php echo $ext3mu; ?>/></td>
		<td></td>
	</tr>
	<?php $hotrows = $row['hotrows']; ?>
	<tr>
		<td class="wtext"><?php echo get_lang(112); ?></td>
		<td><input type="text" maxlength="4" size="4" class="fatbuttom" value="<?php echo $hotrows;?>" name="hotrows"/></td>
		<td></td>
	</tr>
	<?php $searchrows = $row['searchrows']; ?>
	<tr>
                <td class="wtext"><?php echo get_lang(113); ?></td>
                <td><input type="text" maxlength="3" size="3" class="fatbuttom" value="<?php echo $searchrows;?>" name="searchrows"/></td>
                <td></td>
    </tr>

	<?php 
		
	$userlang = $row['lang']; 
	$langout = '<select name="u_language" class="fatbuttom">';

	for ($c=0;$c<count($klang);$c++) 
	{
		$langout .= '<option value="'. $c. '"';
		if ($c == $userlang) $langout .= ' selected="selected"'; 
		$langout .= '>';
		if ($c == $userlang) $langout .= $klang[$c][2];
		else $langout .= $klang[$c][0];
		$langout .='</option>'."\n";
	}
	$langout .= "</select>\n";
	
	?>
	<tr>
		<td class="wtext"><?php echo get_lang(122); ?></td>
		<td><?php echo $langout; ?></td>
		<td></td>
    </tr>
	<tr><td colspan="3" height="10"><hr size="1"/></td></tr>
	<tr>
		<td colspan="3">
		<input class="fatbuttom" type="submit" name="save" value="<?php echo get_lang(45); ?>"/>&nbsp;
<input class="fatbuttom" type="button" name="closeme" value="<?php echo get_lang(27); ?>" onclick="window.close();window.opener.location.reload();">
<!--		<input class="fatbuttom" type="button" name="closeme" value="<?php echo get_lang(27); ?>" onclick="javascript: self.close(); "/>		-->
		</td>
	</tr>
	</table>
	</form>
	</body>
	</html>
	<?php	
}

// end of users...


// start of search...

function nextch($ssearch,$pos)
{
	for ($i=$pos;$i<strlen($ssearch);$i++)
		if ($ssearch[$i] != ' ') return $i-1;
	return strlen($ssearch);
}

function whats_hot($max,$pos)
{
	global $PHP_SELF, $file_list, $dir_list;
	Kprint_header(get_lang(3),"7");
	KCreate_Mp3Table("");			
	show_nice_dir("",get_lang(3)."!");

	if ($max == 0) $max = 25;
	$query = 'select sum(hits) as cntr, artist, album, count(free) as many, free from tbl_search where rtrim(album) != "" group by album order by cntr desc, many desc limit '.$max;
	$result = db_execquery($query);
	$many = 0;
	if ($result)
	{
		$out = "";
		echo '</td></tr>';
		$cntr=0;
		while ($row = mysql_fetch_array($result)) 
		{
			//if ($cntr >= $max) break; 

			$free = $row['free'];
			$ret = file_getvital($free);
			$dir = $ret['dir'];
			$many++;
			$hits = $row['cntr'];
			
			if ($hits > 0)
			{
				$cntshow = lzero($cntr+$pos+1);
				$man = $row['many'];
				$out .= print_dir(" ".$cntshow."  ".$row['artist']." -  ".$row['album'], $dir, $ret['nr'] , 1, "album",$hits." hits - ".$man." tunes");
				$cntr++;
			} else break;
		}
		
		echo $out;
		$file_list = array();
		$dir_list = array();
		KCreate_EndMp3Table(0);
		KCreate_infobox();
		echo '</tr></table></body></html>';		
	}
}

function whats_new($cnt)
{
	global $PHP_SELF, $file_list, $dir_list;
	Kprint_header(get_lang(4),"7");
	KCreate_Mp3Table("");			
	show_nice_dir("",get_lang(4)."!");
	$query = 'select * from tbl_search where rtrim(album) != "" group by album order by date desc limit 0,'.$cnt;
	$result = db_execquery($query);
	$many = 0;
	if ($result)
	{
		$out = "";
		echo '</td></tr>';
		while ($row = mysql_fetch_array($result)) 
		{
			$free = $row['free'];
			$ret = file_getvital($free);
			$dir = $ret['dir'];
			$many++;
			
			$out .= print_dir(date("d.m.y",$row['date'])." - ".$row['artist']." - ".$row['album'], $dir, $ret['nr'] , 1, "album",$row['artist']);
		}
		echo $out;
		$file_list = array();
		$dir_list = array();
		KCreate_EndMp3Table(0);
		KCreate_infobox();
		echo '</tr></table></body></html>';	
	
	}
}



function search($what, $where, $id3)
{
	global $require_https, $u_playlist, $u_playlistid, $base_dir;

	$ssearch = stripslashes($what); 	
	$ssearchlinefree = "";

    Kprint_header(get_lang(5),2);
	$sline=0;
	$slines = array('text','opt');

	$i2=0;
	$quote=0;

	for ($i=0;$i<strlen($ssearch);$i++)	
	{
		if ($ssearch[$i] == " " && $quote==0) 
		{
			$i2++; 
			$slines['text'][$i2] = "";
			$i = nextch($ssearch,$i);
		} else if ($ssearch[$i] == '"') { if ($quote == 1) $quote=0; else $quote=1; }	
		else if ($ssearch[$i] == ";") { 
		} else @$slines['text'][$i2] .= $ssearch[$i]; 
	}

	$i2++;

	for ($i=0;$i<$i2;$i++)
	{
		if ($slines['text'][$i][0] == '-') 
		{
			$slines['opt'][$i] = 1; 
			$slines['text'][$i] = substr($slines['text'][$i],1);
		} else $slines['opt'][$i] = 0;
		if ($slines['text'][$i][0] == '+') $slines['text'][$i] = substr($slines['text'][$i],1);
	}

	if ($where == 0) $safter = "album";
	if ($where == 1) $safter = "title";
	if ($where == 2) $safter = "artist";

	$ssearchline="where ";
	for ($i=0;$i<$i2;$i++) 
	{ 
			if ($slines['opt'][$i] == 0) $ssearchline .= "$safter like \"%".$slines['text'][$i]."%\""; else
			if ($slines['opt'][$i] == 1) $ssearchline .= "$safter not like \"%".$slines['text'][$i]."%\"";
			if (($i+1) < $i2) $ssearchline .= " and ";
	}
	

	for ($i=0;$i<$i2;$i++) 
	{ 
			if ($slines['opt'][$i] == 0) $ssearchlinefree .= "free like \"%".$slines['text'][$i]."%\""; else
			if ($slines['opt'][$i] == 1) $ssearchlinefree .= "free not like \"%".$slines['text'][$i]."%\"";
			if (($i+1) < $i2) $ssearchlinefree .= " and ";
	}

	if ($id3==0) $query = "select * from tbl_search $ssearchline or $ssearchlinefree";
	else $query="select * from tbl_search $ssearchline";

	
	$query .= " order by free asc";
	$startt = microtime();

	$result = db_execquery($query);
	$endt   = microtime();

	$exectime = $endt-$startt;
	if ($exectime < 0) $execstr = "0.00"; else $execstr =  substr($exectime, 0, 4);

	KCreate_Mp3Table("");
	$many=mysql_num_rows($result);
	$mwritten=0;

	$max = user_getfield("searchrows");
	$extra="";
	if ($many > $max) $extra = get_lang(6, $max); //"(only $max shown)";	
	show_nice_dir("",get_lang(8, $ssearch));
	echo "<font class=\"wtext\"> - ".get_lang(9)." $many $extra / $execstr ".get_lang(7)."</font>";

	$out = "";
	echo '</td></tr>';
	while ($row = mysql_fetch_array($result)) 
	{
		$free = $row['free'];
		$ret = file_getvital($free);
		$dir = $ret['dir'];
		if (strlen($dir) > 0) 
			if ($dir[strlen($dir)-1] != '/') $dir .= '/';
		
		if (file_exists($base_dir.$dir.$ret['file']))
		{
			$out .= print_file($ret['file'], $dir, $ret['nr'],1,1,1);
			$mwritten++;
			if ($mwritten > $max) break;
		}
	}
	echo $out;
	if ($many==0) echo "<tr><td><font class=\"finfo\">".get_lang(10)."</font></td></tr>";
	KCreate_EndMp3Table(0);
	KCreate_infobox();
	echo '</tr></table>';
	Kprint_end();
	die();
}

function md5file($file)
{
	$fp = fopen($file, "rb");
	if ($fp)
	{
		$md5data = fread($fp, 12284);
		fclose($fp);	
		return md5($md5data);
	}
	return "";
}

function md5file_var($file)
{
	$fp = fopen($file, "r");
	if ($fp)
	{
		$md5data = fread($fp, 12284);
		fclose($fp);	
		return md5($md5data);
	}
	return "";
}


function search_qinscontruct($album, $title, $artist, $filein, $md5, $fsize)
{
	$album = mysql_escape_string($album);
	$title = mysql_escape_string($title);
	$artist = mysql_escape_string($artist);
	$filein = mysql_escape_string($filein);
	$tmin = time();
	return "insert into tbl_search values (0, \"$title\", \"$filein\", \"$album\", \"$artist\", \"$md5\",0, $tmin, $fsize)";
}

function search_qupdcontruct($album, $title, $artist, $filein, $md5,$id)
{
	$album = mysql_escape_string($album);
	$title = mysql_escape_string($title);
	$artist = mysql_escape_string($artist);
	$filein = mysql_escape_string($filein);
	return "update tbl_search set title=\"$title\", album=\"$album\", artist=\"$artist\", md5=\"$md5\", free=\"$filein\" where id = $id";
}

function search_qupdfree($free, $id)
{
	$free = mysql_escape_string($free);
	return "update tbl_search set free=\"$free\" where id = $id";
}

function search_findid($free)
{
	$fsize = filesize($free);
	$md5 = md5file($free);
	if (!empty($md5))
	{
		$query = "select id from tbl_search where md5 = \"$md5\" and fsize = $fsize";
		$result = db_execquery($query);
		$row = mysql_fetch_array($result);
       		$cnt = mysql_num_rows($result);
		if ($cnt == 1) return $row['id']; else return "select returned more than one id ($cnt, $fsize, $md5).";
	} else return "md5 function returned null."; 		
	
}

function search_updatevote($id)
{
	$query = "update tbl_search set hits = hits+1 where id = $id";
	db_execquery($query);
}


function search_updatelist_options()
{
	global $find, $PHP_SELF;
	Kprint_header(get_lang(11),2);
	?>
	<form name="updateoptions" method="post" action="<?php echo $PHP_SELF; ?>">
	<input type="hidden" name="update" value="options"/>
	<table width="400" border="0">

	<tr>
	<td colspan="3" class="warning">
	</td>
	</tr>
	<tr>
		<td class="wtext"><?php echo get_lang(12);?></td>
		<td><input type="checkbox" value="1" name="deleteunused"/></td>
		<td></td>
	</tr>
	<tr>
		<td class="wtext"><?php echo get_lang(13);?></td>
		<td><input type="checkbox" value="1" name="rebuildid3"/></td>
		<td></td>
	</tr>
	<tr>
		<td class="wtext"><?php echo get_lang(14);?></td>
		<td><input type="checkbox" value="1" name="debugmode"/></td>
		<td></td>
	</tr>
	
	<tr><td colspan="3" height="10"><hr size="1"/></td></tr>
	<tr>
		<td colspan="3">
		<input class="fatbuttom" type="submit" name="go" value="<?php echo get_lang(15);?>"/>&nbsp;
		<input type="button" value="<?php echo get_lang(16); ?>" name="Cancel" class="fatbuttom" onclick="javascript: self.close();"/>
		</td>
	</tr>
	</table>
	</form>
	<?php
	Kprint_end();	
}

function search_updatelist($options="")
{
	global $db, $require_https, $u_playlist, $u_playlistid, $base_dir,$link, $find, $win32, $gFcnt, $gData;

	Kprint_header(get_lang(17),2);

	$deleteunused = 0;
	$fullrebuild = 0;
	$debugmode = 0;

	if (@$options['deleteunused'] == '1') $deleteunused = 1;
	if (@$options['rebuildid3'] == '1') $fullrebuild = 1;
	if (@$options['debugmode'] == '1') $debugmode = 1; 

	$base_dir_len = strlen($base_dir);
	$db_out=array();	
	$db_out_n=array();	

	$link = mysql_connect($db['host'], $db['user'], $db['pass']);
	if ($link)
	{
		if (!mysql_select_db ($db['name']))
		{ die(); }

	} else die();
	$filecntr=0;
	$file="";

	// execute find - receive the whole directory index in the data buffer.

	if (function_exists("mysql_unbuffered_query")) $unbuff = 1; else $unbuff = 0;

	echo "<font class=\"notice\">".get_lang(136)."..</font><br />\n";	

	flush();

	GetDirArray($base_dir);
	
	//	$data = `$find`;
	$data = $gData;

	$datalen = strlen($data);

	if ($datalen > 0)
	{
		
		$query = "select fsize, id, md5, free from tbl_search order by id asc";
		$result = mysql_query ($query,$link);
		$counts = mysql_num_rows($result);

		$dcntr=0;
		while ($row = mysql_fetch_array($result)) 
		{
			$db_fsize[$dcntr] = $row['fsize'];
			$db_out['id'][$dcntr] = $row['id'];
			$db_out['md5'][$dcntr] = $row['md5'];
			$db_out['free'][$dcntr] = $row['free'];
			$dcntr++;	
		}	

		$query="";
		$starttime= time();	
		$totalqupds = $dcntr;	
		$failed=0;
		
        $datalook = explode("\n",$data);
		$datacnt = count($datalook)-1;
        echo "<font class=\"notice\">".get_lang(18, $datacnt)."</font><br /><br /><br />\n";
        echo "<div id=\"up_status\" class=\"notice\"></div>\n<br /><br /><br />\n";
        flush();

		$totalins = $datacnt;	
		$qins = 0;
		$qupd = 0;
		$qupdins = 0;
		$skips=0;
		$qupdcnts = 1;
		$qdels=0;
		$perten=0;
		$dupfsize=0;

		if ($datalen > 0)
		{
			for ($i=0;$i<$datacnt;$i++)
			{
				if ($win32 == 1) $datalook[$i] = slashtranslate($datalook[$i]);
				$file = $datalook[$i];
				$filein = substr($file, $base_dir_len);
				$filetest = $filein;				

				$perten++;
				if ($debugmode == 1) $perten = 50;
				if ($perten == 50)
				{
					if ($totalins > $totalqupds)
					{
						$percent2 = ($qins / $totalins) * 100; 
						$percent2 =substr($percent2,0,4)."%"; 
					} else $percent2 = "100%";
					if ($qupd > 0 && $totalqupds>0)
					{ 
						$percent = ($qupd / $totalqupds) * 100; 
						$percent=substr($percent,0,4)."%"; 
					} else $percent="100%";
					$perout = get_lang(20,$percent2,$percent);
					

					echo "\t\t<script type=\"text/javascript\">document.all.up_status.innerHTML=\"$perout ";
					echo (strlen($filein) > 60) ? addslashes(substr($filein,0,60))."..." : addslashes($filein) ;
	                echo "\";</script>\n";
	                flush();

					$perten = 0;
				}
				$skip = 0;
				
				$fsize = filesize($base_dir.$filetest);
				
				if (!$fsize)
				{
					echo "<font class=\"notice\">".get_lang(19,$base_dir.$filetest)."</font><br>";
					flush();
					$skips++;
					$skip=1;
				}

				$album = "";
				$title = "";
				$artist = "";

				if ($skip==0)
				{
					$filecntr++;
					$md5 = md5file($base_dir.$filetest);
					
					if (!empty($md5))
					{
		
						// $ret = array('title','artist','album','length','bitrate','lengths');	
						if ($fullrebuild == 1)
							$fid = get_file_info($base_dir.$filetest);	
					
						$found = 0;
				
						for ($i2=0;$i2<$dcntr;$i2++)
						if ($db_fsize[$i2] == $fsize) 
						{	
							if ($db_out['md5'][$i2] == $md5) 
							{
								// we have the same file, clear cache
								$db_fsize[$i2] = -1;
							
								if ($fullrebuild == 1) 
								{
									$query = search_qupdcontruct(@$fid['album'], @$fid['title'], @$fid['artist'], $filein, $md5, $db_out['id'][$i2]);
									$qupdins++;
								} 
								else
								if ($db_out['free'][$i2] != $filein) 
								{
									$query = search_qupdfree($filein, $db_out['id'][$i2]); 
									$qupdins++;
								}

								$qupd++;
								$found = 1;
								break;
							} else $dupfsize++;
						}

						if ($found == 0)
						{
						
							if ($fullrebuild == 0)
								$fid = get_file_info($base_dir.$filetest);
						
							$query = search_qinscontruct(@$fid['album'], @$fid['title'], @$fid['artist'], $filein, $md5, $fsize);
							$qins++;
						}
				
						if (!empty($query))
						{
							
							if ($unbuff) $result = mysql_unbuffered_query($query); else 
								$result = mysql_query($query);	
							$query="";
							if (!$result) 
							{ 
								$failed++;
								echo "<font class=\"wtext\">".get_lang(22, $querybuf)."</font><br />";
							} 					
						}
					} else 
					{ 
						echo "<font class=\"notice\">".get_lang(23,$base_dir.$filetest)."</font><br>";
						flush();
						$skips++;
					}
				}
			
				if ($qupd > ($qupdcnts * 350))
				{
					// rebuild hash table - removing old entries.
					$dcntr_n=0;
				
					for ($i2=0;$i2<$dcntr;$i2++)
					if ($db_fsize[$i2] != -1) 
					{
						$db_fsize_n[$dcntr_n] = $db_fsize[$i2];
						$db_out_n['id'][$dcntr_n] = $db_out['id'][$i2];
						$db_out_n['md5'][$dcntr_n] = $db_out['md5'][$i2];
						$db_out_n['free'][$dcntr_n] = $db_out['free'][$i2];
						$dcntr_n++;
					}
					$db_fsize = $db_fsize_n;
					$db_out = $db_out_n;
					$dcntr = $dcntr_n;
					$qupdcnts++;
				}
			}		
		}

	
		// count unfound entries..

		$fordel = 0;
		for ($i2=0;$i2<$dcntr;$i2++)
		if ($db_fsize[$i2] != -1) $fordel++;

		if ($deleteunused == 1)
		{
			if ($skips == 0)
			{
				for ($i2=0;$i2<$dcntr;$i2++)
				if ($db_fsize[$i2] != -1) 
				{
					echo "<font class=\"notice\">".get_lang(24, $db_out['free'][$i2]);
					$query = "delete from tbl_search where id = ".$db_out['id'][$i2];
					$result = mysql_unbuffered_query($query);			
					if ($result) $qdels++;
					echo "</font><br>";
				}
			}
		}
		$runtime = (time() - $starttime);

      echo "<script type=\"text/javascript\">document.all.up_status.innerHTML=\"\";</script>\n";
         
         echo "<br /><font class=\"notice\">".get_lang(26)."<br />".
         "<br />".
		get_lang(25, $qins, $qupdins, $qdels, $failed, $skips, $filecntr, $runtime, $fordel).
		"</font><br /><br />".
		"<input type=\"button\" value=\"".get_lang(27)."\" name=\"close me\" class=\"fatbuttom\" ".
             "onclick=\"javascript: self.close(); \" />";

		 } else echo "<br /><font class=\"notice\">".
         get_lang(28, $base_dir)."</font><br />";
		Kprint_end();

}

// end of search...

// start of file...

// should we send a extm3u along?
function show_extm3u()
{
	global $phpenv;
	if (user_getfield("extm3u") == 0) return 0;
	if (preg_match("/windows/i", $phpenv['useragent'])) return 1;
	return 0;
}

function httpstreamheader($c,$pdir,$cookie,$ftype=1)
{
	global $phpenv, $streamtypes;
	echo "http://".$phpenv['streamlocation']."?stream=$c&p=$pdir&c=$cookie".$streamtypes[$ftype][2]."\n";
}

// plays a whole dir.
function kPlay_sendall($pdir, $cookie)
{
		global $phpenv, $base_dir, $dir_list, $file_list;

		$pdir_64=$pdir;
		if (!empty($pdir)) $pdir=stripslashes(base64_decode($pdir));
		Kread_ioresources($base_dir.$pdir);

		$doext3 = 0;
		if (show_extm3u() == 1) $doext3 = 1;

		if ($doext3 == 1) echo "#EXTM3U\n";
		for ($c = 0; $c < count($file_list); $c++)
		{
			$file_name_dec=$file_list[$c].".m3u";
			if ($doext3==1) echo "#EXTINF:-1,$file_list[$c]\n";
			echo httpstreamheader($c,$pdir_64,$cookie,file_type($file_list[$c])); 
		}
}

function kPlay_fileinf($pdir, $cnt)
{
	global $base_dir, $file_list;
	$newdir="";
	if (!empty($pdir)) $newdir=stripslashes(base64_decode($pdir));
	Kread_ioresources($base_dir.$newdir);
        return $file_list[$cnt];	
}

function kPlay_sendlink($pdir, $count, $cookie)
{
	global $base_dir, $dir_list, $file_list;
	$filedesc = kPlay_fileinf($pdir, $count);
	if (show_extm3u() == 1) echo "#EXTINF:-1,$filedesc\n";
	echo httpstreamheader($count,$pdir,$cookie,file_type($filedesc));
}


function kplay_m3uurl()
{
	header("Content-Disposition: inline; filename=kPlaylist.m3u");
	header("Content-Type: audio/x-mpegurl");
	if (show_extm3u() == 1) echo "#EXTM3U\n";
	
}

function Kplay_resource($pdir, $count, $cookie, $many=0)
{
		global $base_dir, $dir_list, $file_list, $u_cookieid, $streamtypes;

		$filedesc = kPlay_fileinf($pdir, $count);	
		$ftype = file_type($filedesc);
		if ($streamtypes[$ftype][3] == "1")
		{
			kplay_m3uurl();
			if ($many == 0)
			{
				$filedesc = kPlay_fileinf($pdir, $count);
				if (show_extm3u() == 1) echo "#EXTINF:-1,$filedesc\n";
				httpstreamheader($count,$pdir,$cookie,file_type($filedesc));
				die();
			}
		} else Kplay_senduser($pdir, $count, $cookie, 1);		
}

function Kplay_senduser($pdir, $count, $cookie, $inline=0)
{
	global $base_dir, $dir_list, $file_list, $win32, $streamtypes, $_SERVER, $allow_seek;

	$pdir_64=$pdir;

	if (checkstructure($pdir) == 0)
	{
		if (!empty($pdir)) $pdir=stripslashes(base64_decode($pdir));

		Kread_ioresources($base_dir.$pdir);

		$file_name_dec=$file_list[$count];
		$display_name = $file_list[$count];
		
		if (!empty($pdir)) if ($pdir[0] == '/') $pdir = substr($pdir, 1, strlen($pdir));

		$fp=fopen("$base_dir$pdir$file_name_dec", "rb");

		if ($fp)
		{
			$id = search_findid($base_dir.$pdir.$file_name_dec);
                	if (is_numeric($id)) search_updatevote($id);
			
			$ftype = file_type($file_name_dec);
			$file_size=filesize("$base_dir$pdir$file_name_dec");

			$mimeheader = "Content-Type: ".$streamtypes[$ftype][1];
                        header($mimeheader);

			if ($inline == 0)
			{		
				header("Content-Disposition: filename=$display_name"); 
				if ($allow_seek) header("Content-Length: $file_size");
			}
			else
			{
				header("Content-Disposition: inline; filename=$display_name");	
				header("Content-Length: $file_size");
			}

			$pos = 0;
			if ($allow_seek && isset($_SERVER['HTTP_RANGE']))
			{		
				$data = explode("=",$_SERVER['HTTP_RANGE']);
        			$ppos = explode("-", $data[1]);
        			$pos = $ppos[0];
			} 
			
			if ($pos > 0) fseek($fp, $pos);

			while (!feof($fp))
			{
				$data = fread($fp, 32768);
				echo $data;
			}	
			
			if (!connection_aborted()) fclose($fp);

		}
		else syslog_write("Could not open file for stream: $base_dir$pdir$file_name_dec.");
	}
	die();
}

function Kplay_download($pdir, $count, $cookie, $exp_send=0)
{
	global $base_dir, $dir_list, $file_list, $win32, $streamtypes, $allow_download;
	$pdir_64=$pdir;

	if (!$allow_download) die("Sorry, download function is disabled");
	if (checkstructure($pdir) == 0)
	{
		if (!empty($pdir)) $pdir=stripslashes(base64_decode($pdir));

		Kread_ioresources($base_dir.$pdir);

		$file_name_dec=$file_list[$count];
		$display_name = $file_list[$count];
		if (!empty($pdir)) if ($pdir[0] == '/') $pdir = substr($pdir, 1, strlen($pdir));
		$fp=fopen("$base_dir$pdir$file_name_dec", "rb");

		if ($fp)
		{
			$id = search_findid($base_dir.$pdir.$file_name_dec);
                	if (is_numeric($id)) search_updatevote($id); //else syslog_write("Could not find id from file $base_dir$pdir$file_name_dec, $id");
			
			$ftype = file_type($file_name_dec);
			$file_size=filesize("$base_dir$pdir$file_name_dec");
			$mimeheader = "Content-Type: ".$streamtypes[$ftype][1];
			header($mimeheader);
			header("Content-Disposition: attachment; filename=$display_name");
			header("Content-Length: $file_size");

			fpassthru($fp);

		}
		else syslog_write("Could not open file for stream: $base_dir$pdir$file_name_dec.");
	}
	die();
}

function base64confirm($pdir)
{
	$l = strlen($pdir);
	$cut = $l;
	if ($l > 1)
	{
		for ($i=$l-1;$i>1;$i--)
		if ($pdir[$i] == '/' && $pdir[$i-1] == '/') $cut = $i;
	}
	return substr($pdir,0,$cut);
}

function print_dir($name, $pdir, $nr, $return=0,$image="dir",$title="")
{
	global $PHP_SELF, $u_cookieid;

	$pdir_64="";
	if (!empty($pdir)) $pdir_64 = base64_encode($pdir);
	
	$out = "\n".'<tr>'."\n".'<td>'. "\n". '&nbsp;<a href="'.$PHP_SELF."?n=". $nr. "&amp;p=". $pdir_64.'"><img alt="'.get_lang(115).'" src="'.$PHP_SELF.'?image='.$image.'" border="0"'; 
	//if (!empty($title)) $out .= ' alt="'.$title.'" '.' title="'.$title.'"';
	
	if (!empty($title)) $out .= ' title="'.checkchs($title).'"';
	$out .= '/>'.checkchs($name).'</a>'. "\n".'</td>'."\n".'</tr>';
	if ($return == 1) return $out; else echo $out;	
}

function file_type($name)
{
	global $streamtypes;
	$match="";
	for ($i=0;$i<count($streamtypes);$i++)
	{
		if (strlen($name) >= strlen($streamtypes[$i][0]) )
		{
			$match = substr($name, strlen($name)-strlen($streamtypes[$i][0]));
			if (preg_match("/".$streamtypes[$i][0]."/i", $match)) return $i;  
		}
	}
	return -1; // unknown

}

// here you can plug in other sources for parses, for example support for id3v2, etc.
function get_file_info($name)
{
	$ret = array('title','artist','album','length','bitrate','lengths');
	$cret = count($ret);
	$ftype = file_type($name);
	if ($ftype != -1) // unknown
	{
		if ($ftype == 0 || $ftype == 5 )
		{
			$id3 = new id3($name);
			$ret['title'] = trim($id3->name);
			$ret['artist'] = trim($id3->artists);
			$ret['album'] = trim($id3->album);
			$ret['length'] = $id3->length;
			$ret['bitrate'] = $id3->bitrate;
			$ret['lengths'] = $id3->lengths;
		} else
		if ($ftype == 2) 
		{	
			$ogg = new ogg($name);
			foreach ($ogg->fields AS $name => $val) 
			{
				for ($i=0;$i<$cret;$i++)
				{
					if (strcasecmp($name, $ret[$i]) == 0) 
					{
						$in = $ret[$i];
						$ind = "";
						foreach ($val AS $contents) $ind .= $contents; 
						$ret[$in] = $ind;
					}
				}
			}
		}
	}
	return $ret;
}

function print_file($name, $pdir, $nr, $showlink=0, $includeabsolute=0, $returnout=0)
{
	global $PHP_SELF, $u_cookieid, $base_dir, $allow_download;

	$inf = get_file_info($base_dir.$pdir."/".$name);

	$pdir_64 = base64_encode($pdir);

	if (!empty($inf['title'])) $title = rtrim($inf['title'])." - ".rtrim($inf['album']); else $title="";
	
	$extra="";
	$extravalue="";

	if ($showlink) $extra = "<a href=\"$PHP_SELF?p=$pdir_64\" title=\"".get_lang(116, checkchs($pdir))."\"><img src=\"$PHP_SELF?image=link\" alt=\"".get_lang(116, checkchs($pdir))."\" border=\"0\"/>". "</a>&nbsp;";
	if ($includeabsolute) $extravalue = ";".$pdir_64;

	$out = "\n<tr>\n<td>\n";
	$out .= '<input type="checkbox" name="selected[]" value="'. $nr . $extravalue. '"/>'. "\n";

	# To enable download functonality...
	if ($allow_download) $out .= '<span class="file"><a href="'. $PHP_SELF. "?downloadfile=". $nr. "&amp;p=". $pdir_64. 
	"&amp;c=". $u_cookieid. '"><img src="'.$PHP_SELF.'?image=saveicon" alt="'.get_lang(117).'" border="0"/></a></span> ';

	$out .=	$extra.'<a href="'. $PHP_SELF. "?s=". $nr. "&amp;p=". $pdir_64. "&amp;c=". $u_cookieid. '"';
	if (!empty($title)) $out .= ' title="'. checkchs($title). '"';
	$out .= '>'.
	//$name."</a>".
	'<span class="file">'.checkchs($name).'</span>'. '</a>&nbsp;&nbsp;';

	if (!empty($inf['bitrate']) && !empty($inf['length']))
		$out .= "<span class=\"finfo\">(".$inf['bitrate']." kbit ".$inf['length']." mins)".'</span>';
	$out .= "\n</td>\n</tr>";

	if ($returnout == 1) return $out; else echo $out;
}

function checkstructure($where)
{
	$checkdir=stripslashes(base64_decode($where));
	$srcstr1 = "../";

	$i = strpos ( $checkdir, $srcstr1);
	if ($i == false) return 0; else return 1;
}


function Kread_ioresources($where)
{
	global $dir_list, $file_list, $base_dir, $streamtypes;
	$c = 0;
	$c2 = 0;
	$dir_list = array();
	$file_list = array();

	if ($dir = @opendir($where)) 
	{
		while ($file = readdir($dir)) 		
		{
			if ($file != "." && $file != ".." && $file != "lost+found") 
			{
				if (is_dir($where.$file))
				{
					$dir_list[$c] = $file; 
					$c++; 
				} else 
				if (file_type($file) != -1)
				{
					$file_list[$c2] = $file;
 				       $c2++;
				} 
			} 
		}
		closedir($dir);
	}
	usort($dir_list,'strcasecmp');
	usort($file_list,'strcasecmp');
}

function read_dir($pdir, $count)
{
	global $HTTPS, $require_https;

	if (!empty($pdir)) $pdir=base64_decode($pdir);

	global $base_dir, $dir_list, $file_list;

	$pdir = stripslashes($pdir);

	Kread_ioresources($base_dir.$pdir);

	if (is_numeric($count) && ($count != -1))
	{
			if (empty($pdir)) $pdir = "";
			@$pdir .= $dir_list[$count];
			if (!empty($pdir)) { if ($pdir[strlen($pdir)-1] != '/') $pdir .= '/'; } else $pdir ="";
			Kread_ioresources($base_dir.$pdir);
	}

	KCreate_Mp3Table($pdir);
	show_nice_dir($pdir);

	$out = "</td></tr>";
	for ($c=0;$c<count($dir_list);$c++)  $out .= print_dir($dir_list[$c], $pdir, $c,1);
	for ($c=0;$c<count($file_list);$c++) $out .= print_file($file_list[$c], $pdir, $c,0,1,1);
	echo $out;
	KCreate_EndMp3Table();
	KCreate_infobox();
	echo '</tr></table>';

}

function file_getvital($file)
{
	global $file_list, $dir_list, $base_dir;
	$root=1;

	for ($i=0;$i<strlen($file);$i++) if ($file[$i] == '/') $root = 0;

	if ($root == 1 || strlen($file) == 0)
	{
		$name = $file;
		$file = "";
	} else
	{
		if (strlen($file) > 0)
		{
			for ($i=strlen($file)-1;$i>0;$i--)
			{
				if ($file[$i] == '/') 
				{ 
					$name = substr($file, $i+1); 
					$file = substr($file, 0, $i); 
					break;
				}
			}
		}
	}

	$retval['base64'] = base64_encode($file); 
	$retval['dir'] = $file;
	$retval['file'] = $name;

	if ($root == 0) $gof = $file; else $gof="";
	if (strlen($gof) > 0) if ($gof[strlen($gof)-1] != '/') $gof .= '/';
	Kread_ioresources($base_dir.$gof);

	$retval['nr'] = 0;
	
	if (count($file_list) > 0)
	{
		for ($i2=0;$i2<count($file_list);$i2++)
		if (strcmp($file_list[$i2], $name) == 0) { $retval['nr'] = $i2; break; }
	}
	return $retval;
}



function read_dir_noout($pdir)
{
	if (!empty($pdir)) $pdir=base64_decode($pdir);
	global $base_dir, $dir_list, $file_list;
	Kread_ioresources($base_dir.$pdir);
}

function dir_divide($path)
{
	global $PHP_SELF, $base_dir;
	$out = "";
	$ref = "";
	$sref = '/';
	$i=0; 
	$l=strlen($path);
	if ($l>0)
	{
		for ($i;$i<$l;$i++) 
		if ($path[$i] != '/') 
		{
			$ref .= $path[$i];
			$sref .= $path[$i];
		}
		else
		{
				$ref .= '/';
				$sref .= '/';
				$out .= '<a href="'.$PHP_SELF.'?p='.base64_encode($ref).'">'.$sref.'</a>';
				$sref = "";
		}
			
	}
	return $out;
}

function show_nice_dir($pdir,$text="")
{
	global $PHP_SELF, $base_dir;

	$npos = 0;
	$nshow = "";
	$show="";
	$shownice = "";
	$root= "<a href=\"$PHP_SELF\"><img src=\"$PHP_SELF?image=root\" title=\"".get_lang(119)."\" alt=\"".get_lang(119)."\" border=\"0\"".'/></a>'."\n";
	if (empty($text))
	{
		if (empty($pdir)) $pdir = "/"; 
		else
		{
			$show = $pdir;
//			$shownice = '/'.$pdir;
		
			if ($show[strlen($show)-1] == '/')
			{

				$shownice=dir_divide($show);

				$show = substr($show,0,strlen($show)-1);
				$i=0;

				for ($i=strlen($show)-1;$i!=0;$i--)
				if ($show[$i] == "/") { $npos = $i+1; break; }
				$show = substr($show, 0, $npos);

				$p64 = base64_encode($show);

				$nshow = $root;
				//$nshow .= "\n<a title=\"".get_lang(118)."\" href=\"$PHP_SELF?p=$p64\"><img src=\"$PHP_SELF?image=cdback\" alt=\"".get_lang(118)."\" border=\"0\"".'/>'."&nbsp;&nbsp;&nbsp;";

				$nshow .= "\n<a title=\"".get_lang(118)."\" href=\"$PHP_SELF?p=$p64\"><img src=\"$PHP_SELF?image=cdback\" alt=\"".get_lang(118)."\" border=\"0\"".'/></a>'."&nbsp;&nbsp;&nbsp;";

	   		} else $show = "";
		}
	} else $shownice = $root.$text;
	

	if (!empty($shownice))
	{
		if (!empty($nshow)) $nshow .= $shownice; else $nshow .= $shownice;
		$code = "\n<font class=\"curdir\">$nshow&nbsp;</font>\n<hr width=\"80%\" align=\"left\" size=\"1\"".'/>'; 
		echo $code;
	}
}

// end of file...

// start of actions...
function KLogon()
{
	Kprint_header(get_lang(29),"7"); 
	Kprint_login();
	Kprint_end(); 
	die();
}

function KCheckActions()
{ 
	global $_POST, $_GET, $phpenv, $u_cookieid, $u_id, $PHP_SELF, $allow_download;

	if (db_verify_stream($_GET['c'], $phpenv['remote']) != 1) { die(); }
	
	if (isset($_GET['downloadfile'])) Kplay_download($_GET['p'], $_GET['downloadfile'], $_GET['c'],0); else
	if (isset($_GET['stream'])) Kplay_senduser($_GET['p'], $_GET['stream'], $_GET['c'],0); else
	if (isset($_GET['s'])) Kplay_resource($_GET['p'], $_GET['s'], $_GET['c'], 0);
	die();
}	


// if stream, we have to authorize another way.. 

if (isset($_GET['downloadfile'])) KCheckActions();
if (isset($_GET['stream'])) KCheckActions();
if (isset($_GET['s'])) KCheckActions();

// via web

function kplaylist_filelist($where, $n="-1", $drive=0)
{
	if (checkstructure($where) == 0)
	{
		Kprint_header("kPlaylist","7");
		read_dir($where, $n,$drive); 
		Kprint_end(); 
	} 
	die();
}

if (!empty($_POST['user']) && !empty($_POST['password']))
{
	webprocess(); 
	if ($userauth == 1) 
	{
	echo '
		<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
		<HTML>
		<HEAD>
		<TITLE> | kPlaylist refreshing...</TITLE>
		<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$PHP_SELF.'"> 
		</HEAD>
		<BODY>
		</BODY>
		</HTML>';
		die();
	} 
	else
	{
		$u = $_POST['user'];
		$p = $_POST['password'];
		if ($report_attempts) syslog_write("User could not be validated (user: $u / pass: $p)");
		KLogon();			
	}
	// auth.	
} 

if (isset($_COOKIE[$cookie_name]))
{	
	if (db_verify_stream($_COOKIE[$cookie_name], $phpenv['remote']) == 1)
	{
		if ($require_https == 1 && !$https) KLogon();

		$u_cookieid = $_COOKIE[$cookie_name];
		
		$deflanguage = user_getfield("lang");

		//assume settings if they exist.

		if (isset($_POST['search'])) user_saveoption("defaultsearch", vernum($_POST['search'])); 

		if (!empty($_POST['searchfor'])) 
		{	
			$u_searchstr = stripslashes($_POST['searchfor']);
			user_saveoption("defaultid3", verchar(@$_POST['onlyid3']));
		} 
		
		if (!empty($_POST['sel_playlist'])) user_saveoption("defplaylist", vernum($_POST['sel_playlist']));

		if (!empty($_POST['sel_shplaylist'])) 
		{
			user_saveoption("defshplaylist", vernum($_POST['sel_shplaylist']));
			$_POST['sel_playlist'] = $_POST['sel_shplaylist'];
		}		

		if (isset($_POST['whatshot']))
		{
			whats_hot(user_getfield("hotrows"),0);
			die();

		} else
		if (@$_POST['action'] == "whatshot")
		{
			
			if (isset($_POST['0'])) $pos = vernum($_POST['pos']) - (vernum($_POST['cntr'])*2);
			  else $pos = vernum($_POST['pos']);
			
			whats_hot(vernum($_POST['cntr']),$pos);

			die();

		} else
		
		
		if (isset($_POST['whatsnew']))
		{
			whats_new(user_getfield("hotrows"));
			die();

		} else

		
		if (isset($_GET['artist']))
		{
			$char = $_GET['artist'];
			$query = "select artist,album,free,count(free) as many from tbl_search where rtrim(artist) like \"$char%\" and length(rtrim(album)) > 0 group by rtrim(album) order by artist";
			$result = db_execquery($query);
			$many = mysql_num_rows($result);
			
			Kprint_header(get_lang(31, $char), "7");
			KCreate_Mp3Table("");			
			show_nice_dir("",get_lang(30, $char));

			$many = 0;			
			$out = "";	
			echo "</td></tr>";
			while ($row = mysql_fetch_array($result)) 
			{
				if ($row['many'] > 3)
				{
					$free = $row['free'];
					$ret = file_getvital($free);
					$dir = $ret['dir'];
					$many++;
					$out .= print_dir($row['artist']." - ".$row['album'], $dir, $ret['nr'] , 1, "album",$row['artist']);
				}
			}
			echo $out;
			if ($many==0) echo "<tr><td><font class=\"finfo\">".get_lang(10)."</font></td></tr>";
			$file_list=array();
			KCreate_EndMp3Table(0);
			KCreate_infobox();
			echo '</tr></table></body></html>';	
			die();
		}
		
		else
		if (isset($_POST['psongsselected']) || isset($_POST['psongsall']))
		{
			if (isset($_POST['psongsselected']))
			{
				$i=0;
				kplay_m3uurl();
				//Kplay_resource($_POST['previous'], s_count($_POST['selected'][$i]), $u_cookieid, 1);
				if (isset($_POST['selected']))
				{	
					for ($i=0;$i<count($_POST['selected']);$i++)
					kPlay_sendlink(s_base64($_POST['selected'][$i]), s_count($_POST['selected'][$i]), $u_cookieid);
				}	
				die();
			} else if (isset($_POST['psongsall']))
			{				
				kplay_m3uurl();	
				//Kplay_resource($_POST['previous'], 1, $u_cookieid, 1);			
				kPlay_sendall($_POST['previous'], $u_cookieid);			
				die();
			}
		} else 

		if (!empty($_GET['editoptions']))
		{
			show_useroptions();
			die();
		} else
		
		if (@$_GET['users'] == "modify")
		{
			//var_dump($_GET);
			//die();
			if (db_guinfo($u_id, "u_access") == 0)
			{
				if (!empty($_GET['del'])) 
				{
					$id = $_GET['del'];
					if (is_numeric($id))
					{
						$query = "DELETE from tbl_users WHERE u_id = $id";
						db_execquery($query);					
					}
				} else
				if (!empty($_GET['logout'])) 
				{
					$id = $_GET['logout'];
					if (is_numeric($id))
					{
						if ($demo_mode!=1)
						{
							$query = "UPDATE tbl_users SET u_sessionkey = 0, u_status = 0 WHERE u_id = $id";
							db_execquery($query);
						}
					}
				} else
				if (!empty($_GET['edit']))
				{
					$id = $_GET['edit'];
					show_new_user_form($id);
					die();
				}
			}
			show_users();
			die();
		} else

		if ((@$_POST['useroptions']) == 'save')
		{
			save_useroptions($_POST);
			show_useroptions();
			die();
		} else
		
		if ((@$_POST['formusers']) == 'userchange')
		{
			if (db_guinfo($u_id, "u_access") == 0)
			{
				if (!empty($_POST['Submit']))
				{
					$changepw = 0;
					if (@$_POST['passchange'] == 'on') $changepw=1;
					if (@$_POST['booted'] == 'on') $booted = "1"; else $booted = "0";

					$id = $_POST['u_id'];

					$name = mysql_escape_string($_POST['name']);
					$login = mysql_escape_string($_POST['login']);
					$pass = mysql_escape_string($_POST['password']);
					$comm = mysql_escape_string($_POST['comment']);
					$access = mysql_escape_string($_POST['access']);

					if (empty($pass) && $changepw == 1)
					{
						show_new_user_form($id,$name,$pass,$comm,$login,$access);
						die();
					} 
					if (empty($name) || empty($login) ) 
					{
						show_new_user_form($id,$name,$pass,$comm,$login,$access);
						die();
					}

					$pass = md5($pass);
					if ($id == -1) $query = "INSERT into tbl_users set u_name = \"$name\", u_login = \"$login\", u_pass = \"$pass\",  u_comment = \"$comm\", u_access = $access, lang = \"$deflanguage\""; else
					{
						if ($changepw == 1) $query = "UPDATE tbl_users set u_name = \"$name\", u_login = \"$login\", u_pass=\"$pass\", u_comment = \"$comm\", u_booted = $booted, u_access = $access where u_id = $id"; else
						$query = "UPDATE tbl_users set u_name = \"$name\", u_login = \"$login\", u_booted = $booted, u_comment = \"$comm\", u_access = $access where u_id = $id";
					}
					db_execquery($query);
					show_users();
					die();					
				} else 	show_users();
			}
			die();
		} else


		if ((@$_POST['formusers']) == 'modify')
		{
			if (db_guinfo($u_id, "u_access") == 0)
			{
				$id = @$_POST['id'];
				if (!empty($_POST['newuser']))
				{
					show_new_user_form();
					die();
				}
				if (!empty($_POST['edit']))
				{
					show_new_user_form($id);
					die();
				}
			} 

			show_users();
			die();
		} else
		
		if (!empty($_POST['searchfor']) )
		{
			$idv3=0;
			if (!empty($_POST['onlyid3'])) $idv3=1;

			if ($_POST['search'] == '0') 		search($_POST['searchfor'], 0, $idv3);
			if ($_POST['search'] == '1')	search($_POST['searchfor'], 1, $idv3);
			if ($_POST['search'] == '2')	search($_POST['searchfor'], 2, $idv3);

		} else
		if (isset($_POST['logmeout']))
		{ 
			if ($demo_mode != 1) db_logout($u_cookieid, $phpenv['remote']); 
			KLogon(); 
		} else		
		if (@$_GET['action'] == 'playlist_new')
		{
			playlist_new();
			die();
		} else
		if (isset($_GET['users']))
		{
			// check if master access... 
			if (db_guinfo($u_id, "u_access") == 0) show_users();
			die();
		} else
		if (isset($_GET['filelist']))
		{
			// check if master access... 
			if (db_guinfo($u_id, "u_access") == 0) search_updatelist_options();
			die();
		} else
		if (isset($_GET['settings']))
		{
			if (db_guinfo($u_id, "u_access") == 0) if (@$_GET['settings'] == 'edit') settings_edit(); 
			die();
		} else
		if (isset($_POST['settings']))
		{
			if (db_guinfo($u_id, "u_access") == 0) if (@$_POST['settings'] == 'save') settings_save($_POST); 
			die();
		} else
		if (@$_GET['action'] == 'editplaylist')
		{
			$plid = $_GET['plid'];
			if (!empty($_GET['del']))
			{
				$id = $_GET['del'];
				if (is_numeric($id) && is_numeric($plid))
				{
					$query = "DELETE from tbl_playlist_list WHERE id = $id";
					db_execquery($query);
					playlist_rewriteseq($plid);
				}
			}
			playlist_editor($plid,$_GET['p']);
			die();
		} else

		if (@$_POST['action'] == 'playlist') 
		{
			if (!empty($_POST['saveseq'])) 
			{
				playlist_savesequence($_POST['seq'],$_POST['sel_playlist']);
				playlist_editor($_POST['sel_playlist'], $_POST['previous']);
				die();
			}

			if (!empty($_POST['addplaylist']))
			{
				Kprint_header("add playlist","7");

				if (empty($_POST['selected'])) 
				{
					echo "<font color=\"#000000\" class=\"notice\">".get_lang(32)."&nbsp;&nbsp;</font>";
				} else
				{
					db_addtoplaylist($_POST['sel_playlist'], $_POST['previous'], 1, $_POST['selected'], "yes");
					echo "<font color=\"#000000\" class=\"notice\">".get_lang(33)."&nbsp;&nbsp;</font>";
				}
				echo "<a href=\"javascript:history.go(-1)\" class=\"fatbuttom\">&nbsp;".get_lang(34)."&nbsp;</a>\n";
				echo "</body></html>";
				die();

			} else

			if (!empty($_POST['saveplaylist']))
			{
				if (is_numeric($_POST['sel_playlist']) && !empty($_POST['playlistname']) )
				{
					$shared=0;
					$shuffle = 0;
					if (@$_POST['shared'] == 'on') $shared=1;
					if (@$_POST['shuffle'] == 'on') $shuffle=1; 

					$id = $_POST['sel_playlist'];
					$name = mysql_escape_string($_POST['playlistname']);
					$query = "UPDATE tbl_playlist set name = \"$name\", public = $shared, status = $shuffle where listid = $id";
					db_execquery($query);
				}
				playlist_editor($_POST['sel_playlist'], $_POST['previous']);
				die();
			} else

			if (!empty($_POST['playplaylist']))
			{
				$plid = $_POST['sel_playlist'];
				$query = "select status from tbl_playlist where listid = $plid";
				$result = db_execquery($query);
				if ($result)
				{
					$row = mysql_fetch_array($result);
					$shuffle = $row['status'];
				}
				$query = "SELECT * from tbl_playlist_list WHERE listid = $plid order by seq asc";
				$result = db_execquery($query);

				$tunes = array();
				$i=0;
				while ($row = mysql_fetch_array($result))
				{
					$tunes[$i]['pdir'] = $row['pdir'];
					$tunes[$i]['cnt'] = $row['cnt'];
					$i++;
				}
				$cnt = $i;
				if ($shuffle)
				{
					srand ((double)microtime()*1000000);
					for ($j=count($tunes)-1; $j>0; $j--) 
					{
						if (($i = rand(0,$j))<$j) 
						{
							$swp=$tunes[$i]; 
							$tunes[$i]=$tunes[$j]; 
							$tunes[$j]=$swp;
					    }
					}
				}					

				kplay_m3uurl();	
				for ($i=0;$i<$cnt;$i++) kPlay_sendlink($tunes[$i]['pdir'], $tunes[$i]['cnt'], $u_cookieid);
				die();

			} else
			if (!empty($_POST['deleteplaylist']))
			{
				if (is_numeric($_POST['sel_playlist']))
				{
					$id = $_POST['sel_playlist'];
					playlist_delete($id);
					kplaylist_filelist($_POST['previous'],-1);
					die();
				}
				playlist_editor($_POST['sel_playlist'], $_POST['previous']);
				die();
			} else
			if (!empty($_POST['editplaylist']) || !empty($_POST['viewplaylist']))
        	{
			   $pre=$_POST['previous'];
			   playlist_editor($_POST['sel_playlist'], $pre);
			   die();
			} else
			if (!empty($_POST['playselected']))
			{
	
				kplay_m3uurl(); 	
				//Kplay_resource($_POST['previous'], 0, $u_cookieid,  1);
				for ($i=0;$i<count(@$_POST['selected']);$i++)
				{
					$id = $_POST['selected'][$i];
					$query = "select * from tbl_playlist_list where id = $id";
					$result = db_execquery($query);
					$row = mysql_fetch_array($result);
					kPlay_sendlink($row['pdir'], $row['cnt'], $u_cookieid);				
				//var_dump($_POST);
				}
				die();
			} else
			if (!empty($_POST['delselected']))
			{
				if (count($_POST['selected']) > 0)
				{
					for ($i=0;$i<count($_POST['selected']);$i++)
					{
						$id = $_POST['selected'][$i];
						$query = "delete from tbl_playlist_list where id = $id";
						$result = db_execquery($query);
					}
					playlist_rewriteseq($_POST['sel_playlist']);
				}
				playlist_editor($_POST['sel_playlist'], $_POST['previous']);
				die();
			} else playlist_editor($_POST['sel_playlist'], $_POST['previous']);
			
		} else
		if (!empty($_POST['newplaylist']))
		{
			if (empty($_POST['name'])) { playlist_new(); die(); }
			$shared=0;
			if (@$_POST['shared'] == 'on') $shared=1;
			// we should fetch this: 
			$newid = -1; 
			$added = 0;	
			$added = playlist_createnew($_POST['name'],$shared);
			Kprint_header("new playlist","7");
    
			if ($added) 
		       echo "<font color=\"#000000\" class=\"notice\">".get_lang(35)."</font><br /><br/>\n"; else
				echo "<font color=\"#000000\" class=\"notice\">".get_lang(137)."</font><br /><br/>\n";

			 echo   '<a href="javascript:void(0);" onclick="window.close();window.opener.location.reload();"><font color="blue">'.get_lang(27)."</a></font>";

		if ($added) echo '<font class="notice"> - '.get_lang(36).'</font>';
			Kprint_end();
			die();
		} else
		if (@$_POST['update'] == 'options')
		{
			if (db_guinfo($u_id, "u_access") == 0) search_updatelist($_POST);
			die();
		} 
		// read dir.. standard procedure.
		else
		{
			kplaylist_filelist(@$_GET['p'], @$_GET['n'], @$_GET['d']);
		}
	} else
	{
		KLogon();
	}
} else KLogon();

// end of actions...

?>
