<?
echo '
                <center><h3>Select a option from below menu to learn more about that function</h3><span class="topmenu">
                        '.ALB_LIST_LNK.' ::
                        '.MY_GAL_LNK.' ::
                        '.MY_PROF_LNK.' ::
                        '.ADM_MODE_LNK.'/'.USR_MODE_LNK.' ::

                        <a href="'. $CPG_URL .'&file=gthelp&page=uploadpic">'.UPL_PIC_LNK.'</a> ::

                        '.REGISTER_LNK.' /
                        '.LOGIN_LNK.' /
                        '.LOGOUT_LNK.'
                        <br>
                        '.LASTUP_LNK.' ::
                        '.LASTCOM_LNK.' ::
                        '.TOPN_LNK.' ::
                        '.TOPRATED_LNK.' ::
                        '.FAV_LNK.' ::
                        '.SEARCH_LNK.' ::
                        <a title="HELP?" class="helplink" href="'. $CPG_URL .'&file=help">'.HELP_LNK.'</a>
                </span>
';

echo '
<table cellpadding="2" cellspacing="2">
     <tr valign="middle" align="center">
          <td class="admin_menu"><a href="'. $CPG_URL .'&file=help&page=editpics">'.UPL_APP_LNK.'</a></td>
          <td class="admin_menu"><a href="'. $CPG_URL .'&file=help&page=searchnew">'.SEARCHNEW_LNK.'</a></td>
          <td class="admin_menu"><a href="'. $CPG_URL .'&file=help&page=reviewcom">'.COMMENTS_LNK.'</a></td>
     </tr>
     <tr valign="middle" align="center">
          <td class="admin_menu">'.BAN_LNK.'</a></td>
          <td class="admin_menu"><a href="'. $CPG_URL .'&file=help&page=groupmgr">'.GROUPS_LNK.'</a></td>
          <td class="admin_menu"><a href="'. $CPG_URL .'&file=help&page=usermgr">'.USERS_LNK.'</a></td>
     </tr>
     <tr valign="middle" align="center">
          <td class="admin_menu"><a href="'. $CPG_URL .'&file=help&page=albmgr">'.ALBUMS_LNK.'</a>
          </td>
          <td class="admin_menu"><a href="'. $CPG_URL .'&file=help&page=catmgr">'.CATEGORIES_LNK.'</a>
          </td>
          <td class="admin_menu"><a href="'. $CPG_URL .'&file=help&page=config">'.CONFIG_LNK.'</a>
          </td>
     </tr>
</table>';

echo '
<table cellpadding=\"2\" cellspacing=\"2\">
    <tr>
        <td class="admin_menu"><a href="'. $CPG_URL .'&file=help&page=albmgr">'.ALBMGR_LNK.'</a></td>
        <td class="admin_menu"><a href="'. $CPG_URL .'&file=help&page=modifyalb">'.MODIFYALB_LNK.'</a></td>
        <td class="admin_menu"><a href="'. $CPG_URL .'&file=help&page=profile">'.MY_PROF_LNK.'</a></td>
    </tr>
</table>';

echo "</center>";
?>
