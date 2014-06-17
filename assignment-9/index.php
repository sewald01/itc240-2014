<?php

include("bus.php");

$bus = new Bus();
$bus->speed = 20;

?>

<!doctype html>
	<pre>
		<?php $bus->getSpeed() ?>
	</pre>

<?php

$bus->speed = 55;
$bus->setSpeed();

?>

	<pre>
		<?php $bus->getSpeed() ?>
	</pre>
	
<?php

$bus->speed = 80;
$bus->setSpeed();

?>

	<pre>
		<?php $bus->getSpeed() ?>
	</pre>
	
<?php

$bus->speed = 30;
$bus->setSpeed();
$bus->armedTrigger();

?>

	<pre>
		<?php $bus->getSpeed() ?>
	</pre>
	
<?php

$bus->speed = 80;
$bus->exploded = "false";

?>

	<pre>
		<?php $bus->getSpeed() ?>
	</pre>
	
<?php

$bus->trigger();

?>

	<pre>
		<?php $bus->getSpeed() ?>
	</pre>