<?php
$conn = mysqli_connect("localhost","root","","hi5");
//$conn = mysqli_connect("localhost","miptocom_hi5","Mipto2016!","miptocom_hi5");
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
