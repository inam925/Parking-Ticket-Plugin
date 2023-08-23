<?php

class ShowForm
{
    public function __construct()
    {
        // Register the shortcode
        add_shortcode('show_form', array($this, 'show_show_form'));
    }
    // Shortcode function
    public function show_show_form()
    {
        ob_start();
?>
        <div class="container">
            <div class="card-body p-4 rounded" style="background-color: gray;">
                <div class="row g-3">
                    <div class="d-flex flex-row justify-content-end">
                        <a id="svg-cart-show" onclick='return false' href="#"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                <path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                            </svg>
                            <span class='badge badge-warning showCartCount' id='lblCartCount'></span></a>
                    </div>
                    <table id="customers">
                        <!-- showing the input details here -->
                    </table>
                    <div class="container gap-2 mt-2">
                        <div class="row">
                            <button id="cancel-show" type="button" class="btn btn-dark col-md-4" style="background-color: black;">Cancel</button>
                            <button id="cart-show" type="button" class="btn btn-dark col-md-4" data-action="add-to-cart" style="background-color: black;">Add to Shopping cart</button>
                            <button id="payment-show" type="button" class="btn btn-dark col-md-4" style="background-color: black;">Go to payment</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
        return ob_get_clean();
    }
}

$show = new ShowForm();
?>