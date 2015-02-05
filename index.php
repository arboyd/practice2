<?php

//too lazy to check types on any of these, so I am assuming appropriate input. YOLO
if (isset($_GET['year'])){
    $year = ($_GET['year']);    
}
else {
    $year = NULL;
}

if (isset($_GET['string2count'])){
    $string2count = ($_GET['string2count']);
}
else {
    $string2count = NULL;
}


function secs2years ($secs) {
    $mins = $secs/60;
    $hours = $mins/60;
    $days = $hours/24;
    
    return $days/365;
}

function helloChrononaut ($year) {
    
    if (($year > 2020) && (is_numeric($year))) {
        return "I hope your visit is double plus good.";
    }
    else if (($year < 1900) && (is_numeric($year))) {
        return "I like your loincloth/toga/jerkin/pantaloons/frock/morning coat.";
    }
    else if (is_numeric($year)) {
        return "Can I get you a sandwich?";
    }
    else {
        return "I do not understand your jibberish."; 
    }
}

function redundantMultiplicationFunction($a, $b){
    return $a * $b ;
}

//Special case because if you divide by zero the word will end (undefined). Thus the answer given for b = 0 is WRONG, 
//which is really irritating to me. And the instructions do not account for the possibility of both numbers being
//zero (indeterminate), so I made sure it handles that, too. BECAUSE I AM EXTREMELY THOROUGH.  
function weirdDivision ($a, $b){
    if (($a == 0) && ($b == 0)){
        return "That is not a thing.";
    }
    elseif ($b == 0){
        return $b/$a;
    }
    else {
        return $a/$b;
    }
}

function returnSmaller ($a, $b) {
    if ($a == $b) {
        return "These are the same.";
    }    
    elseif ($a > $b) {
        return $b;
    }
    else {
        return $a;
    }    
}


function average($a){
    return array_sum($a)/(count($a));
}


function howLongIsThatStringThough($a){
    return strlen($a);
}


function backwardsThatString($a) {
    return strrev($a);
}

function thisIsGettingKindOfKafkaesque($a){
    return explode(" ", $a);
}

function longestWord ($a){
    $longest = NULL;
    
    foreach (thisIsGettingKindOfKafkaesque($a) as $word) {
        if (strlen($word) > strlen($longest)){
            $longest = $word;
        }
    }
    return $longest;
}


?>

<!DOCTYPE html>
<html lang="en" >
<meta charset="UTF-8">
<head>

<title>ʕ•ᴥ•ʔ more PHP practice</title> 
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

<h1>Multiplication</h1>
<ul>
    <li>4 x 2 = <?php echo redundantMultiplicationFunction(4,2) ?></li>
    <li>0 x 4 = <?php echo redundantMultiplicationFunction(0,4) ?></li>
    <li>900 x 32 = <?php echo redundantMultiplicationFunction(900,32) ?></li>
    <li>299999 x 23 = <?php echo redundantMultiplicationFunction(299999,23) ?></li>
</ul>

<h1>Division</h1>
<ul>
    <li>4 % 2 = <?php echo weirdDivision(4,2) ?></li>
    <li>2 % 4 = <?php echo weirdDivision(2,4) ?></li>
    <li>384 % 0 = <?php echo weirdDivision(384,0) ?></li>
    <li>900 % 32 = <?php echo weirdDivision(900,32) ?></li>
    <li>0 % 0 = <?php echo weirdDivision(0,0) ?></li>
</ul>

<h1>Average</h1>
<?php
$a = array(0, 1, 2, 3, 4, 5);
$b = array(10, 10); 
$c = array(1);
$d = array(10000000000, 5, 87, 7.5, 35);
?>
<ul>
    <li>[0, 1, 2, 3, 4, 5] = <?php echo average($a);?></li>
    <li>[0, 1, 2, 3, 4, 5] = <?php echo average($b);?></li>
    <li>[0, 1, 2, 3, 4, 5] = <?php echo average($c);?></li>
    <li>[0, 1, 2, 3, 4, 5] = <?php echo average($d);?></li>
</ul>

<h1>HOW WILL I EVER FIND THE SMALLER OF TWO NUBMERS?!</h1>
<ul>
    <li>1 & 5 -- <?php echo returnSmaller(1,5) ?></li>
    <li>5 & 5 -- <?php echo returnSmaller(5,5) ?></li>
    <li>1000 & 73 -- <?php echo returnSmaller(1000, 73) ?></li>
    <li>0 & 15 -- <?php echo returnSmaller(0,15) ?></li>
</ul>

<h1>Doing thingz with stringz</h1>
<form method = "get" action="index.php">
    <p><h2>This string is HOW long???? And it looks like WHAT backwards??????</h2>
    <input type="text" name="string2count" value="">
    </p>
    
    <ul>
    <?php 
    
    if ($string2count != NULL){
        echo "<li>\"$string2count\" is " . howLongIsThatStringThough($string2count). " characters long.</li>";
        echo "<li>\"$string2count\" is \"" . backwardsThatString($string2count). "\" in reverse.</li>";
        echo "<li>The longest word in \"$string2count\" is \"" . longestWord($string2count) . "\".</li>";
    }
    
    ?>
    </ul>
    
    <p>
    <input type="submit">
    </p>
    
</form>



</body>