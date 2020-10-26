<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Henry Favorite Restaurant</title>
</head>
<body>

<h1>Henry Favorite Restaurant</h1>
<h2>Order Results</h2>
<pre>
<?php
$total = array_sum($_POST);
$subtotal = $_POST["Plate1"] * 2100.00 + $_POST["Plate2"] * 199.00 + $_POST["Plate3"] * 899.00;
$total=$subtotal * 1.1;
?>
</pre>
<!-- Date and time -->
<p><?php
    date_default_timezone_set('US/EASTERN');
    echo "Order processed at " . date("H:i\, jS F Y ") . "<br>";
    ?></p>

<!--Get form date and  print-->
<p>Your order is as follows:</p>
Plates ordered: <?php print array_sum($_POST)?><br>
<?php
if ($total < 1) {
    echo "\nYou didn't order anything on the previous page!\n";
    echo "<br>";
}
?>
<?php
echo "\nSubtotal: $".number_format($subtotal, 2);
echo "<br>";
echo "\nSubtotal including tax: $".number_format($total, 2);
?>
<p>Customer referred by: <?php print $_POST["find"] ?></p>

</body>
</html>
