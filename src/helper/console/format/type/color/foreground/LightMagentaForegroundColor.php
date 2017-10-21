<?php

namespace helper\console\format\type\color\foreground;

class LightMagentaForegroundColor extends ForegroundColor {

	public function getName() : string {
		return "light_magenta";
	}

	public function getSetCode() : int {
		return 95;
	}

}