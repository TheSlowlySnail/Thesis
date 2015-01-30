<?php

$servername = "dbs.hs-furtwangen.de";
$username = "stud_meiering";
$password = "ahR3SbeJd9";
$dbname = "stud_meiering";

$name = $_POST['name'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn -> connect_error) {
	die("Connection failed: " . $conn -> connect_error);
}
if (!empty($name)) {

	if (!preg_match($autor, "/^$")) {
		$sql_insert_autor = sprintf("INSERT INTO Veranstaltung ( vname) VALUES ('$name')", mysql_real_escape_string($name));

		//mysql_query($sql_insert_autor);
	} else {
		echo "Fehler";
	}
}

if ($conn -> query($sql_insert_autor) === TRUE) {
	echo "New record created successfully ";
	echo $sql_insert_autor;
} else {
	echo "Error: " . $sql . "<br>" . $conn -> error;
}

$conn -> close();
?>