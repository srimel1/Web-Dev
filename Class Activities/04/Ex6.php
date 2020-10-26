<!DOCTYPE html>
<html>
<body>

<?php

function remove_all($str, $replace)
{
    $r = "";
    for ($i = 0; $i < strlen($str); $i++) {
        if ($str[$i] != $replace[0])
            $r .= $str[$i];
    }
    return $r;

}

$ans = remove_all("Summer is Here", "e");
echo $ans;


?>
</body>
</html>
