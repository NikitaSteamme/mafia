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

// Check if the form is submitted and players are selected
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["selected_players"])) {
    // Retrieve the selected players
    $selected_players = $_POST["selected_players"];

    // Shuffle the selected players in a random order
    shuffle($selected_players);

    // Display the table with the picked players in random order
    echo "<h2>Порядок рассадки</h2>";
    echo "<table class='table'>";
    echo "<tr><th scope='col'>No.</th><th scope='col'>Player Name</th></tr>";
    foreach ($selected_players as $i => $player) {
        echo "<tr><td>" . ($i + 1) . "</td><td>$player</td></tr>";
    }
    echo "</table>";
} else {
    // If the form is not submitted or no players are selected, display an error message
    echo "<p>No players selected. Please go back and select players.</p>";
}?>
</body>
</html>