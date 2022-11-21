
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>SWE Project Home Page</title>
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

</body>


<form method="POST" action="upload.php" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="Upload">
</html>
<?php

// This will return all files in that folder
$files = scandir("uploads");
 
// If you are using windows, first 2 indexes are "." and "..",
// if you are using Mac, you may need to start the loop from 3,
// because the 3rd index in Mac is ".DS_Store" (auto-generated file by Mac)
//for each file in the uploads folder
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

