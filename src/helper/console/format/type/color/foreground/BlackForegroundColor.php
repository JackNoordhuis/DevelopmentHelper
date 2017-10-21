<?php

namespace helper\console\format\type\color\foreground;

class BlackForegroundColor extends ForegroundColor {

	public function getName() : string {
		return "black";
	}

	public function getSetCode() : int {
		return 30;
	}

}