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

      $sth = $conn->prepare("SELECT * FROM templates WHERE id = 1"); // In the real template use GETID for template ID
      $sth->execute();
      $result = $sth->fetch(PDO::FETCH_ASSOC);

      echo "<h1>" . $result['title'] . "</h1>";

      echo "<p>" . nl2br($result['description']) . "</p><br />";


      echo "<a href='" . $result['image'] . "'><img align='center' src='" . $result['thumbnail'] . "' /></a><br /><br />";?>

      <a align="center" class="template" href="#">Download Now!</a> <?php // TODO: Add backend for DL here after upload form is done ?>

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
