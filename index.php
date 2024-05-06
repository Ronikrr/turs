<?php
session_start();
include("./include/config.php");
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tour and Travel</title>

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
        .profile-icon-container {
            position: relative;
            display: inline-block;
        }

        .profile-icon-container .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 200px;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
            z-index: 1;
            margin-left: -200px;
        }

        .profile-icon-container:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dark-overlay {
            background: rgba(0, 0, 0, 0.75) none repeat scroll 0 0;
            content: "";
            height: 100%;
            left: 0;
            position: relative;
            top: 0;
            width: 100%;
        }

        .dots-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            width: 100%;
        }

        .dot {
            height: 20px;
            width: 20px;
            margin-right: 10px;
            border-radius: 10px;
            background-color: transparent;
            animation: pulse 1.5s infinite ease-in-out;
        }

        .dot:last-child {
            margin-right: 0;
        }

        .dot:nth-child(1) {
            animation-delay: -0.3s;
        }

        .dot:nth-child(2) {
            animation-delay: -0.1s;
        }

        .dot:nth-child(3) {
            animation-delay: 0.1s;
        }

        @keyframes pulse {
            0% {
                transform: scale(0.8);
                background-color: #b3d4fc;
                box-shadow: 0 0 0 0 rgba(178, 212, 252, 0.7);
            }

            50% {
                transform: scale(1.2);
                background-color: #6793fb;
                box-shadow: 0 0 0 10px rgba(178, 212, 252, 0);
            }

            100% {
                transform: scale(0.8);
                background-color: #b3d4fc;
                box-shadow: 0 0 0 0 rgba(178, 212, 252, 0.7);
            }
        }
    </style>
</head>

<body id="top">
    <!-- <section class="dots-container">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
    </section>
    <script>
        // Function to show the preloader
        function showOfflineLoader() {
            document.querySelector(".dots-container").style.display = "block";
        }

        // Function to hide the offline loader
        function hideOfflineLoader() {
            document.querySelector(".dots-container").style.display = "none";
        }

        // Event listener to detect offline/online status
        window.addEventListener("offline", function() {
            showOfflineLoader();
        });

        window.addEventListener("online", function() {
            hideOfflineLoader();
        });

        // Check initial network status
        if (!navigator.onLine) {
            showOfflineLoader();
        }
    </script> -->
    <!-- 
    - #HEADER
  -->
    <?php include("./include/header.php"); ?>

    <main>
        <article>
            <!-- 
        - #HERO
      -->

            <div class="aa">
                <section class="section hero" id="home">
                    <div class="container">
                        <div class="hero-content">
                            <p class="section-subtitle">Explore Your Travel</p>

                            <h2 class="hero-title">Trusted Travel Agency</h2>

                            <p class="hero-text">
                                I travel not to go anywhere, but to go. I travel for travel's
                                sake the great affair is to move.
                            </p>

                            <div class="btn-group">
                                <a href="./contactus.php" class="btn btn-primary">Contact Us</a>

                                <a href="./include/regi.php" class="btn btn-outline">Registeration now !</a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- 
        - #DESTINATION
      -->

            <section class="section destination bg2" id="destination">
                <div class="container">
                    <p class="section-subtitle">Gallery</p>

                    <h2 class="h2 section-title">Choose Your Place</h2>

                    <ul class="destination-list">
                        <li class="w-50">
                            <a href="#" class="destination-card">
                                <figure class="card-banner">
                                    <img src="./assets/images/destination-1.jpg" width="1140" height="1100" loading="lazy" alt="Malé, Maldives" class="img-cover" />
                                </figure>

                                <div class="card-content">
                                    <p class="card-subtitle">Malé</p>

                                    <h3 class="h3 card-title">Maldives</h3>
                                </div>
                            </a>
                        </li>

                        <li class="w-50">
                            <a href="#" class="destination-card">
                                <figure class="card-banner">
                                    <img src="./assets/images/destination-2.jpg" width="1140" height="1100" loading="lazy" alt="Bangkok, Thailand" class="img-cover" />
                                </figure>

                                <div class="card-content">
                                    <p class="card-subtitle">Bangkok</p>

                                    <h3 class="h3 card-title">Thailand</h3>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="destination-card">
                                <figure class="card-banner">
                                    <img src="./assets/images/destination-3.jpg" width="1110" height="480" loading="lazy" alt="Kuala Lumpur, Malaysia" class="img-cover" />
                                </figure>

                                <div class="card-content">
                                    <p class="card-subtitle">Kuala Lumpur</p>

                                    <h3 class="h3 card-title">Malaysia</h3>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="destination-card">
                                <figure class="card-banner">
                                    <img src="./assets/images/destination-4.jpg" width="1110" height="480" loading="lazy" alt="Kathmandu, Nepal" class="img-cover" />
                                </figure>

                                <div class="card-content">
                                    <p class="card-subtitle">Kathmandu</p>

                                    <h3 class="h3 card-title">Nepal</h3>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="destination-card">
                                <figure class="card-banner">
                                    <img src="./assets/images/destination-5.jpg" width="1110" height="480" loading="lazy" alt="Jakarta, Indonesia" class="img-cover" />
                                </figure>

                                <div class="card-content">
                                    <p class="card-subtitle">Jakarta</p>

                                    <h3 class="h3 card-title">Indonesia</h3>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </section><?php


                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            // Retrieve form data
                            // Define an array to store validation errors
                            $errors = [];

                            // Validate destination
                            if (empty($_POST["destination"])) {
                                $errors[] = "Destination is required";
                            } else {
                                $destination = $_POST["destination"];
                                // You can add additional validation rules for destination if needed
                            }

                            // Validate pax
                            if (empty($_POST["pax"])) {
                                $errors[] = "Number of passengers is required";
                            } else {
                                $pax = $_POST["pax"];
                                // Check if pax is a valid number
                                if (!is_numeric($pax) || $pax <= 0) {
                                    $errors[] = "Number of passengers must be a positive integer";
                                }
                            }

                            // Validate start date
                            if (empty($_POST["start"])) {
                                $errors[] = "Start date is required";
                            } else {
                                $start = $_POST["start"];
                                // You can add additional validation for the date format or range if needed
                            }

                            // Validate end date
                            if (empty($_POST["end"])) {
                                $errors[] = "End date is required";
                            } else {
                                $end = $_POST["end"];
                                // You can add additional validation for the date format or range if needed
                            }
                            // If there are no errors, send the message
                            if (empty($errors)) {
                                //$sql = "INSERT INTO `inquiries` ( `destination`, `pax`, `start`, `end`, `inquiry_date`) VALUES (\'1\', \'surat\', \'1\', \'2024-04-13\', \'2024-04-15\', current_timestamp());";
                                // Prepare and bind SQL statement
                                $stmt = "INSERT INTO inquiries ( `destination`, `pax`, `start`, `end`) VALUES ( '$destination', $pax,'$start', '$end')";

                                if ($conn->query($stmt) === true) {
                                    echo "<script>alert('message sent successfull.');</script>";
                                } else {
                                    echo 'Error' . $conn->error;
                                }
                            }
                        }
                        ?>

            <style>
                .error-container {
                    border: 2px solid #ff0000;
                    padding: 10px;
                    margin-bottom: 20px;
                }

                .error-container {
                    color: #ff0000;
                }

                .error-container ul {
                    list-style-type: none;
                    padding: 0;
                }

                .error-container li {
                    color: #ff0000;
                }

                .success-message {
                    color: #008000;
                }
            </style>

            <section class="touch-search">

                <div class="container">
                    <?php if (!empty($errors)) { ?>
                        <div class="error-container">
                            Errors:
                            <?php foreach ($errors as $error) {
                                echo $error . "<br>";
                            } ?>
                        </div>
                    <?php } ?>
                    <form action="" class="form" action="index.php" method="post">
                        <div class="input-line">
                            <label for="destination" class="input-label">Destination
                                <input type="text" name="destination" id="destination" class="input-field" placeholder="Enter Destination" /></label>
                        </div>
                        <div class="input-line">
                            <label for="pax" class="input-label">Pax number
                                <input type="text" name="pax" id="pax" class="input-field" placeholder="No .of people " /></label>
                        </div>
                        <div class="input-line">
                            <label for="start" class="input-label">Start in
                                <input type="date" name="start" id="start" class="input-field" /></label>
                        </div>
                        <div class="input-line">
                            <label for="end" class="input-label">End in
                                <input type="date" name="end" id="end" class="input-field" /></label>
                        </div>
                        <div class="btns-line">
                            <button type="submit" name="submit" id="submit" class="btn btn-primary">inquire now</button>

                        </div>
                    </form>
                </div>
                <!-- <div class="dark-overlay"></div> -->
            </section>
            <!-- 
      
        - #POPULAR
      -->

            <section class="section popular bg3" id="tour">
                <div class="container">
                    <p class="section-subtitle">Featured Tours</p>

                    <h2 class="h2 section-title">Most Popular Tours</h2>

                    <ul class="popular-list">
                        <?php

                        $sql = "SELECT id, package_name, package_location, package_price,package_features ,package_details, img1, days FROM packages LIMIT 3";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {

                        ?>
                                <li>


                                    <div class="popular-card">
                                        <figure class="card-banner">
                                            <a href="package_details.php?p_id=<?php echo $row["id"]; ?>">
                                                <img src="./admin/images/packageimages/<?php echo $row["img1"]; ?>" width="740" height="518" loading="lazy" alt="<?php echo $row["package_location"]; ?>" class="img-cover" />
                                            </a>

                                            <span class="card-badge">
                                                <ion-icon name="time-outline"></ion-icon>
                                                <time datetime="P12D"><?php echo $row["days"]; ?> Days</time>
                                            </span>
                                        </figure>

                                        <div class="card-content">
                                            <div class="card-wrapper">
                                                <div class="card-price">From Rs <?php echo $row["package_price"]; ?></div>

                                                <!-- <div class="card-rating">
                                                    <ion-icon name="star"></ion-icon>
                                                    <ion-icon name="star"></ion-icon>
                                                    <ion-icon name="star"></ion-icon>
                                                    <ion-icon name="star"></ion-icon>
                                                    <ion-icon name="star-outline"></ion-icon>
                                                    <data value="2">(7)</data>
                                                </div> -->
                                            </div>

                                            <h3 class="card-title">
                                                <a href="#"><?php echo $row["package_name"]; ?></a>
                                            </h3>

                                            <address class="card-location">
                                                <?php echo $row["package_location"]; ?>
                                            </address>
                                        </div>
                                    </div>

                                </li><?php }
                                } ?>
                    </ul><a href="tours.php" class="btn-link">
                        <span>Read More</span>

                        <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                    </a>
                </div>
            </section>

            <!-- 
        - #ABOUT
      -->

            <section class="section about" id="aboutus">
                <div class="container">
                    <div class="about-content">
                        <p class="section-subtitle">About Us</p>

                        <h2 class="h2 section-title">
                            Explore all tour of the world with us.
                        </h2>

                        <p class="about-text">
                            At Travel Dream Company, We Are Not Just Travel Agents;We Are Architects Of Your Dream Vacations And Guardians Of Your Travel Peace Of Mind.
                        </p>

                        <ul class="about-list">
                            <li class="about-item">
                                <div class="about-item-icon">
                                    <ion-icon name="compass"></ion-icon>
                                </div>

                                <div class="about-item-content">
                                    <h3 class="h3 about-item-title">Tour guide</h3>

                                    <p class="about-item-text">
                                        A tour guide, or tourist guide, is a member of the hospitality and travel industry who provides information and guidance to tourists.
                                    </p>
                                </div>
                            </li>

                            <li class="about-item">
                                <div class="about-item-icon">
                                    <ion-icon name="briefcase"></ion-icon>
                                </div>

                                <div class="about-item-content">
                                    <h3 class="h3 about-item-title">Friendly price</h3>

                                    <p class="about-item-text">
                                        A package tour, also known as a package vacation or package holiday, is a product that includes accommodation.
                                    </p>
                                </div>
                            </li>

                            <li class="about-item">
                                <div class="about-item-icon">
                                    <ion-icon name="umbrella"></ion-icon>
                                </div>

                                <div class="about-item-content">
                                    <h3 class="h3 about-item-title">Reliable tour</h3>

                                    <p class="about-item-text">
                                        Reliable tour and Travel welcomes you at Royal Rajasthan.We introduce glamorous and incredible destinations.
                                    </p>
                                </div>
                            </li>
                        </ul>

                        <a href="./aboutus.php" class="btn book">Read More</a>
                    </div>

                    <figure class="about-banner">
                        <img src="assets/images/bg4.png" width="756" height="842" loading="lazy" alt="" class="w-100" />
                    </figure>
                </div>
            </section>

            <!-- 
        - #BLOG
      -->
            <div class="bg5">
                <section class="section blog black" id="blog">
                    <div class="container">
                        <p class="section-subtitle">From The Blog Post</p>

                        <h2 class="h2 section-title">Latest News & Articles</h2>

                        <ul class="blog-list">
                            <li>
                                <div class="blog-card" style="background-color:#f1f1f1;">
                                    <figure class="card-banner" style="mix-blend-mode: hard-light;padding: 2rem;">
                                        <a href="./flight/index.php">
                                            <img src="./assets/images/1.png" width="740" height="518" loading="lazy" alt="A good traveler has no fixed plans and is not intent on arriving." class="img-cover" />
                                        </a>
                                    </figure>
                                    <div class="card-content" style="text-align: center;">
                                        <a href="./flight/index.php" class="author-name">flight Services </a>
                                        <h3 class="card-title">
                                            <a href="./flight/index.php">
                                                Pick-up/drop
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="blog-card" style="background-color:#f1f1f1;">
                                    <figure class="card-banner" style="mix-blend-mode: hard-light;padding: 2rem;">
                                        <a href="./hotel/index.php">
                                            <img src="./assets/images/2.png" width="740" height="518" loading="lazy" alt="A good traveler has no fixed plans and is not intent on arriving." class="img-cover" />
                                        </a>
                                    </figure>
                                    <div class="card-content" style="text-align: center;">
                                        <a href="./hotel/index.php" class="author-name">Hotel Services </a>
                                        <h3 class="card-title">
                                            <a href="./hotel/index.php">
                                                Check-in/out
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="blog-card" style="background-color:#f1f1f1;">
                                    <figure class="card-banner" style="mix-blend-mode: hard-light;padding: 2rem;">
                                        <a href="./train/index.php">
                                            <img src="./assets/images/3.png" width="740" height="518" loading="lazy" alt="A good traveler has no fixed plans and is not intent on arriving." class="img-cover" />
                                        </a>
                                    </figure>
                                    <div class="card-content" style="text-align: center;">
                                        <a href="./train/index.php" class="author-name">Train Services</a>
                                        <h3 class="card-title">
                                            <a href="./train/index.php">
                                                Train Journey
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="blog-card" style="background-color:#f1f1f1;">
                                    <figure class="card-banner" style="mix-blend-mode: hard-light;padding: 2rem;">
                                        <a href="./bus/index.php">
                                            <img src="./assets/images/4.png" width="740" height="518" loading="lazy" alt="A good traveler has no fixed plans and is not intent on arriving." class="img-cover" />
                                        </a>
                                    </figure>
                                    <div class="card-content" style="text-align: center;">
                                        <a href="./bus/index.php" class="author-name">Bus Services </a>
                                        <h3 class="card-title">
                                            <a href="./bus/index.php">
                                                Arrival and Departure
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>
            </div>
        </article>
    </main>

    <!-- 
    - #FOOTER
  -->

    <?php include("./include/footer.php") ?>
    <!-- 
    - #GO TO TOP
  -->

    <a href="#top" class="go-top" data-go-top aria-label="Go To Top">
        <ion-icon name="chevron-up-outline"></ion-icon>
    </a>

    <!-- 
    - custom js link
  -->
    <script src="./assets/js/script.js"></script>

    <!-- 
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>