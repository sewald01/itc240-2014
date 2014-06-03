<?php

include("password.php");

$mysql = new mysqli("localhost", "sewald01", $mysql_password, "sewald01");





$sort = "title";
if (isset($_REQUEST["sort"])) {
	$sort = htmlentities($_REQUEST["sort"]);
}

if ($sort == "title") {
	$books = $mysql -> query('SELECT * FROM library ORDER BY title ASC;');
} else if ($sort == "author") {
	$books = $mysql -> query('SELECT * FROM library ORDER BY author ASC;');
}

setcookie("sort", json_encode($sort), time() + 60 * 60 * 24 * 14, "/");

if (isset($_COOKIE["sort"])) {
	$from_cookie = json_decode($_COOKIE["sort"], true);
	$sort = $from_cookie;
}

$show = "list";
if (isset($_REQUEST["show"])) {
	$show = $_REQUEST["show"];
}

setcookie("show", json_encode($show), time() + 60 * 60 * 24 * 14, "/");

if (isset($_COOKIE["show"])) {
	$from_cookie = json_decode($_COOKIE["show"], true);
	$show = $from_cookie;
}

?>

<!doctype html>
<html>
	<head>
<?php
$style = "regular";
if (isset($_REQUEST["style"])) {
	$style = $_REQUEST["style"];
}

if ($style == "regular") {
	?><link rel="stylesheet" href="styles/regular.css" /><?php
} else if ($style == "large") {
	?><link rel="stylesheet" href="styles/large.css" /><?php
}

setcookie("style", json_encode($style), time() + 60 * 60 * 24 * 14, "/");

if (isset($_COOKIE["style"])) {
	$from_cookie = json_decode($_COOKIE["style"], true);
	$style = $from_cookie;
}
?>
	</head>
	<body>
		<h1>PHP Library</h2>
		<a href="?show=list">List View</a>
		<a href="?show=description">View Descriptions</a>
		<br>
		<table>
			<th>Cover:
			<th><a href="?sort=title">Title</a>:
			<th><a href="?sort=author">Author</a>:

<?php
if ($show == "description") {
	?><th>Description:<?php
}

foreach ($books as $book) {
	if ($show == "list") {
		include("list.php");
	} else {
		include("description.php");
	}
}

?>
		</table>
		<br>
		<a href="?style=regular">Regular View</a>
		<a href="?style=large">Large View</a>
	</body>
</html>