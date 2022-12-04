<?php
include(__DIR__ . "/CONFIG.php");
session_start();
ob_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //when the form input button is clicked
    $user_email = mysqli_real_escape_string($db,$_POST["email"]);
    $user_password = mysqli_real_escape_string($db,$_POST["password"]);
    // sql script to be run
    $sql = "SELECT userID FROM user WHERE email = '$user_email' and password = '$user_password'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result); // returns dict like array
    //print_r($row);
    $count = mysqli_num_rows($result);

    // if the table returns 1 row(denoting a match)
    if($count==1){ // the user's info exist in the db
        // record their user id for the session
        $_SESSION['login_userID'] = $row["userID"];

        //and directs user to the account page
        header($_SERVER['HTTP_HOST']."account_page.php");
    }else {
        $error = "Your Login Name or Password is invalid";
        echo $error;
    }
}
?>


<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Login </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="Login.css" rel="stylesheet" type="text/css" />
</head>
<body>


<form class="needs-validation" action = "" method = "post">

    <div class="form-group was-validated">
        <label class="form-label" for="email">Email address</label>
        <input class="form-control" name="email" type="email" id="email" required>
        <div class="invalid-feedback">
            Please enter your email address
        </div>
    </div>

    <div class="form-group was-validated">
        <label class="form-label" for="password">Password</label>
        <input class="form-control" type="password" id="password" name = "password" required>
        <div class="invalid-feedback">
            Please enter your password
        </div>
    </div>

    <div class="form-group form-check">
        <input class="form-check-input" type="checkbox" id="check">
        <label class="form-check-label" for="check"> Remember me</label>
    </div>

    <div>

        <input class="btn btn-success w-100" type="submit" value="Submit">


    </div>

    <div class="forgot-password-link ">
        <a href="#" title="Forgot Password" class="text-decoration-none">Forgot Password?</a>
    </div >

    <div>
        <div class="sign-up-link " >
            <a href="new_account.php" title="Sign up" class="text-decoration-none">Sign up</a>
        </div>


    </div >
    </div>
</form>

</body>
</html>