<?php
$mysqli = new mysqli("localhost","root","","project1");

// Check connection
if ($mysqli -> connect_errno) {//phát sinh lỗi
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
?>