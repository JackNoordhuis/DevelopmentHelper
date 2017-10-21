<?php

namespace helper\console\format\type\color\foreground;

class RedForegroundColor extends ForegroundColor {

	public function getName() : string {
		return "red";
	}

	public function getSetCode() : int {
		return 31;
	}

}