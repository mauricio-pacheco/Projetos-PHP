<form action="index.php?ToDo=testShippingProviderQuote" method="post" onsubmit="return ValidateForm(CheckQuoteForm)">

<input type="hidden" name="methodId" value="%%GLOBAL_MethodId%%" />

<fieldset style="margin:10px">

<legend>%%LNG_AusPostShippingQuote%%</legend>

<table width="100%" style="background-color:#fff" class="Panel">

	<tr>

		<td style="padding-left:15px">

			&nbsp;

		</td>

		<td>

			<img style="margin-top:5px" src="../modules/shipping/auspost/images/%%GLOBAL_Image%%" />

		</td>

	</tr>

	<tr>

		<td style="padding-left:15px">

			<span class="Required">*</span> %%LNG_AusPostDeliveryType%%:

		</td>

		<td>

			<select name="delivery_type" id="delivery_type" class="Field250">

				%%GLOBAL_DeliveryTypes%%

			</select>

		</td>

	</tr>

	<tr>

		<td style="padding-left:15px">

			<span class="Required">*</span> %%LNG_AusPostDestinationCountry%%:

		</td>

		<td>

			<select name="delivery_country" id="delivery_country" class="Field250">

				%%GLOBAL_Countries%%

			</select>

		</td>

	</tr>

	<tr>

		<td style="padding-left:15px">

			<span class="Required">*</span> %%LNG_AusPostDestinationPostcode%%:

		</td>

		<td>

			<input name="delivery_postcode" id="delivery_postcode" class="Field50">

		</td>

	</tr>

	<tr>

		<td style="padding-left:15px">

			<span class="Required">*</span> %%LNG_AustPostWeight%%:

		</td>

		<td>

			<input name="delivery_weight" id="delivery_weight" class="Field50">%%LNG_AustPostKGS%%

		</td>

	</tr>

	<tr>

		<td style="padding-left:15px">

			<span class="Required">*</span> %%LNG_AustPostLength%%:

		</td>

		<td>

			<input name="delivery_length" id="delivery_length" class="Field50">%%LNG_AustPostCMS%%

		</td>

	</tr>

	<tr>

		<td style="padding-left:15px">

			<span class="Required">*</span> %%LNG_AustPostWidth%%:

		</td>

		<td>

			<input name="delivery_width" id="delivery_width" class="Field50">%%LNG_AustPostCMS%%

		</td>

	</tr>

	<tr>

		<td style="padding-left:15px">

			<span class="Required">*</span> %%LNG_AustPostHeight%%:

		</td>

		<td>

			<input name="delivery_height" id="delivery_height" class="Field50">%%LNG_AustPostCMS%%

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

		var delivery_postcode = document.getElementById("delivery_postcode");

		var delivery_weight = document.getElementById("delivery_weight");

		var delivery_length = document.getElementById("delivery_length");

		var delivery_width = document.getElementById("delivery_width");

		var delivery_height = document.getElementById("delivery_height");



		if(delivery_postcode.value == "") {

			alert("%%LNG_AusPostEnterDestinationPostcode%%");

			delivery_postcode.focus();

			return false;

		}



		if(isNaN(delivery_weight.value) || delivery_weight.value == "") {

			alert("%%LNG_AusPostEnterValidWeight%%");

			delivery_weight.focus();

			delivery_weight.select();

			return false;

		}



		if(isNaN(delivery_length.value) || delivery_length.value == "") {

			alert("%%LNG_AusPostEnterValidLength%%");

			delivery_length.focus();

			delivery_length.select();

			return false;

		}



		if(isNaN(delivery_width.value) || delivery_width.value == "") {

			alert("%%LNG_AusPostEnterValidWidth%%");

			delivery_width.focus();

			delivery_width.select();

			return false;

		}



		if(isNaN(delivery_height.value) || delivery_height.value == "") {

			alert("%%LNG_AusPostEnterValidHeight%%");

			delivery_height.focus();

			delivery_height.select();

			return false;

		}



		return true;

	}



</script>



