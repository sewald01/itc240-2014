<?php

class Bus {
	public $speed;
	public $armed = "false";
	public $exploded = "false";
	
	function setSpeed() {
		if ($this->speed >= 50) {
			$this->armed = "true";
		}
	}
	
	function getSpeed() {
		echo "The bus is going " . $this->speed . " mph, it being armed is " . $this->armed . " and it having exploded is " . $this->exploded . ".";
	}
	
	function trigger() {
		$this->exploded = "true";
	}
	
	function armedTrigger() {
		if ($this->armed = "true") {
			if ($this->speed <= 49) {
				$this->exploded = "true";
			}
		}
	}
}