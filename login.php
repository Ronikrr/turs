<?php
session_start();
include("./include/config.php");

$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["EmailId"]) && isset($_POST["password"])) {
        $EmailId = $_POST["EmailId"];
        $password = $_POST["password"];

        // Sanitize email input
        $EmailId = filter_var($EmailId, FILTER_SANITIZE_EMAIL);

        // Validate email input
        if (!filter_var($EmailId, FILTER_VALIDATE_EMAIL)) {
            $error_message = "Invalid email format";
        } else {
            // Check if EmailId and password match in the database
            $sql = "SELECT * FROM users WHERE EmailId='{$EmailId}' AND password='{$password}'";
            $result = $conn->query($sql);

            if ($result && $result->num_rows == 0) {
                $user = $result->fetch_assoc();
                // Set session variables
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["user_EmailId"] = $user["EmailId"];
                $_SESSION['EmailId'] = $EmailId;
                $_SESSION['login1'] = $_POST['EmailId'];
                // Redirect to the dashboard
                
                echo "<script>alert('login successfully.');</script>";
                header("Location: index.php");
                exit();
            } else {
                $error_message = "Invalid EmailId or password";
            }
        }
    } else {
        $error_message = "Please fill in all the fields";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/css/signin.css">
    <link rel="shortcut icon" href="favicon.svg" type="image/x-icon">
    <style>
        .error_message {
            color: red;
            font-size: 1rem;
            margin-top: 5px;
            margin-bottom: 32rem;
            text-align: center;
            border: 1px solid red;
            padding: 10px;
            border-radius: 5px;
            background-color: #ffe6e6;
            position: absolute;
        }

        .new {
            position: absolute;
            margin-bottom: -32rem;
            background: rgba(0, 0, 0, .75);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 20px 20px 0 rgba(0, 0, 0, 1);
            width: 300px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php if (!empty($error_message)) : ?>
        <div class="error_message"><?php echo $error_message; ?></div>
    <?php endif; ?>
    <div class="form-container">
        <h2>Login</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="email" id="EmailId" name="EmailId" placeholder="EmailId" required>
            <input type="password" id="password" name="password" placeholder="Password" required><br><br>
            <input type="submit" value="Login" name="login">
        </form>
        <p>Forgot your password? <a href="./forgot_password.php">Reset Password</a></p> <!-- Added Forgot Password Link -->
    </div>

    <p class="new">Don't have an account? <a href="./regi.php">Register here</a></p>
</body>

</html>