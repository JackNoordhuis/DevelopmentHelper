<?php

namespace helper\console\format\type\color\foreground;

class BlueForegroundColor extends ForegroundColor {

	public function getName() : string {
		return "blue";
	}

	public function getSetCode() : int {
		return 34;
	}

}