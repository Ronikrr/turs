<div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <!-- Your modal content here -->
            <div class="popup-modal">
                <form class="form">
                    <div class="payment-options">
                        <button name="paypal" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 124 33" height="33px" width="124px">
                                <!-- PayPal logo SVG -->
                            </svg>
                        </button>
                        <button name="apple-pay" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 210.2" height="33px" width="124px">
                                <!-- Apple Pay logo SVG -->
                            </svg>
                        </button>
                        <button name="google-pay" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 39" height="33px" width="124px">
                                <!-- Google Pay logo SVG -->
                            </svg>
                        </button>
                    </div>
                    <div class="separator">
                        <hr class="line" />
                        <p>or pay using credit card</p>
                        <hr class="line" />
                    </div>
                    <div class="credit-card-info--form">
                        <div class="input-container">
                            <label for="cardholder-name" class="input-label">Card holder full name</label>
                            <input id="cardholder-name" class="input-field" type="text" name="cardholder-name"
                                placeholder="Enter your full name" />
                        </div>
                        <div class="input-container">
                            <label for="card-number" class="input-label">Card Number</label>
                            <input id="card-number" class="input-field" type="text" name="card-number"
                                placeholder="0000 0000 0000 0000" />
                        </div>
                        <div class="input_container">
                            <label for="password_field" class="input-label">Expiry Date / CVV</label>
                            <div class="split">
                                <input id="password-field" class="input-field" type="text" name="input-name" title="Expiry Date"
                                    placeholder="01/23" />
                                <input id="password-field" class="input-field" type="number" name="cvv" title="CVV"
                                    placeholder="CVV" />
                            </div>
                        </div>
                    </div>
                    <button class="purchase-btn">Checkout</button>
                </form>
            </div>
        </div>
    </div>

    <style>
        
        /* Popup Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            border-radius: 10px;
            max-width: 488px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* .modal {
        width: fit-content;
        height: fit-content;
        background: #ffffff;
        box-shadow: 0px 187px 75px rgba(0, 0, 0, 0.01),
          0px 105px 63px rgba(0, 0, 0, 0.05), 0px 47px 47px rgba(0, 0, 0, 0.09),
          0px 12px 26px rgba(0, 0, 0, 0.1), 0px 0px 0px rgba(0, 0, 0, 0.1);
        border-radius: 26px;
        max-width: 450px;
      } */

        .form {
            display: flex;
            flex-direction: column;
            gap: 20px;
            padding: 20px;
        }

        .payment-options {
            width: calc(100% - 40px);
            display: grid;
            grid-template-columns: 33% 34% 33%;
            gap: 20px;
            padding: 10px;
        }

        .payment-options button {
            height: 55px;
            background: #f2f2f2;
            border-radius: 11px;
            padding: 0;
            border: 0;
            outline: none;
        }

        .payment-options button svg {
            height: 18px;
        }

        .payment-options button:last-child svg {
            height: 22px;
        }

        .separator {
            width: calc(100% - 20px);
            display: grid;
            grid-template-columns: 1fr 2fr 1fr;
            gap: 10px;
            color: #8b8e98;
            margin: 0 10px;
        }

        .separator>p {
            word-break: keep-all;
            display: block;
            text-align: center;
            font-weight: 600;
            font-size: 11px;
            margin: auto;
        }

        .separator .line {
            display: inline-block;
            width: 100%;
            height: 1px;
            border: 0;
            background-color: #e8e8e8;
            margin: auto;
        }

        .credit-card-info--form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .input-container {
            width: 100%;
            height: fit-content;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .split {
            display: grid;
            grid-template-columns: 4fr 2fr;
            gap: 15px;
        }

        .split input {
            width: 100%;
        }

        .input-label {
            font-size: 10px;
            color: #8b8e98;
            font-weight: 600;
        }

        .input-field {
            width: auto;
            height: 40px;
            padding: 0 0 0 16px;
            border-radius: 9px;
            outline: none;
            background-color: #f2f2f2;
            border: 1px solid #e5e5e500;
            transition: all 0.3s cubic-bezier(0.15, 0.83, 0.66, 1);
        }

        .input-field:focus {
            border: 1px solid transparent;
            box-shadow: 0px 0px 0px 2px #242424;
            background-color: transparent;
        }

        .purchase-btn {
            height: 55px;
            background: #f2f2f2;
            border-radius: 11px;
            border: 0;
            outline: none;
            color: #ffffff;
            font-size: 13px;
            font-weight: 700;
            background: linear-gradient(180deg,
                    #363636 0%,
                    #1b1b1b 50%,
                    #000000 100%);
            box-shadow: 0px 0px 0px 0px #ffffff, 0px 0px 0px 0px #000000;
            transition: all 0.3s cubic-bezier(0.15, 0.83, 0.66, 1);
        }

        .purchase-btn:hover {
            box-shadow: 0px 0px 0px 2px #ffffff, 0px 0px 0px 4px #0000003a;
        }

        /* Reset input number styles */
        .input-field::-webkit-outer-spin-button,
        .input-field::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .input-field[type="number"] {
            -moz-appearance: textfield;
        }
    </style>