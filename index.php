<?php
include "system/db.php";
$conn = dbh();
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
      <h1>About Template Master</h1>
      <p>Template Master is a platform to share and download new designs. All content on this website is free, and no promotional material will be uploaded here.</p>

      <p>There is countless designs on this website ranging from a very simple 3 column layouts to a fully fledged one page multi-purpose designs. </p>

      <h1>Out of the box</h1>
      <p>No experience is needed, simply download and upload to your website directory and start using the website. All designs here are with you in mind; Simply coded to make it easier for you to edit and change them.</p>

      <p>Also we have a feedback button where you can suggest small changed to layouts to serve the greater good</p>

      <h1>Changelog</h1>
      <b>20-05-15</b><br />
      &#8226; Main page (index) design completed</br >
      &#8226; New footer links<br />
      <b>21-05-15</b><br />
      &#8226; Display Template page design done</br >
      <b>23-05-15</b><br />
      &#8226; Backend for display templates</br >
      &#8226; Paging on display templates</br >
      &#8226; Description limited on display template</br >
      &#8226; Upload template design done</br >
      <b>25-05-15</b><br />
      &#8226; Upload form done</br >
      &#8226; Sidebar (and backend for it) done</br >
      &#8226; Template now displays all available templates (populated via database)</br >

    </div>

    <?php include "sidebar.php"; ?>

  </div>

  <div id="footer">
    <a class="footer" href="terms.txt"> Terms of Use</a>
    <a class="footer" href="https://www.facebook.com/jonathan.mummery"> Like Us</a>
    <a class="footer" href="https://twitter.com/Johay90"> Follow us</a>
    <p class="footer">Copyright © 2015 Jonathan Mummery. All Rights Reserved.</p>
  </div>
