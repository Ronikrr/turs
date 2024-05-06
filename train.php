<?php
// Include database configuration
include("./include/config.php");

// Check if form is submitted
if (isset($_POST['book'])) {
    // Additional data from $_POST
    $from_location = $_POST['from_location'];
    $to_location = $_POST['to_location'];
    $departure_date = $_POST['departure_date'];
    $adult = $_POST['adult'];
    $children = $_POST['children'];
    $class_of_travel = $_POST['class_of_travel'];



    $insert_sql = "INSERT INTO `trainbooking` ( `from_location`, `to_location`, `departure_date`, `adult`, `children`, `class_of_travel`) 
                        VALUES ('$from_location', '$to_location', '$departure_date', '$adult', '$children', '$class_of_travel')";
    if ($conn->query($insert_sql) === TRUE) {
        echo "Train booked successfully<br>";
    } else {
        echo "Error inserting record: " . $conn->error . "<br>";
    }
}

// Close connection
$conn->close();
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Tours and Travels | Train Booking Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.svg" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            font-size: 18px;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-image: url("./assets/images/train2.jpg");
            background-size: cover;
            background-position: center;
        }

        form {
            width: 920px;
            margin: 20px;
            padding: 70px 20px;
            background: #fff;
            margin-top: 100px;
            margin-left: 290px;
            border-radius: 5px;
            box-shadow: 0px 0px 1rem 1em rgba(0, 0, 0, 0.3);
        }

        fieldset {
            border: none;
        }

        .radio-group label {
            padding-right: 90px;
        }

        .from-place,
        .to-place,
        .airline-name {
            width: 90%;
            height: 36px;
            padding: 2px 8px;
            border: 1px solid #dcdcdc;
            outline: none;
        }

        .group-field label {
            display: block;
            padding: 10px 0;
        }

        fieldset div {
            display: inline-block;
            padding: 10px 0px;
            float: left;
        }

        .group-field {
            width: 420px;
            height: auto;
        }

        .group-select-field {
            width: 210px;
            height: auto;
        }

        .group-select-field label {
            display: block;
            padding: 5px 0px;
        }

        .ticket-count {
            width: 120px;
        }

        .search-btn {
            float: right;
            padding: 10px 22px;
            border-radius: 6px;
            outline: none;
            font-weight: bold;
            background: #ff7600;
            color: white;
            border: none;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .search-btn:hover {
            background: #bd661a;
        }

        .place-swap-btn {
            background: transparent;
            border: none;
            font-size: 32px;
            cursor: pointer;
        }

        .more-link {
            color: #4071e8;
            outline: none;
        }

        select {
            border: 1px solid #dcdcdc;
            background: white;
            outline: none;
        }

        .bold-type {
            font-weight: bold;
        }

        ::placeholder {
            color: #999999;
        }

        .label-hint {
            color: #999999;
        }

        input[type="date"] {
            background: #fff url("https://cdn1.iconfinder.com/data/icons/cc_mono_icon_set/blacks/16x16/calendar_2.png") 95% 50% no-repeat;
            height: 36px;
            border: 1px solid #dcdcdc;
            outline: none;
        }

        input[type="date"]::-webkit-inner-spin-button {
            display: none;
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            opacity: 0;
        }

        .more-option {
            border-bottom: 1px dotted #dcdcdc;
            padding-bottom: 20px;
        }

        .error_message1 {
            color: red;
            font-size: 1rem;
            margin-top: -90px;
            margin-bottom: 600px;
            margin-left: -2rem;
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
            margin-top: -90px;
            margin-bottom: 600px;
            margin-left: -2rem;
            text-align: center;
            border: 1px solid green;
            padding: 10px;
            border-radius: 5px;
            background-color: #e6ffe6;
            /* Light red background */
            position: absolute;
        }
    </style>
</head>

<body>
    <?php if (!empty($error_message)) : ?>
        <?php echo '<div class="error_message1">' . $error_message . '</div>'; ?>
    <?php endif; ?>
    <?php if (!empty($success_message)) : ?>
        <?php echo '<div class="success_message1">' . $success_message . '</div>'; ?>
    <?php endif; ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="trip-form">


        <fieldset>
            <div class="group-field">
                <label for="from" class="bold-type">From </label>
                <input class="from-place" type="text" name="from_location" maxlength="100" placeholder="Any world wide city or train station">
            </div>
            <div class="group-field">
                <label for="to" class="bold-type">To </label>
                <input class="to-place" type="text" name="to_location" maxlength="100" placeholder="Any world wide city or  train station">
            </div>
        </fieldset>
        <fieldset>
            <div class="group-field">
                <label for="depart" class="bold-type">Depart on</label>
                <input placeholder="Pick a date" type="date" maxlength="100" name="departure_date" />
            </div>
            <!-- <div class="group-field">
                <label for="return" class="bold-type">Return on</label>
                <input placeholder="Pick a date" type="date" maxlength="100" name="return" />
            </div> -->
        </fieldset>

        <fieldset>
            <div class="group-select-field">
                <label for="adults" class="bold-type">Adults</label>
                <select name="adult" class="ticket-count">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div class="group-select-field">
                <label for="children">Children</label>
                <select name="children" class="ticket-count">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <label class="label-hint"> 2&hyphen;11 years</label>
            </div>

            <div class="group-field">
                <label for="class-of-travel">Class of travel</label>
                <select name="class_of_travel" class="travel-class-select">
                    <option value="------">-------</option>
                    <option value="economy">A/c</option>
                    <option value="business">Non - A/c</option>
                    <option value="firstClass">First class</option>
                    <option value="secondClass">Second class</option>
                    <option value="thirdClass">Third class</option>
                </select>
            </div>
        </fieldset>
        <button class="search-btn" name="book">book Now</button>
        <!-- <input class="search-btn" type="submit" value="Book Train" /> -->
    </form>
</body>

</html>