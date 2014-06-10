<?php

include("password.php");
include("functions.php");

$updates = get_status_updates();
?>

<!doctype html>
<html>
	<body>
		<table>
			<thead>
				<th>Name:
				<th>Status Update:
				<th>Date/Time:
				<th>Favorite:
			</thead>
<?php foreach ($updates as $update) { ?>
			<tr>
				<td><?= $update["name"] ?>:
				<td>"<?= $update["status_update"] ?>"
				<td><?= $update["time"] ?>
				<td><a href="<?php click_favorite($update["favorite"], $update["id"]) ?>"><?= $update["favorite"] ?></a>
<?php } ?>
		</table>
	</body>
</html>