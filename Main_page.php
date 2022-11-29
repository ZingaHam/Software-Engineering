
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

</body>


<div class="upload content_div">
<p id="uploadprompt">Upload Files Here</p>
<form method="POST" action="upload.php" enctype="multipart/form-data" id="uploadform">
    <input type="file" name="file">
    <input type="submit" value="Upload">    
    </form>
</div>

<div class="listed_files content_div">
<h2 id="uploadprompt">Uploaded Files Displayed Here:</h2>
<?php

// This will return all files in that folder
$files = scandir("uploads");
//getting rid of subdirectories . and ..
$files = array_diff(scandir($directory), array('..', '.'));
 
// If you are using windows, first 2 indexes are "." and "..",
// if you are using Mac, you may need to start the loop from 3,
// because the 3rd index in Mac is ".DS_Store" (auto-generated file by Mac)
//for each file in the uploads folder
$prompt="";
for ($a = 0; $a < count($files); $a++)
{
    ?>
    <p>
        <!-- Displaying file name !-->
        <?php echo $prompt;
        if (!$files) //if there are no files
				{ //display this prompt
					$prompt= "No Files Uploaded";
				} else { //else display files
                    $prompt = "These are your files";
					echo $files[$a];
				} ?>

        <!-- href should be complete file path !-->
        <!-- download attribute should be the name after it downloads !-->
        <a id="download_button" href="uploads/<?php echo $files[$a]; ?>" download="<?php echo $files[$a]; ?>">
            Download
        </a>
        <a href="delete.php?name=uploads/<?php echo $files[$a]; ?>"
           id="delete_button">
            Delete
        </a>

    </p>
    <?php
}?>
</div>


