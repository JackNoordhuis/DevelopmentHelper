<?php

namespace helper\console\format\type\color\foreground;

class LightCyanForegroundColor extends BlackForegroundColor {

	public function getName() : string {
		return "light_cyan";
	}

	public function getSetCode() : int {
		return 96;
	}

}