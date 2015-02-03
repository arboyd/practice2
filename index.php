<?php
if (count($_GET) == 0):
    $year = NULL;
else:
    $year = ($_GET['year']);
endif;


function secs2years ($secs) {
    $mins = $secs/60;
    $hours = $mins/60;
    $days = $hours/24;
    
    return $days/365;
}

function helloChrononaut ($year) {
    
    if ($year > 2020){
        return "I hope your visit is double plus good.";
    }
    else if ($year < 1900) {
        return "I like your loincloth/toga/jerkin/pantaloons/frock/morning coat.";
    }
    else if ($year != NULL) {
        return "Can I get you a sandwich?";
    }
}

?>

<!DOCTYPE html>
<html lang="en" >
<meta charset="UTF-8">
<head>

<title>¯\_(ツ)_/¯ more PHP practice</title> 
</head>
<body>

<h1>
<?php

if ($year != NULL) {
    echo "Hello, Chrononaut. " . helloChrononaut($year);
}

?>
</h1>


<h1>Converting seconds to years</h1>
<ul>
    <li><?php echo "600000000 seconds is " . secs2years(600000000) . " years."; ?></li>
    <li><?php echo "60 seconds is " . secs2years(60) . " years."; ?></li>
    <li><?php echo "40000.33 seconds is " . secs2years(40000.33) . " years."; ?></li>
</ul>


<form method = "get" action="index.php">
    <p><h2>From what year do you hail, traveller?</h2>
    <input type="text" name="year" value="">
    </p>
    
    <p>
    <input type="submit">
    </p>
</form>


</body>