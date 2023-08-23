<?php
/*
Plugin Name: Plugin Park
Description: Plugin to show shortcode [lead_form]
Version: 1.0
Author: Your Name
Author URI: Your Website
*/

include_once(plugin_dir_path(__FILE__) . 'bootstrap.php');
require_once(plugin_dir_path(__FILE__) . 'vendor/stripe/stripe-php/init.php');

class LeadForm
{
    public $decoded_response;
    public function __construct()
    {
        // Register the shortcode
        add_shortcode('lead_form', array($this, 'show_lead_form'));
    }

    public function get_api_url()
    {
        return 'http://127.0.0.1:8000';
    }
    public function jsonResponse()
    {
        $api_key = 'indexx';
        $url = $this->get_api_url() . '/api/' . $api_key;
        $response = wp_remote_get($url);
        if (is_wp_error($response)) {
            return FALSE;
        }
        if (!array_key_exists('body', $response)) {
            return FALSE;
        }
        return $decoded_response = json_decode($response['body']);
    }
    // Shortcode function
    public function show_lead_form()
    {
        ob_start();
?>

        <head>
            <style>
                <?php include(plugin_dir_path(__FILE__) . 'parkstyle.css'); ?>
            </style>
        </head>

        <body>
            <div class="container">
                <div class="card-body p-4 rounded" style="background-color: gray;">
                    <div class="row g-3">
                        <div class="d-flex flex-row justify-content-end">
                            <a id="svg-cart" onclick='return false' href="#"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                    <path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                                </svg>
                                <span class='badge badge-warning homeCartCount' id='lblCartCount'></span></a>
                        </div>

                        <div class="d-grid gap-2 btn-group">
                            <?php
                            $decoded_response = $this->jsonResponse();
                            $i = 0;
                            $j = 0;
                            $k = 0;
                            $l = 0;

                            foreach ($decoded_response->data as $product) {
                            ?>
                                <button id="<?= $product->id ?>" class="btn btn-dark btnType" name="person-day" type="button">
                                    <input id="ticket-<?= ++$i; ?>" type="hidden" value="<?= $product->id ?>" />
                                    <?= $product->name . "\n"; ?>
                                    <input id="name-<?= ++$j; ?>" class="product-name" type="hidden" value="<?= $product->name ?>" />
                                    <input id="price-<?= ++$k; ?>" class="product-price" type="hidden" value="<?= $product->price ?>" />
                                    <input id="description-<?= ++$l; ?>" class="product-description" type="hidden" value="<?= $product->description ?>" />
                                </button>
                            <?php } ?>
                        </div>

                        <div class="d-grid gap-2 text-center">
                            <h5>Make Your Choice</h5>
                            <div id="google_translate_element" style="display:none"></div>
                            <div>
                                <a href="#" class="flag_link eng" data-lang="nl" onclick='return false'>
                                    <svg xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://web.resource.org/cc/" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:svg="http://www.w3.org/2000/svg" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:ns1="http://sozi.baierouge.fr" id="svg378" viewBox="0 0 1063 708.66" version="1" y="0" x="0" style="width: 30px;">
                                        <rect id="rect171" style="fill-rule:evenodd;stroke-width:1pt;fill:#ffffff" rx="0" ry="0" height="708.66" width="1063" y="0" x="0" />
                                        <rect id="rect256" style="fill-rule:evenodd;stroke-width:1pt;fill:#21468b" rx="0" ry="0" height="236.22" width="1063" y="475.56" x="0" />
                                        <rect id="rect255" style="fill-rule:evenodd;stroke-width:1pt;fill:#ae1c28" height="236.22" width="1063" y="0" x="0" />
                                        <metadata>
                                            <rdf:RDF>
                                                <cc:Work>
                                                    <dc:format>image/svg+xml</dc:format>
                                                    <dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
                                                    <cc:license rdf:resource="http://creativecommons.org/licenses/publicdomain/" />
                                                    <dc:publisher>
                                                        <cc:Agent rdf:about="http://openclipart.org/">
                                                            <dc:title>Openclipart</dc:title>
                                                        </cc:Agent>
                                                    </dc:publisher>
                                                    <dc:title>Flag of the Netherlands</dc:title>
                                                    <dc:date>2008-02-07T14:44:36</dc:date>
                                                    <dc:description />
                                                    <dc:source>https://openclipart.org/detail/13053/flag-of-the-netherlands-by-anonymous-13053</dc:source>
                                                    <dc:creator>
                                                        <cc:Agent>
                                                            <dc:title>Anonymous</dc:title>
                                                        </cc:Agent>
                                                    </dc:creator>
                                                    <dc:subject>
                                                        <rdf:Bag>
                                                            <rdf:li>country</rdf:li>
                                                            <rdf:li>europe</rdf:li>
                                                            <rdf:li>european union</rdf:li>
                                                            <rdf:li>flag</rdf:li>
                                                            <rdf:li>nation</rdf:li>
                                                            <rdf:li>netherlands</rdf:li>
                                                        </rdf:Bag>
                                                    </dc:subject>
                                                </cc:Work>
                                                <cc:License rdf:about="http://creativecommons.org/licenses/publicdomain/">
                                                    <cc:permits rdf:resource="http://creativecommons.org/ns#Reproduction" />
                                                    <cc:permits rdf:resource="http://creativecommons.org/ns#Distribution" />
                                                    <cc:permits rdf:resource="http://creativecommons.org/ns#DerivativeWorks" />
                                                </cc:License>
                                            </rdf:RDF>
                                        </metadata>
                                    </svg>
                                </a>
                                <a href="#" class="flag_link taj" data-lang="en" onclick='return false'>
                                    <svg xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:svg="http://www.w3.org/2000/svg" xmlns:ns1="http://sozi.baierouge.fr" xmlns:xlink="http://www.w3.org/1999/xlink" id="svg1" inkscape:version="0.46" viewBox="0 0 1000 500" sodipodi:version="0.32" inkscape:output_extension="org.inkscape.output.svg.inkscape" sodipodi:docname="united_kingdom.svg" style="width: 35px;">
                                        <sodipodi:namedview id="base" inkscape:window-x="353" inkscape:window-y="389" inkscape:window-height="704" inkscape:zoom="0.544" showgrid="false" inkscape:current-layer="svg1" inkscape:cx="500" inkscape:cy="250" inkscape:window-width="952" />
                                        <g id="g578" transform="scale(16.667)">
                                            <rect id="rect124" style="stroke-width:1pt;fill:#000066" height="30" width="60" y="0" x="0" />
                                            <g id="g584">
                                                <path id="path146" style="stroke-width:1pt;fill:#ffffff" d="m0 0v3.3541l53.292 26.646h6.708v-3.354l-53.292-26.646h-6.708zm60 0v3.354l-53.292 26.646h-6.708v-3.354l53.292-26.646h6.708z" />
                                                <path id="path136" style="stroke-width:1pt;fill:#ffffff" d="m25 0v30h10v-30h-10zm-25 10v10h60v-10h-60z" />
                                                <path id="path141" style="stroke-width:1pt;fill:#cc0000" d="m0 12v6h60v-6h-60zm27-12v30h6v-30h-6z" />
                                                <path id="path150" style="stroke-width:1pt;fill:#cc0000" d="m0 30l20-10h4.472l-20 10h-4.472zm0-30l20 10h-4.472l-15.528-7.7639v-2.2361zm35.528 10l20-10h4.472l-20 10h-4.472zm24.472 20l-20-10h4.472l15.528 7.764v2.236z" />
                                            </g>
                                        </g>
                                        <metadata>
                                            <rdf:RDF>
                                                <cc:Work>
                                                    <dc:format>image/svg+xml</dc:format>
                                                    <dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
                                                    <cc:license rdf:resource="http://creativecommons.org/licenses/publicdomain/" />
                                                    <dc:publisher>
                                                        <cc:Agent rdf:about="http://openclipart.org/">
                                                            <dc:title>Openclipart</dc:title>
                                                        </cc:Agent>
                                                    </dc:publisher>
                                                    <dc:title>Flag of the United Kingdom</dc:title>
                                                    <dc:date>2008-07-12T12:27:21</dc:date>
                                                    <dc:description />
                                                    <dc:source>https://openclipart.org/detail/17754/flag-of-the-united-kingdom-by-tobias</dc:source>
                                                    <dc:creator>
                                                        <cc:Agent>
                                                            <dc:title>tobias</dc:title>
                                                        </cc:Agent>
                                                    </dc:creator>
                                                    <dc:subject>
                                                        <rdf:Bag>
                                                            <rdf:li>country</rdf:li>
                                                            <rdf:li>europe</rdf:li>
                                                            <rdf:li>european union</rdf:li>
                                                            <rdf:li>flag</rdf:li>
                                                            <rdf:li>nation</rdf:li>
                                                            <rdf:li>sign</rdf:li>
                                                            <rdf:li>united nations member</rdf:li>
                                                            <rdf:li>unitedkingdom</rdf:li>
                                                        </rdf:Bag>
                                                    </dc:subject>
                                                </cc:Work>
                                                <cc:License rdf:about="http://creativecommons.org/licenses/publicdomain/">
                                                    <cc:permits rdf:resource="http://creativecommons.org/ns#Reproduction" />
                                                    <cc:permits rdf:resource="http://creativecommons.org/ns#Distribution" />
                                                    <cc:permits rdf:resource="http://creativecommons.org/ns#DerivativeWorks" />
                                                </cc:License>
                                            </rdf:RDF>
                                        </metadata>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    <?php
        return ob_get_clean();
    }
}

if ($_SERVER["REQUEST_URI"] === '/wordpress/home/') {
    ?>
    <div class="d-flex flex-row justify-content-center mb-4 container">
        <img src="https://bootstrapmade.com/demo/templates/NiceAdmin/assets/img/logo.png" alt="">
        <h1 class="ps-3">Parking Ticket</h1>
    </div>
    <div class="park">
        <?php
        $leadForm = new LeadForm();
        echo do_shortcode('[lead_form]');
        ?>
    </div>

    <div class="input" style="display: none;">
        <?php
        include(plugin_dir_path(__FILE__) . 'include-form.php');
        echo do_shortcode('[input_form]');
        ?>
    </div>

    <div class="show" style="display: none;">
        <?php
        include(plugin_dir_path(__FILE__) . 'show-form.php');
        echo do_shortcode('[show_form]');
        ?>
    </div>

    <div class="cart" style="display: none;">
        <?php
        include(plugin_dir_path(__FILE__) . 'cart.php');
        echo do_shortcode('[cart_form]');
        ?>
    </div>

    <div class="payment" style="display: none;">
        <?php
        include(plugin_dir_path(__FILE__) . 'payment.php');
        echo do_shortcode('[payment_form]');
        ?>
    </div>

    <div class="checkout" style="display: none;">
        <?php
        include(plugin_dir_path(__FILE__) . 'checkout.php');
        echo do_shortcode('[stripe_card_element]');
        ?>
    </div>

    <script type="text/javascript">
        // <![CDATA[
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'en,nl'
            }, 'google_translate_element');
        }
        // ]]>
        var flags = document.getElementsByClassName('flag_link');

        Array.prototype.forEach.call(flags, function(e) {
            e.addEventListener('click', function() {
                var lang = e.getAttribute('data-lang');
                var languageSelect = document.querySelector("select.goog-te-combo");
                languageSelect.value = lang;
                languageSelect.dispatchEvent(new Event("change"));
            });
        });
    </script>
    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" type="text/javascript"></script>
<?php }
?>