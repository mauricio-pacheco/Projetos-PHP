var Checkout = {
	ValidateNewAddress: function()
	{
		if(document.getElementById('account_email')) {
			if($('#account_email').val().indexOf('@') == -1 || $('#account_email').val().indexOf('.') == -1) {
				alert(lang.LoginEnterValidEmail);
				$('#account_email').focus();
				$('#account_email').select();
				return false;
			}

			if(!$('#account_firstname').val()) {
				alert(lang.AccountEnterFirstName);
				$('#account_firstname').focus();
				return false;
			}

			if(!$('#account_lastname').val()) {
				alert(lang.AccountEnterLastName);
				$('#account_lastname').focus();
				return false;
			}
			$('#ship_fullname').val($('#account_firstname').val()+' '+$('#account_lastname').val());
		}

		var requiredFields = {
			'#ship_fullname': lang.EnterShippingFullName,
			'#ship_phone': lang.EnterShippingPhone,
			'#ship_address1': lang.EnterShippingAddress,
			'#ship_city': lang.EnterShippingCity,
			'#ship_country': lang.ChooseShippingCountry,
			'#ship_state': lang.ChooseShippingState,
			'#ship_zip': lang.EnterShippingZip
		};

		var hasErrors = false;
		for(field in requiredFields) {
			message = requiredFields[field];
			if($(field).css('display') != 'none' && (!$(field).val() || $(field).val() == -1 || $(field).val() == 0)) {
				alert(message);
				$(field).focus();
				hasErrors = true;
				return false;
			}
		}

		if(hasErrors == true) {
			return false;
		}
		else {
			return true;
		}
	},

	ToggleCountry: function() {
		var countryId = $('#ship_country').val();
		$.ajax({
			url: 'remote.php',
			type: 'post',
			data: 'w=countryStates&c='+countryId,
			success: function(data)
			{
				$('#ship_state option:gt(0)').remove();
				var states = data.split('~');
				var numStates = 0;
				for(var i =0; i < states.length; ++i) {
					vals = states[i].split('|');
					if(!vals[0]) {
						continue;
					}
					$('#ship_state').append('<option value="'+vals[1]+'">'+vals[0]+'</option>');
					++numStates;
				}

				if(numStates == 0) {
					$('#ship_state').hide();
					$('#ship_state_1').show();
				}
				else {
					$('#ship_state').show();
					$('#ship_state_1').hide();
				}
				$('#ship_state').val('0');
			}
		});
	}
};
