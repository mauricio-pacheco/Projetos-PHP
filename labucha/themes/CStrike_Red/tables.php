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
<td width=\"40\" align=\"right\" valign=\"bottom\"><img src=\"themes/CStrike_Red/images/blocks/hdr_left.gif\" width=\"25\" height=\"25\" border=\"0\" alt=\"\" /></td>
	<td width=\"100%\" align=\"center\" valign=\"middle\" background=\"themes/CStrike_Red/images/blocks/hdr_mid.gif\"><font class=\"block-title\"><strong>$title</strong></font></td>
	<td width=\"40\" align=\"left\" valign=\"bottom\"><img src=\"themes/CStrike_Red/images/blocks/hdr_right.gif\" width=\"25\" height=\"25\" border=\"0\" alt=\"\" /></td>
</tr>


      </table>
      <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
     <tr>
     <td bgcolor=\"#CCCCCC\">
     <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
      <tr>
       <td bgcolor=\"#000000\">
       <table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\">
        <tr>
         <td bgcolor=\"#212121\">
         <table width=\"98%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\">
          <tr>
           <td STYLE=\"padding: 5px; padding-top: 0;\">";
}

function CloseTable() {
    echo "</td>
           </tr>
         </table>
        </td>
      </tr>
    </table>
   </td>
   </tr>
  </table>
  </td>
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