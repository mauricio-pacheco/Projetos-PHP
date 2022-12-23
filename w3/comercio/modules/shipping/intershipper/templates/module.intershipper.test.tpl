<script type="text/javascript" src="script/common.js"></script>

<script type="text/javascript" language="javascript">

	var url = 'remote.php';

</script>

<form action="index.php?ToDo=testShippingProviderQuote" method="post" onsubmit="return ValidateForm(CheckQuoteForm)">

<input type="hidden" name="methodId" value="%%GLOBAL_MethodId%%" />

<fieldset style="margin:10px">

<legend>%%LNG_IntershipperShippingQuote%%</legend>

<table width="100%" style="background-color:#fff" class="Panel">

	<tr>

		<td style="padding-left:15px">

			&nbsp;

		</td>

		<td>

			<img style="margin-top:5px" src="../modules/shipping/intershipper/images/%%GLOBAL_Image%%" />

		</td>

	</tr>

	<tr>

		<td style="padding-left:15px">

			<span class="Required">*</span> %%LNG_IntershipperCarriers%%:

		</td>

		<td>

			<select name="delivery_carriers[]" id="delivery_carriers" class="Field250 ISSelectReplacement" multiple="multiple" size="6">

				%%GLOBAL_Carriers%%

			</select>

		</td>

	</tr>

	<tr>

		<td style="padding-left:15px">

			<span class="Required">*</span> %%LNG_IntershiperDestinationCountry%%:

		</td>

		<td>

			<select name="delivery_country" id="delivery_country" class="Field250">

				%%GLOBAL_Countries%%

			</select>

		</td>

	</tr>

	<tr>

		<td style="padding-left:15px">

			<span class="Required">*</span> %%LNG_IntershipperDestinationZip%%:

		</td>

		<td>

			<input name="delivery_zip" id="delivery_zip" class="Field50">

		</td>

	</tr>

	<tr>

		<td style="padding-left:15px">

			<span class="Required">*</span> %%LNG_IntershipperWeight%%:

		</td>

		<td>

			<input name="delivery_weight" id="delivery_weight" class="Field50">%%GLOBAL_Measurement%%

		</td>

	</tr>

	<tr>

		<td width="120" style="padding-left:15px">

			<span class="Required">*</span> %%LNG_IntershipperWidth%%:

		</td>

		<td>

			<input name="delivery_width" id="delivery_width" class="Field50" />%%LNG_Inches%%

		</td>

	</tr>

	<tr>

		<td width="120" style="padding-left:15px">

			<span class="Required">*</span> %%LNG_IntershipperLength%%:

		</td>

		<td>

			<input name="delivery_length" id="delivery_length" class="Field50" />%%LNG_Inches%%

		</td>

	</tr>

	<tr>

		<td width="120" style="padding-left:15px">

			<span class="Required">*</span> %%LNG_IntershipperHeight%%:

		</td>

		<td>

			<input name="delivery_height" id="delivery_height" class="Field50" />%%LNG_Inches%%

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

</fieldset>



<script type="text/javascript">



	function CheckQuoteForm() {

		var delivery_carriers = document.getElementById("delivery_carriers");

		var delivery_country = document.getElementById("delivery_country");

		var delivery_zip = document.getElementById("delivery_zip");

		var delivery_weight = document.getElementById("delivery_weight");

		var delivery_width = document.getElementById("delivery_width");

		var delivery_length = document.getElementById("delivery_length");

		var delivery_height = document.getElementById("delivery_height");



		if(delivery_carriers.selectedIndex == -1) {

			alert("%%LNG_IntershipperChooseCarrier%%");

			delivery_carriers.focus();

			return false;

		}



		if(delivery_country.selectedIndex == 0) {

			alert("%%LNG_IntershipperChooseCountry%%");

			delivery_country.focus();

			return false;

		}



		if(delivery_zip.value == "") {

			alert("%%LNG_IntershipperEnterDestinationZip%%");

			delivery_zip.focus();

			return false;

		}



		if(isNaN(delivery_weight.value) || delivery_weight.value == "") {

			alert("%%LNG_IntershipperEnterValidWeight%%");

			delivery_weight.focus();

			delivery_weight.select();

			return false;

		}



		if(isNaN(delivery_width.value) || delivery_width.value == "") {

			alert("%%LNG_IntershipperEnterValidWidth%%");

			delivery_width.focus();

			delivery_width.select();

			return false;

		}



		if(isNaN(delivery_length.value) || delivery_length.value == "") {

			alert("%%LNG_IntershipperEnterValidLength%%");

			delivery_length.focus();

			delivery_length.select();

			return false;

		}



		if(isNaN(delivery_height.value) || delivery_height.value == "") {

			alert("%%LNG_IntershipperEnterValidHeight%%");

			delivery_height.focus();

			delivery_height.select();

			return false;

		}



		return true;

	}



</script>



