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
	<td width=\"30\" align=\"right\" valign=\"bottom\"><img src=\"themes/Helius/images/top_left.gif\" width=\"30\" height=\"28\" border=\"0\"></td>
	<td width=\"100%\" align=\"center\" valign=\"middle\" background=\"themes/Helius/images/top_center.gif\"></td>
	<td width=\"30\" align=\"left\" valign=\"bottom\"><img src=\"themes/Helius/images/top_right.gif\" width=\"30\" height=\"28\" border=\"0\"></td>
</tr>
</table>
    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"1\">
        <tr>
          <td bgcolor=\"#525E6E\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"1\">
              <tr>
                <td bgcolor=\"#FFFFFF\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                    <tr>
                      <td bgcolor=\"#EAEDF4\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"4\">
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
	<td width=\"40\" align=\"right\" valign=\"top\"><img src=\"themes/Helius/forums/images/bottom_left.gif\" width=\"40\" height=\"9\" border=\"0\"></td>
	<td width=\"100%\" background=\"themes/Helius/forums/images/bottom_center.gif\"><img src=\"themes/Helius/forums/images/spacer.gif\" width=\"1\" height=\"1\" border=\"0\"></td>
	<td width=\"40\" align=\"left\" valign=\"top\"><img src=\"themes/Helius/forums/images/bottom_right.gif\" width=\"40\" height=\"9\" border=\"0\"></td>
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