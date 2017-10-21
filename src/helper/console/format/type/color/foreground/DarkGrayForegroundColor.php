<?php

namespace helper\console\format\type\color\foreground;

class DarkGrayForegroundColor extends ForegroundColor {

	public function getName() : string {
		return "dark_gray";
	}

	public function getSetCode() : int {
		return 90;
	}

}