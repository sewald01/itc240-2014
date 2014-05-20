<table>
	<th><a href="?sort=artist">Artist</a>:
	<th><a href="?sort=album">Album</a>:
	<th><a href="?sort=single">Single</a>:
	<th><a href="?sort=year">Year</a>:
<?php foreach ($albumResults as $row) { ?>
	<tr>
		<td><?= $row["artist"] ?>
		<td><i><?= $row["album"] ?></i>
		<td>"<?= $row["single"] ?>"
		<td><?= $row["year"] ?>
<?php } ?>
</table>