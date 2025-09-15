<?php
include('functions.php');
$diffChecker = 0;
if ($_GET) {
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>

<body class="bg-success bg-gradient">
    <div class="container"> <!--container to set up the two green walls around the form-->
        <div class="col"></div> <!--Left wall-->
        <div class="bg-light bg-gradient col "> <!--Where everything happens-->
            <h1 class="text-center pb-3">Vespera Library Center</h1>
            <div class="d-flex justify-content-evenly flex-column align-items-center border border-dark mb-3 pt-2">
                <div class="mb-2 ">
                    <form method="get" name="dateForm">
                        <h2>input your Return date and Due date here</h2>
                        <label for="Return">Return Date: </label>
                        <input type="date" name="Return" id="Return" class="form=control"> <br>
                        <label for="Due">Due Date: </label>
                        <input type="date" name="Due" id="Due" class="form=control"><br>
                        <input type="submit" value="Submit">
                    </form>
                </div>
                <div class="mb-2">
                    <h2>View your results here: </h2>
                    <p>Time Left:<br>
                        <?php
                        if ($_GET) {
                            if ($diffChecker == 1) {
                                echo $difference->format("Your book is overdue by %y years, %m months, and %d days!\n");
                            } elseif ($diffChecker == 2) {
                                echo $difference->format("%y years, %m months, and %d days until your book is due!\n");
                            } elseif ($diffChecker == 3) {
                                echo ("Your book is due today, Be sure to return it on time!!\n");
                            } elseif ($diffChecker == 0) {
                                echo ("");
                            } else {
                                echo ("Wuh oh! It seems we didn't receive your dates correctly!");
                            }
                        }
                        ?>
                    </p>
                    <h2>Your returned values:</h2>
                    <p>
                        <?php
                        if ($_GET) {
                            if ($diffChecker != 0 || $diffChecker < 4) {
                                echo ("Return Date: ");
                                echo $returnDate->format("m-d-y.  ");
                                echo ("Due Date: ");
                                echo $dueDate->format("m-d-y.");
                            } else {
                                echo ("");
                            }
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col"><!--right wall--></div>
    </div>
</body>

</html>