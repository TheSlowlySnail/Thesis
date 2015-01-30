<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Unbenanntes Dokument</title>
</head>

<body>
<form action="UPDATE_Modell.php" method="post">
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

$sql = "SELECT m.id, m.titel, a.name, m.autorid, v.vname,
m.beschreibung , m.url, m.time

FROM Modell m, Autor a,
Veranstaltung v WHERE m.autorid = a.matrikel AND
m.verid = v.id;";
//$sql_soft = "SELECT id, name FROM Software";

$result = $conn->query($sql);
//$result_soft = $conn->query($sql_soft);

$displaystring= "<table border='1'>" ;
$displaystring.= "<tr><td>Update</td><td>Titel</td><td>Autor</td><td>Veranstaltung</td><td>Matrikelnummer</td>
<td>URL</td><td>Datum/Uhrzeit</td><td>Beschreibung</td></tr>";
if ($result->num_rows > 0) {
    // output data of each row<br>


    while($row = $result->fetch_assoc()) {
        $displaystring .= "<tr>
        <td><input type='radio' name='auswahl' value='".$row['id']."'/>".$row['id']."</td>
		<td>"  . htmlspecialchars( $row['titel']). "</td>
		<td>". htmlspecialchars($row['name'])."</td>
		<td>". htmlspecialchars($row['vname'])."</td>
		<td>". htmlspecialchars($row['autorid'])."</td>
		<td><a href=".htmlspecialchars($row['url'])." >".htmlspecialchars($row['url'])."</a></td>
		<td>". htmlspecialchars($row['time'])."</td>
		<td>". htmlspecialchars($row['beschreibung'])."</td>
		<td><input type='submit' value='Bearbeiten'/></td>
		</tr>";
    }
} else {
    echo "0 results";
}


$displaystring .= "</table>";


$conn->close();
echo $displaystring;
?>
</form>
</body>
</html>