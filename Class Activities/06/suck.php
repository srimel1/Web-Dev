<!DOCTYPE html>
<html>
<head>
    <title>Buy Your Way to a Better Education!</title>
    <link href="http://www.cs.washington.edu/education/courses/cse190m/12sp/labs/4/buyagrade.css" type="text/css" rel="stylesheet" />
</head>
<body>


<?php

//IF the form is submitted, process the data
if(isset($_POST['name']) && isset($_POST['section']) && isset($_POST['credit_card']) && isset($_POST['card'])) {
    if($_POST['name'] == '' && $_POST['section'] == '' && $_POST['credit_card'] == '' && $_POST['card'] == '') {
        $name = $_POST['name'];
        $section = $_POST['section'];
        $credit_card = $_POST['credit_card'];
        $card = $_POST['card'];

        //Save to a text file
        $file = fopen('suckers.txt', 'a');
        $text = $name.';'.$section.';'.$credit_card.';'.$card."\n";
        fwrite($file, $text);
        fclose($file);

        $filecontents = file_get_contents('suckers.txt');



        ?>
        <h1>Thanks, sucker!</h1>
        <p>Your information has been recorded</p>
        <dl>
            <dt>Name</dt>
            <dd><?=$name?></dd>

            <dt>Section</dt>
            <dd><?=$section?></dd>

            <dt>Credit Card</dt>
            <dd><?=$credit_card?> (<?=$card?>)</dd>
        </dl>
        <p>Here are all the suckers who have submitted here:</p>
        <pre>
					<?=$filecontents?>
				</pre>

        <?php
    }



    else {
        print "<h1>Sorry</h1>";
        print "You must fill out all the fields. Click <a href='buyagrade.html'>here</a> to go back.";
    }
}
//Otherwise, throw an error.


?>
</body>
</html>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Buy Your Way to a Better Education!</title>
    <link href="buyagrade.css" type="text/css" rel="stylesheet"/>
</head>

<body>

<!---->
<?php
//if (isset($_POST["name"]) && isset($_POST["section"]) && isset($_POST["card_number"]) && isset($_POST["card"])) {
//if ($_POST["name"] == '' && $_POST["section"] == '' && $_POST["card_number"] == '' && $_POST["card"] == '') {
//    $name = $_POST["name"];
//    $section = $_POST["section"];
//    $card_number = $_POST["card_number"];
//    $card = $_POST["card"];
//
//    $file = fopen('suckers.html', 'a');
//    $contents = $name . ';' . $section . ';' . $card_number . ';' . $card . ';';
//    fwrite($file, $contents);
//    fclose($file);
//
//    $file_contents = file_get_contents('suckers.html');
//
//
//
//
//?>

<h1>Thanks, sucker!</h1>

<p>Your information has been recorded.</p>

<dl>
    <dt>Name</dt>
    <dd><?php print $_POST["name"] ?></dd>

    <dt>Section</dt>
    <dd><?php print $_POST["section"] ?></dd>

    <dt>Credit Card</dt>
    <dd><?php print $_POST["card_number"] ?> (<?php


        $answer = $_POST['card'];
        if ($answer == "visa") {
            echo 'Visa';
        } else {
            echo 'Mastercard';
        }

        ?>)</dd>
</dl>


<!--        <p>Here are all the suckers: </p>-->
<!--        <pre>-->
<!--            --><?//=$file_contents?>
<!--        </pre>-->
<!--        --><?php


//        } else {
//    print "<h1>Sorry</h1>";
//    print "You must fill out all the fields. Click <a href='buyagrade.html'>here</a> to go back.";
//    }
//?>


</body>
</html>


