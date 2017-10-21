<?php

namespace helper\console\format\type\color\foreground;

class GreenForegroundColor extends ForegroundColor {

	public function getName() : string {
		return "green";
	}

	public function getSetCode() : int {
		return 32;
	}

}