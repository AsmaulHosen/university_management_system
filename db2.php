<?php

# Fill our vars and run on cli
# $ php -f db-connect-test.php
$dbname = 'new_ewsd';
$dbuser = 'root';
$dbpass = '';
$dbhost = 'localhost';
$link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname' Click To Create '$dbname' <a href='db/database.php'>Create</a>");

$con=mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

$test_query = "SHOW TABLES FROM $dbname";
$result = mysqli_query($link, $test_query);
$tblCnt = 0;
while($tbl = mysqli_fetch_array($result)) {
$tblCnt++;
#echo $tbl[0]."<br />\n";
}


?>