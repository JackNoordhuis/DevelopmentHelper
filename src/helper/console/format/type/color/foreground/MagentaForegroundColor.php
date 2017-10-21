<?php

namespace helper\console\format\type\color\foreground;

class MagentaForegroundColor extends ForegroundColor {

	public function getName() : string {
		return "magenta";
	}

	public function getSetCode() : int {
		return 35;
	}

}