<?php
include("config.php");
session_start();
ob_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){

    //when the form input button is clicked formt input for sql query
    $userEmail = mysqli_real_escape_string($db,$_POST["email"]);
    $userPassword = mysqli_real_escape_string($db,$_POST["password"]);
    $userFName = mysqli_real_escape_string($db,$_POST["first_name"]);
    $userLName = mysqli_real_escape_string($db,$_POST["last_name"]);
    $accountType = $_POST["type"];
    // sql script to be run
    $sql = "INSERT INTO user (email, password, firstName, lastName, type)
VALUES ($userEmail, $userPassword, $userFName, $userLName, $accountType) ";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result); // returns dict like array
    $count = count($row);

    // if the table returns 1 row(denoting a match)
    if($count==1){ // the user's info already exist in the db
        // record their user id for the session
        $_SESSION['login_userID'] = $userEmail;

        //and directs user to the login page
        header("location:index.php");
    }else {
        $error = "Your Login Name or Password is invalid";
    }
}
?>
<html lang = "en">

<head>
    <title>Create a New Account</title>
</head>

<body>
<nav class="navbar background">
    <ul class="nav-list">
        <div class="logo">
            <li><a href="index.php"><img src="logo.png"></a></li>
        </div>
        <li><a href="account_page.php">Account</a></li>
        <li><a href="course_page.html">Courses</a></li>
    </ul>

    <div class="rightNav">
        <input type="text" name="search" id="search">
        <button class="btn btn-sm">Search</button>
    </div>
</nav>
<h2>Please Fill in the Form Below </h2>
<p><br> Later on you can add courses and other details to your account</p>
<div class = "container form-signin">
     <form action = "" method = "post">
        <label>Email :</label><input type = "email" name = "email" class = "box"/><br /><br />
        <label>Password :</label><input type = "password" name = "password" class = "box" /><br/><br />
<!--        <label>Confirm Password  :</label><input type = "text" name = "email" class = "box"/><br /><br />-->
        <label>First Name :</label><input type = "first_name" name = "password" class = "box" /><br/><br />
        <label>Last Name :</label><input type = "last_name" name = "email" class = "box"/><br /><br />
         <label>Student or Professor  :</label><br />
         <input type="radio" id="student" name="fav_language" value="student">
         <label for="student">Student</label><br>
         <input type="radio" id="professor" name="fav_language" value="professor">
         <label for="professor">Professor</label><br /><br />
         <input type = "submit" value = "Submit"/><br />
    </form>
</div> <!-- /container -->

</body>
</html>