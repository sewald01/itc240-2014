<?php

include("password.php");

$mysql = new mysqli("localhost", "sewald01", $mysql_password, "sewald01");

?>

<!doctype html>
<html>
	<body>
		<form action="index.php" method="POST">
			<input name="activity" placeholder="Activity">
			<input name="calories" placeholder="Calories Burned">
			<input type="submit">
		</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$query = 'INSERT INTO exercise (activity, calories, dateOf) VALUES (?, ?, NOW());';
	$prepared = $mysql->prepare($query);
	$prepared->bind_param("sd", $_REQUEST["activity"], $_REQUEST["calories"]);
	$prepared->execute();
}

?>

		<div>
			<table>
				<thead><tr>
				<th>Activity:
				<th>Calories Burned:
				<th>Date:
				<tbody>
				
<?php

$query = 'SELECT activity, calories, MONTH(dateOf) AS month, YEAR(dateOf) AS year, DAY(dateOf) AS day FROM activities ORDER BY dateOf ASC';

$prepared = $mysql->prepare($query);
$prepared->execute();

$activities = $prepared->get_result();

foreach ($activities as $activity) {

?>

			<tr>
				<td><?= $activity["activity"] ?>
				<td><?= $activity["calories"] ?>
				<td><?= $activity["month"] ?>/<?= $activity["day"] ?>/<?= $activity["year"] ?>
			</tr>
			</table>

<?php } 

$sumCalories = $mysql->prepare('SELECT SUM(calories) AS sum FROM exercise;');
$sumCalories->execute();
$sumResult = $sumCalories->get_result();

$sum = $sumResult->fetch_array();

$maxCalories = $mysql->prepare('SELECT MAX(calories) AS max FROM exercise;');
$maxCalories->execute();
$maxResult = $maxCalories->get_result();

$max = $maxResult->fetch_array();

?>
			Total calories burned: <?= $sum["sum"] ?>
			Greatest calories burned: <?= $max["max"] ?>
		</div>
	</body>
</html>
				