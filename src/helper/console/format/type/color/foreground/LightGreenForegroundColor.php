<?php

namespace helper\console\format\type\color\foreground;

class LightGreenForegroundColor extends ForegroundColor {

	public function getName() : string {
		return "light_green";
	}

	public function getSetCode() : int {
		return 92;
	}

}