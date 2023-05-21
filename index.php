<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<?php

// Fetch the webpage content
$url = "https://the-mafia.net/rate/otkrytaya-liga-vesna-2023";
$html_content = file_get_contents($url);

// Create a DOM object and load the HTML content
$dom = new DOMDocument();
libxml_use_internal_errors(true); // Disable error reporting for HTML parsing
$dom->loadHTML($html_content);
libxml_use_internal_errors(false);

// Find the table containing player information
$table = $dom->getElementsByTagName('table')->item(0);

// Create an array to store the players
$players = [];

// Extract the player names from the table
$rows = $table->getElementsByTagName('tr');
foreach ($rows as $row) {
    $columns = $row->getElementsByTagName('td');
    if ($columns->length > 1) {
        $player_name = trim($columns->item(1)->nodeValue); // Assuming the player name is in the second column ("Ник")
        $players[] = $player_name;
    }
}

// Display all players in a separate table with checkboxes
echo "<h2>All Players</h2>";
echo "<form method='post' action='process.php'>"; // Assuming form submission to a file named "process.php"
echo "<table class='table'>";
echo "<thead>";
echo "<tr><th scope='col'>No.</th><th scope='col'>Player Name</th><th scope='col'>Select</th></tr>";
echo "</thead>";
echo "<tbody>";
foreach ($players as $i => $player) {
    echo "<tr>";
    echo "<th scope='row'>" . ($i + 1) . "</th>";
    echo "<td>$player</td>";
    echo "<td><input class='form-check-input' type='checkbox' name='selected_players[]' value='$player' id='qwe'></td>";
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";
echo "<br>";
echo "<input type='submit' value='Pick Players'>";
echo "</form>";
?>

</body>
</html>
