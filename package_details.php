<?php
session_start();
include("./include/config.php");

error_reporting(0);
if (!isset($_SESSION['EmailId'])) {
    // Redirect the user to the login page if not logged in
    header("Location: login.php");
    exit(); // Make sure to exit after redirection
}

$p_id = $_GET['p_id'];
$sql = "SELECT * FROM packages WHERE id = $p_id LIMIT 1";
$result = $conn->query($sql);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $status = 0;
    $payment = 0;
    // Fetch $days from the database 
    $p_id = $_GET['p_id'];
    $query = "SELECT days FROM packages WHERE id = $p_id"; // Assuming you have an ID to identify the record
    $result = $conn->query($query);

    // Initialize $days and $todate variables
    $days = '';
    $todate = '';

    // Check if the query was successful and fetch the days
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $days = $row['days'];

        // Retrieve fromdate from POST data
        $fromdate = $_POST['fromdate'] ?? '';

        // Calculate to date only if fromdate and days are provided
        if (!empty($fromdate) && !empty($days)) {
            $todate = date('Y-m-d', strtotime($fromdate . ' + ' . $days . ' days'));
        }
    }

    // Free the result set
    $result->free();

    // If either fromdate or days is not provided, set $todate to an empty string
    $todate = $todate ?? '';


    $days = $_POST['days'];
    $message = $_POST['message'];
    $bookingno = rand(100000000, 999999999);
    $email = $_SESSION['EmailId'];
    $p_id = $_GET['p_id'];

    // Prepare SQL statement
    $stmt = "INSERT INTO `bookings` (`booking_number`, `EmailId`, `booking_id` , `from_date`, `to_date`, `message`,`status`,`payment`) 
             VALUES ($bookingno, '$email','$p_id', '$fromdate', '$todate', '$message','$status','$payment')";

    // Execute the SQL statement
    if ($conn->query($stmt) == TRUE) {
        header("Location: payment.php?booking_id=$bookingno");
        exit;
    } else {
        // Handle the case where insertion fails
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tours and travels | Booking details</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="shortcut icon" href="favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/package-detail.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .error_message1 {
            color: red;
            font-size: 2rem;
            margin-top: -126rem;
            margin-left: 57rem;
            /* Add space below the text */
            text-align: center;
            border: 1px solid red;
            padding: 10px;
            border-radius: 5px;
            background-color: #ffe6e6;
            justify-content: space-between;
            position: absolute;
        }

        .success_message1 {
            color: green;
            font-size: 16px;
            margin-top: 5px;
            margin-bottom: 600px;
            text-align: center;
            border: 1px solid green;
            padding: 10px;
            border-radius: 5px;
            background-color: #e6ffe6;
            /* Light red background */
            position: absolute;
        }

        .fa-solid.fa-arrow-left {
            left: 13px;
            width: 50px;
            height: 50px;
            color: black;
            z-index: 999;
        }

        .fa-solid.fa-arrow-left,
        .fa-solid.fa-arrow-right {
            color: #333;
            font-size: 24px;
            z-index: 999;
        }

        .box {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #FFF;
            display: flex;
            justify-content: center;
            /* Center horizontally */
            align-items: center;
            /* Center vertically */
        }
    </style>
</head>

<body>

    <?php include("./include/header.php"); ?>

    <?php
    $p_id = $_GET['p_id'];
    $sql = "SELECT * FROM packages WHERE id = $p_id ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
            <section class="wrapper">
                <i class="fa-solid fa-arrow-left box button" id="prev"></i>
                <div class="image-container">
                    <div class="carousel">
                        <img src="./admin/images/packageimages/<?php echo $row["img1"]; ?>" alt="" width="100%" height="500px" />
                        <img src="./admin/images/packageimages/<?php echo $row["img2"]; ?>" alt="" width="100%" height="500px" />
                        <img src="./admin/images/packageimages/<?php echo $row["img3"]; ?>" alt="" width="100%" height="500px" />
                        <img src="./admin/images/packageimages/<?php echo $row["img4"]; ?>" alt="" width="100%" height="500px" />
                        <img src="./admin/images/packageimages/<?php echo $row["img5"]; ?>" alt="" width="100%" height="500px" />
                        <img src="./admin/images/packageimages/<?php echo $row["img6"]; ?>" alt="" width="100%" height="500px" />
                    </div>
                </div>
                <i class="fa-solid fa-arrow-right box button" id="next"></i>
            </section>

            <section class="listing-detail" style="display:block;">
                <div class="container">
                    <div class="listing_detail_head row">
                        <div class="col-md-9">
                            <h2 style="margin-left: 0;">
                                <?php echo $row["package_name"]; ?>
                            </h2>
                            <span>
                                <?php echo $row["package_location"]; ?>
                            </span>
                        </div>
                        <div class="col-md-3">
                            <div class="price_info">
                                <p>Rs.<?php echo $row["package_price"]; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9">
                            <div class="main_features">
                                <ul>
                                    <li>

                                        <i class="fa fa-user-times" aria-hidden="true"></i>
                                        <h5>Time</h5>
                                        <p> <?php echo $row['days'] ?> days</p>
                                    </li>
                                    <li>
                                        <i class="fa fa-train" aria-hidden="true"></i>
                                        <h5>Train</h5>
                                        <p>Ac Train</p>
                                    </li>
                                    <li>
                                        <i class="fa fa-bus " aria-hidden="true"></i>
                                        <h5>
                                            <?php echo $row["package_features"]; ?>
                                        </h5>
                                        <p>Ac bus</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="listing_more_info">
                                <div class="listing_detail_wrap">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs gray-bg" role="tablist">
                                        <li role="presentation" class="active">
                                            <a href="#vehicle-overview" aria-controls="vehicle-overview" role="tab" data-toggle="tab">Vehicle Overview</a>
                                        </li>

                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <!-- vehicle-overview -->
                                        <div role="tabpanel" class="tab-pane active" id="vehicle-overview">
                                            <?php
                                            // Assuming $row["package_details"] contains the package details

                                            // Explode the package details into an array of paragraphs
                                            $paragraphs = preg_split('/(\r?\n){2,}/', $row["package_details"]);

                                            // Define the maximum number of paragraphs to display
                                            $max_paragraphs = 100; // Change this to your desired maximum number of paragraphs

                                            // Loop through the paragraphs and echo them up to the maximum limit
                                            $display_paragraphs = array_slice($paragraphs, 0, $max_paragraphs);
                                            foreach ($display_paragraphs as $paragraph) {
                                                // Echo each paragraph with a background color
                                                echo "<p>" . $paragraph . "</p>";
                                            }

                                            // Display a link to view the full package details
                                            if (count($paragraphs) > $max_paragraphs) {
                                                echo "<p><a href='#'>View full package details</a></p>";
                                            }
                                            ?>
                                        </div>
                                        <!-- Accessories -->

                                    </div>
                                </div>
                            </div>
                        </div>

                <?php $days = $row['days'];
            }
        } else {
            echo '<a href="package_details.php?id=' . $row["id"] . '"></a>';
        }

                ?>
                <!--Side-Bar-->
                <aside class="col-md-3">
                    <div class="share_vehicle">
                        <p>
                            Share:
                        <div class="social-icons">
                            <a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                            <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                            <a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
                        </div>
                        </p>
                        <style>
                            .social-icons {
                                display: grid;
                                grid-template-columns: repeat(auto-fit, minmax(40px, 1fr));
                                /* Adjust minmax values as needed */
                                gap: 10px;
                                /* Adjust the gap between icons */
                            }

                            .social-icons a {
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                background-color: #222222;
                                /* Adjust background color as needed */
                                width: 100%;
                                height: 40px;
                                /* Adjust height as needed */
                                border-radius: 5px;
                                /* Adjust border radius as needed */
                            }

                            .social-icons a:hover {
                                background-color: #999;
                                /* Adjust hover background color as needed */
                            }

                            .social-icons i {
                                font-size: 20px;
                                /* Adjust icon size as needed */
                                color: #fff;
                                /* Adjust icon color as needed */
                            }
                        </style>
                        </p>
                    </div>
                    <div class="sidebar_widget">
                        <div class="widget_heading">
                            <h5><i class="fa fa-envelope" aria-hidden="true"></i>Book Now</h5>
                        </div>
                        <?php if ($_SESSION['alogin']) { ?>
                            <?php
                            // Display error message if transportation mode is not selected
                            if (!empty($error_message)) {
                                echo "<p class='error_message1'>$error_message</p>";
                            }
                            ?>



                            <form method="post">
                                <div class="form-group">
                                    <?php
                                    if (isset($_SESSION['EmailId'])) {
                                        echo "Email ID: " . $_SESSION['EmailId'];
                                    }


                                    // Fetch $days from the database 
                                    $p_id = $_GET['p_id'];
                                    $query = "SELECT days FROM packages where id=$p_id"; // Assuming you have an ID to identify the record
                                    $result = mysqli_query($conn, $query);
                                    $row = mysqli_fetch_assoc($result);
                                    $days = $row['days'] ?? ''; // Set default value if $days is not found in the database

                                    $fromdate = $_POST['fromdate'] ?? ''; // Set default value if fromdate is not provided

                                    // Check if both $fromdate and $days are provided before calculating $todate
                                    if (!empty($fromdate) && !empty($days)) {
                                        // Calculate the to date based on the from date and duration
                                        $todate = date('Y-m-d', strtotime($fromdate . ' + ' . $days . ' days'));
                                    } else {
                                        // If either fromdate or days is not provided, set $todate to an empty string
                                        $todate = '';
                                    }
                                    ?>
                                    <label>From Date:</label>
                                    <input type="date" class="form-control" name="fromdate" id="fromdate" placeholder="From Date" onchange="updateToDate()" required>


                                </div>
                                <div class="form-group">
                                    <label>To Date:</label>

                                    <input type="date" class="form-control" name="toDate" id="todate" value="<?php echo  $todate; ?>" readonly>
                                </div>
                                <script>
                                    function updateToDate() {
                                        var fromDateValue = document.getElementsByName('fromdate')[0].value;
                                        var daysValue = <?php echo json_encode($days); ?>; // Fetching days value from PHP
                                        var toDateField = document.getElementById('todate');

                                        if (fromDateValue && daysValue) {
                                            var toDate = new Date(fromDateValue);
                                            toDate.setDate(toDate.getDate() + parseInt(daysValue));
                                            var formattedDate = toDate.toISOString().substr(0, 10);
                                            toDateField.value = formattedDate;
                                        } else {
                                            toDateField.value = '';
                                        }
                                    }
                                </script>
                                <div class="form-group">
                                    <textarea rows="4" class="form-control" name="message" placeholder="Message" required></textarea>
                                </div>
                                <?php if ($_SESSION['alogin']) { ?>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary " id="submitform" name="submitform" value="Book Now">
                                    </div>
                                <?php } else { ?>
                                    <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login For Book</a>

                                <?php } ?>
                            </form>

                        <?php } else { ?>
                            <div class="login_btn"><a href="./include/login.php" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login / Register</a></div>

                        <?php } ?>
                    </div>
                </aside>
                <!--/Side-Bar-->
                    </div>
                </div>
            </section>

            <script src="./js/jquery.min.js"></script>
            <script src="./js/bootstrap.min.js"></script>
            <script src="./js/interface.js"></script>
            <script src="./assets/js/index.js"></script>

            <script type="text/javascript">
                // Add event listener to radio buttons to submit the form when one is selected
                document.querySelectorAll('input[type="radio"]').forEach(function(radio) {
                    radio.addEventListener('change', function() {
                        document.getElementById('transportationForm').submit();
                    });
                });
            </script>

            <script src="./assets/js/index.js"></script>
            <?php //if (!empty($error_message)) {
            //echo '<div class="error_message1">'. $error_message .'</div>';
            //}
            ?>

</body>

</html>



<?php
include  './include/config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fromdate = $_POST['fromdate'];
    $todate = $_POST['todate'];
    $message = $_POST['message'];
    $bookingno = rand(100000000, 999999999);
    $status = 0;
    $p_id = $_SESSION['p_id'];
    // Assuming $email contains the email ID from the session
    $email = $_SESSION['EmailId'];

    // Prepare SQL statement
    $stmt = "INSERT INTO `bookings` (`booking_number`, `EmailId`, `booking_id` , `from_date`, `to_date`, `message`,`status`) 
             VALUES ($bookingno, '$email','$p_id', '$fromdate', '$todate', '$message','$status')";

    // Execute the SQL statement
    if ($conn->query($stmt) == TRUE) {
        // Redirect to index.php if the insertion is successful
        header("Location: index.php");
        exit; // Make sure to exit after redirection
    } else {
        // Handle the case where insertion fails
        echo "Error: " . $conn->error;
    }
}

// Close the database connection
// mysqli_close($conn);
?>
<!-- $result = $conn->query($sql);

if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) { -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the submitted from_date
    $selectedFromDate = $_POST["fromdate"];

    // Prepare and execute SQL query to fetch data for the selected from_date

    $sql = "SELECT package_features FROM packages WHERE from_date = $selectedFromDate";
    echo $sql;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $daysDifference = $row["package_features"];

            // Calculate to_date
            $toDate = date('Y-m-d', strtotime($selectedFromDate . ' + ' . $daysDifference . ' days'));

            echo "From Date: " . $selectedFromDate . "<br>";
            echo "Days Difference: " . $daysDifference . "<br>";
            echo "To Date: " . $toDate . "<br>";
        }
    } else {
        echo "No results found for the selected from_date.";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>