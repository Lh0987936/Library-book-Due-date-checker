<?php
function TestTest($Return,)
{
    $Return = ($_GET['Return']);
    return $Return;
}
function CheckLibraryBookDates(DateTime $Return, DateTime $Due)
{
    if ($Return > $Due) {
        $diffChecker = 1;
    } elseif ($Return < $Due) {
        $diffChecker = 2;
    } else {
        $diffChecker = 3;
    }
    return $diffChecker;
}
function CheckDateDifferences(DateTime $return, DateTime $due)
{
    if ($_GET) {
        $difference = date_diff($return, $due);
        return $difference;
    }
}
//If Return Date is after Due Date:
// if ($_GET) {

//Display the dates the user entered. 

// }
