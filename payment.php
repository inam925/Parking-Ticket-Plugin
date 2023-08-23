<?php
class PaymentForm
{
    public function __construct()
    {
        // Register the shortcode
        add_shortcode('payment_form', array($this, 'show_payment_form'));
    }
    // Shortcode function
    public function show_payment_form()
    {
        ob_start();
?>
        <div class="container">
            <div class="card-body p-4 rounded" style="background-color: gray;">
                <div class="row g-3">
                    <div id="payment-table" class="w-full bg-light rounded">
                        <div class="d-flex flex-row justify-content-around">
                            <div>
                                <div id="park-heading">
                                </div>
                                <p><?= date('d-m-Y'); ?> - <?= date('d-m-Y'); ?></p>
                            </div>
                            <div id="park-price">
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <div class="rounded pe-2">
                            <input class="form-check-input mt-0" type="checkbox" name="news" value="">
                        </div>
                        <label for="news">Yes, I would like to stay informed of news & information about the Henschotermeer.</label>
                    </div>
                    <div class="input-group">
                        <div class="rounded pe-2">
                            <input class="form-check-input mt-0" type="checkbox" name="privacy" value="" id="privacy-check" required>
                        </div>
                        <label for="privacy">Yes, I am aware of the privacy regulations and the Henschotermeer Terrain Regulations which I have been able to view on the page!</label>
                    </div>
                    <div class="input-group mt-2 text-warning" id="flash-payment"></div>

                    <div class="container gap-2 mt-2">
                        <div class="row">
                            <button id="cancel-payment" type="submit" class="btn btn-dark card col-md-4" style="background-color: black;">Cancel</button>
                            <button id="ideal-payment" type="button" class="btn btn-dark card col-md-4" style="background-color: black;">Pay with iDeal</button>
                            <button id="card-payment" type="button" class="btn btn-dark card col-md-4" style="background-color: black;">Pay with Card</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
        return ob_get_clean();
    }
}
$payment = new PaymentForm();
?>