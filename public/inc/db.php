<?php
echo date("H:i:s");
error_reporting(E_ALL);
const SERVER = 'localhost';
const USERNAME = 'admin';
const PASSWORD = 'MDB00!';
const DATABASE = 'Daniel';




$tableInfos = get_table_infos();
$countOfRows = get_count_of_entry($tableInfos);
$firstEntryAsArray = get_first_entry_of_query($tableInfos);
$allEntriesAsResult = get_all_entries_as_mysqli_result("user_view", "vorname", "rating", "details");


echo $countOfRows;
array_map('echo', $firstEntryAsArray);
print_all_entries($tableInfos);
print_all_entries($allEntriesAsResult);


//Verbindung wird hergestellt
function connect_database(): mysqli
{
    $database = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);
    $database->set_charset('utf8');

    if ($database->connect_errno) {
        print_r("<br>" . $database->connect_error);
        die('<br>...keine Verbindungsaufnahme möglich!');
    }
    return $database;
}

//Abfrage einer Tabelle
function get_table_infos(): bool|mysqli_result
{
    $db = connect_database();
    $result = $db->query("SELECT * FROM user_review;") or die($db->error);
    close_database($db);
    return $result;
}

////Abfragen nach der Anzahl der Einträge in einer Tabelle
function get_count_of_entry(mysqli_result $result): bool|int
{
    return $result->num_rows;
}

////Ausgabe des ersten Datensatzes einer Abfrage
function get_first_entry_of_query(mysqli_result $result): array
{
    return $result->fetch_assoc();
}

////alle Datensätze einer Abfrage
function get_all_entries_as_mysqli_result(string $table_name, string... $attr ): mysqli_result
{
    $db = connect_database();
    $queryString = "SELECT ";

    for($arg = 0; count($attr); $arg++){
        $queryString .= $attr[$arg] . ",";
    }

    $queryString = $queryString.substr(0, strlen($queryString)-1) . " FROM " . $table_name;
echo $queryString;
    $result = $db->query($queryString) or die($db->error);
    close_database($db);
    return $result;
}

//Ausgabe der Abfrage
function print_all_entries(mysqli_result $result) : void
{
    echo "<h1>übersichtlichere sauberere Ausgabe</h1>";

    if ($result->num_rows) {
        echo "<p>Daten vorhanden: Anzahl ";
        echo $result->num_rows;

        while ($row = $result->fetch_object()) {
            echo '<br>' . $row->vorname . ' ' . $row->rating . ' ' . $row->details;
        }
    }
    $result->free();
}


function close_database(mysqli $db) : void
{
    echo "close<db>";
    $db->close();
}

