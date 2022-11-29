<?php
include("config.php");
session_start();
$userID = $_SESSION['login_userID'];
$sql = "SELECT full_name, type, bio FROM user WHERE userID = '$userID'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result); // returns dict like array
if($row["type"]=="student") {
    // if the user is a student
    // load student view
} elseif ($row["type"]=="professor"){
    // if the user is a professor
    // load professor view
}
?>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Account Page</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
  
</head>

<body>
  
 <nav class="navbar background">
        <ul class="nav-list">
            <div class="logo">
                <li><a href="index.php"><img src="logo.png"></a></li>
            </div>
            <li><a href="account_page.html">Account</a></li>
            <li><a href="course_page.html">Courses</a></li>
        </ul>
 
        <div class="rightNav">
            <input type="text" name="search" id="search">
            <button class="btn btn-sm">Search</button>
        </div>
    </nav>
  
  <section class="firstsection">
        <div class="box-main">
            <div class="firstHalf">
                <h1 class="text-big" id="acctpg">
                    Account Page
                </h1>
                 
                <p class="text-small">
                    Welcome, <?php echo $row["full_name"]?>
                </p>
 
 
            </div>
        </div>
    </section>
  
  <script src="script.js"></script>
  
   <script src="https://replit.com/public/js/replit-badge.js" theme="blue" defer></script>
</body>

</html>