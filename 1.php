<?php

$vorname = "Daniel";
$nachname = "Neubieser";
echo "<p align='center'>" . "Herzlich willkommen $vorname $nachname<br>zum [\"PHP-Kurs.com\"]" . "</p>";

echo "PHP_SELF: " . $_SERVER['PHP_SELF'] . "<br>";
echo "REMOTE_ADDR: " . $_SERVER['REMOTE_ADDR'] . "<br>";

echo "aktuelles Datum und Uhrzeit: <srong>date('l jS \of F Y h:i:s A') </strong><br>";
echo "bestimmtes Datum aufrufen: " . date(DATE_ATOM, mktime(5, 20, 23, 3, 20, 1973)) . "<br>";
echo "maskierter Text in der Ausgabe (the): " . date('l \t\h\e jS') . "<br>";
echo "mit Angabe der Zeitzone: " . date('l \i\n e') . "<br>";
echo "aktuelle Uhrzeit plus 5 Minuten: " . date("H:i:s", strtotime('+5 minutes')) . "<br>";
echo "anders formatierte aktuelle Uhrzeit plus 5 Minuten: " . "<strong>" . date("d.m.Y H:i:s", (time() + (5 * 60)))
    . "</strong>" . "<br>";


echo "<form action='formular-m-anzeige.php' method='get'>
        <p>Ihr Vorname: 
            <input type='text' name='vorname'> 
        </p>
        <p>
            <input type='submit' value='absenden'>
        </p>
    </form>";


?>
