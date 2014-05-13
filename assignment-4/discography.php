<table>
	<th>Artist:
	<th>Album:
	<th>Single:
	<th>Year:
<?php foreach ($result as $row) { ?>
	<tr>
		<td><?= $row["artist"] ?>
		<td><?= $row["album"] ?>
		<td>"<?= $row["single"] ?>"
		<td><?= $row["year"] ?>
<?php } ?>
</table>