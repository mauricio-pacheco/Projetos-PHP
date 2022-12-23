var ExpressCheckout = {
	completedSteps: new Array(),
	currentStep: 'AccountDetails',
	signedIn: 0,
	digitalOrder: 0,
	createAccount: 0,
	anonymousCheckout: 0,
	checkoutLogin: 0,

	init: function()
	{
		if($('#CheckoutStepAccountDetails').css('display') == 'none') {
			ExpressCheckout.currentStep = 'BillingAddress';
		}
		else {
			$('#BillingDetailsLabel').html(lang.ExpressCheckoutStepBillingAccountDetails);
		}

		$('.ExpressCheckoutBlock').hover(function() {
			if($(this).hasClass('ExpressCheckoutBlockCompleted')) {
				$(this).css('cursor', 'pointer');
			}
		},
		function() {
			$(this).css('cursor', 'default');
		});

		$('.ExpressCheckoutBlock').click(function() {
			if($(this).hasClass('ExpressCheckoutBlockCompleted')) {
				$(this).find('.ChangeLink').click();
			}
		});

		// Capture any loading errors
		$(document).ajaxError(function(event, request, settings) {
			ExpressCheckout.HideLoadingIndicators();
			alert(lang.ExpressCheckoutLoadError);
		});
	},

	Login: function()
	{
		$('#CheckoutLoginError').hide();
		ExpressCheckout.anonymousCheckout = 0;
		ExpressCheckout.createAccount = 0;

		if($('#login_email').val().indexOf('@') == -1 || $('#login_email').val().indexOf('.') == -1) {
			alert(lang.LoginEnterValidEmail);
			$('#login_email').focus();
			$('#login_email').select();
			return false;
		}

		if($('#login_pass').val() == '') {
			alert(lang.LoginEnterPassword);
			$('#login_pass').focus();
			return false;
		}

		ExpressCheckout.ShowLoadingIndicator('#LoginForm');

		$.ajax({
			url: 'remote.php',
			type: 'post',
			dataType: 'xml',
			data: 'w=expressCheckoutLogin&'+$('#LoginForm').serialize(),
			success: ExpressCheckout.LoginResult
		});

		return false;
	},

	LoginResult: function(xml)
	{
		ExpressCheckout.HideLoadingIndicators();

		$('#BillingDetailsLabel').html(lang.ExpressCheckoutStepBillingAddress);
		$('.CheckoutAccountRequiredFields').hide();
		$('#CheckoutStepBillingAddress .CheckoutAccountHiddenFields').show();

		// Login was successful
		if($('status', xml).text() == 1) {
			ExpressCheckout.checkoutLogin = 1;
			ExpressCheckout.ResetNextSteps();
			var value = document.createTextNode('Checking out as '+$('#login_email').val());
			$('#CheckoutStepAccountDetails .ExpressCheckoutCompletedContent').html(value);
			$('#CheckoutStepBillingAddress .ExpressCheckoutContent').html($('billingContents', xml).text());
			$('#CheckoutStepShippingAddress .ExpressCheckoutContent').html($('shippingContents', xml).text());
			ExpressCheckout.completedSteps[ExpressCheckout.completedSteps.length] = 'AccountDetails';
			ExpressCheckout.ChangeStep();
		}
		else {
			var message = $('message', xml).text();
			if($('errorContainer', xml).text()) {
				$($('errorContainer', xml).text()).html(message).show();
				$('#LoginIntro').hide();
			}
			$('#login_email').focus();
			$('#login_email').select();
		}
	},

	GuestCheckout: function()
	{
		$('#CreateAccountForm').show();
		$('#CheckoutLoginError').hide();
		if($('#CheckoutGuestForm').css('display') != 'none' && !$('#checkout_type_register:checked').val()) {
			$('#CheckoutStepAccountDetails .ExpressCheckoutCompletedContent').html(lang.ExpressCheckoutCheckingOutAsGuest);
			$('.CheckoutAccountRequiredFields').hide();
			$('#CheckoutStepBillingAddress .CheckoutAccountHiddenFields').hide();
			ExpressCheckout.anonymousCheckout = 1;
			ExpressCheckout.createAccount = 0;
		}
		else {
			$('#CheckoutStepAccountDetails .ExpressCheckoutCompletedContent').html(lang.ExpressCheckoutCreatingAnAccount);
			$('.CheckoutAccountRequiredFields').show();
			$('#CheckoutStepBillingAddress .CheckoutAccountHiddenFields').hide();
			ExpressCheckout.createAccount = 1;
			ExpressCheckout.anonymousCheckout = 0;
		}

		// We were previously logged in so we need to refetch the address fields because we're now a guest
		if(ExpressCheckout.checkoutLogin == 1) {
			ExpressCheckout.checkoutLogin = 0;
			ExpressCheckout.ShowLoadingIndicator('#CheckoutGuestForm');
			$.ajax({
				url: 'remote.php',
				type: 'post',
				dataType: 'xml',
				data: 'w=expressCheckoutGetAddressFields',
				success: ExpressCheckout.GuestCheckoutLoaded
			});
		}
		else {
			ExpressCheckout.GuestCheckoutLoaded();
		}
	},

	GuestCheckoutLoaded: function(xml)
	{
		if(typeof(xml) != 'undefined') {
			ExpressCheckout.HideLoadingIndicators();
			$('#CheckoutStepBillingAddress .ExpressCheckoutContent').html($('billingContents', xml).text());
			$('#CheckoutStepShippingAddress .ExpressCheckoutContent').html($('shippingContents', xml).text());
		}
		ExpressCheckout.ResetNextSteps();
		ExpressCheckout.completedSteps[ExpressCheckout.completedSteps.length] = 'AccountDetails';
		ExpressCheckout.ChangeStep();
	},

	ResetNextSteps:function()
	{
		steps = ExpressCheckout.GetSteps();
		var beginReset = false;
		var newCompleted = Array();
		$.each(steps, function(i, step) {
			if(step == ExpressCheckout.currentStep) {
				newCompleted[newCompleted.length] = step;
				beginReset = true;
			}
			else if(beginReset == true) {
				$('#CheckoutStep'+step).removeClass('ExpressCheckoutBlockCompleted');
				$('#CheckoutStep'+step+' .ExpressCheckoutCompletedContent').html('');
			}
		});

		ExpressCheckout.completedSteps = newCompleted;
	},

	ChangeStep: function(step)
	{
		if(typeof(step) == 'undefined') {
			step = ExpressCheckout.CalculateNextStep(ExpressCheckout.currentStep);
		}

		if(step == ExpressCheckout.currentStep) {
			return false;
		}

		$('#CheckoutStep'+ExpressCheckout.currentStep+' .ExpressCheckoutContent').slideUp('slow');
		$('#CheckoutStep'+ExpressCheckout.currentStep).addClass('ExpressCheckoutBlockCollapsed');
		if($.inArray(ExpressCheckout.currentStep, ExpressCheckout.completedSteps) != -1) {
			$('#CheckoutStep'+ExpressCheckout.currentStep).addClass('ExpressCheckoutBlockCompleted');
		}
		$('#CheckoutStep'+step+' .ExpressCheckoutContent').slideDown('slow');
		$('#CheckoutStep'+step).removeClass('ExpressCheckoutBlockCollapsed');
		ExpressCheckout.currentStep = step;
		return false;
	},

	GetSteps: function()
	{
		var steps = Array();
		if(ExpressCheckout.signedIn == 0) {
			steps[steps.length] = 'AccountDetails';
		}
		steps[steps.length] = 'BillingAddress';
		if(!ExpressCheckout.digitalOrder) {
			steps[steps.length] = 'ShippingAddress';
			steps[steps.length] = 'ShippingProvider';
		}
		steps[steps.length] = 'Confirmation';
		steps[steps.length] = 'PaymentDetails';
		return steps;
	},

	CalculateNextStep: function(currentStep) {
		steps = ExpressCheckout.GetSteps();
		var nextStep = '';
		$.each(steps, function(i, step) {
			if(step == currentStep) {
				nextStep = steps[i + 1];
			}
		});

		if(nextStep) {
			return nextStep;
		}
	},

	ChooseBillingAddress: function()
	{
		// Chosen to use a new address?
		if(!$('#BillingAddressTypeExisting:checked').val() || $('#ChooseBillingAddress').css('display') == 'none') {
			ExpressCheckout.UseNewBillingAddress();
			return false;
		}

		// An address hasn't been selected
		if($('.SelectBillingAddress select option:selected').val() == -1) {
			alert(lang.ExpressCheckoutChooseBilling);
			$('.SelectBillingAddress select').focus();
			return false;
		}

		var addressValue = $('.SelectBillingAddress select option:selected').text();
		if(addressValue.length > 60) {
			addressValue = addressValue.substring(0, 57)+'...';
		}
		$('#CheckoutStepBillingAddress .ExpressCheckoutCompletedContent').html(addressValue);

		ExpressCheckout.ResetNextSteps();
		ExpressCheckout.completedSteps[ExpressCheckout.completedSteps.length] = 'BillingAddress';
		if(!ExpressCheckout.digitalOrder) {
			// We're shipping to this address to so do that as well
			if($('#ship_to_billing_existing:checked').val()) {
				ExpressCheckout.ChooseShippingAddress(true);
			}
			else {
				ExpressCheckout.ChangeStep();
			}
		}
		else {
			ExpressCheckout.LoadOrderConfirmation();
		}
		return false;
	},

	ChooseShippingAddress: function(copyBilling)
	{
		if(typeof(copyBilling) != 'undefined') {
			$('#ShippingAddressTypeExisting').attr('checked', true);
			var billingAddress = $('.SelectBillingAddress select option:selected').val();
			$('.SelectShippingAddress select').val(billingAddress);
		}

		// Chosen to use a new address?
		if(!$('#ShippingAddressTypeExisting:checked').val() || $('#ChooseShippingAddress').css('display') == 'none') {
			ExpressCheckout.UseNewShippingAddress();
			return false;
		}

		// An address hasn't been selected
		if($('.SelectShippingAddress select option:selected').val() == -1) {
			alert(ExpressCheckoutChooseShipping);
			$('.SelectShippingAddress select').focus();
			return false;
		}

		var addressValue = $('.SelectShippingAddress select option:selected').text();
		if(addressValue.length > 60) {
			addressValue = addressValue.substring(0, 57)+'...';
		}

		$('#CheckoutStepShippingAddress .ExpressCheckoutCompletedContent').html(addressValue);
		ExpressCheckout.LoadShippingProviders();
		return false;
	},

	ChooseShippingProvider: function()
	{
		// A shipping provider hasn't been selected
		if(!$('#CheckoutStepShippingProvider .ShippingProviderList input[type=radio]:checked').val()) {
			alert(lang.ExpressCheckoutChooseShipper);
			$('#CheckoutStepShippingProvider .ShippingProviderList input[type=radio]:checked').focus();
			return false;
		}

		var shippingMethod = $('#CheckoutStepShippingProvider .ShippingProviderList input[type=radio]:checked').val();
		var shipperName = $('#shippingMethod_'+shippingMethod+' .ShipperName').html();
		var shipperPrice = $('#shippingMethod_'+shippingMethod+' .ShipperPrice').html();
		ExpressCheckout.ResetNextSteps();
		$('#CheckoutStepShippingProvider .ExpressCheckoutCompletedContent').html(shipperName + ' '+lang.ExpressCheckoutFor+' '+shipperPrice);
		ExpressCheckout.LoadOrderConfirmation();
	},

	ShowLoadingIndicator: function(step) {
		if(typeof(step) == 'undefined') {
			step = 'body';
		}
		$(step).find('.ExpressCheckoutBlock input[type=submit]').each(function() {
			$(this).attr('oldValue', $(this).val());
			$(this).val(lang.ExpressCheckoutLoading);
			$(this).attr('disabled', true);
		});
		$(step).find('.LoadingIndicator').show();
		$('body').css('cursor', 'wait');
	},

	HideLoadingIndicators: function()
	{
		$('.ExpressCheckoutBlock input[type=submit]').each(function() {
			if($(this).attr('oldValue') && $(this).attr('disabled') == true) {
				$(this).val($(this).attr('oldValue'));
				$(this).attr('disabled', false);
			}
		});
		$('.LoadingIndicator').hide();
		$('body').css('cursor', 'default');
	},

	LoadOrderConfirmation: function()
	{
		var postVars = '';

		ExpressCheckout.ShowLoadingIndicator();

		if(ExpressCheckout.anonymousCheckout == 1) {
			postVars += '&anonymousCheckout=1';
		}

		if(ExpressCheckout.createAccount == 1) {
			postVars += '&createAccount=1';
		}

		if($('#BillingAddressTypeExisting:checked').val() && $('#ChooseBillingAddress').css('display') != 'none') {
			postVars += '&billingType=existing&billingAddressId='+$('.SelectBillingAddress select').val();
		}
		else {
			postVars += '&billingType=new&'+$('#NewBillingAddress ').serialize();
		}

		// If this is a physical order, we have to pass across the shipping details too
		if(!ExpressCheckout.digitalOrder) {
			if($('#ShippingAddressTypeExisting:checked').val() && $('#ChooseShippingAddress').css('display') != 'none') {
				postVars += '&shippingType=existing&shippingAddressId='+$('.SelectShippingAddress select').val();
			}
			else {
				postVars += '&shippingType=new&'+$('#NewShippingAddress ').serialize();
			}

			// Pass along the shipping provider too
			postVars += '&shippingProviderId='+$('#CheckoutStepShippingProvider .ShippingProviderList input[type=radio]:checked').val();
			postVars += '&'+$('#CheckoutStepShippingProvider form').serialize();
		}
		postVars += '&'+$('#OrderConfirmationForm').serialize();

		postVars += '&w=expressCheckoutShowConfirmation';
		$.ajax({
			url: 'remote.php',
			type: 'post',
			dataType: 'xml',
			data: postVars,
			success: ExpressCheckout.OrderConfirmationLoaded
		});
	},

	OrderConfirmationLoaded: function(xml)
	{
		ExpressCheckout.HideLoadingIndicators();

		if($('status', xml).text() == 0) {
			$('#CheckoutStepShippingAddress .ExpressCheckoutCompletedContent').html('');
			alert($('message', xml).text());
			if($('step', xml).text()) {
				ExpressCheckout.ChangeStep($('step', xml).text());
			}
			return false;
		}
		$('#CheckoutStepConfirmation .ExpressCheckoutContent').html($('confirmationContents', xml).text());
		if(!ExpressCheckout.digitalOrder) {
			ExpressCheckout.completedSteps[ExpressCheckout.completedSteps.length] = 'ShippingProvider';
		}
		else {
			ExpressCheckout.completedSteps[ExpressCheckout.completedSteps.length] = 'BillingAddress';
		}

		$('#provider_list input[type=radio], #credit_provider_list input[type=radio]').click(function() {
			if(!$(this).hasClass('ProviderHasPaymentForm')) {
				ExpressCheckout.HidePaymentForm();
			}
			else {
				$('#CheckoutStepPaymentDetails').show();
			}
		});
		ExpressCheckout.ChangeStep('Confirmation');
	},

	HidePaymentForm: function()
	{
		$('#CheckoutStepPaymentDetails').hide();
		$('#CheckoutStepPaymentDetails .ExpressCheckoutContent').html('');
	},

	LoadPaymentForm: function(provider)
	{
		$.ajax({
			url: 'remote.php',
			data: 'w=expressCheckoutLoadPaymentForm&'+$('#CheckoutStepConfirmation form').serialize(),
			type: 'post',
			success: ExpressCheckout.PaymentFormLoaded
		});
	},
	
	ShowSingleMethodPaymentForm: function()
	{
		$('#CheckoutStepPaymentDetails').show();
		ShowContinueButton();
	},

	PaymentFormLoaded: function(xml)
	{
		if($('status', xml).text() == 0) {
			alert($('message', xml).text());
			if($('step', xml).text()) {
				ExpressCheckout.ChangeStep($('step', xml).text());
			}
			return false;
		}

		$('#CheckoutStepPaymentDetails .ExpressCheckoutContent').html($('paymentContents', xml).text());
		$('#CheckoutStepPaymentDetails').show();
		ExpressCheckout.completedSteps[ExpressCheckout.completedSteps.length] = 'Confirmation';
		ExpressCheckout.ChangeStep('PaymentDetails');
	},

	ValidateNewAccount: function()
	{
		if(ExpressCheckout.createAccount == 1) {
			if(!$('#account_password').val()) {
				alert(lang.AccountEnterPassword);
				$('#account_password').focus();
				return false;
			}

			if($('#account_password').val() != $('#account_password2').val()) {
				alert(lang.AccountPasswordsDontMatch);
				$('#account_password2').select();
				$('#account_password2').focus();
				return false;
			}
		}

		ExpressCheckout.ShowLoadingIndicator();

		$.ajax({
			url: 'remote.php',
			type: 'post',
			dataType: 'xml',
			data: 'w=expressCheckoutRegister&'+$('#NewBillingAddress').serialize(),
			success: function(xml) {
				ExpressCheckout.HideLoadingIndicators();
				if($('status', xml).text() == 0) {
					alert($('message', xml).text());
					if($('step', xml).text()) {
						ExpressCheckout.ChangeStep($('step', xml).text());
					}
					if($('focus', xml).text()) {
						try {
							$($('focus', xml).text()).focus();
							$($('focus', xml).text()).select();
						}
						catch(e) { }
					}
					return false;
				}
				else {
					// Call the new address form again now that we're done here
					ExpressCheckout.UseNewBillingAddress(true);
				}
			}
		});
	},

	UseNewBillingAddress: function(inValidate)
	{
		if(ExpressCheckout.anonymousCheckout == 1 || ExpressCheckout.createAccount == 1) {
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
		}

		if(ExpressCheckout.createAccount == 1 || ExpressCheckout.anonymousCheckout == 1) {
			$('#billing_fullname').val($('#account_firstname').val()+' '+$('#account_lastname').val());
		}

		if(typeof(inValidate) == 'undefined' && ExpressCheckout.anonymousCheckout) {
			ExpressCheckout.ValidateNewAccount();
			return false;
		}

		if(!ExpressCheckout.ValidateNewAddress('billing')) {
			return false;
		}

		var addressValue = ExpressCheckout.BuildAddressLine('billing');
		if(addressValue.length > 60) {
			addressValue = addressValue.substring(0, 57)+'...';
		}
		addressValue = document.createTextNode(addressValue);
		$('#CheckoutStepBillingAddress .ExpressCheckoutCompletedContent').html(addressValue);

		ExpressCheckout.completedSteps[ExpressCheckout.completedSteps.length] = 'BillingAddress';
		ExpressCheckout.ResetNextSteps();
		if(!ExpressCheckout.digitalOrder) {
			// We're shipping to this address to so do that as well
			if($('#ship_to_billing:checked').val()) {
				ExpressCheckout.UseNewShippingAddress(true);
			}
			else {
				ExpressCheckout.ChangeStep();
			}
		}
		else {
			ExpressCheckout.LoadOrderConfirmation();
		}
		return false;
	},

	UseNewShippingAddress: function(copyBilling)
	{
		if(typeof(copyBilling) != 'undefined') {
			if($('#NewBillingAddress #billing_country').val() != $('#NewShippingAddress #shipping_country').val()) {
				$('#NewShippingAddress #shipping_country').html($('#NewBillingAddress #billing_country').html());
				$('#NewShippingAddress #shipping_state').html($('#NewBillingAddress #billing_state').html());
			}
			$('#NewBillingAddress').find('input, textarea, select').each(function() {
				// If it's a button, skip it
				if($(this).attr('type') == 'button' || $(this).attr('type') == 'submit') {
					return true;
				}
				var id = this.id.replace('billing_', 'shipping_');
				$('#NewShippingAddress #'+id).css('display', $(this).css('display'));
				$('#NewShippingAddress #'+id).val($(this).val());
			});
			$('#ShippingAddressTypeNew').attr('checked', true);
			$('#ShippingAddressTypeNew').trigger('click');
		}

		if(!ExpressCheckout.ValidateNewAddress('shipping')) {
			return false;
		}

		var addressValue = ExpressCheckout.BuildAddressLine('shipping');
		if(addressValue.length > 60) {
			addressValue = addressValue.substring(0, 57)+'...';
		}
		ExpressCheckout.ResetNextSteps();
		addressValue = document.createTextNode(addressValue);
		$('#CheckoutStepShippingAddress .ExpressCheckoutCompletedContent').html(addressValue);
		ExpressCheckout.completedSteps[ExpressCheckout.completedSteps.length] = 'ShippingAddress';
		ExpressCheckout.LoadShippingProviders();
		return false;
	},

	LoadShippingProviders: function()
	{
		ExpressCheckout.ShowLoadingIndicator();
		var shippingProvidersLoaded = function(xml) {
			ExpressCheckout.HideLoadingIndicators();
			if($('status', xml).text() == 0) {
				alert($('message', xml).text());
				$('#CheckoutStepShippingAddress .ExpressCheckoutCompletedContent').html('');
				if($('step', xml).text()) {
					ExpressCheckout.ChangeStep($('step', xml).text());
				}
				return false;
			}

			$('#CheckoutStepShippingAddress').addClass('ExpressCheckoutBlockCompleted');
			$('#CheckoutStepShippingProvider .ExpressCheckoutContent').html($('providerContents', xml).text());
			ExpressCheckout.completedSteps[ExpressCheckout.completedSteps.length] = 'ShippingAddress';
			ExpressCheckout.ChangeStep('ShippingProvider');
		};
		if($('#ShippingAddressTypeExisting:checked').val() && $('#ChooseShippingAddress').css('display') != 'none') {
			$.ajax({
				url: 'remote.php',
				type: 'post',
				data: {w: 'expressCheckoutGetShippers', addressId: $('.SelectShippingAddress select').val()},
				success: shippingProvidersLoaded
			});
		}
		else {
			$.ajax({
				url: 'remote.php',
				type: 'post',
				data: 'w=expressCheckoutGetShippers&'+ $('#NewShippingAddress ').serialize(),
				success: shippingProvidersLoaded
			});
		}
	},

	BuildAddressLine: function(type)
	{
		if(type == 'billing') {
			var fieldList = [
				'#billing_fullname',
				'#billing_address1',
				'#billing_city',
				'#billing_state',
				'#billing_zip',
				'#billing_country'
			];
		}
		else {
			var fieldList = [
				'#shipping_fullname',
				'#shipping_address1',
				'#shipping_city',
				'#shipping_state',
				'#shipping_zip',
				'#shipping_country'
			];
		}

		var addressLine = '';
		$.each(fieldList, function(i, field) {
			if((field == '#billing_state' || field == '#shipping_state') && $(field).css('display') == 'none') {
				field += '_1';
			}
			var x = $(field);
			if($(field).val()) {
				if(addressLine != '') {
					addressLine += ', ';
				}
				if(typeof($(field).get(0).selectedIndex) != 'undefined') {
					addressLine += $(field).find("option[value="+$(field).val()+"]").text();
				}
				else {
					addressLine += $(field).val();
				}
			}
		});
		return addressLine;
	},

	ValidateNewAddress: function(lowerType)
	{
		if(lowerType == 'billing') {
			var requiredFields = {
				'#billing_fullname': lang.EnterShippingFullName,
				'#billing_address1': lang.EnterShippingAddress,
				'#billing_city': lang.EnterShippingCity,
				'#billing_country': lang.ChooseShippingCountry,
				'#billing_state': lang.ChooseShippingState,
				'#billing_zip': lang.EnterShippingZip
			};
		}
		else {
			var requiredFields = {
				'#shipping_fullname': lang.EnterShippingFullName,
				'#shipping_address1': lang.EnterShippingAddress,
				'#shipping_city': lang.EnterShippingCity,
				'#shipping_country': lang.ChooseShippingCountry,
				'#shipping_state': lang.ChooseShippingState,
				'#shipping_zip': lang.EnterShippingZip
			};
		}

		var hasErrors = false;
		for(field in requiredFields) {
			message = requiredFields[field];
			if($(field).css('display') != 'none' && (!$(field).val() || $(field).val() == -1 || $(field).val() == 0)) {
				alert(message);
				try {
					$(field).focus();
				}
				catch(e) { }
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

	ToggleAddressType: function(address, type)
	{
		if(type == 'Select') {
			$('.Select'+address+'Address').show();
			$('.Add'+address+'Address').hide();
		}
		else {
			$('.Add'+address+'Address').show();
			$('.Select'+address+'Address').hide();
		}
	},

	ConfirmPaymentProvider: function()
	{
		if(!confirm_payment_provider()) {
			return false;
		}

		var paymentProvider = '';

		// Get the ID of the selected payment provider
		if($('#use_store_credit').css('display') != "none") {
			if($('#store_credit:checked').val()) {
				if($('#credit_provider_list').css('display') != "none") {
					paymentProvider = $('#credit_provider_list input:checked');
				}
			}
			else {
				paymentProvider = $('#provider_list input:checked');
			}
		}
		else {
			paymentProvider = $('#provider_list input:checked');
		}
		
		if(paymentProvider != '' && $(paymentProvider).hasClass('ProviderHasPaymentForm')) {
			var providerName = $('.ProviderName'+paymentProvider.val()).html();
			$('#CheckoutStepConfirmation .ExpressCheckoutCompletedContent').html(providerName);
			ExpressCheckout.LoadPaymentForm($(paymentProvider).val());
			return false;
		}
		else {
			ExpressCheckout.HidePaymentForm();
			return true;
		}
	},

	ToggleCountry: function(type) {
		var countryId = $('#'+type+'_country').val();
		$.ajax({
			url: 'remote.php',
			type: 'post',
			data: 'w=countryStates&c='+countryId,
			success: function(data)
			{
				$('#'+type+'_state option:gt(0)').remove();
				var states = data.split('~');
				var numStates = 0;
				for(var i =0; i < states.length; ++i) {
					vals = states[i].split('|');
					if(!vals[0]) {
						continue;
					}
					$('#'+type+'_state').append('<option value="'+vals[1]+'">'+vals[0]+'</option>');
					++numStates;
				}

				if(numStates == 0) {
					$('#'+type+'_state').hide();
					$('#'+type+'_state_1').show();
				}
				else {
					$('#'+type+'_state').show();
					$('#'+type+'_state_1').hide();
				}
				$('#'+type+'_state').val('0');
			}
		});
	},

	ApplyCouponCode: function()
	{
		if($('#couponcode').val() == '') {
			alert(lang.EnterCouponCode);
			$('#couponcode').focus();
			return false;
		}

		// Reload the order confirmation
		ExpressCheckout.LoadOrderConfirmation();
		return false;
	}
};