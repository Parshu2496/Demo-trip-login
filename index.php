<?php
$insert = false;
if(isset($_POST['name']))
{
    // set connection variable
    $server = "localhost";
    $username = "root";
    $password = "";

    // create a database connection
    $con = mysqli_connect($server,$username,$password);

    // ccheck for connection success
    if(!$con){
        die("connection to this db failed due to".
        mysqli_connect_error());

    }

    // echo "success connecting to db";


    // collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `trip`.`trip` (`Name`, `Age`, `Gender`, `Email`, `Phone`, `Other`, `date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc',current_timestamp());";
    // echo $sql;

    // execute the query
    if($con->query($sql) == true){
    // echo "successfully inserted";

    // flag for successful insertion
    $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // close the db connection
    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Parkinsans:wght@300..800&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Parkinsans:wght@300..800&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class = "bj" src="https://collegeverse.co.in/wp-content/uploads/2023/10/manohar-manu-hNsYIjUeXJw-unsplash.jpg" alt="IIT kharagpur">
    <div class = "container">
        <h1>Welcome to IIT kharagpur US trip form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        <?php
        if($insert == true){
        echo "<p class = 'submitMsg'> Thanks for submitting your form. we are happy to see you joining us for the US trip </p>";
        }
    ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your Gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">submit</button>
            


        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>