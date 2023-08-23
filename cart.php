<?php

class CartForm
{
    public function __construct()
    {
        // Register the shortcode
        add_shortcode('cart_form', array($this, 'show_cart_form'));
    }
    // Shortcode function
    public function show_cart_form()
    {
        ob_start();
?>
        <style>
            .card {
                border: 1px dashed grey;
            }

            .btn:disabled {
                opacity: 0.5;
            }

            h4 {
                font-family: cursive;
            }
        </style>
        <main>
            <div class="container px-3 my-5 clearfix">
                <!-- Shopping cart table -->
                <div class="card card-body p-4 rounded text-white" style="background-color: gray;">
                    <div class="card-header text-center">
                        <h2>Shopping Cart</h2>
                    </div>
                    <div class="card-body p-4 rounded">
                        <div class="table-responsive">
                            <table class="table table-bordered m-0">
                                <thead>
                                    <tr>
                                        <!-- Set columns width -->
                                        <th class="text-center text-white py-3 px-4" style="min-width: 100px;">Product Name</th>
                                        <th class="text-right text-white py-3 px-4" style="min-width: 100px;">Amount</th>
                                        <th class="text-center text-white py-3 px-4" style="min-width: 120px;">Quantity</th>
                                        <th class="text-center align-middle py-3 px-0" style="min-width: 40px;"><a href="#" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody id="cart-items" class="text-white">
                                    <!-- cart items -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-header d-flex flex-row">
                        <h4 class="px-2 me-2">Total</h4>
                        <h4 id="total-amount"></h4>
                    </div>
                    <div class="container gap-2">
                        <div class="row">
                            <button id="back-cart" type="button" class="btn btn-dark col-md-6">Back to shopping</button>
                            <button id="payment-cart" type="menu" class="btn btn-dark col-md-6">Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>

<?php
        return ob_get_clean();
    }
}
$cart = new CartForm();

?>