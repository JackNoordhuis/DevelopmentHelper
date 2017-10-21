<?php

namespace helper\console\format\type\color\foreground;

class LightRedForegroundColor extends ForegroundColor {

	public function getName() : string {
		return "light_red";
	}

	public function getSetCode() : int {
		return 30;
	}

}