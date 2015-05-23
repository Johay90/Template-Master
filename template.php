<?php
include "system/db.php";
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
      <li><a class="navbar" href="#">Upload</a></li>
    </ul>
  </div>

  <div id="wrapper">

    <div id="content-left">
      <?php
      $conn = dbh();

      $sth = $conn->prepare("SELECT * FROM templates");
      $sth->execute();
      $rows = $sth->fetchAll();

      foreach ($rows as $row) {
       echo "<a class='template' href='#''>" . $row['title'] . "</a><br />";
       echo "<span style='color: #a5a0a0'>Tags: " . $row['tags'] . "</span><br />";
         if (strlen($row['description']) >= 300){
           echo "<p>" . mb_strimwidth(nl2br($row['description']), 0, 300, "....") . "</p><br /><hr>";
         }else{
           echo "<p>" . nl2br($row['description']) . "</p><br /><hr>";
         }
      }
      ?>
    </div>

    <div id="content-right">
      <h2>Newest uploads on Template Master</h2>
        <a class="sidebar" href="#"> Design testing one testing one 1</a><br />
        <a class="sidebar" href="#"> Design testing one testing one 1</a><br />
        <a class="sidebar" href="#"> Design testing one testing one 1</a><br />
        <a class="sidebar" href="#"> Design testing one testing one 1</a><br />

      <h2>Popular on Template Master</h2>
      <a class="sidebar" href="#"> Design testing one testing one 1</a><br />
      <a class="sidebar" href="#"> Design testing one testing one 1</a><br />
      <a class="sidebar" href="#"> Design testing one testing one 1</a><br />
      <a class="sidebar" href="#"> Design testing one testing one 1</a><br />

    </div>

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
