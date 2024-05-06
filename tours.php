<?php
session_start();
include('./include/config.php');
error_reporting(0);
?>

<!DOCTYPE HTML>
<html lang="en">

<head>

    <title>Tours and Travels | Tour Listing</title>
    <!--Bootstrap -->

    <!--Custome Style -->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">


    <!--bootstrap-slider -->
    <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
    <!--FontAwesome Font Style -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="favicon.svg" type="image/x-icon">
    <!--  custom css link
  -->

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- 
    - google font link
  -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- 
    - favicon
  -->
    <link rel="shortcut icon" href="favicon.svg" type="image/x-icon">
    <!-- 
    - custom css link
  -->
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- 
    - google font link
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Comforter+Brush&family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet" />
    
    <style>
        body {
            color: #555555;
        }

        .listing_page {
            background-image: url("assets/images/header-bg-image-about-1.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            border: 0 none;
            margin: 0 auto;
            padding: 0;
            position: relative;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #111111;
            font-weight: 900;
            margin: 0 auto 15px;
        }

        h5 {
            font-size: 20px;
            line-height: 32px;
        }

        .fa.fa-users,
        .fa.fa-calendar {
            color: #111111;
            width: 25px;
            cursor: none;
        }

        .fa.fa-users,
        .fa.fa-calendar {
            display: inline-block;
            font: normal normal normal 14px / 1 FontAwesome;
            font-size: inherit;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
        }

        .container_1 {
            padding-right: 15px;
            padding-left: 15px;
            margin-left: -1rem;
            margin-right: 27rem;
        }
        
    </style>

</head>

<body>

    <!-- Start Switcher -->

    <!-- /Switcher -->

    <!--Header-->
    <?php include("./include/header.php"); ?>

    <!-- /Header -->

    <!--Page Header-->
    <section class="page-header listing_page">
        <div class="container">
            <div class="page-header_wrap">
                <div class="page-heading">
                    <h1>Tours Listing</h1>
                </div>
                <ul class="coustom-breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li>Tours Listing</li>
                </ul>
            </div>
        </div>
        <!-- Dark Overlay-->
        <div class="dark-overlay"></div>
    </section>
    <!-- /Page Header-->

    <!--Listing-->
    <section class="listing-page">
        <div class="container_1">
            <div class="row">
                <div class="col-md-9 col-md-push-3">
                    <div class="result-sorting-wrapper">
                        <div class="sorting-count">
                            <?php

                            // Your SQL query to select the id column from the packages table
                            $sql = "SELECT COUNT(id) AS totalListings FROM packages";

                            // Prepare and execute the query
                            $query = $conn->query($sql);

                            // Check if there are any rows returned
                            if ($query->num_rows > 0) {
                                // Fetch the total count of listings
                                $row = $query->fetch_assoc();
                                $totalListings = $row['totalListings'];
                                echo "<p><span> " . htmlentities($totalListings) . " Listings </span></p>";
                            } else {
                                echo "0 results";
                            }


                            ?>
                        </div>
                    </div>
                    <?php
                    // Assuming you have already established a database connection


                    // Your SQL query to select data from the packages table
                    $sql = "SELECT id, package_name, package_location, package_price, package_features, package_details, img1 FROM packages";

                    // Execute the query
                    $result = $conn->query($sql);

                    // Check if there are any rows returned
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <div class="product-listing-m gray-bg">
                                <div class="product-listing-img">
                                    <img src="./admin/images/packageimages/<?php echo htmlentities($row["img1"]); ?>" loading="lazy" alt="<?php echo htmlentities($row["package_location"]); ?>" class="img-cover" />
                                </div>
                                <div class="product-listing-content">
                                    <h5><a href="package_details.php?p_id=<?php echo htmlentities($row["id"]); ?>"><?php echo htmlentities($row["package_name"]); ?></a></h5>
                                    <p class="list-price">Rs:<?php echo htmlentities($row["package_price"]); ?> </p>
                                    <ul>
                                        <!-- Assuming these fields are available in your database -->
                                        <li><i class="fa fa-users" aria-hidden="true"></i> <?php echo htmlentities($row["package_features"]); ?> </li>
                                        <!-- Adjust these accordingly based on your database fields -->
                                        <li><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo htmlentities($row["package_features"]); ?></li>
                                        <!-- Adjust these accordingly based on your database fields -->
                                    </ul>
                                    <a href="package_details.php?p_id=<?php echo htmlentities($row["id"]); ?>" class="btn btn-primary" style="margin-bottom: -5rem;">View Details </a>
                                </div>
                            </div>
                    <?php }
                    } else {
                        echo "0 results";
                    }
                    ?>
                </div>
            </div>
    </section>
    <?php include("./include/footer.php"); ?>
    <script src="js/bootstrap.min.js"></script>

    <!--Slider-JS-->

</body>

</html>