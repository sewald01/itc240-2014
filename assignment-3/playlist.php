<?php

/* Tried including the playlist data with an:
	
		include("playlistdata.php");
	
	but would output all the data from the data file at the top of the page and give me a:
	
		Notice: Undefined variable: playlist in /home/classes/sewald01/public_html/itc240-2014/assignment-3/page.php on line 6
	
	error. But I guess the idea would then be to put each of the tracklistings into their own data file after that if the first one worked?
*/

$playlist = [
	[ "tracklisting" => "1",
	"song" => "Baby Let's Twist",
	"band" => "The Dictators",
	"album" => "Blood Brothers",
	"minutes" => "3",
	"seconds" => "53" ],
	[ "tracklisting" => "2",
	"song" => "Zero Hour",
	"band" => "The Plimsouls",
	"album" => "The Plimsouls",
	"minutes" => "2",
	"seconds" => "32" ],
	[ "tracklisting" => "3",
	"song" => "This Ain't My Time",
	"band" => "The Barracudas",
	"album" => "Drop Out with the Barracudas",
	"minutes" => "2",
	"seconds" => "59" ],
	[ "tracklisting" => "4",
	"song" => "Eyes of Satan",
	"band" => "The Pagans",
	"album" => "Buried Alive",
	"minutes" => "1",
	"seconds" => "57" ],
	[ "tracklisting" => "5",
	"song" => "The Way It Is",
	"band" => "Dead Moon",
	"album" => "Trash and Burn",
	"minutes" => "2",
	"seconds" => "10" ],
];

$show = "all";

if (isset($_REQUEST["show"])) {
	$show = $_REQUEST["show"];
}

include("page.php");

?>