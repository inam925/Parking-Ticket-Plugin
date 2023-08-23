<?php

class Checkout
{
    public function __construct()
    {
        // Register the shortcode
        add_shortcode('stripe_card_element', array($this, 'render_stripe_card_element'));
    }
    // Shortcode function
    public function render_stripe_card_element()
    {
        ob_start();
?>

        <head>
            <style>
                /* Variables */
                #checkout-body {
                    box-sizing: border-box;
                }

                a {
                    text-decoration: none;
                }

                #checkout-body {
                    font-family: -apple-system, BlinkMacSystemFont, sans-serif;
                    font-size: 16px;
                    -webkit-font-smoothing: antialiased;
                    display: flex;
                    justify-content: center;
                    align-content: center;
                    height: 100vh;
                    width: 100vw;
                }

                /* Buttons and links */
                button {
                    background: #5469d4;
                    color: #ffffff;
                    background-color: black !important;
                    font-family: Arial, sans-serif;
                    border-radius: 0 0 4px 4px;
                    border: 0;
                    padding: 12px 16px;
                    font-size: 16px;
                    font-weight: 600;
                    cursor: pointer;
                    display: block;
                    transition: all 0.2s ease;
                    box-shadow: 0px 4px 5.5px 0px rgba(0, 0, 0, 0.07);
                    width: 100%;
                }

                button:hover {
                    background-color: gray;
                }

                button:disabled {
                    opacity: 0.5;
                    cursor: default;
                }

                @-webkit-keyframes loading {
                    0% {
                        -webkit-transform: rotate(0deg);
                        transform: rotate(0deg);
                    }

                    100% {
                        -webkit-transform: rotate(360deg);
                        transform: rotate(360deg);
                    }
                }

                @keyframes loading {
                    0% {
                        -webkit-transform: rotate(0deg);
                        transform: rotate(0deg);
                    }

                    100% {
                        -webkit-transform: rotate(360deg);
                        transform: rotate(360deg);
                    }
                }

                @media only screen and (max-width: 600px) {
                    form {
                        width: 80vw;
                    }
                }

                #stripe-card-element {
                    background-color: #fff;
                    padding: 10px;
                    border-radius: 4px;
                    box-shadow: 0 2px 3px 0 rgba(0, 0, 0, 0.1);
                    margin-bottom: 20px;
                }
            </style>
        </head>

        <main id="checkout-body">
            <div class="container">
                <div class="card-body p-4 rounded" style="background-color: gray;">
                    <div class="row g-3" id="payment-form">
                        <div id="stripe-card-element"></div>
                        <p class="result-message d-none text-info">
                            Payment successful, check your
                            <a href="" target="_blank"> Stripe Account.</a>
                        </p>
                        <button id="cancel-credit" type="button" class="btn btn-dark card col-md-6">Cancel</button>
                        <button id="stripe-submit" type="button" class="btn btn-dark card col-md-6">Submit</button>
                        <p id="card-error" class="text-warning" role="alert"></p>
                    </div>
                    <div class="input-group mt-2 text-warning row" id="flash-checkout"></div>
                </div>
            </div>
        </main>

<?php
        return ob_get_clean();
    }
}
$checkout = new Checkout();
?>