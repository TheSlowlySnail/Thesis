<?php
//* Datenbankverbindung aufbauen (START) 
$servername = "wp184.webpack.hosteurope.de";
$username = "db11120139-db";
$password = "ilIsd17.N2012";
$dbname = "db11120139-db";

header("Content-Type: text/html; charset = utf-8");


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
    echo"Erfolg <br>";
}


$name = $_POST['titel'];

echo "<b>Du hast nach dem Namen: \"<u>$name</u>\" gesucht. Dadurch wurden folgende Einträge gefunden:</b><br /><br />";

//* Überprüfung der Eingabe     
$abfrage = "SELECT * FROM Modell WHERE titel LIKE '%$name%'";
$ergebnis = mysql_query($abfrage) or die(mysql_error());
if($ausgabe = mysql_fetch_assoc($ergebnis))
{ echo "".$ausgabe['name'].""; } //* Wenn was gefunden wurde, wird es hier ausgegeben.
else
{ echo "Es wurde kein Name unter den Namen \"<u>$name</u>\" gefunden.<br />
        Bitte versuche es mit einem anderen namen.<br /> 
        <a href='suchen.html'>Zur&uuml;ck!</a>";
}    // * Wenn nichts gefunden wurde, dann kommt diese Fehlermeldung.

?>  