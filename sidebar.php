<div id="content-right">
  <h2>Newest uploads on Template Master</h2>
  <?php //ASC
  $sth = $conn->prepare("SELECT * FROM templates ORDER BY upload_date ASC LIMIT 20");
  $sth->execute();
  $sortUpld = $sth->fetchAll();

  foreach ($sortUpld as $row) {
    echo   "<a class='sidebar' href='view_template.php?id=" . $row['id'] . "'>" . $row['title'] . "</a><br />";
  }?>

</div>
