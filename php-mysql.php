<?php
function OpenCon()
{
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "litfam05Cookies0103!";
$db = "mysql";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
return $conn;
}
function CloseCon($conn)
{
$conn -> close();
}

$conn = OpenCon();
echo "Connected Successfully"."<BR>\n";
echo '';

$sql = "SELECT host,user FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "host: " . $row["host"]. " - UserName: " . $row["user"]. " - Password:" . "<br>";
  }
} else {
  echo "0 results";
}


CloseCon($conn);




?>

