/* Product Variations */
var baseProduct = {};

function updateSelectedVariation(variation, id) {
	if(typeof(baseProduct.price) == 'undefined') {
		if($('.AddCartButton').css('display') == "none") {
			var cartVisible = false;
		}
		else {
			var cartVisible = true;
		}
		baseProduct = {
			price: $('.VariationProductPrice').html(),
			sku: $('.VariationProductSKU').html(),
			weight: $('.VariationProductWeight').html(),
			thumb: $('.ProductThumb img').attr('src'),
			thumbLink: $('.ProductThumb .ViewLarger').html(),
			cartButton: cartVisible
		};
	}

	// Show the defaults again
	if(typeof(variation) == 'undefined') {
		$('.VariationProductPrice').html(baseProduct.price);
		$('.VariationProductSKU').html(baseProduct.sku);
		$('.VariationProductWeight').html(baseProduct.weight);
		$('.CartVariationId').val('');
		$('.ProductThumb img').attr('src', baseProduct.thumb);
		$('.ProductThumb .ViewLarger').html(baseProduct.thumbLink);
		$('body').attr('currentVariation', '');
		$('body').attr('currentVariationImage', '')
		$('.VariationOutOfStockMessage').remove();
		if(baseProduct.sku == '') {
			$('.ProductSKU').hide();
		}
		if(baseProduct.cartButton) {
			$('.AddCartButton').show();
			if(ShowAddToCartQtyBox=='1') {
				$('.QuantityInput').show();
			}
		}


		$('.InventoryLevel').hide();
	}
	// Othersie, showing a specific variation
	else {
		$('.VariationProductPrice').html(variation.price);
		if(variation.sku != '') {
			$('.VariationProductSKU').html(variation.sku);
			$('.ProductSKU').show();
		}
		else {
			$('.VariationProductSKU').html(baseProduct.sku);
			if(baseProduct.sku) {
				$('.ProductSKU').show();
			}
			else {
				$('.ProductSKU').hide();
			}
		}
		$('.VariationProductWeight').html(variation.weight);
		$('.CartVariationId').val(id);
		if(variation.instock == true) {
			$('.AddCartButton').show();
			if(ShowAddToCartQtyBox=='1') {
				$('.QuantityInput').show();
			}
			$('.VariationOutOfStockMessage').remove();
		}
		else {
			$('.AddCartButton, .QuantityInput ').hide();
			$('.VariationOutOfStockMessage').remove();
			$('.AddCartButton').before('<p class="VariationOutOfStockMessage">'+lang.VariationSoldOutMessage+'</p>');
		}
		if(variation.thumb != '') {
			$('.ProductThumb img').attr('src', variation.thumb);
			$('.ProductThumb .ViewLarger').html('See larger picture');
			$('body').attr('currentVariation', id);
			$('body').attr('currentVariationImage', variation.image)
		}
		else {
			$('.ProductThumb img').attr('src', baseProduct.thumb);
			$('.ProductThumb .ViewLarger').html(baseProduct.thumbLink);
			$('body').attr('currentVariation', '');
			$('body').attr('currentVariationImage', '')
		}
		if(variation.stock) {
			$('.InventoryLevel').show();
			$('.VariationProductInventory').html(variation.stock);
		}
		else {
			$('.InventoryLevel').hide();
		}
	}
}

$(document).ready(function() {
	// Select boxes are used if there is more than one variation type
	if($('.ProductOptionList select').length > 0) {
		$('.ProductOptionList select').each(function(index) {
			$(this).change(function() {
				if($(this).val()) {
					var next = $('.ProductOptionList select').get(index+1);
					if(next) {
						$('.ProductOptionList select').get(index+1).resetNext();
						$('.ProductOptionList select').get(index+1).fill();
						$('.ProductOptionList select').get(index+1).disabled = false;
					}
				}
				else {
					this.resetNext();
				}

				// Do we have a full match?
				ourCombination = this.getFullCombination();
				for(x in VariationList) {
					variation = VariationList[x];
					if(variation.combination == ourCombination) {
						updateSelectedVariation(variation, x);
						return;
					}
				}
				// No match or incomplete selection
				updateSelectedVariation();
			});

			this.getFullCombination = function() {
				var selected = new Array();
				$('.ProductOptionList select').each(function() {
					selected[selected.length] = $(this).val();
				});
				return selected.join(',');
			}


			this.getCombination = function() {
				var selected = new Array();
				var thisSelect = this;
				$('.ProductOptionList select').each(function() {
					if(thisSelect == this) {
						return false;
					}
					selected[selected.length] = $(this).val();
				});
				// Add the current item
				selected[selected.length] = $(this).val();
				return selected.join(',');
			}

			this.resetNext = function() {
				$(this).nextAll().each(function() {
					this.selectedIndex = 0;
					this.disabled = true;
				});
			};

			this.fill = function() {
				// Remove everything but the first option
				$(this).find('option:gt(0)').remove();

				var show = true;
				var previousSelection;

				// Get the values of the previous selects
				var previous = $('.ProductOptionList select').get(index-1);
				if(previous) {
					previousSelection = previous.getCombination();
				}
				for(var i = 1; i < this.variationOptions.length; i++) {
					for(x in VariationList) {
						variation = VariationList[x];
						if(previousSelection) {
							var show = false;
							if((variation.combination+',').indexOf(previousSelection+','+this.variationOptions[i].value+',') == 0) {
								var show = true;
								break;
							}
							else {
							}
						}
					}
					if(show) {
						this.options[this.options.length] = new Option(this.variationOptions[i].text, this.variationOptions[i].value);
					}
				}
			};

			// Steal the options and store them away for later
			variationOptions = new Array();
			$(this).find('option').each(function() {
				if(typeof(this.text) == undefined) {
					this.text = this.innerHTML;
				}
				variationOptions[variationOptions.length] = {value: this.value, text: this.text };
			});
			this.variationOptions = variationOptions;
			this.selectedIndex = 0;
			if(index == 0) {
				this.fill();
			}
			else {
				this.disabled = true;
			}
		});
	}
	// Otherwise, radio buttons which are very easy to deal with
	else {
		$('.ProductOptionList input[type=radio]').click(function() {
			for(x in VariationList) {
				variation = VariationList[x];
				if(variation.combination == $(this).val()) {
					updateSelectedVariation(variation, x);
					return;
				}
			}
			// No match or incomplete selection
			updateSelectedVariation();
		});
		$('.ProductOptionList input[type=radio]:checked').trigger('click');
	}
});