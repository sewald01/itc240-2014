<?php

function click_favorite($favorite, $id) {
	if ($favorite == 1) {
		set_favorite(0, $id);
	} else {
		set_favorite(1, $id);
	}
}

$mysql = new mysqli("localhost", "sewald01", $mysql_password, "sewald01");

function set_favorite($favorite, $id) {
	global $mysql;
	$prepared = $mysql->prepare('UPDATE status_updates SET favorite = ? WHERE id = ?');
	$prepared->bind_param("bi", $favorite, $id);
	$prepared->execute();
	return $favorite;
}

function get_status_updates() {
	global $mysql;
	$prepared = $mysql->prepare('SELECT * FROM status_updates');
	$prepared->execute();
	return $prepared->get_result();
}