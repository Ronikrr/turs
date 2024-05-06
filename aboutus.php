<?php
session_start();
include("./include/config.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about</title>
    <link rel="shortcut icon" href="favicon.svg" type="image/x-icon">
    <!--swiper css link-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- 
    - favicon
  -->

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
    <link rel="stylesheet" href="./assets/css/style.css" />
    <!--custome css file-->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <style>
        .profile_image {
            color: white;
            width: 50px;
            cursor: pointer;

        }

        .page-header {
            background-image: url("./assets/images/eshani-mathur-mM1rUI5TyFc-unsplash.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            border: 0 none;
            margin: 0 auto;
            padding: 0;
            position: relative;
        }

        .container {
            padding-right: 15px;
            padding-left: 15px;
            margin-left: auto;
            margin-right: auto;
        }

        .page-header_wrap {
            padding: 60px 0;
            position: relative;
            text-align: center;
        }

        .page-header {
            z-index: 1;
            position: relative;
        }

        .page-heading h2,
        .page-heading h1 {
            font-size: 40px;
            color: #ffffff;
            margin: 0 auto;
        }

        .coustom-breadcrumb {
            margin: 0 auto;
            padding: 0;
            position: relative;
            z-index: 2;
        }

        .coustom-breadcrumb li {
            color: #ffffff;
            display: inline-block;
            font-size: 16px;
            line-height: 45px;
            list-style: outside none none;
            margin: 0 auto;
            padding: 0 10px;
            position: relative;
        }

        .coustom-breadcrumb a {
            color: #ffffff;

        }

        .dark-overlay {
            background: rgba(0, 0, 0, 0.75) none repeat scroll 0 0;
            content: "";
            height: 100%;
            left: 0;
            position: absolute;
            top: 0;
            width: 100%;
            z-index: -1;
        }
        
    </style>
</head>

<body>
    <?php include("./include/header.php") ?>



    <!--header section ends-->


    <section class="page-header contactus_page">
        <div class="container">
            <div class="page-header_wrap">
                <div class="page-heading">
                    <h1>About Us</h1>
                </div>
                <ul class="coustom-breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
        <!-- Dark Overlay-->
        <div class="dark-overlay"></div>
    </section>
    <!--about section starts-->

    <section class="about">

        <div class="image">
            <img src="./assets/images/about.jpg" alt="">
        </div>

        <div class="content">
            <?php
            $sql = "SELECT * FROM about_us";
            $result = $conn->query($sql);

            // Check if there are rows in the result
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
            ?>
                    <h3><?php echo $row["title"] ?></h3>
                    <?php $paragraphs = explode("\n", $row["content"]);
                    foreach ($paragraphs as $paragraph) {
                        echo "<p>" . $paragraph . "</p>";
                    } ?>
                    <div class="icon-container">
                        <div class="icon">
                            <i class="fas fa-map"></i>
                            <span>top destinations</span>
                        </div>
                        <div class="icon">
                            <i class="fas fa-hand-holding-usd"></i>
                            <span>affordable price</span>
                        </div>
                        <div class="icon">
                            <i class="fas fa-headset"></i>
                            <span>24/7 guide service</span>
                        </div>
                    </div>
            <?php  }
            } else {
                echo "No about us information found.";
            }

            $conn->close();
            ?>

            <div class="dark-overlay1"></div>
        </div>
    </section>

    <!--about section ends-->

    <!--review section stated-->
    <?php include("./include/footer.php") ?>
    <!--swiper css link-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!--custom js file link-->

    <script src="script.js"></script>

</body>

</html>