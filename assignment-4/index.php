<?php

include("password.php");

$mysql = new mysqli("localhost", "sewald01", $mysql_password, "sewald01");


$results = $mysql -> query('SELECT * FROM discography ORDER BY year ASC;');

$artistResults = $mysql -> query('SELECT * FROM discography ORDER BY artist ASC;');
$albumResults = $mysql -> query('SELECT * FROM discography ORDER BY album ASC;');
$singleResults = $mysql -> query('SELECT * FROM discography ORDER BY single ASC;');


$sort = "all";
if (isset($_REQUEST["sort"])) {
	$sort = htmlentities($_REQUEST["sort"]);
}


	if ($sort == "artist") {
		include("artist.php");
	} else if ($sort == "album") {
		include("album.php");
	} else if ($sort == "single") {
		include("single.php");
	} else if ($sort == "year") {
		include("discography.php");
	} else {
		include("discography.php");
	}


?>