<?php

$vorname = "Daniel";
$nachname = "Neubieser";
echo "<p text-align='center'>" . "Herzlich willkommen $vorname $nachname<br>zum [\"PHP-Kurs.com\"]" . "</p>";

echo "PHP_SELF: " . $_SERVER['PHP_SELF'] . "<br>";
echo "REMOTE_ADDR: " . $_SERVER['REMOTE_ADDR'] . "<br>";

echo "aktuelles Datum und Uhrzeit: <srong>date('l jS \of F Y h:i:s A') </strong><br>";
echo "bestimmtes Datum aufrufen: " . date(DATE_ATOM, mktime(5, 20, 23, 3, 20, 1973)) . "<br>";
echo "maskierter Text in der Ausgabe (the): " . date('l \t\h\e jS') . "<br>";
echo "mit Angabe der Zeitzone: " . date('l \i\n e') . "<br>";
echo "aktuelle Uhrzeit plus 5 Minuten: " . date("H:i:s", strtotime('+5 minutes')) . "<br>";
echo "anders formatierte aktuelle Uhrzeit plus 5 Minuten: " . "<strong>" . date("d.m.Y H:i:s", (time() + (5 * 60)))
    . "</strong>" . "<br>";

?>

<form action='formular-anzeige.php' method='get'>
    <p>Ihr Vorname:
        <label>
            <input type='text' name='vorname'>
        </label>
    </p>
    <p>
        <input type='submit' value='absenden'>
    </p>
</form>

<?php
//File-handling
$file_name = "resources/besucher-counter.txt";
$content = 0;

//File öffnen und lesen
if (!empty($file_name)) {
    $file = fopen("$file_name", "r");

    $content = fread($file, filesize($file_name));
    fclose($file);
}
//Inhalt ändern und ausgeben
$content++;
echo "Bisher $content. Besucher";

//Änderungen speichern
$file = fopen("$file_name", "w");
fwrite($file, $content);
fclose($file);


show_source('1.php');
?>

