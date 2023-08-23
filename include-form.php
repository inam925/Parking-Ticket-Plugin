<?php

class IncludeForm
{
    public function __construct()
    {
        // Register the shortcode
        add_shortcode('input_form', array($this, 'show_input_form'));
    }
    // Shortcode function
    public function show_input_form()
    {
        ob_start();
?>

        <div class="container">
            <div class="card-body p-4 rounded" style="background-color: gray;">
                <div class="row g-3" id="inputs">
                    <div class="d-flex flex-row justify-content-end">
                        <a id="svg-cart-input" onclick='return false' href="#"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                <path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                            </svg>
                            <span class='badge badge-warning inputCartCount' id='lblCartCount'></span></a>
                    </div>

                    <div class="col-12" id="name" style="display: none;">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control required" id="nameInput" required>
                    </div>

                    <div class="col-12" id="amount" style="display: none;">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="text" name="amount" class="form-control total_amount" id="amountInput" value="" readonly>
                    </div>
                    <div class="col-12" id="email" style="display: none;">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="emailInput" placeholder="Email" required>
                    </div>

                    <div class="col-12" id="date" style="display: none;">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" name="date" class="form-control" id="dateInput" required>
                    </div>

                    <div class="col-12" id="quantity" style="display: none;">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" name="quantity" class="form-control quantity" id="quantityInput" value="1" required>
                    </div>

                    <div class="col-12" id="plateNumber" style="display: none;">
                        <label for="plate_number" class="form-label">Plate Number</label>
                        <input type="number" name="plate_number" class="form-control" id="plate_numberInput" required>
                    </div>

                    <div class="col-12" id="dateOfBirth" style="display: none;">
                        <label for="date_of_birth" class="form-label">Date Of Birth</label>
                        <input type="date" name="date_of_birth" class="form-control" id="date_of_birthInput" required>
                    </div>

                    <div class="container gap-2">
                        <div class="row">
                            <button id="cancel-input" type="button" class="btn btn-dark col-md-6">Back</button>
                            <button id="show" type="menu" class="btn btn-dark col-md-6">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
        return ob_get_clean();
    }
}

$includeForm = new IncludeForm();
?>