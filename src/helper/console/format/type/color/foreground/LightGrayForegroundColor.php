<?php

namespace helper\console\format\type\color\foreground;

class LightGrayForegroundColor extends ForegroundColor {

	public function getName() : string {
		return "light_gray";
	}

	public function getSetCode() : int {
		return 37;
	}

}