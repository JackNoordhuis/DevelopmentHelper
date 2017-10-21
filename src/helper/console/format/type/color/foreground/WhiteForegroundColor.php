<?php

namespace helper\console\format\type\color\foreground;

class WhiteForegroundColor extends ForegroundColor {

	public function getName() : string {
		return "white";
	}

	public function getSetCode() : int {
		return 97;
	}

}