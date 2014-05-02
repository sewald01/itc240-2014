<!doctype html>
<html>
	<body>
		<h1>PHP Playlist</h1>
		<ul>
<?php foreach ($playlist as $listing) {
	if ($show == "all") {
		include("listing.php");
	}
} ?>
		</ul>
	</body>
</html>