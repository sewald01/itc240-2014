<!doctype html>
<html>
<?php

//	print_r($_SERVER);

$method = $_SERVER["REQUEST_METHOD"];
echo $method;

if ($method == "GET") {

?>

	<form method="post">
		<input name="first_name" placeholder="Please enter a first name">
		<br>
		<input name="last_name" placeholder="Please enter an adjective">
		<br>
		<input name="band_verb" placeholder="Enter verb ending in '-ing'">
		<br>
		<input name="band_nouns" placeholder="Enter a plural noun">
		<br>
		<input name="time" placeholder="Pick a time from 5-12">
		<br>
		<input name="notes" placeholder="Pick a number from 2-7">
		<br>
		<button>Post</button>
	</form>

<?php } else { ?>

	<pre>
<?php print_r($_REQUEST); ?>
	</pre>

	You are <?= $_REQUEST["first_name"] ?> <?= $_REQUEST["last_name"] ?>, a "musician" in a band called "the <?= $_REQUEST["band_verb"] ?> <?= $_REQUEST["band_nouns"] ?>." Tonight is the night of your first gig, and unfortunately you don't remember when you were supposed to show up at the venue! 
	<p>
	As you are fresh out of nickels to use a payphone to call your bandmates, you decide to show up at <?= $_REQUEST["time"] ?> o'clock. When you get there, the manager looks at you and says, 

<?php 

$time = $_REQUEST["time"];
// $post_drinking = $age - 21;

if ($time == 8) {
?>
	"Right on time. I think your friends are in the back."


<?php } else if ($time <= 7) { ?>

	"You're here early... you must be new to this." You end up waiting around for everyone else to arrive.
	
<?php } else { ?>

	"You're late! Where the heck have you been? You're about to go on!" He grabs you by your shirt collar and throws you inside.

<?php } ?>
	<p>
	Once you get onstage, you realize that you don't remember what key the first song is in! You know most of the notes you are playing, but you can't remember whether the song is in Dorian or the natural minor key! Soon the part of the song arrives in which you must play a new note... you know you have a 50/50 chance of choosing the right note since you know for sure what three of the seven notes it could possibly be are. The time comes, and
<?php 

$notes = $_REQUEST["notes"];

if ($notes < 5) {
?>
	you blindly decide Dorian. You can't even look as you hit the note for fear of having gotten it wrong... but success! The song is in Dorian after all! You finish the set flawlessly, and afterwards some fat person in a suit walks up and gives you a million dollars. The End.

<?php } else { ?>
	
	you choose the natural minor. It's natural right? That's what most songs would be in, maybe that gives you a better than 50% chance to have it right. You hit the note, feeling pretty sure of yourself, when--"HONK!" Totally wrong note, dude! Everyone else in the band looks at you, really pissed off. At the end of the show, they kick you out of the band, go on to sell a million records, and your life is ruined. The End.
	
<?php } ?>
	<br>
	<a href="index.php">Get</a>
<?php } ?>
</html>