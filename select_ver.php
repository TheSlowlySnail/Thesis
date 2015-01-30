<?php

header("Content-Type: text/html; charset = utf-8");

$servername = "wp184.webpack.hosteurope.de";
$username = "db11120139-db";
$password = "ilIsd17.N2012";
$dbname = "db11120139-db";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, vname FROM Veranstaltung";
//$sql_soft = "SELECT id, name FROM Software";

$result = $conn->query($sql);
//$result_soft = $conn->query($sql_soft);

$displaystring= "<select name='ver' >" ;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $displaystring .= "<option value='".$row["id"]."'>"  . $row["vname"]. "</option>";
    }
} else {
    echo "0 results";
}


$displaystring .= "</select>";
/*
$displaystring .= "<select name='top' >" ;
if ($result_soft->num_rows > 0) {
    // output data of each row
    while($row = $result_soft->fetch_assoc()) {
        $displaystring .= "Veranstaltung <option value='".$row["id"]."'>"  . $row["name"]. "</option>";
    }
} else {
    echo "0 results";
}


$displaystring .= "</select>";

*/

$conn->close();
echo $displaystring;
?>