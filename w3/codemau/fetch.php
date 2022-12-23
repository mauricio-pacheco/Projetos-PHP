<?php

include("mainfile.php");

if ($fetchid == "") {
        header("location: index.php");
}

if ($checkpass == $passcode) {
$url = base64_decode($fetchid);
        if (ereg ("http", $url, $location)) {
                /* Increase the counter for total downloads */
                sql_query("update ".$prefix."_downloads_downloads set hits=hits+1 where lid=$lid", $dbi);
                header("location: $url");
                exit;
        }

        if (file_exists($url)) {
                /* Fetch the file if it exists */

                /* Increase the counter for total downloads */
                sql_query("update ".$prefix."_downloads_downloads set hits=hits+1 where lid=$lid", $dbi);
                header("location: $url");
                exit;
        } else {
                cookiedecode($user);
                $username = $cookie[1];
                if ($username == "") {
                        $username = "Guest";
                }
                $date = date("M d, Y g:i:a");

                /* Flag it for being a broken link if it isn't found */
                sql_query("insert into ".$prefix."_downloads_modrequest values (NULL, $lid, 0, 0, '', '', '', 'Download Script<br>$date', 1, '$auth_name', '$email', '$filesize', '$version', '$homepage')", $dbi);

                include("header.php");

                OpenTable();
                echo "<center><font class=\"title\">File non trovato: $title</font></center>";
                CloseTable();
                echo "<br>";

                OpenTable();
                echo "<p>Spiacente $username, Il file <b>\"$title\"</b> non è stato trovato.
                Potrebbe essere che il download è stato rimosso oppure rinominato.</p>
                <p>Questo download è stato automaticamente segnalato al webmaster.</p>
                <center>[ <a href=\"modules.php?name=Downloads\">Torna ai Downloads</a> ]</center>";
                CloseTable();
                echo "<br>";

                include("footer.php");
                return;
        }

} else {
        include("header.php");

        OpenTable();
        echo "<center><font class=\"title\">"._ERROREPASS."</font></center><br><br>
        <p>"._PASSNOVAL."</p>
        <input type=\"button\" value=\"&lt;&lt; "._RIPROVA."\" onclick=\"history.go(-1)\">";
        CloseTable();
        echo "<br>";

        include("footer.php");
        return;
}

?>
