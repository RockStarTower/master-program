<?php
// Create connection
$con = mysqli_connect("127.0.0.1","root","root","link_scraper");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>