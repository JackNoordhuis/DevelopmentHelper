<?php

namespace helper\console\format\type\color\foreground;

use helper\console\format\type\color\FormatColor;

abstract class ForegroundColor extends FormatColor {

	public function getUnsetCode() : int {
		return 39;
	}

}