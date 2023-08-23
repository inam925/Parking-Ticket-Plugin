document.addEventListener("DOMContentLoaded", function () {
  let card, stripe, description, clientSecret, name;

  for (let i = 1; i <= 5; i++) {
    document
      .getElementById(i.toString())
      .addEventListener("click", function () {
        description = document.getElementById(`description-${i}`).value;
      });
  }

  stripe = Stripe(
    "pk_test_51NLhA8SJcCvwTeMNqk7NqVBWaR3EhB8y2ZSRuFZBWcD4v43luAjof3ALNEsNWQzhXELJRrLfHDBmzaI9a5R2NcZJ00Zd2grHOn"
  );
  let elements = stripe.elements();
  card = elements.create("card");

  card.mount("#stripe-card-element");

  document
    .querySelector("#cancel-credit")
    .addEventListener("click", function (e) {
      card.clear();
    });

  card.on("change", function (event) {
    // Disable the Pay button if there are no card details in the Element
    document.querySelector("#stripe-submit").disabled = event.empty;

    document.querySelector("#card-error").textContent = event.error
      ? event.error.message
      : "";
  });
  if (card.textContent == "") {
    document.querySelector("#stripe-submit").disabled = true;
  } else {
    document.querySelector("#stripe-submit").disabled = true;
  }

  document
    .querySelector("#stripe-submit")
    .addEventListener("click", function (e) {
      let pricee = document.getElementById("park-price").textContent;
      // Remove any non-numeric characters (except decimal separator and minus sign)
      let numericString = pricee.replace(/[^0-9.-]/g, "");

      let trimmedNumericString = numericString.slice(0, -2);

      // Convert the numeric string to a number using Intl.NumberFormat
      let number = parseFloat(Intl.NumberFormat().format(trimmedNumericString));

      let purchase = {
        price: number,
        description: description,
        name: name,
      };
      stripe.createToken(card).then(function (result) {
        if (result.error) {
          console.error(result.error);
        } else {
          // // Send the token to your server for further processing
          fetch(
            "http://localhost/wordpress/wp-content/plugins/plugin-park/stripe-check.php",
            {
              method: "POST",
              headers: {
                "Content-Type": "application/json",
              },
              body: JSON.stringify(purchase),
            }
          )
            .then(function (response) {
              let flashCheckout = document.querySelector("#flash-checkout");
              flashCheckout.innerHTML =
                "<p class='alert alert-success' id='flash-success'>Booking Confirmed</p>";
              flashCheckout.style.display = "block";

              setTimeout(function () {
                flashCheckout.style.display = "none";
              }, 5000);

              return response.json();
            })
            .then(function (data) {
              clientSecret = data.clientSecret;
              document.querySelector("#stripe-submit").disabled = true;

              stripe
                .confirmCardPayment(clientSecret, {
                  payment_method: {
                    card: card,
                    // Add additional payment method details if required
                  },
                })
                .then(function (result) {
                  if (result.error) {
                    // Show error to your customer
                    showError(result.error.message);
                  } else {
                    // The payment succeeded!
                    orderComplete(result.paymentIntent.id);
                  }
                });
              //   payWithCard(stripe, card, clientSecret);
            })
            .catch(function (error) {
              console.error(error);
            });
        }
      });
    });

  // Show a spinner on payment submission
  let loading = function (isLoading) {
    if (isLoading) {
      // Disable the button and show a spinner
      document.querySelector("#stripe-submit").disabled = true;
    } else {
      document.querySelector("#stripe-submit").disabled = false;
    }
  };

  /* ------- UI helpers ------- */

  // Shows a success message when the payment is complete
  let orderComplete = function (paymentIntentId) {
    loading(false);
    document
      .querySelector(".result-message a")
      .setAttribute(
        "href",
        "https://dashboard.stripe.com/test/payments/" + paymentIntentId
      );
    document.querySelector(".result-message").classList.remove("d-none");
    document.querySelector("button").disabled = true;
  };

  // Show the customer the error from Stripe if their card fails to charge
  let showError = function (errorMsgText) {
    loading(false);
    let errorMsg = document.querySelector("#card-error");
    errorMsg.textContent = errorMsgText;
    setTimeout(function () {
      errorMsg.textContent = "";
    }, 4000);
  };
});
