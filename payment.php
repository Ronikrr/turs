<?php
session_start();
// Assuming you have already started the session and established a database connection
include("./include/config.php");
if (!isset($_SESSION['EmailId'])) {
    // Redirect the user to the login page if not logged in
    header("Location: login.php");
    exit(); // Make sure to exit after redirection
}
$email = $_SESSION['EmailId'];
// Check if the booking ID is set in the URL
if (!isset($_GET['booking_id'])) {
    // Redirect the user back to the booking page if booking ID is not provided
    header("Location: index.php");
    exit;
}

// Retrieve the booking ID from the URL
$booking_id = $_GET['booking_id'];

// Query the database to fetch booking details based on the booking ID
$sql = "SELECT b.*, p.*, u.*
        FROM bookings AS b
        JOIN packages AS p ON b.booking_id = p.id
        JOIN users AS u ON b.EmailId = u.EmailId
        WHERE b.booking_number = '$booking_id'";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Booking found, fetch details
    $booking = $result->fetch_assoc();
} else {
    // No booking found with the provided ID, redirect to booking page
    header("Location: booking.php");
    exit;
}

// Assuming you have a database connection established

// Check if form is submitted
if (isset($_POST['submitpayment'])) {
    $package_price = $booking['package_price'];
    $booking_id = $booking['booking_number'];
    $email = $_SESSION['EmailId'];

    $cardholder_name = $_POST["cardholder_name"];
    $card_number = $_POST["card_number"];
    $expiry_date = $_POST["expiry_date"];
    $cvv = $_POST["cvv"];
    $errors = array();

    // Validate cardholder name
    if (empty($cardholder_name)) {
        $errors[] = "Cardholder name is required.";
    }

    // Validate card number
    // $card_number = $_POST['card_number'];
    $card_number = str_replace(' ', '', $card_number); // Remove spaces
    if (!preg_match('/^\d{16}$/', $card_number)) {
        $errors[] = "Invalid credit card number format. It should be 16 digits.";
    }

    // Validate expiry date
    if (empty($expiry_date) || !preg_match('/^(0[1-9]|1[0-2])\/\d{2}$/', $expiry_date)) {
        $errors[] = "Please enter a valid expiry date in MM/YY format.";
    }

    // Validate CVV
    // Validate the CVV
    if (empty($cvv) || !preg_match('/^\d{3,4}$/', $cvv)) {
        $errors[] = "Please enter a valid 3 or 4-digit CVV.";
    } else {
        // Hash the CVV using SHA-256 if it passes validation
        $hashed_cvv = hash('sha256', $cvv);
    }
    // If no errors, proceed with processing the payment
    if (empty($errors)) {
        // Insert payment details into the database
        $sqlinsert = "INSERT INTO payment (`booking_id`,`Email`,`money`,`cardholder_name`,`card_number`,`expiry_date`,`cvv`) 
                        VALUES ('$booking_id','$email','$package_price','$cardholder_name','$card_number','$expiry_date','$hashed_cvv')";
        if ($conn->query($sqlinsert) === TRUE) {
            // Update booking
            $payment = 1;
            $sqlupdate = "UPDATE bookings SET payment = '$payment' WHERE booking_number = $booking_id";
            if ($conn->query($sqlupdate) === TRUE) {
                echo "<script>alert('Booking successfully.');</script>";
                echo "<script type='text/javascript'> document.location = 'my-booking.php'; </script>";
            } else {
                echo "Error updating booking: " . $conn->error;
            }
        } else {
            echo "Error inserting payment: " . $conn->error;
        }
    } else {
        // Display validation errors

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="bill.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/package-detail.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>

<body>
    <?php include("./include/header.php") ?>

    <section class="user_profile inner_pages">
        <div class="container">
            <div class="user_profile_info gray-bg padding_4x4_40" style="max-width: 100%;">
                <div id="printContent">
                    <!-- Payment processing form or gateway integration goes here... -->
                    <table border="1" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                        <tbody>


                            <h3 style="text-align:center; color:red">#<?php echo htmlentities($booking['booking_number']); ?> Booking Details</h3>
                            <tr>
                                <th colspan="4" style="text-align:center;color:white">User Details</th>
                            </tr>
                            <tr>
                                <th>Booking No.</th>
                                <td><?php echo htmlentities($booking['booking_number']); ?></td>
                                <th>Name</th>
                                <td><?php echo htmlentities($booking['FullName']); ?></td>
                            </tr>
                            <tr>
                                <th>Email Id</th>
                                <td><?php echo htmlentities($booking['EmailId']); ?></td>
                                <th>Contact No</th>
                                <td><?php // echo htmlentities($booking['MoblieNo']); 
                                    ?></td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td><?php echo htmlentities($booking['Address']); ?></td>
                                <th>City</th>
                                <td><?php echo htmlentities($booking['City']); ?></td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td><?php echo htmlentities($booking['Country']); ?></td>

                            </tr>

                            <tr>
                                <th colspan="4" style="text-align:center;color:white">Booking Details</th>
                            </tr>
                            <tr>
                                <th>package Name</th>
                                <td><?php echo htmlentities($booking['package_name']); ?></td>
                                <th>package id</th>
                                <td><?php echo htmlentities($booking['booking_id']); ?></td>
                            </tr>
                            <tr>
                                <th>From date</th>
                                <td><?php echo htmlentities($booking['from_date']); ?></td>
                                <?php $todate = date('Y-m-d', strtotime($booking['from_date'] . ' + ' . $booking['days'] . ' days')); ?>
                                <th>TO Date</th>
                                <td><?php echo htmlentities($todate); ?></td>
                            </tr>
                            <tr>
                                <th>days</th>
                                <td><?php echo htmlentities($booking['days']); ?></td>
                                <th>Booking date</th>
                                <td><?php echo htmlentities($booking['booking_time']); ?></td>
                            </tr>

                            <tr>
                                <th>payment status</th>
                                <td><?php if ($booking['payment'] == 0) {
                                    echo htmlentities('unpay');
                                } else {
                                    echo htmlentities('payed');
                                } ?></td>
                            </tr>
                            <tr>
                                <th colspan="3" style="text-align:center">Grand Total</th>
                                <td><?php echo htmlentities($booking['package_price']); ?></td>
                            </tr>

                </div>
            </div>
        </div>
        </tbody>
        </table>
    </section>
    <?php if ($booking['payment'] == 0) {
        if (!empty($errors)) {
            echo "<div class='error'>";
            echo "<p><strong>Error(s):</strong></p>";
            echo "<ul>";
            foreach ($errors as $error) {
                echo "<li>$error</li>";
            }
            echo "</ul>";
            echo "</div>";
        } ?>
        <div class="popup-modal" style="width: 500px;margin-left:50rem;">
            <form class="form" method="post">
                <div class="payment-options">

                </div>
                <div class="separator">
                    <hr class="line" />
                    <p>or pay using credit card</p>
                    <hr class="line" />
                </div>
                <div class="credit-card-info-form">
                    <div class="input-container">
                        <label for="cardholder_name" class="input-label">Card holder full name</label>
                        <input id="cardholder_name" class="input-field" type="text" name="cardholder_name" placeholder="Enter your full name" />
                    </div>
                    <div class="input-container">
                        <label for="card_number" class="input-label">Card Number</label>
                        <input type="text" class="input-field" id="card_number" name="card_number" pattern="\d{4} \d{4} \d{4} \d{4}" placeholder="0000 0000 0000 0000" maxlength="19">
                    </div>
                    <div class="input-container">
                        <label for="expiry_date" class="input-label">Expiry Date</label>
                        <input id="expiry_date" class="input-field" type="text" name="expiry_date" placeholder="MM/YY" />
                        <label for="cvv" class="input-label">CVV</label>
                        <input id="cvv" class="input-field" type="password" name="cvv" placeholder="CVV" />
                    </div>
                </div>
                <input class="purchase-btn" type="submit" name="submitpayment" value="pay">
            </form>
            <script>
                // Get the input field
                // For expiry date input
                var expiryInput = document.getElementById("expiry_date");

                // Execute a function when the user releases a key on the keyboard
                expiryInput.addEventListener("keyup", function(event) {
                    // Check if the key pressed is a number and the length of the input is 2
                    if (event.key >= 0 && event.key <= 9 && expiryInput.value.length === 2) {
                        // Automatically append a slash after two numbers
                        expiryInput.value += "/";
                    }
                });

                // For credit card number input
                var cardNumberInput = document.getElementById("card_number");

                // Execute a function when the user releases a key on the keyboard
                cardNumberInput.addEventListener("keyup", function(event) {
                    // Remove any non-digit characters from the input value
                    var inputValue = cardNumberInput.value.replace(/\D/g, '');
                    // Format the input value with spaces after every 4 digits
                    var formattedValue = inputValue.replace(/(\d{4})/g, '$1 ').trim();
                    // Set the formatted value back to the input field
                    cardNumberInput.value = formattedValue;
                });
            </script>
        </div>

    <?php } else { ?>
        <button class="btn btn-primary" style="margin-left: 18rem;margin-top: -25rem;" onclick="printDiv('printContent')">Print Bill</button>

        <script>
            function printDiv(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
            }
        </script>
    <?php }
    include("./include/footer.php") ?>
</body>

</html>