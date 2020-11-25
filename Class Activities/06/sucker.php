
<!DOCTYPE html>
<html>
<head>
    <title>Buy Your Way to a Better Education!</title>
    <link href="buyagrade.css" type="text/css" rel="stylesheet" />
</head>

<body>

<pre>

        <?php
        $filename ='suckers.html';
        $text = $_POST["name"].';'.$_POST["section"].';'.$_POST["card_number"].';'.$_POST["card"]."\n";
        file_put_contents($filename, $text,FILE_APPEND);
        $contents = file_get_contents('suckers.html');
        ?>

</pre>

<?php
if (!isset($_POST["name"]) || !isset($_POST["section"])
    || !isset($_POST["card_number"]) || !isset($_POST["card"])
    || !$_POST["name"] || !$_POST["section"]
    || !$_POST["card_number"] || !$_POST["card"]) {
    ?>

    <h1>Sorry</h1>
    <p>You didn't fill out the form completely.  <a href="buyagrade.html">Try again?</a></p>

    <?php
} else {
    ?>

    <h1>Thanks, sucker!</h1>
    <p>Your information has been recorded.</p>
    <dl>
        <dt>Name</dt>
        <dd><?= $_POST["name"] ?></dd>
        <dt>Section</dt>
        <dd><?= $_POST["section"]?></dd>
        <dt>Credit Card</dt>
        <dd><?= $_POST["card_number"] ?> (<?= $_POST["card"] ?>)</dd>
    </dl>


    <p>Here are all the suckers who have submitted here:</p>
    <pre><?=$contents?></pre>

    <?php
}
?>

</body>
</html>
