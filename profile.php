<?php
session_start();
error_reporting(0);
include("./include/config.php");

// Check if the user is not logged in
if (!isset($_SESSION['EmailId'])) {
    // Redirect the user to the login page if not logged in
    header("Location: login.php");
    exit(); // Make sure to exit after redirection
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $fullname = $_POST['fullname'];
    $mobilenumber = $_POST['mobilenumber'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $email = $_SESSION['EmailId'];

    // Update query
    $update_query = "UPDATE users SET FullName = '$fullname', MobileNo = '$mobilenumber', DOB = '$dob', Address = '$address', City = '$city', Country = '$country', UpdationDate = CURRENT_TIMESTAMP WHERE EmailId = '$email'";

    // Execute the update query
    $update_result = $conn->query($update_query);

    // Check if the update was successful
    if ($update_result) {
        echo "<script>alert('User information updated successfully');</script>";
    } else {
        echo "<script>alert('Error updating user information: '. $conn->error);</script>";
    }
}

$email = $_SESSION['EmailId'];
$sql = "SELECT * FROM users WHERE EmailId = '$email'";
$result = $conn->query($sql);

?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <title>Tours and Travels | My Profile</title>
    <!-- Include CSS files -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Custom styles -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="favicon.svg" type="image/x-icon">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .profile_page {
            background-image: url("assets/images/profile-header.jpg");
        }
    </style>
</head>

<body>
    <!-- Header -->
    <?php include("./include/header.php"); ?>
    <!-- /Header -->

    <!-- Page Header -->
    <section class="page-header contactus_page" style="background-image: url('assets/images/profile-header.jpg');">
        <div class="container">
            <div class="page-header_wrap">
                <div class="page-heading">
                    <h1>Profile</h1>
                </div>
                <ul class="coustom-breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li>Profile</li>
                </ul>
            </div>
        </div>
        <!-- Dark Overlay-->
        <div class="dark-overlay"></div>
    </section>

    <?php if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { ?>
            <section class="user_profile inner_pages">
                <div class="container">
                    <div class="user_profile_info gray-bg padding_4x4_40">
                        <div class="upload_user_logo">
                            <img src="assets/images/author-avatar.png" alt="image">
                        </div>
                        <div class="dealer_info">
                            <h5><?php echo htmlspecialchars($row['FullName']); ?></h5>
                            <p><?php echo htmlspecialchars($row['Address']) . "<br>" . htmlspecialchars($row['City']) . "&nbsp;" . htmlspecialchars($row['Country']); ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            <?php include("./include/sidebar.php"); ?>
                        </div>
                        <div class="col-md-6 col-sm-8">
                            <div class="profile_wrap">
                                <h5 class="uppercase underline">General Settings</h5>
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label class="control-label">Full Name</label>
                                        <input class="form-control white_bg" name="fullname" id="fullname" type="text" value="<?php echo htmlspecialchars($row['FullName']); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Email Address</label>
                                        <input class="form-control white_bg" name="EmailId" id="EmailId" type="email" readonly value="<?php echo htmlspecialchars($row['EmailId']); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Phone Number</label>
                                        <input class="form-control white_bg" name="mobilenumber" id="phone-number" type="text" required value="<?php echo htmlspecialchars($row['MobileNo']); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Date of Birth (dd/mm/yyyy)</label>
                                        <input class="form-control white_bg" name="dob" id="dob" placeholder="dd/mm/yyyy" type="text" value="<?php echo htmlspecialchars($row['DOB']); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Your Address</label>
                                        <textarea class="form-control white_bg" name="address" id="address" rows="4"><?php echo htmlspecialchars($row['Address']); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Country</label>
                                        <input class="form-control white_bg" id="country" name="country" type="text" value="<?php echo htmlspecialchars($row['Country']); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">City</label>
                                        <input class="form-control white_bg" id="city" name="city" type="text" value="<?php echo htmlspecialchars($row['City']); ?>">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="updateprofile" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    <?php }
    } ?>

    <!-- Footer -->
    <?php include("./include/footer.php"); ?>
    <!-- /Footer -->

    <!-- JavaScript files -->
    <!-- Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!-- Other scripts if needed -->
</body>

</html>
