jQuery(document).ready(function ($) {
  $(document).ready(function () {
    let name, price, displayContent, displayText, total, sumValue;

    cartCount();

    for (let i = 1; i <= 5; i++) {
      $(`#${i}`).click(function () {
        name = $(`#name-${i}`).val();
        price = $(`#price-${i}`).val();
      });
    }

    function numberToEuro(e) {
      let number = parseInt(e);
      return number.toLocaleString("nl-NL", {
        style: "currency",
        currency: "EUR",
      });
    }

    function cartCount() {
      let rowCount = $("#cart-items tr").length;
      $(".homeCartCount").text(rowCount);
      $(".inputCartCount").text(rowCount);
      $(".showCartCount").text(rowCount);
    }

    function updateSumValue() {
      let sum = 0;
      $("#cart-items tr").each(function () {
        let selectedprice = $(this).find("td:eq(1)")[0];
        let val = $(selectedprice).text();
        let selectedquantity = $(this).find("td:eq(2)")[0];
        let selectedQuantityInput = $(selectedquantity).find("input")[0];
        let quantity = $(selectedQuantityInput).val();

        // Remove any non-numeric characters (except decimal separator and minus sign)
        let numericString = val.replace(/[^0-9.-]/g, "");

        let trimmedNumericString = numericString.slice(0, -2);

        // Convert the numeric string to a number using Intl.NumberFormat
        let number = parseFloat(
          Intl.NumberFormat().format(trimmedNumericString)
        );
        total = number * quantity;

        $(selectedQuantityInput).on("input", function () {
          let quantity = parseInt($(this).val());
          total = $("#total-amount").html(numberToEuro(number * quantity));
          updateSumValue(); // Update sumValue when quantity changes
        });

        if (!isNaN(total)) {
          sum += total;
        }
      });

      sumValue = numberToEuro(sum);
      $("#total-amount").html(sumValue);
      $("#quantityInput").on("input", function () {
        let quantity = parseInt($(this).val());
        let totalValue = $("#amountInput").val(price * quantity);
        updateSumValue(); // Update sumValue when quantity changes
      });
    }

    $("#payment-show, #payment-cart").click(function () {
      switch (name) {
        case "Person Day Ticket":
        case "Day Ticket Parking":
        case "Parking Pay Hours Afterwards":
        case "Parking Yearly Subscription":
        case "Person Season Subscription":
          displayText = "<h4>" + name + "</h4>";
          break;
        default:
          // Handle unknown name case
          break;
      }
      // Display user input on the page
      $("#park-heading").html(displayText);
      // You can also perform further processing with the user input here
    });

    $("#cart-show, #payment-show").click(function () {
      amount = numberToEuro(price);

      if (name == "Person Day Ticket") {
        displayContent +=
          "<tr id='ola'><td class = 'p-4 media align-items-center' >" +
          name +
          "</td >";
        displayContent +=
          "<td class = 'text-right font-weight-semibold align-middle p-4 amm' id='person-amount'>" +
          amount +
          " </td>";
        displayContent +=
          "<td class = 'align-middle p-4' > <input type = 'number' class = 'form-control text-center' value = '1'> </td>";
        displayContent +=
          "<td class='text-center align-middle px-0'><div class='shop-tooltip close float-none text-danger rounded fs-1' title='' id='remove-day-item' style='cursor: pointer;'> × </div></td></tr>";
      }
      if (name == "Day Ticket Parking") {
        displayContent +=
          "<tr><td class = 'p-4 media align-items-center' >" + name + "</td >";
        displayContent +=
          "<td class = 'text-right font-weight-semibold align-middle p-4 amm' id='day-amount'>" +
          amount +
          " </td>";
        displayContent +=
          "<td class = 'align-middle p-4' > <input type = 'number' class = 'form-control text-center' value = '1'> </td>";
        displayContent +=
          "<td class='text-center align-middle px-0'><div class='shop-tooltip close float-none text-danger rounded fs-1' title='' id='remove-day-item' style='cursor: pointer;'> × </div></td></tr>";
      }
      if (name == "Parking Pay Hours Afterwards") {
        displayContent +=
          "<tr><td class = 'p-4 media align-items-center' >" + name + "</td >";
        displayContent +=
          "<td class = 'text-right font-weight-semibold align-middle p-4 amm' id='hour-amount'>" +
          amount +
          " </td>";
        displayContent +=
          "<td class = 'align-middle p-4' > <input type = 'number' class = 'form-control text-center' value = '1'> </td>";
        displayContent +=
          "<td class='text-center align-middle px-0'><div class='shop-tooltip close float-none text-danger rounded fs-1' title='' id='remove-day-item' style='cursor: pointer;'> × </div></td></tr>";
      }
      if (name == "Parking Yearly Subscription") {
        displayContent +=
          "<tr><td class = 'p-4 media align-items-center' >" + name + "</td >";
        displayContent +=
          "<td class = 'text-right font-weight-semibold align-middle p-4 amm' id='year-amount'>" +
          amount +
          " </td>";
        displayContent +=
          "<td class = 'align-middle p-4' > <input type = 'number' class = 'form-control text-center' value = '1'> </td>";
        displayContent +=
          "<td class='text-center align-middle px-0'><div class='shop-tooltip close float-none text-danger rounded fs-1' title='' id='remove-day-item' style='cursor: pointer;'> × </div></td></tr>";
      }
      if (name == "Person Season Subscription") {
        displayContent +=
          "<tr><td class = 'p-4 media align-items-center' >" + name + "</td >";
        displayContent +=
          "<td class = 'text-right font-weight-semibold align-middle p-4 amm' id='season-amount'>" +
          amount +
          " </td>";
        displayContent +=
          "<td class = 'align-middle p-4' > <input type = 'number' class = 'form-control text-center' value = '1'> </td>";
        displayContent +=
          "<td class='text-center align-middle px-0'><div class='shop-tooltip close float-none text-danger rounded fs-1' title='' id='remove-day-item' style='cursor: pointer;'> × </div></td></tr>";
      }
      // Display user input on the page
      $("#cart-items").html(displayContent);

      cartCount();
      // Select the target node
      let target = document.getElementById("cart-items");

      // Create an observer instance
      let observer = new MutationObserver(function (mutations) {
        mutations.forEach(function (mutation) {
          // Handle the mutation
          updateSumValue();
        });
      });

      // Configure and start the observer
      let config = {
        subtree: true,
        childList: true,
        attributes: true,
        characterData: true,
      };
      observer.observe(target, config);

      // Call the updateSumValue() function initially to calculate the sum value
      updateSumValue();

      $(document).on(
        "click",
        "#remove-person-item,#remove-day-item,#remove-hour-item,#remove-year-item,#remove-season-item",
        function () {
          let listItem = $(this).closest("tr"); // Find the closest parent table row

          // Remove the listItem from the DOM
          listItem.remove();

          cartCount();
          updateSumValue();
        }
      );
    });
    $("#payment-cart, #payment-show").click(function () {
      switch (name) {
        case "Person Day Ticket":
        case "Day Ticket Parking":
        case "Parking Pay Hours Afterwards":
        case "Parking Yearly Subscription":
        case "Person Season Subscription":
          displayText = "<h4>" + sumValue + "</h4>";
          break;
        default:
          // Handle unknown name case
          break;
      }

      // Display user input on the page
      $("#park-price").html(displayText);
      // You can also perform further processing with the user input here
    });
  });
});
