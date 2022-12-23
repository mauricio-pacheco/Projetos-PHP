<?php
global $modversion;
define(_GALVERSION, $modversion['version']);

// Date Strings
/* 2.4 */define(_GALDATEFULL, '%A, %B %d, %Y');
/* 2.4 */define(_GALDATEBRIEF, '%b %d %Y');
/* 2.4 */define(_GALTIME, '%I:%M%p');

// Copyright Strings
/* 2.4 */define(_GALCOPYRIGHT, "Powered by: My_eGallery %s AddOn Modules<br>&copy; 2001 Copyright <a href=\"http://www.marsishere.net/index.php\" target=\"_blank\">MarsIsHere.net</a>");

// Sorting of Media Menu
/* 2.4 */define(_GALSORTMEDIABY,'Sort Media by');
/* 2.4 */define(_GALMEDIASORTED,'Media currently sorted by');
/* 2.4 */define(_GALPOPULARITY1,'Popularity (Least to Most Hits)');
/* 2.4 */define(_GALPOPULARITY2,'Popularity (Most to Least Hits)');
/* 2.4 */define(_GALASC,'A');
/* 2.4 */define(_GALDESC,'D');
/* 2.4 */define(_GALNAMEAZ,'Name (A to Z)');
/* 2.4 */define(_GALNAMEZA,'Name (Z to A)');
/* 2.4 */define(_GALDATE1,'Date (Old Media Listed First)');
/* 2.4 */define(_GALDATE2,'Date (New Media Listed First)');
/* 2.4 */define(_GALRATING1,'Rating (Lowest Scores to Highest Scores)');
/* 2.4 */define(_GALRATING2,'Rating (Highest Scores to Lowest Scores)');

// Media Formats
/* 2.5 */define(_GALMEDIAMOV, 'Quicktime Movie');
/* 2.5 */define(_GALMEDIAMPG, 'MPEG Movie');
/* 2.5 */define(_GALMEDIAAVI, 'AVI Movie');
/* 2.5 */define(_GALMEDIAMP3, 'MP3 Audio');
/* 2.5 */define(_GALMEDIAMID, 'MIDI Music');
/* 2.5 */define(_GALMEDIASWF, 'Shockwave Flash');

/* 1.1 */define(_GALHITS, 'Hits');
/* 2.0 */define(_GALRATING, 'Rating');
/* 2.0 */define(_GALVOTES, 'Votes');

// WebJeff File Manager Messages (fileFunctions.php)
/* 2.5 */define(_GALFILEMOVED, 'The file <b>%s</b>has been moved  into the directory');
/* 2.5 */define(_GALFILEDELETED, "The directory <b>%s</b> has been deleted.");
/* 2.5 */define(_GALFILEDELETED2, "The File <b>%s</b> has been deleted.");
/* 2.5 */define(_GALFILEDELETED3, "This file has been deleted.");
/* 2.5 */define(_GALFILERENAMED, "You must enter a valid name");
/* 2.5 */define(_GALFILERENAMED1, "<b>%s</b> already exists");
/* 2.5 */define(_GALFILERENAMED2, "<b>%s</b> has been renamed to <b>%s</b>");
/* 2.5 */define(_GALFILECREATED, "You must enter a valid name");
/* 2.5 */define(_GALFILECREATED1, "This directory already exists");
/* 2.5 */define(_GALFILECREATED2, "The directory <b>%s</b> has been created in the directory");
/* 2.5 */define(_GALFILEUPLOADED, "<br>ERROR during Transfert!<br> %s");
/* 2.5 */define(_GALFILEUPLOADED1, "The file <b>%s</b> has been uploaded into the directory <b>%s</b>");
/* 2.6.4*/define (_GALCREATECATERROR, 'The script was unable to create the directory. Please check you write permissions.');
/* 2.6.4*/define (_GALUPLOADERROR, "The media you try to upload exceeds the maximum file size in 'General Settings' or in 'php.ini'.");
/* 2.6.4*/define (_GALUPLOADERROR2, "Please select a media to Upload.");
/* 2.6.4*/define (_GALUPLOADERROR3, "The script was unable to write in the destination directory. Please check the write permissions.");

/* 2.7.3*/define (_GALTYPENOTSUPPORTED, 'You can\'t post this file: Filetype not supported');

?>