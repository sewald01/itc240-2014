<?php

include("password.php");

$mysql = new mysqli("localhost", "sewald01", $mysql_password, "sewald01");

$result = $mysql -> query('SELECT * FROM discography ORDER BY year ASC;');

include("discography.php");

?>