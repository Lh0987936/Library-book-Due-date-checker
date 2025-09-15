<!-- Logan Hoover -->
<?php
function CheckLibraryBookDates(DateTime $Return, DateTime $Due)
{ //Wanted to have the $_GET checks here, but every way I tried caused issues. I'll have to look into it soon!
    if ($Return > $Due) {
        $diffChecker = 1;
    } elseif ($Return < $Due) {
        $diffChecker = 2;
    } else {
        $diffChecker = 3;
    }
    return $diffChecker;
    //Checks for which value is greater and then assigns a specific number to my difference checker to tell the index page what to do.
}
function CheckDateDifferences(DateTime $return, DateTime $due)
{
    if ($_GET) {
        $difference = date_diff($return, $due);
        return $difference;
        //Calculates the difference then returns the datetime instance to be used for the "you have x years days hrs ect until.
    }
}

