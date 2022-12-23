<?php


	include("include/common.php");

	
	include("$config[template_path]/user_top.html");
	?>
	
	
	<table border="<? echo $style[form_border] ?>" cellspacing="<? echo $style[form_cellspacing] ?>" cellpadding="<? echo $style[form_cellpadding] ?>" width="<? echo $style[admin_table_width] ?>" class="form_main" align="center">
		<tr>
			<td colspan="2" class="row_main">
				<? getMainUserData($user) ?>
				
			</td>
		</tr>
		<tr>
			
				
				<?
				renderUserImages($user)
				?>
			<td class="row_main" valign="top">
			<? getUserEmail($user) ?>
			<br>
			<? renderUserInfo($user) ?>
			<br><br>
			<? userListings($user) ?>
			</td>
		</tr>
			<td colspan="2" class="row_main" align="center">
				<? userHitcount($user) ?>
			</td>
		</tr>
 	</table>
	
	<?
	include("$config[template_path]/user_bottom.html");
?>