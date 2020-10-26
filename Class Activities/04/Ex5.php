<!DOCTYPE html>
<html>
<body>

<?php
function countWords($str)
{

    $splitstring = explode(" ", $str);
//    print_r($splitstring);


    $wordcountarray = array();
    foreach ($splitstring as $word => $word_count) {
        if (array_key_exists($word_count, $wordcountarray)) {
            $wordcountarray[$word_count] += 1;
        } else {
            $wordcountarray[$word_count] = 1;
        }

    }
    print_r($wordcountarray);
}

$str = strtolower("Hello hello hello my name is Stephanie! How are you doing? It is my birthday! hello hello hello!");
print($str);
echo "<br>";
countWords($str);


?>
</body>
</html>
