jQuery( document ).ready(
	function ($) {
		let price, amount, number;
		$( "#1" ).click(
			function (e) {
				$( ".park" ).hide();
				$( ".input" ).show();
				$( "#name" ).hide();
				$( "#amount" ).show();
				$( "#email" ).show();
				$( "#date" ).show();
				$( "#quantity" ).show();
				price  = $( "#price-1" ).val();
				number = parseInt( price );
				amount = number.toLocaleString(
					"nl-NL",
					{
						style: "currency",
						currency: "EUR",
					}
				);
				$( "#amountInput" ).val( amount );
			}
		);
		$( "#2" ).click(
			function (e) {
				$( ".park" ).hide();
				$( ".input" ).show();
				$( "#amount" ).show();
				$( "#email" ).show();
				$( "#date" ).show();
				$( "#plateNumber" ).show();
				price  = $( "#price-2" ).val();
				number = parseInt( price );
				amount = number.toLocaleString(
					"nl-NL",
					{
						style: "currency",
						currency: "EUR",
					}
				);
				$( "#amountInput" ).val( amount );
			}
		);
		$( "#3" ).click(
			function (e) {
				$( ".park" ).hide();
				$( ".input" ).show();
				$( "#email" ).show();
				$( "#plateNumber" ).show();
				price  = $( "#price-3" ).val();
				number = parseInt( price );
				amount = number.toLocaleString(
					"nl-NL",
					{
						style: "currency",
						currency: "EUR",
					}
				);
				$( "#amountInput" ).val( amount );
			}
		);
		$( "#4" ).click(
			function (e) {
				$( ".park" ).hide();
				$( ".input" ).show();
				$( "#name" ).show();
				$( "#amount" ).show();
				$( "#email" ).show();
				$( "#plateNumber" ).show();
				price  = $( "#price-4" ).val();
				number = parseInt( price );
				amount = number.toLocaleString(
					"nl-NL",
					{
						style: "currency",
						currency: "EUR",
					}
				);
				$( "#amountInput" ).val( amount );
			}
		);
		$( "#5" ).click(
			function (e) {
				$( ".park" ).hide();
				$( ".input" ).show();
				$( "#name" ).show();
				$( "#amount" ).show();
				$( "#email" ).show();
				$( "#plateNumber" ).hide();
				$( "#dateOfBirth" ).show();
				price  = $( "#price-5" ).val();
				number = parseInt( price );
				amount = number.toLocaleString(
					"nl-NL",
					{
						style: "currency",
						currency: "EUR",
					}
				);
				$( "#amountInput" ).val( amount );
			}
		);
		$(
			"#cancel-show,#cancel-payment,#cancel-input,#cancel-credit,#back-cart"
		).click(
			function (e) {
				$( ".park" ).show();
				$( ".input" ).hide();
				$( ".show" ).hide();
				$( ".cart" ).hide();
				$( ".payment" ).hide();
				$( ".checkout" ).hide();
				$( "#name" ).hide();
				$( "#amount" ).hide();
				$( "#email" ).hide();
				$( "#date" ).hide();
				$( "#quantity" ).hide();
				$( "#plateNumber" ).hide();
				$( "#dateOfBirth" ).hide();
				$( ".fail" ).remove();
				// Clear input fields
				$( "#emailInput" ).val( "" );
				$( "#dateInput" ).val( "" );
				$( "#plate_numberInput" ).val( "" );
				$( "#date_of_birthInput" ).val( "" );
				$( "#quantityInput" ).val( "1" );
				$( "#nameInput" ).val( "" );
				$( "#flash-payment" ).remove();
			}
		);
		$( "#cart-show" ).click(
			function (e) {
				$( ".show" ).hide();
				$( ".cart" ).show();
			}
		);
		$( "#payment-show,#payment-cart" ).click(
			function (e) {
				$( ".show" ).hide();
				$( ".cart" ).hide();
				$( ".payment" ).show();
			}
		);
		$( "#svg-cart,#svg-cart-input,#svg-cart-show" ).click(
			function (e) {
				$( ".park" ).hide();
				$( ".input" ).hide();
				$( ".show" ).hide();
				$( ".cart" ).show();
			}
		);
	}
);
