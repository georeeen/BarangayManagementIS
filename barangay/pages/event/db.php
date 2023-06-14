<?php
$conn = mysqli_connect("localhost","root","","db_barangay") ;

if (!$conn)
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>