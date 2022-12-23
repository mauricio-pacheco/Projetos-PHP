<div id="quickbookDiv" class="GridContainer">
	<input type="hidden" id="selectedJobs" name="selectedJobs" value="" />
	<input type="hidden" id="module" name="module" value="%%GLOBAL_QuickBooksModuleID%%" />
	
	<input type="button" name="IndexReenableButton" value="%%LNG_QuickBooksSpoolListReenableButton%%" id="IndexReenableButton" class="SmallButton" onclick="reenableQBCheckboxes()" />
	<input type="button" name="IndexDisableButton" value="%%LNG_QuickBooksSpoolListDisableButton%%" id="IndexDisableButton" class="SmallButton" onclick="disableQBCheckboxes()" />
	<input type="button" name="IndexDeleteButton" value="%%LNG_QuickBooksSpoolListDeleteButton%%" id="IndexDeleteButton" class="SmallButton" onclick="deleteQBCheckboxes()" />
	
	<table class="GridPanel SortableGrid AutoExpand" cellspacing="0" cellpadding="0" border="0" style="width:100%;">
	<tr align="right">
		<td colspan="5" style="padding:6px 0px 6px 0px" class="PagingNav">
			%%GLOBAL_Nav%%
		</td>
	</tr>
	<tr class="Heading3">
		<td align="center" style="width:18px"><input type="checkbox" onclick="toggleQBCheckboxes(this.checked)"></td>
		<td>&nbsp;</td>
		<td>
			%%LNG_QuickBooksSpoolListDesc%%
		</td>
		<td>
			%%LNG_QuickBooksSpoolListStatus%%
		</td>
		<td style="width:120px;">
			%%LNG_QuickBooksSpoolListAction%%
		</td>
	</tr>
	%%GLOBAL_QuickBooksSpoolListGrid%%
	</table>
</div>

<script type="text/javascript"><!--

	function getQBCheckboxes()
	{
		return $("#quickbookDiv").find("input[type='checkbox'][name='jobs[]'][disabled!='1']");
	}

	function selectedQBCheckboxes()
	{
		return getQBCheckboxes().filter("[checked='1']");
	}

	function toggleQBCheckboxes(status)
	{
		getQBCheckboxes().each(function() { $(this).attr("checked", status); });
	}

	function setupQBCheckboxes(args)
	{
		var jobnames = [];

		if (args.length > 0)
		{
			for (var i=0; i<args.length; i++)
				jobnames[i] = args[i];
		}
		else
		{
			var sel = selectedQBCheckboxes();
			for (var i=0; i<sel.length; i++)
				jobnames[jobnames.length] = $(sel[i]).val();
		}

		return jobnames;
	}

	function deleteQBCheckboxes()
	{
		actionQBCheckboxes("delete", arguments);
	}

	function disableQBCheckboxes()
	{
		actionQBCheckboxes("disable", arguments);
	}

	function reenableQBCheckboxes()
	{
		actionQBCheckboxes("reenable", arguments);
	}

	function actionQBCheckboxes(type, args)
	{
		var multimsg, singlemsg, choosemsg, todo, jobnames = setupQBCheckboxes(args);

		switch (type)
		{
			case "disable":
				singlemsg = "%%LNG_QuickBooksSpoolListConfirmDisableSingle%%";
				multimsg  = "%%LNG_QuickBooksSpoolListConfirmDisable%%";
				choosemsg = "%%LNG_QuickBooksSpoolListChooseDisable%%";
				todo      = "disableJobAccountingSettings";
				break;
			
			case "reenable":
				singlemsg = "%%LNG_QuickBooksSpoolListConfirmReenableSingle%%";
				multimsg  = "%%LNG_QuickBooksSpoolListConfirmReenable%%";
				choosemsg = "%%LNG_QuickBooksSpoolListChooseReenable%%";
				todo      = "reenableJobAccountingSettings";
				break;
			
			case "delete":
				singlemsg = "%%LNG_QuickBooksSpoolListConfirmDeleteSingle%%";
				multimsg  = "%%LNG_QuickBooksSpoolListConfirmDelete%%";
				choosemsg = "%%LNG_QuickBooksSpoolListChooseDelete%%";
				todo      = "deleteJobAccountingSettings";
				break;

			default:
				return null;
				break;
		}


		if (jobnames.length > 0)
		{
			if (jobnames.length == 1)
				var msg = singlemsg;
			else
				var msg = multimsg;

			if (confirm(msg))
			{
				$("#selectedJobs").val(jobnames.join(","));
				$("#frmAccountingSettings").attr("action", "index.php?ToDo="+todo);
				document.getElementById("frmAccountingSettings").submit();
			}
		}
		else
			alert(choosemsg);
	}

//-->
</script>
