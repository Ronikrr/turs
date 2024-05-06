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
$email = $_SESSION['EmailId'];
// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $currentPassword = $_POST["current_password"];
    $newPassword = $_POST["new_password"];
    $confirmPassword = $_POST["confirm_password"];

    // Retrieve the current hashed password from the database
    $stmt = $conn->prepare("SELECT password FROM users WHERE EmailId = ?");
    $stmt->bind_param("i", $email);
    $stmt->execute();
    $stmt->bind_result($hashedPassword);
    $stmt->fetch();
    $stmt->close();

    // Verify if the current password provided matches the hashed password stored in the database
    if (password_verify($currentPassword, $hashedPassword)) {
        // Check if new password and confirm password match
        if ($newPassword !== $confirmPassword) {
            $error = "New password and confirm password do not match.";
        } else {
            // Hash the new password
            $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // Update the password in the database
            $stmt = $conn->prepare("UPDATE users SET password = ? WHERE EmailId = ?");
            $stmt->bind_param("si", $newHashedPassword, $email);
            $stmt->execute();
            $stmt->close();

            // Redirect the user to a success page
            header("Location: index.php");
            exit();
        }
    } else {
        $error = "Current password is incorrect.";
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
                    <h1>Update Password</h1>
                </div>
                <ul class="coustom-breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li> Update Password </li>
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
                            <?php if (isset($error)) {
                                echo "<p class='error' >$error</p>";
                            } ?>
                            <div class="profile_wrap">
                                <h5 class="uppercase underline">General Settings</h5>
                                <form name="chngpwd" method="post" onSubmit="return valid();">
                                    <!-- PHP: display error or success messages here -->
                                    <div class="form-group">
                                        <label class="control-label">Current Password</label>
                                        <input class="form-control white_bg" id="current_password" name="current_password" type="password" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">New Password</label>
                                        <input class="form-control white_bg" id="new_password" type="new_password" name="newpassword" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Confirm New Password</label>
                                        <input class="form-control white_bg" id="confirm_password" type="password" name="confirmpassword" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" value="Update Password" name="updatepass" id="submit" style="background: hsl(180, 88%, 13%);" class="btn btn-primary">
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