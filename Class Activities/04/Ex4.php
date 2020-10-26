<!DOCTYPE html>
<html>
<body>

<?php
function word_count($str) {
    $count=1;
    for($i=0;$i<=strlen($str);$i++)
    {
        $char=substr($str,$i,1);
        if(ctype_space($char))
        {
            $count++;
        }
    }
    echo $count;
}

word_count("hello, how are you?");
?>

</body>
</html>

