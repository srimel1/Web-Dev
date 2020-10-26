
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Random Number</title>
</head>
<body>
<p>Generating a random number between 1 and 10:
    <?php

    echo rand(1, 10);

    ?>
</p>
</body>
</html>





<?php

$text = "Hello, World!";

$num1 = 10;

$num2 = 20;


echo $text."\n";

echo $num1."+".$num2."=";

echo $num1 + $num2;
?>
<!--Output:-->
<!---->
<!--Hello, World!-->
<!--10+20=30-->



<?php


$array1 = array("10"=>"RAM", "20"=>"LAXMAN", "30"=>"RAVI",
    "40"=>"KISHAN", "50"=>"RISHI");
$array2 = array("10"=>"RAM", "70"=>"LAXMAN",
    "30"=>"KISHAN", "80"=>"RAGHAV");
$array3 = array("30"=>"LAXMAN", "80"=>"RAGHAV");

print_r(array_diff_assoc($array1, $array2, $array3));

?>

<!--___________________________________________________________________________-->
<!--Sample Output :-->
<!--Array-->
<!--(-->
<!--[10] => RAM-->