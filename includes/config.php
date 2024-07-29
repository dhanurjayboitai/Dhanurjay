<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'db_form');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if ($con->mysqli_connect_error())
{
 echo "Failed to connect to MySQL: " . $con->mysqli_connect_error();
}
else{
    echo "Connected";
}
?>
