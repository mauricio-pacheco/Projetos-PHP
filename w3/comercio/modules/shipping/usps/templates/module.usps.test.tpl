<form action="index.php?ToDo=testShippingProviderQuote" method="post" onsubmit="return ValidateForm(CheckQuoteForm)">

<input type="hidden" name="methodId" value="%%GLOBAL_MethodId%%" />

<fieldset style="margin:10px">

<legend>%%LNG_USPSShippingQuote%%</legend>

<table width="100%" style="background-color:#fff" class="Panel">

	<tr>

		<td style="padding-left:15px">

			&nbsp;

		</td>

		<td>

			<img style="margin-top:5px" src="../modules/shipping/usps/images/%%GLOBAL_Image%%" />

		</td>

	</tr>

	<tr>

		<td width="120" style="padding-left:15px">

			<span class="Required">*</span> %%LNG_USPSDeliveryType%%:

		</td>

		<td>

			<select onchange="switch_type(this.selectedIndex)" name="delivery_type" id="delivery_type" class="Field250">

				<option value="EXPRESS">Express Mail</option>

				<option value="FIRST CLASS">First Class</option>

				<option value="PRIORITY">Priority Mail</option>

				<option value="PARCEL">Parcel Post (Machinable)</option>

				<option value="BPM">BPM (Bound Printed Matter)</option>

				<option value="LIBRARY">Library</option>

				<option value="MEDIA">Media</option>

			</select>

		</td>

	</tr>

</table>



<table id="express_mail_table" width="100%" style="margin-top:0px; background-color:#fff" class="Panel">

	<tr>

		<td width="120" style="padding-left:15px">

			&nbsp;&nbsp; Package Size:

		</td>

		<td>

			<select  class='Field250' name='shipping_usps_expressmailpackagesize' id='shipping_usps_expressmailpackagesize'>

				<option value='R'>Regular</option>

				<option value='L'>Large</option>

			</select>

		</td>

	</tr>

	<tr>

		<td width="120" style="padding-left:15px">

			&nbsp;&nbsp; Container Type:

		</td>

		<td>

			<select  class='Field250' name='shipping_usps_expressmailcontainertype' id='shipping_usps_expressmailcontainertype'>

				<option value='F'>Flat Rate Envelope</option>

			</select>

		</td>

	</tr>

</table>



<table id="first_class_table" width="100%" style="margin-top:0px; background-color:#fff" class="Panel">

	<tr>

		<td width="120" style="padding-left:15px">

			&nbsp;&nbsp; Package Size:

		</td>

		<td>

			<select  class='Field250' name='shipping_usps_firstclasspackagesize' id='shipping_usps_firstclasspackagesize'>

				<option value='R'>Regular</option>

				<option value='L'>Large</option>

			</select>

		</td>

	</tr>

	<tr>

		<td width="120" style="padding-left:15px">

			&nbsp;&nbsp; Container Type:

		</td>

		<td>

			<select  class='Field250' name='shipping_usps_firstclasscontainertype' id='shipping_usps_firstclasscontainertype'>

				<option value='F'>Flat Rate Envelope</option>

			</select>

		</td>

	</tr>

</table>



<table id="priority_mail_table" width="100%" style="margin-top:0px; background-color:#fff" class="Panel">

	<tr>

		<td width="120" style="padding-left:15px">

			&nbsp;&nbsp; Package Size:

		</td>

		<td>

			<select onchange='check_show_dimensions(this.selectedIndex)' class='Field250' name='shipping_usps_prioritypackagesize' id='shipping_usps_prioritypackagesize'>

				<option value='R'>Regular</option>

				<option value='L'>Large</option>

			</select>

		</td>

	</tr>

	<tr>

		<td width="120" style="padding-left:15px">

			&nbsp;&nbsp; Container Type:

		</td>

		<td>

			<select onchange='check_show_girth(this.selectedIndex)' class='Field250' name='shipping_usps_prioritycontainertype' id='shipping_usps_prioritycontainertype'>

				<option style='display:none' value='R'>Rectangular</option>

				<option style='display:none' value='N'>Non Rectangular</option>

				<option value='F' selected>Flat Rate Envelope</option>

				<option value='B'>Flat Rate Box</option>

			</select>

		</td>

	</tr>

	<tr id="priority_width" style="display:none">

		<td width="120" style="padding-left:15px">

			<span class="Required">*</span> Width:

		</td>

		<td>

			<input type='text' class='Field50' name='shipping_usps_prioritywidth' id='shipping_usps_prioritywidth' /> %%LNG_Inches%%

		</td>

	</tr>

	<tr id="priority_length" style="display:none">

		<td width="120" style="padding-left:15px">

			<span class="Required">*</span> Length:

		</td>

		<td>

			<input type='text' class='Field50' name='shipping_usps_prioritylength' id='shipping_usps_prioritylength' /> %%LNG_Inches%%

		</td>

	</tr>

	<tr id="priority_height" style="display:none">

		<td width="120" style="padding-left:15px">

			<span class="Required">*</span> Height:

		</td>

		<td>

			<input type='text' class='Field50' name='shipping_usps_priorityheight' id='shipping_usps_priorityheight' /> %%LNG_Inches%%

		</td>

	</tr>

	<tr id="priority_girth" style="display:none">

		<td width="120" style="padding-left:15px">

			<span class="Required">*</span> Girth:

		</td>

		<td>

			<input type='text' class='Field50' name='shipping_usps_prioritygirth' id='shipping_usps_prioritygirth' /> %%LNG_Inches%%

		</td>

	</tr>

</table>



<table id="parcel_post_mach_table" width="100%" style="margin-top:0px; background-color:#fff" class="Panel">

	<tr>

		<td width="120" style="padding-left:15px">

			&nbsp;&nbsp; Package Size:

		</td>

		<td>

			<select  class='Field250' name='shipping_usps_parcelpostmachpackagesize' id='shipping_usps_parcelpostmachpackagesize'>

				<option value='R'>Regular</option>

				<option value='L'>Large</option>

				<option value='O'>Oversize</option>

			</select>

		</td>

	</tr>

</table>



<table id="bpm_table" width="100%" style="margin-top:0px; background-color:#fff" class="Panel">

	<tr>

		<td width="120" style="padding-left:15px">

			&nbsp;&nbsp; Package Size:

		</td>

		<td>

			<select  class='Field250' name='shipping_usps_bpmpackagesize' id='shipping_usps_bpmpackagesize'>

				<option value='R'>Regular</option>

				<option value='L'>Large</option>

			</select>

		</td>

	</tr>

</table>



<table id="library_table" width="100%" style="margin-top:0px; background-color:#fff" class="Panel">

	<tr>

		<td width="120" style="padding-left:15px">

			&nbsp;&nbsp; Package Size:

		</td>

		<td>

			<select  class='Field250' name='shipping_usps_librarypackagesize' id='shipping_usps_librarypackagesize'>

				<option value='R'>Regular</option>

				<option value='L'>Large</option>

			</select>

		</td>

	</tr>

</table>



<table id="media_table" width="100%" style="margin-top:0px; background-color:#fff" class="Panel">

	<tr>

		<td width="120" style="padding-left:15px">

			&nbsp;&nbsp; Package Size:

		</td>

		<td>

			<select  class='Field250' name='shipping_usps_mediapackagesize' id='shipping_usps_mediapackagesize'>

				<option value='R'>Regular</option>

				<option value='L'>Large</option>

			</select>

		</td>

	</tr>

</table>



<table width="100%" style="margin-top:0px; background-color:#fff" class="Panel">

	<tr>

		<td width="120" style="padding-left:15px">

			<span class="Required">*</span> %%LNG_USPSDestinationCountry%%:

		</td>

		<td>

			<select name="delivery_country" id="delivery_country" class="Field250">

				%%GLOBAL_Countries%%

			</select>

		</td>

	</tr>

	<tr>

		<td style="padding-left:15px">

			<span class="Required">*</span> %%LNG_USPSDestinationZip%%:

		</td>

		<td>

			<input name="delivery_zip" id="delivery_zip" class="Field50">

		</td>

	</tr>

	<tr>

		<td style="padding-left:15px">

			<span class="Required">*</span> %%LNG_USPSPackageWeight%%:

		</td>

		<td>

			<input name="delivery_weight" id="delivery_weight" class="Field50">%%LNG_LBS%%

		</td>

	</tr>









	<tr>

		<td style="padding-left:15px">

			&nbsp;

		</td>

		<td class="PanelBottom">

			<input type="submit" class="FormButton" style="width:120px" value="%%LNG_GetShippingQuote%%">

		</td>

	</tr>

</table>

</legend>



<script type="text/javascript">



	function switch_type(t) {



		var type1 = document.getElementById("express_mail_table");

		var type2 = document.getElementById("first_class_table");

		var type3 = document.getElementById("priority_mail_table");

		var type4 = document.getElementById("parcel_post_mach_table");

		var type6 = document.getElementById("bpm_table");

		var type7 = document.getElementById("library_table");

		var type8 = document.getElementById("media_table");



		type1.style.display = "none";

		type2.style.display = "none";

		type3.style.display = "none";

		type4.style.display = "none";

		type6.style.display = "none";

		type7.style.display = "none";

		type8.style.display = "none";



		switch(t) {

			case 0: {

				type1.style.display = "";

				break;

			}

			case 1: {

				type2.style.display = "";

				break;

			}

			case 2: {

				type3.style.display = "";

				break;

			}

			case 3: {

				type4.style.display = "";

				break;

			}

			case 5: {

				type6.style.display = "";

				break;

			}

			case 6: {

				type7.style.display = "";

				break;

			}

			case 7: {

				type8.style.display = "";

				break;

			}

		}

	}



	function check_show_dimensions(sel) {

		var type3 = document.getElementById("priority_mail_table");

		var pw = document.getElementById("priority_width");

		var pl = document.getElementById("priority_length");

		var ph = document.getElementById("priority_height");

		var ps = document.getElementById("shipping_usps_prioritypackagesize");

		var ct = document.getElementById("shipping_usps_prioritycontainertype");



		if(sel == 1) {

			if(type3.style.display == "" && ps.selectedIndex == 1) {

				pw.style.display = "";

				pl.style.display = "";

				ph.style.display = "";



			}

			else if(ps.selectedIndex == 0) {

				pw.style.display = "none";

				pl.style.display = "none";

				ph.style.display = "none";

			}



			// Rectangular container types

			ct.options[0].style.display = "";

			ct.options[1].style.display = "";

			ct.options[2].style.display = "none";

			ct.options[3].style.display = "none";

			ct.selectedIndex = 0;

		}

		else {

			pw.style.display = "none";

			pl.style.display = "none";

			ph.style.display = "none";



			// Flat rate container types

			ct.options[0].style.display = "none";

			ct.options[1].style.display = "none";

			ct.options[2].style.display = "";

			ct.options[3].style.display = "";

			ct.selectedIndex = 2;

		}

	}



	function check_show_girth(sel) {

		var pw = document.getElementById("priority_width");

		var pg = document.getElementById("priority_girth");



		if(sel == 1 && pw.style.display == "")

			pg.style.display = "";

		else

			pg.style.display = "none";

	}



	function CheckQuoteForm() {



		var type3 = document.getElementById("priority_mail_table");

		var delivery_zip = document.getElementById("delivery_zip");

		var delivery_weight = document.getElementById("delivery_weight");



		var pw = document.getElementById("shipping_usps_prioritywidth");

		var pl = document.getElementById("shipping_usps_prioritylength");

		var ph = document.getElementById("shipping_usps_priorityheight");

		var ps = document.getElementById("shipping_usps_prioritypackagesize");

		var pg = document.getElementById("shipping_usps_prioritygirth");

		var tr_pg = document.getElementById("priority_girth");



		if(type3.style.display == "" && ps.selectedIndex == 1) {



			if(isNaN(pw.value) || pw.value == "") {

				alert("%%LNG_USPSEnterWidth%%");

				pw.focus();

				pw.select();

				return false;

			}



			if(isNaN(pl.value) || pl.value == "") {

				alert("%%LNG_USPSEnterLength%%");

				pl.focus();

				pl.select();

				return false;

			}



			if(isNaN(ph.value) || ph.value == "") {

				alert("%%LNG_USPSEnterHeight%%");

				ph.focus();

				ph.select();

				return false;

			}



			if(tr_pg.style.display == "") {

				if(isNaN(pg.value) || pg.value == "") {

					alert("%%LNG_USPSEnterGirth%%");

					pg.focus();

					pg.select();

					return false;

				}

			}

		}



		if(delivery_zip.value == "") {

			alert("%%LNG_USPSEnterDestinationZip%%");

			delivery_zip.focus();

			return false;

		}



		if(isNaN(delivery_weight.value) || delivery_weight.value == "") {

			alert("%%LNG_USPSEnterValidWeight%%");

			delivery_weight.focus();

			delivery_weight.select();

			return false;

		}



		return true;

	}



	// Show express mail by default

	switch_type(0);



</script>



