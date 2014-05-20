<?php

include("password.php");

$mysql = new mysqli("localhost", "sewald01", $mysql_password, "sewald01");

?>

<!doctype html>
<html>
	<body>
		<form action="index.php" method="POST">
			<input name="item" placeholder="Item Name">
			<input name="place" placeholder="Where Bought">
			<input name="cost" placeholder="Item Cost">
			<input type="submit">
		</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$query = 'INSERT INTO ledger (item, place, cost, date) VALUES (?, ?, ?, NOW());';
	$prepared = $mysql->prepare($query);
	$prepared->bind_param("ssd", $_REQUEST["item"], $_REQUEST["place"], $_REQUEST["cost"]);
	$prepared->execute();
}

?>

		<div class="receipts">
			<table>
				<thead><tr>
				<th>Item Name:
				<th>Where Purchased:
				<th>Item Cost:
				<th>Date:
				<tbody>
<?php

$month = "all";
if (isset($_REQUEST["month"])) {
	$month = htmlentities($_REQUEST["month"]); /* Note: does using htmlentities here protect against hack? */
}
if ($month == "january") {
	$select = 'SELECT item, place, cost, MONTH(date) AS month, YEAR(date) AS year, DAY(date) AS day FROM ledger WHERE MONTH(date)=1;';
} else if ($month == "february") {
	$select = 'SELECT item, place, cost, MONTH(date) AS month, YEAR(date) AS year, DAY(date) AS day FROM ledger WHERE MONTH(date)=2;';
} else if ($month == "march") {
	$select = 'SELECT item, place, cost, MONTH(date) AS month, YEAR(date) AS year, DAY(date) AS day FROM ledger WHERE MONTH(date)=3;';
} else if ($month == "april") {
	$select = 'SELECT item, place, cost, MONTH(date) AS month, YEAR(date) AS year, DAY(date) AS day FROM ledger WHERE MONTH(date)=4;';
} else if ($month == "may") {
	$select = 'SELECT item, place, cost, MONTH(date) AS month, YEAR(date) AS year, DAY(date) AS day FROM ledger WHERE MONTH(date)=5;';
} else if ($month == "june") {
	$select = 'SELECT item, place, cost, MONTH(date) AS month, YEAR(date) AS year, DAY(date) AS day FROM ledger WHERE MONTH(date)=6;';
} else if ($month == "july") {
	$select = 'SELECT item, place, cost, MONTH(date) AS month, YEAR(date) AS year, DAY(date) AS day FROM ledger WHERE MONTH(date)=7;';
} else if ($month == "august") {
	$select = 'SELECT item, place, cost, MONTH(date) AS month, YEAR(date) AS year, DAY(date) AS day FROM ledger WHERE MONTH(date)=8;';
} else if ($month == "september") {
	$select = 'SELECT item, place, cost, MONTH(date) AS month, YEAR(date) AS year, DAY(date) AS day FROM ledger WHERE MONTH(date)=9;';
} else if ($month == "october") {
	$select = 'SELECT item, place, cost, MONTH(date) AS month, YEAR(date) AS year, DAY(date) AS day FROM ledger WHERE MONTH(date)=10;';
} else if ($month == "november") {
	$select = 'SELECT item, place, cost, MONTH(date) AS month, YEAR(date) AS year, DAY(date) AS day FROM ledger WHERE MONTH(date)=11;';
} else if ($month == "december") {
	$select = 'SELECT item, place, cost, MONTH(date) AS month, YEAR(date) AS year, DAY(date) AS day FROM ledger WHERE MONTH(date)=12;';
} else {
	$select = 'SELECT item, place, cost, MONTH(date) AS month, YEAR(date) AS year, DAY(date) AS day FROM ledger;';
}

$prepared = $mysql->prepare($select);
$prepared->execute();

$receipts = $prepared->get_result();

foreach ($receipts as $receipt) {
?>
			<tr>
				<td> <?= $receipt["item"] ?>
				<td> <?= $receipt["place"] ?>
				<td> <?= $receipt["cost"] ?>
				<td> <?= $receipt["month"] ?>/<?= $receipt["day"] ?>/<?= $receipt["year"] ?>
			</tr>
			</table>

<?php } ?>
			<p>
				<a href="?month=january">January</a>
				<a href="?month=february">February</a>
				<a href="?month=march">March</a>
				<a href="?month=april">April</a>
				<a href="?month=may">May</a>
				<a href="?month=june">June</a>
				<a href="?month=july">July</a>
				<a href="?month=august">August</a>
				<a href="?month=september">September</a>
				<a href="?month=october">October</a>
				<a href="?month=november">November</a>
				<a href="?month=december">December</a>
			
		</div>
	</body>
</html>