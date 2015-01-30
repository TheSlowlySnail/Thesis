<?php

$servername = "wp184.webpack.hosteurope.de";
$username = "db11120139-db";
$password = "ilIsd17.N2012";
$dbname = "db11120139-db";

$titel = $_POST['titel'];
$autor = $_POST['autor'];

$beschr = $_POST['beschr'];
$veran = $_POST['ver'];

$url = $_POST['url'];

if (is_numeric($_POST['matr'])) {
	$matrikel = $_POST['matr'];
} else {
	echo "Fehler Matrikelnummer";
}

if (is_numeric($_POST['polygon'])) {
	$poly = $_POST['polygon'];
} else {
	echo "Fehler Polygone";
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn -> connect_error) {
	die("Connection failed: " . $conn -> connect_error);
}

if (preg_match($titel, "/^$")) {
	echo "Fehler";
}

$url = mysqli_real_escape_string($conn, $url);
/*
 $checkAutor = mysql_query("SELECT matrikel FROM Autor WHERE matrikel = '$matrikel'");
 if (mysql_num_rows($checkAutor) == 0) {

 echo mysql_num_rows($checkAutor);
 if (!preg_match($autor, "/^$")) {*/
$sql_insert_autor = sprintf("INSERT INTO Autor (matrikel, name) VALUES ('$matrikel','$autor')", mysql_real_escape_string($autor));
/*
 } else {
 echo "Fehler";
 }
 }
 */

$sql_insert_model = sprintf("INSERT INTO Modell (titel, autorid, beschreibung, polygon, verid, url) VALUES('$titel', '$matrikel','$beschr','$poly', '$veran','$url')");

if ($conn -> query($sql_insert_model) === TRUE) {
	echo "Datensatz erfolgreich hinzugef&uuml;gt";

} else {
	echo "Error: " . $sql_insert_model . "<br>" . $conn -> error;
}

$conn -> close();
?>