
<form action="index.php?ToDo=runAddon&addon=%%GLOBAL_AddonId%%&func=UpdateEmail" onSubmit="return ValidateChangeEmailForm()" name="frmChangeEmail" method="post">
<div class="BodyContainer">
<table class="OuterPanel">
<tr>
	<td class="Heading1">%%LNG_EmailChangeName%%</td>
</tr>
<tr>
	<td class="Intro">
		<p>%%LNG_EmailChangeIntro%%</p>
		%%GLOBAL_Message%%
	</td>
</tr>
<tr>
	<td>
		<div>
		<input type="submit" name="SubmitButton1" value="%%LNG_Update%%" class="FormButton">
		<input type="button" name="CancelButton1" value="%%LNG_Cancel%%" class="FormButton" onclick="ConfirmCancel()"><br /><img src="images/blank.gif" width="1" height="10" /></div>
	</td>
</tr>
<tr>
	<td>
		<table class="Panel">
		<tr>
			<td class="Heading2" colspan="2">%%LNG_EmailChangeName%%</td>
		</tr>
		<tr>
			<td class="FieldLabel">
				<span class="Required">*</span>&nbsp;%%LNG_EmailChangeFromEmail%%:
			</td>
			<td>
				<input type="text" id="fromemail" name="fromemail" class="Field300" value="%%GLOBAL_From%%" maxlength="250" />
			</td>
		</tr>
		<tr>
			<td class="FieldLabel">
				<span class="Required">*</span>&nbsp;%%LNG_EmailChangeToEmail%%:
			</td>
			<td>
				<input type="text" id="toemail" name="toemail" class="Field300" value="%%GLOBAL_To%%" maxlength="250" />
			</td>
		</tr>
		</table>

		<table class="Panel">
		<tr>
			<td class="FieldLabel">&nbsp;</td>
			<td>
				<br /><input type="submit" name="SubmitButton2" value="%%LNG_Update%%" class="FormButton">
				<input type="button" name="CancelButton2" value="%%LNG_Cancel%%" class="FormButton" onclick="ConfirmCancel()">
			</td>
		</tr>
		<tr><td class="Gap"></td></tr>
		</table>
	</td>
</tr>
</table>
</div>
</form>

<script type="text/javascript">

	function ValidateChangeEmailForm() {
		if($('#fromemail').val().indexOf('@') == -1 || $('#fromemail').val().indexOf('.') == -1) {
			alert('%%LNG_EnterValidFromEmail%%');
			$('#fromemail').focus();
			$('#fromemail').select();
			return false;
		}

		if($('#toemail').val().indexOf('@') == -1 || $('#toemail').val().indexOf('.') == -1) {
			alert('%%LNG_EnterValidToEmail%%');
			$('#toemail').focus();
			$('#toemail').select();
			return false;
		}
	}

	function ConfirmCancel() {
		if(confirm('%%LNG_EmailChangeConfirmCancel%%')) {
			document.location.href = 'index.php?ToDo=runAddon&addon=addon_emailchange';
		}
	}

</script>
