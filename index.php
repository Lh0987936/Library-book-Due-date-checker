<?php 
include ('functions.php');
$diffChecker = 0;
if($_GET) {
$returnDate = new DateTime($_GET['Return']);
$dueDate = new DateTime($_GET['Due']);
$diffChecker = CheckLibraryBookDates($returnDate, $dueDate);
$difference = CheckDateDifferences($returnDate, $dueDate);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vespera Library</title>
</head>
<body>
<h1>Vespera Library Center</h1>
<div>
<h2>Check your Due dates here:</h2>
<div>   
<form method="get" name="dateForm">
    <h3>input your Return date and Due date here</h3>
    <label for="Return">Return Date: </label>
    <input type="date" name="Return" id="Return"> <br>
    <label for="Due">Due Date: </label>
    <input type="date" name="Due" id="Due"><br>
    <input type="submit" value="Submit">
</form>
</div>
<div>
    <h3>View your results here: </h3>
    <p>Time Left:<br>
    <?php
    if ($_GET) { 
        if ($diffChecker == 1) {
            echo $difference ->format("Your book is overdue by %y years, %m months, and %d days!\n");
        }
        elseif ($diffChecker == 2) {
            echo $difference ->format("%y years, %m months, and %d days until your book is due!\n");
        }
        elseif ($diffChecker == 3) {
            echo("Your book is due today, Be sure to return it on time!!\n");
        }
        elseif ($diffChecker == 0) {
            echo("");
        }
        else {
            echo("Wuh oh! It seems we didn't receive your dates correctly!");
        }
    }
    ?>
    </p>
    <h3>Your returned values:</h3>
    <p>
        <?php
        if ($_GET) {
            if ($diffChecker != 0 || $diffChecker < 4) {
                echo("Return Date: ");
                echo $returnDate->format("m-d-y.<br>");
                echo("Due Date: ");
                echo $dueDate->format("m-d-y.<br>");
            }
            else {echo("");}
        }
        ?>
    </p>
</div>
</div>
</body>
</html>