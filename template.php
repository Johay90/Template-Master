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
      <li><a class="navbar" href="upload.php">Upload</a></li>
    </ul>
  </div>

  <div id="wrapper">

    <div id="content-left">
      <?php
      $conn = dbh();

      // paging copied from http://www.sourcecodester.com/tutorials/php/6091/page-navigation-using-pdo-query-phpmysql.html
      if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
		  $start_from = ($page-1) * 4;
      $sth = $conn->prepare("SELECT * FROM templates ORDER BY id ASC LIMIT $start_from, 4");
      //end of paging

      $sth->execute();
      $rows = $sth->fetchAll();

      foreach ($rows as $row) {
       echo "<a class='template' href='view_template.php?id=" . $row['id'] . "'>" . $row['title'] . "</a><br />";
       echo "<span style='color: #a5a0a0'>Tags: " . $row['tags'] . "</span><br />";
         if (strlen($row['description']) >= 250){
           echo "<p>" . mb_strimwidth(nl2br($row['description']), 0, 250, "....") . "</p><br /><hr>";
         }else{
           echo "<p>" . nl2br($row['description']) . "</p><br /><hr>";
         }
      }
      ?>

    	<?php
      // paging copied from http://www.sourcecodester.com/tutorials/php/6091/page-navigation-using-pdo-query-phpmysql.html
    	$result = $conn->prepare("SELECT COUNT(id) FROM templates");
    	$result->execute();
    	$row = $result->fetch();
    	$total_records = $row[0];
    	$total_pages = ceil($total_records / 4);

    	for ($i=1; $i<=$total_pages; $i++) {
    				echo "<a class='page' href='template.php?page=".$i."'";
    				if($page==$i)
    				{
    				echo "id=active";
    				}
    				echo ">";
    				echo "".$i."</a> ";
    	};
    	?>

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
