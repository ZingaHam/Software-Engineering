<?php
include("CONFIG.php");

$prompt="Please complete and submit the form to create a new account.";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    ob_start();
    //grabbing variables
    $userEmail = mysqli_real_escape_string($db,$_POST["email"]);
    $userPassword = mysqli_real_escape_string($db,$_POST["password"]);
    $userFName = mysqli_real_escape_string($db,$_POST["first_name"]);
    $userLName = mysqli_real_escape_string($db,$_POST["last_name"]);
    $accountType = $_POST["type"];

    //check for pre-existing user
    $checkforemail = "SELECT * FROM user WHERE email = ${userEmail}";
    $result2 = mysqli_query($db, $checkforemail);

    // if the table returns 1 row(denoting a match)
    if(mysqli_num_rows($result2) == 1){
        $prompt=$prompt." The email you enter is already connected to an account";

    }else {
        // sql script to push the user creds run
        $sql = "INSERT INTO user (email, password, firstName, lastName, type)
            VALUES (${userEmail},${userPassword}, ${userFName},${userLName},${accountType})";
        $result = mysqli_query($db, $sql);
        $prompt = "Account Creation Successful. Please Log In";
        header("location:index.php");
    }
    ob_end_flush();
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
            <li><a href="Main_page.php"><img src="logo.png"></a></li>
        </div>
        <li><a href="account_page.php">Account</a></li>
        <li><a href="course_page.html">Courses</a></li>
    </ul>

    <div class="rightNav">
        <input type="text" name="search" id="search">
        <button class="btn btn-sm">Search</button>
    </div>
</nav>
<h2><?php echo $prompt?>></h2>
<p><br> Later on you can add courses and other details to your account</p>
<div class = "container form-signin">
     <form action = "<?php echo $_SERVER['PHP_SELF'];?>" method = "post">
        <label>Email :</label><input type = "email" name = "email" class = "box"/><br /><br />
        <label>Password :</label><input type = "password" name = "password" class = "box" /><br/><br />
<!--        <label>Confirm Password  :</label><input type = "text" name = "email" class = "box"/><br /><br />-->
        <label>First Name :</label><input type = "first_name" name = "first_name" class = "box" /><br/><br />
        <label>Last Name :</label><input type = "last_name" name = "last_name" class = "box"/><br /><br />
         <label>Student or Professor  :</label><br />
         <input type="radio" id="student" name="type" value="student">
         <label for="student">Student</label><br>
         <input type="radio" id="professor" name="type" value="professor">
         <label for="professor">Professor</label><br /><br />
         <input type = "submit" value = "Submit"/><br />
    </form>
</div> <!-- /container -->

</body>
</html>
