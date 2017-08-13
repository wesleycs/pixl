<?php

session_start();
$session    = session_id();
$time       = time();
$time_check = $time-300;     //We Have Set Time 5 Minutes

$host     = "127.0.0.1";     // your Host name 
$username = "root";          // your Mysql username 
$password = "TrjR0330@";     // your Mysql password 
$db_name  = "test";          // your Database name
$tbl_name = "online_users";  // Table name 

$con = mysqli_connect($host, $username, $password, $db_name);

if (!$con) {
echo "Error; " . mysqli_connect_error();
exit;
}

$sql = "SELECT * FROM  $tbl_name WHERE SESSION='$session'";
$result = mysqli_query($con, $sql);
$count = mysqli_num_rows($result);


//if count is 0, then enter the values 

if($count=="0") {
$sql1 = "INSERT INTO $tbl_name(session, time) VALUES ('$session', '$time')";
$result1 = mysqli_query($con, $sql1);
}

//else update the values
else {
$sql2 = "UPDATE $tbl_name SET time='$time' WHERE session = '$session'";
$result2 = mysqli_query($con, $sql2);
}

$sql3  = "SELECT * FROM $tbl_name";
$result3 = mysqli_query($con, $sql3);
$count_user_online = mysqli_num_rows($result3);
echo "<b>Users Online : </b> $count_user_online ";

//after 5 minutes, session will be deleted 
$sql4 = "DELETE FROM $tbl_name WHERE time <$time_check";
$result4 = mysqli_query($sql4);

mysqli_close($con);
?>


