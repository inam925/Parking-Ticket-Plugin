jQuery(document).ready(function ($) {
  $(document).ready(function () {
    let value, displayContent, price;
    let amount = $("#amountInput").val();
    let email = $("#emailInput").val();
    let date = $("#dateInput").val();
    let plateNumber = $("#plate_numberInput").val();
    let dob = $("#date_of_birthInput").val();
    let quantity = $("#quantityInput").val();
    let name = $("#nameInput").val();

    for (let i = 1; i <= 5; i++) {
      $(`#${i}`).click(function () {
        value = $(`#ticket-${i}`).val();
        price = $(`#price-${i}`).val();
      });
    }

    $("#quantityInput").on("input", function () {
      let quantity = parseInt($(this).val());
      let total = $("#amountInput").val(price * quantity);
    });

    $("#show").click(function () {
      // Get input values
      amount = $("#amountInput").val();
      email = $("#emailInput").val();
      date = $("#dateInput").val();
      plateNumber = $("#plate_numberInput").val();
      dob = $("#date_of_birthInput").val();
      quantity = $("#quantityInput").val();
      name = $("#nameInput").val();

      if (value == 1) {
        displayContent =
          "<tr><td>Amount:</td> " + "<td>" + amount + "</td>" + "</tr>";
        displayContent +=
          "<tr><td>Email:</td> " + "<td>" + email + "</td>" + "</tr>";
        displayContent +=
          "<tr><td>Date:</td> " + "<td>" + date + "</td>" + "</tr>";
        displayContent +=
          "<tr><td>Quantity:</td> " + "<td>" + quantity + "</td>" + "</tr>";
      }

      if (value == 2) {
        displayContent =
          "<tr><td>Amount:</td> " + "<td>" + amount + "</td>" + "</tr>";
        displayContent +=
          "<tr><td>Email:</td> " + "<td>" + email + "</td>" + "</tr>";
        displayContent +=
          "<tr><td>Date:</td> " + "<td>" + date + "</td>" + "</tr>";
        displayContent +=
          "<tr><td>Plate Number:</td> " +
          "<td>" +
          plateNumber +
          "</td>" +
          "</tr>";
      }
      if (value == 3) {
        displayContent =
          "<tr><td>Email:</td> " + "<td>" + email + "</td>" + "</tr>";
        displayContent +=
          "<tr><td>Plate Number:</td> " +
          "<td>" +
          plateNumber +
          "</td>" +
          "</tr>";
      }
      if (value == 4) {
        displayContent =
          "<tr><td>Name:</td> " +
          "<td class='customer-name'>" +
          name +
          "</td>" +
          "</tr>";
        displayContent +=
          "<tr><td>Amount:</td> " + "<td>" + amount + "</td>" + "</tr>";
        displayContent +=
          "<tr><td>Email:</td> " + "<td>" + email + "</td>" + "</tr>";
        displayContent +=
          "<tr><td>Plate Number:</td> " +
          "<td>" +
          plateNumber +
          "</td>" +
          "</tr>";
      }
      if (value == 5) {
        displayContent =
          "<tr><td>Name:</td> " +
          "<td class='customer-name>" +
          name +
          "</td>" +
          "</tr>";
        displayContent +=
          "<tr><td>Amount:</td> " + "<td>" + amount + "</td>" + "</tr>";
        displayContent +=
          "<tr><td>Email:</td> " + "<td>" + email + "</td>" + "</tr>";
        displayContent +=
          "<tr><td>DOB:</td> " + "<td>" + dob + "</td>" + "</tr>";
      }
      // Display user input on the page
      $("#customers").html(displayContent);
      // You can also perform further processing with the user input here
      $(".fail").remove();
      event.preventDefault();

      //validate fields
      let fail = false;
      $("#inputs")
        .find("select, textarea, input")
        .filter("[required]:visible")
        .each(function () {
          if (!$(this).prop("required")) {
          } else {
            if (!$(this).val()) {
              fail = true;
            }
          }
        });

      //submit if fail never got set to true
      if (!fail) {
        //process form here.
        $("#show").click(function (e) {
          $(".input").hide();
          $(".show").show();
        });
      } else {
        $("#inputs")
          .find("select, textarea, input")
          .filter("[required]:visible")
          .filter(function () {
            return $(this).val() === "";
          })
          .after(
            "<p class='text-warning fail'>" + "Field is required \n" + "</p>"
          );
        $("#show").click(function (e) {
          $(".input").show();
          $(".show").hide();
        });
      }
    });

    $("#ideal-payment,#card-payment").click(function (e) {
      if ($("#privacy-check:checked").length == 0) {
        $("#flash-payment").html(
          "<p>Please check Privacy Regulations Box to proceed</p>"
        );
        $(".payment").show();
        $(".checkout").hide();
      } else {
        $(".payment").hide();
        $(".checkout").show();
      }
    });

    let element = document.getElementById("card-error");
    // if (element.innerHTML) {
    $("#stripe-submit").on("click", function () {
      if (element.innerHTML.trim() !== "") {
        // The element has text content
      } else {
        // The element does not have text content
        let pricee = $("#park-price").text();
        // Remove any non-numeric characters (except decimal separator and minus sign)
        let numericString = pricee.replace(/[^0-9.-]/g, "");

        let trimmedNumericString = numericString.slice(0, -2);

        // Convert the numeric string to a number using Intl.NumberFormat
        let number = parseFloat(
          Intl.NumberFormat().format(trimmedNumericString)
        );

        let url = "http://127.0.0.1:8000/api/storee"; // Replace with your Laravel API endpoint URL

        let data = {
          name: name ?? "",
          email: email ?? "",
          product_id: value ?? "",
          amount: number ?? "",
          quantity: quantity ?? "",
          check_in: new Date().toISOString().split("T")[0], // Format date as 'YYYY-MM-DD'
          check_out: new Date().toISOString().split("T")[0],
        };

        // AJAX request
        $.ajax({
          url: url,
          type: "POST",
          contentType: "application/json",
          data: JSON.stringify(data),
          success: function (response) {
            // Handle the successful response from the Laravel API
            console.log("Data sent successfully", response);
          },
          error: function (jqXHR, textStatus, errorThrown) {
            // Handle the error response from the Laravel API
            console.error("Error sending data", textStatus, errorThrown);
          },
        });
      }
    });
  });
});
