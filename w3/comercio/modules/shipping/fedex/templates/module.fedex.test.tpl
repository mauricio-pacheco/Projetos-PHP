<script type="text/javascript" src="script/common.js"></script>

<script type="text/javascript" language="javascript">

	var url = 'remote.php';

</script>

<form action="index.php?ToDo=testShippingProviderQuote" method="post" onsubmit="return ValidateForm(CheckQuoteForm)">

<input type="hidden" name="methodId" value="%%GLOBAL_MethodId%%" />

<fieldset style="margin:10px">

<legend>%%LNG_FedExShippingQuote%%</legend>

<table width="100%" style="background-color:#fff" class="Panel">

	<tr>

		<td style="padding-left:15px">

			&nbsp;

		</td>

		<td>

			<img style="margin-top:5px" src="../modules/shipping/fedex/images/%%GLOBAL_Image%%" />

		</td>

	</tr>

	<tr>

		<td style="padding-left:15px">

			<span class="Required">*</span> %%LNG_FedExServiceType%%:

		</td>

		<td>

			<select name="service_type" id="service_type" class="Field250">

				%%GLOBAL_ServiceTypes%%

			</select>

		</td>

	</tr>

	<tr>

		<td style="padding-left:15px">

			<span class="Required">*</span> %%LNG_FedExDeliveryType%%:

		</td>

		<td>

			<select name="delivery_type" id="delivery_type" class="Field250">

				%%GLOBAL_DeliveryTypes%%

			</select>

		</td>

	</tr>

	<tr>

		<td style="padding-left:15px">

			<span class="Required">*</span> %%LNG_FedExDestinationCountry%%:

		</td>

		<td>

			<select name="delivery_country" id="delivery_country" class="Field250" onchange="GetStates(this, 'delivery_state')">

				%%GLOBAL_Countries%%

			</select>

		</td>

	</tr>

	<tr id="trstate">

		<td style="padding-left:15px">

			<span class="Required">*</span> %%LNG_CompanyState%%:

		</td>

		<td>

			<select style="display:%%GLOBAL_HideStateList%%" name="delivery_state" id="delivery_state" class="Field250">

				<option value="">-- Choose a State --</option>

				%%GLOBAL_StateList%%

			</select>

		</td>

	</tr>

	<tr>

		<td style="padding-left:15px">

			<span class="Required">*</span> %%LNG_FedExDestinationZip%%:

		</td>

		<td>

			<input name="delivery_zip" id="delivery_zip" class="Field50">

		</td>

	</tr>

	<tr>

		<td style="padding-left:15px">

			<span class="Required">*</span> %%LNG_FedExWeight%%:

		</td>

		<td>

			<input name="delivery_weight" id="delivery_weight" class="Field50">%%GLOBAL_Measurement%%

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



	var selDest = null;



	function CheckQuoteForm() {

		var trstate = document.getElementById("trstate");

		var delivery_state = document.getElementById("delivery_state");

		var delivery_zip = document.getElementById("delivery_zip");

		var delivery_weight = document.getElementById("delivery_weight");



		if(trstate.style.display == "") {

			if(delivery_state.selectedIndex == 0) {

				alert("%%LNG_FedExChooseState%%");

				delivery_state.focus();

				return false;

			}

		}



		if(delivery_zip.value == "") {

			alert("%%LNG_FedExEnterDestinationZip%%");

			delivery_zip.focus();

			return false;

		}



		if(isNaN(delivery_weight.value) || delivery_weight.value == "") {

			alert("%%LNG_FedExEnterValidWeight%%");

			delivery_weight.focus();

			delivery_weight.select();

			return false;

		}



		return true;

	}



	function GetStates(selObj, dest)

	{

		var state_list = document.getElementById("trstate");

		var country = selObj.options[selObj.selectedIndex].value;

		var country_text = selObj.options[selObj.selectedIndex].text;

		selDest = document.getElementById(dest);



		if(country == "" || (country_text != "United States" && country_text != "Canada") )

		{

			state_list.style.display = "none";

		}

		else

		{

			// Get all of the states for this country

			state_list.style.display = "";

			DoCallback("w=countryStates&c="+country);

		}

	}



	function ProcessData(html)

	{

		states = html.split("~");

		selDest.options.length = 0;

		selDest.options[selDest.options.length] = new Option("-- Choose a State --", "");



		for(i = 0; i < states.length; i++)

		{

			vals = states[i].split("|");



			if(states[i].length > 0)

				selDest.options[selDest.options.length] = new Option(vals[0], vals[1]);

		}

	}



</script>



