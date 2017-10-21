<?php

namespace helper\console\format\type\color\foreground;

class YellowForegroundColor extends ForegroundColor {

	public function getName() : string {
		return "yellow";
	}

	public function getSetCode() : int {
		return 33;
	}

}