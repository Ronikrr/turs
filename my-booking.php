<?php
session_start();
error_reporting(0);
include("./include/config.php");

if (!isset($_SESSION['EmailId'])) {
    header("Location: login.php");
    exit();
}
$email = $_SESSION['EmailId'];
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <title>Tours and Travels | My Booking</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="favicon.svg" type="image/x-icon">
    <style>
        .profile_page {
            background-image: url("./assets/images/divya-agrawal-VV0fF4EoZaI-unsplash.jpg");
        }


        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .side-selection {
            display: flex;
            border-bottom: 2px solid #eee;
            margin-bottom: 20px;
            padding-bottom: 10px;
        }

        .side-selection button {
            padding: 10px 20px;
            margin-right: 10px;
            cursor: pointer;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .side-selection button:hover,
        .side-selection button.active {
            background-color: hsl(180, 88%, 13%);
            color: white;
            border-color: hsl(180, 88%, 13%);
            transform: scale(1.05);
        }

        h2,
        h3 {
            font-size: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: hsl(180, 88%, 13%);
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .status-completed {
            color: #28a745;
            font-weight: bold;
        }

        .status-canceled {
            color: #dc3545;
            font-weight: bold;
        }

        .unpay {
            color: red;
        }

        .payed {
            color: green;
        }
    </style>
</head>

<body>
    <!--Header-->
    <?php include("./include/header.php"); ?>
    <!-- /Header -->
    <section class="page-header profile_page">
        <div class="container">
            <div class="page-header_wrap">
                <div class="page-heading">
                    <h1>My Booking</h1>
                </div>
                <ul class="coustom-breadcrumb">
                    <li><a>Home</a></li>
                    <li>My Booking</li>
                </ul>
            </div>
        </div>
        <!-- Dark Overlay-->
        <div class="dark-overlay"></div>
    </section>
    <!-- /Page Header-->

    <?php
    // Moved $email assignment here to ensure it's defined before use in the SQL query
    $user_sql = "SELECT * FROM users WHERE EmailId = '$email'";
    $user_result = $conn->query($user_sql);

    if ($user_result->num_rows > 0) {
        while ($w = $user_result->fetch_assoc()) {
    ?>
            <section class="user_profile inner_pages">
                <div class="container">
                    <div class="user_profile_info gray-bg padding_4x4_40">
                        <div class="upload_user_logo">
                            <img src="./assets/images/author-avatar.png" alt="image">
                        </div>

                        <div class="dealer_info">
                            <h5><?php echo htmlspecialchars($w['FullName']); ?></h5>
                            <p><?php echo htmlspecialchars($w['Address']) . "<br>" . htmlspecialchars($w['City']) . "&nbsp;" . htmlspecialchars($w['Country']); ?></p>
                        </div>
                    </div>
                </div>
            </section>
    <?php
        }
    } else {
        echo "No User Found";
    }
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <?php include("./include/sidebar.php"); ?>
            </div>
            <div class="col-md-9 col-sm-9">
                <div class="profile_wrap">
                    <!-- <h5 class="uppercase underline">My Bookings</h5> -->
                    <div class="container" style="margin: 1rem">
                        <h2>Booking Status and History</h2>
                        <div class="side-selection">
                            <button id="busBtn" onclick="showBookingType('bus')">Bus Booking</button>
                            <button id="trainBtn" onclick="showBookingType('train')">Train Booking</button>
                            <button id="flightBtn" onclick="showBookingType('flight')">Flight Booking</button> <!-- Corrected ID -->
                            <button id="hotelBtn" onclick="showBookingType('hotel')">Hotel Booking</button>
                            <button id="packageBtn" onclick="showBookingType('package')">Travel Package Booking</button>
                        </div>
                        <div id="busTable" style="display:none;">
                            <h2>&nbsp;&nbsp;<i class="fa-solid fa-bus">&nbsp;&nbsp;</i>Bus Booking History</h2>
                            <!-- Bus booking table goes here -->
                            <?php
                            $sql = "SELECT b.*, p.*
                                    FROM bus_booking AS b
                                    JOIN bus_package AS p ON b.buid = p.id
                                    WHERE b.userEmail = '$email'";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <li>
                                        <a href="">
                                            <h4 style="color:red"> Booking No #<?php echo htmlspecialchars($row['booking_id']); ?></h4>
                                        </a>

                                        <div class="vehicle_title">
                                            <h6><a href="bus/index.php?buid=" .$buid><?php echo htmlspecialchars($row['bus_name']); ?>,</a></h6>
                                            <p><b>payment status:</b>
                                                <?php if ($row['payment'] == 0) {
                                                    echo   htmlentities('unpay');
                                                } else {
                                                    echo   htmlentities('payed');
                                                } ?>
                                            </p>
                                            <p><b>From </b><?php echo htmlspecialchars($row['from_location']); ?> <b>To </b><?php echo htmlspecialchars($row['to_location']); ?> </p>

                                        </div>
                                        <div class="vehicle_status">
                                            <?php
                                            $status = $row['status'];
                                            $status_text = '';
                                            if ($status == 1) {
                                                $status_text = 'Confirmed';
                                            } else if ($status == 2) {
                                                $status_text = 'Cancelled';
                                            } else {
                                                $status_text = 'Not Confirmed Yet';
                                            }
                                            echo '<a   class="btn btn-primary">' . $status_text . '</a>';

                                            echo '<a href="./bus/bill.php?booking_id=' . $row['booking_id'] . ' " class="btn btn-primary" >Bill Download</a>';
                                            ?>
                                            <div class="clearfix"></div>
                                        </div>
                                        <h5 style="color:blue; margin-top : 15rem;">Invoice</h5>
                                        <table>
                                            <tr>
                                                <th>bus name</th>
                                                <th>From Date</th>
                                                <th>To Date</th>
                                                <th>seat no</th>
                                                <th>Rent</th>
                                            </tr>
                                            <tr>
                                                <td><?php echo htmlspecialchars($row['bus_name']); ?></td>
                                                <td><?php echo htmlspecialchars($row['from_location']); ?></td>
                                                <td><?php echo htmlspecialchars($row['to_location']); ?></td>
                                                <td><?php echo htmlspecialchars($row['no_of_seats']); ?></td>
                                                <td><?php echo htmlspecialchars($row['money']); ?></td>
                                            </tr>
                                            <tr>
                                                <th colspan="4" style="text-align:center;"> Grand Total</th>
                                                <th><?php echo htmlspecialchars($row['money']); ?></th>
                                            </tr>
                                        </table>
                                        <hr />
                                    </li>

                            <?php }
                            } else {
                                echo "No Bookings";
                            } ?>
                        </div>
                        <div id="trainTable" style="display:none;">
                            <h2>&nbsp;&nbsp;<i class="fa-solid fa-train">&nbsp;&nbsp;</i>Train Booking History</h2>
                            <!-- Train booking table goes here -->
                            <?php
                            $sql = "SELECT b.*, p.*
                                    FROM train_booking AS b
                                    JOIN train_package AS p ON b.tid = p.id
                                    WHERE b.userEmail = '$email'";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <li>
                                        <h4 style="color:red">Booking No #<?php echo htmlspecialchars($row['booking_id']); ?></h4>

                                        <div class="vehicle_title">
                                            <h6><a href="train/index.php?"><?php echo htmlspecialchars($row['train_name']); ?>,</a></h6>
                                            <p><b>payment status:</b>
                                                <?php if ($row['payment'] == 0) {
                                                    echo   htmlentities('unpay');
                                                } else {
                                                    echo   htmlentities('payed');
                                                } ?>
                                            </p>
                                            <p><b>From </b><?php echo htmlspecialchars($row['starting_place']); ?> <b>To </b><?php echo htmlspecialchars($row['destination_place']); ?> </p>
                                        </div>
                                        <div class="vehicle_status">
                                            <?php
                                            $status = $row['status'];
                                            $status_text = '';
                                            if ($status == 1) {
                                                $status_text = 'Confirmed';
                                            } else if ($status == 2) {
                                                $status_text = 'Cancelled';
                                            } else {
                                                $status_text = 'Not Confirmed Yet';
                                            }
                                            echo '<a  class="btn btn-primary">' . $status_text . '</a>';
                                            echo '<a href="./train/billpay.php?booking_id=' . $row['booking_id'] . ' " class="btn btn-primary" >Bill Download</a>';
                                            ?>
                                            <div class="clearfix"></div>
                                        </div>
                                        <h5 style="color:blue; margin-top : 15rem;">Invoice</h5>
                                        <table>
                                            <tr>
                                                <th>train name</th>
                                                <th>departure time</th>
                                                <th>arrival time</th>
                                                <th>adult</th>
                                                <th>children</th>
                                                <th>Rent</th>
                                            </tr>
                                            <tr>
                                                <td><?php echo htmlspecialchars($row['train_name']); ?></td>
                                                <td><?php echo htmlspecialchars($row['departure_time']); ?></td>
                                                <td><?php echo htmlspecialchars($row['arrival_time']); ?></td>
                                                <td><?php echo htmlspecialchars($row['adult']); ?></td>
                                                <td><?php echo htmlspecialchars($row['children']); ?></td>
                                                <?php
                                                if ($row['class_of_travel'] == "economy") {
                                                    // Adjust the grand total for economy class
                                                    // For example:
                                                    $price = $row['fare'] * 7;
                                                } elseif ($row['class_of_travel'] == "business") {

                                                    $price = $row['fare'] * 5;
                                                } elseif ($row['class_of_travel'] == "firstClass") {

                                                    $price = $row['fare'] * 4;
                                                } elseif ($row['class_of_travel'] == "secondClass") {

                                                    $price = $row['fare'] * 3;
                                                } elseif ($row['class_of_travel'] == "thirdClass") {

                                                    $price = $row['fare'] * 2;
                                                } else {
                                                    $price = $row['fare'] * 1;
                                                }
                                                ?>
                                                <td><?php echo htmlspecialchars($price); ?></td>
                                                <?php $adult = $row['adult'];
                                                $children = $row['children'];
                                                $fullprice = $price;
                                                $harfprice = $fullprice / 2;
                                                $grandtotal = ($adult * $fullprice) + ($children * $harfprice); ?>
                                            </tr>
                                            <tr>
                                                <th colspan="5" style="text-align:center;"> Grand Total</th>
                                                <th><?php echo htmlspecialchars($grandtotal); ?></th>
                                            </tr>
                                        </table>
                                        <hr />
                                    </li>

                            <?php }
                            } else {
                                echo "No Bookings";
                            } ?>
                        </div>
                        <div id="flightTable" style="display:none;"> <!-- Added flightTable div -->
                            <h2>&nbsp;&nbsp;<i class="fa-solid fa-plane">&nbsp;&nbsp;</i>Flight Booking History</h2>
                            <?php
                            $sql = "SELECT b.*, p.*
                                    FROM flight_booking AS b
                                    JOIN flight_package AS p ON b.fid = p.id
                                    WHERE b.email = '$email'";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <li>
                                        <h4 style="color:red">Booking No #<?php echo htmlspecialchars($row['booking_id']); ?></h4>

                                        <div class="vehicle_title">
                                            <h6><a href="flight/index.php?"><?php echo htmlspecialchars($row['airline']); ?>,</a></h6>
                                            <p><b>From </b><?php echo htmlspecialchars($row['land']); ?> <b>To </b><?php echo htmlspecialchars($row['destination']); ?> </p>
                                            <p><b>payment status:</b>
                                                <?php if ($row['payment'] == 0) {
                                                    echo   htmlentities('unpay');
                                                } else {
                                                    echo   htmlentities('payed');
                                                } ?>
                                            </p>
                                            <p><b>passport:</b> <?php echo htmlspecialchars($row['passportid']); ?> </p>
                                        </div>
                                        <div class="vehicle_status">
                                            <?php
                                            $status = $row['status'];
                                            $status_text = '';
                                            if ($status == 1) {
                                                $status_text = 'Confirmed';
                                            } else if ($status == 2) {
                                                $status_text = 'Cancelled';
                                            } else {
                                                $status_text = 'Not Confirmed Yet';
                                            }
                                            echo '<a   class="btn btn-primary">' . $status_text . '</a>';
                                            echo '<a href="./flight/bill.php?booking_id=' . $row['booking_id'] . ' " class="btn btn-primary" >Bill Download</a>';
                                            ?>
                                            <div class="clearfix"></div>
                                        </div>
                                        <h5 style="color:blue; margin-top : 15rem;">Invoice</h5>
                                        <table>
                                            <tr>
                                                <th>flight number</th>
                                                <th>take off</th>
                                                <th>time</th>
                                                <th>passengers</th>
                                                <th>Rent</th>
                                            </tr>
                                            <tr>
                                                <td><?php echo htmlspecialchars($row['flightnumber']); ?></td>
                                                <td><?php echo htmlspecialchars($row['take_off']); ?></td>
                                                <td><?php echo htmlspecialchars($row['take_offtime']); ?></td>
                                                <td><?php echo htmlspecialchars($row['passengers']); ?></td>
                                                <td><?php echo htmlspecialchars($row['price']); ?></td>
                                                <?php $grandtotal = $row['price'] * $row['passengers']; ?>
                                            </tr>
                                            <tr>
                                                <th colspan="4" style="text-align:center;"> Grand Total</th>
                                                <th><?php echo htmlspecialchars($grandtotal); ?></th>
                                            </tr>
                                        </table>
                                        <hr />
                                    </li>

                            <?php }
                            } else {
                                echo "No Bookings";
                            } ?>
                        </div>
                        <div id="hotelTable" style="display:none;"> <!-- Added hotelTable div -->
                            <h2>&nbsp;&nbsp;<i class="fa-solid fa-hotel">&nbsp;&nbsp;</i>Hotel Booking History</h2>
                            <?php
                            $sql = "SELECT b.*, p.*
                                    FROM hotel_booking AS b
                                    JOIN hotel_package AS p ON b.hid = p.id
                                    WHERE b.EmailId = '$email'";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <li>
                                        <h4 style="color:red">Booking No #<?php echo htmlspecialchars($row['booking_id']); ?></h4>

                                        <div class="vehicle_title">
                                            <h6><a href="bus/index.php?"><?php echo htmlspecialchars($row['hotelname']); ?>,</a></h6>
                                            <p><b>hotel address:</b><br><?php echo htmlspecialchars($row['address']); ?> </p>
                                            <p><b>payment status:</b>
                                                <?php if ($row['payment'] == 0) {
                                                    echo   htmlentities('unpay');
                                                } else {
                                                    echo   htmlentities('payed');
                                                } ?>
                                            </p>
                                            <p><b>roomtype:</b> <?php echo htmlspecialchars($row['roomtype']); ?> </p>
                                        </div>
                                        <div class="vehicle_status">
                                            <?php
                                            $status = $row['status'];
                                            // $status_text = '';
                                            if ($row['status'] == 1) {
                                                $status_text = 'Confirmed';
                                            } else if ($row['status'] == 2) {
                                                $status_text = 'Cancelled';
                                            } else {
                                                $status_text = 'Not Confirmed Yet';
                                            }
                                            echo '<a class="btn btn-primary">' . $status_text . '</a>';
                                            echo '<a href="./hotel/paymentbill.php?booking_id=' . $row['booking_id'] . ' " class="btn btn-primary" >Bill Download</a>';
                                            ?>
                                            <div class="clearfix"></div>
                                        </div>
                                        <h5 style="color:blue; margin-top : 15rem;">Invoice</h5>
                                        <table>
                                            <tr>
                                                <th>hotel name</th>
                                                <th>check in date</th>
                                                <th>check out date</th>
                                                <th>guest</th>
                                                <th>room no</th>
                                                <th>Rent</th>
                                            </tr>
                                            <tr>
                                                <td><?php echo htmlspecialchars($row['hotelname']); ?></td>
                                                <td><?php echo htmlspecialchars($row['check_in']); ?></td>
                                                <td><?php echo htmlspecialchars($row['check_out']); ?></td>
                                                <td><?php echo htmlspecialchars($row['guests']); ?></td>
                                                <td><?php echo htmlspecialchars($row['roomno']); ?></td>
                                                <td><?php echo htmlspecialchars($row['money']); ?></td>
                                                <?php $grandtotal = $row['guests'] * $row['money'] ?>
                                            </tr>
                                            <tr>
                                                <th colspan="5" style="text-align:center;"> Grand Total</th>
                                                <th><?php echo htmlspecialchars($grandtotal); ?></th>
                                            </tr>
                                        </table>
                                        <hr />
                                    </li>

                            <?php }
                            } else {
                                echo "No Bookings";
                            } ?>
                        </div>
                        <div id="packageTable" style="display:none;"> <!-- Added packageTable div -->
                            <h2>&nbsp;&nbsp;<i class="fa-solid fa-location-dot">&nbsp;&nbsp;</i>Travel Package Booking History</h2>
                            <?php
                            $sql = "SELECT bookings.*, packages.*
                           FROM bookings 
                           JOIN packages ON bookings.booking_id = packages.id
                           WHERE bookings.EmailId = '$email'";


                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <li>
                                        <h4 style="color:red">Booking No #<?php echo htmlspecialchars($row['booking_number']); ?></h4>
                                        <div class="vehicle_img">
                                            <a href="package-details.php?p_id=<?php echo htmlspecialchars($row['id']); ?>">
                                                <img src="admin/images/packageimages/<?php echo htmlspecialchars($row['img1']); ?>" alt="image">
                                            </a>
                                        </div>
                                        <div class="vehicle_title">
                                            <h6><a href="package_details.php?p_id=<?php echo htmlspecialchars($row['id']); ?>"><?php echo htmlspecialchars($row['package_name']); ?>,</a></h6>
                                            <p><b>From </b><?php echo htmlspecialchars($row['FromDate']); ?> <b>To </b><?php echo htmlspecialchars($row['to_date']); ?> </p>
                                            <p><b>payment status:</b>
                                                <?php if ($row['payment'] == 0) {
                                                    echo   htmlentities('unpay');
                                                } else {
                                                    echo   htmlentities('payed');
                                                } ?>
                                            </p>
                                            <p><b>Message:</b> <?php echo htmlspecialchars($row['message']); ?> </p>
                                        </div>
                                        <div class="vehicle_status">
                                            <?php
                                            $status = $row['status'];
                                            $status_text = '';
                                            if ($status == 1) {
                                                $status_text = 'Confirmed';
                                            } else if ($status == 2) {
                                                $status_text = 'Cancelled';
                                            } else {
                                                $status_text = 'Not Confirmed Yet';
                                            }
                                            echo '<a class="btn btn-primary">' . $status_text . '</a>';
                                            echo '<a href="payment.php?booking_id=' . $row['booking_number'] . ' " class="btn btn-primary" >Bill Download</a>';
                                            ?>
                                            <div class="clearfix"></div>
                                        </div>
                                        <h5 style="color:blue" style="margin-top: 17rem;margin-right: 30rem;">Invoice</h5>
                                        <table>
                                            <tr>
                                                <th>Package name</th>
                                                <th>From Date</th>
                                                <th>To Date</th>
                                                <th>Total Days</th>
                                                <th>Rent</th>
                                            </tr>
                                            <tr>
                                                <td><?php echo htmlspecialchars($row['package_name']); ?></td>
                                                <td><?php echo htmlspecialchars($row['from_date']); ?></td>
                                                <td><?php echo htmlspecialchars($row['to_date']); ?></td>
                                                <td><?php echo htmlspecialchars($row['days']); ?></td>
                                                <td><?php echo htmlspecialchars($row['package_price']); ?></td>
                                            </tr>
                                            <tr>
                                                <th colspan="4" style="text-align:center;"> Grand Total</th>
                                                <th><?php echo htmlspecialchars($row['package_price']); ?></th>
                                            </tr>
                                        </table>
                                        <hr />
                                    </li>

                            <?php }
                            } else {
                                echo "No Bookings";
                            } ?>
                        </div>
                    </div>
                    <script>
                        function showBookingType(type) {
                            document.getElementById("busTable").style.display = "none";
                            document.getElementById("trainTable").style.display = "none";
                            document.getElementById("flightTable").style.display = "none"; // Corrected ID
                            document.getElementById("hotelTable").style.display = "none";
                            document.getElementById("packageTable").style.display = "none";
                            document.getElementById("busBtn").classList.remove("active");
                            document.getElementById("trainBtn").classList.remove("active");
                            document.getElementById("flightBtn").classList.remove("active");
                            document.getElementById("hotelBtn").classList.remove("active");
                            document.getElementById("packageBtn").classList.remove("active");

                            document.getElementById(type + "Table").style.display = "block";
                            document.getElementById(type + "Btn").classList.add("active");
                        }
                    </script>
                </div>
            </div>

        </div>
    </div>

    <!--Footer -->
    <?php include("./include/footer.php") ?>
    <!-- /Footer-->

    <!-- Scripts -->
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>