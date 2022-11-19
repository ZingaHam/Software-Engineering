</form>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>replit</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
  
  <style>
        * {
            margin: 0;
            padding: 0;
        }
 
        .navbar {
            display: flex;
            align-items: center;
            justify-content: center;
            position: sticky;
            top: 0;
            cursor: pointer;
        }
 
        .background {
            background: royalblue;
            background-blend-mode: darken;
            background-size: cover;
        }
 
        .nav-list {
            width: 70%;
            display: flex;
            align-items: center;
        }
 
        .logo {
            display: flex;
            justify-content: center;
            align-items: center;
        }
 
        .logo img {
            width: 180px;
            border-radius: 50px;
        }
 
        .nav-list li {
            list-style: none;
            padding: 26px 30px;
        }
 
        .nav-list li a {
            text-decoration: none;
            color: white;
        }
 
        .nav-list li a:hover {
            color: grey;
        }
 
        .rightnav {
            width: 30%;
            text-align: right;
        }
 
        #search {
            padding: 5px;
            font-size: 17px;
            border: 2px solid grey;
            border-radius: 9px;
        }
    </style> 
  
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
     <script src="https://replit.com/public/js/replit-badge.js" theme="blue" defer></script>
</body>

</html>
<form method="POST" action="upload.php" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="Upload">
<?php

// This will return all files in that folder
$files = scandir("uploads");
 
// If you are using windows, first 2 indexes are "." and "..",
// if you are using Mac, you may need to start the loop from 3,
// because the 3rd index in Mac is ".DS_Store" (auto-generated file by Mac)
for ($a = 2; $a < count($files); $a++)
{
    ?>
    <p>
        <!-- Displaying file name !-->
        <?php echo $files[$a]; ?>
 
        <!-- href should be complete file path !-->
        <!-- download attribute should be the name after it downloads !-->
        <a href="uploads/<?php echo $files[$a]; ?>" download="<?php echo $files[$a]; ?>">
            Download
        </a>
      <a href="delete.php?name=uploads/<?php echo $files[$a]; ?>"
        style="color: red;">
        Delete
      </a>
 
    </p>
    <?php
}
