<?php
include "system/db.php";
$getid = $_GET['id'];

if (empty($getid)){
  header("Location: index.php");
}
?>

<html>
<body>
  <head>
    <title>Template master - by Jonathan Mummery</title>
    <link rel="Stylesheet" href="style.css">
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
      <?php
      $conn = dbh();

      $sth = $conn->prepare("SELECT * FROM templates WHERE id = :id"); // In the real template use GETID for template ID
      $sth->bindParam(':id', $getid);
      $sth->execute();
      $result = $sth->fetch(PDO::FETCH_ASSOC);

      if ($result['id'] == NULL){ header("Location: index.php"); }

      echo "<h1>" . $result['title'] . "</h1>";

      echo "<p>" . nl2br($result['description']) . "</p><br />";


      echo "<a href='" . $result['image'] . "'><img align='center' src='" . $result['thumbnail'] . "' /></a><br /><br />";

      echo "<a align='center' class='template' href='" . $result['download'] . "'>Download Now!</a>"; ?>

    </div>

    <?php include "sidebar.php"; ?>

  </div>

  <div id="footer">
    <a class="footer" href="terms.txt"> Terms of Use</a>
    <a class="footer" href="https://www.facebook.com/jonathan.mummery"> Like Us</a>
    <a class="footer" href="https://twitter.com/Johay90"> Follow us</a>
    <p class="footer">Copyright © 2015 Jonathan Mummery. All Rights Reserved.</p>
  </div>
