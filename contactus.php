<?php
session_start();
include("./include/config.php");
error_reporting(0);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];
  // $sql = "INSERT INTO `inquiries` (`id`, `destination`, `pax`, `start`, `end`, `inquiry_date`) VALUES (\'1\', \'surat\', \'1\', \'2024-04-13\', \'2024-04-15\', current_timestamp());";
  // Prepare and bind SQL statement
  $stmt = "INSERT INTO contact_us (name,email ,message) VALUES ( '$name', ' $email','$message')";
  // echo $conn;
  if ($conn->query($stmt) === true) {
    echo "<script>alert('message sent successfull.');</script>";
  } else {
    echo 'Error' . $conn->error;
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tours and travels | Contact us</title>
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
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
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
    * {
      text-decoration: none;
    }

    .page-header {
      background-image: url("assets/images/contact-page-header-img.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      border: 0 none;
      margin: 0 auto;
      padding: 0;
      position: relative;
    }
  </style>
</head>

<body>
  <?php include("./include/header.php"); ?>


  <!--Page Header-->
  <section class="page-header contactus_page">
    <div class="container">
      <div class="page-header_wrap">
        <div class="page-heading">
          <h1>Contact Us</h1>
        </div>
        <ul class="coustom-breadcrumb">
          <li><a href="index.php">Home</a></li>
          <li>Contact Us</li>
        </ul>
      </div>
    </div>
    <!-- Dark Overlay-->
    <div class="dark-overlay"></div>
  </section>
  <!--Contact-us-->
  <section class="contact_us section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h3>Get in touch using the form below</h3>

          <div class="contact_form gray-bg">
            <form method="post">
              <div class="form-group">
                <label class="control-label">Full Name<span>*</span></label>
                <input type="text" name="name" id="name" class="form-control white_bg" id="fullname" required>
              </div>
              <div class="form-group">
                <label class="control-label">Email Address<span>*</span></label>
                <input type="email" name="email" id="email" class="form-control white_bg" id="emailaddress" required>
              </div>
              <!-- <div class="form-group">
                <label class="control-label">Phone Number <span>*</span></label>
                <input type="text" name="contactno" class="form-control white_bg" id="phonenumber" required maxlength="10" pattern="[0-9]+">
              </div> -->
              <div class="form-group">
                <label class="control-label">Message<span>*</span></label>
                <textarea class="form-control white_bg" name="message" id="message" rows="4" required></textarea>
              </div>
              <div class="form-group">
                <button class="btn btn-primary" type="submit" name="send">Send Message </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <h3>Contact Info</h3>
          <div class="contact_detail">
            <?php
            $pagetype = $_GET['type'];
            $sql = "SELECT * FROM contactinfo ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              // Output data of each row
              while ($row = $result->fetch_assoc()) {
                // Output or process the data here
                // For example:
            ?>
                <ul>
                  <li>
                    <div class="icon_wrap"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                    <div class="contact_info_m"><?php echo $row['Address'];?></div>
                  </li>
                  <li>
                    <div class="icon_wrap"><i class="fa fa-phone" aria-hidden="true"></i></div>
                    <div class="contact_info_m"><a href="tel:61-1234-567-90"><?php echo $row['contact'];?></a></div>
                  </li>
                  <li>
                    <div class="icon_wrap">
                      <i class="fa fa-mail-bulk" aria-hidden="true"></i>
                    </div>
                    <div class="contact_info_m"><a href="mailto:contact@exampleurl.com"><?php echo $row['email'];?></a></div>
                  </li>
                </ul>
            <?php
              }
            } else {
              echo "<script>alert('message not sent successfull.');</script>";
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>


  <?php include("./include/footer.php"); ?>
</body>

</html>