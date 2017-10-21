<?php

namespace helper\console\format\type\color\foreground;

class CyanForegroundColor extends ForegroundColor {

	public function getName() : string {
		return "cyan";
	}

	public function getSetCode() : int {
		return 36;
	}

}