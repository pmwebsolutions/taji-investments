<?php

include("dbcon.php");

$sql = "UPDATE content SET status='read'";
$res = mysqli_query($conn, $sql);
if ($res) {
  echo "Success";
} else {
  echo "Failed";
}
