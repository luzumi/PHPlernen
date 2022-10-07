<?php
//Dateiinhalt einlesen
echo "<ol>";
$handle = fopen ("resources/text.txt", "r");

while ( $inhalt = fgets ($handle, 4096 ))
{
    echo "<li> $inhalt ";
}

fclose($handle);

//Verzeichnisse einlesen
$verzeichnis = ".";
echo "<ol>";

// Test, ob es sich um ein Verzeichnis handelt
if ( is_dir ( $verzeichnis ))
{
    // öffnen des Verzeichnisses
    if ( $handle = opendir($verzeichnis) )
    {
        // einlesen der Verzeichnisse
        while (($file = readdir($handle)) !== false)
        {
            echo "<li>Dateiname: ";
            echo $file;

            echo "<ul><li>Dateityp: ";
            echo filetype( $file );
            echo "</li></ul>\n";
            echo "<br><a href=\"$file\">$file</a><br>";
        }
        closedir($handle);
    }
}
echo "</ol>";

// aktuelles Verzeichnis als Array einlesen
$verz_inhalt = scandir($verzeichnis, 3);

echo "<pre>";
print_r($verz_inhalt);