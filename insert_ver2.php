<?php

$servername = "dbs.hs-furtwangen.de";
$username = "stud_meiering";
$password = "ahR3SbeJd9";
$dbname = "stud_meiering";

// $name einen Wert zuweisen
$name = $_POST['name'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn -> connect_error) {
	die("Connection failed: " . $conn -> connect_error);
}

if (!empty($name)) {

	// Query Vorbereitung
	$stmt = $handler -> prepare("INSERT INTO Veranstaltung (vname) VALUES ( ?)");
	// Platzhalter binden ("is" = integerstring)
	$stmt -> bind_param("is", $name);

}
// Ausführen
$stmt -> execute();
// Schliessen
$stmt -> close();
?>