<?php

/************************************************************/
/* OpenTable Functions                                      */
/*                                                          */
/* Define the tables look&feel for you whole site. For this */
/* we have two options: OpenTable and OpenTable2 functions. */
/* Then we have CloseTable and CloseTable2 function to      */
/* properly close our tables. The difference is that        */
/* OpenTable has a 100% width and OpenTable2 has a width    */
/* according with the table content                         */
/************************************************************/

function OpenTable() {
    global $bgcolor1, $bgcolor2;
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\">
  <tr>
    <td>
        <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
<tr>
	<td width=\"100%\" height=\"5\" align=\"center\" valign=\"middle\" background=\"centro.gif\"></td>
</tr>
</table>
    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"1\">
        <tr>
          <td bgcolor=\"#525E6E\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"1\">
              <tr>
                <td bgcolor=\"#FFFFFF\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                    <tr>
                      <td bgcolor=\"#FFFFFF\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"4\">
                          <tr>
                            <td>
                            ";
}

function CloseTable() {
    echo "</td>
                          </tr>
                        </table>

                        </td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
      </table>
<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"100%\">
<tr>
	<td width=\"100%\" height='4' background=\"centro.gif\"><img src=\"themes/Helius/forums/images/spacer.gif\" width=\"1\" height=\"1\" border=\"0\"></td>
	</tr>
</table>
      </td>
  </tr>
</table>";
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2;
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor2\" align=\"center\"><tr><td>\n";
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"8\" bgcolor=\"$bgcolor1\"><tr><td>\n";
}

function CloseTable2() {
    echo "</td></tr></table></td></tr></table>\n";
}

?>