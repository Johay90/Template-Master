<?php
include "system/db.php";
$conn = dbh();

if (isset($_POST['submit'])){
  $title = $_POST['title'];
  $tags = $_POST['tags'];
  $desc = $_POST['desc'];
  $img = $_POST['img'];
  $tnail = $_POST['tnail'];

  $upload_dir = "designs/";
  $target_file = $upload_dir . basename($_FILES["uploadFile"]["name"]);
  $fileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if (!empty($title) && !empty($tags) && !empty($desc) && !empty($img) && !empty($tnail)){

      if (strlen($title) < 5){
        $errOutput = "Title must be more then 5 characters long.";
      }
      elseif (strlen($desc) <= 75 || strlen($desc) >= 20000){
        $errOutput = "Description must be more then 75 characters long and lower than 20000.";
      }
      elseif (filter_var($img, FILTER_VALIDATE_URL) === false){
        $errOutput = "Your image is not a valid URL. Also make sure it's a .JPG or .PNG";
      }
      elseif (filter_var($tnail, FILTER_VALIDATE_URL) === false){
        $errOutput = "Your thumbnail is not a valid URL. Also make sure it's a .JPG or .PNG";
      }
      elseif ($_FILES["uploadFile"]["size"] > 5000000 || $fileType != "zip"){
        $errOutput = "Please upload a .ZIP file, and make sure the size is below 5mb";
      }
      elseif (file_exists($target_file)) {
        $errOutput = "That file name already exist in our templates, please rename it before uploading.";
      }
      else{

        //upload the file
        move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_file);

        // Add entries to databse
        $sth = $conn->prepare("INSERT INTO templates (title, tags, description, thumbnail, image, download, upload_date) VALUES (:title, :tags, :description, :thumbnail, :image, :download, :upload_date)");
        $sth->bindParam(':title', $title);
        $sth->bindParam(':tags', $tags);
        $sth->bindParam(':description', $desc);
        $sth->bindParam(':thumbnail', $tnail);
        $sth->bindParam(':image', $img);
        $sth->bindParam(':download', $target_file);
        $sth->bindParam(':upload_date', date('Y-m-d'));
        $sth->execute();

        //output
        $sucOutput = "Successfully submitted your template.";
      }

    }elseif (empty($title) && empty($tags) && empty($desc) && empty($img) && empty($tnail)){
      $errOutput = "Fill out all the fields. You left blank fields.";
    }
}
?>

<html>
<body>
  <head>
    <title>Template master - by Jonathan Mummery</title>
    <link rel="Stylesheet" href="style.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:700italic,300,400' rel='stylesheet' type='text/css'>
  </head>

  <div id="navbar">
    <ul>
      <li><a class="navbar" href="index.php">Home</a></li>
      <li><a class="navbar" href="template.php">Templates</a></li>
      <li><a class="navbar" href="upload.php">Upload</a></li>
    </ul>
  </div>

  <div id="wrapper">

    <div id="content-left">

      <?php if (!empty($errOutput)){
        echo "<div id='errOutput'>" . $errOutput . "</div>";
      }elseif (!empty($sucOutput)){
        echo "<div id='sucOutput'>" . $sucOutput . "</div>";


      }
      ?>


    <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <h1 align="center">Upload a new template</h1><br />
      <input type="text" name="title" placeholder="Title"><br />
      <input type="text" name="tags" placeholder="Tags"><br />
      <textarea name="desc" placeholder="Description"></textarea><br />
      <input type="text" name="img" placeholder="Image"><br />
      <input type="text" name="tnail" placeholder="Thumbnail (100x100)"><br />
      <span style="margin-left:90px; font-weight: bold">Upload files (.ZIP)</span>
      <input type="file" name="uploadFile" id="uploadFile" placeholder="Files"><br />
      <input name="submit" type="submit" value="Submit">
    </form>
  </div>

    <?php include "sidebar.php"; ?>

  </div>

  <div id="footer">
    <a class="footer" href="#"> About</a>
    <a class="footer" href="#"> Contact</a>
    <a class="footer" href="#"> Terms of Use</a>
    <a class="footer" href="#"> Privacy</a>
    <a class="footer" href="#"> Like Us</a>
    <a class="footer" href="#"> Follow us</a>
    <p class="footer">Copyright © 2015 Jonathan Mummery. All Rights Reserved.</p>
  </div>
